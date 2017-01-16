//can perform client side field required checking for "fileToUpload" field
var crop = 3.071;

$("#fileToUpload").AjaxFileUpload({
        action: 'modules/storeimage.php',
        onComplete: function (data, status) {
            if (data == -9) {
                alert('Only JPG, PNG or GIF files are allowed');
                $("#ajaxloaderart").hide();
            }
            if (data == -10) {
                alert('Check the directory Permission');
                $("#ajaxloaderart").hide();
            }
            if (data != -9 && data != -10) {
                //send to panel
                sendImageToPanelAfterUplaod(status);
                setTimeout(function () {
                    $("#ajaxloaderart").hide();
                }, 2000);
            }
            if (typeof(data.error) != 'undefined') {
                if (data.error != '') {
                    alert(data.error);
                } else {
                    alert(msg); // returns location of uploaded file
                }
            }
        },
        error: function (data, status, e) {
            alert(e);
        }
    }
)

//set i9mage into panel
function sendImageToPanelAfterUplaod(image_name) {
    var token = uniqueid();
    var image_url = "/img/customImage/" + image_name;
    setImageToCanvas(image_url);
}

function showCurrentSidePreview() {
    // console.log(canvas);
    canvas.deactivateAll().renderAll();
    var prev_data = canvas.toDataURL();

    jQuery(".main_preview_content").html("<img src='" + prev_data + "' />");
}

function createPDFObject(data) {

        var doc = new jsPDF('p', 'pt', 'a4');

        doc.setDrawColor(255,0,0);

        doc.rect(0, 0, 300*crop,  550*crop);
        doc.addImage(data.url, 'png', data.posL, data.posT, data.width, data.height);

        doc.save( data.fileName + '.pdf')
    }

function saveCanvasObject() {
	console.log(getTodayDate());
	function getTodayDate(){
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();
	var hours = today.getHours();
	var minutes = today.getMinutes();
	var seconds = today.getSeconds();

	if(dd<10) {
		dd='0'+dd
	} 
	if(mm<10) {
		mm='0'+mm
	} 
	var today =hours+':'+minutes+':'+seconds+'-'+mm+'.'+dd+'.'+yyyy;
	return today;
	}
    
	var pdf = makePdf(function(pdf){
		pdf.save("download.pdf");
	});

}

function makePdf(callback){


        function zoom (width)
        {
            var scale = width / canvas.getWidth();
            height = scale * canvas.getHeight();

            canvas.setDimensions({
                "width": width,
                "height": height
            });

            canvas.calcOffset();
            var objects = canvas.getObjects();
            for (var i in objects) {
                var scaleX = objects[i].scaleX;
                var scaleY = objects[i].scaleY;
                var left = objects[i].left;
                var top = objects[i].top;

                objects[i].scaleX = scaleX * scale;
                objects[i].scaleY = scaleY * scale;
                objects[i].left = left * scale;
                objects[i].top = top * scale;

                objects[i].setCoords();
            }
            canvas.renderAll();
        }

        // zoom(921.3);

        var pdf =  new jsPDF('p', 'pt', 'format');
        console.log("render pdf");
        var path = canvas.overlayImage.getSrc();
        console.log(path);
        setCanvasBackgroundImage(null);

        canvas.deactivateAll().renderAll();
        setCanvasBackgroundImage(path);
        var prev_data =canvas.toDataURL({
        format: 'png',
        multiplier: 3.5
    });
        pdf.addImage(prev_data, 'PNG', -15, -8,253.107,460.8773333);
        // zoom(300);

		callback(pdf);

}
	
function sendPdfToServer(){
    makePdf(function (pdf){
        var telModel = $("#device").attr("device");
        var data = btoa(pdf.output());
        var date = getTodayDate();
        console.log(date);
        var temp;
        function getTodayDate(){
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            var min = today.getMinutes();
            var hours = today.getHours();
            var sec = today.getSeconds();
            if(dd<10) {
                dd='0'+dd
            }
            if(mm<10) {
                mm='0'+mm
            }
            temp = yyyy+'.'+mm+'.'+dd+'-'+hours+'.'+min+'.'+sec;
        }
        var name=temp+"-"+telModel;

        $.ajax({
            url: "modules/pdfToServer.php",
            method: "POST",
            data: {data: data, name:name},
            success: function(data, textStatus, jqXHR){
                alert(data);
            }
        });
    });

}
	
function convertImgToDataURLviaCanvas(url, callback) {
      var img = new Image();
      img.crossOrigin = 'Anonymous';
      img.onload = function() {
        var canvas = document.createElement('CANVAS');
        var ctx = canvas.getContext('2d');
        var dataURL;
        canvas.height = this.height;
        canvas.width = this.width;
        ctx.drawImage(this, 0, 0);
        dataURL = canvas.toDataURL("png");
        callback(dataURL);
        canvas = null;
      };
      img.src = url;
    }
	
function deleteCanvasObject() {
    var obj = canvas.getActiveObject();
    if (obj) {
        canvas.remove(obj);
    }
    canvas.renderAll();
}

function addClipArtImage(image_name) {
    var image_url = "/img/customImage/" + image_name;
    setImageToCanvas(image_url);
}

$('#addmecart').bind('click', function () {
    var qty = 1;
    var minQty = 1;
    minQty = 1; //{if isset($min_qty)}{$min_qty}{/if}
    if ($('#txtQty').val() != '' && parseInt($('#txtQty').val()) > 0) {
        qty = $('#txtQty').val();
    }
    if (qty >= minQty) {
        $("#process_loader").show();
        var design_id = uniqueid();
        jQuery("#did_save").val(design_id);
        saveEachImage(design_id);
        setTimeout(function () {
            addMyCard(design_id, qty);
        }, 15000);
    }
    else {
        alert('{if isset($min_qty_required)}{$min_qty_required}{/if} ' + minQty);
    }
});

function addMyCard(design_id, qty) {
    var custom_price = parseInt($("#added_image_count").val()) * parseFloat(50); //{if isset($custom_image_price)}{$custom_image_price}{/if}
    $.ajax({
        url: '/modules/mobilecasedesign/?rand=1452930999029',
        type: 'post',
        data: 'add=1' + '&ajax_custom_price=' + custom_price + '&ajax=true' + '&controller=cart' + '&id_product=' + jQuery("#product_id").val() + '&qty=' + qty + '&token=' + $("input[name=token]").val() + '&ipa=' + $("#ipa").val(),
        dataType: 'json',
        success: function (json) {
            $("#process_loader").hide();
            window.location = '/modules/mobilecasedesign/index.php?controller=order';
        }
    });
}
//reset canvas
$('#resetme').bind('click', function () {
    if ($('#sidechange').val() == 'front') {
        for (i = 0; i < design_work_front.length; i++) {
            if (typeof design_work_front[i] != "undefined" && design_work_front[i]['id'] != '') {
                $('#' + design_work_front[i]['id']).remove();
                delete design_work_front[i];
            }
        }
        design_work_front.length = 0;
    }
    else if ($('#sidechange').val() == 'back') {
        for (i = 0; i < design_work_back.length; i++) {
            if (typeof design_work_back[i] != "undefined" && design_work_back[i]['id'] != '') {
                $('#' + design_work_back[i]['id']).remove();
                delete design_work_back[i];
            }
        }
        design_work_back.length = 0;
    }
});
//set timeout for each image
function saveEachImage(design_id) {
    setTimeout(function () {
        delaysaveImage(1, design_id);
    }, 1000);
    setTimeout(function () {
        storeHidden(design_id);
    }, 7000);
    setTimeout(function () {
        getCombinationId(design_id);
    }, 10000);
}
function storeHidden(design_id) {
    $.ajax({
        type: "POST",
        url: '/modules/mobilecasedesignmarge.php',
        data: 'arrayobjectfront=' + JSON.stringify(canvas) + '&did=' + design_id,
        dataType: 'json',
        success: function (json) {
            //done my desing
        }
    });
}
//get relational variation id
function getCombinationId(design_id) {
    var myoptions = new Array();
    $(".custom_options").each(function () {
        myoptions.push($(this).val());
    });

    var post_url = "/modules/mobilecasedesignvariation.php";
    $.ajax({
        type: "POST",
        url: post_url,
        data: 'custom_options=' + myoptions + '&did=' + design_id + '&id_product=' + jQuery("#product_id").val() + '&lang_id=' + 1, //{if isset($lang_id)}{$lang_id}{/if}
        success: function (msg) {
            if (msg != '') {
                //here we get the PS product custom ipa id
                $("#ipa").val(msg);
            }
        }
    });
}
//here save desing image
function delaysaveImage(token, design_id) {
    var side = $('#sidechange').val();
    var dataURL = canvas.toDataURL();
    $.post('/modules/mobilecasedesignsaveimage.php', {
            image: dataURL, side: side, did: design_id
        },
        function (data) {
            //alert response message
        });
}

function setPatternImage(obj) {
    // var object = canvas.getActiveObject();

    if( _(canvas.getObjects()).where('name','layout').first()!==undefined) {
        var objects = _(canvas.getObjects()).where('name', 'layout');
        for(var i = 0; i<objects.__wrapped__.length;i++){
            objects.__wrapped__[i].remove();
        }
    }
    // console.log(obj);
    // console.log(canvas);
    switch (obj){
        case "layout_icon_le-cercle.png":
            var circle = new fabric.Circle(
                {
                    radius: 100,
                    left: 50,
                    name: 'layout',
                    top: 50,
                    lockMovementX: true,
                    lockMovementY: true,
                    lockScalingX: true,
                    lockScalingY: true,
                    lockRotation: true,
                    objectCaching: false,
                    opacity: 0.1
                });
            circle.set({clipFor:"circle"});
            // console.log(circle);
            canvas.add(circle);
            canvas.setActiveObject(circle);

            break;
        case "layout_icon_8rectangle.png":
            for(var i =0;i<4;i++)
            //
            // canvas.add(new fabric.Circle(
            //     {
            //         radius: 100,
            //         left: 50,
            //         name: 'layout',
            //         top: 50,
            //         lockMovementX: true,
            //         lockMovementY: true,
            //         lockScalingX: true,
            //         lockScalingY: true,
            //
            //         objectCaching: false
            //     }));
            break;
    }

}

function setClipArtImage(obj) {
    console.log(obj);
    $('#ajaxloaderart').show();
    $.ajax({
        type: "POST",
        url: '/modules/mobilecasedesign/copyimage.php',
        data: 'simage=' + obj,
        success: function (msg) {
            //success

            console.log(msg);


            if (msg != '-1') {
                setTimeout(function () {
                    addClipArtImage(msg);
                }, 1000);
                setTimeout(function () {
                    $('#ajaxloaderart').hide();
                }, 2000);
            }
            else {
                alert('Error Occured, please reload the again');
                setTimeout(function () {
                    $('#ajaxloaderart').hide();
                }, 2000);
            }
        },
    });
}

function cleanMyStoreArray() {
    for (i = 0; i < design_work_front.length; i++) {
        if (typeof design_work_front[i] != "undefined" && design_work_front[i]['id'] != '') {
            $('#' + design_work_front[i]['id']).remove();
            delete design_work_front[i];
        }
    }
    design_work_front.length = 0;

    for (i = 0; i < design_work_back.length; i++) {
        if (typeof design_work_back[i] != "undefined" && design_work_back[i]['id'] != '') {
            $('#' + design_work_back[i]['id']).remove();
            delete design_work_back[i];
        }
    }
    design_work_back.length = 0;

}



/*Added Canvas Javascrip Start From Here*/
    var canvas = window._canvas = new fabric.Canvas('design_panel'),
        f = fabric.Image.filters;
    canvas.on('object:selected', viewObject);

    function viewObject() {

        var object = canvas.getActiveObject();
        if (object && object['type'] == 'text') {

            $("#designtext").val(object['text']);
            $("#optfont").val(object['fontFamily']);

        }
        else {
           /* alert('there')*/
            $("#designtext").val('');
            $("#optfont").val('Academic');
            /*alert('here')*/
            object['fontFamily'] = 'Comic Sans Ms';
        }
    }

    var design_work_front = new Array();
    var design_work_back = new Array();

    /*function createTextToImage(){
     var uniqToken = uniqueid();
     createAjaxImage($('#designtext').val(),uniqToken);
     setTimeout(function() {
     setImageIntoPanel(uniqToken);
     }, 1000);
     }*/

    function setPosition(token) {
        var activeObject = canvas.getActiveObject();
        if (activeObject) {
            if (token == 'b') {
                canvas.sendToBack(activeObject);
            }
            else {
                canvas.bringForward(activeObject);
            }
            canvas.renderAll();
        }
    }
    function createAjaxImage(text, guid) {
        $('#ajaxloader').show();
        var str = "/modules/mobilecasedesignpng_text.php?col=" + $('#tcolor').val() + "&bg=F24B17&ft=" + $('#optfont').val() + "&guid=" + guid;
        $.ajax({
            type: "POST",
            url: str,
            data: 'str=' + text,
            success: function (msg) {
                setTimeout(function () {
                    $('#ajaxloader').hide();
                }, 2000);
            }
        });
    }

    function setImageIntoPanel(token) {
        var image_url = "/modules/mobilecasedesign/img/customImage/" + token + ".png";
        var image_name = token + '.png';
        $("#image_placeholder_" + $('#sidechange').val()).append("<div style='position:absolute;top:35%;left:38%;'><img style='width:120px;height:40px;' id=" + token + " class='resize' data-angle='0' src=" + image_url + " /></div>");
        makeObjDragAndResize(token, $('#sidechange').val());
        storeIntoArray(token, image_name, 0, 0, 0, 0, 0);
        $("#" + token).before("<div title='Delete' id=rmv_" + token + " onclick=removeImage('" + token + "'); class='delete_icon'></div>");
        //hideCorner(2);
    }

    function makeObjDragAndResize(id, box) {
        $("#" + id).resizable({
            handles: 'se',
            stop: function (event, ui) {
                //updateArrayObjectById(id,'resize_width', ui.size.width);
                //updateArrayObjectById(id,'resize_height', ui.size.height);
            }
        });
        $("#" + id).parent().draggable({
            containment: "#" + box,
            scroll: false,
            cursor: 'move',
            stop: function (event, ui) {
                //var top = jQuery("#"+id).offset().top - jQuery("#"+box).offset().top;
                //var left = jQuery("#"+id).offset().left - jQuery("#"+box).offset().left;
                //var top = 0;
                //var left = 0;
                //updateArrayObjectById(id,'drag_top', top.toFixed(2));
                //updateArrayObjectById(id,'drag_left', left.toFixed(2));
                //updateArrayObjectById(id,'drag_top', top);
                //updateArrayObjectById(id,'drag_left', left);
            }
        });
    }
    function updateArrayObjectById(id, update_key, update_value) {
        if ($('#sidechange').val() == 'front') {
            for (i = 0; i < design_work_front.length; i++) {
                if (typeof(design_work_back[i]) != 'undefined' && $.trim(design_work_front[i]['id']) == $.trim(id)) {
                    design_work_front[i][update_key] = update_value;
                }
            }
        }
        else if ($('#sidechange').val() == 'back') {
            for (i = 0; i < design_work_back.length; i++) {
                if (typeof design_work_back[i] != 'undefined' && $.trim(design_work_back[i]['id']) == $.trim(id)) {
                    design_work_back[i][update_key] = update_value;
                }
            }
        }
    }
    function storeIntoArray(id, image, drag_top, drag_left, resize_height, resize_width, rotate_angle) {
        //removeOldFromArray(id);
        var myObject = {
            'id': id,
            'image': image,
            //'drag_top' : drag_top ,
            //'drag_left' : drag_left ,
            //'resize_height' : resize_height ,
            //'resize_width' : resize_width ,
            //'rotate_angle' : rotate_angle ,
        };
        if ($('#sidechange').val() == 'front') {
            design_work_front.push(myObject);
        }
        else if ($('#sidechange').val() == 'back') {
            design_work_back.push(myObject);
        }
    }

    function removeImage(id) {
        $('#' + id).remove();
        removeOldFromArray(id);
    }
    function hideCorner(token) {
        if (token == 1) {
            jQuery('.ui-resizable-se').show();
            $(".delete_icon").show();
        }
        else {
            jQuery('.ui-resizable-se').hide();
            $(".delete_icon").hide();
        }
    }


    function removeOldFromArray(id) {
        if ($('#sidechange').val() == 'front') {
            for (i = 0; i < design_work_front.length; i++) {
                if (typeof design_work_front[i] != "undefined" && $.trim(design_work_front[i]['id']) == $.trim(id)) {
                    delete design_work_front[i];
                }
            }
        }
        else if ($('#sidechange').val() == 'back') {
            for (i = 0; i < design_work_back.length; i++) {
                if (typeof design_work_back[i] != "undefined" && $.trim(design_work_back[i]['id']) == $.trim(id)) {
                    delete design_work_back[i];
                }
            }
        }
    }

    function setImageToCanvas(img) {
    fabric.Image.fromURL(img, function (img) {
        img.set({
            left: 100,
            top: 100,
            scaleX: 0.50,
            scaleY: 0.50
        });
        img.set({
            borderColor: 'black',
            cornerColor: 'red',
            cornerSize: 8,
            borderRadius: 5
        });
        //начало ветвления
        var obj = canvas.getActiveObject();

        if(obj!=null&&obj.name==="layout"){

//////////////////////////////
            var clipByName = function (ctx) {
                this.setCoords();
                var clipRect = findByClipName(this.clipName);
                if(clipRect===undefined)
                    this.remove();
                else {
                    // console.log(this);
                    // console.log(clipRect);
                    var scaleXTo1 = (1 / this.scaleX);
                    var scaleYTo1 = (1 / this.scaleY);
                    ctx.save();

                    var ctxLeft = -( this.width / 2 );
                    var ctxTop = -( this.height / 2 );
                    // var ctxWidth = clipRect.width - clipRect.strokeWidth;
                    // var ctxHeight = clipRect.height - clipRect.strokeWidth;

                    ctx.translate(ctxLeft, ctxTop);

                    ctx.rotate(degToRad(this.angle * -1));
                    ctx.scale(scaleXTo1, scaleYTo1);
                    ctx.beginPath();
                    ctx.arc(
                        (clipRect.left - this.oCoords.tl.x) + clipRect.width / 2,
                        (clipRect.top - this.oCoords.tl.y) + clipRect.height / 2,
                        clipRect.width / 2,
                        0,
                        Math.PI * 2,
                        true
                    );
                    ctx.closePath();
                    ctx.restore();
                }
            }
            var pugImg = new Image();
            pugImg.onload = function (img) {
                var pug = new fabric.Image(pugImg, {
                    left: function (pug) {
                        return findByClipName('circle').left;
                    },
                    top: function (pug) {
                        return findByClipName('circle').top;
                    },
                    scaleX: 0.3,
                    scaleY: 0.3,
                    clipName: 'circle',
                    clipTo: function(ctx) {
                        return _.bind(clipByName, pug)(ctx)
                    }
                });
                canvas.add(pug);
            };
            pugImg.src = img._originalElement.currentSrc;
            console.log(img._originalElement.currentSrc);

            ///////////////////////////////


//            fabric.util.loadImage(img._originalElement.currentSrc, function (source) {
//
//                img.width=100;
//                img.setHeight(100);
//                img.getElement().setAttribute('width','100');
//                console.log(img.getElement());
////                console.log(img);
//                obj.setPatternFill({
//                    source: img.getElement(),
//                    repeat: "no-repeat"
//
//                });
//                canvas.renderAll();
//            });
//            console.log(obj);
        }else{
            console.log(img._originalElement.currentSrc);

            canvas.add(img);
            //canvas.sendToBack(img);
            canvas.setActiveObject(img);
        }
    });
    //setTimeout('playGame()',1000);
}
function findByClipName(name) {
    return _(canvas.getObjects()).where({
        clipFor: name
    }).first()
}
function degToRad(degrees) {
    return degrees * (Math.PI / 180);
}

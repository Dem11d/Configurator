<!--Header Part-->

<meta charset="UTF-8" />

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>Configurator</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="description" content="Configurator" />

<!--<style type="text/css">



</style>-->

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lora|Oswald" media="screen">

<link rel="stylesheet" type="text/css" href="/modules/mobilecasedesign/css/fontload.css" media="screen">

<link rel="stylesheet" type="text/css" href="/modules/mobilecasedesign/css/newcss.css" media="screen">



<script type='text/javascript' src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script type="text/javascript" language="javascript" src="/modules/mobilecasedesign/js/jquery.ajaxfileupload.js"></script>

<script type='text/javascript' src="/modules/mobilecasedesign/js/jscolor.js"></script>

<script type='text/javascript' src="/modules/mobilecasedesign/js/fabric.js"></script>

<!--<script type="text/javascript" language="javascript" src="/modules/mobilecasedesign/js/html2canvas.min.js"></script>-->

<script type="text/javascript" language="javascript" src="/modules/mobilecasedesign/js/newjs.js"></script>

<script type="text/javascript" language="javascript" src="/modules/mobilecasedesign/js/jquery.accordion.js"></script>
<script type="text/javascript" language="javascript" src="/dist/Lodash.js"></script>



<!--PDF-->

<script src='/libs/png_support/zlib.js' type='text/javascript'></script>

<script src='/libs/png_support/png.js' type='text/javascript'></script>

<script src='/libs/deflate.js' type='text/javascript'></script>

<script src='/dist/jspdf.debug.js' type='text/javascript'></script>

<!--PDF-->





<div align="center"><a title="Design Me" href="javascript:void(0);" id="design_canvas" class="button btn btn-default topopup"><span>design me</span></a>

    <div class="loader"></div>

</div>

<input type="hidden" name="product_id" id="product_id" value="{if isset($product_id)}{$product_id}{/if}"/>

<input type="hidden" name="design_code" id="design_code" value=""/>

<br/>



<div id="toPopup">

    <div class="close">Go back to the website</div>

    <div id="thumb">

    <div class="center"><a class="preview_popup" onClick="showCurrentSidePreview();"><!--<img class="zoom" onClick="showCurrentSidePreview();"
                                                           title="view" src="/modules/mobilecasedesign/preview.png"/>-->
                            <span class="icon-wiev"></span></a>
                        </div>
                        <div class="center">Preview</div>
                        <div onclick='deleteCanvasObject();' class="center"><!--<img onclick='deleteCanvasObject();' class="zoom" title="Reset"
                                  src="/modules/mobilecasedesign/img/delete.png"/>-->
                            <span class="icon-trash"></span>
                        </div>
                        <div class="center">Delete</div>

                        <div onclick="setPosition('b');" class="center"><!--<img  class="zoom" title="Sent To Back"
                                  src="/modules/mobilecasedesign/img/back.png"/>-->
                            <span class="icon-download"></span>
                        </div>
                        <div class="center">Back side</div>

                        <div onclick="setPosition('f');" class="center"><!--<img onclick="setPosition('f');" class="zoom" title="Sent To Forward"
                                  src="/modules/mobilecasedesign/img/front.png"/>-->
                            <span class="icon-upload"></span>
                        </div>
                        <div class="center">Front side</div>

                        <div onclick='saveCanvasObject();' class="center">
                            <span class="icon-floppy-disk"></span>
                        </div>
                        <div class="center">Save</div>
                        <div class="center preview_popup">
                           <span id="go" class="icon-order"></span>
                        </div>
                        <div class="center">Make Order</div>

        <!--<div id="results">вывод</div>-->
                    </div>
    <div id="popup_content" style=" font-family: 'Oswald', Helvetica, Arial, serif;">
        <!--your content start-->

        <div>
            <div class="left-sidebar-wrapper" align="center">
                <div id="tabs" class="htabs">
                    <a id="tab_0" onclick="showtab(0);" href="javascript:void(0);" class="selected"><img src="/modules/mobilecasedesign/img/add-text.png"><br/>Select Device</a>
                    <a id="tab_1" onclick="showtab(1);" href="javascript:void(0);"><img src="/modules/mobilecasedesign/img/add-text.png"><br/>Add Text</a>
                    <a onclick="showtab(2);" id="tab_2" class=""  href="javascript:void(0);"><img src="/modules/mobilecasedesign/img/upload.png"><br/>Upload</a>
                    <a onclick="showtab(3);" class="" href="javascript:void(0);" id="tab_3"><img src="/modules/mobilecasedesign/img/add-art.png"><br/>Clipart</a>
                    <a id="tab_5" onclick="showtab(5);" href="javascript:void(0);"><img src="/modules/mobilecasedesign/img/add-text.png"><br/>Layout</a>
                    <a onclick="showtab(4);" class="" href="javascript:void(0);" id="tab_4"><img src="/modules/mobilecasedesign/img/bg.png"><br/>Background</a></div>
                <div style="clear:both"></div>
                <div class="tab_content" id="content_1">
                    <div style="clear:both;"></div>
                    <div class="header_text">Add text</div>
                    <div class="tab_inner_box"><br/>

                        <div class="table_wrapper">
                            <table id="left_panel_tab_content" class="left_panel_tab_content">
                                <tr>
                                    <td><span>Font</span></td>
                                    <td>
                                        <?php
                                            $font_array = array(
                                                array('font' => 'Arial'),
                                                array('font' => 'Comic Sans Ms'),
                                                array('font' => 'Oswald'),
                                                array('font' => 'Tahoma'),
                                                array('font' => 'Courier New'),
                                                array('font' => 'Impact')
                                            );
                                        ?>
                                        <select id="optfont" name="optfont">
                                            <option value="Please, select Font">--Select Font--</option>
                                            <?php foreach($font_array as $foo): ?>
                                            <option value="<?=$foo['font']?>" style="font-family:<?=$foo['font']?>">
                                                <?=$foo['font']?>
                                            </option>
                                            <?php endforeach ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span>Color</span></td>

                                    <td><input type="text" size="23" id="tcolor" class="color"/></td>
                                </tr>
                                <tr>
                                    <td valign="top"><span>Text</span></td>
                                    <td><textarea name="designtext" placeholder="Write Your Text" id="designtext" rows="7"
                                                  cols="20"></textarea></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td><input type="button" value="Add Text" onClick="createTextToImage();"/>
                                        &nbsp;&nbsp; <img src="/modules/mobilecasedesign/img/loader.gif" id="ajaxloader"
                                                          style="display:none;"/></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab_content" id="content_0">
                                    <div style="clear:both;"></div>
                                    <div class="header_text">Choose your device</div>
        <div class="tab_inner_box tabs">
        <div style="clear:both;"></div>
        <ul class="device-category-list clearfix reset-list tabs-nav">
        <li class="block f-left active">
        <a class="device-category-btn table f-width f-height border-right border-bottom text-default" href="#" data-device-category="1">
        <div class="t-cell f-height vertical-middle text-center">
            <div>
              <img class="block centerize flex-img" src="/modules/mobilecasedesign/img/iphone.png" alt="iPhone">
              <span class="f-width">iPhone</span>
            </div>
        </div>
        </a>
        </li>

        <li class="block f-left">
        <a class="device-category-btn table f-width f-height border-right border-bottom text-default" href="#" data-device-category="2">
            <div class="t-cell f-height vertical-middle text-center">
            <div>
                <img class="block centerize flex-img" src="/modules/mobilecasedesign/img/android.png" alt="Android">
                <span class="f-width">Android</span>
            </div>
            </div>
        </a>
        </li>
        </ul>
            <div class="tabs-box">
                <div class="active">
                    <div class="modul">
                        <?php foreach ($params['device_coll'] as $device):?>
                        <div class="floatL phone_wrap"><a href="javascript:void(0);" onclick="setStartImage('img/customImage/device/<?= $device['device'] ?>');">
                                <span id="filename" ><?=$device['phone_name']?> - <?=$device['phone_version']?></span>
                                <img width="65" height="120" data-url="<?=$device['device']?>" src="/img/customImage/device/<?= $device['device'] ?>"></a></div>

                         <?php endforeach; ?>
                    </div>
                </div>
                <div>
                    <div class="modul">
                        <?php foreach ($params['device_android'] as $android):?>
                        <div class="floatL phone_wrap"><a href="javascript:void(0);" onclick="setStartImage('img/customImage/android/<?= $android['android'] ?>');">
                                <span id="filename" ><?=$android['phone_name']?> - <?=$android['phone_version']?></span>
                                <img width="65" height="120" data-url="<?=$device['device']?>" src="/img/customImage/android/<?= $android['android'] ?>"></a></div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
                </div>

                <div class="tab_content" id="content_2">
                    <div class="header_text">Upload Image</div>
                    <div class="tab_inner_box"><br/>
                        <div>
                            <div class="qq-upload-button" style="position: relative; overflow: hidden; direction: ltr;">
                                Select Image
                                <input type="file" name="fileToUpload" id="fileToUpload"
                                       style="position: absolute; right: 0px; top: 0px; font-family: Arial; font-size: 118px; margin: 0px; padding: 0px; cursor: pointer; opacity: 0;">
                            </div>
                            <div style="margin-top:10px;"><img src="/modules/mobilecasedesign/img/al.gif" id="ajaxloader2" style="display:none;"/></div>
                        </div>
                    </div>
                </div>

                <div class="tab_content" id="content_3">
                    <div class="header_text">Select Clipart</div>
                    <div class="tab_inner_box"><br/>
                        <div style="margin-left:7px;">
                            <?php
                                            foreach ($params['clipart_array'] as $clipart):?>
                                                <div style="float:left;padding:5px;"><a href="javascript:void(0);"
                                                                                        onclick="setClipArtImage('/img/customImage/clipart/<?= $clipart['clipart'] ?>');"><img
                                                                 height="85"
                                                            src="/img/customImage/clipart/<?= $clipart['clipart'] ?>"></a></div>
                                            <?php endforeach; ?>
                            <div style="clear:both;"></div>
                            <img src="/modules/mobilecasedesign/img/loader.gif" id="ajaxloaderart" style="display:none;"/>
                        </div>
                    </div>
                </div>
                <div class="tab_content" id="content_4">
                                    <div style="clear:both;"></div>
                                    <div class="header_text">Background</div>
                                    <div class="tab_inner_box"><br/>
                                        <div style="margin-left:7px;">
                                            <?php foreach ($params['design_array'] as $clipart): ?>
                                                <div style="float:left;padding:5px;"><a href="javascript:void(0);"
                                                                                        onclick="setClipArtImage('/img/customImage/design_bg/<?= $clipart['clipart'] ?>');"><img
                                                            width="150" height="150"
                                                            src="/img/customImage/design_bg/<?= $clipart['clipart'] ?>"></a></div>
                                            <?php endforeach; ?>
                                            <div style="clear:both;"></div>
                                        </div>

                                    </div>
                 </div>
                <div class="tab_content" id="content_5">
                    <div style="clear:both;"></div>
                    <div class="header_text">Layout</div>
                    <div class="tab_inner_box"><br/>
                        <div style="margin-left:7px;">
                            <?php foreach ($params['patterns'] as $pattern): ?>
                                <div style="float:left;padding:5px;"><a href="javascript:void(0);"
                                                                        onclick="setPatternImage('<?= $pattern['pattern'] ?>');"><img
                                             height="150"
                                            src="/img/customImage/patterns/<?= $pattern['pattern'] ?>"></a></div>
                            <?php endforeach; ?>
                            <div style="clear:both;"></div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="main-block-wrapper">

                <div class="background_wrapper"><div style="font-family: 'Oswald', Helvetica, Arial, serif; padding-bottom: 15px">Select background</div>
                        <div class="select_background silver" onClick="setBackground1();"></div>
                        <div class="select_background rose-gold" onClick="setBackground2();"></div>
                        <div class="select_background gold" onClick="setBackground3();"></div>
                        <div class="action-case">
                        <a id="reset-btn" class="inline vertical-middle" title="reset" href="#" onClick="removeBackground();">
                            <span class="icon-spinner11"></span><br/>
                        	<div class="text-center">Reset</div>
                        </a>
                        </div>
                </div>
                <div id="design_area">
                    <div style="width:300px; margin: 0 auto;" align="center" id="me_holder">
                        <canvas height="550px" width="300px" id="myBackground" class="background"></canvas>
                        <canvas height="560px" width="280px" id="device" class="device"></canvas>
                        <canvas height="550px" width="300px" id="design_panel"></canvas>
                    </div>
                    <div align="center" style="margin-top:5px;" class="dispNone">
                        <table>
                            <tr>
                                <td><span>Quality</span>&nbsp;<input style="text-align:center;" size="3" type="text"
                                                                    name="txtQty" id="txtQty" value="1"/></td>
                                <td><a id="addmecart" class="me_button_style" href="javascript:void(0);"
                                       title="Design Me"><span>Cart</span></a></td>
                                <td>
                                    <div id="process_loader" style="display:none;"><img
                                            src="/modules/mobilecasedesign/img/al.gif"/></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                </div>

            </div>
        </div>
    </div>
    <!--your content end-->
</div>
<!--toPopup end-->

<div style="display:none;">
  <img id="source" src="https://mdn.mozillademos.org/files/5397/rhino.jpg"
       width="300" height="227">
</div>

<div class="toPopup_preview" style="display: none">
    <div class="backgroundPopup_preview"></div>
    <div class="popup_content_preview" style=" font-family: 'Oswald', Helvetica, Arial, serif;">
        <div class="close_preview"></div>
        <!--<div >Preview</div>-->
        <div class="main_preview_content"></div>
    </div>
    <!--your content end-->
</div>
<!--Popup Order-->
<div id="modal_form"><!-- Сaмo oкнo -->
      <span id="modal_close">X</span> <!-- Кнoпкa зaкрыть -->
      <!-- Тут любoе сoдержимoе -->
    <form  id="order" action="" method="post">
        <div><input name="name" type="text" placeholder="Name" required value=""/></div>
        <div><input name="email" type="email" placeholder="E-mail" required value=""></div>
        <div><input name="tel" type="tel" placeholder="Phone" value=""/></div>
        <div><textarea name="message" placeholder="Some Text..." value="" rows="5" cols="5"></textarea></div>
        <!--<input type="hidden" id="phone" value=""/>-->
        <div><input type="submit" value="Make Order"/></div>
    </form>
</div>
<div id="overlay"></div><!-- Пoдлoжкa -->

<!--<div id="backgroundPopup"></div>-->

<input type="hidden" name="sidechange" id="sidechange" value="front"/>
<input type="hidden" id="ipa" value=""/>
<script>
    $(document).ready(function() {
    	$("#order").submit(function(){
    		var form = $(this);
    		var error = false;
    		form.find('input, textarea').each( function(){
    			if ($(this).val() == '') {
    				alert('Зaпoлнитe пoлe "'+$(this).attr('placeholder')+'"!');
    				error = true;
    			}
    		});
    		if (!error) {
    			var data = form.serialize();
    			$.ajax({
    			   type: 'POST', //
    			   url: '/modules/res.php',
    			   dataType: 'json',
    			   data: data ,
    		       beforeSend: function(data) {
    		            form.find('input[type="submit"]').attr('disabled', 'disabled'); // нaпримeр, oтключим кнoпку, чтoбы нe жaли пo 100 рaз
    		          },
    		       success: function(data){ // сoбытиe пoслe удaчнoгo oбрaщeния к сeрвeру и пoлучeния oтвeтa
    		       		if (data['error']) { // eсли oбрaбoтчик вeрнул oшибку
    		       			alert(data['error']); // пoкaжeм eё тeкст
    		       		} else { // eсли всe прoшлo oк
    		       			alert('Message Send!'); // пишeм чтo всe oк
                            form.find('input,textarea').not('input[type="submit"]').val('');
                            $('#modal_form, #overlay').hide();
    		       		}
    		         },
    		       error: function (xhr, ajaxOptions, thrownError) { // в случae нeудaчнoгo зaвeршeния зaпрoсa к сeрвeру
    		            alert(xhr.status); // пoкaжeм oтвeт сeрвeрa
    		            alert(thrownError); // и тeкст oшибки
    		         },
    		       complete: function(data) { // сoбытиe пoслe любoгo исхoдa
    		            form.find('input[type="submit"]').prop('disabled', false); // в любoм случae включим кнoпку oбрaтнo

    		         }

    			     });
    		}
    		return false; // вырубaeм стaндaртную oтпрaвку фoрмы
    	});
    });



   /* function call() {
     	  var msg   = $('#order').serialize();
            $.ajax({
              type: 'POST',
              url: '/modules/res.php',
              data: msg,
              success: function(data) {
                $('#results').html(data);
              },
              error:  function(xhr, str){
    	    alert('Error. Please repeat again!: ' + xhr.responseCode);
              }
            });
        }*/
</script>
<script>
    $(document).ready(function(){

        $(".phone_wrap img").click(function(){

            $(" #myBackground").css('width', $(this).prop('naturalWidth')+ 'px');
        });
    });
    function setBackground1() {
        $("#myBackground").removeClass("rgoldB goldB").addClass("silverB");
    }
    function setBackground2() {
           $("#myBackground").removeClass("silverB goldB").addClass("rgoldB");
       }
    function setBackground3() {
           $("#myBackground").removeClass("silverB rgoldB").addClass("goldB");
       }
    function removeBackground() {
    if ( $("#myBackground").hasClass("background") ) {
        $("#myBackground").removeClass("rgoldB silverB goldB")
    }
    }
</script>



<script type="text/javascript">
    var crop = 3.071;
function setTextIntoCanvas(text, font_weight, color, font_family) {

    console.log([
        text,
        font_weight,
        color,
        font_family
    ])

    var object = new fabric.Text(text, {
        fontFamily: font_family,
        left: 100,
        top: 200,
        fontSize: 34,
        height: 100,
        lineHeight: 1,
        scaleX: 1,
        scaleY: 1,
        textAlign: 'left',
        verticalAlign: 'middle',
        width: 100,
        fill: color,
        fontWeight: font_weight
    });
    object.set({
        borderColor: 'black',
        cornerColor: 'green',
        cornerSize: 8
    });
    canvas.add(object);
    //canvas.sendToBack(object);
    canvas.setActiveObject(object);
    //setTimeout('playGame()',1000);
}

function createTextToImage() {
    if ($('#designtext').val() != '') {
        var color_code = '#' + $('#tcolor').val();
        var font_family = $('#optfont').val();
        //alert(font_family);
        var text = $('#designtext').val();
        var font_style = 'normal';
        setTextIntoCanvas(text, font_style, color_code, font_family);
    }
    else {
        alert("Text Required To add a new text");
    }
}

function setStartImage(dtoken) {
	
    console.log(dtoken);

    var imgName = dtoken.split('/');
    imgName = imgName[imgName.length-1].split('_')[0];
    console.log(imgName);
	$("#device").attr("device",imgName);

    //var spanFilename = jQuery('span#filename');
    //spanFilename.html( imgName );

    setTimeout(function () {
        if (dtoken == 1) {
            setCanvasBackgroundImage(dtoken);
        }
        else {
            setImageToCanvasBackground(dtoken);
        }
    }, 500);
}

function setCanvasBackgroundImage(image_url) {

    canvas.setOverlayImage(image_url, canvas.renderAll.bind(canvas), {
        backgroundImageOpacity: 1,
        backgroundImageStretch: false,
        width: 300,
        height: 550
    });
}
/*function setImage(side){
 $('#sidechange').val(side);
 if(side == 'front'){
 $("#b_canvas").val(JSON.stringify(canvas))
 if($("#f_canvas").val() != ''){
 canvas.clear();
 setCanvasBackgroundImage($("#front_img").val());
 canvas.loadFromJSON($("#f_canvas").val(),canvas.renderAll.bind(canvas));
 }
 else{
 canvas.clear();
 setCanvasBackgroundImage($("#front_img").val());
 }
 }
 else if(side == 'back'){
 $("#f_canvas").val(JSON.stringify(canvas))
 if($("#b_canvas").val() != ''){
 canvas.clear();
 setCanvasBackgroundImage($("#back_img").val());
 canvas.loadFromJSON($("#b_canvas").val(),canvas.renderAll.bind(canvas));
 }
 else{
 canvas.clear();
 setCanvasBackgroundImage($("#back_img").val());
 }
 }
 }*/

function setImageToCanvasBackground(img) {
    fabric.Image.fromURL(img, function (img) {
        img.set({
            width: 300*crop,
            height: 550*crop,
            hasControls: false,
            selectable: false,
            evented: false
        });
        //canvas.add(img);
        canvas.setActiveObject(img);
    });

    canvas.setOverlayImage(img, canvas.renderAll.bind(canvas));
}




function playGame() {
    var img = $("#save_current_bg").val();
    if (img != '') {
        var cv_obs = canvas.getObjects();
        for (var i = 0; i < cv_obs.length; i++) {
            if (cv_obs[i]['type'] == 'image' && cv_obs[i]['id'] == 666) {
                canvas.remove(cv_obs[i]);
            }
        }

        fabric.Image.fromURL(img, function (img) {
            img.set({
                width: 450,
                height: 450,
                selectable: false,
                evented: false,
                id: 666
            });
            canvas.add(img);
            canvas.sendToBack(img);
            canvas.setActiveObject(img);
        });
    }
}

function setCaseBg(img) {
    $("#save_current_bg").val(img);
    var cv_obs = canvas.getObjects();
    for (var i = 0; i < cv_obs.length; i++) {
        if (cv_obs[i]['type'] == 'image' && cv_obs[i]['id'] == 666) {
            canvas.remove(cv_obs[i]);
        }
    }
    playGame();
}

function getProductVariationInfo(product_id) {
    var post_url = "/modules/mobilecasedesign/getproductvariation.php";
    $.ajax({
        type: "POST",
        url: post_url,
        data: 'id_product=' + product_id + '&lang_id=' + 1, //{if isset($lang_id)}{$lang_id}{/if}
        success: function (msg) {
            if (msg != '') {
                $("#me_variation_holder").html(msg);
            }
            else {
                $("#me_variation_holder").html('');
            }
        }
    });
}

$("#optfont").change(function () {
    var object = canvas.getActiveObject();
    if (object) {
        object.set('fontFamily', $(this).val());
    }
    canvas.renderAll();
});

$("#tcolor").change(function () {
    var object = canvas.getActiveObject();
    if (object) {
        object.set('fill', $(this).val());
        object.set('fill', '#' + $(this).val());
    }
    canvas.renderAll();
});

$('#designtext').keyup(function () {
    var obj = canvas.getActiveObject();	console.log(obj);
    if (obj.fontSize) {
        obj.setText(this.value);
        canvas.renderAll();
    }
});
</script>

<script>
    var example = document.getElementById("myBackground"),
        ctx = example.getContext('2d');
        ctx.fillStyle = "transparent";
        ctx.fillRect(0, 0, example.width, example.height);

</script>
<!--<script>
    var image = document.getElementById("device"),
            ctx = image.getContext('2d');
            pic = new Image();
            pic.src = 'img/customImage/android/overlay_samsung-galaxy-s7-edge-single.png';
            pic.onload = function() {
            ctx.drawImage(pic, 0, 0);
            },

</script>-->
<!--<script>
    $(document).ready(function()
    {
        $('.toggle_img').on('click', function()
        {
            var $this = $(this);
            var currentSrc = this.href;
            var toggleSrc = $this.data("img");
            var img = $this.find('img')[0];
            img.src = toggleSrc;
            this.href = toggleSrc;
            $this.data("img", currentSrc);
            return false;
        });
    });
</script>-->
<script>
    $(document).ready(function() { // вся мaгия пoсле зaгрузки стрaницы
	$('#go').click( function(event){ // лoвим клик пo ссылки с id="go"
		event.preventDefault(); // выключaем стaндaртную рoль элементa
		$('#overlay').fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
		 	function(){ // пoсле выпoлнения предъидущей aнимaции
				$('#modal_form')
					.css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
					.animate({opacity: 1, top: '50%'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
		});
	});
	/* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
	$('#modal_close, #overlay').click( function(){ // лoвим клик пo крестику или пoдлoжке
		$('#modal_form')
			.animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
				function(){ // пoсле aнимaции
					$(this).css('display', 'none'); // делaем ему display: none;
					$('#overlay').fadeOut(400); // скрывaем пoдлoжку
				}
			);
	});
});
       </script>
<script src="/modules/mobilecasedesign/js/my-tabs.js"></script>
<script type="text/javascript" language="javascript" src="/modules/mobilecasedesign/js/canvas.js"></script>
<input type="hidden" id="save_current_bg" value=""/>
<input type="hidden" id="f_canvas" value=""/>
<input type="hidden" id="b_canvas" value=""/>
<input type="hidden" id="front_img" value=""/>
<input type="hidden" id="back_img" value=""/>
<input type="hidden" id="design_type" value="2"/>
<input type="hidden" id="f_canvas_data" value=""/>
<input type="hidden" id="b_canvas_data" value=""/>
<input type="hidden" id="added_image_count" value="0"/>

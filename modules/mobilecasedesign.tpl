<!--Header Part-->
<style type="text/css">
#backgroundPopup { 
	z-index:7777;
	position: fixed;
	display:none;
	height:100%;
	width:100%;
	background:#000000;	
	top:0px;  
	left:0px;
}
#toPopup {
    font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
    border: 10px solid #{if isset($popup_border);}{$ popup_border;}{/ if;} border-radius: 3px 3px 3px 3px;
    color: #{if isset($popup_text_color);}{$ popup_text_color;}{/ if;} display: none;
    font-size: 14px;
    background-color: #f2f2f2;
    left: 0;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 9999;
    height: 100%;
}
div.loader {
    background: url("{if isset($base_url_module)}{$base_url_module}{/if}/loading.gif") no-repeat scroll 0 0 transparent;
    height: 32px;
    width: 32px;
	display: none;
	z-index: 9999;
}
div.close {
    background: url("{if isset($base_url_module)}{$base_url_module}{/if}/closebox.png") no-repeat scroll 0 0 transparent;
    bottom: 24px;
    cursor: pointer;
    float: right;
    height: 30px;
    left: 27px;
    position: relative;
    width: 30px;
}
span.arrow {
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 7px solid #000000;
    display: block;
    height: 1px;
    left: 40px;
    position: relative;
    top: 3px;
    width: 1px;
}
div#popup_content {
    margin: 4px 7px;
}


/*For preview*/
#backgroundPopup_preview { 
	z-index:1;
	position: fixed;
	display:none;
	height:100%;
	width:100%;
	background:#000000;	
	top:0px;  
	left:0px;
}
#toPopup_preview {
	font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
    background: none repeat scroll 0 0 #FFFFFF;
    border: 10px solid #ccc;
    border-radius: 3px 3px 3px 3px;
    color: #333333;
    display: none;
	font-size: 14px;
    left: 50%;
    margin-left: -200px;
    position: fixed;
    top: 20%;
    width: 400px;
    z-index: 9999;
}
div.loader_preview {
    background: url("{if isset($base_url_module)}{$base_url_module}{/if}/loading.gif") no-repeat scroll 0 0 transparent;
    height: 32px;
    width: 32px;
	display: none;
	z-index: 9999;
}
div.close_preview {
    background: url("{if isset($base_url_module)}{$base_url_module}{/if}/closebox.png") no-repeat scroll 0 0 transparent;
    bottom: 24px;
    cursor: pointer;
    float: right;
    height: 30px;
    left: 27px;
    position: relative;
    width: 30px;
}
span.arrow {
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 7px solid #000000;
    display: block;
    height: 1px;
    left: 40px;
    position: relative;
    top: 3px;
    width: 1px;
}
div#popup_content_preview {
    margin: 4px 7px;
}
/**/

#front {
	width:350px;
	height:350px;
	margin:auto;
	box-shadow:0px 0px 20px #000;
	border-radius:14px;
	display:none;
}
#back {
	width:350px;
	height:350px;
	margin:auto;
	box-shadow:0px 0px 20px #000;
	border-radius:14px;
	display:none;
}
#design_area {
	width:100%;
	height:57%;
	margin-top:5%;
	text-align:center;
	clear:both;
}
#image_placeholder_front {
	/*background:url('{if isset($front_image)}{$front_image}{/if}') no-repeat;*/
	width:350px;
	height:350px;
	background-position:center;
}
#image_placeholder_back {
	background:url('{if isset($back_image)}{$back_image}{/if}') no-repeat;
	width:350px;
	height:350px;
	background-position:center;
}
#thumb {
	position:absolute;
	right:0;
	top:0;
	margin-right:7px;
	margin-top:40px;
	font-size:11px;
}
/*#thumb .t_image {
	width:40px;
	height:45px;
	margin:5px;
	font-size:10px;
}
#thumb img {
	width:27.5px;
	height:32.87px;
	outline:none !important;
}*/
.zoom {
	width:28px;
	height:28px;
	-moz-transition:-moz-transform 0.1s ease-in;
	-webkit-transition:-webkit-transform 0.1s ease-in;
	-o-transition:-o-transform 0.1s ease-in;
	position:absolute;
	cursor:pointer;
}
.zoom:hover {
	-moz-transform:scale(3);
	-webkit-transform:scale(3);
	-o-transform:scale(3);
	position:absolute;
	z-index:9000000;
}

.tab_inner_box {
	margin-left:8px;
}
/*Tab*/
	.htabs {
	/*padding: 0px 0px 0px 10px;*/
	padding: 0px 0px 0px 0px;
	height: 30px;
	line-height: 16px;
	/*border-bottom: 1px solid #DDDDDD;*/
	margin-bottom: 15px;
	margin-left:2px;
}
.htabs a {
	border: 1px solid #CCC;
	background: #ffffff;
	padding: 7px 15px 6px 15px;
	float: left;
	font-size: 11px;
	text-align: center;
	text-decoration: none;
	color: #000;
	margin-right: 2px;
	/*border-radius:8px;
	-moz-border-radius: 8px;
    -webkit-border-radius: 8px;
    -khtml-border-radius: 8px;*/
	padding-bottom: 6px;
}
.htabs a.selected {
	padding-bottom: 6px;
	/*background: #ccc;*/
	/*-moz-border-radius: 8px;
    -webkit-border-radius: 8px;
    -khtml-border-radius: 8px;
    border-radius: 8px;*/
	/*background:#5fc3c4 !important;*/
}
.tab_common{
	padding-bottom: 6px;
	background: #ccc;
	-moz-border-radius: 8px;
    -webkit-border-radius: 8px;
    -khtml-border-radius: 8px;
    border-radius: 8px;
}
.header_text {
	margin-left:8px;
	font-size:18px;
	text-align:center;
	color:#00CCFF;
	margin-top:15px;
}
#left_panel_tab_content td, table th{
	 padding-top:5px !important;
}
.tab_content{
	display:none;
}
#tab_1,#tab_2,#tab_3,#tab_4{
	background:none;
}
#content_1{
	display:inline;
}
#tab_1{
	background:#5fc3c4;
}
.delete_icon{
	background:url('{if isset($base_url_module)}{$base_url_module}{/if}/img/trash.png');
	width:11px;
	height:14px;
	display:none;
	background-repeat:no-repeat;
	z-index:10000;
	position:absolute;
	cursor:pointer;
}
.me_button_style {
    background: linear-gradient(to bottom, #{if isset($cart_bg_color)}{$cart_bg_color}{/if} 5%, #{if isset($cart_bg_color)}{$cart_bg_color}{/if} 100%) repeat scroll 0 0 #{if isset($cart_bg_color)}{$cart_bg_color}{/if};
    border: 1px solid #{if isset($cart_bg_color)}{$cart_bg_color}{/if};
    border-radius: 3px;
    box-shadow: 0 1px 0 0 #{if isset($cart_bg_color)}{$cart_bg_color}{/if} inset;
    color: #{if isset($cart_text_color)}{$cart_text_color}{/if};
    cursor: pointer;
    display: inline-block;
    font-family: arial;
    font-size: 13px;
    padding: 6px 24px;
    text-decoration: none;
    text-shadow: 0 1px 0 rgb(21, 70, 130);
}
.me_button_style:hover {
    color: #{if isset($cart_text_color)}{$cart_text_color}{/if};
    text-decoration: none;
}
.me_button_style:visited {
    color: #{if isset($cart_text_color)}{$cart_text_color}{/if};
    text-decoration: none;
}
div.uploader{
	opacity:0;
	position:absolute !important;
	top:0px !important;
}
.qq-upload-button{
	background:#{if isset($button_bg_color)}{$button_bg_color}{/if} !important;
	color:#{if isset($button_text_color)}{$button_text_color}{/if} !important;
}
</style>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lora|Oswald" media="screen">
<link rel="stylesheet" type="text/css" href="{if isset($base_url_module)}{$base_url_module}{/if}css/fontload.css" media="screen">
<script type='text/javascript' src="{if isset($base_url_module)}{$base_url_module}{/if}js/jscolor.js"></script>
<script type='text/javascript' src="{if isset($base_url_module)}{$base_url_module}{/if}js/fabric.js"></script>
<script type="text/javascript" language="javascript" src="{if isset($base_url_module)}{$base_url_module}{/if}js/html2canvas.min.js"></script>

<script type="text/javascript">
jQuery(function($) {	
	$("a.topopup").click(function() {
			loading(); // loading
			setTimeout(function(){ // then show popup, deley in .5 second
				loadPopup(); // function show popup
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				var uId = uniqueid();
				$('#txtQty').val(1);
				$("#design_code").val(uId);
				setStartImage({if isset($design_type)}{$design_type}{/if});
			}, 500); // .5 second
	return false;
	});
	
	/* event for close the popup */
	$("div.close").hover(
		function() {
			$('span.ecs_tooltip').show();
		},
		function () {
			$('span.ecs_tooltip').hide();
		}
	);
	
	$("div.close").click(function() {
		var iAnswer = confirm("If you close this popup then you can loose your design so are you sure want to close popup ?");
		if(iAnswer){
			cleanMyStoreArray();
			disablePopup();  // function close pop up	
		}
	});
	
	$(this).keyup(function(event) {
		if (event.which == 27) { // 27 is 'Ecs' in the keyboard
			disablePopup();  // function close pop up
		}  	
	});
	
	$("div#backgroundPopup").click(function() {
		disablePopup();  // function close pop up
	});
	
	/************** start: functions. **************/
	function loading() {
		$("div.loader").show();  
	}
	function closeloading() {
		$("div.loader").fadeOut('normal');  
	}
	
	var popupStatus = 0; // set value
	
	function loadPopup() { 
		if(popupStatus == 0) { // if value is 0, show popup
			closeloading(); // fadeout loading
			$("#toPopup").fadeIn(0500); // fadein popup div
			$("#backgroundPopup").css("opacity", "0.7"); // css opacity, supports IE7, IE8
			$("#backgroundPopup").fadeIn(0001); 
			popupStatus = 1; // and set value to 1
		}	
	}
		
	function disablePopup() {
		if(popupStatus == 1) { // if value is 1, close popup
			$("#toPopup").fadeOut("normal");  
			$("#backgroundPopup").fadeOut("normal");  
			popupStatus = 0;  // and set value to 0
		}
	}
	
	$('#front').show();
	/************** end: functions. **************/
	
	/*Preview Popup*/
	$("a.preview_popup").click(function() {
			loading_preview(); // loading
			setTimeout(function(){ // then show popup, deley in .5 second
				loadPopupPreview(); // function show popup
			}, 100); // .5 second
	return false;
	});
	
	/* event for close the popup */
	$("div.close_preview").hover(
		function() {
			$('span.ecs_tooltip').show();
		},
		function () {
			$('span.ecs_tooltip').hide();
		}
	);
	
	$("div.close_preview").click(function() {
		disablePopupPreview();
	});
	
	$(this).keyup(function(event) {
		if (event.which == 27) { // 27 is 'Ecs' in the keyboard
			disablePopupPreview();  // function close pop up
		}  	
	});
	
	$("div#backgroundPopup_preview").click(function() {
		disablePopupPreview();  // function close pop up
	});
	
	/************** start: functions. **************/
	function loading_preview() {
		$("div.loader_preview").show();  
	}
	function closeloadingPreview() {
		$("div.loader_preview").fadeOut('normal');  
	}
	
	var popupStatusPreview = 0; // set value
	
	function loadPopupPreview() { 
		if(popupStatusPreview == 0) { // if value is 0, show popup
			closeloadingPreview(); // fadeout loading
			$("#toPopup_preview").fadeIn(0500); // fadein popup div
			$("#backgroundPopup_preview").css("opacity", "0.7"); // css opacity, supports IE7, IE8
			$("#backgroundPopup_preview").fadeIn(0001); 
			popupStatusPreview = 1; // and set value to 1
		}	
	}
		
	function disablePopupPreview() {
		if(popupStatusPreview == 1) { // if value is 1, close popup
			$("#toPopup_preview").fadeOut("normal");  
			$("#backgroundPopup_preview").fadeOut("normal");  
			popupStatusPreview = 0;  // and set value to 0
		}
	}
	/**/
	
	
}); // jQuery End


function uniqueid(){
    var idstr=String.fromCharCode(Math.floor((Math.random()*25)+65));
    do {                
        var ascicode=Math.floor((Math.random()*42)+48);
        if (ascicode<58 || ascicode>64){
            idstr+=String.fromCharCode(ascicode);    
        }                
    } while (idstr.length<32);

    return (idstr);
}
function showtab(obj){
	$("#tab_1").css('background','#fff');
	$("#tab_2").css('background','#fff');
	$("#tab_3").css('background','#fff');
	$("#tab_4").css('background','#fff');
	
	$(".tab_content").hide();
	$("#content_"+obj).show();
	$("#tab_"+obj).css('background','#5fc3c4');
}
</script>
<!--End Header Part-->

{if $is_custom_product == 1 }
<div align="center"> <a title="Design Me" href="javascript:void(0);" id="design_canvas" class="button btn btn-default topopup"><span>{if isset($design_me_button)}{$design_me_button}{/if}</span></a>
  <div class="loader"></div>
</div>
<input type="hidden" name="product_id" id="product_id" value="{if isset($product_id)}{$product_id}{/if}" />
<input type="hidden" name="design_code" id="design_code" value="" />
<br/>
{/if}
<div id="toPopup">
  <div class="close"></div>
  <div id="popup_content" style=" font-family: 'Oswald', Helvetica, Arial, serif;">
    <!--your content start-->
    <div style="font-size:20px;color:#0099FF;margin:15px 0px 15px 0px;text-decoration:{if isset($popup_top_text_underline)}{$popup_top_text_underline}{/if};" align="center">{if isset($popup_top_text)}{$popup_top_text}{/if}</div>
    <div style="width:870px;height:450px;margin-left:10px;">
      <div style="height:510px;width:350px;border:solid 1px #CCCCCC;float:left;padding-top:5px;" align="center">
        <div id="tabs" class="htabs"> <a style="outline:none !important;" id="tab_1" onclick="showtab(1);" href="javascript:void(0);" class="selected"><img src="{if isset($base_url_module)}{$base_url_module}{/if}/img/add-text.png"><br/>{if isset($popup_tab_text_1)}{$popup_tab_text_1}{/if}</a> <a style="outline:none !important;" onclick="showtab(2);" id="tab_2" class="selected" href="javascript:void(0);"><img src="{if isset($base_url_module)}{$base_url_module}{/if}/img/upload.png"><br/>{if isset($popup_tab_text_2)}{$popup_tab_text_2}{/if}</a><a style="outline:none !important;" onclick="showtab(3);" class="selected" href="javascript:void(0);" id="tab_3"><img src="{if isset($base_url_module)}{$base_url_module}{/if}/img/add-art.png"><br/>{if isset($popup_tab_text_3)}{$popup_tab_text_3}{/if}</a> <a style="outline:none !important;" onclick="showtab(4);" class="selected" href="javascript:void(0);" id="tab_4"><img src="{if isset($base_url_module)}{$base_url_module}{/if}/img/bg.png"><br/>{if isset($popup_tab_text_4)}{$popup_tab_text_4}{/if}</a> </div>
        <div style="clear:both"></div>
		<div class="tab_content" id="content_1">
          <div style="clear:both;"></div>
		  <div class="header_text">{if isset($popup_tab_1_heading_text)}{$popup_tab_1_heading_text}{/if}</div>
          <div class="tab_inner_box"> <br />
            <div>
              <table id="left_panel_tab_content">
                <tr>
                  <td><span>{if isset($popup_tab_1_content_text_1)}{$popup_tab_1_content_text_1}{/if}</span></td>
                  <td>
				  <select id="optfont" name="optfont" style="height:27px;">
                      <option value="-1">--Select Font--</option>
                      {foreach from=$font_array item=foo}
					  	<option value="{$foo.font}" style="font-family:{$foo.font};font-size:18px;">{$foo.font}</option>
					  {/foreach}
                    </select>
					
					</td>
                </tr>
                <tr>
                  <td><span>{if isset($popup_tab_1_content_text_2)}{$popup_tab_1_content_text_2}{/if}</span></td>
                  <td><input type="text" size="23" id="tcolor"  class="color" style="border: 1px solid rgb(189, 194, 201);" /></td>
                </tr>
                <tr>
                  <td valign="top"><span>{if isset($popup_tab_1_content_text_3)}{$popup_tab_1_content_text_3}{/if}</span></td>
                  <td><textarea name="designtext" placeholder="Write Your Text" style="border: 1px solid rgb(189, 194, 201);" id="designtext" rows="2" cols="20"></textarea></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><input style="border: 1px solid #{if isset($button_text_color)}{$button_text_color}{/if};padding:4px;background:#{if isset($button_bg_color)}{$button_bg_color}{/if};color:#{if isset($button_text_color)}{$button_text_color}{/if};" type="button" value="{if isset($popup_tab_1_content_text_4)}{$popup_tab_1_content_text_4}{/if}" onClick="createTextToImage();" />
                    &nbsp;&nbsp; <img src="{if isset($base_url_module)}{$base_url_module}{/if}/img/al.gif" id="ajaxloader" style="display:none;" /></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
		
		
		<div class="tab_content" id="content_4">
			<div style="clear:both;"></div>
          <div class="header_text">{if isset($popup_tab_4_heading_text)}{$popup_tab_4_heading_text}{/if}</div>
          <div class="tab_inner_box"> <br />
            
			
			<div style="margin-left:7px;"> 
				{foreach from=$bg_coll item=foox}
				<div style="float:left;padding:5px;"><a href="javascript:void(0);" onclick="setCaseBg('{if isset($root_path)}{$root_path}{/if}img/customImage/design_bg/{$foox.clipart}');"><img width="50" height="50" src="{if isset($root_path)}{$root_path}{/if}img/customImage/design_bg/{$foox.clipart}"></a></div>
				{/foreach}
				<div style="clear:both;"></div>
			</div>
			
          </div>
        </div>
		
		
        <div class="tab_content" id="content_2">
          <div class="header_text">{if isset($popup_tab_2_heading_text)}{$popup_tab_2_heading_text}{/if}</div>
          <div class="tab_inner_box"> <br />
            <div>
              <div class="qq-upload-button" style="position: relative; overflow: hidden; direction: ltr;">{if isset($popup_tab_2_content_text_1)}{$popup_tab_2_content_text_1}{/if}
                <input onchange="savepic();" type="file" name="fileToUpload" id="fileToUpload" style="position: absolute; right: 0px; top: 0px; font-family: Arial; font-size: 118px; margin: 0px; padding: 0px; cursor: pointer; opacity: 0;">
              </div>
              <div style="margin-top:10px;"><img src="{if isset($base_url_module)}{$base_url_module}{/if}/img/al.gif" id="ajaxloader2" style="display:none;" /></div>
            </div>
          </div>
        </div>
        <div class="tab_content" id="content_3">
          <div class="header_text">{if isset($popup_tab_3_heading_text)}{$popup_tab_3_heading_text}{/if}</div>
          <div class="tab_inner_box"> <br />
            <div style="margin-left:7px;"> 
				{foreach from=$clipart_array item=foo}
				<div style="float:left;padding:5px;"><a href="javascript:void(0);" onclick="setClipArtImage('{if isset($root_path)}{$root_path}{/if}img/customImage/clipart/{$foo.clipart}');"><img width="50" height="50" src="{if isset($root_path)}{$root_path}{/if}img/customImage/clipart/{$foo.clipart}"></a></div>
				{/foreach}
				<div style="clear:both;"></div>
				<img src="{if isset($base_url_module)}{$base_url_module}{/if}/img/al.gif" id="ajaxloaderart" style="display:none;" />
			</div>
          </div>
        </div>
      </div>
      <div style="height:510px;width:450px;border:solid 1px #CCCCCC;;float:left;position:relative;">
		<div id="design_area">
		  <div style="width:450px;" align="center" id="me_holder"><canvas height="350px" width="350px" id="design_panel"></canvas></div>
		  
		  <div align="center" style="margin-top:5px;">
		  	<table>
				<tr>
					<td><span>{if isset($quantity_text)}{$quantity_text}{/if}</span>&nbsp;<input style="text-align:center;" size="3" type="text" name="txtQty" id="txtQty" value="1" /></td>
					<td><a id="addmecart" class="me_button_style" href="javascript:void(0);" title="Design Me"><span>{if isset($popup_cart_text)}{$popup_cart_text}{/if}</span></a></td>
					<td><div id="process_loader" style="display:none;"><img src="{if isset($base_url_module)}{$base_url_module}{/if}/img/al.gif" /></div></td>
				</tr>
			</table>
		   </div>
		  <br/>
        </div>
        <div id="thumb">
          
          <div><a class="preview_popup"><img class="zoom" onClick="showCurrentSidePreview();" title="view" src="{if isset($base_url_module)}{$base_url_module}{/if}/preview.png" /></a></div>
          <div style='margin-top:30px'>{if isset($popup_view_text)}{$popup_view_text}{/if}</div>
		  <div><img onclick='deleteCanvasObject();' class="zoom" title="Reset" src="{if isset($base_url_module)}{$base_url_module}{/if}/img/delete.png" /></div>
          <div style='margin-top:30px'>{if isset($popup_reset_text)}{$popup_reset_text}{/if}</div>
		  
		  <div><img onclick="setPosition('b');" class="zoom" title="Sent To Back" src="{if isset($base_url_module)}{$base_url_module}{/if}/img/back.png" /></div>
          <div style='margin-top:30px'>{if isset($back_text)}{$back_text}{/if}</div>
		  
		  <div><img onclick="setPosition('f');" class="zoom" title="Sent To Forward" src="{if isset($base_url_module)}{$base_url_module}{/if}/img/front.png" /></div>
          <div style='margin-top:30px'>{if isset($front_text)}{$front_text}{/if}</div>
		  
        </div>
      </div>
    </div>
  </div>
  <!--your content end-->
</div>
<!--toPopup end-->

<div id="toPopup_preview">
  <div class="close_preview"></div>
  <div id="popup_content_preview" style=" font-family: 'Oswald', Helvetica, Arial, serif;">
  <div style="font-size:18px;color:#0099FF;margin:15px 0px 15px 0px;text-decoration:underline;" align="center">Preview</div>
    <div id="main_preview_content"></div>
  </div>
  <!--your content end-->
</div>



<div id="backgroundPopup"></div>
<div id="backgroundPopup_preview"></div>
<input type="hidden" name="sidechange" id="sidechange" value="front" />
<input type="hidden" id="ipa" value="" />
<script type="text/javascript">

  /*Added Canvas Javascrip Start From Here*/
  	var canvas = window._canvas = new fabric.Canvas('design_panel'),
      f = fabric.Image.filters;
	canvas.on('object:selected', viewObject);
	
	function viewObject(){
		var object = canvas.getActiveObject();
		if(object && object['type'] == 'text'){
			$("#designtext").val(object['text']);
			$("#optfont").val(object['fontFamily']);
		}
		else{
			$("#designtext").val('');
			$("#optfont").val('Academic');
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

function setPosition(token){
	var activeObject = canvas.getActiveObject();
	if(activeObject){
		if(token == 'b'){
			canvas.sendToBack(activeObject);
		}
		else{
			canvas.bringForward(activeObject);
		}
		canvas.renderAll();
	}
}
function createAjaxImage(text,guid){
	$('#ajaxloader').show();
	var str = "{if isset($base_url_module)}{$base_url_module}{/if}png_text.php?col=" + $('#tcolor').val() + "&bg=F24B17&ft=" + $('#optfont').val() + "&guid=" + guid;
	$.ajax({
		type: "POST",
		url: str,
		data: 'str=' + text,
		success: function(msg) {
			setTimeout(function() {
			  $('#ajaxloader').hide();
			}, 2000);
		},
	});
}

function setImageIntoPanel(token){
	var image_url = "{if isset($root_path)}{$root_path}{/if}img/customImage/" + token + ".png";
	var image_name = token + '.png';
	$("#image_placeholder_" + $('#sidechange').val()).append("<div style='position:absolute;top:35%;left:38%;'><img style='width:120px;height:40px;' id="+ token +" class='resize' data-angle='0' src="+ image_url +" /></div>");	
	makeObjDragAndResize(token,$('#sidechange').val());
	storeIntoArray(token,image_name,0,0,0,0,0);
	$("#"+token).before("<div title='Delete' id=rmv_" + token +" onclick=removeImage('" + token + "'); class='delete_icon'></div>");
	//hideCorner(2);
}
function makeObjDragAndResize(id,box){
    $("#"+id).resizable({
		handles: 'se',
		stop: function( event, ui ) {
			//updateArrayObjectById(id,'resize_width', ui.size.width);
			//updateArrayObjectById(id,'resize_height', ui.size.height);
		}
	});
	$("#"+id).parent().draggable({
        containment: "#" + box,
		scroll: false,
		cursor: 'move',
		stop: function(event, ui) {
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
  function updateArrayObjectById(id,update_key,update_value){
	if($('#sidechange').val() == 'front'){
		for(i=0;i<design_work_front.length;i++){
			if(typeof(design_work_back[i]) !='undefined' && $.trim(design_work_front[i]['id']) == $.trim(id)){
				design_work_front[i][update_key] = update_value;
			}	
		}
	} 
	else if($('#sidechange').val() == 'back'){
		for(i=0;i<design_work_back.length;i++){
			if(typeof design_work_back[i] !='undefined' && $.trim(design_work_back[i]['id']) == $.trim(id)){
				design_work_back[i][update_key] = update_value;
			}	
		}
	}
  }
  function storeIntoArray(id,image,drag_top,drag_left,resize_height,resize_width,rotate_angle){
  	//removeOldFromArray(id);
	var myObject = {
	  'id' : id,
	  'image' : image ,
	  //'drag_top' : drag_top ,
	  //'drag_left' : drag_left ,
	  //'resize_height' : resize_height ,
	  //'resize_width' : resize_width ,
	  //'rotate_angle' : rotate_angle ,
	};
	if($('#sidechange').val() == 'front'){
		design_work_front.push(myObject);
	}
	else if($('#sidechange').val() == 'back'){
		design_work_back.push(myObject);
	}
  }
  
  function removeImage(id){
	$('#' + id).remove();
	removeOldFromArray(id);	
  }
  function hideCorner(token){
	if(token == 1){
		jQuery('.ui-resizable-se').show();
		$(".delete_icon").show();
	}
	else{
		jQuery('.ui-resizable-se').hide();
		$(".delete_icon").hide();
	}
}

function removeOldFromArray(id){
  	if($('#sidechange').val() == 'front'){
		for(i=0;i<design_work_front.length;i++){
			if(typeof design_work_front[i] != "undefined" && $.trim(design_work_front[i]['id']) == $.trim(id)){
				delete design_work_front[i];
			}
		}
	}
	else if($('#sidechange').val() == 'back'){
		for(i=0;i<design_work_back.length;i++){
			if(typeof design_work_back[i] != "undefined" && $.trim(design_work_back[i]['id']) == $.trim(id)){
				delete design_work_back[i];
			}	
		}
	}
  }
</script>
<script>        
function savepic()
{
$("#ajaxloaderart").show();
//can perform client side field required checking for "fileToUpload" field
$.ajaxFileUpload
(
{
url:'{if isset($base_url_module)}{$base_url_module}{/if}storeimage.php',
secureuri:false,
fileElementId:'fileToUpload',
dataType: 'HTML',
success: function (data, status)
{
alert(data);
if(data == -9){
	alert('Only JPG, PNG or GIF files are allowed');
	$("#ajaxloaderart").hide();
}
if(data == -10){
	alert('Check the directory Permission');
	$("#ajaxloaderart").hide();
}
if(data != -9 && data != -10){
	//send to panel
	sendImageToPanelAfterUplaod(data);
	setTimeout(function() {
		$("#ajaxloaderart").hide();
	}, 2000);
}
if(typeof(data.error) != 'undefined')
{
if(data.error != '')
{
alert(data.error);
}else
{
alert(msg); // returns location of uploaded file
}
}
},
error: function (data, status, e)
{
alert(e);
}
}
)
return false;
} 

//set i9mage into panel
function sendImageToPanelAfterUplaod(image_name){
	var token = uniqueid();
	var image_url = "{if isset($root_path)}{$root_path}{/if}img/customImage/" + image_name;	
	setImageToCanvas(image_url);
	/*$("#image_placeholder_" + $('#sidechange').val()).append("<div style='position:absolute;top:33%;left:43%;'><img style='width:80px;height:80px;' id="+ token +" class='resize' data-angle='0' src="+ image_url +" /></div>");	
	makeObjDragAndResize(token,$('#sidechange').val());
	storeIntoArray(token,image_name,0,0,0,0,0);
	$("#"+token).before("<div title='Delete' id=rmv_" + token +" onclick=removeImage('" + token + "'); class='delete_icon'></div>");
	hideCorner(2);*/
	
	
	
  }
  function showCurrentSidePreview(){
	/*html2canvas($('#image_placeholder_'+$('#sidechange').val()), {
		proxy: '{if isset($base_url_module)}{$base_url_module}{/if}js/html2canvasproxy.php',
		onrendered: function(canvas) {
			var dataURL = canvas.toDataURL("image/png");
			jQuery("#main_preview_content").html("<img src='" + dataURL + "' />");
		}
	});*/
	canvas.deactivateAll().renderAll();
	var prev_data =  canvas.toDataURL();
	jQuery("#main_preview_content").html("<img src='" + prev_data + "' />");
}

function deleteCanvasObject(){
	var obj = canvas.getActiveObject();
	if(obj){
		canvas.remove(obj);
	}
	canvas.renderAll();
}

function addClipArtImage(image_name){
	var token = uniqueid();
	var image_url = "{if isset($root_path)}{$root_path}{/if}img/customImage/" + image_name;	
	/*$("#image_placeholder_" + $('#sidechange').val()).append("<div style='position:absolute;top:33%;left:43%;'><img style='width:80px;height:80px;' id="+ token +" class='resize' data-angle='0' src="+ image_url +" /></div>");	
	makeObjDragAndResize(token,$('#sidechange').val());
	storeIntoArray(token,image_name,0,0,0,0,0);
	$("#"+token).before("<div title='Delete' id=rmv_" + token +" onclick=removeImage('" + token + "'); class='delete_icon'></div>");
	hideCorner(2);*/
	setImageToCanvas(image_url);
}

$('#addmecart').bind('click', function() {
	var qty = 1;
	var minQty = 1;
	minQty = {if isset($min_qty)}{$min_qty}{/if};
	if($('#txtQty').val() != '' && parseInt($('#txtQty').val()) > 0){
		qty = $('#txtQty').val();
	}
	if(qty >= minQty){
		$("#process_loader").show();
		var design_id = uniqueid();
		jQuery("#did_save").val(design_id);
		saveEachImage(design_id);
		setTimeout(function() {
			addMyCard(design_id,qty);
		}, 15000);
	}
	else{
		alert('{if isset($min_qty_required)}{$min_qty_required}{/if} ' + minQty);
	}
});

function addMyCard(design_id,qty){
	var custom_price = parseInt($("#added_image_count").val()) * parseFloat({if isset($custom_image_price)}{$custom_image_price}{/if});
	$.ajax({
		url: '{if isset($root_path)}{$root_path}{/if}?rand=1452930999029',
		type: 'post',
		data: 'add=1' + '&ajax_custom_price=' + custom_price + '&ajax=true' + '&controller=cart' + '&id_product=' + jQuery("#product_id").val() + '&qty=' + qty + '&token=' + $("input[name=token]").val() + '&ipa=' + $("#ipa").val(),
		dataType: 'json',
		success: function(json) {
			$("#process_loader").hide();
			window.location = '{if isset($root_path)}{$root_path}{/if}index.php?controller=order';
		}
	});
}
//reset canvas
$('#resetme').bind('click', function() {
	if($('#sidechange').val() == 'front'){
		for(i=0;i<design_work_front.length;i++){
			if(typeof design_work_front[i] != "undefined" && design_work_front[i]['id'] != ''){
				$('#' + design_work_front[i]['id']).remove();
				delete design_work_front[i];
			}
		}
		design_work_front.length = 0;
	}
	else if($('#sidechange').val() == 'back'){
		for(i=0;i<design_work_back.length;i++){
			if(typeof design_work_back[i] != "undefined" && design_work_back[i]['id'] != ''){
				$('#' + design_work_back[i]['id']).remove();
				delete design_work_back[i];
			}	
		}
		design_work_back.length = 0;
	}
});
//set timeout for each image
function saveEachImage(design_id){
	setTimeout(function() {
		delaysaveImage(1,design_id);
	}, 1000);
	setTimeout(function() {
   		storeHidden(design_id);
	}, 7000);
	setTimeout(function() {
   		getCombinationId(design_id);
	}, 10000);
}
function storeHidden(design_id){
	 $.ajax({
	   type: "POST",
	   url: '{if isset($base_url_module)}{$base_url_module}{/if}marge.php',
	   data: 'arrayobjectfront=' + JSON.stringify(canvas) +  '&did=' + design_id,
	   dataType: 'json',
	   success: function(json) {
			//done my desing
		}
	});
}
//get relational variation id
function getCombinationId(design_id){
	var myoptions = new Array();
	$(".custom_options").each(function() {
		 myoptions.push($(this).val());
	});
	
	var post_url = "{if isset($base_url_module)}{$base_url_module}{/if}variation.php";
	$.ajax({
		type: "POST",
		url: post_url,
		data: 'custom_options=' + myoptions + '&did=' + design_id + '&id_product=' + jQuery("#product_id").val() + '&lang_id=' + {if isset($lang_id)}{$lang_id}{/if},
		success: function(msg) {
			if(msg != ''){
				//here we get the PS product custom ipa id
				$("#ipa").val(msg);
			}
		},
	});
}
//here save desing image
function delaysaveImage(token,design_id){
	var side = $('#sidechange').val();
	var dataURL = canvas.toDataURL();
	$.post('{if isset($base_url_module)}{$base_url_module}{/if}saveimage.php',{
		image: dataURL
		,side: side
		,did: design_id
	},
	function(data){
		//alert response message
	});
}

function setClipArtImage(obj){
	$('#ajaxloaderart').show();
	$.ajax({
		type: "POST",
		url: '{if isset($base_url_module)}{$base_url_module}{/if}copyimage.php',
		data: 'simage=' + obj,
		success: function(msg) {
			//success
			if(msg != '-1'){
				setTimeout(function() {
				  addClipArtImage(msg);
				}, 1000);
				setTimeout(function(){
					$('#ajaxloaderart').hide();
				}, 2000);
			}
			else{
				alert('Error Occured, please reload the again');
				setTimeout(function(){
					$('#ajaxloaderart').hide();
				}, 2000);
			}
		},
	});
  }
  
function cleanMyStoreArray(){
	for(i=0;i<design_work_front.length;i++){
		if(typeof design_work_front[i] != "undefined" && design_work_front[i]['id'] != ''){
			$('#' + design_work_front[i]['id']).remove();
			delete design_work_front[i];
		}
	}
	design_work_front.length = 0;
	
	for(i=0;i<design_work_back.length;i++){
		if(typeof design_work_back[i] != "undefined" && design_work_back[i]['id'] != ''){
			$('#' + design_work_back[i]['id']).remove();
			delete design_work_back[i];
		}	
	}
	design_work_back.length = 0;
	
}

</script>

<script type="text/javascript">	
function setTextIntoCanvas(text,font_weight,color,font_family){
	var object = new fabric.Text(text, {
        fontFamily: font_family, 
        left: 98,
        top: 70,
		fontSize: 120,
		height: 52,
		lineHeight: 1.3,
		scaleX: 0.44,
		scaleY: 0.44,
		textAlign: 'center',
		width: 358,
        fill: color,
		fontWeight: font_weight,
    });
	object.set({
	  borderColor: 'black',
	  cornerColor: 'green',
	  cornerSize: 8,
	});
    canvas.add(object);
	//canvas.sendToBack(object);
	canvas.setActiveObject(object);
	//setTimeout('playGame()',1000);
}

function createTextToImage(){
	if($('#designtext').val() != ''){
		var color_code = '#' + $('#tcolor').val();
		var font_family = $('#optfont').val();
		var text = $('#designtext').val();
		var font_style = 'normal';
		setTextIntoCanvas(text,font_style,color_code,font_family);	
	}
	else{
		alert("Text Required To add a new text");
	}
}
{*function setStartImage(dtoken){*}
	{*setTimeout(function() {*}
      {*if(dtoken == 1){*}
	  	{*setCanvasBackgroundImage('{if isset($front_image)}{$front_image}{/if}');*}
	  {*}*}
	  {*else{*}
	  	{*setImageToCanvasBackground('{if isset($front_image)}{$front_image}{/if}');*}
	  {*}*}
	{*}, 500);*}
{*}*}
function setCanvasBackgroundImage(image_url){
	canvas.setOverlayImage(image_url, canvas.renderAll.bind(canvas), {
    	backgroundImageOpacity: 0.5,
    	backgroundImageStretch: false
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
  
  
function setImageToCanvasBackground(img){        
	/*fabric.Image.fromURL(img, function(img) {
    img.set({
      width: 350,
      height: 350,
	  hasControls: false,
	  selectable: false,
	  evented: false
    });
    canvas.add(img);
	canvas.setActiveObject(img);
  });*/
  
  canvas.setOverlayImage(img, canvas.renderAll.bind(canvas));
}
  
  
function setImageToCanvas(img){
	fabric.Image.fromURL(img, function(img) {
    img.set({
      left: 100,
      top: 100
    });
	img.set({
	  borderColor: 'black',
	  cornerColor: 'green',
	  cornerSize: 8,
	});
    canvas.add(img);
	//canvas.sendToBack(img);
	canvas.setActiveObject(img);
  });
  //setTimeout('playGame()',1000);
}

function playGame(){
	var img = $("#save_current_bg").val();
	if(img != ''){
		var cv_obs = canvas.getObjects();
		for(var i = 0; i < cv_obs.length; i++){
		  if(cv_obs[i]['type'] == 'image' && cv_obs[i]['id'] == 666){
			canvas.remove(cv_obs[i]);
		  }
		}
	
		fabric.Image.fromURL(img, function(img) {
		img.set({
		  width: 350,
		  height: 350,
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

function setCaseBg(img){
	$("#save_current_bg").val(img);
	var cv_obs = canvas.getObjects();
	for(var i = 0; i < cv_obs.length; i++){
	  if(cv_obs[i]['type'] == 'image' && cv_obs[i]['id'] == 666){
		canvas.remove(cv_obs[i]);
	  }
	}
	playGame();
}

function getProductVariationInfo(product_id){
	var post_url = "{if isset($base_url_module)}{$base_url_module}{/if}getproductvariation.php";
	$.ajax({
		type: "POST",
		url: post_url,
		data: 'id_product=' + product_id + '&lang_id=' + {if isset($lang_id)}{$lang_id}{/if},
		success: function(msg) {
			if(msg != ''){
				$("#me_variation_holder").html(msg);
			}
			else{
				$("#me_variation_holder").html('');
			}
		},
	});
}

$("#optfont").change(function() {
	var object = canvas.getActiveObject();
	if(object){
      object.set( 'fontFamily', $(this).val() ) ;   
    }
	canvas.renderAll();
});

$("#tcolor").change(function() {
	var object = canvas.getActiveObject();
	if(object){
      object.set( 'fill', $(this).val() ) ;
	  object.set( 'fill', '#' + $(this).val() ) ;      
    }
	canvas.renderAll();
});

$('#designtext').keyup(function(){
	var obj = canvas.getActiveObject();
	if(obj){
		obj.setText(this.value);
		canvas.renderAll();
	}
});
</script>

<input type="hidden" id="save_current_bg" value="" />
<input type="hidden" id="f_canvas" value="" />
<input type="hidden" id="b_canvas" value="" />
<input type="hidden" id="front_img" value="" />
<input type="hidden" id="back_img" value="" />
<input type="hidden" id="design_type" value="2" />
<input type="hidden" id="f_canvas_data" value="" />
<input type="hidden" id="b_canvas_data" value="" />
<input type="hidden" id="added_image_count" value="0" />

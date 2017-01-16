<script type="text/javascript">
/*admin Order Details pagfe Image Change*/
jQuery(function($) {	
	if(jQuery("#orderProducts").length == 1){
		var design_code = '';
		jQuery('#orderProducts > tbody  > tr').each(function() {
			var yyy = jQuery(this).find('a span').text();
			var xCode = yyy.split(':');
			var img_src = jQuery(this).find('.img-thumbnail');  
			if(xCode.length > 1 && xCode[1].trim() != '' && xCode[1].trim().length == 32){
				//here we got the custom ID
				img_src.attr('src', '{if isset($base_url_marge_image)}{$base_url_marge_image}{/if}' + xCode[1].trim() + '__front.png');
				jQuery(this).find('a').after("<a onclick=loadDesignInfoPopup('"+xCode[1].trim()+"'); style='color:red;font-weight:bold;font-szie:14px;' href='javascript:void(0);'>Custom Design Info</a><br/><span id='"+xCode[1].trim()+"'><span>");
				loadCustomVariationInfo(xCode[1].trim());
			}
			img_src.css('width','60px');
			img_src.css('height','60px');
		});
	}
});


function loadCustomVariationInfo(xcode){
	var post_url = "{if isset($base_url_module)}{$base_url_module}{/if}getvariationinfo.php";
	$.ajax({
		type: "POST",
		url: post_url,
		data: 'did=' + xcode,
		success: function(msg) {
			if(msg != ''){
				$("#"+xcode).html(msg);
			}
		},
	});
}


function loadDesignInfoPopup(xcode){
	var post_url = "{if isset($base_url_module)}{$base_url_module}{/if}custominfo.php";
	$.ajax({
		type: "POST",
		url: post_url,
		data: 'did=' + xcode,
		success: function(msg) {
			if(msg != ''){
				$("#designitpopup").html(msg);
				jQuery("#designitpopup").dialog({
				 modal: true
				 , width: 550
				 , height: 550
				});
				loadTab();
			}
		},
	});
}
function makeme300dpi(source){
	$("#ploader").show();
	var post_url = "{if isset($base_url2)}{$base_url2}{/if}admin300DPI.php";
	$.ajax({
		type: "POST",
		url: post_url,
		data: 'design_id=' + source,
		success: function(msg) {
			//done 300DPI
			var fileURL = msg;
			var fileName = source + '_300dpi.pdf';
			SaveToDisk(fileURL,fileName);
			$("#ploader").hide();
		},
	});
}
function SaveToDisk(fileUrl, fileName) {
    var hyperlink = document.createElement('a');
    hyperlink.href = "{if isset($base_url2)}{$base_url2}{/if}" + fileUrl;
    hyperlink.target = '_blank';
    hyperlink.download = fileName || fileUrl;

    var mouseEvent = new MouseEvent('click', {
        view: window,
        bubbles: true,
        cancelable: true
    });

    hyperlink.dispatchEvent(mouseEvent);
    (window.URL || window.webkitURL).revokeObjectURL(hyperlink.href);
}
function printDiv(divID) {
	var divElements = document.getElementById(divID).innerHTML;
	var win = window.open("", "_blank", "height=500,width=550");
	win.document.write("<html><head><title>Custom Design Print</title></head><body style='background:black';><br/><br/><div align='center'>" + divElements + "</div><br/><br/><div align='center'><a style='color:red;font-weight:bold;' href='javascript:void(0);' onclick='window.print();return false;'>Print</a></div></body></html>");
}
function loadTab(){
	$( "#tabs" ).tabs();
}
</script>
<style type="text/css">
.me_button_style{
	box-shadow: 0px 1px 0px 0px rgb(84, 163, 247) inset; 
	background: linear-gradient(to bottom, rgb(0, 125, 193) 5%, rgb(0, 97, 167) 100%) repeat scroll 0% 0% rgb(0, 125, 193); 
	border-radius: 3px; border: 1px solid rgb(18, 77, 119); 
	display: inline-block; 
	cursor: pointer; 
	color: rgb(255, 255, 255); 
	font-family: arial; 
	font-size: 13px; 
	padding: 6px 24px; 
	text-decoration: none; 
	text-shadow: 0px 1px 0px rgb(21, 70, 130);
}
</style>
<div id="designitpopup" title="Design Information" style="display:none;"></div>
<div style="clear:both;">
  <h1>Add Font</h1>
  <form method="post" enctype="multipart/form-data" id="form">
  <div><input type="file" name="fileuplaod" id="fileuplaod" /></div>
  <div style="margin-top:5px;"><input type="submit" style="font-weight:bold;" value="upload Font" name="btnsubmit" id="btnsubmit" /></div>
  </form>
  <br />
  <h1>Font Collections</h1>
{foreach from=$font_array item=foo}
	<div style="margin:10px;position:relative;border-bottom:solid 1px #FF0000;" id="{$foo.id}">
		<div style="color:#000;font-weight:bold;font-size:16px;">{$foo.font}</div>
		<div style="position:absolute;top:0px;right:0px;"><a href="javascript:void(0);" onclick="removeClipart('{$foo.font}','{$foo.id}');"><img src="{if isset($module_path)}{$module_path}{/if}img/del.png"></a></div>
	</div>
{/foreach}
<script type="text/javascript">
function removeClipart(fontname,id){
	var iAnswer = confirm("Are you sure you want to delete this font ?");
	if(iAnswer){
		jQuery("#"+id).remove();
		$.ajax({
			url: '{if isset($module_path)}{$module_path}{/if}delfont.php',
			type: 'post',
			data: 'fontname=' + fontname,
			success: function(success) {
				alert('Font Delete successfully');
			}
		});
	}
}
</script>
</div>

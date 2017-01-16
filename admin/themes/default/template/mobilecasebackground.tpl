<div style="clear:both;">
  <h1>Add Mobile Background</h1>
  <form method="post" enctype="multipart/form-data" id="form">
  <div><input type="file" name="fileuplaod" id="fileuplaod" /></div>
  <div style="margin-top:5px;"><input type="submit" style="font-weight:bold;" value="upload Background" name="btnsubmit" id="btnsubmit" /></div>
  </form>
  <br />
  <h1>Background Collections</h1>
{foreach from=$clipart_array item=foo}
	<div style="width:75px;height:75px;float:left;margin:10px;position:relative;" id="{$foo.id}">
		<div><img width="75" height="75" src="{if isset($root_path)}{$root_path}{/if}img/customImage/design_bg/{$foo.clipart}"></div>
		<div style="position:absolute;top:0px;right:0px;"><a href="javascript:void(0);" onclick="removeClipart('{$foo.clipart}','{$foo.id}');"><img src="{if isset($module_path)}{$module_path}{/if}img/del.png"></a></div>
	</div>
{/foreach}
<script type="text/javascript">
function removeClipart(imgname,id){
	var iAnswer = confirm("Are you sure you want to delete this background ?");
	if(iAnswer){
		jQuery("#"+id).remove();
		$.ajax({
			url: '{if isset($module_path)}{$module_path}{/if}delbg.php',
			type: 'post',
			data: 'imgname=' + imgname,
			success: function(success) {
				alert('Background Delete successfully');
			}
		});
	}
}
</script>
</div>

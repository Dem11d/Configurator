<h4>{l s='Mobile Case Customization Setup (Please save product first)' mod='tshirtdesign'}</h4>
<div class="separation"></div>
<table id="save_custom_info">
	<tr>
		<td>
			<label>Design Product ? &nbsp;&nbsp;</label>
		</td>
		<td>
			{if $chk_is_custom == 0 }
			<input type="checkbox" id="setCustomValue" onclick="setHidden();" name="chk_is_custom" />
			{elseif $chk_is_custom == 1 }
			<input type="checkbox" id="setCustomValue" onclick="setHidden();" checked="checked" name="chk_is_custom" />
			 {/if}
			 <input type="hidden" id="hdncustom" name="hdncustom" value="{if isset($chk_is_custom)}{$chk_is_custom}{/if}" />
		</td>
	</tr>
	<tr>
		<td>
			<label>Minimum Quantity&nbsp;&nbsp;</label>
		</td>
		<td>
			<input type="text" name="min_qty" value="{if isset($min_qty)}{$min_qty}{/if}"  />
		</td>
	</tr>
	<tr>
		<td>
			<label>Front Design Image&nbsp;&nbsp;</label>
		</td>
		<td>
			<input type="file" name="file_front_image" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<div style="width:100px;height:100px;float:left;margin-top:20px;">
				<div align="center" style="width:100px;height:100px;border:solid 1px #666666;"><img style="padding-top:10px;" src="{if isset($front_image)}{$front_image}{/if}" width="85" height="85"  /></div>
				<div align="center"><b>Front Image</b></div>
			</div>
		</td>
	</tr>
</table>
<br/><br/><br/>
<div class="panel-footer">
		<button class="btn btn-default pull-right" name="submitAddproduct" type="submit"><i class="process-icon-save"></i> Save</button>
		<button style="margin-right:5px;" class="btn btn-default pull-right" name="submitAddproductAndStay" type="submit"><i class="process-icon-save"></i> Save and stay</button>
</div>

<script type="text/javascript">
function setHidden(){
	if(document.getElementById("setCustomValue").checked){
		jQuery("#hdncustom").val('1');
	}
	else{
		jQuery("#hdncustom").val('0');
	}
}
</script>

<style type="text/css">
#save_custom_info{
	font-size:12px !important;
}
#save_custom_info tr td {
	padding-top:7px !important;
}
</style>
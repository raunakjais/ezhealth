<?php
include("config/config.php");
$val=explode('~',$_GET['q']);
if($val[1]=='block')
{
	$def=explode('^',$val[0]);
?>
<script type="text/javascript" src="new_slot.js"></script>
<script type="text/javascript" src="block.js"></script>

<table width="600px"  cellpadding="0" cellspacing="0"> 
  <tr>
	<td width="222px" colspan="5">
		<iframe height="800px;" width="700px;" scrolling="yes" src="<?php if($def[1]=='next') {?> slot1.php <? } else { ?> slot.php <?php } ?>" frameborder="0">
		</iframe>
	</td> 	
  </tr>
</table>
<? } ?>
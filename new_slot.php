<?php
include("config/config.php");
$val=explode('~',$_GET['q']);
if($val[1]=='time_alot')
{
	$def=explode('^',$val[0]);
	if($def[1]=='next')
	{
		$a=7;
		$b=14;
	}
	if($def[1]=='prev')
	{
		$a=0;
		$b=7;
	}
?>
<script type="text/javascript" src="new_slot.js"></script>
<script type="text/javascript" src="block.js"></script>
<table width="685px" class="timetable">
	<tr>
		<td class="timetabH1D"> <strong>&nbsp;Time-Slots&nbsp;</strong> </td>
		<?php for($i=$a;$i<$b;$i++) { ?>
			<td class="timetabH1D"><b><?php 
			print $tomorrow = date("d/m/Y", strtotime("+ $i day"));
			?></b><br /><b>
			<?php print $day_name = date("l", strtotime("+ $i day")); ?></b>
			</td>
		<?php } ?>
	</tr>
</table>
<? } ?>
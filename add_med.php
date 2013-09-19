<?php
include("config/config.php");
$val=explode('~',$_GET['q']);
if($val[3]=='show_pres')
{
	$insert_med = mysql_query("insert into pres_medicine (BOOKING_ID,MED_NAME,DOSAGE,TIME,CUSER,CDATE) values ('".$_SESSION['booking_id']."','".$val[0]."','".$val[1]."','".$val[2]."','".$_SESSION['username']."','".date('Y-m-d')."')");
	$sel_query=mysql_query("select * from pres_medicine where BOOKING_ID='".$_SESSION['booking_id']."'");
?>
<table width="720" cellpadding="0" cellspacing="0" border="0"> 
<? while($val=mysql_fetch_object($sel_query)) { ?>
	<tr>
	  <td><input type="text" size="50" name="med1" value="<?=$val->MED_NAME?>" id="med1"  maxlength="100" class="textfild-S" /> </td>
	  <td><input type="text" size="50" name="dose1" value="<?=$val->DOSAGE?>" id="dose1"  maxlength="100" class="textfild-S" /> </td>
	  <td><select name="time1" id="time1" class="drop5">
	  		<option value="">Select Time</option>
			<option value="1" <? if($val->TIME=='1') { ?> selected="selected" <? } ?> >1</option>
			<option value="2" <? if($val->TIME=='2') { ?> selected="selected" <? } ?> >2</option>
			<option value="3" <? if($val->TIME=='3') { ?> selected="selected" <? } ?> >3</option>
			<option value="4" <? if($val->TIME=='4') { ?> selected="selected" <? } ?> >4</option>
			<option value="5" <? if($val->TIME=='5') { ?> selected="selected" <? } ?> >5</option>
			<option value="6" <? if($val->TIME=='6') { ?> selected="selected" <? } ?> >6</option>
	  </select> </td>
	</tr>
	<? } ?>
</table>
<? } ?> 

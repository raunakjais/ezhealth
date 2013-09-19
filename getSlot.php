<?php 
include("config/config.php");
$val=explode('~',$_GET['q']);
if($val[1]=='avail')
{
	$sel_slot=mysql_query("select SLOT_ID,START_TIME from slot where SLOT_ID NOT IN(select APT_TIME from booking where APT_DATE='".$val[0]."' and DOCTOR_ID='".$_SESSION['doc_id']."')");
?>
	<select name="time_sel" id="time_sel" class="drop2">
		<option value="">Select Time Slot</option>
		<? while($val=mysql_fetch_object($sel_slot)) { ?>
			<option value="<?=$val->SLOT_ID?>"><?=$val->START_TIME?></option>
		<? } ?>
	</select>
<?	
}

if($val[1]=='avail1')
{
	$val_n=explode('^',$val[0]);
	$sel_slot=mysql_query("select SLOT_ID,START_TIME from slot where SLOT_ID NOT IN(select APT_TIME from booking where APT_DATE='".$val_n[1]."' and DOCTOR_ID='".$val_n[0]."')");
?>
	<select name="time_sel1" id="time_sel1" class="drop2">
		<option value="">Select Time Slot</option>
		<? while($val=mysql_fetch_object($sel_slot)) { ?>
			<option value="<?=$val->SLOT_ID?>"><?=$val->START_TIME?></option>
		<? } ?>
	</select>
<?	
}
?>


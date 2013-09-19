<?php 
include("config/config.php");
include("config/function.php");
$val=explode('~',$_GET['q']);
if($val[1]=='fam')
{
	if($val[0]=='Self')
	{
		$get_bk_det=mysql_fetch_object(mysql_query("select * from patientregister,patient_personal_info where patientregister.PATIENT_ID=patient_personal_info.PATIENT_ID and patientregister.PATIENT_ID='".$_SESSION['pat_id']."'"));
		$dob=explode('-',$get_bk_det->PATIENT_DOB);
		$pt=$dob[1].'/'.$dob[2].'/'.$dob[0];
		$fname=$get_bk_det->PATIENT_FIRST_NAME;
		$mname=$get_bk_det->PATIENT_MIDDLE_NAME;
		$lname=$get_bk_det->PATIENT_LAST_NAME;
		$email=$get_bk_det->PATIENT_EMAIL;
		$mobile=$get_bk_det->PATIENT_MOBILE_NUMBER;
		$dob=$pt;
		//$reason=$get_bk_det->APT_REASON;
	}
	else
	{
		$get_bk_det=mysql_fetch_object(mysql_query("select * from patient_family where PATIENT_FAMILY_ID='".$val[0]."'"));
		$dob=explode('-',$get_bk_det->DOB);
		$pt=$dob[1].'/'.$dob[2].'/'.$dob[0];
		$fname=$get_bk_det->FNAME;
		$mname=$get_bk_det->MNAME;
		$lname=$get_bk_det->LNAME;
		$email=$get_bk_det->EMAIL;
		$mobile=$get_bk_det->MOBILE;
		$dob=$pt;
		//$reason=$get_bk_det->APT_REASON;
	}
?>
	<table width="720" cellpadding="0" cellspacing="0" border="0" style="margin-left:10px;">
	 <tr>
		<td width="207">First Name <span class="red">*</span></td>
		<td width="201">Middle Name</td>
		<td width="312">Last Name <span class="red">*</span></td>
	  </tr>
	  <tr>
		<td><input type="text" size="25" name="fname" id = "fname"  maxlength="80" class="textfild-S" required="required" value="<?=$fname?>"/></td>
		<td><input type="text" size="25" name="mname" id = "mname" class="textfild-S" maxlength="80" value="<?=$mname?>"/></td>
		<td><input type="text" size="25" name="lname" id = "lname" class="textfild-S" maxlength="80" required="required" value="<?=$lname?>"/></td>
	  </tr>   
	  <tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	 <tr>
		<td colspan="3">Email-Id <span class="red">*</span></td>
	  </tr>
	  <tr>
		<td colspan="3"><input type="text" size="25" name="email" id="email"  maxlength="80" class="textfild-S" required="required" value="<?=$email?>" /></td>
	  </tr>        
	  <tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	 <tr>
		<td colspan="3">Mobile <span class="red">*</span></td>
	  </tr>
	  <tr>
		<td colspan="3"><input type="text" size="25" name="mobile" value="<?=$mobile?>" id="mobile"  maxlength="10" class="textfild-S"  /></td>
	  </tr>  
	  <tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	 <tr>
		<td colspan="3">Date of Birth <span class="red">*</span></td>
	  </tr>
	  <tr>
		<td colspan="3"><input type="text" size="25" name="dob" id="dob"  maxlength="80" class="textfild-S" onClick="scwShow(this,event);" value="<?=$dob?>" /></td>
	  </tr>       
	  <tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	 <tr>
		<td colspan="3">Appointment Reason <span class="red">*</span></td>
	  </tr>
	  <tr>
		<td colspan="3"><input type="text" size="25" name="reason" value="<?=$reason?>" id="reason"  maxlength="150" class="textfild-S" /></td>
	  </tr> 
	 </table>
<?	
}
?>
<? if($val[1]=='visit')
{
$get_vital=mysql_query("select DOCTOR_ID,VISIT_NOTE,prescription.BOOKING_ID,prescription.CDATE from prescription,booking_details where prescription.BOOKING_ID=booking_details.BOOKING_ID and booking_details.FNAME='".$val[0]."' and PATIENT_ID='".$_SESSION['pat_id']."'");
$count=mysql_num_rows($get_vital);
?>
<table width="720" cellpadding="0" cellspacing="0" border="0" style="margin-left:10px;">
 <tr>
	<th width="168" class="timetabH4">Doctor</th>
	<th width="142" class="timetabH4">Date</th>
	<th width="410" class="timetabH4">Notes</th>
  </tr>
  <? 
  	if($count>=1)
	{
  while($val=mysql_fetch_object($get_vital)) 
  	{
  		$doc_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME from doctor_register where DOCTOR_ID='".$val->DOCTOR_ID."'"));
  ?>
  <tr>
	<td class="timetabH1"><?=$doc_name->DOCTOR_FIRST_NAME.' '.$doc_name->DOCTOR_LAST_NAME?></td>
	<td class="timetabH1"><?=dateformat($val->CDATE)?></td>
	<td class="timetabH1"><?=$val->VISIT_NOTE?></td>
  </tr> 
  <? }
  } else { ?>  
  	<tr>
		<td height="32" colspan="3" class="timetabH1"> <span class="red">No Result found...</span></td>
	</tr> 
  <? } ?>
  <tr>
	<td colspan="3">&nbsp;</td>
  </tr>
</table>  
<?
}
?>

<? if($val[1]=='lab_result')
{
$get_vital=mysql_query("select DOCTOR_ID,VISIT_NOTE,prescription.BOOKING_ID,prescription.CDATE,LAB_TEST from prescription,booking_details where prescription.BOOKING_ID=booking_details.BOOKING_ID and FNAME='".$val[0]."' and PATIENT_ID='".$_SESSION['pat_id']."'");
$count=mysql_num_rows($get_vital);
?>
<table width="720" cellpadding="0" cellspacing="0" border="0" style="margin-left:10px;">
 <tr>
	<th class="timetabH4">Doctor</th>
	<th class="timetabH4">Date</th>
	<th class="timetabH4">Lab Test</th>
  </tr>
  <? 
  	if($count>=1)
	{
  while($val=mysql_fetch_object($get_vital)) 
  	{
  		$doc_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME from doctor_register where DOCTOR_ID='".$val->DOCTOR_ID."'"));
  ?>
  <tr>
	<td class="timetabH1"><?=$doc_name->DOCTOR_FIRST_NAME.' '.$doc_name->DOCTOR_LAST_NAME?></td>
	<td class="timetabH1"><?=dateformat($val->CDATE)?></td>
	<td class="timetabH1"><?=$val->LAB_TEST?></td>
  </tr> 
  <? }
  } else { ?>  
  	<tr>
		<td class="timetabH1" colspan="3"> <span class="red">No Result found...</span></td>
	</tr> 
  <? } ?>
  <tr>
	<td colspan="3">&nbsp;</td>
  </tr>
</table>  
<?
}
?>
<?php 
include("config/config.php");
if($_SESSION['username'])
{
//print_r($_SESSION);
$_REQUEST['bk_id']=$_SESSION['bk_id'];
$_REQUEST['dt']=$_SESSION['dt'];
$slot_time=mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$_REQUEST['bk_id']."'"));  

$b_date=explode('/',$_REQUEST['dt']);
$sl_date=$b_date[2].'-'.$b_date[1].'-'.$b_date[0];
$get_bk_det=mysql_fetch_object(mysql_query("select * from booking,booking_details where APT_DATE='".$sl_date."' and APT_TIME='".$_GET['bk_id']."' and DOCTOR_ID='".$_SESSION['doc_id']."' and booking.BOOKING_ID=booking_details.BOOKING_ID"));

$dob_val=explode('-',$get_bk_det->DOB);
$date_dob=$dob_val[1].'/'.$dob_val[2].'/'.$dob_val[0];

date_default_timezone_set('Asia/Calcutta');
$time=date('H:i:s');
$present_slot_show=mysql_fetch_object(mysql_query("select SLOT_ID from slot where START_TIME < '".$time."' and END_TIME > '".$time."'"));
$dr_det=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME from doctor_register where DOCTOR_ID='".$_SESSION['doc_id']."'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ezpointment</title>
<link href="styles/css.css" rel="stylesheet" type="text/css" />
<link href="styles/style1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery_min.js"></script>
<script type="text/javascript" src="getFile1.js"></script>
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/fancybox.css" />
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery-code.js"></script>
<script type="text/javascript" language="javascript" src="js/facy-mainjquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.fancybox.js"></script>
<script type="text/javascript" src="getFile1.js"></script>
<script type="text/javascript" src="getstate.js"></script>
<script type="text/javascript" src="getFamily.js"></script>
<script type="text/javascript" src="scw.js"></script> 
</head>
<body class="maina">
<!--div class="dashright"-->
<div class="content1">
<form name="siteadmin" method="post" action="" onSubmit="">
<table width="615" cellpadding="0" cellspacing="0" border="0" style="margin-left:10px;">
<tr>
	<td colspan="2"><h2 style="color:#003162;">Book Slot</h2></td>
	<td align="right"><!--a href="book_now.php" target="riframe"><img src='./images/close.png' border="0" title="Close"></a-->&nbsp;</td>
</tr>
<tr>
	  <td colspan="3">&nbsp;</td>
</tr>
<? 
if($sl_date==date('Y-m-d') && $_REQUEST['bk_id']<=$present_slot_show->SLOT_ID) { ?>
<tr>
	<td colspan="3" style="color:#FF0000;"><b>The time slot has been passed, please book an appoinment for the available slot.</b></td>
</tr>
<? } else { ?>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td colspan="3"><font size="+1"><i>Dr. <?php print ucfirst($dr_det->DOCTOR_FIRST_NAME).' '.ucfirst($dr_det->DOCTOR_LAST_NAME); ?></i></font></td>
</tr>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td colspan="3"><strong>Date / Time :</strong> <?php  print $_REQUEST['dt'].', '.$slot_time->START_TIME; ?></td>
</tr>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
 <tr>
	<td colspan="3">Appointment for</td>
</tr>
<tr>
	<td colspan="3">
	<?php $sel_fam=mysql_query("select * from patient_family where PATIENT_ID='".$_SESSION['pat_id']."'"); ?>
		<select name="pat_list" id="pat_list" class="drop2" onchange="getfamdet(this.value,'fam');" required="required" >
			<option value="">select person</option>
			<option value="Self">Self</option>
			<? while($fam=mysql_fetch_object($sel_fam)) { ?>
				<option value="<?php print $fam->PATIENT_FAMILY_ID;?>"><?php print $fam->FNAME;?></option>
			<? } ?>
		</select>
	</td>
</tr>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
</table>

<div id="fam">
<table width="720" cellpadding="0" cellspacing="0" border="0" style="margin-left:10px;">
 <tr>
	<td width="206">First Name <span class="red">*</span></td>
	<td width="212">Middle Name</td>
	<td width="302">Last Name <span class="red">*</span></td>
  </tr>
  <tr>
	<td><input type="text" size="25" name="fname" id = "fname"  maxlength="80" class="textfild-S" required="required" value="<?=$get_bk_det->FNAME?>"/></td>
	<td><input type="text" size="25" name="mname" id = "mname" class="textfild-S" maxlength="80" value="<?=$get_bk_det->MNAME?>"/></td>
	<td><input type="text" size="25" name="lname" id = "lname" class="textfild-S" maxlength="80" required="required" value="<?=$get_bk_det->LNAME?>"/></td>
  </tr>   
  <tr>
	<td colspan="3">&nbsp;</td>
</tr>
 <tr>
	<td colspan="3">Email-Id <span class="red">*</span></td>
  </tr>
  <tr>
	<td colspan="3"><input type="text" size="25" name="email" id="email"  maxlength="80" class="textfild-S" required="required" value="<?=$get_bk_det->EMAIL_ID?>" /></td>
  </tr>        
  <tr>
	<td colspan="3">&nbsp;</td>
</tr>
 <tr>
	<td colspan="3">Mobile <span class="red">*</span></td>
  </tr>
  <tr>
	<td colspan="3"><input type="text" size="25" name="mobile" value="<?=$get_bk_det->MOBILE?>" id="mobile"  maxlength="10" class="textfild-S"  /></td>
  </tr>  
  <tr>
	<td colspan="3">&nbsp;</td>
</tr>
 <tr>
	<td colspan="3">Date of Birth <span class="red">*</span></td>
  </tr>
  <tr>
	<td colspan="3"><input type="text" size="25" name="dob" id="dob"  maxlength="80" class="textfild-S" onClick="scwShow(this,event);" /></td>
  </tr>       
  <tr>
	<td colspan="3">&nbsp;</td>
</tr>
 <tr>
	<td colspan="3">Appointment Reason <span class="red">*</span></td>
  </tr>
  <tr>
	<td colspan="3"><input type="text" size="25" name="reason" value="<?=$get_bk_det->APT_REASON ?>" id="reason"  maxlength="150" class="textfild-S" /></td>
  </tr> 
 </table>
 </div>
 
 <table width="720" cellpadding="0" cellspacing="0" border="0" style="margin-left:10px;">
  <tr>
	<td colspan="3">&nbsp;</td>
</tr>
 <tr>
	<td colspan="3">Patient seen this doctor before? <input type="radio" name="seen" id="seen" value="Y" /> &nbsp; Yes <input type="radio" name="seen" id="seen" value="N" /> &nbsp; No  </td>
  </tr>
  <tr>
	<td colspan="3"></td>
  </tr> 
  <tr><td colspan="3"><input type="submit" value="Submit" name="submit" class="but-blue"/></td></tr>
    <? } ?>
</table>
</form>
</div>
</body>
</html>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$dtt=explode('/',$_REQUEST['dt']);
		$apt_date=$dtt[2].'-'.$dtt[1].'-'.$dtt[0];
		$insert_booking=mysql_query("insert into booking (PATIENT_ID,DOCTOR_ID,APT_TIME,APT_DATE,CUSER,CDATE,FLAG) values ('".$_SESSION['pat_id']."','".$_SESSION['doc_id']."','".$_REQUEST['bk_id']."','".$apt_date."','".$_SESSION['username']."','".date('Y-m-d')."','1')");
		$book_id=mysql_insert_id();
		if($insert_booking==1)
		{
			$dtt1=explode('/',$_REQUEST['dob']);
			$bd_date=$dtt1[2].'-'.$dtt1[0].'-'.$dtt1[1];
			$insert_detail=mysql_query("insert into booking_details (BOOKING_ID,FNAME,MNAME,LNAME,EMAIL_ID,MOBILE,DOB,APT_REASON,SEEN_BEFORE,CUSER,CDATE,FLAG) values ('".$book_id."','".$_REQUEST['fname']."','".$_REQUEST['mname']."','".$_REQUEST['lname']."','".$_REQUEST['email']."','".$_REQUEST['mobile']."','".$bd_date."','".$_REQUEST['reason']."','".$_REQUEST['seen']."','".$_SESSION['username']."','".date('Y-m-d')."','1')");
			if($insert_detail==1)
			{
				print("<script language='javascript'>alert('Request completed...'); window.location.href='upcoming_apt_p.php'; </script>");
			}
			else
			{
				print("<script language='javascript'>alert('Request Incomplete, Try Again...'); </script>");
			}
		}
		else
		{
			print("<script language='javascript'>alert('Request Incomplete, Try Again...'); </script>");
		}
	}
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
		 
		 
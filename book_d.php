<?php 
include("config/config.php");
if($_SESSION['username'])
{
	/*print("<script language='javascript'>alert('Request completed...'); window.parent.location.href='book_now.php'; </script>");*/
$slot_time=mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$_GET['bk_id']."'")); 

$b_date=explode('/',$_REQUEST['dt']);
$sl_date=$b_date[2].'-'.$b_date[1].'-'.$b_date[0];
$get_bk_det=mysql_fetch_object(mysql_query("select * from booking,booking_details where APT_DATE='".$sl_date."' and APT_TIME='".$_GET['bk_id']."' and DOCTOR_ID='".$_SESSION['doc_id']."' and booking.BOOKING_ID=booking_details.BOOKING_ID"));

$dob_val=explode('-',$get_bk_det->DOB);
$date_dob=$dob_val[1].'/'.$dob_val[2].'/'.$dob_val[0];
//print_r($_SESSION);
date_default_timezone_set('Asia/Calcutta');
$time=date('H:i:s');
$present_slot_show=mysql_fetch_object(mysql_query("select SLOT_ID from slot where START_TIME < '".$time."' and END_TIME > '".$time."'"));
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
<script type="text/javascript" src="scw.js"></script>
<script type="text/javascript" src="getPatient.js"></script>
<script type="text/javascript" src="showPat.js"></script>
<script type="text/javascript">
function getValue()
{
	if(document.getElementById('fname').value=='' && document.getElementById('email').value=='' && document.getElementById('mobile').value=='')
	{
		alert('Please search with first name or email-id or mobile no.');
		return false;
	}
	else
	{
		search_pat(document.getElementById('fname').value+'^'+document.getElementById('email').value+'^'+document.getElementById('mobile').value,'disp_pat');
	}
}
function getPat(a,b,c)
{
	document.getElementById('disp_pat').style.display='none';
	show_pat(a+'^'+b,c);	
}
function refresh_val()
{
	/*document.getElementById('fname').value='';
	document.getElementById('mname').value='';
	document.getElementById('lname').value='';
	document.getElementById('email').value='';
	document.getElementById('mobile').value='';
	document.getElementById('dob').value='';
	document.getElementById('reason').value='';
	document.getElementById('disp_pat').style.display='';*/
}
</script>
</head>
<body class="maina">
<!--div class="dashright"-->
<div class="content1">
<form name="siteadmin" method="post" action="" onSubmit="">
<table width="615" cellpadding="0" cellspacing="0" border="0" style="margin-left:10px;">
<tr>
	<td colspan="2"><h2 style="color:#003162;">Book Slot</h2></td>
	<td align="right"><a href="<?php if($_SESSION['user_type']=='R') { ?>recpt_doctor.php<?php } else { ?>book_now.php<?php } ?>" target="riframe"><img src='./images/close.png' border="0" title="Close"></a></td>
</tr>
<tr>
	  <td colspan="3"><hr /></td>
</tr>
<? 
if($present_slot_show->SLOT_ID=='')
{
	$present_slot_show->SLOT_ID='50';
}
if($sl_date==date('Y-m-d') && $_REQUEST['bk_id']<=$present_slot_show->SLOT_ID) { ?>
<tr>
	<td colspan="3" style="color:#FF0000;"><b>The time slot has been passed, please book an appoinment for the available slot.</b></td>
</tr>
<? } else { ?>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td colspan="3"><strong>Date / Time :</strong> <?php  print $_REQUEST['dt'].', '.$slot_time->START_TIME; ?></td>
</tr>
<tr>
	<td colspan="3"><input type="button" value="Search" name="Search" class="but-blue2" onclick="getValue();"/> &nbsp;<input type="button" value="Refresh" name="Search" class="but-blue2" onclick="window.location.href='book_d.php?dt=<?=$_GET['dt']?>&bk_id=<?=$_GET['bk_id']?>';"/></td>
</tr>
</table>
<div id="disp_pat"></div>
<div id="search_show">
<table width="720" cellpadding="0" cellspacing="0" border="0" style="margin-left:10px;">
 <tr>
	<td width="210">First Name <span class="red">*</span></td>
	<td width="213">Middle Name</td>
	<td width="297">Last Name <span class="red">*</span></td>
  </tr>
  <tr>
	<td><input type="text" size="25" name="fname" id = "fname"  maxlength="80" class="textfild-S" required="required" value="<?=$get_bk_det->FNAME?>" />
	</td>
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
	<td colspan="2"><input type="text" size="25" name="email" id="email"  maxlength="80" class="textfild-S" required="required" value="<?=$get_bk_det->EMAIL_ID?>" /></td>
	<td>&nbsp;</td>
  </tr>        
  <tr>
	<td colspan="3">&nbsp;</td>
</tr>
 <tr>
	<td colspan="3">Mobile <span class="red">*</span></td>
  </tr>
  <tr>
	<td colspan="3"><input type="text" size="25" name="mobile" value="<?=$get_bk_det->MOBILE?>" id="mobile"  maxlength="10" class="textfild-S" required="required"  /></td>
  </tr>  
  <tr>
	<td colspan="3">&nbsp;</td>
</tr>
 <tr>
	<td colspan="3">Date of Birth <span class="red">*</span></td>
  </tr>
  <tr>
	<td colspan="3"><input type="text" size="25" name="dob" value="" id="dob"  maxlength="80" class="textfild-S" onClick="scwShow(this,event);" required="required" /></td>
  </tr>    
 </table>
 </div>
 
 <table width="720" cellpadding="0" cellspacing="0" border="0" style="margin-left:10px;">    
  <tr>
	<td colspan="3">&nbsp;</td>
</tr>
 <tr>
	<td colspan="3">Appointment Reason <span class="red">*</span></td>
  </tr>
  <tr>
	<td colspan="3"><input type="text" size="25" name="reason" value="<?=$get_bk_det->APT_REASON ?>" id="reason"  maxlength="150" class="textfild-S" required="required" /></td>
  </tr> 
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
		
		$insert_booking=mysql_query("insert into booking (PATIENT_ID,DOCTOR_ID,APT_TIME,APT_DATE,CUSER,CDATE) values ('".$_REQUEST['patient_id']."','".$_SESSION['doc_id']."','".$_REQUEST['bk_id']."','".$apt_date."','".$_SESSION['username']."','".date('Y-m-d')."')");
		$book_id=mysql_insert_id();
		if($insert_booking==1)
		{
			$dtt1=explode('/',$_REQUEST['dob']);
			$bd_date=$dtt1[2].'-'.$dtt1[0].'-'.$dtt1[1];
			
			$insert_detail=mysql_query("insert into booking_details (BOOKING_ID,FNAME,MNAME,LNAME,EMAIL_ID,MOBILE,DOB,APT_REASON,SEEN_BEFORE,CUSER,CDATE) values ('".$book_id."','".$_REQUEST['fname']."','".$_REQUEST['mname']."','".$_REQUEST['lname']."','".$_REQUEST['email']."','".$_REQUEST['mobile']."','".$bd_date."','".$_REQUEST['reason']."','".$_REQUEST['seen']."','".$_SESSION['username']."','".date('Y-m-d')."')");
			if($insert_detail==1)
			{
				print("<script language='javascript'>alert('Request completed...'); window.parent.location.href='slot.php'; </script>");
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
		 
		 
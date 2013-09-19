<?php 
include("config/config.php");
if($_SESSION['username'])
{
	$apt_doc_id=mysql_fetch_object(mysql_query("select DOCTOR_ID from booking where BOOKING_ID='".$_REQUEST['bk_id']."'"));
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
<script type="text/javascript" language="javascript"  src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript"  src="js/jquery-code.js"></script>
<script type="text/javascript" language="javascript"  src="js/facy-mainjquery.js"></script>
<script type="text/javascript" language="javascript"  src="js/jquery.fancybox.js"></script>
<script type="text/javascript" src="getFile1.js"></script>
<script type="text/javascript" src="getstate.js"></script>
<script type="text/javascript">
function validatesignuppage()
{	
	var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
	if(document.getElementById('heart').value=='')
	{
		alert('Please enter Heart Pulse');
		document.getElementById('heart').focus();
		return false;
	}
	else if(document.getElementById('blood').value=='')
	{
		alert('Please enter blood presure');
		document.getElementById('blood').focus();
		return false;
	}
	else if(document.getElementById('temp').value=='')
	{
		alert('Please enter temperature');
		document.getElementById('temp').focus();
		return false;
	}
	else if(document.getElementById('sugar').value=='')
	{
		alert('Please enter sugar level');
		document.getElementById('sugar').focus();
		return false;
	}
}
</script>	
</head>
<body>
<div class="midcontainer1">
			
<div class="doctor_M">
<form name="signup" method="post" action="" onSubmit="return validatesignuppage();">
<table width="90%" cellpadding="0" cellspacing="0" border="0" style="margin-left:20px;"> 
	<tr>
	<td colspan="2"><h2 style="color:#003162;">Add Vitals</h2></td>
	<td align="right"><a href="apt_history.php" target="riframe"><img src='./images/close.png' border="0" title="Close"></a></td>
	</tr>
	<tr>
	  <td colspan="3"><hr /></td>
	</tr> 
	<tr>
	  <td colspan="3">&nbsp;</td>
	</tr>
	<tr>
	  <td colspan="3"><strong>Patient Name</strong> : &nbsp;&nbsp;<?=$_REQUEST['fname'].' '.$_REQUEST['lname']?></td>
	</tr>
	<tr>
	  <td colspan="3">&nbsp;</td>
	</tr>
	<tr>
	  <td colspan="3">Heart pulse <span class="red">*</span></td>
	</tr>
	<tr>
	  <td colspan="3"><input type="text" size="30" name="heart" value="" id="heart"  maxlength="100" class="textfiled-M" /> </td>
	</tr>
	<tr>
	  <td colspan="3">&nbsp;</td>
	</tr>
	<tr>
	  <td colspan="3">Blood Presure <span class="red">*</span></td>
	</tr>
	<tr>
	  <td colspan="3"><input type="text" size="50" name="blood" value="" id="blood"  maxlength="100" class="textfiled-M" /> </td>
	</tr>
	<tr>
	  <td colspan="3">&nbsp;</td>
	</tr>
	<tr>
	  <td colspan="3">Temperature <span class="red">*</span></td>
	</tr>
	<tr>
	  <td colspan="3"><input type="text" class="textfiled-M" size="50" name="temp" value="" id="temp"  maxlength="100" /></td>
	</tr>
	<tr>
	  <td colspan="3">&nbsp;</td>
	</tr>
	<tr>
	  <td colspan="3">Sugar Level  <span class="red">*</span></td>
	</tr>
	<tr>
	  <td colspan="3"><input type="text" size="50" name="sugar" value="" id="sugar"  maxlength="100" class="textfiled-M" /> </td>
	</tr>
	<tr>
	  <td colspan="3">&nbsp;</td>
	</tr>
	<tr>
            <td>&nbsp;</td>
           <td colspan="2" >
				<input class="but-gray" type="reset" style="margin-right:10px;" name="reset" value="Reset">
				<input class="but-blue" type="submit" name="submit" value="Submit">
		    </td>
          </tr>
</table>
</form>
</div>
</div>
</body>
</html>
<?php
	if(($_POST['submit'])=='Submit')
	{
		$insert_vital=mysql_query("insert into vital (BOOKING_ID,DOCTOR_ID,PATIENT_ID,PATIENT_FNAME,PATIENT_LNAME,HEART_BEAT,BLOOD_PRESSURE,TEMPERATURE,SUGAR,CUSER,CDATE) VALUES ('".$_REQUEST['bk_id']."','".$apt_doc_id->DOCTOR_ID."','".$_REQUEST['patient_id']."','".$_REQUEST['fname']."','".$_REQUEST['lname']."','".$_REQUEST['heart']."','".$_REQUEST['blood']."','".$_REQUEST['temp']."','".$_REQUEST['sugar']."','".$_SESSION['username']."','".date('Y-m-d')."')");
		if($insert_vital==1)
		{
			print("<script language='javascript'>alert('vitals added successfully.');window.parent.location.href='apt_history.php';</script>");
		}
		else
		{
			print("<script language='javascript'>alert('Request Incompleted.');</script>");
		}
	}
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
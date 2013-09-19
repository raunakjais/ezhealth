<?php 
include("config/config.php");
if($_SESSION['username'])
{	
	$_SESSION['booking_id']=$_REQUEST['bk_id'];
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
<script type="text/javascript" src="add_med.js"></script>
<script type="text/javascript">
function add_med()
{       
	if(document.getElementById('med').value=='')
	{
		alert('Please Enter medicine...');
		document.getElementById('med').focus();
		return false;
	}
	else if(document.getElementById('dose').value=='')
	{
		alert('Please Enter dosage...');
		document.getElementById('dose').focus();
		return false;
	}
	else if(document.getElementById('time').value=='')
	{
		alert('Please select no. of time...');
		document.getElementById('time').focus();
		return false;
	}
	showmed(document.getElementById('med').value+'~'+document.getElementById('dose').value+'~'+document.getElementById('time').value,'show_pres');
}
</script>
<script type="text/javascript">
function validate()
{	
	var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
	if(document.getElementById('dignos').value=='')
	{
		alert('Please enter diagnose');
		document.getElementById('dignos').focus();
		return false;
	}
}
</script>
</head>
<body>
<div class="midcontainer1">
			
<div class="doctor_M">
<form name="signup" method="post" action="" onSubmit="return validate();">
<table width="92%" cellpadding="0" cellspacing="0" border="0"> 
	<tr>
	<td colspan="2"><h2 style="color:#003162;">Add Prescription</h2></td>
	<td align="right"><a href="apt_history.php" onclick="window.close();" target="riframe"><img src='./images/close.png' border="0" title="Close"></a></td>
	</tr> 
	<tr>
	  <td colspan="3"><hr /></td>
	</tr>
	<tr>
	  <td colspan="3">&nbsp;</td>
	</tr>
	<tr>
	  <td colspan="3" style="font-size:14px"><strong>Patient Name</strong> : &nbsp;&nbsp;<?=$_REQUEST['fname'].' '.$_REQUEST['lname']?></td>
	</tr>
	<tr>
	  <td colspan="3">&nbsp;</td>
	</tr>
	<tr>
	  <td colspan="3">Dignosis <span class="red">*</span></td>
	</tr>
	<tr>
	  <td colspan="3"><textarea name="dignos" id="dignos" rows="2" cols="48"></textarea> </td>
	</tr>
	<tr>
	  <td colspan="3">&nbsp;</td>
	</tr>
	<tr>
	  <td width="329">Medicine Name <span class="red">*</span></td>
	  <td width="334">Dosage <span class="red">*</span></td>
	  <td width="234">Times <span class="red">*</span></td>
	</tr>
</table> 
<div id="show_pres">
</div>
<table width="720" cellpadding="0" cellspacing="0" border="0"> 
	<tr>
	  <td><input type="text" size="50" name="med" value="" id="med"  maxlength="100" class="textfild-S" /> </td>
	  <td><input type="text" size="50" name="dose" value="" id="dose"  maxlength="100" class="textfild-S" /> </td>
	  <td><select name="time" id="time" class="drop5">
	  		<option value="">Select Time</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
	  </select> </td>
	</tr>	
	<tr>
		  <td colspan="2" class="ntext" align="left"><span class="red"><i>* Please click on <strong>Add Medicine </strong> before updating adding prescription.</i></span></td>
            <td align="center"><input type="button" value="Add Medicine" name="submit" class="but-blue1" onClick="add_med();" /></td>
          </tr>
	<tr>
	  <td colspan="3">&nbsp;</td>
	</tr>
	<tr>
	  <td colspan="3">Lab Test</td>
	</tr>
	<tr>
	  <td colspan="3"><textarea name="lab_test" id="lab_test" rows="2" cols="48"></textarea> </td>
	</tr>
	<tr>
	  <td colspan="3">&nbsp;</td>
	</tr>
	<tr>
	  <td colspan="3"> After Visit Note </td>
	</tr>
	<tr>
	  <td colspan="3"><textarea name="visit" id="visit" rows="2" cols="48"></textarea></td>
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
		print("<script language='javascript'>alert('prescription added successfully.');window.close();window.parent.location.href='apt_history.php';</script>");
		exit;
		$insert_precription=mysql_query("insert into prescription (BOOKING_ID,DOCTOR_ID,PATIENT_ID,FNAME,LNAME,DIGNOSIS,VISIT_NOTE,LAB_TEST,CUSER,CDATE) VALUES ('".$_REQUEST['bk_id']."','".$apt_doc_id->DOCTOR_ID."','".$_REQUEST['patient_id']."','".$_REQUEST['fname']."','".$_REQUEST['lname']."','".$_REQUEST['dignos']."','".$_REQUEST['visit']."','".$_REQUEST['lab_test']."','".$_SESSION['username']."','".date('Y-m-d')."')");
		$doc_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME from doctor_register where DOCTOR_ID='".$apt_doc_id->DOCTOR_ID."' "));
		$msg="Dear patient Dr. ".$doc_name->DOCTOR_FIRST_NAME." write a prescription to you.";	
		if($insert_precription==1)
		{
			$insert_msg=mysql_query("insert into msg (MSG_FROM,MSG_FROM_TYPE,MSG_TO,MSG_TO_TYPE,MSG,TYPE,BK_ID,CUSER,CDATE) values ('".$apt_doc_id->DOCTOR_ID."','D','".$_REQUEST['patient_id']."','P','".$msg."','prescription','".$_REQUEST['bk_id']."','".$_SESSION['username']."','".date('Y-m-d')."')");
			print("<script language='javascript'>alert('prescription added successfully.');window.close();</script>");
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
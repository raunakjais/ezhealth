<?php 
include("config/config.php");
if($_SESSION['username'])
{
$slot_time=mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$_GET['bk_id']."'")); 

$b_date=explode('/',$_REQUEST['dt']);
$sl_date=$b_date[2].'-'.$b_date[1].'-'.$b_date[0];
$get_bk_det=mysql_fetch_object(mysql_query("select * from booking,booking_details where APT_DATE='".$sl_date."' and APT_TIME='".$_GET['bk_id']."' and DOCTOR_ID='".$_SESSION['doc_id']."' and booking.BOOKING_ID=booking_details.BOOKING_ID"));
$dob_val=explode('-',$get_bk_det->DOB);
$date_dob=$dob_val[1].'/'.$dob_val[2].'/'.$dob_val[0];

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
<script type="text/javascript" src="getSlot.js"></script>
<script language="javascript">
function name1()
{
	if(document.getElementById('s1').checked) 
	{
		document.getElementById('doctor').style.display = "none";
		document.getElementById('doctor').style.visibility = "hidden";
		document.getElementById('hospital').style.display = "block";
		document.getElementById('hospital').style.visibility = "visible";
	}
	else if(document.getElementById('s2').checked) 
	{
		document.getElementById('hospital').style.display = "none";
		document.getElementById('hospital').style.visibility = "hidden";
		document.getElementById('doctor').style.display = "block";
		document.getElementById('doctor').style.visibility = "visible";
	}
}
</script>
</head>
<body class="maina">
<!--div class="dashright"-->
<div class="content1">
<form name="siteadmin" method="post" action="" onSubmit="">
<table width="720" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td colspan="3"><h2 style="color:#003162;">Refer Patient</h2></td>
</tr>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>

<tr>
	<td colspan="3">&nbsp;</td>
</tr>
 <tr>
	<td><strong>Patient Name </strong></td>
	<td><?=$_REQUEST['fname'].' '.$_REQUEST['lname']?></td>
	<td>&nbsp;</td>
  </tr>
  <tr>
	<td colspan="3">&nbsp;</td>
  </tr>
  <tr>
	<td><strong>Problem</strong></td>
	<td><?=$_REQUEST['reason']?></td>
	<td>&nbsp;</td>
  </tr>
  <tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>   
  <tr>
	<td colspan="3">&nbsp;</td>
</tr>
  <tr>
  		<td width="14%"><input type="radio" name="search" id="s1" value="hospital" onclick="name1();" />&nbsp;&nbsp;<strong>Hospital</strong></td>
	   <td width="23%"><input type="radio" name="search" id="s2" value="doctor" onclick="name1();"/>&nbsp;&nbsp;<strong>Doctor</strong></td>
			
	   <td width="63%">&nbsp;</td>
	
		
	</tr>
</table>

<div id="hospital" style="display:none;">
<table width="720" cellpadding="0" cellspacing="0" border="0">	
	<tr>
	<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
	<td>Select Hospital <span class="red">*</span></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
	<tr>
	<td>
	<?php $sel_hospital=mysql_query("select BUSINESS_ID,BUSINESS_LOCATION_TITLE,BUSINESS_LOCATION_BRANCH from business_info"); ?>
		<select name="hosp" id="hosp" class="drop2" onchange="getslot(this.value,'avail');" >
			<option value="">Select hospital</option>
			<?php while($val=mysql_fetch_object($sel_hospital)) { ?>
				<option value="<?=$val->BUSINESS_ID?>"><?=$val->BUSINESS_LOCATION_TITLE.','.$val->BUSINESS_LOCATION_BRANCH?></option>	
			<?php } ?>
		</select>
	</td>
	<td>&nbsp;
	
	</td>
	<td>&nbsp;</td>
  </tr> 
</table>
</div>	
<div id="doctor" style="display:none;">
<table width="720" cellpadding="0" cellspacing="0" border="0">	
	<tr>
	<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
	<td>Select Doctor <span class="red">*</span></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
	<tr>
	<td>
	<?php 
	$sel_doc=mysql_query("select * from doctor_register,doctor_personal_location_info where doctor_register.DOCTOR_ID=doctor_personal_location_info.DOCTOR_ID and DOCTOR_SPECIALITY!='' and DOCTOR_FLAG=0 order by doctor_register.DOCTOR_ID");  ?>
		<select name="doc" id="doc" class="drop2">
			<option value="">Select Doctor</option>
			<?php while($val1=mysql_fetch_object($sel_doc)) { ?>
				<option value="<?=$val1->DOCTOR_ID?>"><?=$val1->DOCTOR_FIRST_NAME.' '.$val1->DOCTOR_LAST_NAME?></option>		
			<?php } ?>
		</select>
	</td>
  </tr> 
</table>
</div>	
			
<table width="720" cellpadding="0" cellspacing="0" border="0">			
  <tr><td colspan="3"><input type="submit" value="Submit" name="submit" class="but-blue"/></td></tr>
</table>
</form>
</div>
</body>
</html>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		if($_REQUEST['search']=='hospital')
		{
			$insert_referal=mysql_query("insert into refer_patient (PATIENT_ID,PATIENT_FNAME,PATIENT_LNAME,REFER_FROM,REFER_FROM_TYPE,REFER_TO,REFER_TO_TYPE,REFER_REASON,CUSER,CDATE) values ('".$_REQUEST['patient_id']."','".$_REQUEST['fname']."','".$_REQUEST['lname']."','".$_SESSION['doc_id']."','D','".$_REQUEST['hosp']."','H','".$_REQUEST['reason']."','".$_SESSION['username']."','".date('Y-m-d')."')");
			
			$doc_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME from doctor_register where DOCTOR_ID='".$_SESSION['doc_id']."' "));
			$hosp_name=mysql_fetch_object(mysql_query("select BUSINESS_LOCATION_TITLE from business_info where BUSINESS_ID='".$_REQUEST['hosp']."' "));
			$msg="Dear patient Dr. ".$doc_name->DOCTOR_FIRST_NAME." referred you to hospital ".$hosp_name->BUSINESS_LOCATION_TITLE." .";
			if($insert_referal==1)
			{
				//send msg to hospital
				$hospital_no=mysql_fetch_object(mysql_query("select BUSINESS_MOBILE_NUMBER,BUSINESS_LOCATION_TITLE from business_info where BUSINESS_ID='".$_REQUEST['hosp']."'"));
				$from_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME from doctor_register where DOCTOR_ID='".$_SESSION['doc_id']."'")); 
				
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,"http://myvaluefirst.com/smpp/sendsms?");
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS,
							"username=ezpointment&password=ezpoint1&to=".$hospital_no->BUSINESS_MOBILE_NUMBER."&from=EZAPPT&udh=0&text= Dear, ".$from_name->DOCTOR_FIRST_NAME." has referred a new patient ".$_REQUEST['fname']." to you. &dlr-mask=19&dlr-url");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$server_output = curl_exec ($ch);
				curl_close ($ch);
				
				// msg to patient
				$patient_no=mysql_fetch_object(mysql_query("select PATIENT_MOBILE_NUMBER from patientregister where PATIENT_ID='".$_REQUEST['patient_id']."'"));
				
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,"http://myvaluefirst.com/smpp/sendsms?");
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS,
							"username=ezpointment&password=ezpoint1&to=".$patient_no->PATIENT_MOBILE_NUMBER."&from=EZAPPT&udh=0&text= Dear ".$_REQUEST['fname'].", ".$from_name->DOCTOR_FIRST_NAME." has referred you to lab/clinic ".$hospital_no->BUSINESS_LOCATION_TITLE." Please use ezpointment to schedule your new appointment. &dlr-mask=19&dlr-url");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$server_output = curl_exec ($ch);
				curl_close ($ch);

			
				$insert_msg=mysql_query("insert into msg (MSG_FROM,MSG_FROM_TYPE,MSG_TO,MSG_TO_TYPE,MSG,CUSER,CDATE) values ('".$_SESSION['doc_id']."','D','".$_REQUEST['patient_id']."','P','".$msg."','".$_SESSION['username']."','".date('Y-m-d')."')");
				print("<script language='javascript'>alert('referred successfully...'); window.location.href='apt_history.php'; </script>");
			}
			else
			{
				print("<script language='javascript'>alert('Request Incomplete, Try Again...'); </script>");
			}
		}
		else if($_REQUEST['search']=='doctor')
		{
			$insert_referal=mysql_query("insert into refer_patient (PATIENT_ID,PATIENT_FNAME,PATIENT_LNAME,REFER_FROM,REFER_FROM_TYPE,REFER_TO,REFER_TO_TYPE,REFER_REASON,CUSER,CDATE) values ('".$_REQUEST['patient_id']."','".$_REQUEST['fname']."','".$_REQUEST['lname']."','".$_SESSION['doc_id']."','D','".$_REQUEST['doc']."','D','".$_REQUEST['reason']."','".$_SESSION['username']."','".date('Y-m-d')."')");
			
			$doc_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME from doctor_register where DOCTOR_ID='".$_SESSION['doc_id']."' "));
			$doc_name1=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME from doctor_register where DOCTOR_ID='".$_REQUEST['doc']."' "));
			$msg="Dear patient Dr. ".$doc_name->DOCTOR_FIRST_NAME." referred you to Dr ".$doc_name1->DOCTOR_FIRST_NAME." .";
			if($insert_referal==1)
			{
			
				//send msg to doctor
				$doc_no=mysql_fetch_object(mysql_query("select DOCTOR_MOBILE_NUMBER,DOCTOR_FIRST_NAME from doctor_register where DOCTOR_ID='".$_REQUEST['doc']."'"));
				$from_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME from doctor_register where DOCTOR_ID='".$_SESSION['doc_id']."'")); 
				
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,"http://myvaluefirst.com/smpp/sendsms?");
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS,
							"username=ezpointment&password=ezpoint1&to=".$doc_no->DOCTOR_MOBILE_NUMBER."&from=EZAPPT&udh=0&text= Dear, ".$from_name->DOCTOR_FIRST_NAME." has referred a new patient ".$_REQUEST['fname']." to you. &dlr-mask=19&dlr-url");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$server_output = curl_exec ($ch);
				curl_close ($ch);
				
				// msg to patient
				$patient_no=mysql_fetch_object(mysql_query("select PATIENT_MOBILE_NUMBER from patientregister where PATIENT_ID='".$_REQUEST['patient_id']."'"));
				
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,"http://myvaluefirst.com/smpp/sendsms?");
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS,
							"username=ezpointment&password=ezpoint1&to=".$patient_no->PATIENT_MOBILE_NUMBER."&from=EZAPPT&udh=0&text= Dear ".$_REQUEST['fname'].", ".$from_name->DOCTOR_FIRST_NAME." has referred you to lab/clinic ".$doc_no->DOCTOR_FIRST_NAME." Please use ezpointment to schedule your new appointment. &dlr-mask=19&dlr-url");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$server_output = curl_exec ($ch);
				curl_close ($ch);
			
				$insert_msg=mysql_query("insert into msg (MSG_FROM,MSG_FROM_TYPE,MSG_TO,MSG_TO_TYPE,MSG,CUSER,CDATE) values ('".$_SESSION['doc_id']."','D','".$_REQUEST['patient_id']."','P','".$msg."','".$_SESSION['username']."','".date('Y-m-d')."')");
				print("<script language='javascript'>alert('referred successfully...'); window.location.href='apt_history.php'; </script>");
			}
			else
			{
				print("<script language='javascript'>alert('Request Incomplete, Try Again...'); </script>");
			}
			
		}
		else 
		{
			print("<script language='javascript'>alert('please select a option...'); </script>");
		} 
	}
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
		 
		 
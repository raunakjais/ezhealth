<?php 
include("config/config.php");
if($_SESSION['username'])
{
//print_r($_SESSION);
$slot_time=mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$_GET['bk_id']."'")); 
//$doctr_id=mysql_fetch_object(mysql_query("select DOCTOR_ID from booking where APT_TIME='".$_GET['bk_id']."'"));
$doctr_id->DOCTOR_ID=$_SESSION['doc_id'];
$b_date=explode('/',$_REQUEST['dt']);
$sl_date=$b_date[2].'-'.$b_date[1].'-'.$b_date[0];
$get_bk_det=mysql_fetch_object(mysql_query("select * from booking,booking_details where APT_DATE='".$sl_date."' and APT_TIME='".$_GET['bk_id']."' and DOCTOR_ID='".$doctr_id->DOCTOR_ID."' and booking.BOOKING_ID=booking_details.BOOKING_ID"));
$dob_val=explode('-',$get_bk_det->DOB);
$date_dob=$dob_val[1].'/'.$dob_val[2].'/'.$dob_val[0];

$get_doc_list=mysql_query("select * from doc_mapping,doctor_register where DOC_ID=DOCTOR_ID and RECP_ID='".$_SESSION['recp_id']."'"); 

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
		document.getElementById('resch').style.display = "none";
		document.getElementById('resch').style.visibility = "hidden";
		document.getElementById('transfer').style.display = "none";
		document.getElementById('transfer').style.visibility = "hidden";
	}
	else if(document.getElementById('s2').checked) 
	{
		document.getElementById('resch').style.display = "none";
		document.getElementById('resch').style.visibility = "hidden";
		document.getElementById('transfer').style.display = "none";
		document.getElementById('transfer').style.visibility = "hidden";
	}
	else if(document.getElementById('s3').checked) 
	{
		document.getElementById('resch').style.display = "block";
		document.getElementById('resch').style.visibility = "visible";
		document.getElementById('transfer').style.display = "none";
		document.getElementById('transfer').style.visibility = "hidden";
	}
	else if(document.getElementById('s4').checked) 
	{
		document.getElementById('resch').style.display = "none";
		document.getElementById('resch').style.visibility = "hidden";
		document.getElementById('transfer').style.display = "block";
		document.getElementById('transfer').style.visibility = "visible";
	}
}
function find_time()
{
	getslot(document.getElementById('doctor').value+'^'+document.getElementById('date_sel1').value,'avail1');
}
</script>
</head>
<body class="maina">
<!--div class="dashright"-->
<div class="content1">
<form name="siteadmin" method="post" action="" onSubmit="">
<table width="920" cellpadding="0" cellspacing="0" border="0" style="margin-left:10px;">
<tr>
	<td colspan="3"><h2 style="color:#003162;">Book Slot</h2></td>
	<td align="right"><a href="book_now.php" target="riframe"><img src='./images/close.png' border="0" title="Close"></a></td>
</tr>
<tr>
	<td colspan="4"><hr /></td>
</tr>
<tr>
	<td colspan="4">&nbsp;</td>
</tr>
<tr>
	<td colspan="4"><strong>Date / Time :</strong> <?php  print $_REQUEST['dt'].', '.$slot_time->START_TIME; ?><input type="hidden" name="str_doc_id" id="str_doc_id" value="<?=$doctr_id->DOCTOR_ID?>" /></td>
</tr>
<tr>
	<td colspan="4">&nbsp;</td>
</tr>
 <tr>
	<td>First Name </td>
	<td>Middle Name</td>
	<td>Last Name</td>
	<td>&nbsp;</td>
  </tr>
  <tr>
	<td><input type="text" size="25" name="fname" id = "fname"  maxlength="80" class="textfild-S" required="required" value="<?=$get_bk_det->FNAME?>" readonly="readonly" />
	</td>
	<td><input type="text" size="25" name="mname" id = "mname" class="textfild-S" maxlength="80" value="<?=$get_bk_det->MNAME?>" readonly="readonly"/></td>
	<td><input type="text" size="25" name="lname" id = "lname" class="textfild-S" maxlength="80" required="required" value="<?=$get_bk_det->LNAME?>" readonly="readonly"/></td>
	<td>&nbsp;</td>
  </tr>   
  <tr>
	<td colspan="4">&nbsp;</td>
</tr>
 <tr>
	<td colspan="4">Email-Id </td>
  </tr>
  <tr>
	<td colspan="4"><input type="text" size="25" name="email" id="email"  maxlength="80" class="textfild-S" required="required" readonly="readonly" value="<?=$get_bk_det->EMAIL_ID?>" /></td>
  </tr>        
  <tr>
	<td colspan="4">&nbsp;</td>
</tr>
 <tr>
	<td colspan="4">Mobile</td>
  </tr>
  <tr>
	<td colspan="4"><input type="text" size="25" name="mobile" value="<?=$get_bk_det->MOBILE?>" id="mobile"  maxlength="10" readonly="readonly" class="textfild-S" /></td>
  </tr>  
  <tr>
	<td colspan="4">&nbsp;</td>
</tr>
 <tr>
	<td colspan="4">Appointment Reason</td>
  </tr>
  <tr>
	<td colspan="4"><input type="text" size="25" name="reason" value="<?=$get_bk_det->APT_REASON?>" id="reason" readonly="readonly"  maxlength="150" class="textfild-S" /></td>
  </tr> 
  <tr>
	<td colspan="4">&nbsp;</td>
</tr>
 <tr>
	<td colspan="4">Patient seen this doctor before? <? if($get_bk_det->SEEN_BEFORE=='N') { print 'NO'; } else  { print 'YES'; } ?> </td>
  </tr>
  <tr>
	<td colspan="4">&nbsp;</td>
  </tr> 
  <tr>
  		<td width="17%"><input type="radio" name="search" id="s3" value="reschedule" onclick="name1();" />&nbsp;&nbsp;<strong>Reschedule</strong></td>
		<td width="17%"><input type="radio" name="search" id="s4" value="transfer" onclick="name1();" />&nbsp;&nbsp;<strong>Transfer To Another Doctor</strong></td>
	   <td width="22%"><input type="radio" name="search" id="s1" value="confirm" onclick="name1();" <?php if($get_bk_det->FLAG==0) { ?> style="visibility:hidden;" <?php } ?> />&nbsp;&nbsp;<?php if($get_bk_det->FLAG==0) {  } else { ?> <strong>Confirm</strong> <? } ?></td>
			
	   <td width="44%"><input type="radio" name="search" id="s2" value="cancel" onclick="name1();" <?php if($get_bk_det->FLAG==0) { ?> style="visibility:hidden;" <?php } ?> />&nbsp;&nbsp; <?php if($get_bk_det->FLAG==0) {  } else { ?> <strong>Cancel</strong> <? } ?></td>
	
		
	</tr>
</table>

<div id="resch" style="display:none;">
<table width="720" cellpadding="0" cellspacing="0" border="0">	
	<tr>
	<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
	<td>Select Appointment Date <span class="red">*</span></td>
	<td>Select Slot <span class="red">*</span></td>
	<td>&nbsp;</td>
  </tr>
	<tr>
	<td>
		<select name="date_sel" id="date_sel" class="drop2" onchange="getslot(this.value,'avail');" >
			<option value="">Select Date</option>
			<?php for($i=0;$i<14;$i++) { 
			$apt_date1 = date('Y-m-d', strtotime("+ $i day")); ?>
				<option value="<? print $apt_date1; ?>"><? print $apt_date1; ?></option>	
			<?php } ?>
		</select>
	</td>
	<td>
		<div id="avail">
		<select name="time_sel" id="time_sel" class="drop2">
			<option value="">Select Time Slot</option>
			</select>
			</div>
	</td>
	<td>&nbsp;</td>
  </tr> 
</table>
</div>	
<div id="transfer" style="display:none;">
<table width="720" cellpadding="0" cellspacing="0" border="0">	
	<tr>
	<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
	<td>Select Doctor <span class="red">*</span></td>
	<td>Select Appointment Date <span class="red">*</span></td>
	<td>Select Slot <span class="red">*</span></td>
  </tr>
	<tr>
	<td>
		<select name="doctor" id="doctor" class="drop2" >
			<option value="">Select Doctor</option>
			<?php while($val=mysql_fetch_object($get_doc_list))
			{	?>
			<option value="<?=$val->DOCTOR_ID?>"><?=$val->DOCTOR_FIRST_NAME.' '.$val->DOCTOR_LAST_NAME?></option>
			<? } ?>
		</select>
	</td>
	<td>
		<select name="date_sel1" id="date_sel1" class="drop2" onchange="find_time();" >
			<option value="">Select Date</option>
			<?php for($i=0;$i<14;$i++) { 
			$apt_date1 = date('Y-m-d', strtotime("+ $i day")); ?>
				<option value="<? print $apt_date1; ?>"><? print $apt_date1; ?></option>	
			<?php } ?>
		</select>
	</td>
	<td>
		<div id="avail1">
		<select name="time_sel1" id="time_sel1" class="drop2">
			<option value="">Select Time Slot</option>
			</select>
			</div>
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
		if($_REQUEST['search']=='confirm')
		{
			$sel_bid=mysql_fetch_object(mysql_query("select BOOKING_ID from booking where APT_DATE='".$sl_date."' and APT_TIME='".$_GET['bk_id']."' and DOCTOR_ID='".$doctr_id->DOCTOR_ID."'"));
			$update_booking_det=mysql_query("update booking_details set FLAG=0 where BOOKING_ID='".$sel_bid->BOOKING_ID."'");
			$update_booking=mysql_query("update booking set FLAG=0 where BOOKING_ID='".$sel_bid->BOOKING_ID."'");
			if($update_booking_det==1 && $update_booking==1)
			{
				$patient_no=mysql_fetch_object(mysql_query("select * from booking_details where BOOKING_ID='".$sel_bid->BOOKING_ID."'"));
				$doctor_ids=mysql_fetch_object(mysql_query("select * from booking where BOOKING_ID='".$sel_bid->BOOKING_ID."'"));
				$from_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME from doctor_register where DOCTOR_ID='".$doctor_ids->DOCTOR_ID."'"));
				$slot_time= mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$doctor_ids->APT_TIME."'"));
				$time_apt=explode(':',$slot_time->START_TIME);
				$time_bk=$time_apt[0].':'.$time_apt[1];
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,"http://myvaluefirst.com/smpp/sendsms?");
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS,
							"username=ezpointment&password=ezpoint1&to=".$patient_no->MOBILE."&from=EZAPPT&udh=0&text= Dear ".$patient_no->FNAME." your appointment with ".$from_name->DOCTOR_FIRST_NAME." is confirmed for ".$doctor_ids->APT_DATE." at ".$time_bk.". &dlr-mask=19&dlr-url");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$server_output = curl_exec ($ch);
				curl_close ($ch);
				
				//Dear.{V}your appointment with.{V}is confirmed for.{V}at.{V}
				
				print("<script language='javascript'>alert('Appointment confirmed...'); window.parent.location.href='slot.php'; </script>");
			}
			else
			{
				print("<script language='javascript'>alert('Request Incomplete, Try Again...'); </script>");
			}
		}
		else if($_REQUEST['search']=='cancel')
		{
			$sel_bid=mysql_fetch_object(mysql_query("select BOOKING_ID from booking where APT_DATE='".$sl_date."' and APT_TIME='".$_GET['bk_id']."' and DOCTOR_ID='".$doctr_id->DOCTOR_ID."'"));
			$del_booking_det=mysql_query("delete from booking_details where BOOKING_ID='".$sel_bid->BOOKING_ID."'");
			$del_booking=mysql_query("delete from booking where BOOKING_ID='".$sel_bid->BOOKING_ID."'");
			if($del_booking_det==1 && $del_booking==1)
			{
				$patient_no=mysql_fetch_object(mysql_query("select * from booking_details where BOOKING_ID='".$sel_bid->BOOKING_ID."'"));
				$doctor_ids=mysql_fetch_object(mysql_query("select * from booking where BOOKING_ID='".$sel_bid->BOOKING_ID."'"));
				$from_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME from doctor_register where DOCTOR_ID='".$doctor_ids->DOCTOR_ID."'"));
				$slot_time= mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$doctor_ids->APT_TIME."'"));
				$time_apt=explode(':',$slot_time->START_TIME);
				$time_bk=$time_apt[0].':'.$time_apt[1];
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,"http://myvaluefirst.com/smpp/sendsms?");
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS,
							"username=ezpointment&password=ezpoint1&to=".$patient_no->MOBILE."&from=EZAPPT&udh=0&text= Dear ".$patient_no->FNAME." your appointment with ".$from_name->DOCTOR_FIRST_NAME." on ".$doctor_ids->APT_DATE." at ".$time_bk." is cancelled. &dlr-mask=19&dlr-url");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$server_output = curl_exec ($ch);
				curl_close ($ch);
				
				print("<script language='javascript'>alert('Appointment deleted...'); window.parent.location.href='slot.php'; </script>");
			}
			else
			{
				print("<script language='javascript'>alert('Request Incomplete, Try Again...'); </script>");
			}
			
		}
		else if($_REQUEST['search']=='reschedule')
		{
			$insert_booking=mysql_query("insert into booking (PATIENT_ID,DOCTOR_ID,APT_TIME,APT_DATE,CUSER,CDATE) values ('".$get_bk_det->PATIENT_ID."','".$get_bk_det->DOCTOR_ID."','".$_REQUEST['time_sel']."','".$_REQUEST['date_sel']."','".$_SESSION['username']."','".date('Y-m-d')."')");
			$book_id=mysql_insert_id();
			if($insert_booking==1)
			{
				$insert_detail=mysql_query("insert into booking_details (BOOKING_ID,FNAME,MNAME,LNAME,EMAIL_ID,MOBILE,DOB,APT_REASON,SEEN_BEFORE,CUSER,CDATE) values ('".$book_id."','".$get_bk_det->FNAME."','".$get_bk_det->MNAME."','".$get_bk_det->LNAME."','".$get_bk_det->EMAIL_ID."','".$get_bk_det->MOBILE."','".$get_bk_det->DOB."','".$get_bk_det->APT_REASON."','".$get_bk_det->SEEN_BEFORE."','".$_SESSION['username']."','".date('Y-m-d')."')");
				if($insert_detail==1)
				{
					$dc_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME from doctor_register where DOCTOR_ID='".$get_bk_det->DOCTOR_ID."'"));
					$sl_time= mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$_REQUEST['time_sel']."'"));
					$msg="Dear ".$get_bk_det->FNAME.", Dr. ".$dc_name->DOCTOR_FIRST_NAME." change appointment to ".$_REQUEST['date_sel']." at ".$sl_time->START_TIME."";
					$insert_msg=mysql_query("insert into msg (MSG_FROM,MSG_FROM_TYPE,MSG_TO,MSG_TO_TYPE,MSG,TYPE,BK_ID,CUSER,CDATE) values ('".$get_bk_det->DOCTOR_ID."','D','".$get_bk_det->PATIENT_ID."','P','".$msg."','reschedule','".$book_id."','".$_SESSION['username']."','".date('Y-m-d')."')");
					
					$patient_no=mysql_fetch_object(mysql_query("select * from booking_details where BOOKING_ID='".$book_id."'"));
					$doctor_ids=mysql_fetch_object(mysql_query("select * from booking where BOOKING_ID='".$book_id."'"));
					$from_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME from doctor_register where DOCTOR_ID='".$doctor_ids->DOCTOR_ID."'"));
					$slot_time= mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$doctor_ids->APT_TIME."'"));
					$time_apt=explode(':',$slot_time->START_TIME);
					$time_bk=$time_apt[0].':'.$time_apt[1];
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL,"http://myvaluefirst.com/smpp/sendsms?");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS,
								"username=ezpointment&password=ezpoint1&to=".$patient_no->MOBILE."&from=EZAPPT&udh=0&text= Dear ".$patient_no->FNAME." your appointment with ".$from_name->DOCTOR_FIRST_NAME." is confirmed for ".$doctor_ids->APT_DATE." at ".$time_bk.". &dlr-mask=19&dlr-url");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$server_output = curl_exec ($ch);
					curl_close ($ch);
					
					$del_booking_det=mysql_query("delete from booking_details where BOOKING_ID='".$get_bk_det->BOOKING_ID."'");
					$del_booking=mysql_query("delete from booking where BOOKING_ID='".$get_bk_det->BOOKING_ID."'");
					print("<script language='javascript'>alert('Appointment rescheduled...'); window.parent.location.href='slot.php'; </script>");
				}
				else
				{
					print("<script language='javascript'>alert('Request Incomplete, Try Again...'); </script>");
				}
			} 
		} 
		else if($_REQUEST['search']=='transfer')
		{
			$insert_booking=mysql_query("insert into booking (PATIENT_ID,DOCTOR_ID,APT_TIME,APT_DATE,CUSER,CDATE) values ('".$get_bk_det->PATIENT_ID."','".$_REQUEST['doctor']."','".$_REQUEST['time_sel1']."','".$_REQUEST['date_sel1']."','".$_SESSION['username']."','".date('Y-m-d')."')");
			$book_id=mysql_insert_id();
			if($insert_booking==1)
			{
				$insert_detail=mysql_query("insert into booking_details (BOOKING_ID,FNAME,MNAME,LNAME,EMAIL_ID,MOBILE,DOB,APT_REASON,SEEN_BEFORE,CUSER,CDATE) values ('".$book_id."','".$get_bk_det->FNAME."','".$get_bk_det->MNAME."','".$get_bk_det->LNAME."','".$get_bk_det->EMAIL_ID."','".$get_bk_det->MOBILE."','".$get_bk_det->DOB."','".$get_bk_det->APT_REASON."','".$get_bk_det->SEEN_BEFORE."','".$_SESSION['username']."','".date('Y-m-d')."')");
				if($insert_detail==1)
				{
					$dc_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME from doctor_register where DOCTOR_ID='".$get_bk_det->DOCTOR_ID."'"));
					$dc_name1=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME from doctor_register where DOCTOR_ID='".$_REQUEST['doctor']."'"));
					$sl_time= mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$_REQUEST['time_sel1']."'"));
					$msg="Dear ".$get_bk_det->FNAME.", Dr. ".$dc_name->DOCTOR_FIRST_NAME." transfer you to Dr. ".$dc_name1->DOCTOR_FIRST_NAME.", appointment date ".$_REQUEST['date_sel1']." at ".$sl_time->START_TIME."";
					$insert_msg=mysql_query("insert into msg (MSG_FROM,MSG_FROM_TYPE,MSG_TO,MSG_TO_TYPE,MSG,TYPE,BK_ID,CUSER,CDATE) values ('".$get_bk_det->DOCTOR_ID."','D','".$get_bk_det->PATIENT_ID."','P','".$msg."','transfer','".$book_id."','".$_SESSION['username']."','".date('Y-m-d')."')");
					
					/*$patient_no=mysql_fetch_object(mysql_query("select * from booking_details where BOOKING_ID='".$book_id."'"));
					$doctor_ids=mysql_fetch_object(mysql_query("select * from booking where BOOKING_ID='".$book_id."'"));
					$from_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME from doctor_register where DOCTOR_ID='".$doctor_ids->DOCTOR_ID."'"));
					$slot_time= mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$doctor_ids->APT_TIME."'"));
					$time_apt=explode(':',$slot_time->START_TIME);
					$time_bk=$time_apt[0].':'.$time_apt[1];
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL,"http://myvaluefirst.com/smpp/sendsms?");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS,
								"username=ezpointment&password=ezpoint1&to=".$patient_no->MOBILE."&from=EZAPPT&udh=0&text= Dear ".$patient_no->FNAME." your appointment with ".$from_name->DOCTOR_FIRST_NAME." is confirmed for ".$doctor_ids->APT_DATE." at ".$time_bk.". &dlr-mask=19&dlr-url");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$server_output = curl_exec ($ch);
					curl_close ($ch);*/
					
					$del_booking_det=mysql_query("delete from booking_details where BOOKING_ID='".$get_bk_det->BOOKING_ID."'");
					$del_booking=mysql_query("delete from booking where BOOKING_ID='".$get_bk_det->BOOKING_ID."'");
					print("<script language='javascript'>alert('Appointment transferred to another doctor...'); window.parent.location.href='slot.php'; </script>");
				}
				else
				{
					print("<script language='javascript'>alert('Request Incomplete, Try Again...'); </script>");
				}
			} 
		} 
	}
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
		 
		 
<?php 
include("config/config.php");
include("config/function.php");
if($_SESSION['username'])
{
	$patient=mysql_fetch_object(mysql_query("select USER_UN_ID from login where USERNAME='".$_SESSION['username']."' and USER_TYPE='P'"));
	$_SESSION['pat_id']=$patient->USER_UN_ID;
	$_SESSION['bk_id']='';
	$_SESSION['dt']='';
	$_SESSION['doc_id']='';
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
<script type="text/javascript" src="advance_search.js"></script>
<script type="text/javascript" src="scw.js"></script>
</head>
<body class="maina">
<!--div class="dashright"-->
<form name="search1" method="post" action="" >
  <table width="100%" cellpadding="1" cellspacing="1">
  	<tr><td colspan="8"><h2 style="color:#003162;">Upcoming Appointment</h2></td></tr>
	<tr><td colspan="8">&nbsp;</td></tr>
	<?php $count=mysql_num_rows(mysql_query("select * from booking,booking_details where booking.BOOKING_ID=booking_details.BOOKING_ID and PATIENT_ID='".$_SESSION['pat_id']."' and APT_DATE>='".date('Y-m-d')."'"));
	if($count==0)
		{
		?>
		<tr>
		<td colspan="8" width="122" class="timetabH2"><strong>No Upcoming appointments</strong></td>
		</tr>
		<? } else { ?>
    <tr>
      <th width="316" class="timetabH4">Appointment</th>
      <th width="205" class="timetabH4">Doctor</th>
	  <th width="235" class="timetabH4">Doctor Speciality</th>
	  <th width="237" class="timetabH4">Address</th>
	  <th width="205" class="timetabH4">Patient</th>
	  <th width="122" class="timetabH4">Problem</th>
	  <th width="122" class="timetabH4">Status</th>
	  <th width="122" class="timetabH4">Cancel Appointment</th>
    </tr>
    <?php $get_apt_list=mysql_query("select * from booking,booking_details where booking.BOOKING_ID=booking_details.BOOKING_ID and PATIENT_ID='".$_SESSION['pat_id']."' and APT_DATE>='".date('Y-m-d')."'"); 
		$sl=1;
		while($val=mysql_fetch_object($get_apt_list))
		{
			$slot_time=mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$val->APT_TIME."'"));
			$doc_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME from doctor_register where DOCTOR_ID='".$val->DOCTOR_ID."'"));
			$specl=mysql_fetch_object(mysql_query("select DOCTOR_SPECIALITY from doctor_personal_location_info where DOCTOR_ID='".$val->DOCTOR_ID."'"));
			$address=mysql_fetch_object(mysql_query("select DOCTOR_ADDRESS,DOCTOR_CITY,DOCTOR_STATE from doctor_personal_info where DOCTOR_ID='".$val->DOCTOR_ID."'"));
			$city=mysql_fetch_object(mysql_query("select CITY_NAME from city_table where CITY_ID='".$address->DOCTOR_CITY."'"));
			$state=mysql_fetch_object(mysql_query("select STATE_NAME from state_table where STATE_ID='".$address->DOCTOR_STATE."'"));
			
			$date2=date('Y-m-d');
			$date1=$val->APT_DATE;
			$date_diff=strtotime($date1) - strtotime($date2);
			$cnt_day=$date_diff/(60 * 60 * 24);
	?>
    <tr>
      <td align="center" width="316" class="timetabH1"><? print date('D', strtotime($val->APT_DATE)).', '.date('M d, Y', strtotime($val->APT_DATE)).', '.slot($slot_time->START_TIME); ?></td>
      <td width="205" class="timetabH2"><?=$doc_name->DOCTOR_FIRST_NAME.' '.$doc_name->DOCTOR_LAST_NAME?></td>
	  <td width="235" class="timetabH1"><?=$specl->DOCTOR_SPECIALITY?></td>
	  <td width="237" class="timetabH2"><?=$address->DOCTOR_ADDRESS.','.$city->CITY_NAME.','.$state->STATE_NAME;?></td>
	  <td width="205" class="timetabH1"><?=$val->FNAME.' '.$val->LNAME?></td>
	  <td width="122" class="timetabH2"><?=$val->APT_REASON?></td>
	  <td width="122" class="timetabH2"><?php if($val->FLAG=='1') { print 'Pending'; } else if($val->FLAG=='0') { print 'Confirmed'; } ?></td>
	  <td width="122" class="timetabH2"><?php if($cnt_day>=1) { ?><a href="upcoming_apt_p.php?cancel_apt=<?php print $val->BOOKING_ID;?>"><img src="images/check.png" title="Click to cancel the appointment" /></a><?php } else { ?><img src="images/delete.png" /><?php } ?></td>
    </tr>
    <?php $sl=$sl+1; 
		} 
		}
		?>
  </table>
</form>
</body>
</html>
<?php
	if($_REQUEST['cancel_apt']!='')
	{
		$msg_to_id=mysql_fetch_object(mysql_query("select * from booking where BOOKING_ID='".$_REQUEST['cancel_apt']."'"));
		$slot_time1=mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$msg_to_id->APT_TIME."'"));
		$msg_content="your appointmnet has been cancelled date: ".dateformat($msg_to_id->APT_DATE)." slot: ".slot($slot_time1->START_TIME)." .";
		$update_msg=mysql_query("insert into msg (MSG_FROM,MSG_FROM_TYPE,MSG_TO,MSG_TO_TYPE,MSG,TYPE,BK_ID,CUSER,CDATE) values ('".$patient->USER_UN_ID."','P','".$msg_to_id->DOCTOR_ID."','D','".$msg_content."','cancelled','".$_REQUEST['cancel_apt']."','".$_SESSION['username']."','".date('Y-m-d')."')");
		$update_msg=mysql_query("insert into msg (MSG_FROM,MSG_FROM_TYPE,MSG_TO,MSG_TO_TYPE,MSG,TYPE,BK_ID,CUSER,CDATE) values ('".$patient->USER_UN_ID."','P','".$patient->USER_UN_ID."','P','".$msg_content."','cancelled','".$_REQUEST['cancel_apt']."','".$_SESSION['username']."','".date('Y-m-d')."')");
		$del_booking_det=mysql_query("delete from booking_details where BOOKING_ID='".$_REQUEST['cancel_apt']."'");
		$del_booking=mysql_query("delete from booking where BOOKING_ID='".$_REQUEST['cancel_apt']."'");
		if($update_msg==1 && $del_booking_det==1 && $del_booking==1)
		{
			print("<script language='javascript'>alert('request Completed...'); window.location.href='upcoming_apt_p.php';</script>");
		}
		else
		{
			print("<script language='javascript'>alert('request Incompleted...'); window.location.href='upcoming_apt_p.php';</script>");
		}
	}
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
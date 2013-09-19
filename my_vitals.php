<?php 
include("config/config.php");
include("config/function.php");
if($_SESSION['username'])
{
	//print_r($_SESSION);
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
  	<tr><td colspan="9"><h2 style="color:#003162;">Vitals</h2></td></tr>
	<tr><td colspan="9">&nbsp;</td></tr>
    <tr>
      <th width="171" class="timetabH4">Appointment Date</th>
      <th width="191" class="timetabH4">Doctor</th>
	  <th width="204" class="timetabH4">Booking Id</th>
	  <th width="151" class="timetabH4">Patient Name</th>
	  <th width="151" class="timetabH4">Heart Beat</th>
	  <th width="150" class="timetabH4">Blood Pressure </th>
	  <th width="131" class="timetabH4">Temperature</th>
	  <th width="126" class="timetabH4">Sugar Level</th>
	  <th width="190" class="timetabH4">Problem</th>
    </tr>
    <?php $get_vital=mysql_query("select * from vital where PATIENT_ID='".$_SESSION['pat_id']."' group by BOOKING_ID"); 
		$sl=1;
		while($val=mysql_fetch_object($get_vital))
		{
			$slot_det=mysql_fetch_object(mysql_query("select APT_DATE,APT_TIME,APT_REASON from booking,booking_details where booking.BOOKING_ID=booking_details.BOOKING_ID and booking.BOOKING_ID='".$val->BOOKING_ID."'"));
			$slot_time=mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$slot_det->APT_TIME."'"));
			$doc_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME from doctor_register where DOCTOR_ID='".$val->DOCTOR_ID."'"));
	?>
    <tr>
     
      <td align="center" width="171" class="timetabH1"><? print dateformat($slot_det->APT_DATE).', '.slot($slot_time->START_TIME); ?></td>
      <td width="191" class="timetabH2"><?=$doc_name->DOCTOR_FIRST_NAME.' '.$doc_name->DOCTOR_LAST_NAME?></td>
	  <td width="204" class="timetabH1"><?=$val->BOOKING_ID?></td>
	  <td width="151" class="timetabH2"><?=$val->PATIENT_FNAME.' '.$val->PATIENT_LNAME;?></td>
	  <td width="150" class="timetabH1"><?=$val->HEART_BEAT?></td>
	  <td width="150" class="timetabH1"><?=$val->BLOOD_PRESSURE?></td>
	  <td width="131" class="timetabH1"><?=$val->TEMPERATURE?></td>
	  <td width="126" class="timetabH1"><?=$val->SUGAR?></td>
	  <td  width="190" class="timetabH2"><?=$slot_det->APT_REASON?></td>
    </tr>
    <?php $sl=$sl+1; 
		} ?>
  </table>
</form>
</body>
</html>
<?php
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
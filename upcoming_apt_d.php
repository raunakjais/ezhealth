<?php 
include("config/config.php");
if($_SESSION['username'])
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ezpointment</title>
<link rel="stylesheet" href="styles/nyroModal.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/modal.js"></script>
<script type="text/javascript" src="js/jquery.nyroModal-1.6.2.pack.js"></script>
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
  <table width="100%" cellpadding="1" cellspacing="1" align="center">
  	<tr><td colspan="3"><h2 style="color:#003162;">Upcoming Appointment</h2></td></tr>
	<tr><td colspan="3">&nbsp;</td></tr>
    <tr>
      <th width="103" class="timetabH4">Sr. No.</th>
      <th width="282" class="timetabH4">Date</th>
      <th width="323" class="timetabH4">Appointment Count</th>
    </tr>
    
    <?php 
		for($i=0;$i<7;$i++) { 
		$apt_date = date("d/m/Y", strtotime("+ $i day")); 
		$apt_date1 = date('Y-m-d', strtotime("+ $i day")); 					
		$get_count=mysql_num_rows(mysql_query("select BOOKING_ID from booking where DOCTOR_ID='".$_SESSION['doc_id']."' and APT_DATE='".$apt_date1."'")); 
	?>
    <tr>
      <td align="center" width="103" class="timetabH2"><?=$i+1?></td>
      <td align="center" width="282" class="timetabH1"><? print $apt_date; ?></td>
      <td align="center" width="323" class="timetabH2"><?=$get_count?> &nbsp;&nbsp;&nbsp; <a href="view_upcoming_apt.php?date=<?=$apt_date1?>" class="nyroModal" style="cursor:pointer; color:#333333;"><strong>View</strong></a></td>
    </tr>
    <?php 
		}//end of for ?>
  </table>
  <blockquote>&nbsp;</blockquote>
  <table width="100%" cellpadding="1" cellspacing="1">
  	<tr><td colspan="5"><h2 style="color:#003162;">Check Appeared Patient</h2></td></tr>
	<tr><td colspan="5">&nbsp;</td></tr>
    <tr>
      <th width="61" class="timetabH4">Sr. No.</th>
      <th width="193" class="timetabH4">Appointment</th>
	  <th width="175" class="timetabH4">Patient</th>
	  <th width="170" class="timetabH4">Problem</th>
	  <th width="119" class="timetabH4">Check-in</th>
    </tr>
	<tr>
      <td class="timetabH1" colspan="6"><strong>Date: <?=date('d-M-Y')?></strong></td>
    </tr>
    <?php 
	
	$i=0;
	$time=date('H:i:s');
	$present_slot_show=mysql_fetch_object(mysql_query("select SLOT_ID from slot where START_TIME < '".$time."' and END_TIME > '".$time."'"));
	if($present_slot_show->SLOT_ID=='')
	{
		$present_slot_show->SLOT_ID='50';
	}

	$sel_booking=mysql_query("select * from booking,booking_details where booking.BOOKING_ID=booking_details.BOOKING_ID and DOCTOR_ID='".$_SESSION['doc_id']."' and APT_DATE='".date('Y-m-d')."' and APT_TIME < '".$present_slot_show->SLOT_ID."' ");
	while($val=mysql_fetch_object($sel_booking))
	{
	$i=$i+1;
	$slot_time=mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$val->APT_TIME."'"));
	?>
    <tr>
      <td width="61" class="timetabH2"><?=$i?></td>
      <td width="193" class="timetabH2"><? print date('D', strtotime($val->APT_DATE)).', '.$slot_time->START_TIME; ?></td>
	  <td width="175" class="timetabH2" align="center"><?=$val->FNAME.' '.$val->LNAME?></td>
	  <td width="170" class="timetabH2" align="center"><?=$val->APT_REASON?></td>
	  <td width="119" class="timetabH2" align="center"><input type="checkbox" name="physical_<?=$i?>" id="physical" <?php if($val->AP_FLAG=='1') {?> checked="checked" disabled="disabled" <?php } ?> value="<?php print $val->BOOKING_ID; ?>" /></td>
    </tr>
    <?php 
	
	}
	
	$apt_date1 = date('Y-m-d', strtotime("- 1 day")); 					
	$sel_booking1=mysql_query("select * from booking,booking_details where booking.BOOKING_ID=booking_details.BOOKING_ID and DOCTOR_ID='".$_SESSION['doc_id']."' and APT_DATE='".$apt_date1."' ");
	?>
	<tr>
      <td colspan="6" bgcolor="#FFFFFF">&nbsp;<input type="hidden" name="hid_i" value="<?=$i?>" /></td>
    </tr>
	<tr>
      <td class="timetabH1" colspan="6"><strong>Date: <?=date('d-M-Y', strtotime("- 1 day"));?></strong></td>
    </tr>
	<?
	$j=0;
	while($val1=mysql_fetch_object($sel_booking1))
	{
	$j=$j+1;
	$slot_time=mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$val1->APT_TIME."'"));
	?>
    <tr>
      <td width="61" class="timetabH2"><?=$j?></td>
      <td width="193" class="timetabH2"><? print date('D', strtotime($val1->APT_DATE)).', '.$slot_time->START_TIME; ?></td>
	  <td width="175" class="timetabH2" align="center"><?=$val1->FNAME.' '.$val1->LNAME?></td>

	  <td width="170" class="timetabH2" align="center"><?=$val1->APT_REASON?></td>
	  <td width="119" class="timetabH2" align="center"><input type="checkbox" name="physicaln_<?=$j?>" id="physicaln" <?php if($val1->AP_FLAG=='1') {?> checked="checked" disabled="disabled" <?php } ?> value="<?php print $val1->BOOKING_ID; ?>" /></td>
    </tr>
    <?php 
	 
	}
		?>
		<tr>
		  <td colspan="5" width="119" class="timetabH3" align=""><input type="hidden" name="hid_j" value="<?=$j?>" /><input type="submit" value="Update" name="submit" class="but-blue"/></td>
		</tr>
  </table>
</form>
</body>
</html>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		if($_POST['hid_i']>=1)
		{
			for($k=1;$k<=$_POST['hid_i'];$k++)
			{
				if($_POST['physical_'.$k])
				{
					mysql_query("UPDATE booking SET AP_FLAG='1' WHERE BOOKING_ID='".$_POST['physical_'.$k]."'");
				}
			}	
		}
		if($_POST['hid_j']>=1)
		{
			for($m=1;$m<=$_POST['hid_j'];$m++)
			{
				if($_POST['physicaln_'.$m])
				{
					mysql_query("UPDATE booking SET AP_FLAG='1' WHERE BOOKING_ID='".$_POST['physicaln_'.$m]."'");
				}
			}	
		}
		print("<script language='javascript'>alert('Patient updated successfully.');window.location.href='upcoming_apt_d.php';</script>");
	}
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
<?php 
include("config/config.php");
if($_SESSION['username'])
{
	$get_doc_list=mysql_query("select * from doc_mapping,doctor_register where DOC_ID=DOCTOR_ID and RECP_ID='".$_SESSION['recp_id']."'"); 
	$get_fdoc=mysql_fetch_object(mysql_query("select * from doc_mapping,doctor_register where DOC_ID=DOCTOR_ID and RECP_ID='".$_SESSION['recp_id']."'")); 
	$doc_count=mysql_num_rows(mysql_query("select * from doc_mapping,doctor_register where DOC_ID=DOCTOR_ID and RECP_ID='".$_SESSION['recp_id']."'")); 
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
<script type="text/javascript" src="docHistory.js"></script>
</head>
<body class="maina">
<!--div class="dashright"-->
<form name="search1" method="post" action="">
<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td>Select Doctor <span class="red">*</span>
		</td>
	</tr>
	<tr>
		<td>
		<select name="sel_doc" id="sel_doc" class="drop2" onChange="showDocHistory(this.value,'disp_doc_history');" >
			<!--option value="">Select Doctor</option-->
			<?php while($val=mysql_fetch_object($get_doc_list))
			{	?>
			<option value="<?=$val->DOCTOR_ID?>"><?=$val->DOCTOR_FIRST_NAME.' '.$val->DOCTOR_LAST_NAME?></option>
			<? } ?>
		</select>
		</td>
	</tr>
</table>
<div id="disp_doc_history">
		
			<?php $doctor_id=$get_fdoc->DOCTOR_ID; ?>
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
			<!--div class="dashright"-->
			<form name="search1" method="post" action="">
			  <table width="100%" cellpadding="1" cellspacing="1" align="center">
				<tr>
				  <th width="61" class="timetabH4">Sr. No.</th>
				  <th width="193" class="timetabH4">Appointment</th>
				  <th width="175" class="timetabH4">Patient</th>
				  <th width="170" class="timetabH4">Problem</th>
				  <th width="119" class="timetabH4">Action</th>
				</tr>
				<tr>
				  <td class="timetabH5" align="left" colspan="6"><strong><?=date('d-M-Y')?></strong></td>
				</tr>
				<?php 
				
				$i=1;
				$time=date('H:i:s');
				$present_slot_show=mysql_fetch_object(mysql_query("select SLOT_ID from slot where START_TIME < '".$time."' and END_TIME > '".$time."'"));
				if($present_slot_show->SLOT_ID=='')
				{
					$present_slot_show->SLOT_ID='50';
				}
				
				$sel_booking=mysql_query("select * from booking,booking_details where booking.BOOKING_ID=booking_details.BOOKING_ID and DOCTOR_ID='".$doctor_id."' and APT_DATE='".date('Y-m-d')."' and APT_TIME < '".$present_slot_show->SLOT_ID."' ");
				while($val=mysql_fetch_object($sel_booking))
				{
				$slot_time=mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$val->APT_TIME."'"));
				$sel_pres=mysql_num_rows(mysql_query("select PRESCRIPTION_ID from prescription where BOOKING_ID='".$val->BOOKING_ID."'"));
				$sel_vital=mysql_num_rows(mysql_query("select VITAL_ID from vital where BOOKING_ID='".$val->BOOKING_ID."'"));
				?>
				<tr>
				  <td width="61" class="timetabH2"><?=$i?></td>
				  <td width="193" class="timetabH2"><? print date('D', strtotime($val->APT_DATE)).', '.$slot_time->START_TIME; ?></td>
				  <td width="175" class="timetabH2" align="center"><?=$val->FNAME.' '.$val->LNAME?></td>
				  <td width="170" class="timetabH2" align="center"><?=$val->APT_REASON?></td>
				  <td width="119" class="timetabH2" align="center">
				  <? if($sel_pres>0) { ?> 
				  <img src="images/prescription.png" title="Prescription already added" />
				  <? } else { ?>
				  <a href="#" onclick="window.open('add_precription.php?patient_id=<?php print $val->PATIENT_ID; ?>&fname=<?=$val->FNAME?>&lname=<?=$val->LNAME?>&reason=<?=$val->APT_REASON?>&bk_id=<?=$val->BOOKING_ID?>','add_prescription', 'menubar=0,resizable=no,scrollbars=1,width=750,height=650')"><img src="images/prescription.png" title="Add Prescription" style="cursor:pointer;" /></a>
				  <? } ?>
				  
				  <? if($sel_vital>0) { ?>
					<img src="images/vitals.png" title="Vital Statistics already added" />
				  <? } else { ?>
				  &nbsp;&nbsp;&nbsp;<a href="#" onclick="window.open('add_vitals.php?patient_id=<?php print $val->PATIENT_ID; ?>&fname=<?=$val->FNAME?>&lname=<?=$val->LNAME?>&reason=<?=$val->APT_REASON?>&bk_id=<?=$val->BOOKING_ID?>','add_vitals', 'menubar=0,resizable=no,scrollbars=1,width=750,height=650')"><img src="images/vitals.png" title="Add Vital Statistics" style="cursor:pointer;" /></a>
				  <? } ?>
				  
				  
				  &nbsp;&nbsp;&nbsp;<a href="refer.php?patient_id=<?php print $val->PATIENT_ID; ?>&fname=<?=$val->FNAME?>&lname=<?=$val->LNAME?>&reason=<?=$val->APT_REASON?>"><img src="images/referrel.png" title="Refer" style="cursor:pointer;"  /></a></td>
				</tr>
				<?php 
				$i=$i+1;
				}
				
				$apt_date1 = date('Y-m-d', strtotime("- 1 day")); 					
				$sel_booking1=mysql_query("select * from booking,booking_details where booking.BOOKING_ID=booking_details.BOOKING_ID and DOCTOR_ID='".$doctor_id."' and APT_DATE='".$apt_date1."' ");
				?>
				<tr>
				  <td colspan="6" bgcolor="#FFFFFF">&nbsp;</td>
				</tr>
				<tr>
				  <td class="timetabH5" colspan="6"><strong><?=date('d-M-Y', strtotime("- 1 day"));?></strong></td>
				</tr>
				<?
				$i=1;
				while($val1=mysql_fetch_object($sel_booking1))
				{
				$slot_time=mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$val1->APT_TIME."'"));
				$sel_pres1=mysql_num_rows(mysql_query("select PRESCRIPTION_ID from prescription where BOOKING_ID='".$val1->BOOKING_ID."'"));
				$sel_vital1=mysql_num_rows(mysql_query("select VITAL_ID from vital where BOOKING_ID='".$val1->BOOKING_ID."'"));
				?>
				<tr>
				  <td width="61" class="timetabH2"><?=$i?></td>
				  <td width="193" class="timetabH2"><? print date('D', strtotime($val1->APT_DATE)).', '.$slot_time->START_TIME; ?></td>
				  <td width="175" class="timetabH2" align="center"><?=$val1->FNAME.' '.$val1->LNAME?></td>
				  <td width="170" class="timetabH2" align="center"><?=$val1->APT_REASON?></td>
				  <td width="119" class="timetabH2" align="center">
				  <? if($sel_pres1>0) { ?> 
				  <img src="images/prescription.png" title="Prescription already added" />
				  <? } else { ?>
				  <a href="#" onclick="window.open('add_precription.php?patient_id=<?php print $val1->PATIENT_ID; ?>&fname=<?=$val1->FNAME?>&lname=<?=$val1->LNAME?>&reason=<?=$val1->APT_REASON?>&bk_id=<?=$val1->BOOKING_ID?>','add_prescription', 'menubar=0,resizable=no,scrollbars=1,width=750,height=650')"><img src="images/prescription.png" title="Add Prescription" style="cursor:pointer;" /></a>
				  <? } ?>
				  
				  <? if($sel_vital1>0) { ?> 
					<img src="images/vitals.png" title="Vital Statistics already added" />
				  <? } else { ?>
				  &nbsp;&nbsp;&nbsp;<a href="#" onclick="window.open('add_vitals.php?patient_id=<?php print $val1->PATIENT_ID; ?>&fname=<?=$val1->FNAME?>&lname=<?=$val1->LNAME?>&reason=<?=$val1->APT_REASON?>&bk_id=<?=$val1->BOOKING_ID?>','add_vitals', 'menubar=0,resizable=no,scrollbars=1,width=750,height=650')"><img src="images/vitals.png" title="Add Vital Statistics" style="cursor:pointer;" /></a>
				  <? } ?>
				  
				  &nbsp;&nbsp;&nbsp;<a href="refer.php?patient_id=<?php print $val1->PATIENT_ID; ?>&fname=<?=$val1->FNAME?>&lname=<?=$val1->LNAME?>&reason=<?=$val1->APT_REASON?>"><img src="images/referrel.png" title="Refer" style="cursor:pointer;"  /></a>
				  
				  </td>
				</tr>
				<?php 
				$i=$i+1;
				}
					?>
				<!--tr>
				  <td colspan="6" align="right"><a href="apt_history.php?view=full" style="color:#999999; text-decoration:none;">View All</a></td>
				</tr-->
			  </table>
			</form>
		
</div>
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
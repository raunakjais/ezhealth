<?php 
include("config/config.php");
include("config/function.php");
if($_SESSION['username'])
{	
	/*$query = "select * from refer_patient where PATIENT_ID='".$_SESSION['pat_id']."'";*/
	$query = "select * from msg where MSG_TO='".$_SESSION['pat_id']."' and MSG_TO_TYPE='P' and TYPE!='' and FLAG=0 order by CDATE DESC";
//	$query = "select * from msg where MSG_TO='".$_SESSION['pat_id']."' and MSG_TO_TYPE='P' and TYPE='' and FLAG=0 order by CDATE DESC";
	//$update_flag=mysql_query("update refer_patient set FLAG=1 where PATIENT_ID='".$_SESSION['pat_id']."' ");
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
<script type="text/javascript" src="scw.js"></script>

<link media="screen" rel="stylesheet" href="styles/colorbox.css" />
<script src="js/colorbox-min.js"></script>
<script src="js/min.js"></script>	
<script src="js/colorbox.js"></script>
<script>
	$(document).ready(function(){
		//Examples of how to assign the ColorBox event to elements
		$(".group1").colorbox({rel:'group1'});
		$(".group2").colorbox({rel:'group2', transition:"fade"});
		$(".group3").colorbox({rel:'group3', transition:"none", width:"100%", height:"100%"});
		$(".group4").colorbox({rel:'group4', slideshow:true});
		$(".ajax").colorbox();
		$(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
		$(".iframe").colorbox({iframe:true, width:"100%", height:"100%"});
		$(".inline").colorbox({inline:true, width:"50%"});
		$(".callbacks").colorbox({
			onOpen:function(){ alert('onOpen: colorbox is about to open'); },
			onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
			onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
			onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
			onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
		});
		
		//Example of preserving a JavaScript event for inline calls.
		$("#click").click(function(){ 
			$('#click').css({"background-color":"#000", "color":"#000", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
			return false;
		});
	});
</script>
</head>
<body class="maina">
<!--div class="dashright"-->
<div class="content1">
<form name="siteadmin" method="post" action="" onSubmit="">
<table width="720" cellpadding="1" cellspacing="1" border="0">
<tr><td colspan="8"><h2 style="color:#003162;">Alerts</h2></td></tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr><td colspan="8"><div align="center" id="manoj" style="display:none; background-color:#33CC33;"><?php echo $message; ?></div>
</td></tr>
<tr>
<th width="233" class="timetabH4">Date</th>
<th width="304" class="timetabH4">From </th>
<th width="792" class="timetabH4">Subject</th>
</tr>
			<?php
		   $i=1;
		   $result=mysql_query($query);
			while($row=mysql_fetch_array($result))
			{
				if($row['MSG_FROM_TYPE']=='D')
				{
					$name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME from doctor_register where DOCTOR_ID='".$row['MSG_FROM']."'"));
					$from=$name->DOCTOR_FIRST_NAME.' '.$name->DOCTOR_LAST_NAME;
				}
				if($row['MSG_FROM_TYPE']=='H')
				{
					$name=mysql_fetch_object(mysql_query("select BUSINESS_LOCATION_TITLE from business_info where BUSINESS_ID='".$row['MSG_FROM']."'"));
					$from=$name->BUSINESS_LOCATION_TITLE;
				}
				if($row['MSG_FROM_TYPE']=='P')
				{
					$name=mysql_fetch_object(mysql_query("select PATIENT_FIRST_NAME,PATIENT_LAST_NAME from patientregister where PATIENT_ID='".$row['MSG_FROM']."'"));
					$from=$name->PATIENT_FIRST_NAME.' '.$name->PATIENT_LAST_NAME;
				}
				
				if($row['REFER_TO_TYPE']=='D')
				{
					$name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME from doctor_register where DOCTOR_ID='".$row['REFER_TO']."'"));
					$to=$name->DOCTOR_FIRST_NAME.' '.$name->DOCTOR_LAST_NAME;
				}
				if($row['REFER_TO_TYPE']=='H')
				{
					$name=mysql_fetch_object(mysql_query("select BUSINESS_LOCATION_TITLE from business_info where BUSINESS_ID='".$row['REFER_TO']."'"));
					$to=$name->BUSINESS_LOCATION_TITLE;
				}
		  ?>		  
		<tr>
			<td class="timetabH2"><? print dateformat($row['CDATE']);?></td>
			<td class="timetabH1"><? if($row['MSG_FROM_TYPE']=='D') { print 'Dr. '; } print $from; ?></td>
			<td class="timetabH2"><?php if($row['TYPE']=='reschedule') { ?><a href="cancel_apt.php?bookng_id=<?=$row['BK_ID']?>" class="iframe" style="text-decoration:none;">Appointment Reschedule</a><? } if($row['TYPE']=='transfer') {  ?><a href="alert.php?bookng_id=<?=$row['BK_ID']?>" class="iframe" style="text-decoration:none;">Refer to another doctor</a><? } if($row['TYPE']=='prescription') { ?><a href="alert_pres.php?bookng_id=<?=$row['BK_ID']?>" class="iframe" style="text-decoration:none;">You have a new prescription</a><?php } ?><?php if($row['TYPE']=='cancelled') { ?><a href="cancel_apt_alert.php?cancl_bk_id=<?=$row['BK_ID']?>" style="text-decoration:none;" class="iframe">Appointment Cancelled</a><?php } ?></td>
		</tr>		 
		<? 
		$i=$i+1;
		   }
		   ?>      
</table>
</form>
</div>
</body>
</html>
<?php
	if($_REQUEST['del_bk_id']!='')
	{
		$update_msg=mysql_query("update msg set FLAG=1 where BK_ID='".$_REQUEST['del_bk_id']."'");
		$del_booking_det=mysql_query("delete from booking_details where BOOKING_ID='".$_REQUEST['del_bk_id']."'");
		$del_booking=mysql_query("delete from booking where BOOKING_ID='".$_REQUEST['del_bk_id']."'");
		if($update_msg==1 && $del_booking_det==1 && $del_booking==1)
		{
			print("<script language='javascript'>alert('request Completed...'); window.location.href='alert_patient.php';</script>");
		}
		else
		{
			print("<script language='javascript'>alert('request Incompleted...'); window.location.href='alert_patient.php';</script>");
		}
	}
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
		
		 
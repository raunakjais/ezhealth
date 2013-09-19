<?php 
include("config/config.php");
include("config/function.php");
if($_SESSION['username'])
{
	$patient=mysql_fetch_object(mysql_query("select USER_UN_ID from login where USERNAME='".$_SESSION['username']."' and USER_TYPE='P'"));
	$_SESSION['pat_id']=$patient->USER_UN_ID;
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
<body class="maina1">
<!--div class="dashright"-->
<form name="search1" method="post" action="" >
  <table width="750px" cellpadding="1" cellspacing="1">
  	<tr>
		<td colspan="6"><h2 style="color:#003162;">Appointment History</h2></td>
    </tr>
	<tr>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr>
      <th width="163" class="timetabH4">Appointment</th>
      <th width="121" class="timetabH4">Doctor</th>
	  <th width="105" class="timetabH4">Patient</th>
	  <th width="54" class="timetabH4">Problem</th>
	  <th width="123" class="timetabH4">Address</th>
	   <th width="123" class="timetabH4">Prescription</th>
    </tr>
    <?php 
	$get_apt_list=mysql_query("select * from booking,booking_details where booking.BOOKING_ID=booking_details.BOOKING_ID and PATIENT_ID='".$_SESSION['pat_id']."' and APT_DATE<='".date('Y-m-d')."' order by APT_DATE DESC"); 
		$sl=1;
		while($val=mysql_fetch_object($get_apt_list))
		{
			$slot_time=mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$val->APT_TIME."'"));
			$doc_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME from doctor_register where DOCTOR_ID='".$val->DOCTOR_ID."'"));
			$specl=mysql_fetch_object(mysql_query("select DOCTOR_SPECIALITY from doctor_personal_location_info where DOCTOR_ID='".$val->DOCTOR_ID."'"));
			$address=mysql_fetch_object(mysql_query("select DOCTOR_ADDRESS,DOCTOR_CITY,DOCTOR_STATE from doctor_personal_info where DOCTOR_ID='".$val->DOCTOR_ID."'"));
			$city=mysql_fetch_object(mysql_query("select CITY_NAME from city_table where CITY_ID='".$address->DOCTOR_CITY."'"));
			$state=mysql_fetch_object(mysql_query("select STATE_NAME from state_table where STATE_ID='".$address->DOCTOR_STATE."'"));
	?>
    <tr>
     
      <td width="163" class="timetabH1"><? print dateformat($val->APT_DATE).', '.slot($slot_time->START_TIME); ?></td>
      <td width="121" class="timetabH2"><?=$doc_name->DOCTOR_FIRST_NAME.' '.$doc_name->DOCTOR_LAST_NAME?></td>
	  <td width="105" class="timetabH1"><?=$val->FNAME.' '.$val->LNAME?></td>
	  <td width="54" class="timetabH2"><?=$val->APT_REASON?></td>
	  <td width="123" class="timetabH1"><?=$address->DOCTOR_ADDRESS.','.$city->CITY_NAME.','.$state->STATE_NAME;?></td>
	  <td align="center" width="123" class="timetabH2"><a href="view_precription.php?bk_id=<?=$val->BOOKING_ID?>" class="iframe" style="text-decoration:none;">View Prescription</a></td>
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
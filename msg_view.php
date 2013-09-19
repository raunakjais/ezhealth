<?php 
include("config/config.php");
if($_SESSION['username'])
{
	$get_chat_det=mysql_fetch_object(mysql_query("select * from chat where CHAT_ID='".$_REQUEST['chat_id']."'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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

</head>

<body>
<div class="maina">
<div class="midcontainer1">
			
<div class="doctor_M">

<table width="670px" cellspacing="1" cellpadding="1" border="0">
<tr>
<td colspan="2" width="300px"><h2 style="color:#003162;">Conversation </h2></td>
<td align="right" width="370px"><a href="message_patient.php" target="riframe"><img src='./images/close.png' border="0" title="Close"></a></td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3"><h4 style="color:#003162;">Subject : <?=$get_chat_det->SUBJECT?></h4></td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
	<tbody><tr>
	 <th width="501px" class="timetabH4">Msg From</th>
	 <th width="300px" class="timetabH4">Date</th>
	 <th width="900px" class="timetabH4">Description</th>
	</tr>		
	<?php 
	$query=mysql_query("select * from chat_details where CHAT_ID='".$_REQUEST['chat_id']."'");
	$sl=1;
	while($val=mysql_fetch_object($query)) 
	{ 
		if($_SESSION['user_type']==$val->CHAT_BY)
		{
			$from='Me';
		}
		else
		{
			if($val->CHAT_BY=='P')
			{
				$name=mysql_fetch_object(mysql_query("select PATIENT_FIRST_NAME,PATIENT_LAST_NAME from patientregister where PATIENT_ID='".$val->TXT_BY."'"));
				$from=$name->PATIENT_FIRST_NAME.' '.$name->PATIENT_LAST_NAME;
			}
			else if($val->CHAT_BY=='D')
			{
				$name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME from doctor_register where DOCTOR_ID='".$val->TXT_BY."'"));
				$from='Dr. '.$name->DOCTOR_FIRST_NAME.' '.$name->DOCTOR_LAST_NAME;
			}
			else if($val->CHAT_BY=='B')
			{
				$name=mysql_fetch_object(mysql_query("select BUSINESS_LOCATION_TITLE from business_info where BUSINESS_ID='".$val->TXT_BY."'"));
				$from=$name->BUSINESS_LOCATION_TITLE;
			}
			else if($val->CHAT_BY=='R')
			{
				$name=mysql_fetch_object(mysql_query("select RECEPTIONIST_FIRST_NAME,RECEPTIONIST_LAST_NAME from receptionist_register where RECEPTIONIST_ID='".$val->TXT_BY."'"));
				$from=$name->RECEPTIONIST_FIRST_NAME.' '.$name->RECEPTIONIST_LAST_NAME;
			}
		}
	
	?>
	<tr>
	<td width="691" class="timetabH2"><?=$from;?></td>
	<td width="641" class="timetabH2"><? print date('D - M d, Y',strtotime($val->CDATE));?></td>
	<td width="75" class="timetabH1"><?=$val->CHAT_DETAILS;?></td>
	</tr>
	<?php  $sl=$sl+1; } ?>
	</tbody></table>
</div>
</div>
</div>
</body>
</html>
<?php
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
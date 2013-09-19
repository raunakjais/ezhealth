<?php 
include("config/config.php");
if($_SESSION['username'])
{	
	$query = "select * from refer_patient where REFER_TO='".$_SESSION['doc_id']."' and REFER_TO_TYPE='D'";
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
<script type="text/javascript" src="scw.js"></script>
</head>
<body class="maina">
<!--div class="dashright"-->
<div class="content1">
<form name="siteadmin" method="post" action="" onSubmit="">
<table width="720" cellpadding="0" cellspacing="0" border="0">
<tr><td colspan="8"><h2 style="color:#003162;">Referral In</h2></td></tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr><td colspan="8"><div align="center" id="manoj" style="display:none; background-color:#33CC33;"><?php echo $message; ?></div>
</td></tr>
<tr>
<th width="119" class="timetabH4">Sr. No.</th>
<th width="404" class="timetabH4">From ( Name ) </th>
<th width="302" class="timetabH4">Patient Name</th>
<th width="270" class="timetabH4">Problem</th>
<th width="242" class="timetabH4">Referral Date</th>
</tr>
			<?php
		   $i=1;
		   $result=mysql_query($query);
			while($row=mysql_fetch_array($result))
			{
				if($row['REFER_FROM_TYPE']=='D')
				{
					$name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME from doctor_register where DOCTOR_ID='".$row['REFER_FROM']."'"));
					$from=$name->DOCTOR_FIRST_NAME.' '.$name->DOCTOR_LAST_NAME;
				}
				if($row['REFER_FROM_TYPE']=='H')
				{
					$name=mysql_fetch_object(mysql_query("select BUSINESS_LOCATION_TITLE from business_info where BUSINESS_ID='".$row['REFER_FROM']."'"));
					$from=$name->BUSINESS_LOCATION_TITLE;
				}
		  ?>		  
		<tr>
			<td class="timetabH2"><?=$i?></td>
			<td class="timetabH1"><? if($row['REFER_FROM_TYPE']=='D') { print 'Dr. '; } print $from; ?></td>
			<td class="timetabH2"><? print $row['PATIENT_FNAME'].' '.$row['PATIENT_LNAME'];?></td>
			<td class="timetabH1"><? print $row['REFER_REASON'];?></td>
			<td class="timetabH2"><? print $row['CDATE'];?></td>
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
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
		 
		 
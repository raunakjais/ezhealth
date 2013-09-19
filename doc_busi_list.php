<?php 
include("config/config.php");
if($_SESSION['username'])
{	
	$query = "select BUSINESS_LOCATION_TITLE,BUSINESS_ADDRESS,BUSINESS_LOCATION_BRANCH,BUSINESS_MOBILE_NUMBER,BUSINESS_EMAIL from business_info,business_billing where business_info.BUSINESS_ID=business_billing.BUSINESS_ID";
	$query1 = "select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME,DOCTOR_MOBILE_NUMBER,DOCTOR_EMAIL,DOCTOR_ID from doctor_register,doc_billing where DOC_ID=DOCTOR_ID";
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
<tr><td colspan="8"><h2 style="color:#003162;">Business-Admin List</h2></td></tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr><td colspan="8"><div align="center" id="manoj" style="display:none; background-color:#33CC33;"><?php echo $message; ?></div>
</td></tr>
<tr>
<th width="89" class="timetabH4">Sr. No.</th>
<th width="295" class="timetabH4">Name</th>
<th width="199" class="timetabH4">Address</th>
<th width="191" class="timetabH4">Mobile</th>
<th width="171" class="timetabH4">Email-Id</th>
</tr>
			<?php
		   $i=1;
		   $result=mysql_query($query);
			while($row=mysql_fetch_array($result))
			{
		  ?>		  
	<tr>
		<td class="timetabH2"><?=$i?></td>
		<td class="timetabH1"><? print $row['BUSINESS_LOCATION_TITLE'];?></td>
		<td class="timetabH2"><? print $row['BUSINESS_ADDRESS'];?></td>
		<td class="timetabH1"><? print $row['BUSINESS_MOBILE_NUMBER'];?></td>
		<td class="timetabH2"><? print $row['BUSINESS_EMAIL'];?></td>
	</tr>		 
		<? 
		$i=$i+1;
		   }
		   ?>     
		   <?php
		  /* $result1=mysql_query($query1);
			while($row1=mysql_fetch_array($result1))
			{
				$address=mysql_fetch_object(mysql_query("select DOCTOR_ADDRESS,DOCTOR_AREA from doctor_personal_info where DOCTOR_ID='".$row1['DOCTOR_ID']."'"));
				$area_name=mysql_fetch_object(mysql_query("select AREA_NAME from area_table where AREA_ID='".$address->DOCTOR_AREA."'"));*/
		  ?>		  
	<!--tr>
		<td class="timetabH2"><?=$i?></td>
		<td class="timetabH1"><? print $row1['DOCTOR_FIRST_NAME'].' '.$row1['DOCTOR_LAST_NAME'];?></td>
		<td class="timetabH2"><? print $address->DOCTOR_ADDRESS.','.$area_name->AREA_NAME;?></td>
		<td class="timetabH1"><? print $row1['DOCTOR_MOBILE_NUMBER'];?></td>
		<td class="timetabH2"><? print $row1['DOCTOR_EMAIL'];?></td>
	</tr-->		 
		<? 
		$i=$i+1;
		  // }
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
		 
		 
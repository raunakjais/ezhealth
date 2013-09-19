<?php 
include("config/config.php");
if($_SESSION['username'])
{	
	if($_REQUEST['doc_name']!='')
	{
		$condition = $condition. " DOCTOR_FIRST_NAME like '%".$_REQUEST['doc_name']."%' and ";
	}
	if($_REQUEST['speciality']!='')
	{
		$condition = $condition. " DOCTOR_SPECIALITY = '".$_REQUEST['speciality']."' and ";
	}
	if($_REQUEST['city']!='')
	{
		$condition = $condition. " DOCTOR_CITY = '".$_REQUEST['city']."' and ";
	}
	$query = "select doctor_register.DOCTOR_ID as DOCTOR_ID,DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME,DOCTOR_SPECIALITY,DOCTOR_AREA,DOCTOR_EMAIL,DOCTOR_MOBILE_NUMBER,DOCTOR_LICENSE from doctor_register,doctor_personal_location_info,doctor_personal_info where doctor_register.DOCTOR_ID=doctor_personal_location_info.DOCTOR_ID and doctor_personal_location_info.DOCTOR_ID=doctor_personal_info.DOCTOR_ID and ".$condition." doctor_register.DOCTOR_FLAG=0";
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
<script type="text/javascript">
function same1(qw1)
{
	document.getElementById('post_val1').value=qw1;
}
function same2(qw2)
{
	document.getElementById('post_val2').value=qw2;
}
function same3(qw3)
{
	document.getElementById('post_val3').value=qw3;
}
</script>
</head>
<body class="maina">
<!--div class="dashright"-->
<div class="content1">
<form name="siteadmin" method="post" action="" onSubmit="">
<table width="720" cellpadding="0" cellspacing="0" border="0">
<tr><td colspan="8"><h2 style="color:#003162;">Doctor(s) List</h2></td></tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr><td colspan="8"><div align="center" id="manoj" style="display:none; background-color:#33CC33;"><?php echo $message; ?></div>
</td></tr>
<tr>
<th width="89" class="timetabH4">Doc ID</th>
<th width="295" class="timetabH4">Name</th>
<th width="199" class="timetabH4">Speciality</th>
<th width="191" class="timetabH4">Location</th>
<th width="171" class="timetabH4">Email-Id</th>
<th width="143" class="timetabH4">Mobile</th>
<th width="153" class="timetabH4">License</th>
<th width="96" class="timetabH4">Action</th>
</tr>
			<?php
		   $i=1;
		   $result=mysql_query($query);
			while($row=mysql_fetch_array($result))
			{
			$area_name=mysql_fetch_object(mysql_query("select AREA_NAME from area_table where AREA_ID='".$row['DOCTOR_AREA']."'")); 
		  ?>
<div class="bar<? print $row['DOCTOR_ID']?>">		  
	<tr>
		<td class="timetabH2"><? print $row['DOCTOR_ID']?></td>
		<td class="timetabH1"><? print $row['DOCTOR_FIRST_NAME'].' '.$row['DOCTOR_LAST_NAME'];?></td>
		<td class="timetabH2"><? print $row['DOCTOR_SPECIALITY'];?></td>
		<td class="timetabH1"><? print $area_name->AREA_NAME;?></td>
		<td class="timetabH2"><? print $row['DOCTOR_EMAIL'];?></td>
		<td class="timetabH1"><? print $row['DOCTOR_MOBILE_NUMBER'];?></td>
		<td class="timetabH2"><? print $row['DOCTOR_LICENSE'];?></td>
		<td class="timetabH1"></td>
	</tr>		 
  </div>		<? 
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
		 
		 
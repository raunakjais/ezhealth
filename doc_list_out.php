<?php
include("config/config.php");
if($_SESSION['username'])
{
	$get_bid=mysql_fetch_object(mysql_query("select USER_UN_ID from login where USER_TYPE='".$_SESSION['user_type']."' and USERNAME='".$_SESSION['username']."' and USER_FLAG=0"));
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
</head>
<body>
<div class="maina">
<div class="midcontainer1">
			
<div class="doctor_M">
<form name="signup" method="post" action="" onSubmit="return validate();">
<table width="720" cellpadding="1" cellspacing="1"> 
			<tr>
				<td valign="top" colspan="9"><h2 style="color:#003162;">Doctor List (out network)</h2></td>
			</tr>
		  <tr>
            <td colspan="9" height="2"></td>
          </tr>        
		  <tr>
			<th class="timetabH4">Name</th>
			<th class="timetabH4">Degree</th>
			<th class="timetabH4">Speciality</th>
			<th class="timetabH4">Email id</th>
			<th class="timetabH4">Mobile</th>
			<th class="timetabH4">License No.</th>
			<th class="timetabH4">Visibility</th>
			<th class="timetabH4">Status</th>
			
		  </tr>
		  <?php 
		  // "select * from doctor_register where DOCTOR_FLAG=0"
		  $get_doc = mysql_query("select * from doctor_register,doctor_personal_location_info where doctor_register.DOCTOR_ID=doctor_personal_location_info.DOCTOR_ID and DOCTOR_SPECIALITY!='' and DOCTOR_FLAG=0");
		  while($doc_det=mysql_fetch_object($get_doc))
		  {
		  	$specl = mysql_fetch_object(mysql_query("select DOCTOR_SPECIALITY from doctor_personal_location_info where DOCTOR_ID='".$doc_det->DOCTOR_ID."'"));
			$licsense = mysql_fetch_object(mysql_query("select DOCTOR_LICENSE from doctor_personal_info where DOCTOR_ID='".$doc_det->DOCTOR_ID."'"));
			$deg_val='';
			$deg = mysql_query("select DOCTOR_QUALIFICATION_DEGREE from doctor_qualification_info where DOCTOR_ID='".$doc_det->DOCTOR_ID."'");
			while($degree=mysql_fetch_object($deg))
			{
				if($deg_val=='')
				{
					$deg_val=$degree->DOCTOR_QUALIFICATION_DEGREE;
				}
				else
				{
					$deg_val=$deg_val.','.$degree->DOCTOR_QUALIFICATION_DEGREE;
				}
			}
			if($doc_det->DOCTOR_IDENTITY!=$_SESSION['buss_id'])
			{
		  ?>
		  <tr>
			<td class="timetabH2"><?=$doc_det->DOCTOR_FIRST_NAME.' '.$doc_det->DOCTOR_LAST_NAME?></td>
			<td class="timetabH1"><?=$deg_val?></td>
			<td class="timetabH2"><?=$specl->DOCTOR_SPECIALITY?></td>
			<td class="timetabH1"><?=$doc_det->DOCTOR_EMAIL?></td>
			<td class="timetabH2"><?=$doc_det->DOCTOR_MOBILE_NUMBER?></td>
			<td class="timetabH1"><?=$licsense->DOCTOR_LICENSE?></td>
			<td class="timetabH2">Show</td>
			<td class="timetabH1"><?php print 'ACTIVE'; ?></td>
			
		  </tr>
		  <?php }
		   } ?>
        </table>
</form>
     
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
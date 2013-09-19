<?php 
include("config/config.php");
if($_SESSION['username'])
{
	$patient=mysql_fetch_object(mysql_query("select USER_UN_ID from login where USERNAME='".$_SESSION['username']."' and USER_TYPE='P'"));
	$_SESSION['pat_id']=$patient->USER_UN_ID;
	$sel_query=mysql_query("select distinct DOCTOR_ID from booking where PATIENT_ID='".$_SESSION['pat_id']."'");
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
  	<tr>
		<td colspan="8"><h2 style="color:#003162;">My Doctor List</h2></td>
    </tr>
	<tr>
      <td colspan="8">&nbsp;</td>
    </tr>
    <tr>
	  <th width="290" class="timetabH4">Name</th>
	  <th width="277" class="timetabH4">Specialist</th>
	   <th width="365" class="timetabH4">City</th>
	   <th width="394" class="timetabH4">Experience</th>
	   <th width="394" class="timetabH4">Fees</th>
	   <th width="394" class="timetabH4">Address</th>
	   <th width="394" class="timetabH4">Book online</th>
    </tr>
    <?php 
		while($val=mysql_fetch_object($sel_query))
		{
	
		$sel=mysql_fetch_object(mysql_query("select DOCTOR_SPECIALITY,DOCTOR_ADDRESS,DOCTOR_CITY,DOCTOR_AREA,DOCTOR_EXP,DOCTOR_FEES,doctor_personal_info.DOCTOR_ID from doctor_personal_location_info,doctor_personal_info where doctor_personal_info.DOCTOR_ID='".$val->DOCTOR_ID."' and doctor_personal_location_info.DOCTOR_ID=doctor_personal_info.DOCTOR_ID and DOCTOR_FLAG=0"));
		$get_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME,DOCTOR_MOBILE_NUMBER from doctor_register where DOCTOR_ID='".$val->DOCTOR_ID."'"));
		$city=mysql_fetch_object(mysql_query("select CITY_NAME from city_table where CITY_ID='".$sel->DOCTOR_CITY."'"));
		
	?>
    <tr>
	  <td width="290" class="timetabH1"><?=$get_name->DOCTOR_FIRST_NAME.' '.$get_name->DOCTOR_LAST_NAME?></td>
	  <td width="277" class="timetabH2"><?=$sel->DOCTOR_SPECIALITY?></td>
	  <td width="277" class="timetabH2"><?=$city->CITY_NAME?></td>
	  <td width="277" class="timetabH2"><?=$sel->DOCTOR_EXP?></td>
	  <td width="277" class="timetabH2"><?=$sel->DOCTOR_FEES?></td>
	  <td width="365" class="timetabH1"><?=$sel->DOCTOR_ADDRESS?></td>
	  <td align="center" width="394" class="timetabH2"><a href="book_now.php?id=<?=$val->DOCTOR_ID?>" style="text-decoration:none; color:#999999;">Book Now</a></td>
    </tr>
    <?php 
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
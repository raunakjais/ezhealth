<?php 
include("config/config.php");
$b_det=mysql_fetch_object(mysql_query("select * from doctor_register where DOCTOR_ID='".$_GET['id']."'")); 
$_SESSION['doc_id']=$b_det->DOCTOR_ID;
$address=mysql_fetch_object(mysql_query("select * from doctor_personal_info where DOCTOR_ID='".$_GET['id']."'"));
$area=mysql_fetch_object(mysql_query("select AREA_NAME from area_table where AREA_ID='".$address->DOCTOR_AREA."'")); 
$city=mysql_fetch_object(mysql_query("select CITY_NAME from city_table where CITY_ID='".$address->DOCTOR_CITY."'")); 
$state=mysql_fetch_object(mysql_query("select STATE_NAME from state_table where STATE_ID='".$address->DOCTOR_STATE."'")); 
$country=mysql_fetch_object(mysql_query("select COUNTRY_NAME from country_table where COUNTRY_ID='".$address->DOCTOR_CONTRY."'")); 
$doc_special=mysql_fetch_object(mysql_query("select DOCTOR_SPECIALITY from doctor_personal_location_info where DOCTOR_ID='".$_GET['id']."'"));
$doc_exp=mysql_fetch_object(mysql_query("select DOCTOR_EXP,DOCTOR_AREA from doctor_personal_info where DOCTOR_ID='".$_GET['id']."'"));
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
<body bgcolor="">
<div class="main">
<div class="header">
<div class="logo"><img src="images/logo.jpg" /></div>
<div class="login1"><a href="index.php"><img src="images/home.png" /></a></div>
</div>
<div class="clear"></div>
<div class="blue-stripe"></div>
<div class="clear"></div>
<div class="topcontainer">
<!--div class="dashR"-->
<!--ul><li style="background:none;">
<a href="#">Home</a> </li>
<li><a href="#"> My Account</a></li>
<li class="current"><a href="#"> Upcoming Appointment</a></li>
</ul-->&nbsp;<!--/div--></div>
<div class="dashM">
<form name="signup" method="post" action="all_business.php" onSubmit="">
<table width="100px" cellpadding="0" cellspacing="0"> 
			<tr>
				<td colspan="5"><h1 style="color:#003162;">Book Appointment</h1></td>
			</tr>
		  <tr>
            <td colspan="5">&nbsp;</td>
          </tr>        
		  <tr>
			<td width="222"><strong>Name</strong></td>
			<td width="35">&nbsp;</td>
			<td width="1063" colspan="3"><?php print $b_det->DOCTOR_FIRST_NAME.' '.$b_det->DOCTOR_LAST_NAME; ?></td>
		  </tr>
		  <tr>
            <td colspan="5">&nbsp;</td>
          </tr>
		  <tr>
			<td width="222px" colspan="5">
				<iframe height="300px;" width="700px;" scrolling="yes" src="slot.php" frameborder="0">
				</iframe> 
			</td> 	
		  </tr>
		  </table>
</form>

</div>
<?php include('footer.php'); ?>
</div>
</body>
</html>
<?php 
include("config/config.php");
//$_SESSION['user_type']=='P';
if($_SESSION['username'])
{
$que="SELECT PATIENT_ID from patientregister where PATIENT_USERNAME='".$_SESSION['username']."'";
$res=mysql_query($que);
$row=mysql_fetch_array($res);
$rowid=$row['PATIENT_ID'];
$name="noImage.gif";
$INSERTPHOTO="Insert into user_photo values('$rowid','$name')";
mysql_query($INSERTPHOTO);
?>
<?php
$query="SELECT * from patientregister where PATIENT_ID='".$rowid."'";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{
$firstname=$row['PATIENT_FIRST_NAME'];
$middlename=$row['PATIENT_MIDDLE_NAME'];
$lastname=$row['PATIENT_LAST_NAME'];
$mobile_number=$row['PATIENT_MOBILE_NUMBER'];
$email=$row['PATIENT_EMAIL'];
}

$gender1=mysql_fetch_object(mysql_query("select PATIENT_GENDER from patient_personal_info where PATIENT_ID='".$rowid."'")); 
$select_flag=mysql_fetch_object(mysql_query("select DOCTOR_FLAG,DOCTOR_ID from doctor_register where DOCTOR_USERNAME='".$_SESSION['username']."'"));
$sel_specl=mysql_fetch_object(mysql_query("select DOCTOR_SPECIALITY from doctor_personal_location_info where DOCTOR_ID='".$select_flag->DOCTOR_ID."'"));
$rowcount=mysql_num_rows(mysql_query("select * from patient_personal_info where PATIENT_ID='".$rowid."' and PATIENT_FLAG=0"));

if($_SESSION['user_type']=='B')
{
	$get_buss_flag=mysql_fetch_object(mysql_query("select USER_FLAG from login where USER_UN_ID='".$_SESSION['buss_id']."' and USER_TYPE='B'"));
}
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

<body bgcolor="#dcdcdc">
<div class="main1">
<div class="header">
<div class="logo"><img src="images/logo.jpg" /></div>
<?php if(!$_SESSION['username']){?><div class="login"><h6><a href="">LOGIN </a>  |   <a href=""> NEW USER</a></h6></div><?php } ?> 
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
<div class="dashL">
<?php 

if($_SESSION['user_type']=='P')
{
include('leftnavigation_p.php'); 
}
else if($_SESSION['user_type']=='D')
{
include('leftnavigation_d.php'); 
}
else if($_SESSION['user_type']=='B')
{
include('leftnavigation_b.php');
}
else if($_SESSION['user_type']=='R')
{
include('leftnavigation_r.php');
}
else if($_SESSION['user_type']=='A')
{
include('leftnavigation_a.php');
}
//print $_SESSION['user_type'].'-'.$select_flag->DOCTOR_FLAG.'-'.$sel_specl->DOCTOR_SPECIALITY;
$id1=$_SESSION['new_doc_id'];
?>
</div>
<div class="dashright">
<iframe align="top" height="1000px;" width="740px;" frameborder="0" src="<?php if($_SESSION['user_type']=='D' && $select_flag->DOCTOR_FLAG!='0') { print 'd_dash.php'; } else if($_SESSION['user_type']=='D' && $select_flag->DOCTOR_FLAG=='0' && $sel_specl->DOCTOR_SPECIALITY=='') { print 'd_dash.php'; } else if( $_SESSION['user_type']=='D' && $select_flag->DOCTOR_FLAG=='0' && $sel_specl->DOCTOR_SPECIALITY!='') { print 'book_now.php'; }  else if( $_SESSION['user_type']=='P' && $_SESSION['doc_id']=='' && $rowcount!='0') { print 'upcoming_apt_p.php'; } else if($_SESSION['user_type']=='P' && $_SESSION['doc_id']!='') { print 'book_p_new.php'; } else if($_SESSION['user_type']=='P' && $rowcount=='0') { print 'p_dash.php'; } else if( $_SESSION['user_type']=='R') { print 'view_apt_all.php'; } else if($get_buss_flag->USER_FLAG=='1' && $_SESSION['user_type']=='B') { print 'b_dash.php'; } ?>" name="riframe" scrolling="auto"></iframe>
</div>
</div>
<?php include('footer.php'); ?>
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

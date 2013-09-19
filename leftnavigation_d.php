<?php 
//include("config/config.php");
if($_SESSION['username'])
{
	$doc_id=mysql_fetch_object(mysql_query("SELECT USER_UN_ID,USER_FLAG from login where USER_TYPE='".$_SESSION['user_type']."' and USERNAME='".$_SESSION['username']."'"));
	$chk_com_prof=mysql_fetch_object(mysql_query("select DOCTOR_SPECIALITY from doctor_personal_location_info where DOCTOR_ID='".$doc_id->USER_UN_ID."'"));
	$appr_dr=mysql_fetch_object(mysql_query("select * from doctor_register where DOCTOR_ID='".$doc_id->USER_UN_ID."'"));
	$_SESSION['doc_id']=$doc_id->USER_UN_ID;
?>
<head>
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
<body class="main">
<div class="dashL">
<div class="dashw">
<div class="welcome">Welcome <?php print '|Dr. '.ucfirst($appr_dr->DOCTOR_FIRST_NAME).'|'; ?></div></div>
<div class="dashin">
<div class="clear"></div>
<?php if($chk_com_prof->DOCTOR_SPECIALITY!='' && $appr_dr->DOCTOR_FLAG=='0') { ?>
<div class="dashicons"><img src="images/appointmenticon.png" /></div>
<div class="dashhead"> Appointments</div>
<div class="clear"></div>
<div class="dashmenu"><ul>
<li><a href="upcoming_apt_d.php" target="riframe">Upcoming Appointments</a></li>
<li><a href="book_now.php" target="riframe">Schedule Appointment</a></li>
<li><a href="apt_history.php" target="riframe">Appointment History</a></li>
</ul></div>
<div class="dashicons"><img src="images/notification_icon.png" style="padding-top:4px;" /></div>
<div class="dashhead"> Notifications</div>
<div class="dashmenu">
<ul>
<li><a href="alert_doctor.php" target="riframe">Ezpointment Alerts</a></li>
<li><a href="message_patient.php" target="riframe">Messages</a></li>
<!--li><a href="">Messages (0 New)</a></li-->
</ul></div>
<div class="dashicons"><img src="images/doctor_approval.png" style="padding-top:4px;" /></div>
<div class="dashhead">Patient</div>
<div class="dashmenu">
<ul>
<li><a href="my_patient_list.php" target="riframe">My Patient</a></li>
</ul>
</div>

<div class="dashicons"><img src="images/health-icon.png" /></div>
<div class="dashhead">Referral</div>
<div class="dashmenu">
<ul>
<li><a href="refer_in.php" target="riframe">Referral In</a></li>
<li><a href="refer_out.php" target="riframe">Referral Out</a></li>
</ul></div>
<div class="dashicons"><img src="images/health-icon.png" /></div>
<div class="dashhead">Search</div>
<div class="dashmenu">
<ul>
<li><a href="business_search_ot.php" target="riframe">Business</a></li>
</ul></div>
<?php } ?>
<div class="dashicons"><img src="images/account-icon.png" /></div>
<div class="dashhead">My Account</div>
<div class="dashmenu">
<ul><li><a href="update_profile_d.php" target="riframe">Profile</a></li>
<li><a href="professional_info.php" target="riframe">Professional Info.</a></li>

</ul></div>
<div class="dashicons"><img src="images/logout_icon.png" /></div>
<div class="dashheadN">
<a href="logout.php">Logout</a></div>
</div>

</div>
</body>
<?php
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
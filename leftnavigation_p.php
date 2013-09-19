<?php 
//include("config/config.php");
$que="SELECT PATIENT_ID from patientregister where PATIENT_USERNAME='".$_SESSION['username']."'";
$res=mysql_query($que);
$row=mysql_fetch_array($res);
$rowid=$row['PATIENT_ID'];
$name="noImage.gif";
$INSERTPHOTO="Insert into user_photo values('$rowid','$name')";
mysql_query($INSERTPHOTO);
?>
<?php
$query="SELECT * from patientregister where PATIENT_ID='$rowid'";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{
$firstname=$row['PATIENT_FIRST_NAME'];
$middlename=$row['PATIENT_MIDDLE_NAME'];
$lastname=$row['PATIENT_LAST_NAME'];
$mobile_number=$row['PATIENT_MOBILE_NUMBER'];
$email=$row['PATIENT_EMAIL'];
}
$_SESSION['pat_id']=$rowid;
$gender1=mysql_fetch_object(mysql_query("select PATIENT_GENDER from patient_personal_info where PATIENT_ID='".$rowid."'")); 
$pat_msg_count1 = mysql_num_rows(mysql_query("select * from refer_patient where PATIENT_ID='".$_SESSION['pat_id']."' and FLAG='0'"));

$rowcount=mysql_num_rows(mysql_query("select * from patient_personal_info where PATIENT_ID='".$rowid."' and PATIENT_FLAG=0"));
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
<div class="welcome">Welcome <?php print '|'.ucfirst($firstname).'|'; ?></div></div>
<div class="dashin">
<?php if($rowcount>=1) { ?>
<div class="dashicons"><img src="images/appointmenticon.png" /></div>
<div class="dashhead"> Appointments</div>
<div class="clear"></div>
<div class="dashmenu"><ul>
<li><a href="upcoming_apt_p.php" target="riframe">Upcoming Appointments</a></li>
<li><a href="view_apt_history.php" target="riframe">Appointment History</a></li>
<li><a href="finddoctor.php" target="riframe">Schedule Appointment</a></li>
<li><a href="my_vitals.php" target="riframe">Vitals</a></li>
</ul></div>
<div class="dashicons"><img src="images/notification_icon.png" style="padding-top:4px;" /></div>
<div class="dashhead"> Notifications</div>
<div class="dashmenu">
<ul><li><a href="alert_patient.php" target="riframe">Ezpointment Alerts</a></li>
<li><a href="message_patient.php" target="riframe">Messages (<span class="red"><?=$pat_msg_count?> New</span>)</a></li>
</ul></div>
<div class="dashicons"><img src="images/health-icon.png" /></div>
<div class="dashhead">Health Records</div>
<div class="dashmenu">
<ul><li><a href="after_visit_note.php" target="riframe">After Visit Notes</a></li>
<!--li><a href="lab_result.php" target="riframe">Lab Results</a></li-->
<!--li><a href="#">Prescriptions</a></li-->
<li><a href="allergies.php" target="riframe">Allergies</a></li>
<li><a href="p_family.php" target="riframe">My Family</a></li>
<!--li><a href="my_doctor_list.php" target="riframe">My Doctors</a></li-->
<li><a href="business_search_ot.php" target="riframe">Search Business</a></li>
</ul>
</div>
<?php } ?>

<div class="dashicons"><img src="images/account-icon.png" /></div>
<div class="dashhead">My Account</div>
<div class="dashmenu">
<ul><li><a href="update_profile_p.php" target="riframe">Profile</a></li>

</ul></div>
<div class="dashicons"><img src="images/logout_icon.png" /></div>
<div class="dashheadN">
<a href="logout.php">Logout</a></div>
</div>

</div>
</body>
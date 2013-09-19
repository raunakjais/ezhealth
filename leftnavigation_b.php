<?php 
//include("config/config.php");
$sel_bname=mysql_fetch_object(mysql_query("select * from business_info where BUSINESS_USERNAME='".$_SESSION['username']."'"));
$_SESSION['buss_id']=$sel_bname->BUSINESS_ID;
$get_buss_flag=mysql_fetch_object(mysql_query("select USER_FLAG from login where USER_UN_ID='".$_SESSION['buss_id']."' and USER_TYPE='B'"));
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
<div class="welcome">Welcome <?php print '|'.ucfirst($sel_bname->BUSINESS_LOCATION_TITLE).'|'; ?></div></div>
<div class="dashin">
<?php if($get_buss_flag->USER_FLAG=='0') { ?>
<div class="dashicons"><img src="images/appointmenticon.png" /></div>
<div class="dashhead"> Appointments</div>
<div class="clear"></div>
<div class="dashmenu"><ul>
<li><a href="add_doctor.php" target="riframe">Add Doctor</a></li>
<li><a href="add_receptionist.php" target="riframe">Add Receptionist</a></li>
<li><a href="doc_list_in.php" target="riframe">View Doctor(s) in network</a></li>
<li><a href="doc_list_out.php" target="riframe">View Doctor(s) out network</a></li>
<li><a href="reception_list.php" target="riframe">View Receptionist</a></li>
<li><a href="map_doc_recp.php" target="riframe">Map Doctor-Receptionist</a></li>
<li><a href="view_mapping.php" target="riframe">View Mapping</a></li>

</ul></div>
<div class="dashicons"><img src="images/notification_icon.png" style="padding-top:4px;" /></div>
<div class="dashhead"> Notifications</div>
<div class="dashmenu">
<ul><li><a href="message_business.php" target="riframe">Ezpointment Alerts</a></li>
<li><a href="message_patient.php" target="riframe">Messages</a></li>
</ul></div>
<? } ?>
<div class="dashicons"><img src="images/account-icon.png" /></div>
<div class="dashhead">My Account</div>
<div class="dashmenu">
<ul><li><a href="update_profile_b.php" target="riframe">Profile</a></li>

</ul></div>
<div class="dashicons"><img src="images/logout_icon.png" /></div>
<div class="dashheadN">
<a href="logout.php">Logout</a></div>
</div>

</div>
</body>
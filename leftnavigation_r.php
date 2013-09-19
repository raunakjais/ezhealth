<?php 
//include("config/config.php");
if($_SESSION['username'])
{
	$recpt_id=mysql_fetch_object(mysql_query("SELECT USER_UN_ID,USER_FLAG from login where USER_TYPE='".$_SESSION['user_type']."' and USERNAME='".$_SESSION['username']."'"));
	$recpt_det=mysql_fetch_object(mysql_query("select * from receptionist_register where RECEPTIONIST_ID='".$recpt_id->USER_UN_ID."'"));
	$_SESSION['recp_id']=$recpt_id->USER_UN_ID;	
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
<div class="welcome">Welcome <?php print '|Recpt. '.ucfirst($recpt_det->RECEPTIONIST_FIRST_NAME).'|'; ?></div></div>
<div class="dashin">
<div class="clear"></div>
<div class="dashicons"><img src="images/appointmenticon.png" /></div>
<div class="dashhead"> Appointments</div>
<div class="clear"></div>
<div class="dashmenu"><ul>
<li><a href="view_apt_all.php" target="riframe">View Appointments</a></li>
<li><a href="recpt_doc_histoy.php" target="riframe">Appointment History</a></li>
<li><a href="recpt_doctor.php" target="riframe">Schedule Appointment</a></li>
<li><a href="message_patient.php" target="riframe">Messages</a></li>
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
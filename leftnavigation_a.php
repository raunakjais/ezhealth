<?php 
//include("config/config.php");
$site_admin=mysql_fetch_object(mysql_query("select cdate,ctime from user_log where user_name='siteadmin' and user_type='A' order by user_id desc"));
$doc_count=mysql_num_rows(mysql_query("select DOCTOR_ID from doctor_register where DOCTOR_RECORD_DATE >='".$site_admin->cdate."' and DOCTOR_FLAG=2"));
$buss_count=mysql_num_rows(mysql_query("select BUSINESS_ID from business_info where BUSINESS_RECORD_DATE >='".$site_admin->cdate."' and BUSINESS_FLAG='1'"));
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
<div class="welcome">Welcome |Administrator|</div></div>
<div class="dashin">
<div class="dashicons"><img src="images/business_icon.png" /></div>
<div class="dashhead"> Business </div>
<div class="clear"></div>
<div class="dashmenu">
<ul>
<li><a href="doc_busi_add.php" target="riframe">Add Doctor/Business</a></li>
<li><a href="doc_busi_list.php" target="riframe">View Business-Admin</a></li>
</ul>
</div>
<div class="clear"></div>
<div class="dashicons"><img src="images/doctor.png" /></div>
<div class="dashhead"> Doctor </div>
<div class="clear"></div>
<div class="dashmenu">
<ul>
<li><a href="view_doc_list.php?id=limit" target="riframe">View New Doctors</a></li>
<li><a href="search_doc.php" target="riframe">Search Doctor(s)</a></li>
</ul>
</div>
<div class="clear"></div>
<div class="dashicons"><img src="images/appointmenticon.png" /></div>
<div class="dashhead"> Reception </div>
<div class="clear"></div>
<div class="dashmenu">
<ul>
<li><a href="reception_list_all.php" target="riframe">View Reception(s)</a></li>
<li><a href="view_mapping_all.php" target="riframe">View Reception(s) Mapping</a></li>
</ul>
</div>
<div class="clear"></div>
<div class="dashicons"><img src="images/notification_icon.png" style="padding-top:4px;" /></div>
<div class="dashhead"> Notifications</div>
<div class="dashicons"><img src="images/doctor_approval.png" /></div>

<div class="dashheadNew"><a href="user_approval.php?id=limit" target="riframe" style="text-decoration:none;">Doctor Approval <? print '('.$doc_count.')';?></a></div>
<div class="dashicons"><img src="images/business.png" /></div>

<div class="dashheadNew"><a href="user_approval_b.php?id=limit" target="riframe" style="text-decoration:none;">Business Approval <? print '('.$buss_count.')';?></a></div>
<div class="dashicons"><img src="images/news.png" /></div>

<div class="dashheadNew"><a href="news_list.php" target="riframe" style="text-decoration:none;">Latest News</a></div>
<div class="dashicons"><img src="images/bulletin.png" style="padding:4px 0px 0px 0px;" /></div>

<div class="dashheadNew"><a href="bulletin_list.php" target="riframe" style="text-decoration:none;">Bulletin</a></div>

<div class="dashmenu">
<ul><!--li><a href="update_profile.php" target="riframe">Profile</a></li-->

</ul></div>
<div class="dashicons"><img src="images/logout_icon.png" /></div>
<div class="dashheadN">
<a href="logout.php">Logout</a></div>
</div>

</div>
</body>
<?php
include("config/config.php");
if($_SESSION['username'])
{
	$doc_id=mysql_fetch_object(mysql_query("SELECT USER_UN_ID,USER_FLAG from login where USER_TYPE='".$_SESSION['user_type']."' and USERNAME='".$_SESSION['username']."'"));
	$chk_com_prof=mysql_fetch_object(mysql_query("select DOCTOR_SPECIALITY from doctor_personal_location_info where DOCTOR_ID='".$doc_id->USER_UN_ID."'"));
	$appr_dr=mysql_fetch_object(mysql_query("select DOCTOR_FLAG from doctor_register where DOCTOR_ID='".$doc_id->USER_UN_ID."'"));
?>
<html>
<head>
<link href="styles/css.css" rel="stylesheet" type="text/css" />
<link href="styles/style1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery_min.js"></script>
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
<body>
<table width="720" cellpadding="0" cellspacing="0" border="0" align="center">
	<tr>
	  <td colspan="3" class="ntext" style="color:#FF0000; font-size:16px;" align="center"><?php if($chk_com_prof->DOCTOR_SPECIALITY==''){ ?> Please update your profile & contact ezpointment team for further information/instructions.<? } if($appr_dr->DOCTOR_FLAG=='2') { ?>Your Account is under activation process, please contact ezpointment team.<? } ?></td>
	</tr> 
</table>	
</body>
</html>
<?php
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
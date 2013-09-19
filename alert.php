<?php 
include("config/config.php");
if($_SESSION['username'])
{	
	$row=mysql_fetch_array(mysql_query("select * from msg where BK_ID='".$_REQUEST['bookng_id']."' and TYPE='transfer'"));
	$new_doc_id=mysql_fetch_object(mysql_query("select DOCTOR_ID from booking where BOOKING_ID='".$_REQUEST['bookng_id']."'"));
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
<body class="maina">
<!--div class="dashright"-->
<div class="content1">
<form name="siteadmin" method="post" action="" onSubmit="">
<table width="675px" cellpadding="1" cellspacing="1" border="0" style="margin-left:10px;">
<tr>
	<td colspan="6"><h2 style="color:#003162;">Referral notification</h2></td>
	<td colspan="2" align="right"><a href="alert_patient.php" target="riframe"><img src='./images/close.png' border="0" title="Close"></a></td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="8"><h4><?=$row['MSG']?> ,<br /> click on <a href="book_now.php?id=<?=$new_doc_id->DOCTOR_ID?>" target="_parent">book Now</a> to schedule an appointment. </h4> </td>
</tr> 
</table>
</form>
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
		
		 















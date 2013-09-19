<?php
include("config/config.php");
if($_SESSION['username'])
{
	//$get_bid=mysql_fetch_object(mysql_query("select USER_UN_ID from login where USER_TYPE='".$_SESSION['user_type']."' and USERNAME='".$_SESSION['username']."' and USER_FLAG=0"));
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
</head>
<body>
<div class="maina">
<div class="midcontainer1">
			
<div class="doctor_M">
<form name="signup" method="post" action="" onSubmit="return validate();">
<table width="720" cellpadding="1" cellspacing="1"> 
			<tr>
				<td colspan="9"><h2 style="color:#003162;">Receptionist List </h2></td>
			</tr>
		  <tr>
            <td colspan="9" height="6"></td>
          </tr>        
		  <tr>
			<th width="227" class="timetabH4">Name</th>
			<th width="343" class="timetabH4">Email Id </th>
			<th width="264" class="timetabH4">Mobile</th>
			<th width="266" class="timetabH4">Visibility</th>
		  </tr>
		  <?php 
		  $get_recp = mysql_query("select RECEPTIONIST_ID,RECEPTIONIST_FIRST_NAME,RECEPTIONIST_LAST_NAME,RECEPTIONIST_MOBILE_NUMBER,RECEPTIONIST_EMAIL,RECEPTIONIST_FLAG from receptionist_register where RECEPTIONIST_FLAG=0");
		  while($recp_det=mysql_fetch_object($get_recp))
		  {
		  ?>
		  <tr>
			<td class="timetabH2"><?=$recp_det->RECEPTIONIST_FIRST_NAME.' '.$recp_det->RECEPTIONIST_LAST_NAME?></td>
			<td class="timetabH1"><?=$recp_det->RECEPTIONIST_EMAIL?></td>
			<td class="timetabH2"><?=$recp_det->RECEPTIONIST_MOBILE_NUMBER?></td>
			<td class="timetabH1"><? if($recp_det->RECEPTIONIST_FLAG=='0') { print 'show'; } ?></td>
		  </tr>
		  <?php } ?>
        </table>
</form>
     
</div>								
</div>
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
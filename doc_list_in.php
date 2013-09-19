<?php
include("config/config.php");
if($_SESSION['username'])
{
	$get_bid=mysql_fetch_object(mysql_query("select USER_UN_ID from login where USER_TYPE='".$_SESSION['user_type']."' and USERNAME='".$_SESSION['username']."' and USER_FLAG=0"));
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
<table width="735" cellpadding="1" cellspacing="1" border="0"> 
			<tr>
				<td valign="top" colspan="9"><h2 style="color:#003162;">Doctor List (in network)</h2></td>
			</tr>
		  <tr>
            <td colspan="9" height="6"></td>
          </tr>        
		  <tr>
			<th width="120" class="timetabH4">Name</th>
			<th width="145" class="timetabH4">Degree</th>
			<th width="192" class="timetabH4">Speciality</th>
			<th width="128" class="timetabH4">Email id</th>
			<th width="136" class="timetabH4">Mobile</th>
			<th width="206" class="timetabH4">License No.</th>
			<th width="233" class="timetabH4">Prof. Qualalification</th>
			<th width="154" align="center" class="timetabH4">Status</th>
			
		  </tr>
		  <?php 
		  $get_doc = mysql_query("select DOCTOR_ID,DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME,DOCTOR_EMAIL,DOCTOR_MOBILE_NUMBER,DOCTOR_FLAG from doctor_register where DOCTOR_IDENTITY='".$get_bid->USER_UN_ID."'");
		  while($doc_det=mysql_fetch_object($get_doc))
		  {
		  	$specl = mysql_fetch_object(mysql_query("select DOCTOR_SPECIALITY from doctor_personal_location_info where DOCTOR_ID='".$doc_det->DOCTOR_ID."'"));
			$licsense = mysql_fetch_object(mysql_query("select DOCTOR_LICENSE from doctor_personal_info where DOCTOR_ID='".$doc_det->DOCTOR_ID."'"));
			$deg = mysql_query("select DOCTOR_LICENSE from doctor_personal_info where DOCTOR_ID='".$doc_det->DOCTOR_ID."'");
			while($degree=mysql_fetch_object($deg))
			{
				$deg_val .= ','.$degree->DOCTOR_LICENSE;
			}
		  ?>
		  <tr>
			<td class="timetabH2"><?=$doc_det->DOCTOR_FIRST_NAME.' '.$doc_det->DOCTOR_LAST_NAME?></td>
			<td class="timetabH1"><?=$deg_val?></td>
			<td class="timetabH2"><?=$specl->DOCTOR_SPECIALITY?></td>
			<td class="timetabH1"><?=$doc_det->DOCTOR_EMAIL?></td>
			<td class="timetabH2"><?=$doc_det->DOCTOR_MOBILE_NUMBER?></td>
			<td class="timetabH1"><?=$licsense->DOCTOR_LICENSE?></td>
			<td class="timetabH1"><a href="professional_info.php?update_id=<?=$doc_det->DOCTOR_ID?>" style="text-decoration:none; color:#333333;"><strong>Add/Update</strong></a></td>
			<td class="timetabH2"><?php if($doc_det->DOCTOR_FLAG==0) { ?> <a href="doc_list_in.php?do=dact&id=<?php print $doc_det->DOCTOR_ID; ?>" style="text-decoration:none; color:#00CC66;"><strong>ACTIVE</strong></a> <? } else { ?> <a href="doc_list_in.php?do=act&id=<?php print $doc_det->DOCTOR_ID; ?>" style="text-decoration:none; color:#FF0000;"><strong>INACTIVE</strong></a> <? } ?></td>
			
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
	if($_GET['do']!='' && $_GET['id']!='')
	{
		if($_GET['do']=='dact')
		{
			$update_reg = mysql_query("update doctor_register set DOCTOR_FLAG=1 where DOCTOR_ID='".$_GET['id']."'");
			$update_login = mysql_query("update login set USER_FLAG=1 where USER_UN_ID='".$_GET['id']."' and USER_TYPE='D'");
			if($update_reg==1 && $update_login==1)
			{
				print("<script language='javascript'>alert('doctor deactivated successfully'); window.location.href='doc_list_in.php';</script>");
			}
		}
		if($_GET['do']=='act')
		{
			$update_reg = mysql_query("update doctor_register set DOCTOR_FLAG=0 where DOCTOR_ID='".$_GET['id']."'");
			$update_login = mysql_query("update login set USER_FLAG=0 where USER_UN_ID='".$_GET['id']."' and USER_TYPE='D'");
			if($update_reg==1 && $update_login==1)
			{
				print("<script language='javascript'>alert('doctor activated successfully'); window.location.href='doc_list_in.php';</script>");
			}
		}
	}
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
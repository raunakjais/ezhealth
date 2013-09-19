<?php 
include("config/config.php");
if($_SESSION['username'])
{
//print_r($_SESSION);
$slot_time=mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$_GET['bk_id']."'")); 

$b_date=explode('/',$_REQUEST['dt']);
$sl_date=$b_date[2].'-'.$b_date[1].'-'.$b_date[0];
$get_bk_det=mysql_fetch_object(mysql_query("select * from booking,booking_details where APT_DATE='".$sl_date."' and APT_TIME='".$_GET['bk_id']."' and DOCTOR_ID='".$_SESSION['doc_id']."' and booking.BOOKING_ID=booking_details.BOOKING_ID"));

$dob_val=explode('-',$get_bk_det->DOB);
$date_dob=$dob_val[1].'/'.$dob_val[2].'/'.$dob_val[0];

date_default_timezone_set('Asia/Calcutta');
$time=date('H:i:s');
$present_slot_show=mysql_fetch_object(mysql_query("select SLOT_ID from slot where START_TIME < '".$time."' and END_TIME > '".$time."'"));
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
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery-code.js"></script>
<script type="text/javascript" language="javascript" src="js/facy-mainjquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.fancybox.js"></script>
<script type="text/javascript" src="getFile1.js"></script>
<script type="text/javascript" src="getstate.js"></script>
<script type="text/javascript" src="getFamily.js"></script>
<script type="text/javascript" src="scw.js"></script>
</head>
<body class="maina">
<!--div class="dashright"-->
<div class="content1">
<form name="siteadmin" method="post" action="" onSubmit="">
<table width="720" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td colspan="3"><h2 style="color:#003162;">After Visit Note</h2></td>
</tr>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
 <tr>
	<td colspan="3">Visit Note For</td>
</tr>
<tr>
	<td colspan="3">
	<?php $sel_fam=mysql_query("select * from patient_family where PATIENT_ID='".$_SESSION['pat_id']."'"); ?>
		<select name="pat_list" id="pat_list" class="drop2" onchange="getfamdet(this.value,'visit');" >
			<option value="">select person</option>
			<option value="Self">Self</option>
			<? while($fam=mysql_fetch_object($sel_fam)) { ?>
				<option value="<?php print $fam->FNAME;?>"><?php print $fam->FNAME;?></option>
			<? } ?>
		</select>
	</td>
</tr>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
</table>

<div id="visit">
 </div>
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
		 
		 
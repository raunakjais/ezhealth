<?php 
include("config/config.php");
if($_SESSION['username'])
{
	$patient=mysql_fetch_object(mysql_query("select USER_UN_ID from login where USERNAME='".$_SESSION['username']."' and USER_TYPE='P'"));
	$_SESSION['pat_id']=$patient->USER_UN_ID;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ezpointment</title>
<link rel="stylesheet" href="styles/nyroModal.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/modal.js"></script>
<script type="text/javascript" src="js/jquery.nyroModal-1.6.2.pack.js"></script>
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
<script type="text/javascript" src="advance_search.js"></script>
<script type="text/javascript" src="scw.js"></script>
</head>
<body class="maina">
<!--div class="dashright"-->
<form name="search1" method="post" action="" >
  <table width="100%" cellpadding="1" cellspacing="1">
  	<tr>
		<td colspan="6"><h2 style="color:#003162;">Patient All Prescription History</h2></td>
    </tr>
	<tr>
      <td colspan="6">&nbsp;</td>
    </tr>
	<tr>
	  <th colspan="3" align="left">Patient Name: &nbsp; <?=$_REQUEST['p_fname'].' '.$_REQUEST['p_lname']?></th>
    </tr>
	<tr>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr>
	  <th width="290" class="timetabH4">Date</th>
	  <th width="277" class="timetabH4">Problem</th>
	   <th width="365" class="timetabH4">Prescription</th>
    </tr>
    <?php 
	$pat_cmn=mysql_query("select * from prescription where DOCTOR_ID='".$_SESSION['doc_id']."' and PATIENT_ID='".$_REQUEST['pat_id']."' and FNAME='".$_REQUEST['p_fname']."' and LNAME='".$_REQUEST['p_lname']."'");
		while($val=mysql_fetch_object($pat_cmn))
		{
			$sel_bk_det=mysql_fetch_object(mysql_query("select APT_DATE,APT_REASON from booking,booking_details where booking.BOOKING_ID=booking_details.BOOKING_ID and booking.BOOKING_ID='".$val->BOOKING_ID."'"));
	?>
    <tr>
	  <td width="290" class="timetabH1"><?=$sel_bk_det->APT_DATE?></td>
	  <td width="277" class="timetabH2"><?=$sel_bk_det->APT_REASON?></td>
	  <td width="365" class="timetabH1"><a href="view_precription.php?bk_id=<?=$val->BOOKING_ID?>" class="nyroModal" style="text-decoration:none;">View Prescription</a></td>
    </tr>
    <?php
		} ?>
  </table>
</form>
</body>
</html>
<?php
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
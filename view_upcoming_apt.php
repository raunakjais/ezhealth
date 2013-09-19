<?php 
include("config/config.php");
if($_SESSION['username'])
{
	$sel_book_list=mysql_query("select * from booking,booking_details where booking.BOOKING_ID=booking_details.BOOKING_ID and DOCTOR_ID='".$_SESSION['doc_id']."' and APT_DATE='".$_REQUEST['date']."'");
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
<script type="text/javascript" src="advance_search.js"></script>
<script type="text/javascript" src="scw.js"></script>
</head>
<body class="maina">
<!--div class="dashright"-->
<form name="search1" method="post" action="" >
  <table width="100%" cellpadding="1" cellspacing="1">
  	<tr><td colspan="6"><h2 style="color:#003162;">Appointment List</h2></td></tr>
	<tr><td colspan="6">&nbsp;</td></tr>
    <tr>
      <th width="460" class="timetabH4">Appointment</th>
	  <th width="467" class="timetabH4">Patient</th>
	  <th width="401" class="timetabH4">Problem</th>
    </tr>
    <?php 
		$sl=1;
		while($val=mysql_fetch_object($sel_book_list))
		{
			$slot_time=mysql_fetch_object(mysql_query("select START_TIME from slot where SLOT_ID='".$val->APT_TIME."'"));
	?>
    <tr>
     
      <td align="center" width="460" class="timetabH1"><? print date('D', strtotime($val->APT_DATE)).', '.date('d/m/Y', strtotime($val->APT_DATE)).', '.$slot_time->START_TIME; ?></td>
	  <td width="467" class="timetabH1"><?=$val->FNAME.' '.$val->LNAME?></td>
	  <td  width="401" class="timetabH2"><?=$val->APT_REASON?></td>
    </tr>
    <?php $sl=$sl+1; 
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
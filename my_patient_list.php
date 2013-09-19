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
		<td colspan="6"><h2 style="color:#003162;">My Patient List</h2></td>
    </tr>
	<tr>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr>
	  <th width="290" class="timetabH4">Patient</th>
	   <th width="365" class="timetabH4">Prescription</th>
	   <th width="394" class="timetabH4">View Details</th>
    </tr>
    <?php 
	$pat_cmn=mysql_query("select * from prescription where DOCTOR_ID='".$_SESSION['doc_id']."' group by PATIENT_ID");
		while($val=mysql_fetch_object($pat_cmn))
		{
		$get_name=mysql_query("select * from prescription where PATIENT_ID='".$val->PATIENT_ID."' group by FNAME");
			while($val1=mysql_fetch_object($get_name))
			{
				$prob=mysql_fetch_object(mysql_query("select APT_REASON from booking_details where BOOKING_ID='".$val1->BOOKING_ID."'"));
	?>
    <tr>
	  <td width="290" class="timetabH1"><?=$val1->FNAME.' '.$val1->LNAME?></td>
	  <td width="365" class="timetabH1"><a href="all_prescription.php?pat_id=<?=$val->PATIENT_ID?>&p_fname=<?=$val1->FNAME?>&p_lname=<?=$val1->LNAME?>" style="text-decoration:none;">View All Prescription</a></td>
	  <td align="center" width="394" class="timetabH2"><a href="view_details.php?bk_id=<?=$val->BOOKING_ID?>" class="nyroModal" style="text-decoration:none;">View Details</a></td>
    </tr>
    <?php 	} 
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
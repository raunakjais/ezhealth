<?php 
include("config/config.php");
if($_SESSION['username'])
{	
	$_SESSION['booking_id']=$_REQUEST['bk_id'];
	$apt_doc_id=mysql_fetch_object(mysql_query("select DOCTOR_ID from booking where BOOKING_ID='".$_REQUEST['bk_id']."'"));
	$sel_pt_name=mysql_fetch_object(mysql_query("select FNAME,LNAME,APT_REASON from booking_details where BOOKING_ID='".$_REQUEST['bk_id']."'"));
	$pres=mysql_fetch_object(mysql_query("select DIGNOSIS,LAB_TEST from prescription where BOOKING_ID='".$_REQUEST['bk_id']."'"));
	$sel_dob=mysql_fetch_object(mysql_query("select DOB from booking_details where BOOKING_ID='".$_REQUEST['bk_id']."'"));
	$d_dob=explode('-',$sel_dob->DOB);
	$cal_dob=$d_dob[0];
	$todate=date('Y');
	$age=$todate-$cal_dob;
	$sel_patient_id=mysql_fetch_object(mysql_query("select PATIENT_ID from booking where BOOKING_ID='".$_REQUEST['bk_id']."'"));
	$gender=mysql_fetch_object(mysql_query("select GENDER from patient_family where PATIENT_ID='".$sel_patient_id->PATIENT_ID."' and FNAME='".$sel_pt_name->FNAME."'"));
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
<script type="text/javascript" src="add_med.js"></script>
</head>
<body>
<div class="midcontainer1">
			
<div class="prescription_M">
<form name="signup" method="post" action="" onSubmit="return validate();">
<table width="680" cellpadding="0" cellspacing="0" border="0"> 
	<tr>
	<td colspan="3">&nbsp;</td>
	<td align="right"><a href="view_apt_history.php" target="riframe"><img src='./images/close.png' border="0" title="Close"></a></td>
	</tr>
	<tr>
	<td height="28" bgcolor="#e7f6ff" colspan="4"><h2 style="color:#003162; padding-left:16px;">Prescription </h2></td>
    <td width="1"></td>
	</tr> 
	<tr>
	  <td colspan="4">&nbsp;</td>
	</tr>
	<tr>
	  <td width="71" class="prescription_txt"></td>
	  <td width="222" class="prescription_txt">Patient Name</td>
	  <td width="60">:</td>
	  <td width="1000"><?=$sel_pt_name->FNAME.' '.$sel_pt_name->LNAME?></td>
	</tr>
	<tr>
	  <td colspan="4">&nbsp;</td>
	</tr>
    <tr>
	  <td  class="prescription_txt"></td>
	  <td  class="prescription_txt">Age</td>
	  <td> :</td>
	  <td><?=$age?></td>
    </tr>
	<tr>
	  <td colspan="4">&nbsp;</td>
	</tr>
    
     <tr>
	  <td class="prescription_txt"></td>
	  <td class="prescription_txt">Gender</td>
	  <td> :</td>
	  <td><?=$gender->GENDER?></td>
    </tr>
	<tr>
	  <td colspan="4">&nbsp;</td>
	</tr>
	<tr>
	  <td  class="prescription_txt"></td>
	  <td  class="prescription_txt">Problem</td>
	  <td> :</td>
	  <td><?=$sel_pt_name->APT_REASON?></td>
	</tr>
	<tr>
	  <td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td  class="prescription_txt"></td>
	  <td  class="prescription_txt">Dignosis</td>
	  <td>:</td>
	  <td> <?=$pres->DIGNOSIS?></td>
	</tr>
	<tr>
	  <td colspan="4">&nbsp;</td>
	</tr>
	<tr>
</table>
<table width="680" cellpadding="0" cellspacing="0" border="0"> 
<tr>
  <td align="center"><img src="images/prescription.png" /></td>
  <td colspan="3">&nbsp;</td>
</tr>
  <tr>
	  <th align="center" width="57" class="timetabH4">Sr. No.</th>
	  <th align="center" width="141" class="timetabH4">Medicine Name</th>
	  <th  align="center" width="309" class="timetabH4">Dosage</th>
	  <th width="213" class="timetabH4">Times</th>
 </tr>
	<? $sel_pres_med=mysql_query("select * from pres_medicine where BOOKING_ID='".$_REQUEST['bk_id']."'"); 
		$i=1;
		while($val=mysql_fetch_object($sel_pres_med))
		{
	?>
	<tr>
	  <td align="center" class="timetabH1"><?=$i?></td>
	  <td align="center" class="timetabH1"><?=$val->MED_NAME?></td>
	  <td align="center" class="timetabH1"><?=$val->DOSAGE?></td>
	  <td class="timetabH1"><?=$val->TIME?></td>
	</tr>	
	<? $i=$i+1; } ?>
	<tr>
	  <td align="center"></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	</tr>
</table>	
<table width="720" cellpadding="0" cellspacing="0" border="0"> 
	<tr>
		<td width="35"  class="prescription_txt"></td>
	  <td width="146"  class="prescription_txt">Lab Test</td>
	  <td width="24"> </td>
	  <td width="511"></td>
	</tr>
	<tr>
		<td width="35"  class="prescription_txt"></td>
	  <td width="146"  colspan="3"><?=$pres->LAB_TEST?></td>
	</tr>
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
	</table>
</form>
<div class="clear"></div>
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
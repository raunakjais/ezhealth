<?php 
include("config/config.php");
if($_SESSION['user_type']=='P')
{
	$_SESSION['doc_id']='';
	if($_SESSION['doc_id']!='')
	{
	$_GET['id']=$_SESSION['doc_id'];
	}
	$b_det=mysql_fetch_object(mysql_query("select * from doctor_register where DOCTOR_ID='".$_GET['id']."'")); 
	$_SESSION['doc_id']=$b_det->DOCTOR_ID;
	$patient=mysql_fetch_object(mysql_query("select USER_UN_ID from login where USERNAME='".$_SESSION['username']."' and USER_TYPE='P'"));
	$_SESSION['pat_id']=$patient->USER_UN_ID;
	if($_SESSION['user_type']!='')
	{
	unset($_SESSION['new_doc_id']);
	}
}
if($_SESSION['user_type']=='D')
{
	$b_det=mysql_fetch_object(mysql_query("select USER_UN_ID from login where USERNAME='".$_SESSION['username']."' and USER_TYPE='D'")); 
	$_SESSION['doc_id']=$b_det->USER_UN_ID;
	/*$patient=mysql_fetch_object(mysql_query("select USER_UN_ID from login where USERNAME='".$_SESSION['username']."' and USER_TYPE='P'"));
	$_SESSION['pat_id']=$patient->USER_UN_ID;*/
}
if($_SESSION['user_type']=='R')
{
	$b_det=mysql_fetch_object(mysql_query("select * from doctor_register where DOCTOR_ID='".$_GET['id']."'")); 
	$_SESSION['doc_id']=$b_det->DOCTOR_ID;
	/*$patient=mysql_fetch_object(mysql_query("select USER_UN_ID from login where USERNAME='".$_SESSION['username']."' and USER_TYPE='P'"));
	$_SESSION['pat_id']=$patient->USER_UN_ID;*/
}
if($_SESSION['user_type']=='')
{
	$b_det=mysql_fetch_object(mysql_query("select * from doctor_register where DOCTOR_ID='".$_GET['id']."'")); 
	$_SESSION['doc_id']=$b_det->DOCTOR_ID;
}
$address=mysql_fetch_object(mysql_query("select * from doctor_personal_info where DOCTOR_ID='".$_GET['id']."'"));
$area=mysql_fetch_object(mysql_query("select AREA_NAME from area_table where AREA_ID='".$address->DOCTOR_AREA."'")); 
$city=mysql_fetch_object(mysql_query("select CITY_NAME from city_table where CITY_ID='".$address->DOCTOR_CITY."'")); 
$state=mysql_fetch_object(mysql_query("select STATE_NAME from state_table where STATE_ID='".$address->DOCTOR_STATE."'")); 
$country=mysql_fetch_object(mysql_query("select COUNTRY_NAME from country_table where COUNTRY_ID='".$address->DOCTOR_CONTRY."'")); 
$doc_special=mysql_fetch_object(mysql_query("select DOCTOR_SPECIALITY from doctor_personal_location_info where DOCTOR_ID='".$_GET['id']."'"));
$doc_exp=mysql_fetch_object(mysql_query("select DOCTOR_EXP,DOCTOR_AREA from doctor_personal_info where DOCTOR_ID='".$_GET['id']."'"));
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
<script type="text/javascript" src="new_slot.js"></script>
<script type="text/javascript" src="block.js"></script>
<script type="text/javascript">
function change_date()
{
	document.getElementById('change').style.display='none';
	document.getElementById('prev').style.display='';
	document.getElementById('last_date').value='0';
	ch_date(document.getElementById('last_date').value+'^'+'next','time_alot');
}
function change_slot()
{
	ch_slot(document.getElementById('last_date').value+'^'+'next','block');
}
function change_date1()
{
	document.getElementById('prev').style.display='none';
	document.getElementById('change').style.display='';
	document.getElementById('last_date').value='1';
	ch_date(document.getElementById('last_date').value+'^'+'prev','time_alot');
}
function change_slot1()
{
	ch_slot(document.getElementById('last_date').value+'^'+'prev','block');
}
</script>
</head>
<body bgcolor="">
<form name="signup" method="post" action="all_business.php" onSubmit="">
<table width="700px" cellpadding="0" cellspacing="0"> 
			<tr>
				<td colspan="5"><h2 style="color:#003162;">Schedule Appointment</h2></td>
			</tr>
		  <tr>
            <td colspan="5">&nbsp;</td>
          </tr>   
		  <?php if($_SESSION['user_type']=='P' || $_SESSION['user_type']=='R') { ?>     
		  <tr>
			<td width="292"><font size="+2"><?php print 'Dr. '.$b_det->DOCTOR_FIRST_NAME.' '.$b_det->DOCTOR_LAST_NAME; ?></font></td>
			<td width="973" colspan="4">&nbsp;</td>
		  </tr>
		  <?php } ?>
		  <tr>
			<td colspan="5">&nbsp;</td>
		  </tr>
</table>
<table width="700px" cellpadding="2" cellspacing="2"> 
		  <tr>
			<td width="58"><div style="width:50px; height:20px; background-color:#FFB871"></div></td><td width="96"> Booked Slot</td>
			<?php if($_SESSION['user_type']!='P' && $_SESSION['user_type']!='') { ?><td width="60"><div style="width:50px; height:20px; background-color:#95DFB3"></div></td><td width="180"> Tentative Booked Appointment</td>
			<? } else { ?><td width="87"> <div style="width:90px; height:20px;"></div> </td><td width="30"></td>
			<?php } ?>
			<td width="143" align="right"></td>
		  </tr>
</table>		  
<table width="700px" cellpadding="0" cellspacing="0"> 	
			<tr>
            <td colspan="5" align="right">&nbsp;</td>
          </tr>	  
		  <tr>
            <td colspan="5" align="right"><img src="images/pre.png" onclick="change_date1();" id="prev" style="cursor:pointer; display:none;" />&nbsp;<img src="images/next.png" onclick="change_date();" id="change" style="cursor:pointer;" /></td>
          </tr>
</table>	
		<div id="time_alot">		  
		  <table width="685px" class="timetable">
			<tr>
				<td class="timetabH1D"> <strong>&nbsp;Time-Slots&nbsp;</strong> </td>
				<?php for($i=0;$i<7;$i++) { ?>
					<td class="timetabH1D"><b><?php 
					print $tomorrow = date("d/m/Y", strtotime("+ $i days"));
					?></b><br /><b>
					<?php print $day_name = date("l", strtotime("+ $i days")); ?></b>
					</td>
				<?php } ?>
			</tr>
		</table>
		</div>
		<div id="block">
		<table width="700px" cellpadding="0" cellspacing="0"> 
		  <tr>
			<td width="222px" colspan="5">
				<iframe height="600px;" width="700px;" scrolling="yes" src="slot.php" frameborder="0">
				</iframe>
			</td> 	
		  </tr>
		  </table>
	  </div>
		  <input type="hidden" name="last_date" id="last_date" value="1" />
</form>

<!--/div-->
<?php  ?>
</body>
</html>
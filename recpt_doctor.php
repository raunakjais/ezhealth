<?php 
include("config/config.php");
if($_SESSION['username'])
{
	$get_doc_list=mysql_query("select * from doc_mapping,doctor_register where DOC_ID=DOCTOR_ID and RECP_ID='".$_SESSION['recp_id']."'"); 
	$get_fdoc=mysql_fetch_object(mysql_query("select * from doc_mapping,doctor_register where DOC_ID=DOCTOR_ID and RECP_ID='".$_SESSION['recp_id']."'")); 
	$doc_count=mysql_num_rows(mysql_query("select * from doc_mapping,doctor_register where DOC_ID=DOCTOR_ID and RECP_ID='".$_SESSION['recp_id']."'")); 
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
<script type="text/javascript" src="docChart.js"></script>
</head>
<body class="maina">
<!--div class="dashright"-->
<form name="search1" method="post" action="" >
<!--table width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<th width="157" class="timetabH4">Doctor Name</th>
		<th width="300" class="timetabH4">Contact Number</th>
		<th width="142" class="timetabH4">Book An Appointment</th>
	</tr>
	<?php /*$get_doc_list=mysql_query("select * from doc_mapping,doctor_register where DOC_ID=DOCTOR_ID and RECP_ID='".$_SESSION['recp_id']."'"); 
		while($val=mysql_fetch_object($get_doc_list))
		{*/
	?>
	<tr>
		<td width="157" class="timetabH1"><?=$val->DOCTOR_FIRST_NAME.' '.$val->DOCTOR_LAST_NAME?></th>
		<td width="300" class="timetabH2"><?=$val->DOCTOR_MOBILE_NUMBER?></th> 
		<td width="142" class="timetabH1"><a href="book_now.php?id=<?=$val->DOCTOR_ID?>" style="text-decoration:none; color:#999999;">Book Now</a></th>
	</tr>
	<?php //} ?>
</table-->	
<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td><h2 style="color:#003162;">Book Appointment</h2></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Select Doctor <span class="red">*</span>
		</td>
	</tr>
	<tr>
		<td>
		<select name="sel_doc" id="sel_doc" class="drop2" onChange="showDocChart(this.value,'disp_doc_chart');" >
			<!--option value="">Select Doctor</option-->
			<?php while($val=mysql_fetch_object($get_doc_list))
			{	?>
			<option value="<?=$val->DOCTOR_ID?>"><?=$val->DOCTOR_FIRST_NAME.' '.$val->DOCTOR_LAST_NAME?></option>
			<? } ?>
		</select>
		</td>
	</tr>
</table>
<div id="disp_doc_chart">

			<!-- default doctor -->
			<?php
			if($doc_count>=1)
			{
					$_GET['id']=$get_fdoc->DOCTOR_ID;
					if($_SESSION['user_type']=='P')
					{
						$b_det=mysql_fetch_object(mysql_query("select * from doctor_register where DOCTOR_ID='".$_GET['id']."'")); 
						$_SESSION['doc_id']=$b_det->DOCTOR_ID;
						$patient=mysql_fetch_object(mysql_query("select USER_UN_ID from login where USERNAME='".$_SESSION['username']."' and USER_TYPE='P'"));
						$_SESSION['pat_id']=$patient->USER_UN_ID;
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
					$address=mysql_fetch_object(mysql_query("select * from doctor_personal_info where DOCTOR_ID='".$_GET['id']."'"));
					$area=mysql_fetch_object(mysql_query("select AREA_NAME from area_table where AREA_ID='".$address->DOCTOR_AREA."'")); 
					$city=mysql_fetch_object(mysql_query("select CITY_NAME from city_table where CITY_ID='".$address->DOCTOR_CITY."'")); 
					$state=mysql_fetch_object(mysql_query("select STATE_NAME from state_table where STATE_ID='".$address->DOCTOR_STATE."'")); 
					$country=mysql_fetch_object(mysql_query("select COUNTRY_NAME from country_table where COUNTRY_ID='".$address->DOCTOR_CONTRY."'")); 
					$doc_special=mysql_fetch_object(mysql_query("select DOCTOR_SPECIALITY from doctor_personal_location_info where DOCTOR_ID='".$_GET['id']."'"));
					$doc_exp=mysql_fetch_object(mysql_query("select DOCTOR_EXP,DOCTOR_AREA from doctor_personal_info where DOCTOR_ID='".$_GET['id']."'"));
					?>
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
					<div class="main">
					<div class="header">
					<div class="topcontainer">
					</ul-->&nbsp;<!--/div--></div>
					<div class="dashM">
					<form name="signup" method="post" action="all_business.php" onSubmit="">
					<table width="700px" cellpadding="0" cellspacing="0">    
							  <?php if($_SESSION['user_type']=='P' || $_SESSION['user_type']=='R') { ?>     
							  <tr>
								<td width="167" colspan="5"><font size="+2"><?php print 'Dr. '.$b_det->DOCTOR_FIRST_NAME.' '.$b_det->DOCTOR_LAST_NAME; ?></font></td>
							  </tr>
							  <?php } ?>
					</table>
					<table width="700px" cellpadding="0" cellspacing="0"> 
							  <tr>
								<td width="64"><div style="width:50px; height:20px; background-color:#FFB871"></div></td><td width="100"> Booked Slot</td>
								<?php if($_SESSION['user_type']!='P') { ?><td width="66"><div style="width:50px; height:20px; background-color:#95DFB3"></div></td><td width="182"> Tentative Booked Appointment</td>
								<? } else { ?><td width="90"> <div style="width:90px; height:20px;"></div> </td><td width="37"></td>
								<?php } ?>
								<td width="159" align="right"></td>
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
							<table height="800px;" width="700px" cellpadding="0" cellspacing="0"> 
							  <tr>
								<td width="222px" colspan="5">
									<iframe height="800px;" width="700px;" scrolling="yes" src="slot.php" frameborder="0">
									</iframe>
								</td> 	
							  </tr>
							  </table>
						  </div>
							  <input type="hidden" name="last_date" id="last_date" value="1" />
					</form>
					
					</div>
					</div>
			<? } ?>		
			<!-- end -->

</div>
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
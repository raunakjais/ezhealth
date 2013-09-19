<?php 
include("config/config.php");
$b_det=mysql_fetch_object(mysql_query("select * from business_info where BUSINESS_ID='".$_GET['id']."'")); 
$area=mysql_fetch_object(mysql_query("select AREA_NAME from area_table where AREA_ID='".$b_det->BUSINESS_AREA_NAME."'")); 
$city=mysql_fetch_object(mysql_query("select CITY_NAME from city_table where CITY_ID='".$b_det->BUSINESS_CITY_NAME."'")); 
$state=mysql_fetch_object(mysql_query("select STATE_NAME from state_table where STATE_ID='".$b_det->BUSINESS_STATE_NAME."'")); 
$country=mysql_fetch_object(mysql_query("select COUNTRY_NAME from country_table where COUNTRY_ID='".$b_det->BUSINESS_COUNTRY_NAME."'")); 
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
<body bgcolor="">
<div class="main">
<?php include('header.php'); ?>
<div class="clear"></div>
<div class="topcontainer">
<!--div class="dashR"-->
<!--ul><li style="background:none;">
<a href="#">Home</a> </li>
<li><a href="#"> My Account</a></li>
<li class="current"><a href="#"> Upcoming Appointment</a></li>
</ul-->&nbsp;<!--/div--></div>
<div class="business_main">
<form name="signup" method="post" action="all_business.php" onSubmit="">
<div class="business_detail"><div class="doc_head">Business Details</div></div>
<div class="business_left">
<table width="100%"> 
<tr>
			<td width="20" colspan="2"></td>
			<td width="209" class="doc_view">Name</td>
			<td width="15">:</td>
			<td width="311" colspan="3"><?php print $b_det->BUSINESS_LOCATION_TITLE; ?></td> 	
	    </tr>
        <tr>
            <td colspan="7">&nbsp;</td>
          </tr>
		  <tr>
		  <tr>
			<td width="20" colspan="2"></td>
			<td class="doc_view">Location Name</td>
			<td width="15">:</td>
			<td width="311" colspan="3"><?php print $b_det->BUSINESS_LOCATION_BRANCH; ?></td> 	
	    </tr>
		  <tr>
            <td colspan="7">&nbsp;</td>
          </tr>
		  <tr>
			<td width="20" colspan="2"></td>
			<td class="doc_view">Type</td>
			<td width="15">:</td>
			<td width="311" colspan="3"><?php print $b_det->BUSINESS_LOCATION_TYPE; ?></td> 	
	    </tr>
		  <tr>
            <td colspan="7">&nbsp;</td>
          </tr>
		  <tr>
			<td width="20" colspan="2"></td>
			<td class="doc_view">Phone No.</td>
			<td width="15">:</td>
			<td width="311" colspan="3"><?php print $b_det->BUSINESS_LOCATION_PHONE_NUMBER; ?></td> 	
	    </tr>
		  <tr>
            <td colspan="7">&nbsp;</td>
          </tr>
		  <tr>
			<td width="20" colspan="2"></td>
			<td class="doc_view">Address</td>
			<td width="15">:</td>
			<td width="311" colspan="3"><?php print $b_det->BUSINESS_ADDRESS.', '.$area->AREA_NAME.', '.$city->CITY_NAME.', '.$state->STATE_NAME.', '.$country->COUNTRY_NAME; ?></td> 	
	    </tr>
		  <tr>
            <td colspan="7">&nbsp;</td>
          </tr>
		  <tr>
			<td width="20" colspan="2"></td>
			<td class="doc_view">Email</td>
			<td width="15">:</td>
			<td width="311" colspan="3"><?php print $b_det->BUSINESS_EMAIL; ?></td> 	
	    </tr>
		  <tr>
            <td colspan="7">&nbsp;</td>
          </tr>
		  <tr>
			<td width="20" colspan="2"></td>
			<td class="doc_view">Facilities Available</td>
			<td width="15">:</td>
			<td width="311" colspan="3"><?php //print $b_det->BUSINESS_EMAIL; ?></td> 	
	    </tr>
		  <tr>
            <td colspan="7">&nbsp;</td>
          </tr>
		  <tr>
			<td width="20" colspan="2"></td>
			<td class="doc_view">List Of Doctors Available:</td>
			<td width="15">:</td>
			<td width="311" colspan="3">&nbsp;</td> 	
	    </tr></table>
      </div>
        <div class="business_right"><!--img src="images/user.jpg" /--></div>
   <table width="100%" cellpadding="0" cellspacing="0"> 
		<tr>
				<td colspan="7"></td>
			</tr>
		  <tr>
            <td colspan="7">&nbsp;</td>
          </tr>        
		
          
          
        
        
          <tr><td height="10" colspan="3"></td></tr>
		  <tr>
		  	<td colspan="7">
				<table width="100%" cellpadding="1" cellspacing="1">
					<tr>
						<td height="30" width="1%"></td>
					  <td bgcolor="#0d5c83"  width="16%" class="business_txt" align="center">Doctor Name</td>
					  <td bgcolor="#0d5c83"  align="center" width="15%" class="business_txt">Speciality</td>
						
						<td bgcolor="#0d5c83" align="center" width="16%" class="business_txt">Email</td>
						<td bgcolor="#0d5c83" align="center" width="12%" class="business_txt">Practice</td>
						<td bgcolor="#0d5c83"  align="center" width="10%" class="business_txt">Fees</td>
						<td bgcolor="#0d5c83"  align="center" width="14%" class="business_txt">Location</td>
						<td bgcolor="#0d5c83"  align="center" width="15%" class="business_txt">Book Now</td>
					    <td  align="center" width="1%" class="business_txt">&nbsp;</td>
					</tr>
					<?php $doc_list=mysql_query("select * from doctor_register where DOCTOR_IDENTITY='".$_GET['id']."' and DOCTOR_FLAG=0"); 
						while($doc_det=mysql_fetch_object($doc_list))
						{
							$doc_special=mysql_fetch_object(mysql_query("select DOCTOR_SPECIALITY from doctor_personal_location_info where DOCTOR_ID='".$doc_det->DOCTOR_ID."'"));
							$doc_exp=mysql_fetch_object(mysql_query("select DOCTOR_EXP,DOCTOR_AREA from doctor_personal_info where DOCTOR_ID='".$doc_det->DOCTOR_ID."'"));
							$area_name=mysql_fetch_object(mysql_query("select AREA_NAME from area_table where AREA_ID='".$doc_exp->DOCTOR_AREA."'")); 

					?>
                    <tr><td height="6"></td></tr>
					<tr>
						<td width="1%"></td>
					  <td bgcolor="e6f6fe" align="center" width="16%"><?=$doc_det->DOCTOR_FIRST_NAME.' '.$doc_det->DOCTOR_LAST_NAME;?></td>
						<td bgcolor="e6f6fe" width="15%" align="center"><?=$doc_special->DOCTOR_SPECIALITY?></td>
						
						<td bgcolor="e6f6fe" align="center" width="16%"><?=$doc_det->DOCTOR_EMAIL?></td>
						<td bgcolor="e6f6fe" align="center" width="12%"><?=$doc_exp->DOCTOR_EXP?></td>
						<td bgcolor="e6f6fe" width="10%">&nbsp;</td>
						<td bgcolor="e6f6fe" align="center" width="14%"><?=$area_name->AREA_NAME?></td>
						<td width="15%" align="center" bgcolor="e6f6fe"><a href="doctor_view.php?id=<?php print $doc_det->DOCTOR_ID?>" style="text-decoration:none; color:#999999;">Book Now</a></td>
				      <td width="1%" align="center">&nbsp;</td>
					</tr>
					<?php } ?>
				</table>			</td>
		  </tr>
		  <tr>
		    <td colspan="7">&nbsp;</td>
	    </tr>
		  </table>
</form>
<div class="clear"></div>
</div>
<div class="clear"></div>
<?php include('footer.php'); ?>
</div>
</body>
</html>
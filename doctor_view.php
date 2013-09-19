<?php 
include("config/config.php");
$b_det=mysql_fetch_object(mysql_query("select * from doctor_register where DOCTOR_ID='".$_GET['id']."'")); 
$address=mysql_fetch_object(mysql_query("select * from doctor_personal_info where DOCTOR_ID='".$_GET['id']."'"));
$area=mysql_fetch_object(mysql_query("select AREA_NAME from area_table where AREA_ID='".$address->DOCTOR_AREA."'")); 
$city=mysql_fetch_object(mysql_query("select CITY_NAME from city_table where CITY_ID='".$address->DOCTOR_CITY."'")); 
$state=mysql_fetch_object(mysql_query("select STATE_NAME from state_table where STATE_ID='".$address->DOCTOR_STATE."'")); 
$country=mysql_fetch_object(mysql_query("select COUNTRY_NAME from country_table where COUNTRY_ID='".$address->DOCTOR_CONTRY."'")); 
$doc_special=mysql_fetch_object(mysql_query("select DOCTOR_SPECIALITY,DOCTOR_EXPERTISE1 from doctor_personal_location_info where DOCTOR_ID='".$_GET['id']."'"));
$doc_exp=mysql_fetch_object(mysql_query("select DOCTOR_EXP,DOCTOR_AREA from doctor_personal_info where DOCTOR_ID='".$_GET['id']."'"));
$pic=mysql_fetch_object(mysql_query("select * from doctor_personal_info where DOCTOR_ID='".$_GET['id']."'"));
$qual=mysql_query("select * from doctor_qualification_info where DOCTOR_ID='".$_GET['id']."'");
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
<!--div class="doc_main"-->
<form name="signup" method="post" action="all_business.php" onSubmit="">
<!--div class="doc_detail">
  <div class="doc_head">Doctor Details</div>
</div-->
<!--div class="doc_left"-->
<table width="99%" cellpadding="0" cellspacing="0" style="margin:0px 0px 0px 20px;"> 
  <tr>
	<td colspan="6" valign="top">
		<table width="218" cellpadding="0" cellspacing="0" style="margin:0px auto;"> 
		  <tr>
            <td colspan="6" valign="top" align="left">
			<div class="doc_image"><img src="uploads/<? if($pic->DOCTOR_PHOTO!='') { print $pic->DOCTOR_PHOTO; } else { print 'noImage.gif'; } ?>" width="160" height="200"  /></div></td>
          </tr>  
		  <tr>
            <td colspan="6">&nbsp;</td>
          </tr>        
		  <tr>
			<td width="1" class="doc_view"></td>
		
			<td width="232" colspan="3" class="text_bold"><i>
		Dr. <?php print ucfirst($b_det->DOCTOR_FIRST_NAME).' '.ucfirst($b_det->DOCTOR_LAST_NAME); ?></i></td>
	    </tr>
		  
		  <tr>
			<td width="1" class="doc_view"></td>
			
			<td width="259" colspan="3" class="doc_viewdis"><strong><i><?php print '( '.$doc_special->DOCTOR_SPECIALITY.' )'; ?></i></strong></td> 	
	    </tr>
		  <tr>
			<td width="1" class="doc_view"></td>
			<td width="259" colspan="3" class="doc_viewdis"><img src="images/loxcation.png" /> <?php print $state->STATE_NAME.' | '.$country->COUNTRY_NAME; ?></td> 	
	    </tr> 
		  
		  
		  
		  
		  	<?php if($address->DOCTOR_FEES!='') { ?>
		  <tr>
			<td width="1" class="doc_view"></td>
			<td width="259" colspan="3" class="doc_viewdis"><img src="images/money.png" /> <?php print 'INR '.$address->DOCTOR_FEES.'/ per consultation'; ?></td> 	
	    </tr>
		<? } ?>
		 
		<tr>
			<td width="1" class="doc_view" colspan="4" height="30"></td> 	
	    </tr>
		<tr>
			<td width="1" class="doc_viewN" colspan="4"><strong>Professional Information</strong></td> 	
	    </tr>
		
		<?php while($qual_val=mysql_fetch_object($qual)) { ?>
		<tr>
			<td width="1" class="doc_view"></td>
			<td width="259" colspan="3" class="doc_viewdis">&bull; <?php print $qual_val->DOCTOR_QUALIFICATION_DEGREE.'('.$qual_val->DEGREE_YEAR.')'. ' from '.$qual_val->DEGREE_COLLEGE; ?></td> 	
	    </tr>
		<?php } ?>
		<tr>
			<td width="1" class="doc_view" colspan="4" height="30"></td> 	
	    </tr>
		<tr>
			<td width="1" class="doc_viewN" colspan="4"><strong>Contact Information</strong></td> 	
	    </tr>
		  
		
		  <tr>
			<td width="1" class="doc_view"></td>
			<td width="259" colspan="3" class="doc_viewdis" valign="top"><img src="images/loxcation.png" /> <?php print $address->DOCTOR_ADDRESS; ?></td> 	
	    </tr>
		<tr>
			<td width="1" class="doc_view"></td>
			<td width="259" colspan="3" class="doc_viewdis"><?php print $area->AREA_NAME; ?></td> 	
	    </tr>
		
		 <tr>
			<td width="1" class="doc_view"></td>
			<td width="259" colspan="3" class="doc_viewdis"><?php print $state->STATE_NAME.' | '.$country->COUNTRY_NAME; ?></td> 	
	    </tr> 
		
		<tr>
			<td width="1" class="doc_view" colspan="4" height="30"></td> 	
	    </tr>
		<tr>
			<td width="1" class="doc_viewN" colspan="4"><strong>Expertise</strong></td> 	
	    </tr>
		<?php if($doc_exp->DOCTOR_EXP!='') {?>
		<tr>
			<td width="1" class="doc_view"></td>
			<td width="259" colspan="3" class="doc_viewdis">&bull;  Practicing for <?php print $doc_exp->DOCTOR_EXP.' yrs'; ?></td> 	
	    </tr>
		<?php } ?>
		<tr>
			<td width="1" class="doc_view"></td>
			<td width="259" colspan="3" class="doc_viewdis"> <?php print $doc_special->DOCTOR_EXPERTISE1; ?></td> 	
	    </tr>
		<?php 
				$_SESSION['new_doc_id']=$_GET['id'];
		 ?>
	  </table>
	</td>
	<td width="74%" valign="top">
		<table width="100%" cellpadding="0" cellspacing="0" style="margin:0px auto;"> 
			<tr>
				<td valign="top"><?php include('book_now.php'); ?></td>
			</tr>
		</table>
	</td>
  </tr>
</table>	  
</form>

<!--/div-->
<div class="clear"></div>
<div style="height:110px;"></div>
<?php include('footer.php'); ?>
</div>
</body>
</html>
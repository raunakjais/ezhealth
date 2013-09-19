<?php 
include("config/config.php");
	if($_REQUEST['buss_name']!='') 
	{
		$condition = $condition . " BUSINESS_LOCATION_TITLE like '%".$_REQUEST['buss_name']."%' and ";
	}
	if($_REQUEST['loc_name']!='')
	{
		$condition = $condition . " BUSINESS_LOCATION_BRANCH like '%".$_REQUEST['loc_name']."%' and ";
	}
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
<div class="dashM">
<form name="search1" method="post" action="" >

<table width="100%" cellpadding="0" cellspacing="0" border="0"> 
	<tr>
		<td colspan="4"><h2 style="color:#003162;">All Business List</h2></td>
	</tr>
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<?
		 $sel_doc=mysql_query("select * from business_info where ".$condition." BUSINESS_FLAG=0 order by BUSINESS_ID DESC"); 
		$count=0;
		while($val=mysql_fetch_object($sel_doc))
		{
			$doc_no = mysql_num_rows(mysql_query("select DOCTOR_ID from doctor_register where DOCTOR_IDENTITY='".$val->BUSINESS_ID."'"));
		?>
		<td width="24%">
			<table width="185" style="border:solid 1px #e7e7e7;">
				<tr>
					<td height="25" align="center" bgcolor="#c6eafe" colspan="4" class="image1"><strong><? if($val->BUSINESS_LOCATION_TITLE!='') { print $val->BUSINESS_LOCATION_TITLE; } else { print 'Hospital'; } ?></strong></td>
				</tr>
				<tr>
					<td align="center" colspan="4"><div class="img_border">
                    <img src="uploads/<? if($val->BUSINESS_PHOTO=='') { print 'hospital.jpg'; } else { print $val->BUSINESS_PHOTO; } ?>" width="110" height="90"  /></div></td>
				</tr>
				<tr>
					<td width="16" class="text1"></td>
					<td width="49" class="text1">Location</td>
					<td width="4" class="text1">:</td>
					<td width="98" class="text1"><? print $val->BUSINESS_LOCATION_BRANCH;?></td>
				</tr>
				<tr>
					<td width="16" class="text1"></td>
					<td width="49" class="text1">Establish</td>
					<td width="4" class="text1">:</td>
					<td width="98" class="text1"><? print $val->BUSINESS_ESTABLISH;?></td>
				</tr>
				<tr>
					<td width="16" class="text1"></td>
				  <td width="49" class="text1">Doctor(s)</td>
					<td width="4" class="text1">:</td>
					<td width="98" class="text1"><? print $doc_no; ?> </td>
				</tr>
				<tr>
				  <td class="text1"></td>
				  <td class="text1">&nbsp;</td>
				  <td class="text1">&nbsp;</td>
				  <td class="text3" align="right"><a href="buss_view.php?id=<?=$val->BUSINESS_ID?>">View More..</a></td>
			  </tr>
			</table>		
		</td>
		<!--td width="76%"><div class="lineN"></div></td-->
		<?php if($count==4) { ?> <tr><td colspan="4">&nbsp;</td></tr>   </tr> <tr> <?php $count=0; } else { $count=$count+1; }
		}
		?>
	</tr>
</table>
</form>

</div>
<?php include('footer.php'); ?>
</div>
</body>
</html>
	

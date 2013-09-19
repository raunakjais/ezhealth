<?php 
include("config/config.php");
$gender1=mysql_fetch_object(mysql_query("select PATIENT_GENDER from patient_personal_info where PATIENT_ID='$rowid'")); 
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
<script type="text/javascript" src="scw.js"></script>
</head>

<body bgcolor="#dcdcdc">
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

<table width="100%" cellspacing="1" cellpadding="1" border="0">
<tr>
<td colspan="4"><h2 style="color:#003162;">News Section </h2></td>
</tr>
<td colspan="4" height="10"></td>
            <tbody>
           
          
           		
			<?php 
			if($_GET['id']!='')
			{
				$query=mysql_query("select * from news where NEWS_ID='".$_GET['id']."'");
			}
			else
			{
				$query=mysql_query("select * from news order by NEWS_ID DESC");
			}
			$sl=1;
			while($val=mysql_fetch_object($query)) { ?>
             <tr><td colspan="2" width="148" class="about_t2"><?=ucfirst($val->NAME).' ('.$val->CDATE.')'; ?> </td>
             </tr>
			
            
			<tr>
			<td colspan="2" width="825" class="news_T"></td>
           
            </tr>
            <tr><td colspan="2" class="latest_txt"><?=$val->DESCRIPTION;?></td></tr>
		
			  <tr><td colspan="2">&nbsp;</td></tr>                      
			<?php  $sl=$sl+1; } ?>
			</tbody></table>


</div>
<?php include('footer.php'); ?>
</div>
</body>
</html>
	

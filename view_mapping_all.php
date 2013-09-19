<?php
include("config/config.php");
if($_SESSION['username'])
{
	//$get_bid=mysql_fetch_object(mysql_query("select USER_UN_ID from login where USER_TYPE='".$_SESSION['user_type']."' and USERNAME='".$_SESSION['username']."' and USER_FLAG=0"));
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
</head>
<body>
<div class="maina">
<div class="midcontainer1">
			
<div class="doctor_M">
<form name="signup" method="post" action="" onSubmit="return validate();">
<table width="700" cellpadding="1" cellspacing="1" border="0"> 
			<tr>
				<td colspan="9"><h2 style="color:#003162;">View Mapping (s)</h2></td>
			</tr>
		  <tr>
            <td colspan="9" height="6"></td>
          </tr>        
		  <tr>
			<th class="timetabH4">Map Id</th>
			<th class="timetabH4">Receptionist</th>
			<th class="timetabH4">Doctor</th>
			<th class="timetabH4">Map Status</th>
			<th class="timetabH4">Action</th>
		  </tr>
		  <?php 
		  $get_doc = mysql_query("select * from doc_mapping");
		  while($doc_det=mysql_fetch_object($get_doc))
		  {
		  	$recpt = mysql_fetch_object(mysql_query("select RECEPTIONIST_FIRST_NAME,RECEPTIONIST_LAST_NAME from receptionist_register where RECEPTIONIST_ID='".$doc_det->RECP_ID."'"));
			$doc = mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME from doctor_register where DOCTOR_ID='".$doc_det->DOC_ID."'"));
		  ?>
		  <tr>
			<td class="timetabH2"><?=$doc_det->DOC_MAPPING_ID?></td>
			<td class="timetabH1"><?=$recpt->RECEPTIONIST_FIRST_NAME.' '.$recpt->RECEPTIONIST_LAST_NAME;?></td>
			<td class="timetabH2"><?=$doc->DOCTOR_FIRST_NAME.' '.$doc->DOCTOR_LAST_NAME?></td>
			<td class="timetabH1"><?php if($doc_det->FLAG==0) { ?> <a href="view_mapping_all.php?do=dact&id=<?php print $doc_det->DOC_MAPPING_ID; ?>" style="text-decoration:none; color:#00CC66;"><strong>ACTIVE</strong></a> <? } else { ?> <a href="view_mapping_all.php?do=act&id=<?php print $doc_det->DOC_MAPPING_ID; ?>" style="text-decoration:none; color:#FF0000;"><strong>INACTIVE</strong></a> <? } ?></td>
			<td class="timetabH2">Action</td>
		  </tr>
		  <?php } ?>
        </table>
</form>
     
</div>								
</div>
</div>  
</body>
</html>
<?php
	if($_GET['do']!='' && $_GET['id']!='')
	{
		if($_GET['do']=='dact')
		{
			$update_map = mysql_query("update doc_mapping set FLAG=1 where DOC_MAPPING_ID='".$_GET['id']."'");
			if($update_map==1)
			{
				print("<script language='javascript'>alert('mapping deactivated successfully'); window.location.href='view_mapping_all.php';</script>");
			}
		}
		if($_GET['do']=='act')
		{
			$update_map = mysql_query("update doc_mapping set FLAG=0 where DOC_MAPPING_ID='".$_GET['id']."'");
			if($update_map==1)
			{
				print("<script language='javascript'>alert('mapping activated successfully'); window.location.href='view_mapping_all.php';</script>");
			}
		}
	}
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
<?php 
include("config/config.php");
include("config/function.php");
if($_SESSION['username'])
{
	$user=mysql_fetch_object(mysql_query("select USER_UN_ID from login where USER_TYPE='".$_SESSION['user_type']."' and USERNAME='".$_SESSION['username']."'"));
	$user_id=$user->USER_UN_ID; 
	
	$query=mysql_query("SELECT * from patient_family where PATIENT_ID ='".$user_id."'");
	$sl=1;
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
			
<div class="registrationform">

<table width="720" cellspacing="0" cellpadding="0" border="0">
<tr>
<td colspan="6"><h2 style="color:#003162;">My Family </h2></td>
</tr>
<td colspan="6">&nbsp;</h1></td>
            <tbody><tr>
	         <th width="64" class="timetabH4">Serial No.</th>
	         <th width="278" class="timetabH4">Name</th>
	         <th width="246" class="timetabH4">Relation</th>
			 <th width="322" class="timetabH4">Added on</th>
			 <th width="322" class="timetabH4">Updated on</th>
			 <th width="104" class="timetabH4">Edit</th>
			</tr>		
			<?php while($val=mysql_fetch_object($query)) { ?>
			<tr>
			<td width="64" class="timetabH1"><?=$sl;?></td>
			<td width="278" class="timetabH2"><?php print $val->FNAME.' '.$val->LNAME;?></td>
			<td width="246" class="timetabH1"><?=$val->RELATION;?></td>
			<td width="322" class="timetabH1"><?=dateformat($val->CDATE);?></td>
			<td width="322" class="timetabH1"><?php if($val->EDATE!='' && $val->EDATE!='0000-00-00') { print dateformat($val->EDATE); } ?></td>
			<td width="104" class="timetabH1"><a href="addfamily.php?fm_id=<?=$val->PATIENT_FAMILY_ID?>" style="text-decoration:none; color:#666666;"><strong>Edit</strong></a></td>
			</tr>
			<?php  $sl=$sl+1; } ?>
			</tbody></table>
			<input class="but-blue" type="button" name="submi" value="Add Family Members" onclick="window.location='addfamily.php'" >
			</div>
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
<?php 
include("config/config.php");
if($_SESSION['username'])
{
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
			
<div class="doctor_M">

<table width="720" cellspacing="1" cellpadding="1" border="0">
<tr>
<td colspan="4"><h1 style="color:#003162;">Bulletin List </h1></td>
</tr>
<td colspan="4">&nbsp;</h1></td>
            <tbody><tr>
	         <th width="110" class="timetabH4">Serial No.</th>
	         <th width="233" class="timetabH4">Bulletin</th>
	         <th width="875" class="timetabH4">Description</th>
			 <th width="119" class="timetabH4">Edit</th>
			</tr>		
			<?php 
			$query=mysql_query("select * from bulletin order by CDATE DESC");
			$sl=1;
			while($val=mysql_fetch_object($query)) { ?>
			<tr>
			<td width="110" class="timetabH1"><?=$sl;?></td>
			<td width="233" class="timetabH2"><?php print $val->NAME;?></td>
			<td width="875" class="timetabH1"><?=$val->DESCRIPTION;?></td>
			<td width="119" class="timetabH2"><a href="bulletin.php?id=<?=$val->BULLETIN_ID?>"><img src="images/edit.png"  /></a></td>
			</tr>
			<?php  $sl=$sl+1; } ?>
			</tbody></table>
			<input class="but-blue" type="button" name="submi" value="Add Bulletin" onclick="window.location='bulletin.php'" >
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
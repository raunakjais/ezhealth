<?php 
include("config/config.php");
if($_SESSION['username'])
{
	if($_GET['id']!='')
	{
		$get_val=mysql_fetch_object(mysql_query("select * from bulletin where BULLETIN_ID='".$_GET['id']."'"));
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
<script type="text/javascript" src="scw.js"></script>
<script type="text/javascript">
function validate()
{
	if(document.getElementById('bulletin').value=='')
	{
		alert('please enter bulletin name');
		return false;
	}
	else if(document.getElementById('desc').value=='')
	{
		alert('please enter bulletin details');
		return false;
	}
}
</script>
</head>
<body class="maina">
<!--div class="dashright"-->
<div class="doctor_M">
<form name="bulletin" method="post" action="" onSubmit="return validate();">
<table width="720" cellpadding="0" cellspacing="0" border="0">
<tr><td colspan="5"><h2 style="color:#003162;">Bulletin</h2></td></tr>
<tr>
<td colspan="5" height="10"></td>
</tr>
<tr><td colspan="5"><div align="center" id="manoj" style="display:none; background-color:#33CC33;"></div>
</td></tr>
<tr>
<td valign="top"><strong>Bulletin</strong><span class="red">*</span> </td>
<td >
<input type="text" name="bulletin" id="bulletin" class="textfiled-M" value="<?=$get_val->NAME?>"  height="30px" />
</td>
</tr>
<tr> 
<td colspan="5">&nbsp;</td></tr>
<tr>
<td valign="top"><strong>Bulletin Description</strong><span class="red">*</span></td>

<td><textarea rows="7" cols="70" name="desc" id="desc" class="textfiled-M" style="max-height:400px; max-width:385px; min-width:385px; min-height:150px;"><?=$get_val->DESCRIPTION?></textarea></td></tr>
<tr>
            <td> </td>
           <td colspan="2" >
				<input class="but-gray" type="reset" style="margin-right:10px;" name="reset" value="Reset">
				<input class="but-blue" type="submit" name="submit" value="Submit">
		    </td>
          </tr>
</table>
</form>
</div>
</body>
</html>
<?php
	if(isset($_POST['submit']) && $_GET['id']=='')
	{
		$insert_bulletin=mysql_query("insert into bulletin (NAME,DESCRIPTION,CUSER,CDATE) values ('".$_POST['bulletin']."','".$_POST['desc']."','".$_SESSION['username']."','".date('Y-m-d')."')");
		if($insert_bulletin==1)
		{
			print("<script language='javascript'>alert('inserted successfully...'); window.location.href='bulletin.php';</script>");
		}
	}
	else if(isset($_POST['submit']) && $_GET['id']!='')
	{
		$update_bulletin=mysql_query("update bulletin set NAME='".$_POST['bulletin']."', DESCRIPTION='".$_POST['desc']."' where BULLETIN_ID='".$_GET['id']."'");
		if($update_bulletin==1)
		{
			print("<script language='javascript'>alert('updated successfully...'); window.location.href='bulletin_list.php';</script>");
		}
	}
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
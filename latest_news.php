<?php 
include("config/config.php");
if($_SESSION['username'])
{
	if($_GET['id']!='')
	{
		$get_val=mysql_fetch_object(mysql_query("select * from news where NEWS_ID='".$_GET['id']."'"));
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
	if(document.getElementById('news').value=='')
	{
		alert('please enter news name');
		return false;
	}
	else if(document.getElementById('details').value=='')
	{
		alert('please enter news details');
		return false;
	}
}
</script>
</head>
<body class="maina">
<!--div class="dashright"-->
<div class="content1">
<form name="latestnews" method="post" action="" onSubmit="return validate();">
<table width="720" cellpadding="0" cellspacing="0" border="0">
<tr><td colspan="5"><h1 style="color:#003162;">Latest News</h1></td></tr>
<tr>
<td colspan="5">&nbsp;</td>
</tr>
<tr><td colspan="5"><div align="center" id="manoj" style="display:none; background-color:#33CC33;"></div>
</td></tr>
<tr>
<td valign="top"><strong>Latest News</strong><span class="red">*</span></td>
<td >
<input type="text" class="textfiled-M" value="<?=$get_val->NAME;?>" name="news" id="news"  height="30px" />
</td>
</tr>
<tr> 
<td colspan="5">&nbsp;</td></tr>
<tr>
<td valign="top"><strong>News Description</strong><span class="red">*</span></td>

<td><textarea rows="7" cols="70" class="textfiled-M" name="details" id="details" style="max-height:400px; max-width:385px; min-width:385px; min-height:150px;" ><?=$get_val->DESCRIPTION;?></textarea></td></tr>
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
		$insert=mysql_query("insert into news (NAME,DESCRIPTION,CUSER,CDATE) values ('".$_POST['news']."','".$_POST['details']."','".$_SESSION['username']."','".date('Y-m-d')."')");
		if($insert==1)
		{
			print("<script language='javascript'>alert('inserted successfully...'); window.location.href='latest_news.php';</script>");
		}
	}
	else if(isset($_POST['submit']) && $_GET['id']!='')
	{
		$update=mysql_query("update news set NAME='".$_POST['news']."', DESCRIPTION='".$_POST['details']."' where NEWS_ID='".$_GET['id']."'");
		if($update==1)
		{
			print("<script language='javascript'>alert('updated successfully...'); window.location.href='news_list.php';</script>");
		}
	}
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
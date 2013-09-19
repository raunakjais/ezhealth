<?php 
include("config/config.php");
if($_SESSION['username'])
{	
	//$query = "select * from msg where MSG_TO='".$_SESSION['pat_id']."' and MSG_TO_TYPE='P' and TYPE='' and FLAG=0 order by CDATE DESC";
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
	if(document.getElementById('desc').value=='')
	{
		alert('please enter description');
		return false;
	}
}
</script>
</head>
<body class="maina">
<!--div class="dashright"-->
<div class="content1">
<form name="siteadmin" method="post" action="" onSubmit="return validate();">
<table width="720" cellpadding="1" cellspacing="1" border="0" style="margin-left:5px;">
<tr>
	<td colspan="6"><h2 style="color:#003162;">Reply Message</h2></td>
	<td colspan="2"><a href="message_patient.php" target="riframe"><img src='./images/close.png' border="0" title="Close"></a></td>
</tr>
<tr>
	<td colspan="8">&nbsp;</td>
</tr>
<tr><td colspan="8">Description <span class="red">*</span></td></tr>
<tr><td colspan="8"><textarea name="desc" id="desc" rows="3" cols="46"></textarea></td></tr>
<tr><td colspan="8">&nbsp;</td></tr>
<tr><td colspan="8"><input class="but-gray" type="reset" style="margin-right:10px;" name="reset" value="Reset">
<input class="but-blue" type="submit" name="add" value="Submit"></td></tr>
</table>
</form>
</div>
</body>
</html>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		if($_SESSION['user_type']=='P')
		{
			$TXT_BY=$_SESSION['pat_id'];
		}
		if($_SESSION['user_type']=='D')
		{
			$TXT_BY=$_SESSION['doc_id'];
		}
		if($_SESSION['user_type']=='R')
		{
			$TXT_BY=$_SESSION['recp_id'];
		}
		if($_SESSION['user_type']=='B')
		{
			$TXT_BY=$_SESSION['buss_id'];
		}
		$insert_chat=mysql_query("insert into chat_details (CHAT_ID,CHAT_BY,TXT_BY,CHAT_DETAILS,CDATE) values ('".$_REQUEST['chat_id']."','".$_SESSION['user_type']."','".$TXT_BY."','".$_REQUEST['desc']."','".date('Y-m-d')."') ");
		if($insert_chat==1)
		{
			print("<script language='javascript'>alert('Request Completed...');window.parent.location.href='message_patient.php';</script>");
		}
		else
		{
			print("<script language='javascript'>alert('Request Incompleted...');</script>");
		}
	}
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
		 
		 
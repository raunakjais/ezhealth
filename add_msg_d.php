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
	if(document.getElementById('patient').value=='')
	{
		alert('please select patient');
		return false;
	}
	else if(document.getElementById('subject').value=='')
	{
		alert('please enter subject');
		return false;
	}
	else if(document.getElementById('desc').value=='')
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
<table width="720" cellpadding="1" cellspacing="1" border="0">
<tr><td colspan="8"><h2 style="color:#003162;">Add Message</h2></td></tr>
<tr>
	<td colspan="8">&nbsp;</td>
</tr>
<tr>
	<td colspan="8">Message To <span class="red">*</span></td>
</tr>
<tr>
	<td colspan="8"><select name="patient" id="patient" class="drop2" required="required">
		<option value="" SELECTED>Select patient</option>
		<?php $pat_list=mysql_query("SELECT distinct(PATIENT_ID) FROM booking where DOCTOR_ID='".$_SESSION['doc_id']."'");
		while($val=mysql_fetch_object($pat_list))
		{
			$pat_name=mysql_fetch_object(mysql_query("select PATIENT_FIRST_NAME,PATIENT_LAST_NAME from patientregister where PATIENT_ID='".$val->PATIENT_ID."'"));
		 ?>
		<option value="<?=$val->PATIENT_ID?>" ><?=$pat_name->PATIENT_FIRST_NAME.' '.$pat_name->PATIENT_LAST_NAME?></option>
		<? } ?>
	</select> 
	</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>   
<tr><td colspan="8">Subject <span class="red">*</span></td></tr>
<tr><td colspan="8"><input type="text" name="subject" id="subject" class="textfiled-M" /></td></tr>
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
		$insert_query=mysql_query("insert into chat (SUBJECT,FROM_ID,FROM_TYPE,TO_ID,TO_TYPE,CUSER,CDATE) values ('".$_REQUEST['subject']."','".$_SESSION['doc_id']."','".$_SESSION['user_type']."','".$_REQUEST['patient']."','P','".$_SESSION['username']."','".date('Y-m-d')."')");
		$chat_id=mysql_insert_id();
		if($insert_query==1)
		{
			$insert_chat=mysql_query("insert into chat_details (CHAT_ID,CHAT_BY,TXT_BY,CHAT_DETAILS,CDATE) values ('".$chat_id."','".$_SESSION['user_type']."','".$_SESSION['doc_id']."','".$_REQUEST['desc']."','".date('Y-m-d')."') ");
			if($insert_chat==1)
			{
				print("<script language='javascript'>alert('Request Completed...');window.location.href='message_patient.php';</script>");
			}
			else
			{
				print("<script language='javascript'>alert('Request Incompleted...');</script>");
			}
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
		 
		 
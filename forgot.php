<?php
include('ezEMail.php');
include("config/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ezpointment</title>
<link href="styles/css.css" rel="stylesheet" type="text/css" />
<link href="styles/style1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript "src="js/jquery_min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/fancybox.css" />
<script type="text/javascript" language="javascript"  src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript"  src="js/jquery-code.js"></script>
<script type="text/javascript" language="javascript"  src="js/facy-mainjquery.js"></script>
<script type="text/javascript" language="javascript"  src="js/jquery.fancybox.js"></script>
<script type="text/javascript">
function validatesignuppage()
{
	if(document.getElementById('email').value=='' && document.getElementById('username').value=='')
	{
		alert('Please enter atleast one criteria');
		document.getElementById('email').focus();
		return false;
	}
} 
</script>
<style type="text/css">
#display_results{
overflow:auto;
width: 400px;
margin-top:80px;
margin-left:555px;
position: absolute;
z-index: 54000;
}
</style>
</head>
<body bgcolor="#dcdcdc">
<div class="main">
<?php include('header1.php'); ?>

<div class="aboutmidL">
<form name="signup" method="post" action="" onSubmit="return validatesignuppage();">
<br />
<table width="720" cellpadding="0" cellspacing="0" border="0"> 
			<tr>
            <td colspan="3"><h2 style="color:#003162;">Forgot Your Password?</h2></td>
          </tr>         
		  <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
		  <tr>
            <td width="211"><strong>Enter your email</strong> </td>
			<td width="37">:</td>
			<td width="1072"><input type="text" class="textfild-S" size="50" name="email" id="email" value="" maxlength="50" placeholder="email"/></td>
          </tr>
		  <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">OR</td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
		  <tr>
            <td><strong>Enter your Username</strong></td>
			<td>:</td>
			<td><input type="text" class="textfild-S" size="50" name="username" id="username" value="" maxlength="50" placeholder="Username"/> </td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
         <tr>
            <td>&nbsp;</td>
			<td>&nbsp;</td>
			<td style="padding-left:80px;"><input class="send_pass" type="submit" name="submit" value=""></td>
        </tr>
        </table>
</form>		
</div>
<div class="clear"></div>
<?php include('footer.php'); ?>
<div class="clear"></div>
</div>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{	
	function convert($str,$ky=''){ 
	if($ky=='')return $str; 
	$ky=str_replace(chr(32),'',$ky); 
	if(strlen($ky)<8)exit('key error'); 
	$kl=strlen($ky)<32?strlen($ky):32; 
	$k=array();for($i=0;$i<$kl;$i++){ 
	$k[$i]=ord($ky{$i})&0x1F;} 
	$j=0;for($i=0;$i<strlen($str);$i++){ 
	$e=ord($str{$i}); 
	$str{$i}=$e&0xE0?chr($e^$k[$j]):chr($e); 
	$j++;$j=$j==$kl?0:$j;} 
	return $str; 
	}
	
	$condition="";
	if($_REQUEST['email']!='')
	{
		$condition = $condition. "USER_EMAIL = '".$_REQUEST['email']."' and ";
	}
	if($_REQUEST['username']!='')
	{
		$condition = $condition. "USERNAME = '".$_REQUEST['username']."' and ";
	}
	$count=mysql_num_rows(mysql_query("select * from login where ".$condition." USER_FLAG=0 "));
	$query = mysql_query("select * from login where ".$condition." USER_FLAG=0 ");
	$val=mysql_fetch_object($query);
	$key='0123456789';
	$pwd=mysql_real_escape_string(convert($val->USER_PASSWORD,$key));
	if($count>=1)
	{
		$email = $val->USER_EMAIL;
		$usr_name = $val->USERNAME;
		//$pwd = $val->USER_PASSWORD;
		$to = $email;
		$from = $from; 
		$subject = "Password Recovery";
		$body = "Dear ".$email.", your username : ".$usr_name." and password : ".$pwd." . ";
		$result = ezEMail::sendSMTPMessage($to, $from, "support", $subject,$body);
		
		/*$headers  = "From: $from"."\r\n"; 
		$headers .= "Content-type: text/html\r\n"; 
		$mm = mail($to, $subject, $message, $headers);		*/
		if($result==1)
		{
			print("<script language='javascript'> alert('your password sent to your email id'); window.location.href='index.php';</script>");
		}
		else
		{
			print("<script language='javascript'> alert('request Incompleted, try again..'); window.location.href='forgot.php';</script>");
		}
	}
	else 
	{
		print("<script language='javascript'> alert('Username or email not found in database...');</script>");
	}
} 
?>
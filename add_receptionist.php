<?php
include('ezEMail.php');
include("config/config.php");
include("config/function.php");
if($_SESSION['username'])
{
	$get_bid=mysql_fetch_object(mysql_query("select USER_UN_ID from login where USER_TYPE='".$_SESSION['user_type']."' and USERNAME='".$_SESSION['username']."' and USER_FLAG=0"));
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
<script type="text/javascript">
function validate()
{	
	var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
	if(document.getElementById('fname').value=='')
	{
		alert('Please enter your first name');
		document.getElementById('fname').focus();
		return false;
	}
	else if(document.getElementById('lname').value=='')
	{
		alert('Please enter your last name');
		document.getElementById('lname').focus();
		return false;
	}
	else if(document.getElementById('mobile').value=='')
	{
		alert('Please enter your mobile number');
		document.getElementById('mobile').focus();
		return false;
	}
	else if(!document.getElementById('email').value.match(re) || document.getElementById('email').value=="")
	{
		alert('Please enter your valid email address');
		document.getElementById('email').focus();
		return false;
	}
	else if(document.getElementById('username').value=='' || document.getElementById('username').value.length<6)
	{
		alert('The username should be minimum of 6 character');
		document.getElementById('username').focus();
		return false;
	}
	else if(document.getElementById('pwd').value=='' || document.getElementById('pwd').value.length<6)
	{
		alert('The password should be minimum of 6 character');
		document.getElementById('pwd').focus();
		return false;
	}
	else if(!document.getElementById('check1').checked)
	{
		alert('Please accept the terms & conditions');
		return false;
	}
}
</script>
</head>
<body>
<div class="maina">
<div class="midcontainer1">
			
<div class="doctor_M">
<form name="signup" method="post" action="" onSubmit="return validate();">
<table width="700" cellpadding="0" cellspacing="0" border="0"> 
			<tr>
				<td colspan="3"><h2 style="color:#003162;">Add Receptionist</h2></td>
			</tr>
		  <tr>
            <td colspan="3">&nbsp;</td>
          </tr>        
		  <tr>
			<td>First Name <span class="red">*</span></td>
			<td>Middle Name</td>
			<td>Last Name <span class="red">*</span></td>
		  </tr>
		  <tr>
			<td><input type="text" size="25" name="fname" value="" id = "fname"  maxlength="80" class="textfild-S"/>			
			</td>
			<td><input type="text" size="25" name="mname" value="" id = "mname" class="textfild-S" maxlength="80" /></td>
			<td><input type="text" size="25" name="lname" value="" id = "lname" class="textfild-S" maxlength="80" /></td>
		  </tr>
		  <tr>
			<td colspan="3">&nbsp;</td>
		  </tr>  
          <tr>
            <td colspan="3">Mobile <span class="red">*</span></td>
          </tr>
          <tr>
            <td colspan="3" valign="top"><input	 type="text" size="25" class="textfiled-M" name="mobile" value="" id = "mobile"  maxlength="10" /></td>            
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">E-mail ID <span class="red">*</span></td>
          </tr>
          <tr>
            <td colspan="3"><input type="text" class="textfiled-M" size="25" autocomplete="off" name="email" value="" id="email" onkeyup="getFile1(this.value,'div_file5');" maxlength="100" /><div id="div_file5"></div></td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
		  <tr>
            <td colspan="3">User Name <span class="red">*</span></td>
          </tr>
          <tr>
            <td colspan="3"><input type="text" size="25" class="textfiled-M" name="username" autocomplete="off" onkeyup="getFile1(this.value,'div_file6')";value="" id = "username"  maxlength="100" 
			onBlur="checkUName();" /><div id="div_file6"></div>
			<br><div id="un"></div><br>User name must be atleast 6 character long.</td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">Password <span class="red">*</span></td>
          </tr>
          <tr>
            <td colspan="3"><input type="password" size="25" name="pwd" value="" id = "pwd" class="textfiled-M"  maxlength="30" /><br><br>Password atleast 6 character long.</td>            
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
         <tr>
            <td ><input type="checkbox" name="check1" id="check1"/>
            I agree to <a href="#" class="simpleLink-s" style="float:none;">terms & conditions</a></td>
           <td colspan="2" >
				<input class="but-gray" type="reset" style="margin-right:10px;" name="reset" value="Reset">
				<input class="but-blue" type="submit" name="submit" value="Submit">
		    </td>
          </tr>
        </table>
</form>
     
</div>								
</div>
</div>  
</body>
</html>
<?php
	if(($_POST['submit'])=='Submit')
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
		
		$key='0123456789';
		$encrypt_pwd=mysql_real_escape_string(convert($_POST['pwd'],$key));
		$crs_chk_email=mysql_num_rows(mysql_query("select USER_EMAIL from login where USER_EMAIL='".$_POST['email']."'"));
		if($crs_chk_email=='1')
		{
			print("<script language='javascript'>alert('Email already taken...');</script>");
			exit;
		}
		$insert_query=mysql_query("insert into receptionist_register (RECEPTIONIST_FIRST_NAME,RECEPTIONIST_MIDDLE_NAME,RECEPTIONIST_LAST_NAME,RECEPTIONIST_MOBILE_NUMBER,RECEPTIONIST_EMAIL,RECEPTIONIST_USERNAME,RECEPTIONIST_PASSWORD,RECEPTIONIST_IDENTITY,RECEPTIONIST_RECORD_DATE) values('".$_POST['fname']."','".$_POST['mname']."','".$_POST['lname']."','".$_POST['mobile']."','".$_POST['email']."','".$_POST['username']."','".$_POST['pwd']."','".$get_bid->USER_UN_ID."','".date('Y-m-d')."')");
		$user_un_id=mysql_insert_id();
		if($insert_query==1)
		{
			$insert_login=mysql_query("insert into login (USER_UN_ID,USER_TYPE,USERNAME,USER_EMAIL,USER_PASSWORD,USER_FLAG)values('".$user_un_id."','R','".$_POST['username']."','".$_POST['email']."','".$encrypt_pwd."','0')");
			if($insert_login==1)
			{
				$to = $_POST['email'];
				$from = $from; 
				$subject = "Welcome to ezpointment";
				$body = "Dear ".$_POST['fname'].",\n Welcome to Ezpointment ! Please login with '".$_POST['username']."' and password '".$_POST['pwd']."' . ";
				$result = ezEMail::sendSMTPMessage($to, $from, "support", $subject,$body);
				/*$headers  = "From: $from"."\r\n"; 
				$headers .= "Content-type: text/html\r\n"; 
				$mm = mail($to, $subject, $message, $headers);*/
				print("<script language='javascript'>alert('Receptionist added successfully'); window.location.href='add_receptionist.php';</script>");
			}	
		}	
			
	}	
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
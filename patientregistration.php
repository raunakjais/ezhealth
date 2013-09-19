<?php
include("config/config.php");
include("config/function.php");
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
<script type="text/javascript">
function validatesignuppage()
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
	else if(document.getElementById('mobilenumber').value=='' || document.getElementById('mobilenumber').value.length<10)
	{
		alert('Please enter your mobile number');
		document.getElementById('mobilenumber').focus();
		return false;
	}
	else if(document.getElementById('mobilenumber').value=='0000000000')
	{
		alert('Mobile number not valid');
		document.getElementById('mobilenumber').focus();
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
	else if(document.getElementById('pwd').value!=document.getElementById('cnf_pwd').value)
	{
		alert('Password & Confirm password not same');
		document.getElementById('cnf_pwd').focus();
		return false;
	}
	else if(document.getElementById('email_avail').value==1)
	{
		alert('email already used');
		document.getElementById('email').focus();
		return false;
	}
	else if(document.getElementById('user_available').value==1)
	{
		alert('username already used');
		document.getElementById('username').focus();
		return false;
	}
	else if(document.getElementById('captcha-form').value=='')
	{
		alert('please enter captcha code');
		document.getElementById('captcha-form').focus();
		return false;
	}
	else if(!document.getElementById('check1').checked)
	{
		alert('Please accept the terms & conditions');
		return false;
	}
}
function isNumberKey(evt)
      {
        var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
</script>
	
<style type="text/css">
#display_results{
height: 90px;
width: 400px;
margin-top:110px;
margin-left:555px;
position: absolute;
z-index: 54000;
}
</style>

</head>



<body bgcolor="#dcdcdc">

<div class="main">
<?php include('header.php'); ?>
<div class="midcontainer">
			
<div class="registrationform">
<form name="signup" method="post" action="" onSubmit="return validatesignuppage();">
<table width="720" cellpadding="0" cellspacing="0" border="0"> 
			<tr>
            <td colspan="3"><h2 style="color:#003162;">Patient Registration</h2></td>
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
            <td><input type="text" size="25" name="fname" id="fname"  maxlength="80" class="textfild-S" value="<?=$_POST['fname']?>" />
			</td>
            <td><input type="text" size="25" name="mname" id="mname" class="textfild-S" maxlength="80" value="<?=$_POST['mname']?>" /></td>
            <td><input type="text" size="25" name="lname" id="lname" class="textfild-S" maxlength="80" value="<?=$_POST['lname']?>" /></td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">Mobile <span class="red">*</span></td>
          </tr>
          <tr>
            <td colspan="2"><input	 type="text" size="25" class="textfiled-M" name="mobilenumber" value="<?=$_POST['mobilenumber']?>" id="mobilenumber"  maxlength="10" onkeypress="return isNumberKey(event)" /></td>
		
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">E-mail ID <span class="red">*</span></td>
          </tr>
          <tr>
            <td colspan="3"><input type="email" class="textfiled-M" size="25" name="email" onkeyup="getFile1(this.value,'div_file5');" onblur="getFile1(this.value,'div_file5');" autocomplete="off" value="<?=$_POST['email']?>" id="email"  maxlength="100" /><div id="div_file5"></div></td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
		  <tr>
            <td colspan="3">User Name <span class="red">*</span></td>
          </tr>
          <tr>
            <td colspan="2"><input type="text" size="25" class="textfiled-M" autocomplete="off" name="username" onkeyup="getFile1(this.value,'div_file6');" value="" id = "username"  maxlength="100"  />
			<div id="div_file6"></div></td>
			
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">Password <span class="red">*</span></td>
          </tr>
          <tr>
            <td colspan="3"><input type="password" size="25" name="pwd" value=""  id="pwd" class="textfiled-M"  maxlength="30" /></td>
          </tr>
		  <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">Confirm Password <span class="red">*</span></td>
          </tr>
          <tr>
            <td colspan="3"><input type="password" size="25" name="cnf_pwd" value="" id="cnf_pwd" class="textfiled-M"  maxlength="30" /></td>
          </tr>
          <tr>
            <td colspan="3"> &nbsp;   
<p><strong>Write the following word:</strong></p>

<form method="GET">

<img src="captcha.php" id="captcha" /><br/>


<!-- CHANGE TEXT LINK -->
<a href="#" onclick="
    document.getElementById('captcha').src='captcha.php?'+Math.random();
    document.getElementById('captcha-form').focus();"
    id="change-image">Refresh Captcha</a><br/><br/>


<input type="text" name="captcha" id="captcha-form" autocomplete="off" class="textfiled-M" placeholder="Enter Captcha code" /><br/>



<br /><br />


</td>
          </tr>
         <tr>
            <td><input type="checkbox" name="check1" id="check1" value="1" />
              I agree to <a href="#" class="simpleLink-s" style="float:none;">terms & conditions</a></td>
           <td align="right" style="float:right; margin-right:20px; margin-top:0;">
<input class="but-gray" type="reset" style="margin-right:10px;" name="reset" value="Reset">
<input class="but-blue" type="submit" name="add" value="Submit">

 </td>
              <td>&nbsp;</td>
          </tr>
        </table>
</form>	
</form>							
</div>
<div class="findM">
</div>
<div class="clear"></div>
<div class="clear"></div>
<div class="seprator"></div>
<?php include('footer.php'); ?>
<div class="clear"></div>
</div>
		  
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=="POST" && $_REQUEST['fname']!='')
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
	if (!empty($_REQUEST['captcha'])) 
	{
		if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) 
		{
			print("<script language='javascript'>alert('invalid captcha');</script>");
			exit;
		} 
	}
	
	$name=$_POST['fname'].' '.$_POST['lname'];
	$crs_chk_email=mysql_num_rows(mysql_query("select USER_EMAIL from login where USER_EMAIL='".$_POST['email']."'"));
	if($crs_chk_email=='1')
	{
		print("<script language='javascript'>alert('Email already taken...');</script>");
		exit;
	}
	$insert_query = mysql_query("insert into patientregister_temp(PATIENT_FIRST_NAME,PATIENT_MIDDLE_NAME,PATIENT_LAST_NAME,PATIENT_MOBILE_NUMBER,PATIENT_EMAIL,PATIENT_USERNAME,PATIENT_PASSWORD,PATIENT_DATE,PATIENT_FLAG) values ('".$_POST['fname']."','".$_POST['mname']."','".$_POST['lname']."','".$_POST['mobilenumber']."','".$_POST['email']."','".$_POST['username']."','".$_POST['pwd']."','".date('y-m-d')."','0')");
	//exit;
	$user_un_id=mysql_insert_id();
	if($insert_query==1)
	{
		$insert_login=mysql_query("insert into login_temp (USER_UN_ID,USER_TYPE,USERNAME,USER_EMAIL,USER_PASSWORD,USER_FLAG) values('".$user_un_id."','P','".$_POST['username']."','".$_POST['email']."','".$encrypt_pwd."','0')");	
		if($insert_login==1)
		{	
			$rand=rand(1, 1000000); 
			$insert_code = mysql_query("insert into user_registration_code (USER_REG_CODE_USERNAME,USER_REG_CODE_EMAIL,USER_REG_RANDOM_CODE) values ('".$_POST['username']."','".$_POST['email']."','".$rand."')");
			$reg_code_id=mysql_insert_id();	
			
			$_SESSION['username']=$_POST['username'];
			$_SESSION['randomnumber']=$rand;
			$_SESSION['email']=$_POST['email'];
			$_SESSION['mobilenumber']=$_POST['mobilenumber'];
			$_SESSION['name']=$name;
			$_SESSION['reg_code_id']=$reg_code_id;
			$_SESSION['user_type']='P';
				
			if($insert_code==1)
			{
				print("<script language='javascript'>window.location.href='RegisterSubmit.php';</script>");
			}	
		}
	}	
	else
	{
		print("<script language='javascript'>alert('Email or Username already taken...');</script>");
	}
}
?>
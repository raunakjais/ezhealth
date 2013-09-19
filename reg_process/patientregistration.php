<?php
include("config/config.php");
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
            <td colspan="3"><input type="email" class="textfiled-M" size="25" name="email" onkeyup="getFile1(this.value,'div_file5');" onblur="getFile1(this.value,'div_file5');" autocomplete="off" svalue="" id="email"  maxlength="100" /><div id="div_file5"></div></td>
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
            <td colspan="2"><input type="password" size="25" name="pwd"  value=""  id = "pwd" class="textfiled-M"  maxlength="30" /></td>
			        
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
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
if($_SERVER['REQUEST_METHOD']=="POST")
{	
//print 'manoj';
//print_r($_SERVER);
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
		$insert_login=mysql_query("insert into login_temp (USER_UN_ID,USER_TYPE,USERNAME,USER_EMAIL,USER_PASSWORD,USER_FLAG) values('".$user_un_id."','P','".$_POST['username']."','".$_POST['email']."','".$_POST['pwd']."','0')");	
		if($insert_login==1)
		{	
			$rand=rand(1, 1000000); 
			$insert_code = mysql_query("insert into user_registration_code (USER_REG_CODE_USERNAME,USER_REG_CODE_EMAIL,USER_REG_RANDOM_CODE) values ('".$_POST['username']."','".$_POST['email']."','".$rand."')");	
			
			$_SESSION['username']=$_POST['username'];
			$_SESSION['randomnumber']=$rand;
			$_SESSION['email']=$_POST['email'];
			$_SESSION['mobilenumber']=$_POST['mobilenumber'];
			$_SESSION['name']=$name;
			//$pname = $_POST['fname'].' '.$_POST['lname'];
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,"http://myvaluefirst.com/smpp/sendsms?");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,
						"username=ezpointment&password=ezpoint1&to=".$_POST['mobilenumber']."&from=EZAPPT&udh=0&text= Dear ".$name.", Welcome to Ezpointment ! Please enter this code ".$rand." to complete your online registration. &dlr-mask=19&dlr-url");
			
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$server_output = curl_exec ($ch);
			curl_close ($ch);
			//echo $server_output;exit;
				if($server_output=='Sent.')
				{
					$to = $_POST['email'];
					$from = $from; 
					$subject = "ezpointment Registration Code";
					$message = "Dear ".$name.", Welcome to Ezpointment ! Please enter this code ".$rand." to complete your online registration. ";
					
					$headers  = "From: $from"."\r\n"; 
    				$headers .= "Content-type: text/html\r\n"; 
    				$mm = mail($to, $subject, $message, $headers);
				}
				/*if($mm==1)
				{*/
					print("<script language='javascript'>window.location.href='RegisterSubmit.php';</script>");
				//}	
		}
	}	
	else
	{
		print("<script language='javascript'>alert('Email or Username already taken...');</script>");
	}
}
?>
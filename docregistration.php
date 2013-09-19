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
<script type="text/javascript" src="getFile1.js"></script>
<script type="text/javascript" src="getstate.js"></script>
<script language="javaScript">
function showLoc()
{
	var x = document.getElementById('userType').value;
	if (x=='BUSINESS')
	{
		document.getElementById('loc').style.display = "block";
		document.getElementById('loc').style.visibility = "visible";
		document.getElementById('name').style.display = "none";
		document.getElementById('name').style.visibility = "hidden";
		
		document.getElementById('common').style.display = "block";
		document.getElementById('common').style.visibility = "visible";
	}
	else if(x=='DOCTOR')
	{
		document.getElementById('loc').style.display = "none";
		document.getElementById('loc').style.visibility = "hidden";
		document.getElementById('name').style.display = "block";
		document.getElementById('name').style.visibility = "visible";
		
		document.getElementById('common').style.display = "block";
		document.getElementById('common').style.visibility = "visible";
	}
}
</script>
<script type="text/javascript">
function validatesignuppage()
{	
	if(document.getElementById('userType').value=='DOCTOR')
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
		else if(document.getElementById('mobile').value=='' || document.getElementById('mobile').value.length<10)
		{
			alert('Please enter your mobile number');
			document.getElementById('mobile').focus();
			return false;
		}
		else if(document.getElementById('mobile').value=='0000000000')
		{
			alert('Mobile number not valid');
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
		else if(document.getElementById('pwd').value!=document.getElementById('cnf_pwd').value)
		{
			alert('Password & Confirm password not same');
			document.getElementById('cnf_pwd').focus();
			return false;
		}
		else if(document.getElementById('captcha-form').value=='')
		{
			alert('please enter captcha code');
			document.getElementById('captcha-form').focus();
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
		if(!document.getElementById('check1').checked)
		{
			alert('Please accept the terms & conditions');
			return false;
		}
	}
	else
	{
		var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
		if(document.getElementById('locName').value=='')
		{
			alert('Please enter your location name');
			document.getElementById('locName').focus();
			return false;
		}
		else if(document.getElementById('locType').value=='')
		{
			alert('Please select your location type');
			document.getElementById('locType').focus();
			return false;
		}
		else if(document.getElementById('branch').value=='')
		{
			alert('Please enter your branch');
			document.getElementById('branch').focus();
			return false;
		}  
		else if(document.getElementById('phoneNo').value=='')
		{
			alert('Please enter your phone no');
			document.getElementById('phoneNo').focus();
			return false;
		}
		else if(document.getElementById('address1').value=='')
		{
			alert('Please enter your address1');
			document.getElementById('address1').focus();
			return false;
		}
		/*else if(document.getElementById('address2').value=='')
		{
			alert('Please enter your address2');
			document.getElementById('address2').focus();
			return false;
		}*/
		else if(document.getElementById('country1').value=='')
		{
			alert('Please select your country');
			document.getElementById('country1').focus();
			return false;
		}
		else if(document.getElementById('cmbState').value=='')
		{
			alert('Please select your state');
			document.getElementById('cmbState').focus();
			return false;
		}
		else if(document.getElementById('cmbCity').value=='')
		{
			alert('Please select your city');
			document.getElementById('cmbCity').focus();
			return false;
		}
		else if(document.getElementById('cmbArea').value=='')
		{
			alert('Please select your area');
			document.getElementById('cmbArea').focus();
			return false;
		}
		else if(document.getElementById('zipcode').value=='')
		{
			alert('Please enter your zipcode');
			document.getElementById('zipcode').focus();
			return false;
		}
		else if(document.getElementById('establish').value=='')
		{
			alert('Please enter year of establishment');
			document.getElementById('establish').focus();
			return false;
		}
		else if(document.getElementById('mobile').value=='' || document.getElementById('mobile').value.length<10)
		{
			alert('Please enter your mobile number');
			document.getElementById('mobile').focus();
			return false;
		}
		else if(document.getElementById('mobile').value=='0000000000')
		{
			alert('Mobile number not valid');
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
		else if(document.getElementById('pwd').value!=document.getElementById('cnf_pwd').value)
		{
			alert('Password & Confirm password not same');
			document.getElementById('cnf_pwd').focus();
			return false;
		}
		else if(document.getElementById('captcha-form').value=='')
		{
			alert('please enter captcha code');
			document.getElementById('captcha-form').focus();
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
		if(!document.getElementById('check1').checked)
		{
			alert('Please accept the terms & conditions');
			return false;
		}
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

<body bgcolor="#dcdcdc" onload="showLoc();">
<div class="main">
<?php include('header.php'); ?>
<div class="midcontainer">
			
<div class="registrationform">
<form name="signup" method="post" action="" onSubmit="return validatesignuppage();">
<table width="720" cellpadding="0" cellspacing="0" border="0"> 
			<tr>
            <td colspan="3"><h2 style="color:#003162;">Doctor/Business Registration</h2></td>
          </tr> 
		  <tr>
            <td colspan="3">&nbsp;</td>
          </tr>        
          <tr>
            <td colspan="3">Register As</td>
          </tr>
          <tr>
            <td colspan="2"><select name="userType" id="userType" onChange="showLoc();" class="drop2" required="required">
				<option value="" SELECTED>select type to continue registration</option>
				<option value="DOCTOR" <?php if($_REQUEST['userType']=='DOCTOR') { print 'selected'; } ?>>Doctor</option>
				<option value="BUSINESS" <?php if($_REQUEST['userType']=='BUSINESS') { print 'selected'; } ?>>Business</option>
            </select> 
			</td>
			<td width="445" style="padding:13px;">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
		  </table>
		  
		  <div id="name" style="display:none;">
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
				  <tr>
					<td>First Name <span class="red">*</span></td>
					<td>Middle Name</td>
					<td>Last Name <span class="red">*</span></td>
				  </tr>
				  <tr>
					<td><input type="text" size="25" name="fname" value="<?=$_REQUEST['fname']?>" id="fname"  maxlength="80" class="textfild-S"/>			
					</td>
					<td><input type="text" size="25" name="mname" value="<?=$_REQUEST['mname']?>" id="mname" class="textfild-S" maxlength="80" /></td>
					<td><input type="text" size="25" name="lname" value="<?=$_REQUEST['lname']?>" id="lname" class="textfild-S" maxlength="80" /></td>
				  </tr>
				  <tr>
					<td colspan="3">&nbsp;</td>
				  </tr>
	          </table>
			</div> 
		 
		  
		    
			<div id="loc" style="display:none;">		
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
				<tr>
				  <td colspan="3">Registered As <span class="red">*</span>
					</td>
				</tr>
				<tr>
				  <td colspan="3"><input type="text" size="30" name="locName" value="<?=$_REQUEST['locName']?>" id ="locName"  maxlength="100" class="textfiled-M" /></td>
				</tr>
				<tr>
				  <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="3">Business Type <span class="red">*</span></td>
				</tr>
				<tr>
				  <td colspan="3">
				  <select name="locType" id="locType" class="drop1" style="width:336px;">
					<option value="">Select</option>
					<option vlue="Clinic" <?php if($_REQUEST['locType']=='Clinic') { print 'selected'; }?>>Clinic</option>
					<option value="Hospital" <?php if($_REQUEST['locType']=='Hospital') { print 'selected'; }?>>Hospital</option>
					<option value="Laboratory" <?php if($_REQUEST['locType']=='Laboratory') { print 'selected'; }?>>Laboratory</option>
				</select>			  </td>
				</tr>
				<tr>
				  <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="3">Branch <span class="red">*</span></td>
				</tr>
				<tr>
				  <td colspan="3"><input type="text" size="30" name="branch" value="<?=$_REQUEST['branch']?>" id = "branch"  maxlength="100" class="textfiled-M" /> </td>
				</tr>
				<tr>
				  <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="3">Phone No. <span class="red">*</span></td>
				</tr>
				<tr>
				  <td colspan="3"><input type="text" size="50" name="phoneNo" value="<?=$_REQUEST['phoneNo']?>" id="phoneNo"  maxlength="100" class="textfiled-M" /> </td>
				</tr>
				<tr>
				  <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="3">Address1 <span class="red">*</span></td>
				</tr>
				<tr>
				  <td colspan="3"><input type="text" class="textfiled-M" size="50" name="address1" value="<?=$_REQUEST['address1']?>" id="address1"  maxlength="100" /></td>
				</tr>
				<tr>
				  <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="3">Address2 </td>
				</tr>
				<tr>
				  <td colspan="3"><input type="text" size="50" name="address2" value="<?=$_REQUEST['address2']?>" id="address2"  maxlength="100" class="textfiled-M" /> </td>
				</tr>
				<tr>
				  <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="3">Country <span class="red">*</span></td>
				</tr>
				<tr>
				  <td colspan="3">
					<select name="country1" id="country1" onChange="showUser1(this.value,'state_list');" class="drop3">
				<option value="">Select Country</option>
					<?php 
					$sel_query=mysql_query("select * from country_table");
					while($row1=mysql_fetch_object($sel_query)) { 
					?>
					<option value="<?php print $row1->COUNTRY_ID; ?>"<?php if($_REQUEST['country1']==$row1->COUNTRY_ID) { ?> selected="selected" <?php } ?>><?php print $row1->COUNTRY_NAME; ?></option>
					<?php } ?>
				</select></td>
				</tr>
				<tr>
				  <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="3">State <span class="red">*</span></td>
				</tr>
				<tr>
				  <td colspan="3">
					<div id="state_list"><select name="cmbState" id="cmbState" onChange="showUser1(this.value,'city_list');" class="drop3">
				<option value="5">Select</option>
			<?php 
					$sel_query=mysql_query("select * from state_table");
					while($row2=mysql_fetch_object($sel_query)) { 
					?>
					<option value="<?php print $row2->STATE_ID; ?>" <?php if($_REQUEST['cmbState']==$row2->STATE_ID) { ?> selected="selected" <?php } ?>><?php print $row2->STATE_NAME; ?></option>
					<?php } ?>
			</select></div>
					</td>
				</tr>	
				<tr>
				  <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="3">City <span class="red">*</span></td>
				</tr>
				<tr>
				  <td colspan="3">
					<div id="city_list"><select name="cmbCity" id="cmbCity" onChange="showUser1(this.value,'area_list');" class="drop3">
				<option value="">Select</option>
				<?php 
					$sel_query=mysql_query("select * from city_table");
					while($row3=mysql_fetch_object($sel_query)) { 
					?>
					<option value="<?php print $row3->CITY_ID; ?>" <?php if($_REQUEST['cmbCity']==$row3->CITY_ID) { ?> selected="selected" <?php } ?>><?php print $row3->CITY_NAME; ?></option>
					<?php } ?>				
				</select></div></td>
				</tr>
				<tr>
				  <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="3">Area <span class="red">*</span></td>
				</tr>
				<tr>
				  <td colspan="3">
					<div id="area_list"><select name="cmbArea" id="cmbArea" class="drop3">
					<option value="">Select</option>	
					<?php 
					$sel_query=mysql_query("select * from area_table");
					while($row4=mysql_fetch_object($sel_query)) { 
					?>
					<option value="<?php print $row4->AREA_ID; ?>" <?php if($_REQUEST['cmbArea']==$row4->AREA_ID) { ?> selected="selected" <?php } ?>><?php print $row4->AREA_NAME; ?></option>
					<?php } ?>				
				</select></div></td>
				</tr>
				<tr>
				  <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="3">Zipcode <span class="red">*</span></td>
				</tr>
				<tr>
				  <td colspan="3"><input type="text" size="20" name="zipcode" value="<?=$_REQUEST['zipcode']?>" id="zipcode"  maxlength="6" class="textfiled-M" onkeypress="return isNumberKey(event)" /></td>
				</tr>            
				<tr>
				  <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="3">Year of Establishment <span class="red">*</span></td>
				</tr>
				<tr>
				  <td colspan="3"><input type="text" size="20" name="establish" value="<?=$_REQUEST['establish']?>" id="establish" onkeypress="return isNumberKey(event)"  maxlength="4" class="textfiled-M" /></td>
				</tr> 
				<tr>
				  <td colspan="3">&nbsp;</td>
				</tr> 
          </table>
       </div>   
		  
		  
		  
	
		  <div id="common" style="display:none;">		
			<table width="100%" cellpadding="0" cellspacing="0" border="0">  
          <tr>
            <td colspan="3">Mobile <span class="red">*</span></td>
          </tr>
          <tr>
            <td colspan="3" valign="top"><input	 type="text" size="25" class="textfiled-M" name="mobile" value="<?=$_REQUEST['mobile']?>" id="mobile"  maxlength="10" onkeypress="return isNumberKey(event)" /></td>            
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">E-mail ID <span class="red">*</span></td>
          </tr>
          <tr>
            <td colspan="3"><input type="text" class="textfiled-M" size="25" autocomplete="off" name="email" value="<?=$_REQUEST['email']?>" id="email" onkeyup="getFile1(this.value,'div_file5');" maxlength="100" /><div id="div_file5"></div></td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
		  <tr>
            <td colspan="3">User Name <span class="red">*</span></td>
          </tr>
          <tr>
            <td colspan="3"><input type="text" size="25" class="textfiled-M" name="username" autocomplete="off" onkeyup="getFile1(this.value,'div_file6');" value="<?=$_REQUEST['username']?>" id = "username"  maxlength="100" onBlur="checkUName();" /><div id="div_file6"></div>
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
            <td colspan="3">Confirm Password <span class="red">*</span></td>
          </tr>
          <tr>
            <td colspan="3"><input type="password" size="25" name="cnf_pwd" value="" id="cnf_pwd" class="textfiled-M"  maxlength="30" /></td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;
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
            <td ><input type="checkbox" name="check1" id="check1"/>
            I agree to <a href="#" class="simpleLink-s" style="float:none;">terms & conditions</a></td>
           <td colspan="2" >
				<input class="but-gray" type="reset" style="margin-right:10px;" name="reset" value="Reset">
				<input class="but-blue" type="submit" name="submit" value="Submit">
		    </td>
          </tr>
        </table>
		</div>
</form>
 <div class="clear"></div>
		  </div>
									
									
									
</div>
<div class="findM">
</div>
<div class="clear"></div>
<div class="clear"></div>
<div class="seprator"></div>
<?php include('footer.php'); ?>
<div class="clear"></div>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=="POST" && $_REQUEST['userType']!='') 
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
	
	$crs_chk_email=mysql_num_rows(mysql_query("select USER_EMAIL from login where USER_EMAIL='".$_POST['email']."'"));
	if($crs_chk_email=='1')
	{
		print("<script language='javascript'>alert('Email already taken...');</script>");
		exit;
	}
	if($_POST['userType']=='DOCTOR')
	{
		$insert_query=mysql_query("insert into doctor_register_temp (DOCTOR_FIRST_NAME,DOCTOR_MIDDLE_NAME,DOCTOR_LAST_NAME,DOCTOR_MOBILE_NUMBER,DOCTOR_EMAIL,DOCTOR_USERNAME,DOCTOR_PASSWORD,DOCTOR_RECORD_DATE,DOCTOR_FLAG) values('".$_POST['fname']."','".$_POST['mname']."','".$_POST['lname']."','".$_POST['mobile']."','".$_POST['email']."','".$_POST['username']."','".$_POST['pwd']."','".date('Y-m-d')."','1')");
		$user_un_id=mysql_insert_id();
		if($insert_query==1)
		{
			$insert_login=mysql_query("insert into login_temp (USER_UN_ID,USER_TYPE,USERNAME,USER_EMAIL,USER_PASSWORD,USER_FLAG)values('".$user_un_id."','D','".$_POST['username']."','".$_POST['email']."','".$encrypt_pwd."','1')");
			if($insert_login==1)
			{
				$rand=rand(1, 1000000);
				$name=$_POST['fname']." ".$_POST['lname'];
				
				$insert_code = mysql_query("insert into user_registration_code (USER_REG_CODE_USERNAME,USER_REG_CODE_EMAIL,USER_REG_RANDOM_CODE) values ('".$_POST['username']."','".$_POST['email']."','".$rand."')");
				$reg_code_id=mysql_insert_id();	
				//session_start();
				$_SESSION['username']=$_POST['username'];
				$_SESSION['randomnumber']=$rand;
				$_SESSION['email']=$_POST['email'];	
				$_SESSION['user_type']='D';
				$_SESSION['mobilenumber']=$_POST['mobile'];
				$_SESSION['name']=$name;
				$_SESSION['reg_code_id']=$reg_code_id;
				
				/*$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,"http://myvaluefirst.com/smpp/sendsms?");
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS,
							"username=ezpointment&password=ezpoint1&to=".$_POST['mobile']."&from=EZAPPT&udh=0&text= Dear ".$name.", Welcome to Ezpointment ! Please enter this code ".$rand." to complete your online registration. &dlr-mask=19&dlr-url");
				
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$server_output = curl_exec ($ch);
				curl_close ($ch);
				
				if($server_output=='Sent.')
				{
					$to = $_POST['email'];
					$from = $from; 
					$subject = "ezpointment Registration Code";
					$message = "Dear ".$name.", Welcome to Ezpointment ! Please enter this code ".$rand." to complete your online registration. ";
					
					$headers  = "From: $from"."\r\n"; 
    				$headers .= "Content-type: text/html\r\n"; 
    				$mm = mail($to, $subject, $message, $headers);
				}*/
				print("<script language='javascript'>window.location.href='RegisterSubmit.php';</script>");
 			}
		}
		else
		{
			print("<script language='javascript'>alert('Email or Username already taken...');</script>");
		}
	}		
	
	if($_POST['userType']=='BUSINESS')
	{ 
	$address = $_POST['address1'].' '.$_POST['address2'];
	$insert_query=mysql_query("insert into business_info_temp (BUSINESS_LOCATION_TITLE,BUSINESS_LOCATION_TYPE,BUSINESS_LOCATION_BRANCH,BUSINESS_LOCATION_PHONE_NUMBER,BUSINESS_ADDRESS,BUSINESS_COUNTRY_NAME,BUSINESS_STATE_NAME,BUSINESS_CITY_NAME,BUSINESS_AREA_NAME,BUSINESS_ZIPCODE,BUSINESS_ESTABLISH,BUSINESS_MOBILE_NUMBER,BUSINESS_EMAIL,BUSINESS_USERNAME,BUSINESS_PASSWORD,BUSINESS_RECORD_DATE,BUSINESS_FLAG) values('".$_POST['locName']."','".$_POST['locType']."','".$_POST['branch']."','".$_POST['phoneNo']."','".$address."','".$_POST['country1']."','".$_REQUEST['cmbState']."','".$_REQUEST['cmbCity']."','".$_REQUEST['cmbArea']."','".$_POST['zipcode']."','".$_REQUEST['establish']."','".$_POST['mobile']."','".$_POST['email']."','".$_POST['username']."','".$_POST['pwd']."','".date('Y-m-d')."','1')");
	$user_un_id=mysql_insert_id();
		if($insert_query==1)
		{
			$insert_login=mysql_query("insert into login_temp (USER_UN_ID,USER_TYPE,USERNAME,USER_EMAIL,USER_PASSWORD,USER_FLAG)values('".$user_un_id."','B','".$_POST['username']."','".$_POST['email']."','".$encrypt_pwd."','1')");	
			if($insert_login==1)
			{
				$rand=rand(1, 1000000);
				$name=$_POST['locName'];
				
				$insert_code = mysql_query("insert into user_registration_code (USER_REG_CODE_USERNAME,USER_REG_CODE_EMAIL,USER_REG_RANDOM_CODE) values ('".$_POST['username']."','".$_POST['email']."','".$rand."')");
				//session_start();
				$reg_code_id=mysql_insert_id();
				$_SESSION['username']=$_POST['username'];
				$_SESSION['randomnumber']=$rand;
				$_SESSION['email']=$_POST['email'];	
				$_SESSION['user_type']='B';
				$_SESSION['mobilenumber']=$_POST['mobile'];
				$_SESSION['name']=$name;
				$_SESSION['reg_code_id']=$reg_code_id;
				
				/*$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,"http://myvaluefirst.com/smpp/sendsms?");
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS,
							"username=ezpointment&password=ezpoint1&to=".$_POST['mobile']."&from=EZAPPT&udh=0&text= Dear ".$name.", Welcome to Ezpointment ! Please enter this code ".$rand." to complete your online registration. &dlr-mask=19&dlr-url");
				
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$server_output = curl_exec ($ch);
				curl_close ($ch);
				
				if($server_output=='Sent.')
				{
					$to = $_POST['email'];
					$from = $from; 
					$subject = "ezpointment Registration Code";
					$message = "Dear ".$name.", Welcome to Ezpointment ! Please enter this code ".$rand." to complete your online registration. ";
					
					$headers  = "From: $from"."\r\n"; 
    				$headers .= "Content-type: text/html\r\n"; 
    				$mm = mail($to, $subject, $message, $headers);
				}*/
				print("<script language='javascript'>window.location.href='RegisterSubmit.php';</script>");
			}
		}
		else
		{
			print("<script language='javascript'>alert('Request Incompleted...');window.location.href='docregistration.php';</script>");
		}
	}
}	
?>
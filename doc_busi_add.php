<?php 
include('ezEMail.php');
include("config/config.php");
include("config/function.php");
if($_SESSION['username'])
{
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
$(document).ready(function() {
	$('a.login-window').click(function() {
		$('.login-popup').show();
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(100);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close').live('click', function() { 
	  $('#mask , .login-popup').fadeOut(100 , function() {
		$('#mask,.login-popup').remove();
		$(window.location).attr('href', '');  
	}); 
	return false;
	});
});
</script>
<script language="javaScript">
<!--
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
	
//-->
</script>

<script type="text/javascript">
function pValidate()
	{
		if(document.getElementById("popusername").value =="")
		{
			alert("Please enter your user name.");
			document.getElementById("popusername").focus();
			return false;
		}
		if(document.getElementById("password").value == "")
		{
			alert("Please enter your password.");
			document.getElementById("password").focus();
			return false;
		}
		else
			return true;
	}
</script>
<script type="text/javascript">

function validatesignup(form1)
{
if(form1.userType.value=='DOCTOR')
{
var reason="";
reason+=validatefname(form1.fname);
reason+=validatelname(form1.lname);
if(form1.mname.value.length!='')
{
reason+=validatemname(form1.mname);
}
reason+=validatemobilenumber(form1.mobile);
reason+=validateemail(form1.email);
reason+=validateusername(form1.username);
reason+=validatepassword(form1.pwd);
reason+=validatecheckbox(form1.check1);
if(reason!="")
{
alert("Some input fields are wrong \n" +reason);

return false;

}
 if(document.getElementById('email_avail').value=='1')
	{
		alert('Email already Taken...');
		return false;
	}
	else if(document.getElementById('user_available').value=='1')
	{
		alert('User Id already Taken...');
		return false;
	}
	var con = window.confirm("Are you sure that information provided by you is correct!!")
			
			if (!con)
				return false;
return true; 
}//if doctor closed
if(form1.userType.value=='BUSINESS')
{
var reason="";
reason+=validatelocationname(form1.locName);
reason+=validatephone(form1.phoneNo);
reason+=validatebranch(form1.branch);
reason+=validateaddress1(form1.address1);
reason+=validateaddress2(form1.address2);
reason+=validatemobilenumber(form1.mobile);
reason+=validatezipcode(form1.zipcode)
reason+=validateemail(form1.email);
reason+=validateusername(form1.username);
reason+=validatepassword(form1.pwd);
reason+=validatecheckbox(form1.check1);
if(reason!="")
{
alert("Some input fields are wrong \n" +reason);
return false;
}	

  
	if(document.getElementById('locType').value=='')
	{
		alert('Select Location First.');
		return false;
	}
	 else if(document.getElementById('country').value=='')
	{
		alert('Select Country First.');
		return false;
	}
	else if(document.getElementById('state').value=='')
	{
		alert('Select State First.');
		return false;
	}
	else if(document.getElementById('city').value=='')
	{
		alert('Select City First.');
		return false;
	}
	else if(document.getElementById('area').value=='')
	{
		alert('Select Area First.');
		return false;
	}
	
	else if(document.getElementById('email_avail').value=='1')
	{
		alert('Email already Taken...');
		return false;
	}
	else if(document.getElementById('user_available').value=='1')
	{
		alert('User Id already Taken...');
		return false;
	}
	

		var con = window.confirm("Are you sure that information provided by you is correct!!")
			
			if (!con)
				return false;
				
return true;			
}	

} /// fnction closed
//----business vaidation-------------/
function validatelocationname(fld)
{
var error="";
var testlocation=/^[A-Za-z\s]{2,100}$/;
var location=fld.value;
var result=testlocation.test(location);
if(fld.value.length=="")
{
error="Enter location Title\n";
}

else if(result==false)
{
error="Only Alphabets are allowed in Location Title\n";
}
return error;
}

function validatephone(fld)
{
var error="";
var phonenumber=fld.value;
var testphonumber=/^\d{0,9}-?\d{0,15}$/;
var phone=fld.value;
var result=testphonumber.test(phone);
if(fld.value.length=="" || fld.value.length<=6)
{
error="Enter Phone Number\n";
}
else if(result==false)
{
error="Only digits are allowed and one - allowed in phone number\n";
}
return error;
}
function validateaddress1(fld)
{
var error="";
var address1=fld.value;
var testaddress=/^[a-zA-Z0-9_\-\.\s]*$/;
var result=testaddress.test(address1);
if(fld.value.length=="" || fld.value.length<=5)
{
error="Enter Address 1st\n";
}
else if(result==false)
{
error="Enter Valid Address 1st \n";
}
return error
}
function validateaddress2(fld)
{
var error="";
var address2=fld.value;
var testaddress=/^[a-zA-Z0-9_\-\.\s]*$/;
var result=testaddress.test(address2);
if(fld.value.length=="" || fld.value.length<=5)
{
error="Enter Address 2nd\n";
}
else if(result==false)
{
error="Enter Valid Address 2nd \n";
}
return error
}
function validatebranch(fld)
{
var error="";
var branch=fld.value;
var testbranch=/^[a-zA-Z0-9\-\.\s]*$/;
var result=testbranch.test(branch);
if(fld.value.length=="" || fld.value.length<=5)
{
error="Enter Branch\n";
}
else if(result==false)
{
error="Enter Valid Branch Name Only \n";
}
return error;
}
function validatezipcode(fld)
{
var error="";
var zip=fld.value;
var testzipcode=/^\d{6}$/;
var result=testzipcode.test(zip);
if(fld.value.length=="" || fld.value.length<6 )
{
error="Enter ZipCode\n";
}
else if(result==false)
{
error="Only Six digits between 0-9 are allowed\n";
}
return error;
}
//---------business validation closed----------------/
function validateusername(fld)
{
var error="";
var testusername=/^[A-Za-z0-9]{6,25}$/;
var username=fld.value;
var result=testusername.test(username);
if(fld.value.length=="")
{
error="Please Fill your username of minimum 6 characters\n";
}
else if(result==false)
{
error="User Name : Only alphabets and numerals are allowed (6-20 characters) \n";
}
return error;
}
function validatefname(fld)
{
var error="";
var testfname=/^[A-Za-z]{4,25}$/;
var fname=fld.value;
var result=testfname.test(fname);
if(fld.value.length=="")
{
error="Please Fill your First Name of minimum 4 characers\n";
}
else if(result==false)
{
error="Only alphabets are allowed (minimum 4 characters)\n";
}
return error;
}
function validatemname(fld)
{
var error="";
var testmname=/^[A-Za-z]{4,25}$/;
var mname=fld.value;
var result=testmname.test(mname);
if(mname!='')
{
if(result==false)
{
error="Only alphabets are allowed in Middle name \n";
}
return error;
}
}
function validatelname(fld)
{
var error="";
var testlname=/^[A-Za-z]{4,25}$/;
var lname=fld.value;
var result=testlname.test(lname);
if(fld.value.length=="")
{
error="Please Fill your Last Name  minimum 4 characters\n";
}
else if(result==false)
{
error="Only alphabets are allowed (minimum 4 characters)\n";
}
return error;
}
function validateemail(fld)
{
var error="";
var testemail=/^(([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})+)*$/;
var email=fld.value;
var result=testemail.test(email);
if(fld.value.length=="")
{
error="Enter your email\n";
}
else if(result==false)
{
error="Enter valid email\n";
}
return error;
}
function validatepassword(fld)
{
var error="";
var testpassword=/[a-zA-Z\w]{6,14}$/;
var pwd=fld.value;
var result=testpassword.test(pwd);
if(fld.value.length=="")
{
error="Enter your Password\n";
}
if(fld.value.length<6 || fld.value.length>20 )
{
error="Password between 6 to 20 Characters\n";
}
else if(result==false)
{
error="Only letter,number and underscore(6-20 characters)";
}
return error;
}

function validatemobilenumber(fld)
{
var error="";
var testphonenumber=/^\d{10}$/;
var phonenumber=fld.value;
var result=testphonenumber.test(phonenumber);
if(fld.value.length=="")
{
error="Enter Mobile number\n";
}
else if(result==false)
{
error="Mobile must be b/w 0-9 of 10 digits\n";
}
return error;
}
function validatecheckbox(fld)
{	var error="";
if(!document.getElementById("check1").checked)
	{
		
		document.getElementById("check1").focus();
		error="Please Accept terms & conditions ";
	}
	return error;
	return false;
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
		else if(document.getElementById('fees').value=='')
		{
			alert('Please enter fees');
			document.getElementById('fees').focus();
			return false;
		}
		else if(document.getElementById('months').value=='')
		{
			alert('Please select months');
			document.getElementById('months').focus();
			return false;
		}
		else if(document.getElementById('fees').value=='')
		{
			alert('Please enter fees');
			document.getElementById('fees').focus();
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
		else if(document.getElementById('fees').value=='')
		{
			alert('Please enter fees');
			document.getElementById('fees').focus();
			return false;
		}
		else if(document.getElementById('months').value=='')
		{
			alert('Please select months');
			document.getElementById('months').focus();
			return false;
		}
		else if(document.getElementById('fees').value=='')
		{
			alert('Please enter fees');
			document.getElementById('fees').focus();
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

<body>
<div class="maina">


		<div class="clear"></div>
<div class="midcontainer1">
			
<div class="doctor_M">
<form name="signup" method="post" action="" onSubmit="return validatesignuppage();">
<table width="720" cellpadding="0" cellspacing="0" border="0"> 
			<tr>
            <td colspan="3"><h2 style="color:#003162;">Add Doctor/Business</h2></td>
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
				<option value="DOCTOR" >Doctor</option>
				<option value="BUSINESS">Business</option>
            </select> 
			</td>
			<td width="445" style="padding:13px;"><h5>&nbsp;</h5></td>
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
					<td><input type="text" size="25" name="fname" value="" id = "fname"  maxlength="80" class="textfild-S"/>			
					</td>
					<td><input type="text" size="25" name="mname" value="" id = "mname" class="textfild-S" maxlength="80" /></td>
					<td><input type="text" size="25" name="lname" value="" id = "lname" class="textfild-S" maxlength="80" /></td>
				  </tr>
				  <tr>
					<td colspan="3">&nbsp;</td>
				  </tr>
	          </table>
		</div> 
		 
		  
		    
			<div id="loc" style="display:none;">		
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
				<tr>
				  <td colspan="3">Name <span class="red">*</span>
				  </td>
				</tr>
				<tr>
				  <td colspan="3"><input type="text" size="30" name="locName" value="" id ="locName"  maxlength="100" class="textfiled-M" /></td>
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
					<option vlue="Clinic">Clinic</option>
					<option value="Hospital">Hospital</option>
					<option value="Laboratory">Laboratory</option>
				</select>			  </td>
				</tr>
				<tr>
				  <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="3">Branch <span class="red">*</span></td>
				</tr>
				<tr>
				  <td colspan="3"><input type="text" size="30" name="branch" value="" id = "branch"  maxlength="100" class="textfiled-M" /> </td>
				</tr>
				<tr>
				  <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="3">Phone No. <span class="red">*</span></td>
				</tr>
				<tr>
				  <td colspan="3"><input type="text" size="50" name="phoneNo" value="" id = "phoneNo"  maxlength="100" class="textfiled-M" /> </td>
				</tr>
				<tr>
				  <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="3">Address1 <span class="red">*</span></td>
				</tr>
				<tr>
				  <td colspan="3"><input type="text" class="textfiled-M" size="50" name="address1" value="" id = "address1"  maxlength="100" /></td>
				</tr>
				<tr>
				  <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="3">Address2 </td>
				</tr>
				<tr>
				  <td colspan="3"><input type="text" size="50" name="address2" value="" id = "address2"  maxlength="100" class="textfiled-M" /> </td>
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
					<option value="<?php print $row1->COUNTRY_ID; ?>"<?php if($pat_val->DOCTOR_CONTRY==$row1->COUNTRY_ID) { ?> selected="selected" <?php } ?>><?php print $row1->COUNTRY_NAME; ?></option>
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
					<option value="<?php print $row2->STATE_ID; ?>" <?php if($gender1->DOCTOR_STATE==$row2->STATE_ID) { ?> selected="selected" <?php } ?>><?php print $row2->STATE_NAME; ?></option>
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
					<option value="<?php print $row3->CITY_ID; ?>" <?php if($gender1->DOCTOR_CITY==$row3->CITY_ID) { ?> selected="selected" <?php } ?>><?php print $row3->CITY_NAME; ?></option>
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
					<option value="<?php print $row4->AREA_ID; ?>" <?php if($gender1->DOCTOR_AREA==$row4->AREA_ID) { ?> selected="selected" <?php } ?>><?php print $row4->AREA_NAME; ?></option>
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
				  <td colspan="3"><input type="text" size="20" name="zipcode" value="" id = "zipcode"  maxlength="10" class="textfiled-M" /></td>
				</tr>            
				<tr>
				  <td colspan="3">&nbsp;</td>
				</tr>
				<tr>
				  <td colspan="3">Year of Establishment <span class="red">*</span></td>
				</tr>
				<tr>
				  <td colspan="3"><input type="text" size="20" name="establish" value="" id="establish"  maxlength="4" class="textfiled-M" /></td>
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
            <td colspan="3" valign="top"><input	 type="text" size="25" class="textfiled-M" name="mobile" value="" id="mobile"  maxlength="10" onkeypress="return isNumberKey(event)" /></td>            
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
            <td colspan="3"><input type="text" size="25" class="textfiled-M" name="username" autocomplete="off" onkeyup="getFile1(this.value,'div_file6')";value="" id = "username"  maxlength="100" onBlur="checkUName();" /><div id="div_file6"></div>
			<br><div id="un"></div><br>User name must be atleast 6 character long.</td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">Password <span class="red">*</span></td>
          </tr>
          <tr>
            <td colspan="3"><input type="password" size="25" name="pwd" value="" id="pwd" class="textfiled-M"  maxlength="30" /><br><br>Password atleast 6 character long.</td>
          </tr>
          <tr>
		  <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">Monthly charges <span class="red">*</span></td>
          </tr>
          <tr>
            <td colspan="3"><input type="text" size="25" name="fees" value="" id="fees" class="textfiled-M" onkeypress="return isNumberKey(event)"  maxlength="5" /></td>
          </tr>
          <tr>
		  <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">Month <span class="red">*</span></td>
          </tr>
          <tr>
            <td colspan="3">
				<select name="months" id="months" class="drop5">
					<option value="">Select</option>
					<option value="3">3 Months</option>
					<option value="2">2 Months</option>
					<option value="1">1 Month</option>
				</select>
			</td>
          </tr>
          <tr>
		  <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">Remark <span class="red">*</span></td>
          </tr>
          <tr>
            <td colspan="3"><input type="text" size="25" name="remark" value="" id="remark" class="textfiled-M" /></td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
         <tr>
            <td>&nbsp;</td>
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
<div class="findM">
</div>
<div class="clear"></div>

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
		if($_POST['userType']=='DOCTOR')
		{
			$insert_query=mysql_query("insert into doctor_register (DOCTOR_FIRST_NAME,DOCTOR_MIDDLE_NAME,DOCTOR_LAST_NAME,DOCTOR_MOBILE_NUMBER,DOCTOR_EMAIL,DOCTOR_USERNAME,DOCTOR_PASSWORD,DOCTOR_RECORD_DATE,DOCTOR_FLAG) values('".$_POST['fname']."','".$_POST['mname']."','".$_POST['lname']."','".$_POST['mobile']."','".$_POST['email']."','".$_POST['username']."','".$_POST['pwd']."','".date('Y-m-d')."','0')");
			$user_un_id=mysql_insert_id();
			if($insert_query==1)
			{
				$insert_login=mysql_query("insert into login (USER_UN_ID,USER_TYPE,USERNAME,USER_EMAIL,USER_PASSWORD,USER_FLAG)values('".$user_un_id."','D','".$_POST['username']."','".$_POST['email']."','".$encrypt_pwd."','0')");
				if($insert_login==1)
				{
					$mnth=$_POST['months'];
					$today = date('Y-m-d');
					$tdate = date('Y-m-d',strtotime(date("Y-m-d", strtotime($today)) . " +$mnth months "));
					$paid_amt=$_POST['fees']*$_POST['months'];
					$insert_billing = mysql_query("insert into doc_billing (DOC_ID,MONTHLY_FEES,MONTH,REMARK,PAID_AMT,CDATE,TDATE,CUSER) values ('".$user_un_id."','".$_POST['fees']."','".$_POST['months']."','".$_POST['remark']."','".$paid_amt."','".date('Y-m-d')."','".$tdate."','".$_SESSION['username']."') ");
					
					if($insert_billing==1)
					{
						$to = $_POST['email'];
						$from = $from; 
						$subject = "Welcome to ezpointment";
						$body = "Dear ".$_POST['fname'].", Welcome to Ezpointment ! Please login with '".$_POST['username']."' and password '".$_POST['pwd']."' . ";
						$result = ezEMail::sendSMTPMessage($to, $from, "support", $subject,$body);
						
						//$headers  = "From: $from"."\r\n"; 
						//$headers .= "Content-type: text/html\r\n"; 
						//$mm = mail($to, $subject, $message, $headers);
					}
					print("<script language='javascript'>alert('Registered successfully.');window.location.href='doc_busi_add.php';</script>");
				}
			}
		}		
		
		if($_POST['userType']=='BUSINESS')
		{ 
		$address = $_POST['address1'].' '.$_POST['address2'];
		$insert_query=mysql_query("insert into business_info (BUSINESS_LOCATION_TITLE,BUSINESS_LOCATION_TYPE,BUSINESS_LOCATION_BRANCH,BUSINESS_LOCATION_PHONE_NUMBER,BUSINESS_ADDRESS,BUSINESS_COUNTRY_NAME,BUSINESS_STATE_NAME,BUSINESS_CITY_NAME,BUSINESS_AREA_NAME,BUSINESS_ZIPCODE,BUSINESS_ESTABLISH,BUSINESS_MOBILE_NUMBER,BUSINESS_PHOTO,BUSINESS_EMAIL,BUSINESS_USERNAME,BUSINESS_PASSWORD,BUSINESS_RECORD_DATE,BUSINESS_FLAG) values('".$_POST['locName']."','".$_POST['locType']."','".$_POST['branch']."','".$_POST['phoneNo']."','".$address."','".$_POST['country1']."','".$_REQUEST['cmbState']."','".$_REQUEST['cmbCity']."','".$_REQUEST['cmbArea']."','".$_POST['zipcode']."','".$_REQUEST['establish']."','".$_POST['mobile']."','','".$_POST['email']."','".$_POST['username']."','".$_POST['pwd']."','".date('Y-m-d')."','0')");
		$user_un_id=mysql_insert_id();
			if($insert_query==1)
			{
				$insert_login=mysql_query("insert into login (USER_UN_ID,USER_TYPE,USERNAME,USER_EMAIL,USER_PASSWORD,USER_FLAG)values('".$user_un_id."','B','".$_POST['username']."','".$_POST['email']."','".$encrypt_pwd."','0')");	
				if($insert_login==1)
				{
					$mnth=$_POST['months'];
					$today = date('Y-m-d');
					$tdate = date('Y-m-d',strtotime(date("Y-m-d", strtotime($today)) . " +$mnth months "));
					$paid_amt=$_POST['fees']*$_POST['months'];
					$insert_billing = mysql_query("insert into business_billing (BUSINESS_ID,MONTHLY_FEES,MONTH,REMARK,PAID_AMT,CDATE,TDATE,CUSER) values ('".$user_un_id."','".$_POST['fees']."','".$_POST['months']."','".$_POST['remark']."','".$paid_amt."','".date('Y-m-d')."','".$tdate."','".$_SESSION['username']."') ");
					
					if($insert_billing==1)
					{
						$to = $_POST['email'];
						$from = $from; 
						$subject = "Welcome to ezpointment";
						$body = "Dear ".$_POST['locName'].", Welcome to Ezpointment ! Please login with '".$_POST['username']."' and password '".$_POST['pwd']."' .";
						$result = ezEMail::sendSMTPMessage($to, $from, "support", $subject,$body);
						//$headers  = "From: $from"."\r\n"; 
						//$headers .= "Content-type: text/html\r\n"; 
						//$mm = mail($to, $subject, $message, $headers);
					}
					print("<script language='javascript'>alert('Registered successfully.');window.location.href='doc_busi_add.php';</script>");
				}
			}
		}
	}	
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
<?php 
include("config/config.php");
if($_SESSION['username'])
{

	$query="SELECT * from doctor_register where DOCTOR_USERNAME='".$_SESSION['username']."'";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result))
	{
	$firstname=$row['DOCTOR_FIRST_NAME'];
	$middlename=$row['DOCTOR_MIDDLE_NAME'];
	$lastname=$row['DOCTOR_LAST_NAME'];
	$mobile_number=$row['DOCTOR_MOBILE_NUMBER'];
	$email=$row['DOCTOR_EMAIL'];
	$rowid=$row['DOCTOR_ID'];
	}
	
	$pat_val=mysql_fetch_object(mysql_query("select * from doctor_personal_info where DOCTOR_ID='$rowid'"));
	if($pat_val->DOCTOR_PHOTO!='')
	{
		$img_name=$pat_val->DOCTOR_PHOTO;
	}
	else
	{
		$img_name='noImage.gif';
	}
	$user_dob = date('m/d/Y',strtotime($pat_val->DOCTOR_DOB));
?>
<head>
<link href="styles/css.css" rel="stylesheet" type="text/css" />
<link href="styles/style1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery_min.js"></script>
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
function validatesignup(form1)
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
reason+=validateaddress(form1.address);
if(reason!="")
{
alert("Some input fields are wrong \n" +reason);

return false;

}
	 if(document.getElementById('dob').value=='')
	{
		alert('Enter Date of Birth');
		return false;
	}
	else if(document.getElementById('gender').value=='')
	{
		alert('Select Gender');
		return false;
	}

	else if(document.getElementById('country').value=='')
	{
		alert('Select Country .');
		return false;
	}
	else if(document.getElementById('state').value=='')
	{
		alert('Select State ');
		return false;
	}
	else if(document.getElementById('city').value=='')
	{
		alert('Select City ');
		return false;
	}
	else if(document.getElementById('area').value=='')
	{
		alert('Select Area ');
		return false;
	}
		 	
	var con = window.confirm("Are you sure that information provided by you is correct!!");
			if (!con)
			{
				return false;
			}
		
			return true;
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
error="enter valid email\n";
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
error="enter phone number\n";
}
else if(result==false)
{
error="Mobile must be b/w 0-9 of 10 digits\n";
}
return error;
}
function validateaddress(fld)
{
var error="";
var address=fld.value;
var testaddress=/^[a-zA-Z0-9\-\.\s]*$/;
var result=testaddress.test(address);
if(fld.value.length=="" || fld.value.length<=5)
{
error="Enter Address \n";
}
else if(result==false)
{
error="Enter Valid Address  \n";
}
return error;
}	
</script>
<script type="text/javascript">
function validate()
{	
	var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
	if(document.getElementById('mobile').value=='')
	{
		alert('Please enter your mobile number');
		document.getElementById('mobile').focus();
		return false;
	}
	else if(!document.getElementById('email').value.match(re) && document.getElementById('email').value!="")
	{
		alert('Please enter your valid email address');
		document.getElementById('email').focus();
		return false;
	}
	else if(document.getElementById('fname').value=='')
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
	else if(document.getElementById('dob').value=='')
	{
		alert('Please enter your date of birth');
		document.getElementById('dob').focus();
		return false;
	}
	else if(document.getElementById('gender').value=='')
	{
		alert('Please select your gender');
		document.getElementById('gender').focus();
		return false;
	}
	else if(document.getElementById('address').value=='')
	{
		alert('Please enter address');
		document.getElementById('address').focus();
		return false;
	} 
	else if(document.getElementById('exp').value=='')
	{
		alert('Please enter experience');
		document.getElementById('exp').focus();
		return false;
	}
	else if(document.getElementById('license').value=='')
	{
		alert('Please enter license no');
		document.getElementById('license').focus();
		return false;
	}
	else if(document.getElementById('country').value=='')
	{
		alert('Please select country');
		document.getElementById('country').focus();
		return false;
	}
	else if(document.getElementById('state').value=='')
	{
		alert('Please select state');
		document.getElementById('state').focus();
		return false;
	}
	else if(document.getElementById('city').value=='')
	{
		alert('Please select city');
		document.getElementById('city').focus();
		return false;
	}
	else if(document.getElementById('area').value=='')
	{
		alert('Please select area');
		document.getElementById('area').focus();
		return false;
	}
}
</script>
</head>
<body class="maina">
<form name="docPhotoForm" method="post" ENCTYPE="multipart/form-data" ACTION="" onSubmit="return validate();">   
<!--div class="dashright"-->
<table width="400" cellpadding="0" cellspacing="0" border="0" >
<tr>
	<td colspan="4"><h2 style="color:#003162;">Profile Update</h2></td>
</tr>
<tr>
	<td colspan="4">&nbsp;</td>
</tr>
</table>
<div class="content1" style="float:right;">

<img src="./uploads/<?php print $img_name;?>"  width="100px" id="image" alt="noImage" /><Br><a href="#" onClick="javascript:document.getElementById('uploadImageDiv').style.display=''">Change Photo</a>
		<div id="uploadImageDiv" style="display:none;">
		 		
		<input type="hidden" name="userId" value="">
		  <table width="400" cellpadding="0" cellspacing="0" border="0" >
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
			<tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <th colspan="3">Please upload your Photo in JPG format</th>              
            </tr>
			<tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td colspan="2" align="center"><input type="file" name="file" size="25" ></td>					 
            </tr>
			<tr>
              <td colspan="3">&nbsp;</td>
            </tr>
			<tr>
              <td colspan="3">&nbsp;</td>
            </tr>
			<tr>
				<td align="center" colspan="3">
                <!--input type="submit" value="Upload" name="submi" class="but-blue" /--></td>
			</tr>
			<tr>
              <td colspan="3">&nbsp;</td>
            </tr>
          </table>
        <!--/form-->
		</div>
	<!--form method="post" action="" name="docForm" onSubmit="return validatesignup(this);"-->
	<table width="720" cellpadding="0" cellspacing="0" border="0">
		<tr>
		  <td colspan="3">&nbsp;</td>
		</tr> 
			<tr>
            <td colspan="3" class="ntext">Mobile <span class="red">*</span></td>
		  </tr>
		  <tr>
			<td colspan="3"><input type="text" class="textfiled-M" size="25" name="mobile" value="<?php print $mobile_number;?>" id = "mobile" maxlength="10" o/></td>
		  </tr>
		  <tr>
		<tr>
		  <td colspan="3">&nbsp;</td>
		</tr> 
		<tr>
            <td colspan="3" class="ntext">E-mail ID <span class="red">*</span></td>
		  </tr>
		  <tr>
			<td colspan="3"><input type="text" class="textfiled-M" size="25" name="email" value="<?php print $email;?>" id = "email"  maxlength="100" /></td>
		  </tr>
		  <tr>
		  <td colspan="3">&nbsp;</td>
		</tr>
		  <tr>
            <td class="ntext">First Name <span class="red">*</span></td>
            <td class="ntext">Middle Name</td>
            <td class="ntext">Last Name <span class="red">*</span></td>
          </tr>
          <tr>
            <td><input type="text" size="25" name="fname" value="<?php print $firstname;?>" id = "fname"  maxlength="80" class="textfild-S" />			
			</td>
            <td><input type="text" size="25" name="mname" value="<?php print $middlename;?>" id = "mname" class="textfild-S" maxlength="80" /></td>
            <td><input type="text" size="25" name="lname" value="<?php print $lastname;?>" id = "lname" class="textfild-S" maxlength="80" /></td>
          </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" class="ntext">Date of Birth <span class="red">*</span></td>
            </tr>
            <tr>
              <td colspan="3">
				<input  type="text" size="50" valign="top"  name="dob"  value="<?php if($user_dob=='' || $user_dob=='01/01/1970') { print ''; } else { print $user_dob; } ?>" onClick="scwShow(this,event);" id = "dob"  maxlength="15" class="textfild-LS" style="width:326px;"/>
				&nbsp;&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" class="ntext">Gender <span class="red">*</span></td>
            </tr>
			<tr>
              <td colspan="3"><select name="gender" id="gender" class="drop3">
				<option value="" >Select</option>
				<option value="Male" <?php if($pat_val->DOCTOR_GENDER=='Male') { ?> selected="selected" <?php } ?> >Male</option>
				<option value="Female" <?php if($pat_val->DOCTOR_GENDER=='Female') { ?> selected="selected" <?php } ?> >Female</option>
			</select></td>
            </tr>
			
			<tr>
              <td colspan="3">&nbsp;</td>
            </tr>
			<tr>
            <td colspan="3" class="ntext">Work Address <span class="red">*</span></td>
		  </tr>
		  <tr>
			<td colspan="3"><input type="text" class="textfiled-M" name="address" id="address" value="<?php print $pat_val->DOCTOR_ADDRESS;?>" maxlength="200" /></td>
		  </tr>
		  <tr>
		  <td colspan="3">&nbsp;</td>
		  </tr>
		  <tr>
            <td colspan="3" class="ntext">Experience <span class="red">*</span></td>
		  </tr>
		  <tr>
			<td colspan="3"><input type="text" class="textfiled-M" name="exp" id="exp" value="<?php print $pat_val->DOCTOR_EXP;?>" maxlength="3" /></td>
		  </tr>
		  <tr>
		  <tr>
		  <td colspan="3">&nbsp;</td>
		  </tr>
		  <tr>
            <td colspan="3" class="ntext">Fees <span class="red">*</span></td>
		  </tr>
		  <tr>
			<td colspan="3"><input type="text" class="textfiled-M" name="fees" id="fees" value="<?php print $pat_val->DOCTOR_FEES;?>" maxlength="5" /></td>
		  </tr>
		  <tr>
		  <td colspan="3">&nbsp;</td>
		  </tr>
		  <tr>
            <td colspan="3" class="ntext">License <span class="red">*</span></td>
		  </tr>
		  <tr>
			<td colspan="3"><input type="text" class="textfiled-M" name="license" id="license" value="<?php print $pat_val->DOCTOR_LICENSE;?>" maxlength="200" /></td>
		  </tr>
		  <tr>
		  <td colspan="3">&nbsp;</td>
		  </tr>
		  <tr>
              <td colspan="3" class="ntext">Country <span class="red">*</span></td>
          </tr>
          <tr>
              <td colspan="3">
				<select name="country1" id="country1" onChange="showUser1(this.value,'state_list');" class="drop3">
				<option value="" <?php if($pat_val->DOCTOR_CONTRY==""){?>selected="selected" <?php }?>>Select Country</option>
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
              <td colspan="3" class="ntext">State <span class="red">*</span></td>
            </tr>
            <tr>
              <td colspan="3">
				<div id="state_list">
				<select name="cmbState" id="cmbState" onChange="showUser1(this.value,'city_list');" class="drop3">
				<option value="" <?php if($pat_val->DOCTOR_STATE==""){?>selected="selected"<?php } ?>>Select</option>
			<?php 
					$sel_query=mysql_query("select * from state_table where COUNTRY_ID='".$pat_val->DOCTOR_CONTRY."'");
					while($row2=mysql_fetch_object($sel_query)) { 
					?>
					<option value="<?=$row2->STATE_ID?>" <?php if($pat_val->DOCTOR_STATE==$row2->STATE_ID) { ?> selected="selected" <?php } ?>><?php print $row2->STATE_NAME; ?></option>
					<?php } ?>
			</select></div></td>
            </tr>
			<tr>
              <td colspan="3">&nbsp;</td>
            </tr>
			<tr>
              <td colspan="3" class="ntext">City <span class="red">*</span></td>
            </tr>
            <tr>
              <td colspan="3">
				<div id="city_list">
				<select name="cmbCity" id="cmbCity" onChange="showUser1(this.value,'area_list');" class="drop3">
				<option value="" <?php if($pat_val->DOCTOR_CITY==""){?> selected="selected"<?php } ?>>Select</option>
				<?php 
					$sel_query=mysql_query("select * from city_table where STATE_ID='".$pat_val->DOCTOR_STATE."'");
					while($row3=mysql_fetch_object($sel_query)) { 
					?>
					<option value="<?=$row3->CITY_ID?>" <?php if($pat_val->DOCTOR_CITY==$row3->CITY_ID) { ?> selected="selected" <?php } ?>><?php print $row3->CITY_NAME; ?></option>
					<?php } ?>				
				</select></div></td>
            </tr>
			<tr>
              <td colspan="3">&nbsp;</td>
            </tr>
			<tr>
              <td colspan="3" class="ntext">Area <span class="red">*</span></td>
            </tr>
            <tr>
              <td colspan="3">
				<div id="area_list">
				<select name="cmbArea" id="cmbArea" class="drop3">	
				<option value="" <?php if($pat_val->DOCTOR_AREA==""){?> selected="selected"<?php }?>>Select</option>	
					<?php 
					$sel_query=mysql_query("select * from area_table where CITY_ID='".$pat_val->DOCTOR_CITY."'");
					while($row4=mysql_fetch_object($sel_query)) { 
					?>
					<option value="<?=$row4->AREA_ID?>" <?php if($pat_val->DOCTOR_AREA==$row4->AREA_ID) { ?> selected="selected" <?php } ?>><?php print $row4->AREA_NAME; ?></option>
					<?php } ?>				
				</select></div></td>
            </tr>
			<tr>
              <td colspan="3">&nbsp;</td>
            </tr>
			<tr>
              <td></td>
              <td align="right" style="float:right; margin-right:20px; margin-top:0;"><input type="reset" value="Reset" name="submi" class="but-gray" style="margin-right:10px;" />
                <input type="submit" value="Update" name="submit" class="but-blue" /></td>
            </tr>
			</table>
        	
		</div>
		<!--/div-->
</form>	
</body>
</html>
<?php 
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
	  $dob1=explode('/',$_POST['dob']);
	  $dob=$dob1[2].'-'.$dob1[0].'-'.$dob1[1];
	  
	  $origin_date = date("Y-m-d",strtotime("-18 years"));
	  if($dob>$origin_date)
	  {
	  	print("<script language='javascript'>alert('Age should be 18 or above'); </script>");
		exit();
	  }
	
		$rowcount=mysql_num_rows(mysql_query("select * from doctor_personal_info where DOCTOR_ID='".$rowid."'"));
		if($rowcount>=1)
		{
			 if($_FILES["file"]["name"]!='')
			 {
				 $uploaddir= "uploads/";
				 $tmp_name = $_FILES["file"]["tmp_name"];
				 $photo = $_FILES["file"]["name"];
				 move_uploaded_file($tmp_name,$uploaddir.$photo);
			 }
			 else
			 {
				$photo=$img_name;
			 }
			 	
			$reg_info=mysql_query("update doctor_register set DOCTOR_FIRST_NAME='".$_POST['fname']."', DOCTOR_MIDDLE_NAME='".$_POST['mname']."', DOCTOR_LAST_NAME='".$_POST['lname']."',DOCTOR_MOBILE_NUMBER='".$_POST['mobile']."',DOCTOR_EMAIL='".$_POST['email']."' where DOCTOR_ID='".$rowid."'");
		
			$personal_info=mysql_query("update doctor_personal_info set DOCTOR_DOB='".$dob."', DOCTOR_GENDER='".$_POST['gender']."', DOCTOR_ADDRESS='".$_POST['address']."', DOCTOR_CONTRY='".$_POST['country1']."', DOCTOR_STATE='".$_REQUEST['cmbState']."', DOCTOR_CITY='".$_REQUEST['cmbCity']."', DOCTOR_AREA='".$_REQUEST['cmbArea']."', DOCTOR_PHOTO='".$photo."', DOCTOR_EXP='".$_POST['exp']."', DOCTOR_FEES='".$_POST['fees']."', DOCTOR_LICENSE='".$_POST['license']."', DOCTOR_RECORD_DATE='".date('Y-m-d')."' where DOCTOR_ID='".$rowid."'"); 
			
			if($reg_info==1 && $personal_info==1) 
			{
				print("<script language='javascript'>alert('Request Completed...'); window.location.href='update_profile_d.php';</script>");
			}
			else
			{
				print("<script language='javascript'>alert('Request Incomplete, Try Again...'); window.location.href='update_profile_d.php';</script>");	
			}
		}
		else
		{
			 if($_FILES["file"]["name"]!='')
			 {
				 $uploaddir= "uploads/";
				 $tmp_name = $_FILES["file"]["tmp_name"];
				 $photo = $_FILES["file"]["name"];
				 move_uploaded_file($tmp_name,$uploaddir.$photo);
			 }
			 else
			 {
				$photo='noImage.gif';
			 }
			 
			$reg_info=mysql_query("update doctor_register set DOCTOR_FIRST_NAME='".$_POST['fname']."', DOCTOR_MIDDLE_NAME='".$_POST['mname']."', DOCTOR_LAST_NAME='".$_POST['lname']."',DOCTOR_MOBILE_NUMBER='".$_POST['mobile']."',DOCTOR_EMAIL='".$_POST['email']."' where DOCTOR_ID='".$rowid."'");
			
			$personal_info=mysql_query("insert into doctor_personal_info (DOCTOR_ID,DOCTOR_DOB,DOCTOR_GENDER,DOCTOR_ADDRESS,DOCTOR_CONTRY,DOCTOR_STATE,DOCTOR_CITY,DOCTOR_AREA,DOCTOR_PHOTO,DOCTOR_EXP,DOCTOR_FEES,DOCTOR_LICENSE,DOCTOR_RECORD_DATE) values('".$rowid."','".$dob."','".$_POST['gender']."','".$_POST['address']."','".$_POST['country1']."','".$_REQUEST['cmbState']."','".$_REQUEST['cmbCity']."','".$_REQUEST['cmbArea']."','".$photo."','".$_POST['exp']."','".$_POST['fees']."','".$_POST['license']."','".date('Y-m-d')."')");
			
			if($reg_info==1 && $personal_info==1)
			{
				print("<script language='javascript'>alert('Request Completed...'); window.location.href='update_profile_d.php';</script>");
			}
			else
			{
				print("<script language='javascript'>alert('Request Incomplete, Try Again...'); window.location.href='update_profile_d.php';</script>");	
			}
		}
	}
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
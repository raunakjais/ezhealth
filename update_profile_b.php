<?php 
error_reporting(0);
include("config/config.php");
if($_SESSION['username'])
{

	$bus_info=mysql_fetch_object(mysql_query("SELECT * from business_info where BUSINESS_ID='".$_SESSION['buss_id']."'"));
	if($bus_info->BUSINESS_PHOTO!='')
	{
		$img_name=$bus_info->BUSINESS_PHOTO;
	}
	else
	{
		$img_name='hospital.jpg';
	}
	$user_dob = date('m/d/Y',strtotime($pat_val->PATIENT_DOB));
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
function isNumberKey(evt)
      {
        var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
</script>
</head>
<body class="maina">
<form name="docPhotoForm" method="post" ENCTYPE="multipart/form-data" ACTION="" onSubmit="return validate();"> 
<!--div class="dashright"-->
<div class="content1">

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
            <td colspan="3" class="ntext">Registered As<span class="red">*</span></td>
		  </tr>
		  <tr>
			<td colspan="3"><input type="text" class="textfiled-M" size="25" name="location" value="<?php print $bus_info->BUSINESS_LOCATION_TITLE; ?>" id="location" /></td>
		  </tr>
		  <tr>
		<tr>
		  <td colspan="3">&nbsp;</td>
		</tr> 
		<tr>
            <td colspan="3" class="ntext"> Mobile <span class="red">*</span></td>
		  </tr>
		  <tr>
			<td colspan="3"><input type="text" class="textfiled-M" size="25" name="mobile" value="<?php print $bus_info->BUSINESS_MOBILE_NUMBER; ?>" id="mobile" onkeypress="return isNumberKey(event)"  maxlength="10" /></td>
		  </tr>
		  <tr>
		  <td colspan="3">&nbsp;</td>
		</tr>
			<tr>
            <td colspan="3" class="ntext">Phone No. <span class="red">*</span></td>
		  </tr>
		  <tr>
			<td colspan="3"><input type="text" class="textfiled-M" name="phone" id="phone" value="<?php print $bus_info->BUSINESS_LOCATION_PHONE_NUMBER;?>" maxlength="20" /></td>
		  </tr>
		  <tr><tr>
              <td colspan="3">&nbsp;</td>
            </tr>
			<tr>
            <td colspan="3" class="ntext">Address <span class="red">*</span></td>
		  </tr>
		  <tr>
			<td colspan="3"><input type="text" class="textfiled-M" name="address" id="address" value="<?php print $bus_info->BUSINESS_ADDRESS;?>" maxlength="200" /></td>
		  </tr>
		  <tr>
		  <td colspan="3">&nbsp;</td>
		  </tr>
		  <tr>
            <td colspan="3" class="ntext">Zipcode <span class="red">*</span></td>
		  </tr>
		  <tr>
			<td colspan="3"><input type="text" class="textfiled-M" name="zipcode" id="zipcode" onkeypress="return isNumberKey(event)" value="<?php print $bus_info->BUSINESS_ZIPCODE; ?>" maxlength="6" /></td>
		  </tr>
		  <tr><tr>
              <td colspan="3">&nbsp;</td>
            </tr>
		  <tr>
              <td colspan="3" class="ntext">Country <span class="red">*</span></td>
          </tr>
          <tr>
              <td colspan="3">
				<select name="country1" id="country1" onChange="showUser1(this.value,'state_list');" class="drop3">
				<option value="" <?php if($bus_info->BUSINESS_COUNTRY_NAME==""){?>selected="selected" <?php }?>>Select Country</option>
					<?php 
					$sel_query=mysql_query("select * from country_table");
					while($row1=mysql_fetch_object($sel_query)) { 
					?>
					<option value="<?php print $row1->COUNTRY_ID; ?>"<?php if($bus_info->BUSINESS_COUNTRY_NAME==$row1->COUNTRY_ID) { ?> selected="selected" <?php } ?>><?php print $row1->COUNTRY_NAME; ?></option>
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
				<option value="" <?php if($bus_info->BUSINESS_STATE_NAME==""){?>selected="selected"<?php } ?>>Select</option>
			<?php 
					$sel_query=mysql_query("select * from state_table where COUNTRY_ID='".$bus_info->BUSINESS_COUNTRY_NAME."'");
					while($row2=mysql_fetch_object($sel_query)) { 
					?>
					<option value="<?=$row2->STATE_ID?>" <?php if($bus_info->BUSINESS_STATE_NAME==$row2->STATE_ID) { ?> selected="selected" <?php } ?>><?php print $row2->STATE_NAME; ?></option>
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
				<option value="" <?php if($bus_info->BUSINESS_CITY_NAME==""){?> selected="selected"<?php } ?>>Select</option>
				<?php 
					$sel_query=mysql_query("select * from city_table where STATE_ID='".$bus_info->BUSINESS_STATE_NAME."'");
					while($row3=mysql_fetch_object($sel_query)) { 
					?>
					<option value="<?=$row3->CITY_ID?>" <?php if($bus_info->BUSINESS_CITY_NAME==$row3->CITY_ID) { ?> selected="selected" <?php } ?>><?php print $row3->CITY_NAME; ?></option>
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
				<option value="" <?php if($bus_info->BUSINESS_AREA_NAME==""){?> selected="selected"<?php }?>>Select</option>	
					<?php 
					$sel_query=mysql_query("select * from area_table where CITY_ID='".$bus_info->BUSINESS_CITY_NAME."'");
					while($row4=mysql_fetch_object($sel_query)) { 
					?>
					<option value="<?php print $row4->AREA_ID; ?>" <?php if($bus_info->BUSINESS_AREA_NAME==$row4->AREA_ID) { ?> selected="selected" <?php } ?>><?php print $row4->AREA_NAME; ?></option>
					<?php } ?>				
				</select></div></td>
            </tr>
			<tr>
              <td colspan="3">&nbsp;</td>
            </tr>
			<tr>
              <td></td>
              <td align="right" style="float:right; margin-right:20px; margin-top:0;"><input type="reset" value="Reset" name="submi" class="but-gray" style="margin-right:10px;" />
                <input type="submit" value="Update" name="submit" class="but-blue"/></td>
            </tr>
			</table>
        		
		</div>
		</form>
		<!--/div-->
</body>
</html>
<?php 
	if($_SERVER['REQUEST_METHOD']=='POST')
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
		
		$business_info=mysql_query("update business_info set BUSINESS_LOCATION_TITLE='".$_REQUEST['location']."', BUSINESS_MOBILE_NUMBER='".$_REQUEST['mobile']."', BUSINESS_LOCATION_PHONE_NUMBER='".$_REQUEST['phone']."', BUSINESS_ADDRESS='".$_REQUEST['address']."', BUSINESS_ZIPCODE='".$_REQUEST['zipcode']."', BUSINESS_COUNTRY_NAME='".$_POST['country1']."', BUSINESS_STATE_NAME='".$_REQUEST['cmbState']."', BUSINESS_CITY_NAME='".$_REQUEST['cmbCity']."', BUSINESS_AREA_NAME='".$_REQUEST['cmbArea']."', BUSINESS_PHOTO='".$photo."' where BUSINESS_ID='".$_SESSION['buss_id']."' "); 
		
		if($business_info==1)
		{
			print("<script language='javascript'>alert('Request Completed...'); window.location.href='update_profile_b.php';</script>");
		}
		else
		{
			print("<script language='javascript'>alert('Request Incomplete, Try Again...'); window.location.href='update_profile_b.php';</script>");	
		}
	}
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
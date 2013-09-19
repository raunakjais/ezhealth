<?php 
include("config/config.php");
if($_SESSION['username'])
{
	if($_REQUEST['update_id']!='')
	{
		$query="SELECT * from doctor_register where DOCTOR_ID='".$_REQUEST['update_id']."'";	
	}
	else
	{
		$query="SELECT * from doctor_register where DOCTOR_USERNAME='".$_SESSION['username']."'";
	}
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
	
	$pat_val=mysql_fetch_object(mysql_query("select * from doctor_personal_location_info where DOCTOR_ID='$rowid'"));
	$img_name=mysql_fetch_object(mysql_query("select DOCTOR_PHOTO from doctor_personal_info where DOCTOR_ID='$rowid'"));
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
<script type="text/javascript" src="getbday.js"></script>
<script type="text/javascript">
function add_edu()
{       
	if(document.getElementById('degree').value=='')
	{
		alert('Please Enter degree...');
		document.getElementById('degree').focus();
		return false;
	}
	else if(document.getElementById('acro').value=='')
	{
		alert('Please Enter Degree Aconym...');
		document.getElementById('acro').focus();
		return false;
	}
	else if(document.getElementById('year').value=='')
	{
		alert('Please Enter year...');
		document.getElementById('year').focus();
		return false;
	}
	else if(document.getElementById('clg').value=='')
	{
		alert('Please Enter college...');
		document.getElementById('clg').focus();
		return false;
	}
	showbday(document.getElementById('degree').value+'~'+document.getElementById('acro').value+'~'+document.getElementById('year').value+'~'+document.getElementById('clg').value,'show_degree');
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
	/*else if(document.getElementById('country').value=='')
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
	}*/
}
</script>
</head>
<body class="maina">
<!--div class="dashright"-->
<div class="content1">
	<form method="post" action="" name="docForm" onSubmit="return validate();">
	<table width="720" cellpadding="0" cellspacing="0" border="0">
		<tr>
            <td colspan="4"><h2 style="color:#003162;">Professional Information</h2></td>
          </tr>
		<tr>
		  <td colspan="4">&nbsp;</td>
		</tr> 
		  <tr>
            <td width="384" class="ntext">Degree <span class="red">*</span></td>
            <td width="384" class="ntext">Degree Acronym <span class="red">*</span></td>
            <td width="250" class="ntext">Year <span class="red">*</span></td>
			<td width="301" class="ntext">College <span class="red">*</span></td>
          </tr>
		 </table> 
		  <div id="show_degree">
		  <table width="720" cellpadding="0" cellspacing="0" border="0">
		  	<? 
				$get_det = mysql_query("select * from doctor_qualification_info where DOCTOR_ID='".$rowid."'");
				$i=1;
				while($get_val=mysql_fetch_object($get_det))
				{?>
				 <tr>
					<td style="width:160px;"><input type="text"  name="degree1" value="<?php print $get_val->DOCTOR_QUALIFICATION_DEGREE;?>" id="degree1"  maxlength="80" class="textfild-Sws" /></td>
					<td style="width:160px;"><input type="text"  name="acro1" value="<?php print $get_val->DOCTOR_DEGREE_ACRONYM;?>" id="acro1" class="textfild-Sws" maxlength="80" /></td>
					<td style="width:160px;"><input type="text"  name="year1" value="<?php print $get_val->DEGREE_YEAR;?>" id="year1" class="textfild-Sws" maxlength="80" /></td>
					 <td style="width:160px;"><input type="text"  name="clg1" value="<?php print $get_val->DEGREE_COLLEGE;?>" id="clg1" class="textfild-Sws" maxlength="80" /></td>
				  </tr>
				  <tr><td colspan="4">&nbsp;</td></tr>
			<? } ?>
			</table>
		  </div>
		  <table width="720" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td style="width:160px;"><input type="text"  name="degree" value="" id="degree"  maxlength="80" class="textfild-Sws" /></td>
            <td style="width:160px;"><input type="text"  name="acro" value="" id="acro" class="textfild-Sws" maxlength="80" /></td>
            <td style="width:160px;"><input type="text"  name="year" value="" id="year" class="textfild-Sws" maxlength="80" /></td>
			 <td style="width:160px;"><input type="text"  name="clg" value="" id="clg" class="textfild-Sws" maxlength="80" /></td>
          </tr>
		  <tr>
		  	<td colspan="3" class="ntext" align="left"><span class="red"><i>* Please clcik on <strong>Add Record</strong> before updating your Professional information.</i></span></td>
            <td align="right"><input type="button" value="Add Record" name="submit" class="but-blue1" onClick="add_edu();" /></td>
          </tr>
            <tr>
              <td colspan="4">&nbsp;</td>
            </tr>
            
            <tr>
              <td colspan="4" class="ntext">Speciality <span class="red">*</span></td>
            </tr>
			<tr>
              <td colspan="4"><select name="specal" id="specal" class="drop3">
				<option value="" selected="selected" >Select</option>
				<option value="Cardiac Surgeon" <?php if($pat_val->DOCTOR_SPECIALITY=='Cardiac Surgeon') { ?> selected="selected" <?php } ?> >Cardiac Surgeon</option>
				<option value="Cardiologist" <?php if($pat_val->DOCTOR_SPECIALITY=='Cardiologist') { ?> selected="selected" <?php } ?> >Cardiologist</option>
				<option value="Consultant Physician" <?php if($pat_val->DOCTOR_SPECIALITY=='Consultant Physician') { ?> selected="selected" <?php } ?> >Consultant Physician</option>
				<option value="Dentist" <?php if($pat_val->DOCTOR_SPECIALITY=='Dentist') { ?> selected="selected" <?php } ?> >Dentist</option>
				<option value="Dermatologists" <?php if($pat_val->DOCTOR_SPECIALITY=='Dermatologists') { ?> selected="selected" <?php } ?> >Dermatologists</option>
				<option value="Ear-Nose-Throat Doctors" <?php if($pat_val->DOCTOR_SPECIALITY=='Ear-Nose-Throat Doctors') { ?> selected="selected" <?php } ?> >Ear-Nose-Throat Doctors</option>
				<option value="Endocrinologists" <?php if($pat_val->DOCTOR_SPECIALITY=='Endocrinologists') { ?> selected="selected" <?php } ?> >Endocrinologists</option>
				<option value="Eye/ Ophthalmologist" <?php if($pat_val->DOCTOR_SPECIALITY=='Eye/ Ophthalmologist') { ?> selected="selected" <?php } ?> >Eye/ Ophthalmologist</option>
				<option value="Gastroenterologists" <?php if($pat_val->DOCTOR_SPECIALITY=='Gastroenterologists') { ?> selected="selected" <?php } ?> >Gastroenterologists</option>
				<option value="Gynecologist/ Obstetrician" <?php if($pat_val->DOCTOR_SPECIALITY=='Gynecologist/ Obstetrician') { ?> selected="selected" <?php } ?> >Gynecologist/ Obstetrician</option>
				<option value="Infertility Specialist" <?php if($pat_val->DOCTOR_SPECIALITY=='Infertility Specialist') { ?> selected="selected" <?php } ?> >Infertility Specialist</option>
				<option value="Nephrologists" <?php if($pat_val->DOCTOR_SPECIALITY=='Nephrologists') { ?> selected="selected" <?php } ?> >Nephrologists</option>
				<option value="Neurologists" <?php if($pat_val->DOCTOR_SPECIALITY=='Neurologists') { ?> selected="selected" <?php } ?> >Neurologists</option>
				<option value="Neurosurgeon" <?php if($pat_val->DOCTOR_SPECIALITY=='Neurosurgeon') { ?> selected="selected" <?php } ?> >Neurosurgeon</option>
				<option value="Oncologists" <?php if($pat_val->DOCTOR_SPECIALITY=='Oncologists') { ?> selected="selected" <?php } ?> >Oncologists</option>
				<option value="Orthopedics" <?php if($pat_val->DOCTOR_SPECIALITY=='Orthopedics') { ?> selected="selected" <?php } ?> >Orthopedics</option>
				<option value="Pain Management" <?php if($pat_val->DOCTOR_SPECIALITY=='Pain Management') { ?> selected="selected" <?php } ?> >Pain Management</option>
				<option value="Pathologist" <?php if($pat_val->DOCTOR_SPECIALITY=='Pathologist') { ?> selected="selected" <?php } ?> >Pathologist</option>
				<option value="Pediatric Neurologist" <?php if($pat_val->DOCTOR_SPECIALITY=='Pediatric Neurologist') { ?> selected="selected" <?php } ?> >Pediatric Neurologist</option>
				<option value="Pediatricians" <?php if($pat_val->DOCTOR_SPECIALITY=='Pediatricians') { ?> selected="selected" <?php } ?> >Pediatricians</option>
				<option value="Phlebologist" <?php if($pat_val->DOCTOR_SPECIALITY=='Phlebologist') { ?> selected="selected" <?php } ?> >Phlebologist</option>
				<option value="Plastic Surgeon" <?php if($pat_val->DOCTOR_SPECIALITY=='Plastic Surgeon') { ?> selected="selected" <?php } ?> >Plastic Surgeon</option>
				<option value="Psychiatrists" <?php if($pat_val->DOCTOR_SPECIALITY=='Psychiatrists') { ?> selected="selected" <?php } ?> >Psychiatrists</option>
				<option value="Pulmonologists" <?php if($pat_val->DOCTOR_SPECIALITY=='Pulmonologists') { ?> selected="selected" <?php } ?> >Pulmonologists</option>
				<option value="Radiologists" <?php if($pat_val->DOCTOR_SPECIALITY=='Radiologists') { ?> selected="selected" <?php } ?> >Radiologists</option>
				<option value="Rheumatology" <?php if($pat_val->DOCTOR_SPECIALITY=='Rheumatology') { ?> selected="selected" <?php } ?> >Rheumatology</option>
				<option value="Surgeon" <?php if($pat_val->DOCTOR_SPECIALITY=='Surgeon') { ?> selected="selected" <?php } ?> >Surgeon</option>
				<option value="Urologists" <?php if($pat_val->DOCTOR_SPECIALITY=='Urologists') { ?> selected="selected" <?php } ?> >Urologists</option>
			</select></td>
            </tr>	
			<tr>
              <td colspan="4">&nbsp;</td>
            </tr>
			<tr>
            <td colspan="4" class="ntext">Expertise 1 <span class="red">*</span></td>
		  </tr>
		  <tr>
			<td colspan="4"><input type="text" class="textfiled-M" name="expertise1" id="expertise1" value="<?php print $pat_val->DOCTOR_EXPERTISE1;?>" maxlength="200" /></td>
		  </tr>
		  <tr>
		  <td colspan="4">&nbsp;</td>
		  </tr>
		  <tr>
            <td colspan="4" class="ntext">Expertise 2 <span class="red">*</span></td>
		  </tr>
		  <tr>
			<td colspan="4"><input type="text" class="textfiled-M" name="expertise2" id="expertise2" value="<?php print $pat_val->DOCTOR_EXPERTISE2;?>" maxlength="200" /></td>
		  </tr>
		  <tr>
		  <td colspan="4">&nbsp;</td>
		  </tr>
		  <tr>
            <td colspan="4" class="ntext">Experience Description <span class="red">*</span></td>
		  </tr>
		  <tr>
			<td colspan="4"><textarea name="exp_desc" id="exp_desc" rows="4" cols="45"><?php print $pat_val->DOCTOR_EXP_DESC;?></textarea></td>
		  </tr>
		  <tr>
		  <td colspan="4">&nbsp;</td>
		  </tr>
		  <tr>
              <td colspan="4" class="ntext">Awards <span class="red">*</span></td>
          </tr>
          <tr>
              <td colspan="4">
				<textarea name="awards" id="awards" rows="4" cols="45"><?php print $pat_val->DOCTOR_AWARDS;?></textarea></td>
            </tr>
			<tr>
              <td colspan="4">&nbsp;</td>
            </tr>
			<tr>
              <td colspan="4" class="ntext">Certification <span class="red">*</span></td>
            </tr>
            <tr>
              <td colspan="4">
				<textarea name="certification" id="certification" rows="4" cols="45"><?php print $pat_val->DOCTOR_CCERTIFICATION;?></textarea></td>
            </tr>
			<tr>
              <td colspan="4">&nbsp;</td>
            </tr>
			<tr>
              <td align="right" style="float:right; margin-right:20px; margin-top:0;"><input type="reset" value="Reset" name="submi" class="but-gray" style="margin-right:10px;" /></td>
                <td colspan="3"><input type="submit" value="Update" name="submit" class="but-blue" /></td>
            </tr>
			</table>
        </form>		
		</div>
		<!--/div-->
</body>
</html>
<?php 
	if(isset($_POST['submit']))
	{
		$rowcount=mysql_num_rows(mysql_query("select * from doctor_personal_location_info where DOCTOR_ID='".$rowid."'"));
		if($rowcount>=1)
		{	 	
			$personal_info=mysql_query("update doctor_personal_location_info set DOCTOR_SPECIALITY='".$_POST['specal']."', DOCTOR_EXPERTISE1='".$_POST['expertise1']."', DOCTOR_EXPERTISE2='".$_POST['expertise2']."', DOCTOR_EXP_DESC='".$_POST['exp_desc']."', DOCTOR_AWARDS='".$_POST['awards']."', DOCTOR_CCERTIFICATION='".$_POST['certification']."', DOCTOR_RECORD_DATE='".date('Y-m-d')."' where DOCTOR_ID='".$rowid."'"); 
			
			if($personal_info==1) 
			{
				$update_id=$_REQUEST['update_id'];
				print("<script language='javascript'>alert('Professional Information updated successfully'); window.location.href='professional_info.php?update_id=$update_id';</script>");
			}
		}
		else
		{	 
			$personal_info=mysql_query("insert into doctor_personal_location_info (DOCTOR_ID,DOCTOR_SPECIALITY,DOCTOR_EXPERTISE1,DOCTOR_EXPERTISE2,DOCTOR_EXP_DESC,DOCTOR_AWARDS,DOCTOR_CCERTIFICATION,DOCTOR_RECORD_DATE) values('".$rowid."','".$_POST['specal']."','".$_POST['expertise1']."','".$_POST['expertise2']."','".$_POST['exp_desc']."','".$_POST['awards']."','".$_POST['certification']."','".date('Y-m-d')."')");
			
			$sel_identity=mysql_fetch_object(mysql_query("select DOCTOR_IDENTITY from doctor_register where DOCTOR_ID='".$rowid."'"));
			if($sel_identity->DOCTOR_IDENTITY=='')
			{
			$update_registration = mysql_query("update doctor_register set DOCTOR_FLAG='2' where DOCTOR_ID='".$rowid."' ");
			$update_login = mysql_query("update login set USER_FLAG='2' where USER_UN_ID='".$rowid."' and USER_TYPE='D' ");
			}
			
			if($img_name->DOCTOR_PHOTO=='noImage.gif')
			{
				$pic_name=$_POST['specal'].'.png';
				$update_pic=mysql_query("update doctor_personal_info set DOCTOR_PHOTO='".$pic_name."' where DOCTOR_ID='".$rowid."'");
			}
			
			if($personal_info==1)
			{
				$update_id=$_REQUEST['update_id'];
				print("<script language='javascript'>alert('Professional Information added successfully'); window.location.href='professional_info.php?update_id=$update_id';</script>");
			}
		}
	}
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
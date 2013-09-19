<?php
include("config/config.php");
if($_SESSION['username'])
{
	//$get_bid=mysql_fetch_object(mysql_query("select USER_UN_ID from login where USER_TYPE='".$_SESSION['user_type']."' and USERNAME='".$_SESSION['username']."' and USER_FLAG=0"));
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
</head>
<body>
<div class="maina">
<div class="midcontainer1">
			
<div class="doctor_M">
<form name="signup" method="post" action="search_list.php" onSubmit="">
<table width="700" cellpadding="0" cellspacing="0"> 
			<tr>
				<td colspan="9"><h2 style="color:#003162;">Search Doctor(s) </h2></td>
			</tr>
		  <tr>
            <td colspan="9" height="6"></td>
          </tr>        
		  <tr>
			<td width="227">Name</td>
		  </tr>
		  <tr>
			<td class="">
			<input type="text" name="doc_name" id="doc_name"  class="textfiled-M" value=""  placeholder="Type The Doctor Name"/>
			</td>
		  </tr>
		  <tr>
            <td colspan="9">&nbsp;</td>
          </tr> 
		  <tr>
			<td width="227">Speciality</td>
		  </tr>
		  <tr>
			<td class="">
			<select name="speciality" id="speciality" onChange="" class="drop2">
				<option value="" >Search by speciality</option>
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
			</select>
			</td>
		  </tr>
		  <tr>
			<td width="227">City</td>
		  </tr>
		  <tr>
			<td class="">
			<?php $sel_city=mysql_query("select CITY_ID,CITY_NAME from city_table"); ?>
			<select name="city" id="city" onChange="" class="drop2">
				<option value="">Search by city</option>
				<?php while($city=mysql_fetch_object($sel_city)) { ?>
					<option value="<?=$city->CITY_ID?>"><?=$city->CITY_NAME?></option>
				<?php } ?>
			</select>
			</td>
		  </tr>
		  <tr>
		  <td><input class="but-blue" type="submit" name="submit" value="Search"></td>
		  </tr>
		  </table>
</form>
     
</div>								
</div>
</div>  
</body>
</html>
<?php
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
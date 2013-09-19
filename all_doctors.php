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
<script type="text/javascript" src="getFile1.js"></script>
<script type="text/javascript" src="getstate.js"></script>
<script type="text/javascript" src="advance_search.js"></script>
<script type="text/javascript" src="scw.js"></script>
<script language="javascript">
function name1()
{
	if(document.getElementById('s1').checked) 
	{
		document.getElementById('spec').style.display = "block";
		document.getElementById('spec').style.visibility = "visible";
		document.getElementById('byname').style.display = "none";
		document.getElementById('byname').style.visibility = "hidden";
		document.getElementById('byproblem').style.display = "none";
		document.getElementById('byproblem').style.visibility = "hidden";  
		document.getElementById('doc_name').value='';
		document.getElementById('prob_name').value='';
	}
	else if(document.getElementById('s2').checked) 
	{
		document.getElementById('spec').style.display = "none";
		document.getElementById('spec').style.visibility = "hidden";
		document.getElementById('byname').style.display = "block";
		document.getElementById('byname').style.visibility = "visible";
		document.getElementById('byproblem').style.display = "none";
		document.getElementById('byproblem').style.visibility = "hidden";
		document.getElementById('speciallity').value='';
		document.getElementById('prob_name').value='';
	}
	else if(document.getElementById('s3').checked) 
	{
		document.getElementById('spec').style.display = "none";
		document.getElementById('spec').style.visibility = "hidden";
		document.getElementById('byname').style.display = "none";
		document.getElementById('byname').style.visibility = "hidden";
		document.getElementById('byproblem').style.display = "block";
		document.getElementById('byproblem').style.visibility = "visible";
		document.getElementById('speciallity').value='';
		document.getElementById('doc_name').value='';
	}
}
function search_list()
{
	if(document.getElementById('s1').checked) 
	{
		if(document.getElementById('speciallity').value=='')
		{
			alert('please select speciality');
			return false;
		}
		else
		{
			search_det(document.getElementById('speciallity').value+'~'+document.getElementById('city').value+'~'+document.getElementById('area').value+'^'+'speciallity','div_search');
		}
	}
	else if(document.getElementById('s2').checked) 
	{
		if(document.getElementById('doc_name').value=='')
		{
			alert('please select doctor name');
			return false;
		}
		else
		{
			search_det(document.getElementById('doc_name').value+'~'+document.getElementById('city').value+'~'+document.getElementById('area').value+'^'+'name','div_search');
		}
	}
	else if(document.getElementById('s3').checked) 
	{
		if(document.getElementById('prob_name').value=='')
		{
			alert('please select problem name');
			return false;
		}
		else
		{
			search_det(document.getElementById('prob_name').value+'~'+document.getElementById('city').value+'~'+document.getElementById('area').value+'^'+'problem','div_search');
		}
	}
}
</script>
</head>
<body bgcolor="">
<div class="main">
<?php include('header.php'); ?>
<div class="clear"></div>
<div class="topcontainer">
<!--div class="dashR"-->
<!--ul><li style="background:none;">
<a href="#">Home</a> </li>
<li><a href="#"> My Account</a></li>
<li class="current"><a href="#"> Upcoming Appointment</a></li>
</ul-->&nbsp;<!--/div--></div>
<div class="dashM">
<form name="search1" method="post" action="" >

<table width="100%" cellpadding="0" cellspacing="0" border="0"> 
			<tr>
            <td colspan="4"><h2 style="color:#003162;">Search Doctor(s) </h2></td>
          </tr> 
		  <tr>
            <td colspan="4">&nbsp;</td>
          </tr>        
        
		   <tr>
            <td colspan="4">&nbsp;</td>
          </tr> 
          <tr>
           <td width="26%"><input type="radio" name="search" id="s1" value="1" onclick="name1();" />&nbsp;&nbsp;Speciality </td>
           <td width="24%"><input type="radio" name="search" id="s2" value="2" onclick="name1();" />&nbsp;&nbsp;Name </td>
		<td width="8%"><input type="radio" name="search" id="s3" value="3" onclick="name1();" />&nbsp;&nbsp;Problem</td>
		<td width="42%">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="4">&nbsp;</td>
          </tr>
			<tr>  
			<td colspan="4"> <div id="spec" style="display:none;"> 
			<select name="speciallity" id="speciallity" onChange="" class="drop2" >
				<option value="">Search by Speciality </option>
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
			</div> </td></tr>
		   <tr> <td colspan="4"> <div id="byname" style="display:none;">
				<input type="text" size="25" name="doc_name" id="doc_name"  class="textfiled-SL1" value=""   maxlength="80"  placeholder="Type The Doctor Name"/>
			</div> </td> </tr>
		   <tr> <td colspan="4"> <div id="byproblem" style="display:none;"> 
							
				<input type="text" class="textfiled-SL1" size="50" name="prob_name" id="prob_name" value=""   maxlength="100" placeholder="Or find doctor by problem (e.g. diabetes)"/> 
					</div>
	         </td>
			  </tr>
					<tr>
					<td>
					<select name="city" id="city" onChange="showUser1(this.value,'search_area_list');" class="drop2">
						<option value="" >Search in City</option>
						<?php $get_City=mysql_query("SELECT CITY_NAME,CITY_ID FROM city_table"); 
						while($val=mysql_fetch_object($get_City)){
						?>
							<option value="<?=$val->CITY_ID?>"><?=$val->CITY_NAME?></option>
						<? } ?>
					</select>
					</td>
					<td>
					<div id="search_area_list">
					<select name="area" id="area" class="drop2">
						<option value="" >Search in Area/Locality</option>
					</select>
					</div>
					</td>
			<td><input class="but-search" type="button1" onclick="search_list();"  /></td>
			<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="4">&nbsp;</td>
			</tr> 
		 </table> 
		  
		  
	<div id="div_search">
	<table width="100%" cellpadding="0" cellspacing="0" border="0"> 
	<tr>
		<td colspan="4" height="6"></td>
	</tr>
	<tr>
		<? 
		//"select * from doctor_register where DOCTOR_FLAG=0 order by DOCTOR_ID DESC"
		$sel_doc=mysql_query("select * from doctor_register,doctor_personal_location_info where doctor_register.DOCTOR_ID=doctor_personal_location_info.DOCTOR_ID and DOCTOR_SPECIALITY!='' and DOCTOR_FLAG=0 order by doctor_register.DOCTOR_ID DESC");
		$count=0;
		while($val=mysql_fetch_object($sel_doc))
		{
			$special = mysql_fetch_object(mysql_query("select DOCTOR_SPECIALITY from doctor_personal_location_info where DOCTOR_ID='".$val->DOCTOR_ID."'"));
			$pic=mysql_fetch_object(mysql_query("select * from doctor_personal_info where DOCTOR_ID='".$val->DOCTOR_ID."'"));
			$city_name=mysql_fetch_object(mysql_query("select CITY_NAME from doctor_personal_info,city_table where DOCTOR_CITY=CITY_ID and DOCTOR_ID='".$val->DOCTOR_ID."'"));
			$country_name=mysql_fetch_object(mysql_query("select COUNTRY_NAME from country_table,doctor_personal_info where DOCTOR_CONTRY=COUNTRY_ID and DOCTOR_ID='".$val->DOCTOR_ID."'"));
		?>
		<td colspan="4">
		  <table width="185" border="0" style="border:solid 1px #e7e7e7;">
          
		  <tr>
					<td align="center" height="25" bgcolor="#c6eafe" colspan="4" class="image1"><strong><? if($special->DOCTOR_SPECIALITY!='') { print $special->DOCTOR_SPECIALITY; } else { print 'General'; } ?></strong></td>
				</tr>
                <tr><td height="6"></td></tr>
				<tr>
					<td align="center" height="90" colspan="4"><div class="img_border"><img src="uploads/<? if($pic->DOCTOR_PHOTO!='') { print $pic->DOCTOR_PHOTO; } else { print 'noImage.gif'; } ?>" width="110" height="90"  /></div></td>
				</tr>
                <tr><td height="8" colspan="2"></td></tr>
				<tr>
					<td width="6" valign="top" class="text1"></td>
				    <td width="55" valign="top" class="text1">Name</td>
			      <td width="7" valign="top" class="text1">:</td>
				  <td width="97" valign="top" class="text1">Dr. <? print $val->DOCTOR_FIRST_NAME.' '.$val->DOCTOR_LAST_NAME;?></td>
			  </tr>
				<tr>
					<td width="6" valign="top" class="text1"></td>
				    <td width="55" valign="top" class="text1">City</td>
			      <td width="7" valign="top" class="text1">:</td>
				  <td valign="top" width="97" class="text1"><? print $city_name->CITY_NAME;?></td>
			  </tr>
				<tr>
					<td width="6" valign="top" class="text1"></td>
				    <td width="55" valign="top" class="text1">Practicing</td>
			      <td width="7" valign="top" class="text1">:</td>
				  <td valign="top" width="97" class="text1"><? print $pic->DOCTOR_EXP; ?> years</td>
			  </tr>
				<tr>
					<td width="6" height="" valign="top" class="text1"></td>
				    <td width="55" height="" valign="top" class="text1">Address</td>
			      <td width="7" valign="top" class="text1">:</td>
				  <td height="50" valign="top" width="97" class="text1"><? print $pic->DOCTOR_ADDRESS.', '.$city_name->CITY_NAME.', '.$country_name->COUNTRY_NAME; ?> </td>
			  </tr>
				<tr>
				  <td  valign="top" class="text1"></td>
				  <td height="" valign="top" class="text1">&nbsp;</td>
				  <td valign="top" class="text1">&nbsp;</td>
				  <td  valign="top" class="text3" align="right"><a href="doctor_view.php?id=<?=$val->DOCTOR_ID?>">View More..</a></td>
			  </tr>
			</table>		
		</td>
		<td width="80%"><div class="line_doc"></div></td>
		<?php if($count==4) { ?> <tr><td colspan="4">&nbsp;</td></tr>   </tr> <tr> <?php $count=0; } else { $count=$count+1; }
		}
		?>
	</tr>
	</table>
	</div>
	
	

</form>

</div>
<?php include('footer.php'); ?>
</div>
</body>
</html>
	

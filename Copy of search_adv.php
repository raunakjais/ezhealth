<?php
error_reporting(0);
include("config/config.php");
 $q=explode('^',$_GET["q"]);
 $qq=explode('~',$q[0]);
 ?>
 <table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<th width="157" class="timetabH4">Name</th>
				<th width="238" class="timetabH4">Specialist</th>
				<th width="175" class="timetabH4">City</th>
				<th width="121" class="timetabH4">Experience</th>
				<th width="160" class="timetabH4">Fees</th>
				<th width="322" class="timetabH4">Address</th>
				<th width="142" class="timetabH4">Book Online</th>
		  </tr>
 <?php
	if($q[1]=='speciallity')
	{
		$condition='';
		if($qq[0]!='')
		{
			$condition = $condition. "DOCTOR_SPECIALITY='".$qq[0]."' and ";
		}
		if($qq[1]!='')
		{
			$condition = $condition. "DOCTOR_CITY='".$qq[1]."' and ";
		}
		if($qq[2]!='')
		{
			$condition = $condition. "DOCTOR_AREA='".$qq[2]."' and ";
		}
		$sel_query=mysql_query("select DOCTOR_SPECIALITY,DOCTOR_ADDRESS,DOCTOR_CITY,DOCTOR_AREA,DOCTOR_EXP,DOCTOR_FEES,doctor_personal_info.DOCTOR_ID from doctor_personal_location_info,doctor_personal_info where ".$condition." doctor_personal_location_info.DOCTOR_ID=doctor_personal_info.DOCTOR_ID and DOCTOR_FLAG=0");
		$count=mysql_num_rows($sel_query);
		if($count==0)
		{?>
			<tr>
				<td style="font-family:'Times New Roman', Times, serif; font-size:18px; color:#FF0000;" colspan="7" align="center">No Record found...</td>
			  </tr>
		<? }
		else
		{
			while($val=mysql_fetch_object($sel_query))
			{
			$get_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME,DOCTOR_MOBILE_NUMBER from doctor_register where DOCTOR_ID='".$val->DOCTOR_ID."'"));
		?>
			  <tr>
				<td class="timetabH2"><?php print $get_name->DOCTOR_FIRST_NAME.' '.$get_name->DOCTOR_LAST_NAME;?></td>
				<td class="timetabH1"><?php print $val->DOCTOR_SPECIALITY;?></td>
				<td class="timetabH2"><?php print $val->DOCTOR_CITY;?></td>
				<td class="timetabH1"><?php print $val->DOCTOR_EXP;?></td>
				<td class="timetabH2"><?php print $val->DOCTOR_FEES;?></td>
				<td class="timetabH1"><?php print $val->DOCTOR_ADDRESS;?></td>
				<td class="timetabH2"> 
					<?php if($_SESSION['username']=='') { ?>
					<a onclick="alert('Please login to Book an appointment...'); window.location.href='index.php';" style="text-decoration:none; color:#999999; cursor:pointer;" >Book Now</a> <? } else { ?> <a href="book_now.php?id=<?=$val->DOCTOR_ID?>" style="text-decoration:none; color:#999999;">Book Now</a> <? } ?>
				</td>
				
				
				
				
			  </tr>
		<?php  
			}
		}
	}
	if($q[1]=='name')
	{
		$condition='';
		if($qq[0]!='')
		{
			$condition = $condition. "DOCTOR_FIRST_NAME LIKE '%".$qq[0]."%' and ";
		}
		if($qq[1]!='')
		{
			$condition = $condition. "DOCTOR_CITY='".$qq[1]."' and ";
		}
		if($qq[2]!='')
		{
			$condition = $condition. "DOCTOR_AREA='".$qq[2]."' and ";
		}
		$sel_query=mysql_query("select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME,DOCTOR_MOBILE_NUMBER,DOCTOR_ADDRESS,DOCTOR_CITY,DOCTOR_AREA,DOCTOR_EXP,DOCTOR_FEES,doctor_register.DOCTOR_ID from doctor_register,doctor_personal_info where ".$condition." doctor_register.DOCTOR_ID=doctor_personal_info.DOCTOR_ID and doctor_register.DOCTOR_FLAG=0");
		$count=mysql_num_rows($sel_query);
		if($count==0)
		{?>
			<tr>
				<td style="font-family:'Times New Roman', Times, serif; font-size:18px; color:#FF0000;" colspan="7" align="center">No Record found...</td>
			  </tr>
		<? }
		else
		{
			while($val=mysql_fetch_object($sel_query))
			{
			$get_specialist=mysql_fetch_object(mysql_query("select DOCTOR_SPECIALITY from doctor_personal_location_info where DOCTOR_ID='".$val->DOCTOR_ID."'"));
		?>
			  <tr>
				<td class="timetabH2"><?php print $val->DOCTOR_FIRST_NAME.' '.$val->DOCTOR_LAST_NAME;?></td>
				<td class="timetabH1"><?php print $get_specialist->DOCTOR_SPECIALITY;?></td>
				<td class="timetabH2"><?php print $val->DOCTOR_CITY;?></td>
				<td class="timetabH1"><?php print $val->DOCTOR_EXP;?></td>
				<td class="timetabH2"><?php print $val->DOCTOR_FEES;?></td>
				<td class="timetabH1"><?php print $val->DOCTOR_ADDRESS;?></td>
				<td class="timetabH2">
					<?php if($_SESSION['username']=='') { ?>
					<a onclick="alert('Please login to Book an appointment...'); window.location.href='index.php';" style="text-decoration:none; color:#999999; cursor:pointer;" >Book Now</a> <? } else { ?> <a href="book_now.php?id=<?=$val->DOCTOR_ID?>" style="text-decoration:none; color:#999999;">Book Now</a> <? } ?>
				</td>
			  </tr>
		<?php  
			}
		}  
	}

if($q[1]=='problem')
	{
		$condition='';
		if($qq[0]!='')
		{
			$condition = $condition. "DOCTOR_EXPERTISE1 LIKE '%".$qq[0]."%' and";
		}
		if($qq[1]!='')
		{
			$condition = $condition. "DOCTOR_CITY='".$qq[1]."' and ";
		}
		if($qq[2]!='')
		{
			$condition = $condition. "DOCTOR_AREA='".$qq[2]."' and ";
		}
		$sel_query=mysql_query("select DOCTOR_SPECIALITY,DOCTOR_ADDRESS,DOCTOR_CITY,DOCTOR_AREA,DOCTOR_EXP,DOCTOR_FEES,doctor_personal_info.DOCTOR_ID from doctor_personal_location_info,doctor_personal_info where ".$condition." doctor_personal_info.DOCTOR_ID=doctor_personal_location_info.DOCTOR_ID");
		$count=mysql_num_rows($sel_query);
		if($count==0)
		{?>
			<tr>
				<td style="font-family:'Times New Roman', Times, serif; font-size:18px; color:#FF0000;" colspan="7" align="center">No Record found...</td>
			  </tr>
		<? }
		else
		{
			while($val=mysql_fetch_object($sel_query))
			{
			$get_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME,DOCTOR_MOBILE_NUMBER from doctor_register where DOCTOR_ID='".$val->DOCTOR_ID."'"));
		?>
			  <tr>
				<td class="timetabH2"><?php print $get_name->DOCTOR_FIRST_NAME.' '.$get_name->DOCTOR_LAST_NAME;?></td>
				<td class="timetabH1"><?php print $val->DOCTOR_SPECIALITY;?></td>
				<td class="timetabH2"><?php print $val->DOCTOR_CITY;?></td>
				<td class="timetabH1"><?php print $val->DOCTOR_EXP;?></td>
				<td class="timetabH2"><?php print $val->DOCTOR_FEES;?></td>
				<td class="timetabH1"><?php print $val->DOCTOR_ADDRESS;?></td>
				<td class="timetabH2">
					<?php if($_SESSION['username']=='') { ?>
					<a onclick="alert('Please login to Book an appointment...'); window.location.href='index.php';" style="text-decoration:none; color:#999999; cursor:pointer;" >Book Now</a> <? } else { ?> <a href="book_now.php?id=<?=$val->DOCTOR_ID?>" style="text-decoration:none; color:#999999;">Book Now</a> <? } ?>
				</td>
			  </tr>
		<?php  
			}
		}   
	}
?>

</table>
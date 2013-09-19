<?php include("config/config.php"); ?>
<html>
<head>
<link href="styles/css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
	$term = strip_tags(substr($_POST['searchit'],0, 100));
	$term = mysql_escape_string($term); // Attack Prevention
	if($term!="")
	{
		$query = mysql_query("select * from doctor_register,doctor_personal_location_info where DOCTOR_DISPLAY_NAME like '%{$term}%' and doctor_register.DOCTOR_ID=doctor_personal_location_info.DOCTOR_ID and DOCTOR_SPECIALITY!='' and DOCTOR_FLAG=0");
		$query1 = mysql_query("select * from business_info where BUSINESS_LOCATION_TITLE like '%{$term}%' and BUSINESS_FLAG=0");
	$string = '';
	 
	if(mysql_num_rows($query) || mysql_num_rows($query1))
	{
			   while($row = mysql_fetch_array($query))
				{
				$get_pic=mysql_fetch_object(mysql_query("select DOCTOR_PHOTO,DOCTOR_ADDRESS from doctor_personal_info where DOCTOR_ID='".$row['DOCTOR_ID']."'"));
			?>
			<table bgcolor="#E9E9E9" width="100%"   >
			<tr onMouseOver="this.style.backgroundColor='#FFF'; this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#E9E9E9'"; > 
						<td width="60" align="left" valign="middle"> 
							<img src="uploads/<?php
							 if($get_pic->DOCTOR_PHOTO!="")
							 { 
							 print $get_pic->DOCTOR_PHOTO;
							 }
							 else
							 {	 
							 print "noImage.gif";  
							 }
							 ?> " height="50px" width="50px"/>	</td>
						<td width="1245" height="50" align="left"> <h2> 
						  <a class="search1" style="text-decoration:none; font-family:Calibri; color:#666666; size:25px;" href="doctor_view.php?id=<? print $row['DOCTOR_ID']?>"> Dr. <? print $row['DOCTOR_FIRST_NAME']; ?>&nbsp;<?php print '( '.$row['DOCTOR_SPECIALITY'].' )';?></a></h2>
						   <span style="font-size:15px; font-style:italic; font-family:Calibri;"> <?php print $get_pic->DOCTOR_ADDRESS; ?></span>
						
						</td>
			</tr> 
			</table>  <?
		
				}
				
				while($row1 = mysql_fetch_object($query1))
				{
				//$get_pic=mysql_fetch_object(mysql_query("select BUSINESS_PHOTO,BUSINESS_ADDRESS from business_info where DOCTOR_ID='".$row['DOCTOR_ID']."'"));
			?>
			<table bgcolor="#E9E9E9" width="100%"   >
			<tr onMouseOver="this.style.backgroundColor='#FFF'; this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#E9E9E9'"; > 
						<td width="60" align="left" valign="middle"> 
							<img src="uploads/<?php
							 if($row1->BUSINESS_PHOTO!="")
							 { 
							 print $row1->BUSINESS_PHOTO;
							 }
							 else
							 {	 
							 print "noImage.gif";  
							 }
							 ?> " height="50px" width="50px"/>	</td>
						<td width="1245" height="50" align="left"> <h2> 
						  <a class="search1" style="text-decoration:none; font-family:Calibri; color:#666666; size:25px;" href="buss_view.php?id=<? print $row1->BUSINESS_ID?>"> <? print $row1->BUSINESS_LOCATION_TITLE; ?>&nbsp;</a></h2>
						   <span style="font-size:15px; font-style:italic; font-family:Calibri;"> <?php print $row1->BUSINESS_ADDRESS; ?></span>
						
						</td>
			</tr> 
			</table>  <?
		
				}
				
	}
	else
	{
	print  "No Matches Found!";
	}
	 
	//echo $string;
	}
	?>
	</body>
	</html>
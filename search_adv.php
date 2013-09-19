<?php
error_reporting(0);
include("config/config.php");
 $q=explode('^',$_GET["q"]);
 $qq=explode('~',$q[0]);
 ?>
 
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
		?>
			  				<table width="100%" cellpadding="0" cellspacing="0" border="0"> 
								<tr>
									<td colspan="4" height="6"></td>
								</tr>
								<tr>
									<? 
									$count=0;
									while($val=mysql_fetch_object($sel_query))
									{
									$get_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME,DOCTOR_MOBILE_NUMBER from doctor_register where DOCTOR_ID='".$val->DOCTOR_ID."'"));
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
											  <td width="97" valign="top" class="text1">Dr. <? print $get_name->DOCTOR_FIRST_NAME.' '.$get_name->DOCTOR_LAST_NAME;?></td>
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
											  <td  valign="top" class="text3" align="right"><?php if($_SESSION['user_type']=='P') { ?> <a href="book_now.php?id=<?=$val->DOCTOR_ID?>"> <?php } else { ?> <a href="doctor_view.php?id=<?=$val->DOCTOR_ID?>"> <? }?> View More..</a></td>
										  </tr>
										</table>		
									</td>
									<td width="80%"><div class="line_doc"></div></td>
									<?php if($count==4) { ?> <tr><td colspan="4">&nbsp;</td></tr>   </tr> <tr> <?php $count=0; } else { $count=$count+1; }
									}
									?> 
								</tr>
								</table>
		<?php  
			//}
		}
	}
	if($q[1]=='name')
	{
		$condition='';
		if($qq[1]!='')
		{
			$condition = $condition. "DOCTOR_CITY='".$qq[1]."' and ";
		}
		if($qq[2]!='')
		{
			$condition = $condition. "DOCTOR_AREA='".$qq[2]."' and ";
		}
		if($qq[1]!='' || $qq[2]!='')
		{
		$query="select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME,DOCTOR_MOBILE_NUMBER,DOCTOR_ADDRESS,DOCTOR_CITY,DOCTOR_AREA,DOCTOR_EXP,DOCTOR_FEES,doctor_register.DOCTOR_ID from doctor_register,doctor_personal_info where ".$condition." doctor_register.DOCTOR_ID=doctor_personal_info.DOCTOR_ID and doctor_register.DOCTOR_FLAG=0";
		}
		else
		{
		$query="select * from doctor_register where DOCTOR_DISPLAY_NAME LIKE '%".$qq[0]."%' and DOCTOR_FLAG=0";
		}
		//print $query;
		$sel_query=mysql_query($query);
		$count=mysql_num_rows($sel_query);
		if($count==0)
		{?>
			<tr>
				<td style="font-family:'Times New Roman', Times, serif; font-size:18px; color:#FF0000;" colspan="7" align="center">No Record found...</td>
			  </tr>
		<? }
		else
		{
		?>
			 				 <table width="100%" cellpadding="0" cellspacing="0" border="0"> 
								<tr>
									<td colspan="4" height="6"></td>
								</tr>
								<tr>
									<? 
									//"select * from doctor_register where DOCTOR_FLAG=0 order by DOCTOR_ID DESC"
									$count=0;
									while($val=mysql_fetch_object($sel_query))
									{
										$get_specialist=mysql_fetch_object(mysql_query("select DOCTOR_SPECIALITY from doctor_personal_location_info where DOCTOR_ID='".$val->DOCTOR_ID."'"));
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
											  <td  valign="top" class="text3" align="right"><?php if($_SESSION['user_type']=='P') { ?> <a href="book_now.php?id=<?=$val->DOCTOR_ID?>"> <?php } else { ?> <a href="doctor_view.php?id=<?=$val->DOCTOR_ID?>"> <? }?> View More..</a></td>
										  </tr>
										</table>		
									</td>
									<td width="80%"><div class="line_doc"></div></td>
									<?php if($count==4) { ?> <tr><td colspan="4">&nbsp;</td></tr>   </tr> <tr> <?php $count=0; } else { $count=$count+1; }
									}
									?>
								</tr>
								</table>
		<?php  
			//}
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
			
		?>
			  				<table width="100%" cellpadding="0" cellspacing="0" border="0"> 
								<tr>
									<td colspan="4" height="6"></td>
								</tr>
								<tr>
									<? 
									//"select * from doctor_register where DOCTOR_FLAG=0 order by DOCTOR_ID DESC"
									$count=0;
									while($val=mysql_fetch_object($sel_query))
									{
									$get_name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME,DOCTOR_MOBILE_NUMBER from doctor_register where DOCTOR_ID='".$val->DOCTOR_ID."'"));
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
											  <td width="97" valign="top" class="text1">Dr. <? print $get_name->DOCTOR_FIRST_NAME.' '.$get_name->DOCTOR_LAST_NAME;?></td>
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
											  <td  valign="top" class="text3" align="right"><?php if($_SESSION['user_type']=='P') { ?> <a href="book_now.php?id=<?=$val->DOCTOR_ID?>"> <?php } else { ?> <a href="doctor_view.php?id=<?=$val->DOCTOR_ID?>"> <? }?> View More..</a></td>
										  </tr>
										</table>		
									</td>
									<td width="80%"><div class="line_doc"></div></td>
									<?php if($count==4) { ?> <tr><td colspan="4">&nbsp;</td></tr>   </tr> <tr> <?php $count=0; } else { $count=$count+1; }
									}
									?>
								</tr>
								</table>
		<?php  
			//}
		}   
	}
?>

</table>
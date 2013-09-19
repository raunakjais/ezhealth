<?php
include("config/config.php");
$val=explode('~',$_GET['q']);
$doc_query=mysql_fetch_object(mysql_query("SELECT DOCTOR_ID from doctor_register where DOCTOR_USERNAME='".$_SESSION['username']."'"));
$doc_id = $doc_query->DOCTOR_ID;
if($val[4]=='show_degree')
{
	$insert_bday = mysql_query("insert into doctor_qualification_info (DOCTOR_ID,DOCTOR_QUALIFICATION_DEGREE,DOCTOR_DEGREE_ACRONYM,DEGREE_YEAR,DEGREE_COLLEGE,DOCTOR_DEGREE_RECORD_DATE) values ('".$doc_id."','".$val[0]."','".$val[1]."','".$val[2]."','".$val[3]."','".date('Y-m-d')."')");
}
?>
<table width="720" cellpadding="0" cellspacing="0" border="0">
<?
	$get_det = mysql_query("select * from doctor_qualification_info where DOCTOR_ID='".$doc_id."'");
	$i=1;
	while($get_val=mysql_fetch_object($get_det))
	{
	?>
	
		<tr>
					<td style="width:160px;"><input type="text"  name="degree1" value="<?php print $get_val->DOCTOR_QUALIFICATION_DEGREE;?>" id="degree1"  maxlength="80" class="textfild-Sws" /></td>
					<td style="width:160px;"><input type="text"  name="acro1" value="<?php print $get_val->DOCTOR_DEGREE_ACRONYM;?>" id="acro1" class="textfild-Sws" maxlength="80" /></td>
					<td style="width:160px;"><input type="text"  name="year1" value="<?php print $get_val->DEGREE_YEAR;?>" id="year1" class="textfild-Sws" maxlength="80" /></td>
					 <td style="width:160px;"><input type="text"  name="clg1" value="<?php print $get_val->DEGREE_COLLEGE;?>" id="clg1" class="textfild-Sws" maxlength="80" /></td>
				  </tr>
				  <tr><td colspan="4">&nbsp;</td></tr>
<?		
	$i = $i+1;
	}
?> 
<table>

<?php 
include("config/config.php");
$val=explode('~',$_GET['q']);
if($val[1]=='disp_pat')
{
	$va=explode('^',$val[0]);
	if($va[0]!='')
	{
		$condition = $condition. " FNAME = '".$va[0]."' and ";
	}
	if($va[1]!='')
	{
		$condition = $condition. " EMAIL_ID = '".$va[1]."' and ";
	}
	if($va[2]!='')
	{
		$condition = $condition. " MOBILE = '".$va[2]."' and ";
	}
	$query=mysql_query("select * from booking_details where ".$condition." FLAG=0 group by FNAME");
?>
	<table width="720" cellpadding="0" cellspacing="0" border="0" style="margin-left:10px;">
	 <tr style="color:#000000;" bgcolor="#CCCCCC">
	 	<td width="79">&nbsp;</td>
		<td width="227"><strong>First Name</strong></td>
		<td width="222"><strong>Email</strong></td>
		<td width="192"><strong>Mobile</strong></td>
	  </tr>
	  <? while($val=mysql_fetch_object($query)) { 
	  $bk_pt_id=mysql_fetch_object(mysql_query("select PATIENT_ID from booking where BOOKING_ID='".$val->BOOKING_ID."'"));
	  ?>
	  <tr style="color:#000000;" bgcolor="#CCCCCC">
	  	<td><input type="radio" name="fn" id="fn" onclick="getPat(<?=$val->BOOKING_ID?>,<?=$bk_pt_id->PATIENT_ID?>,'search_show');" /></td>
		<td><b><?=$val->FNAME?></b></td>
		<td><b><?=$val->EMAIL_ID?></b></td>
		<td><b><?=$val->MOBILE?></b></td>
	  </tr>  
	  <? } ?> 
	 </table>
<?	
}
?>


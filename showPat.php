<?php 
include("config/config.php");
$val=explode('~',$_GET['q']);
if($val[1]=='search_show')
{
	$va=explode('^',$val[0]);
	$get_bk_det=mysql_fetch_object(mysql_query("select * from booking_details where BOOKING_ID='".$va[0]."'"));
	$dob=explode('-',$get_bk_det->DOB);
	$pt=$dob[1].'/'.$dob[2].'/'.$dob[0];
?>
	<table width="720" cellpadding="0" cellspacing="0" border="0" style="margin-left:10px;">
	 <tr>
		<td width="203">First Name <span class="red">*</span></td>
		<td width="211">Middle Name</td>
		<td width="306">Last Name <span class="red">*</span></td>
	  </tr>
	  <tr>
		<td><input type="text" size="25" name="fname" id = "fname"  maxlength="80" class="textfild-S" required="required" value="<?=$get_bk_det->FNAME?>" />
		</td>
		<td><input type="text" size="25" name="mname" id = "mname" class="textfild-S" maxlength="80" value="<?=$get_bk_det->MNAME?>"/></td>
		<td><input type="text" size="25" name="lname" id = "lname" class="textfild-S" maxlength="80" required="required" value="<?=$get_bk_det->LNAME?>"/></td>
	  </tr>   
	  <tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	 <tr>
		<td colspan="3">Email-Id <span class="red">*</span></td>
	  </tr>
	  <tr>
		<td colspan="2"><input type="text" size="25" name="email" id="email"  maxlength="80" class="textfild-S" required="required" value="<?=$get_bk_det->EMAIL_ID?>" /></td>
		<td>&nbsp;</td>
	  </tr>        
	  <tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	 <tr>
		<td colspan="3">Mobile <span class="red">*</span></td>
	  </tr>
	  <tr>
		<td colspan="3"><input type="text" size="25" name="mobile" value="<?=$get_bk_det->MOBILE?>" id="mobile" required="required"  maxlength="10" class="textfild-S"  /></td>
	  </tr>  
	  <tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	 <tr>
		<td colspan="3">Date of Birth <span class="red">*</span></td>
	  </tr>
	  <tr>
		<td colspan="3"><input type="text" size="25" name="dob" value="<?=$pt?>" id="dob"  maxlength="80" class="textfild-S" required="required" onClick="scwShow(this,event);" />
		<input type="hidden" name="patient_id" id="patient_id" value="<?=$va[1]?>" />
		</td>
	  </tr>    
	 </table>
<?	
}
?>


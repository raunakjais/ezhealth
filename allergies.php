<?php 
include("config/config.php");
include("config/function.php");
if($_SESSION['username'])
{
	$user=mysql_fetch_object(mysql_query("select USER_UN_ID from login where USER_TYPE='".$_SESSION['user_type']."' and USERNAME='".$_SESSION['username']."'"));
	$user_id=$user->USER_UN_ID; 
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
<script type="text/javascript">
function validate()
{
	if(document.getElementById('consent').value=='')
	{
		alert('please select consent');
		return false;
	}
	else if(document.getElementById('allergy').value=='')
	{
		alert('please enter allergy details');
		return false;
	}
}
</script>
</head>
<body>
<div class="maina">
<div class="midcontainer1">
			
<div class="registrationform1">

<table width="100%" align="center">
<tr>
<td colspan="3"><h2 style="color:#003162;">Allergies</h2></td>
</tr>
<td colspan="3">&nbsp;</h1></td>
<tbody>
<tr>
<th class="timetabH4"  width="450px">Details</th>
<th class="timetabH4">Consent</th>
<th class="timetabH4">Date Added</th>
</tr>
<?php $sel_query=mysql_query("select * from patient_allergy where PATIENT_ID='".$user_id."'");
	while($val=mysql_fetch_object($sel_query))
	{
?>
<tr>
<td class="timetabH1"><?php print $val->ALLERGY_DETAILS; ?> </td>
<td class="timetabH1"><?php print $val->CONSENT; ?></td>
<td class="timetabH1"><?php print dateformat($val->CDATE); ?></td>
</tr>
<?php } ?>
</tbody>
</table>
<br>
<br>
<br>
<form method="post" name="" onsubmit="return validate();">
<input type="hidden" value="" name="">
<table width="100%" align="center">
<tr>
	<td style="float:left; padding:6px 5px; font-size:11px; margin:10px 10px 10px 0;"><strong>Consent:</strong> <span class="red">*</span></td>
<td>
	<select class="drop2" name="consent" id="consent">
		<option value="">Select Consent</option>
		<option value="Self">Self</option>
		<?php $sel_fam=mysql_query("select * from patient_family where PATIENT_ID='".$_SESSION['pat_id']."'");
		while($val=mysql_fetch_object($sel_fam))
		{
		?>
			<option value="<?php print $val->FNAME;?>"><?php print $val->FNAME;?></option>
		<? } ?>
	</select>
</td>
</tr>
<tbody>
<tr>
<td style="float:left; padding:6px 5px; font-size:11px; margin:10px 10px 10px 0;">
<strong>Details:</strong> <span class="red">*</span>
</td>
<td>
<textarea name="allergy" id="allergy" rows="3" cols="46"></textarea>
</td>
</tr>
<tr>
<td colspan="2">
<input class="but-blue" type="submit" name="submit" value="Add" >
</td>
</tr>
</tbody>
</table>
</form>
     
</div>								
</div>
</div>  
</body>
</html>
<?php
	if(isset($_POST['submit']))
	{	
		$insert_allergy=mysql_query("insert into patient_allergy (PATIENT_ID,CONSENT,ALLERGY_DETAILS,CUSER,CDATE) values ('".$user_id."','".$_REQUEST['consent']."','".$_POST['allergy']."','".$_SESSION['username']."','".date('Y-m-d')."')");
		if($insert_allergy==1)
		{
			print("<script language='javascript'>alert('inserted successfully...'); window.location.href='allergies.php';</script>");
		}
	}
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}

?>
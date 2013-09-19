<?php 
include("config/config.php");
$b_det=mysql_fetch_object(mysql_query("select * from doctor_register where DOCTOR_ID='".$_GET['id']."'")); 
$address=mysql_fetch_object(mysql_query("select * from doctor_personal_info where DOCTOR_ID='".$_GET['id']."'"));
$area=mysql_fetch_object(mysql_query("select AREA_NAME from area_table where AREA_ID='".$address->DOCTOR_AREA."'")); 
$city=mysql_fetch_object(mysql_query("select CITY_NAME from city_table where CITY_ID='".$address->DOCTOR_CITY."'")); 
$state=mysql_fetch_object(mysql_query("select STATE_NAME from state_table where STATE_ID='".$address->DOCTOR_STATE."'")); 
$country=mysql_fetch_object(mysql_query("select COUNTRY_NAME from country_table where COUNTRY_ID='".$address->DOCTOR_CONTRY."'")); 
$doc_special=mysql_fetch_object(mysql_query("select DOCTOR_SPECIALITY from doctor_personal_location_info where DOCTOR_ID='".$_GET['id']."'"));
$doc_exp=mysql_fetch_object(mysql_query("select DOCTOR_EXP,DOCTOR_AREA from doctor_personal_info where DOCTOR_ID='".$_GET['id']."'"));
$pic=mysql_fetch_object(mysql_query("select * from doctor_personal_info where DOCTOR_ID='".$_GET['id']."'"));
$_SESSION['dt']=$_REQUEST['dt'];
$_SESSION['bk_id']=$_REQUEST['bk_id'];
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
<script type="text/javascript">
function validate()
{
	if(document.getElementById('popusername').value=='')
	{
		alert('please enter username..');
		document.getElementById('popusername').focus();
		return false;
	}
	else if(document.getElementById('password').value=='')
	{
		alert('please enter password..');
		document.getElementById('password').focus();
		return false;
	}
	else
	{
		document.signup.submit();
	}
}
</script>
</head>
<body bgcolor="">
<div class="main">
<?php include('header_new.php'); ?>
<div class="clear"></div>
<div class="topcontainer">
<form name="signup" method="post" action="" onSubmit="">
	<table width="100%" align="center">
		<tr>
			<td valign="top" width="40%">
				<table width="100%" cellspacing="0" cellpadding="0">
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3"><h2 style="color:#003162;">Login</h2></td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td width="24%">Username</td>
						<td width="12%">&nbsp;</td>
					  <td width="64%"><input type="text" size="25" name="popusername" id="popusername"  maxlength="80" class="textfild-S" value="" placeholder="Enter Username" /></td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td>Password</td>
						<td>&nbsp;</td>
						<td><input type="password" size="25" name="password" id="password"  maxlength="80" class="textfild-S" value="" placeholder="Enter Password" /></td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3" align="right"><img src="images/login_btn.jpg" onclick="return validate();" style="cursor:pointer; margin-right:90px;"  /></td>
					</tr>
				</table>
			</td>
			<td width="3%">
				<table width="5%" cellpadding="0" cellspacing="0">
					<tr>
						<td><div class="new_line"></div></td>
					</tr>
			  </table>
			</td>
			<td valign="top" width="45%">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3"><h2 style="color:#003162;">Create Account</h2></td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3"><h7>If you are not an ezpointment user <a href="patientregistration.php" style="color:#660000;">click here</a> to proceed with patient registration.</h7></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>
<!--/div-->
<div class="clear"></div>
<div style="height:110px;"></div>
<?php include('footer.php'); ?>
</div>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['popusername']!='' && $_POST['password']!='')
{
	function convert($str,$ky=''){ 
	if($ky=='')return $str; 
	$ky=str_replace(chr(32),'',$ky); 
	if(strlen($ky)<8)exit('key error'); 
	$kl=strlen($ky)<32?strlen($ky):32; 
	$k=array();for($i=0;$i<$kl;$i++){ 
	$k[$i]=ord($ky{$i})&0x1F;} 
	$j=0;for($i=0;$i<strlen($str);$i++){ 
	$e=ord($str{$i}); 
	$str{$i}=$e&0xE0?chr($e^$k[$j]):chr($e); 
	$j++;$j=$j==$kl?0:$j;} 
	return $str; 
	}

	$popusername=$_POST['popusername'];
	$key='0123456789';
	$poppwd=mysql_real_escape_string(convert($_POST['password'],$key));
	
	$query=mysql_query("Select * from login where USERNAME='".$popusername."' AND USER_PASSWORD='".$poppwd."'");
	$val=mysql_fetch_object($query);
	$num=mysql_num_rows($query);
	if($num>=1)
	{
		$_SESSION['username']=$popusername;	
		$_SESSION['user_type']=	$val->USER_TYPE;
		$insert_log=mysql_query("insert into user_log (user_name,user_type,cdate,ctime) values ('".$popusername."','".$val->USER_TYPE."','".date('Y-m-d')."','".date('H:m:s')."')");
		print("<script language='javascript'>window.location.href='dashboard.php';</script>");			
	}
	else 
	{
		print("<script language='javascript'> alert('Username and Password mismatch...');</script>");
	}
} 
?>
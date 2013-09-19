<?php
include("config/config.php");
//include("config/function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ezpointment</title>
<link href="styles/css.css" rel="stylesheet" type="text/css" />
<link href="styles/style1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript "src="js/jquery_min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/fancybox.css" />
<script type="text/javascript" language="javascript"  src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript"  src="js/jquery-code.js"></script>
<script type="text/javascript" language="javascript"  src="js/facy-mainjquery.js"></script>
<script type="text/javascript" language="javascript"  src="js/jquery.fancybox.js"></script>
<script type="text/javascript">
function pValidate()
{
	if(document.getElementById("popusername").value =="")
	{
		alert("Please enter your user name.");
		document.getElementById("popusername").focus();
		return false;
	}
	if(document.getElementById("password").value == "")
	{
		alert("Please enter your password.");
		document.getElementById("password").focus();
		return false;
	}
	else
	{
		document.popup.submit();
	}	
}
</script>
<script type="text/javascript">
$(document).ready(function() {
	$('a.login-window').click(function() {
		$('.login-popup').show();
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(100);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close').live('click', function() { 
	  $('#mask , .login-popup').fadeOut(100 , function() {
		$('#mask,.login-popup').remove();
		$(window.location).attr('href', '');  
	}); 
	return false;
	});
});
$(document).ready(function() {
	$('#n_user').mouseover(function() {
		$('.newuserbox').show();
		return false;
	});
	$('.newuserbox').mouseover(function() {
		$('.newuserbox').show();
		return false;
	});
	$('#n_user').mouseout(function() {
		$('.newuserbox').hide();
		return false;
	});
	$('.newuserbox').mouseout(function() {
		$('.newuserbox').hide();
		return false;
	});
	// When clicking on the button close or the mask layer the popup closed

});
</script>
	 
	<script type='text/javascript'>
	$(document).ready(function(){
	//$("#search_results").slideUp();
	$("#button_find").click(function(event){
	event.preventDefault();
	search_ajax_way();
	});
	$("#search_query").keyup(function(event){
	event.preventDefault();
	search_ajax_way();
	});
	 
	});
	 
	function search_ajax_way(){
	//$("#search_results").show();
	var search_this=$("#search_query").val();
	$.post("search.php", {searchit : search_this}, function(data){
	$("#display_results").html(data);
	 
	})
	}
	</script>
	
	<style type="text/css">
	#display_results{
	overflow:auto;
	width: 400px;
	margin-top:80px;
	margin-left:555px;
	position: absolute;
	z-index: 54000;
	}
	</style>

</head>
<body>

<div class="header">
<div class="logo"><a href="index.php"><img src="images/logo.jpg" /></a></div>
<div class="user">
<form method="post" class="" name="popup" action="" >
<table width="344" cellpadding="0" cellspacing="0">
  <tr><td width="128">
<input type="text" placeholder="User Name" class="usertext" size="21" name="popusername" id="popusername" style="height:27px; border:solid 1px #9d9d9d;"/></td>
    <td width="16">&nbsp;</td>
    <td width="143">
<input type="password" placeholder="Password"  class="usertext" size="21" style="height:27px; border:solid 1px #9d9d9d;" name="password" id="password" /></td>
<td width="55"><!--img style="padding-left:6px; cursor:pointer;" src="images/login_btn.jpg" onclick="return pValidate();" /--><input type="image" src="images/login_btn.jpg"  /--></td>
</tr></table>
</form>
</div>
<div class="login" id="n_user"><h6> <a class="newuserjscl" href="javascript:void(0)" onmouseover=""></a></h6></div>
<div class="newuserN">
<div class="newuserbox" style="display:none;"> <a href="patientregistration.php" class="simpleLink">Patient Registraton</a>
          <a href="docregistration.php" class="simpleLink">Doctor / Business Registraton</a>
          <!--<div class="newuserboxhide">X</div>-->
    </div></div>
    
<div class="searchNew">
<a href="forgot.php">Forgot Password?</a>
</div></div>
<div class="clear"></div>
<div class="blue-stripe"></div>

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
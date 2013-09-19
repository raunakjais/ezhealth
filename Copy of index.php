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
			return true;
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

<body bgcolor="#dcdcdc">
<div class="main">
<div class="header">
<div class="logo"><img src="images/logo.jpg" /></div>
<div class="login"><h6><a href="#login-box" class="login-window" >LOGIN</a>  |   <a class="newuserjscl" href="javascript:void(0)"> NEW USER</a></h6></div>
<div class="newuserbox"> <a href="patientregistration.php" class="simpleLink">User Registraton</a><br />
          <a href="docregistration.php" class="simpleLink">Doctor / Business Registraton</a>
          <div class="newuserboxhide">X</div>
        </div>
</div>

		<div class="clear"></div>
<div class="blue-stripe"></div>
<div class="containertop">
<div class="containerL">
<div class="find"><h5>Find Doctor and book Appointment instantly</h5></div>
<div class="findin"><div class="findiconone"><img src="images/icon1.jpg" /></div>
<div class="finddoc"><a href="#">Find doctors</a></div>
<div class="clear"></div>
<div class="findiconone"><img src="images/icon2.jpg" /></div>
<div class="finddoc"><a href="#">Schedule Appointments</a></div>
</div>
<div class="findin"><div class="findiconone"><img src="images/icon3.jpg" /></div>
<div class="finddoc"><a href="#">Communicate with doctors</a></div>
<div class="clear"></div>
<div class="findiconone"><img src="images/icon4.jpg" /></div>
<div class="finddoc"><a href="#">Manage your family health</a></div>
</div>
</div>
<div class="line"></div>
<div class="containerR"><div class="find"><h5>Find Doctor By</h5></div>
<div class="search"><input type="text" name="search_query" id="search_query" placeholder="Search For Doctor " size="40"  style="height:36px; font-size:20px "/>
</div>
<div class="advanced"><a href="advance_search.php">Advanced Search</a></div>
</div>
</div>
<div id="display_results"></div>
<div class="midcontainer">
<div class="midL">
<div class="docin"><h4>Doctors</h4>
<div class="doctorin"><div class="image"><strong>Cardiologist</strong></div>
<div class="image"><a href="#"><img src="img/cardio1.png" border="0" /></a></div>
<div class="text">Name : <a href="#">Dr.Rajesh Nanda</a> <br /> 
Exp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 5 years</div>
<div class="image"></div>
</div>
<div class="lineN"></div>
<div class="doctorin"><div class="image"><strong>Orthopedic</strong></div>
<div class="image"><a href="#"><img src="img/artho1.png" /></a></div>
<div class="text">Name : <a href="#">Dr.Vivek Singh</a> <br /> 
Exp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 4 years</div>
<div class="image"></div>
</div>
<div class="lineN"></div>
<div class="doctorin"><div class="image"><strong>Neurosurgeon</strong></div>
<div class="image"><a href="#"><img src="img/doctor.png" /></a></div>
<div class="text">Name :<a href="#"> Dr.Albert Pinto</a> <br /> 
Exp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 1 years</div>
<div class="image"></div>
</div>
<div class="lineN"></div>
<div class="doctorin"><div class="image"><strong>Neurosurgeon</strong></div>
<div class="image"><a href="#"><img src="img/cardio1.png" /></a></div>
<div class="text">Name : <a href="#">Dr.Albert Pinto</a> <br /> 
Exp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 1 years</div>
<div class="image"></div>
</div>
<div class="clear"></div>

</div>
<div class="findbtn"><a href="#"><img src="images/findbtn.jpg" border="0" /></a></div>
</div>
<div class="latestM">
<div class="latestin">
<div class="latesthead">Latest News</div>

<p><!--<marquee direction="up" height="120px" scrollamount="2" onmouseover="this.stop()" onmouseout="this.start()">-->
<?php 
$var= mysql_query("select * from news order by NEWS_ID DESC limit 0,4");
while($row =mysql_fetch_array($var))
{
?><a class="newslinks" href="news_all.php?id=<?=$row['NEWS_ID']?>"  style="text-decoration:none; color:#666666;  line-height:26px"> <?php print  $row['NAME']; ?> </a><br />
<div style="200px; height:1px; background-color:#d0d0d0; "></div>
 <?
}

?>
<!--</marquee>--></p>
<div class="clear"></div>

</div>
<div class="viwbuttonnew"><a href="news_all.php">View more..</a></div>
</div>

</div>
<div class="findM">

</div>
<div class="clear"></div>
<div class="bottomM">
<div class="midR"><div class="businessin"><h4>Business</h4>
<div class="businin"><div class="image"><strong>Medical Centre</strong></div>
<div class="image"><a href="#"><img src="img/hospital1.png" border="0" /></a></div>
<div class="text">Location : <a href="#">Delhi</a> <br /> 
Doctors&nbsp;&nbsp;: 10</div>
<div class="image"></div>
</div>
<div class="lineN"></div>
<div class="businin"><div class="image"><strong>Fortis</strong></div>
<div class="image"><a href="#"><img src="img/fortis1.png"/></a></div>
<div class="text">Location : <a href="#">Noida</a> <br /> 
Doctors&nbsp;&nbsp;: 40</div>
<div class="image"></div>
</div>
<div class="lineN"></div>
<div class="businin"><div class="image"><strong>Demo</strong></div>
<div class="image"><a href="#"><img src="img/img.png" border="0" /></a></div>
<div class="text">Location :<a href="#"> Demo</a> <br /> 
Doctors&nbsp;&nbsp;: 00</div>
<div class="image"></div>
</div>
<div class="lineN"></div>
<div class="businin"><div class="image"><strong>Fortis</strong></div>
<div class="image"><a href="#"><img src="img/fortis1.png" border="0" /></a></div>
<div class="text">Location : <a href="#">Noida</a> <br /> 
Doctors&nbsp;&nbsp;: 40</div>
<div class="image"></div>
</div>
<div class="clear"></div>

</div>
<div class="findbtn"><a href="#"><img src="images/findbtn.jpg" border="0" /></a></div>
</div>
<div class="bulletinM">
<div class="latestin">
<div class="latesthead">Bulletin</div>

<p><!--marquee direction="up" height="200px" scrollamount="2" onmouseover="this.stop()" onmouseout="this.start()"-->
<?php 
$var= mysql_query("select * from bulletin order by BULLETIN_ID DESC limit 0,4");
while($row =mysql_fetch_array($var))
{
?><a class="newslinks" href="bulletin_all.php?id=<?=$row['BULLETIN_ID']?>" style="text-decoration:none; color:#666666; line-height:26px;"> <?php print  $row['NAME']; ?> </a><br />
<div style="200px; height:1px; background-color:#d0d0d0; "></div>
 <?
}

?>
<!--/marquee--></p><div class="clear"></div>
</div><div class="viwbuttonnew"><a href="bulletin_all.php">View more..</a></div>
</div>

<div class="clear"></div>
<div class="findM">
<div class="findL">
</div>

</div>
</div>
<div class="clear"></div>
<div class="seprator"></div>
<div class="footer"></div>
<div class="bottomL">
<div class="footer-links"><a href="#">Home</a>    |    <a href="#">About us</a>    |    <a href="#">Contact us </a>   |    <a href="#">Help</a>    |    <a href="#">Career</a>     |   <a href="#">Terms</a>    |    <a href="#">Blog</a></div>
<div class="footer-links">© ezpointments 2013. All Right Reserved.</div>

</div>
<div class="clear"></div>
</div>
  <div id="login-box" class="login-popup">
			 
        <a href="#" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
		<div class="logintext">LOGIN</div>
          <form method="post" class="signin" name="popup" action="" >
                <fieldset class="textbox">
            	<label class="username">
                <span>Username</span>
                <input id="popusername" name="popusername" value="" type="text" autocomplete="on" placeholder="Username" >
                </label>
                
                <label class="password">
                <span>Password</span>
                <input id="password" name="password"  value="" type="password" placeholder="Password">
                </label>
                <input type="submit" class="submit button" style="float:right;" name="login" value="Login" onclick="return pValidate();"/>&nbsp;<a class="forgot" href="#">Forgot your password?</a>
               <!-- <button class="submit button" type="button" name="login">Sign in</button>-->
                <span class="error" id="error" style="display:none">Invalid username or password</span>
                </fieldset>
          </form>
		  </div>
  </div>
		  
</body>
</html>
<?php
if(isset($_POST['login']))
{
$popusername=$_POST['popusername'];
$poppwd=$_POST['password'];
$query=mysql_query("Select * from login where USERNAME='$popusername' AND USER_PASSWORD='$poppwd' AND USER_FLAG='0'");
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
<?php
error_reporting(0);
include("config/config.php");
//session_start();
session_destroy(); 
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

<body bgcolor="#dcdcdc">
<div class="main">
<!-- header file -->
<?php include('header.php'); ?>
<!-- end of header -->
		
<div class="containertop">
<div class="containerL">
<div class="find"><h5>Manage your and your family health</h5></div>
<div class="findin"><div class="findiconone"><img src="images/icon1.jpg" /></div>
<div class="finddoc">Find doctors</div>
<div class="clear"></div>
<div class="findiconone"><img src="images/icon2.jpg" /></div>
<div class="finddoc">Schedule Appointments</div>
</div>
<div class="findin"><div class="findiconone"><img src="images/icon3.jpg" /></div>
<div class="finddoc">Communicate with doctors</div>
<div class="clear"></div>
<div class="findiconone"><img src="images/icon4.jpg" /></div>
<div class="finddoc">Manage your family health</div>
</div>
</div>
<div class="line"></div>
<div class="containerR"><div class="find">
  <h5>Find Doctor or Business </h5>
</div>
<div class="search"><input type="text" name="search_query" id="search_query" placeholder="Search For Doctor or Business" size="40"  style="height:36px; font-size:20px "/></div>
<div class="advanced"><!--a href="advance_search.php">Advanced Search</a--></div>
</div>
</div>
<div id="display_results"></div>
<div class="midcontainer">
<div class="midL">
<div class="docin"><h4>Doctors</h4>
<table width="100%">
	<tr>
		<?php $sel_doc=mysql_query("select * from doctor_register,doctor_personal_location_info where doctor_register.DOCTOR_ID=doctor_personal_location_info.DOCTOR_ID and DOCTOR_SPECIALITY!='' and DOCTOR_FLAG=0 order by doctor_register.DOCTOR_ID DESC limit 0,4"); 
		while($val=mysql_fetch_object($sel_doc))
		{
			$special = mysql_fetch_object(mysql_query("select DOCTOR_SPECIALITY from doctor_personal_location_info where DOCTOR_ID='".$val->DOCTOR_ID."'"));
			$pic=mysql_fetch_object(mysql_query("select DOCTOR_PHOTO,DOCTOR_EXP from doctor_personal_info where DOCTOR_ID='".$val->DOCTOR_ID."'"));
		?>
		<td width="24%">
			<table width="100%">
				<tr>
					<td colspan="3" class="image1"><strong><a href="doctor_view.php?id=<?php print $val->DOCTOR_ID?>" style="text-decoration:none; color:105E85;" class="image1"><?php if($special->DOCTOR_SPECIALITY!='') { print $special->DOCTOR_SPECIALITY; } else { print 'General'; } ?></a></strong></td>
				</tr>
				<tr>
					<td colspan="3"><div class="img_border"><a href="doctor_view.php?id=<?php print $val->DOCTOR_ID; ?>"><img src="uploads/<?php if($pic->DOCTOR_PHOTO!='') { print $pic->DOCTOR_PHOTO; } else { print 'noImage.gif'; } ?>" width="110" height="90"  /></a></div></td>
				</tr>
				<tr>
					<td width="145" class="text1" colspan="3">Dr. <?php print ucfirst($val->DOCTOR_FIRST_NAME).' '.ucfirst($val->DOCTOR_LAST_NAME);?></td>
				</tr>
				<tr>
					<td class="text1" >Practicing </td>
					<td width="49" class="text1">:</td>
					<td width="372" class="text1"><?php print $pic->DOCTOR_EXP; ?> years</td>
				</tr>
			</table>		
		</td>
		<!--td width="76%"><div class="lineN"></div></td-->
		<?php 
		}
		?>
	</tr>
</table>
</div>
<div class="clear"></div>
<div class="findbtn"><a href="all_doctors.php"><img src="images/findbtn.jpg" border="0" /></a></div>
</div>
<div class="latestM">
<div class="latestin">
<div class="latesthead">Latest News</div>

<p><!--<marquee direction="up" height="120px" scrollamount="2" onmouseover="this.stop()" onmouseout="this.start()">-->
<?php 
$var= mysql_query("select * from news order by NEWS_ID DESC limit 0,4");
while($row =mysql_fetch_array($var))
{
?><a class="newslinks" href="news_all.php?id=<?=$row['NEWS_ID']?>"  style="text-decoration:none; color:#666666;  line-height:26px"> &bull; <?php print  $row['NAME']; ?> </a><br />
<div style="200px; height:1px; background-color:#d0d0d0; "></div>
 <?php
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
<table width="100%">
	<tr>
		<?php $sel_doc=mysql_query("select * from business_info where BUSINESS_FLAG=0 order by BUSINESS_ID DESC limit 0,4"); 
		while($val=mysql_fetch_object($sel_doc))
		{
			$doc_no = mysql_num_rows(mysql_query("select DOCTOR_ID from doctor_register where DOCTOR_IDENTITY='".$val->BUSINESS_ID."'"));
		?>
		<td width="24%">
			<table width="100%">
				<tr>
					<td colspan="3"><strong><a href="buss_view.php?id=<?php print $val->BUSINESS_ID; ?>" style="text-decoration:none; color:105E85;" class="image1"><?php if($val->BUSINESS_LOCATION_TITLE!='') { print $val->BUSINESS_LOCATION_TITLE; } else { print 'Hospital'; } ?></a></strong></td>
				</tr>
				<tr>
					<td colspan="3"><div class="img_border"><a href="buss_view.php?id=<?php print $val->BUSINESS_ID?>"><img src="uploads/<?php if($val->BUSINESS_PHOTO=='') { print 'hospital.jpg'; } else { print $val->BUSINESS_PHOTO; } ?>" width="110" height="90"  /></a></div></td>
				</tr>
				<tr>
					<td width="139" class="text1">Location</td>
					<td width="20" class="text1">:</td>
					<td width="407" class="text1"><?php if(strlen($val->BUSINESS_LOCATION_BRANCH)>12) { $str=substr($val->BUSINESS_LOCATION_BRANCH, 0,10); print $str.'...'; } else { print $val->BUSINESS_LOCATION_BRANCH; }  ?></td>
					
					
				</tr>
				<tr>
					<td width="139" class="text1">Established</td>
					<td width="20" class="text1">:</td>
					<td width="407" class="text1"><?php print $val->BUSINESS_ESTABLISH; ?></td>
					
					
				</tr>
				<tr>
					<td width="139" class="text1">Doctor(s)</td>
					<td width="20" class="text1">:</td>
					<td width="407" class="text1"><?php print $doc_no; ?> </td>
				</tr>
			</table>		
		</td>
		<!--td width="76%"><div class="lineN"></div></td-->
		<?php 
		}
		?>
	</tr>
</table>
<div class="clear"></div>

</div>
<div class="findbtn"><a href="business_search.php"><img src="images/findbtn.jpg" border="0" /></a></div>
</div>
<div class="bulletinM">
<div class="latestin">
<div class="latesthead">Bulletin</div>

<p><!--marquee direction="up" height="200px" scrollamount="2" onmouseover="this.stop()" onmouseout="this.start()"-->
<?php 
$var= mysql_query("select * from bulletin order by BULLETIN_ID DESC limit 0,4");
while($row =mysql_fetch_array($var))
{
?><a class="newslinks" href="bulletin_all.php?id=<?php print $row['BULLETIN_ID']?>" style="text-decoration:none; color:#666666; line-height:26px;"> &bull; <?php print  $row['NAME']; ?> </a><br />
<div style="200px; height:1px; background-color:#d0d0d0; "></div>
 <?php
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
<!--div class="bottomL">
<div class="footer-links"><a href="#">Home</a>    |    <a href="aboutus.php">About us</a>    |    <a href="#">Contact us </a>   |    <a href="#">Help</a>    |    <a href="#">Career</a>     |   <a href="terms.php">Terms</a>    |    <a href="#">Blog</a></div>
<div class="footer-links">© ezpointments 2013. All Right Reserved.</div>

</div-->
<?php include('footer.php'); ?>
<div class="clear"></div>
</div>
  <div id="login-box" class="login-popup">
			 
        <a href="#" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
		<div class="logintext">LOGIN</div>
          <!--form method="post" class="signin" name="popup" action="" >
                <fieldset class="textbox">
            	<label class="username">
                <span>Username</span>
                <input id="popusername" name="popusername" value="" type="text" autocomplete="on" placeholder="Username" >
                </label>
                
                <label class="password">
                <span>Password</span>
                <input id="password" name="password"  value="" type="password" placeholder="Password">
                </label>
                <input type="submit" class="submit button" style="float:right;" name="login" value="Login" onclick="return pValidate();"/>&nbsp;<a class="forgot" href="#">Forgot your password?</a-->
               <!-- <button class="submit button" type="button" name="login">Sign in</button>-->
                <!--span class="error" id="error" style="display:none">Invalid username or password</span>
                </fieldset>
          </form-->
		  </div>
  </div>
		  
</body>
</html>
<?php
/*if($_SERVER['REQUEST_METHOD']=="POST")
{
$popusername=$_POST['popusername'];
$poppwd=$_POST['password'];
$query=mysql_query("Select * from login where USERNAME='$popusername' AND USER_PASSWORD='$poppwd'");
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
}*/ 
?>
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
<script type="text/javascript" src="js/jquery_min.js"></script>
<script type="text/javascript" src="getFile1.js"></script>
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/fancybox.css" />
<script type="text/javascript" language="javascript"  src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript"  src="js/jquery-code.js"></script>
<script type="text/javascript" language="javascript"  src="js/facy-mainjquery.js"></script>
<script type="text/javascript" language="javascript"  src="js/jquery.fancybox.js"></script>
<script type="text/javascript">
$(function() 
{
	$('.update_btn').live("click",function() 
	{
	var u_name= $('#u_name').val();
	var rno= $('#rno').val();
	var u_email= $('#u_email').val();
	var dataString = 'u_name='+ u_name +'&rno='+ rno +'&u_email='+ u_email;
	 
	if(confirm("Are you sure to resend the code!"))
	{
	$.ajax({
	type: "POST",
	 url: "resend.php",
	  data: dataString,
	 cache: false,
	 success: function(html){
	 $('#manoj').html(html);
	 $("#manoj").fadeIn(1000);
	 $("#manoj").fadeOut(2000);
	 //$(".bar"+ID).slideUp('slow', function() {$(this).remove();});
	 	/*setTimeout(function(){
		  $(".flash").fadeOut("slow", function () {
		  $(".flash").remove();
			  }); }, 2000);*/
	 }
	});
	
	}
	
	return false;
	});
});	
</script>
</head>

<body bgcolor="#dcdcdc">
<div class="main">
<div class="header">
<div class="logo"><img src="images/logo.jpg" /></div>
<div class="login1"><a href="index.php"><img src="images/home.png" /></a></div>
</div>


		<div class="clear"></div>
<div class="blue-stripe"></div>
<div class="midcontainer">

									
									
					<div class="registrationform"> 
		Welcome <?php print $_SESSION['username'];?> Thanks for joining with us..<br/>
		<form method="post" action="" name="" >
	
		<table width="720" cellpadding="0" cellspacing="0" border="0">          
          <tr>
            <td colspan="3">Please enter the registration code we have just sent you on your email and mobile no. provided in the registration form</td>
          </tr>
          <tr>
            <td colspan="3"><input type="text" class="textfiled-M" size="25" name="regcode" value="" id = "regcode"  maxlength="15"  />&nbsp; &nbsp;<img src="images/resend.png" style="padding-top:3px; cursor:pointer;" class="update_btn" title="Resend Code Again" /> <div align="center" id="manoj" style="display:none; background-color:#33CC33;"><?php echo $message; ?></div></td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
            <td colspan="3"><input type="hidden" name="u_name" id="u_name" value="<?=$_SESSION['username']?>" /><input type="hidden" name="rno" id="rno" value="<?=$_SESSION['randomnumber']?>" /><input type="hidden" name="u_email" id="u_email" value="<?=$_SESSION['email']?>" /></td>
          </tr>
          <tr>
            <td colspan="3" align="center" style="float:center; margin-right:20px; margin-top:0;"><input type="reset" value="Reset" name="rset" class="but-gray" style="margin-right:10px;" />
            <input type="submit" value="Submit" name="submit" class="but-blue"/></td>
          </tr>
        </table>
		</form>
		</div>				

									
									
									
</div>
<div class="findM">
</div>
<div class="clear"></div>
<div class="clear"></div>
<?php include('footer.php'); ?>
<div class="clear"></div>
</div>
		  
</body>
</html>
<?php
 if($_SERVER['REQUEST_METHOD']=="POST")
{
	$uname=$_SESSION['username'];
	$email=$_SESSION['email'];
	$randomnumber=$_POST['regcode'];
	if($randomnumber!='')
	{
	$query="SELECT * from user_registration_code where USER_REG_CODE_USERNAME='$uname' AND USER_REG_CODE_EMAIL='$email' AND  USER_REG_RANDOM_CODE ='$randomnumber'";
	$row=mysql_query($query);
	$num=mysql_num_rows($row);
		if($num>=1)
		{
			if($_SESSION['user_type']=='D')
			{
				$doc_reg=mysql_fetch_object(mysql_query("select * from doctor_register_temp where DOCTOR_EMAIL='".$email."' and DOCTOR_USERNAME='".$uname."'"));
				$insert_doc_register=mysql_query("insert into doctor_register (DOCTOR_FIRST_NAME,DOCTOR_MIDDLE_NAME,DOCTOR_LAST_NAME,DOCTOR_MOBILE_NUMBER,DOCTOR_EMAIL,DOCTOR_USERNAME,DOCTOR_PASSWORD,DOCTOR_RECORD_DATE,DOCTOR_FLAG) values ('".$doc_reg->DOCTOR_FIRST_NAME."','".$doc_reg->DOCTOR_MIDDLE_NAME."','".$doc_reg->DOCTOR_LAST_NAME."','".$doc_reg->DOCTOR_MOBILE_NUMBER."','".$doc_reg->DOCTOR_EMAIL."','".$doc_reg->DOCTOR_USERNAME."','".$doc_reg->DOCTOR_PASSWORD."','".$doc_reg->DOCTOR_RECORD_DATE."','".$doc_reg->DOCTOR_FLAG."')");
				$user_un_id=mysql_insert_id();
				if($insert_doc_register==1)
				{
					$doc_login=mysql_fetch_object(mysql_query("select * from login_temp where USER_EMAIL='".$email."' and USERNAME='".$uname."'"));
					$insert_login=mysql_query("insert into login (USER_UN_ID,USER_TYPE,USERNAME,USER_EMAIL,USER_PASSWORD,USER_FLAG) values('".$user_un_id."','D','".$uname."','".$email."','".$doc_login->USER_PASSWORD."','1')");	
					if($insert_login==1)
					{
					
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL,"http://myvaluefirst.com/smpp/sendsms?");
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_POSTFIELDS,
									"username=ezpointment&password=ezpoint1&to=".$doc_reg->DOCTOR_MOBILE_NUMBER."&from=EZAPPT&udh=0&text= Dear ".$doc_reg->DOCTOR_FIRST_NAME." Welcome to Ezpointment ! Your registration is complete. You can now start using the Ezpointment services. Thanks for your business!. &dlr-mask=19&dlr-url");
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$server_output = curl_exec ($ch);
						curl_close ($ch);
						
						$del_temp_reg=mysql_query("delete from doctor_register_temp where DOCTOR_EMAIL='".$email."'");
						$del_temp_login=mysql_query("delete from login_temp where USER_EMAIL='".$email."' and USERNAME='".$uname."'");
						print("<script language='javascript'>alert('Your account has been created, please login to access your account.');window.location.href='index.php';</script>");
					}
				}
			}
			else if($_SESSION['user_type']=='B')
			{
				$buss_reg=mysql_fetch_object(mysql_query("select * from business_info_temp where BUSINESS_EMAIL='".$email."' and BUSINESS_USERNAME='".$uname."'"));
				$insert_buss_register=mysql_query("insert into business_info (BUSINESS_LOCATION_TITLE,BUSINESS_LOCATION_TYPE,BUSINESS_LOCATION_BRANCH,BUSINESS_LOCATION_PHONE_NUMBER,BUSINESS_ADDRESS,BUSINESS_COUNTRY_NAME,BUSINESS_STATE_NAME,BUSINESS_CITY_NAME,BUSINESS_AREA_NAME,BUSINESS_ZIPCODE,BUSINESS_ESTABLISH,BUSINESS_MOBILE_NUMBER,BUSINESS_PHOTO,BUSINESS_EMAIL,BUSINESS_USERNAME,BUSINESS_PASSWORD,BUSINESS_RECORD_DATE,BUSINESS_FLAG) values ('".$buss_reg->BUSINESS_LOCATION_TITLE."','".$buss_reg->BUSINESS_LOCATION_TYPE."','".$buss_reg->BUSINESS_LOCATION_BRANCH."','".$buss_reg->BUSINESS_LOCATION_PHONE_NUMBER."','".$buss_reg->BUSINESS_ADDRESS."','".$buss_reg->BUSINESS_COUNTRY_NAME."','".$buss_reg->BUSINESS_STATE_NAME."','".$buss_reg->BUSINESS_CITY_NAME."','".$buss_reg->BUSINESS_AREA_NAME."','".$buss_reg->BUSINESS_ZIPCODE."','".$buss_reg->BUSINESS_ESTABLISH."','".$buss_reg->BUSINESS_MOBILE_NUMBER."','','".$buss_reg->BUSINESS_EMAIL."','".$buss_reg->BUSINESS_USERNAME."','".$buss_reg->BUSINESS_PASSWORD."','".$buss_reg->BUSINESS_RECORD_DATE."','".$buss_reg->BUSINESS_FLAG."')");
				$user_un_id=mysql_insert_id();
				if($insert_buss_register==1)
				{
					$buss_login=mysql_fetch_object(mysql_query("select * from login_temp where USER_EMAIL='".$email."' and USERNAME='".$uname."'"));
					$insert_login=mysql_query("insert into login (USER_UN_ID,USER_TYPE,USERNAME,USER_EMAIL,USER_PASSWORD,USER_FLAG) values('".$user_un_id."','B','".$uname."','".$email."','".$buss_login->USER_PASSWORD."','1')");	
					if($insert_login==1)
					{
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL,"http://myvaluefirst.com/smpp/sendsms?");
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_POSTFIELDS,
									"username=ezpointment&password=ezpoint1&to=".$buss_reg->BUSINESS_MOBILE_NUMBER."&from=EZAPPT&udh=0&text= Dear ".$buss_reg->BUSINESS_LOCATION_TITLE." Welcome to Ezpointment ! Your registration is complete. You can now start using the Ezpointment services. Thanks for your business!. &dlr-mask=19&dlr-url");
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$server_output = curl_exec ($ch);
						curl_close ($ch);
					
						$del_temp_reg=mysql_query("delete from business_info_temp where BUSINESS_EMAIL='".$email."'");
						$del_temp_login=mysql_query("delete from login_temp where USER_EMAIL='".$email."' and USERNAME='".$uname."'");
						print("<script language='javascript'>alert('Your account has been created, please login to access your account.');window.location.href='index.php';</script>");
					}
				}
			}
			else
			{
				$pat_reg=mysql_fetch_object(mysql_query("select * from patientregister_temp where PATIENT_EMAIL='".$email."' and PATIENT_USERNAME='".$uname."'"));
				$insert_patient_register=mysql_query("insert into patientregister (PATIENT_FIRST_NAME,PATIENT_MIDDLE_NAME,PATIENT_LAST_NAME,PATIENT_MOBILE_NUMBER,PATIENT_EMAIL,PATIENT_USERNAME,PATIENT_PASSWORD,PATIENT_DATE,PATIENT_FLAG) values ('".$pat_reg->PATIENT_FIRST_NAME."','".$pat_reg->PATIENT_MIDDLE_NAME."','".$pat_reg->PATIENT_LAST_NAME."','".$pat_reg->PATIENT_MOBILE_NUMBER."','".$pat_reg->PATIENT_EMAIL."','".$pat_reg->PATIENT_USERNAME."','".$pat_reg->PATIENT_PASSWORD."','".$pat_reg->PATIENT_DATE."','".$pat_reg->PATIENT_FLAG."')");
				$user_un_id=mysql_insert_id();
				if($insert_patient_register==1)
				{
					$pat_login=mysql_fetch_object(mysql_query("select * from login_temp where USER_EMAIL='".$email."' and USERNAME='".$uname."'"));
					$insert_login=mysql_query("insert into login (USER_UN_ID,USER_TYPE,USERNAME,USER_EMAIL,USER_PASSWORD,USER_FLAG) values('".$user_un_id."','P','".$uname."','".$email."','".$pat_login->USER_PASSWORD."','0')");	
					if($insert_login==1)
					{
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL,"http://myvaluefirst.com/smpp/sendsms?");
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_POSTFIELDS,
									"username=ezpointment&password=ezpoint1&to=".$pat_reg->PATIENT_MOBILE_NUMBER."&from=EZAPPT&udh=0&text= Dear ".$pat_reg->PATIENT_FIRST_NAME." Welcome to Ezpointment ! Your registration is complete. You can now start using the Ezpointment services. Thanks for your business!. &dlr-mask=19&dlr-url");
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$server_output = curl_exec ($ch);
						curl_close ($ch);
					
					
						$del_temp_reg=mysql_query("delete from patientregister_temp where PATIENT_EMAIL='".$email."'");
						$del_temp_login=mysql_query("delete from login_temp where USER_EMAIL='".$email."' and USERNAME='".$uname."'");
						print("<script language='javascript'>alert('Your account has been created, please login to access your account.');window.location.href='index.php';</script>");
					}
				}	
			}		
		}
		else
		{
			print'<script>alert("Enter correct code");</script>';
		}
	}
	else
	{
		print '<script>alert("Enter code");</script>';
	}
}

?>

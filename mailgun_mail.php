<?php
include('ezEMail.php');
/*include("config/config.php"); 
include('SMTPconfig.php');
include('SMTPClass.php');
	$reg_id=$_SESSION['reg_code_id'];
	$u_type=$_SESSION['user_type'];
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,"http://myvaluefirst.com/smpp/sendsms?");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,
				"username=ezpointment&password=ezpoint1&to=".$_SESSION['mobilenumber']."&from=EZAPPT&udh=0&text= Dear ".$_SESSION['name'].", Welcome to Ezpointment ! Please enter this code ".$_SESSION['randomnumber']." to complete your online registration. &dlr-mask=19&dlr-url");
	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$server_output = curl_exec ($ch);
	curl_close ($ch);
	//echo $server_output;exit;
		if($server_output=='Sent.')
		{*/
			$to = 'manoj@vallesoft.com';
			$from = 'support@ezpointment.com'; 
			$subject = "ezpointment Registration Code";
			$body = "<html>
					<head>
					<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
					<title>'ezpointment'</title>
					<link type='text/css' href='../../images/hms.css' rel='stylesheet' />
					<meta http-equiv='content-type' content='text/html;charset=iso-8859-1'>
					<body>
					<table width='100%' border='0' cellspacing='0' cellpadding='2' align='center' class='bdr1'>
					<tr>
						<td>
							Dear ".$_SESSION['name'].", Welcome to Ezpointment ! Please enter this code ".$_SESSION['randomnumber']." to complete your online registration, or click on link <a href='http://stage.ezpointment.com/verifyActivation.php?reg_id=$reg_id&u_type=$u_type'>verify</a> to complete the registration
						</td>
					</tr>
					</body>
					</html>";
			
			/*$headers  = "From: $from"."\r\n"; 
			$headers .= "Content-type: text/html\r\n"; 
			$mm = mail($to, $subject, $message, $headers);*/
			
			
			#$SMTPMail = new SMTPClient ($SmtpServer, $SmtpPort, $SmtpUser, $SmtpPass, $from, $to, $subject, $body);
			#$SMTPChat = $SMTPMail->SendMail();
			$result = ezEMail::sendSMTPMessage($to, $from, "support", $subject , $body);
		//} 
?>
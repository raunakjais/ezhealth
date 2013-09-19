<?php
include('ezEMail.php');
include("config/config.php");
if($_SESSION['username'])
{
	if(isset($_POST['buss_id']))
	{	
		$mnth=$_POST['post_val2'];
		$today = date('Y-m-d');
		$tdate = date('Y-m-d',strtotime(date("Y-m-d", strtotime($today)) . " +$mnth months "));
		$paid_amt=$_POST['post_val1']*$_POST['post_val2'];
		$insert_billing = mysql_query("insert into business_billing (BUSINESS_ID,MONTHLY_FEES,MONTH,REMARK,PAID_AMT,CDATE,TDATE,CUSER) values ('".$_POST['buss_id']."','".$_POST['post_val1']."','".$_POST['post_val2']."','".$_POST['post_val3']."','".$paid_amt."','".date('Y-m-d')."','".$tdate."','".$_SESSION['username']."') ");
		$update_login=mysql_query("update login set USER_FLAG=0 where USER_TYPE='B' and USER_UN_ID='".$_POST['buss_id']."'"); 
		$update_business=mysql_query("update business_info set BUSINESS_FLAG=0 where BUSINESS_ID='".$_POST['buss_id']."'"); 
	}

	if($insert_billing==1 && $update_login==1)
	{
		$to_email=mysql_fetch_object(mysql_query("select BUSINESS_EMAIL,BUSINESS_LOCATION_TITLE from business_info where BUSINESS_ID='".$_POST['buss_id']."'"));
		$to = $to_email->BUSINESS_EMAIL;
		$from = $from; 
		$subject = "Account apporved";
		$body = "Dear $to_email->BUSINESS_LOCATION_TITLE";
		$body= $body. ", \n Welcome to ezpointment! \n your account has been approved. Please login with your credentials to access your account.";
		$result = ezEMail::sendSMTPMessage($to, $from, "support", $subject,$body);
		/*$headers  = "From: $from"."\r\n"; 
		$headers .= "Content-type: text/html\r\n"; 
		$mm = mail($to, $subject, $message, $headers);*/
		print "Approved successfully..";
		/*print("<script language='javascript'>alert('Updated successfully..'); window.location.href='user_approval.php';</script>");*/
	}
	else
	{
		$message="<div class='flash'> Error occured..</div>";
	}
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
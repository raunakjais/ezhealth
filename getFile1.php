<?php 
include("config/config.php");
$val=explode('~',$_GET['q']);
if($val[1]=='div_file6')
{
	if(trim($val[0])=='')
	{
		print "<span style='color:#FF0000;'><b>Can Not Use Blank</b></span>";
	}
	$username_used='0';
	$row5 = mysql_num_rows(mysql_query("select * from login where USERNAME='".$val[0]."' "));
	/*$row7 = mysql_num_rows(mysql_query("select * from login_temp where USERNAME='".$val[0]."' "));
	if($row5=='1' || $row7=='1')
	{
		$username_used=1;
	}*/
	if($row5=='1')
	{
		$username_used=1;
	}
	?>
	<input type="hidden" name="user_available" id="user_available" value="<?php print $username_used; ?>" />
	<?
	if($username_used>='1' && trim($val[0])!='')
	{
		print "<span style='color:#FF0000;'><b>Already Taken</b></span>";
	}
	else if($username_used=='0' && trim($val[0])!='')
	{
		print "<span style='color:#33CC33;'><b>Username Available</b></span>";
	}
}
else if($val[1]=='div_file5')
{
	if(trim($val[0])=='')
	{
		print "<span style='color:#FF0000;'><b>Can Not Use Blank</b></span>";
	}
	$email_used='0';
	$row6 = mysql_num_rows(mysql_query("select * from login where USER_EMAIL='".$val[0]."' "));
	/*$row8 = mysql_num_rows(mysql_query("select * from login_temp where USER_EMAIL='".$val[0]."' "));
	if($row6=='1' || $row8=='1')
	{
		$email_used=1;
	}*/
	if($row6=='1')
	{
		$email_used=1;
	}
	?>
	<input type="hidden" name="email_avail" id="email_avail" value="<?php print $email_used; ?>" />
<?
	if($email_used>='1' && trim($val[0])!='')
	{
		print "<span style='color:#FF0000;'><b>Email Already Taken</b></span>";
	}
	else if($email_used=='0' && trim($val[0])!='')
	{
		print "<span style='color:#33CC33;'><b>Email Available</b></span>";
	}
}
	?>


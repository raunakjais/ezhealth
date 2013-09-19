<?php 
include("config/config.php");
if($_SESSION['username'])
{
$site_admin=mysql_fetch_object(mysql_query("select cdate,ctime from user_log where user_name='siteadmin' and user_type='A' order by user_id desc"));
	if($_GET['id']=='limit')
	{
	    $query=("SELECT * from doctor_register,login where DOCTOR_ID=USER_UN_ID and USER_TYPE='D' and USER_FLAG='2' and DOCTOR_RECORD_DATE >='".$site_admin->cdate."' ");
	}
	else
	{
		$query=("SELECT * from doctor_register,login where DOCTOR_ID=USER_UN_ID and USER_TYPE='D' and USER_FLAG='2'");
	}
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
<script type="text/javascript" src="scw.js"></script>
<script type="text/javascript">
function same1(qw1)
{
	document.getElementById('post_val1').value=qw1;
}
function same2(qw2)
{
	document.getElementById('post_val2').value=qw2;
}
function same3(qw3)
{
	document.getElementById('post_val3').value=qw3;
}
</script>
<script type="text/javascript">
$(function() 
{
	$('.update_btn').live("click",function() 
	{
	var ID = $(this).attr("id");
	var post_val1= $('#post_val1').val();
	if(post_val1==''){ alert('please enter monthly fees'); return false; }
	
	var post_val2= $('#post_val2').val();
	if(post_val2==''){ alert('please select month'); return false; }
	
	var post_val3= $('#post_val3').val();
	if(post_val3==''){ alert('please enter remark'); return false; }

	 var dataString = 'doc_id='+ ID +'&post_val1='+ post_val1 +'&post_val2='+ post_val2 +'&post_val3='+ post_val3;
	 
	if(confirm("Are you sure to approve the payment!"))
	{
	$.ajax({
	type: "POST",
	 url: "update_data.php",
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

<body class="maina">
<!--div class="dashright"-->
<div class="content1">
<form name="siteadmin" method="post" action="" onSubmit="">
<table width="720" cellpadding="0" cellspacing="0" border="0">
<tr><td colspan="5"><h2 style="color:#003162;">Doctor Approval</h2></td></tr>
<tr>
<td colspan="5">&nbsp;</td>
</tr>
<tr><td colspan="5"><div align="center" id="manoj" style="display:none; background-color:#33CC33;"><?php echo $message; ?></div>
</td></tr>
<tr>
<td style="color:#002e47; font-size:14px;"><strong>Name</strong></td>
<td style="color:#002e47; font-size:14px;"><strong>EZ Charges</strong></td>
<td style="color:#002e47; font-size:14px;"><strong>Month</strong></td>
<td style="color:#002e47; font-size:14px;"><strong>Remark</strong></td>
<td>&nbsp;</td>
</tr>
<tr>
	<td colspan="5"><hr /></td>
</tr>


			<?php
		   $i=1;
		   $result=mysql_query($query);
		  	while($row=mysql_fetch_array($result))
			{
			
		  ?>
<div class="bar<? print $row['DOCTOR_ID']?>">		  
	<tr>
	<td style="font-size:15px;">
<?php print $doctorname=$row['DOCTOR_FIRST_NAME']." ".$row['DOCTOR_LAST_NAME'];?>
<input type="hidden" name="doc_id" id="doc_id" value="<?php print $row['DOCTOR_ID']; ?>" />
<input type="hidden" name="post_val1" id="post_val1" />
<input type="hidden" name="post_val2" id="post_val2" />
<input type="hidden" name="post_val3" id="post_val3" />
</td>
<td>
<input type="text" name="fees_<? print $i; ?>" id="fees_<? print $i; ?>" class="textfild-S1" value="" onKeyUp="same1(this.value);"/>
</td>
<td>
<select name="months_<? print $i; ?>" id="months_<? print $i; ?>" class="drop5" onchange="same2(this.value);">
<option value="">Select</option>
<option value="3">3 Months</option>
<option value="2">2 Months</option>
<option value="1">1 Month</option>
</select>
</td>
<td><input type="text" name="remark_<? print $i; ?>" id="remark_<? print $i; ?>" onKeyUp="same3(this.value);" class="textfild-S1" value=""/></td>
<td><img src="images/health-icon.png" id="<?php print $row['DOCTOR_ID']; ?>" class="update_btn" /></td>
</tr>		 
  </div>		<? 
		$i=$i+1;
		   }
		   ?>     
		   <?php if($_GET['id']=='limit') { ?>
		   <tr>
		   <td align="right" colspan="5">&nbsp;</td>
		   </tr>
		   <tr>
		   <td align="right" colspan="5">&nbsp;</td>
		   </tr>
		   <tr>
		   <td align="right" colspan="5"><a href="user_approval.php" style="text-decoration:none; color:#333333;"><strong>View All</strong></a></td>
		   </tr>
		   <?php } ?>
		        
</table>
</form>
</div>
</body>
</html>
<?php
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
		 
		 
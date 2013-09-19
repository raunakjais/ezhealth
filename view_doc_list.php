<?php 
include("config/config.php");
if($_SESSION['username'])
{
$site_admin=mysql_fetch_object(mysql_query("select cdate,ctime from user_log where user_name='siteadmin' and user_type='A' order by user_id desc"));
	if($_GET['id']=='limit')
	{
	    $query=("SELECT * from doctor_register where DOCTOR_RECORD_DATE >='".$site_admin->cdate."' ");
	}
	else
	{
		$query=("SELECT * from doctor_register");
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
	 
	if(confirm("Sure you want to update quantity!"))
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
<table width="720" cellpadding="1" cellspacing="1" border="0">
<tr><td colspan="8"><h2 style="color:#003162;">New Doctor(s) List</h2></td></tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr><td colspan="8"><div align="center" id="manoj" style="display:none; background-color:#33CC33;"><?php echo $message; ?></div>
</td></tr>
<tr>
<th width="59" class="timetabH4">Doc ID</th>
<th width="113" class="timetabH4">Name</th>
<th width="109" class="timetabH4">Speciality</th>
<th width="101" class="timetabH4">Location</th>
<th width="85" class="timetabH4">Email-Id</th>
<th width="78" class="timetabH4">Mobile</th>
<th width="85" class="timetabH4">License</th>
<th width="65" class="timetabH4">Action</th>
</tr>

			<?php
		   $i=1;
		   $result=mysql_query($query);
		  	while($row=mysql_fetch_array($result))
			{
			$doc_special=mysql_fetch_object(mysql_query("select DOCTOR_SPECIALITY from doctor_personal_location_info where DOCTOR_ID='".$row['DOCTOR_ID']."'"));
			$doc_loc=mysql_fetch_object(mysql_query("select DOCTOR_CITY,DOCTOR_LICENSE from doctor_personal_info where DOCTOR_ID='".$row['DOCTOR_ID']."'"));
		  ?>
<div class="bar<? print $row['DOCTOR_ID']?>">		  
	<tr>
		<td class="timetabH2"><? print $row['DOCTOR_ID']?></td>
		<td class="timetabH1"><? print $row['DOCTOR_FIRST_NAME'].' '.$row['DOCTOR_LAST_NAME'];?></td>
		<td class="timetabH2"><? print $doc_special->DOCTOR_SPECIALITY;?></td>
		<td class="timetabH1"><? print $doc_loc->DOCTOR_AREA;?></td>
		<td class="timetabH2"><? print $row['DOCTOR_EMAIL'];?></td>
		<td class="timetabH1"><? print $row['DOCTOR_MOBILE_NUMBER'];?></td>
		<td class="timetabH2"><? print $doc_loc->DOCTOR_LICENSE;?></td>
		<td class="timetabH1"></td>
	</tr>		 
  </div>		<? 
		$i=$i+1;
		   }
		   ?>     
		   <?php if($_GET['id']=='limit') { ?>
		   <tr>
		   <td align="right" colspan="8">
           <a href="view_doc_list.php" style="text-decoration:none; color:#065979; font-weight:bold;">View All</a></td>
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
		 
		 
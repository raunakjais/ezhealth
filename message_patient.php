<?php 
include("config/config.php");
include("config/function.php");
if($_SESSION['username'])
{	
	if($_SESSION['user_type']=='P')
	{
	$query = "select * from chat where (FROM_ID='".$_SESSION['pat_id']."' and FROM_TYPE='P') or (TO_TYPE='P' and TO_ID='".$_SESSION['pat_id']."') and FLAG=0 order by CDATE DESC";
	}
	if($_SESSION['user_type']=='D')
	{
	$query = "select * from chat where (FROM_ID='".$_SESSION['doc_id']."' and FROM_TYPE='D') or (TO_TYPE='D' and TO_ID='".$_SESSION['doc_id']."') and FLAG=0 order by CDATE DESC";
	}
	if($_SESSION['user_type']=='R')
	{
	$query = "select * from chat where (FROM_ID='".$_SESSION['recp_id']."' and FROM_TYPE='R') or (TO_TYPE='R' and TO_ID='".$_SESSION['recp_id']."') and FLAG=0 order by CDATE DESC";
	}
	if($_SESSION['user_type']=='B')
	{
	$query = "select * from chat where (FROM_ID='".$_SESSION['buss_id']."' and FROM_TYPE='B') or (TO_TYPE='B' and TO_ID='".$_SESSION['buss_id']."') and FLAG=0 order by CDATE DESC";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ezpointment</title>
<link rel="stylesheet" href="styles/nyroModal.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/modal.js"></script>
<script type="text/javascript" src="js/jquery.nyroModal-1.6.2.pack.js"></script>
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
<link media="screen" rel="stylesheet" href="styles/colorbox.css" />
<script src="js/colorbox-min.js"></script>
<script src="js/min.js"></script>	
<script src="js/colorbox.js"></script>

<script>
	$(document).ready(function(){
		//Examples of how to assign the ColorBox event to elements
		$(".group1").colorbox({rel:'group1'});
		$(".group2").colorbox({rel:'group2', transition:"fade"});
		$(".group3").colorbox({rel:'group3', transition:"none", width:"100%", height:"100%"});
		$(".group4").colorbox({rel:'group4', slideshow:true});
		$(".ajax").colorbox();
		$(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
		$(".iframe").colorbox({iframe:true, width:"100%", height:"100%"});
		$(".inline").colorbox({inline:true, width:"50%"});
		$(".callbacks").colorbox({
			onOpen:function(){ alert('onOpen: colorbox is about to open'); },
			onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
			onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
			onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
			onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
		});
		
		//Example of preserving a JavaScript event for inline calls.
		$("#click").click(function(){ 
			$('#click').css({"background-color":"#000", "color":"#000", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
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
<tr><td colspan="4"><h2 style="color:#003162;">Messages List</h2></td>
	<td align="right" colspan="2"><?php if($_SESSION['user_type']!='R') { ?><a href="<?php if($_SESSION['user_type']=='P') { ?>add_msg_p.php<? } if($_SESSION['user_type']=='D') { ?>add_msg_d.php<? }  if($_SESSION['user_type']=='B') { ?>add_msg_b.php<? } ?>" class="iframe"><input class="but-blue1" type="button" name="sub" value="Compose" ></a><?php } ?>
	
	</td>
</tr>
</table>
<table width="720" cellpadding="1" cellspacing="1" border="0">
<tr>
	<td colspan="6">&nbsp;</td>
</tr>
<tr>
	<td colspan="6"><div align="center" id="manoj" style="display:none; background-color:#33CC33;"><?php echo $message; ?></div></td>
</tr>
<tr>
<th width="55" class="timetabH4">Reply </th>
<th width="170" class="timetabH4">Date </th>
<th width="165" class="timetabH4">From</th>
<th width="176" class="timetabH4">To</th>
<th width="191" class="timetabH4">Consent</th>
<th width="100" class="timetabH4">Subject</th>
</tr>
			<?php
		   $i=1;
		   $result=mysql_query($query);
			while($row=mysql_fetch_array($result))
			{
				$count_msg=mysql_num_rows(mysql_query("select * from chat_details where CHAT_ID='".$row['CHAT_ID']."'"));
				if($row['FROM_TYPE']=='P')
				{
					$name=mysql_fetch_object(mysql_query("select PATIENT_FIRST_NAME,PATIENT_LAST_NAME from patientregister where PATIENT_ID='".$row['FROM_ID']."'"));
					$from=$name->PATIENT_FIRST_NAME.' '.$name->PATIENT_LAST_NAME;
				}
				if($row['FROM_TYPE']=='D')
				{
					$name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME from doctor_register where DOCTOR_ID='".$row['FROM_ID']."'"));
					$from='Dr. '.$name->DOCTOR_FIRST_NAME.' '.$name->DOCTOR_LAST_NAME;
				}
				if($row['FROM_TYPE']=='B')
				{
					$name=mysql_fetch_object(mysql_query("select BUSINESS_LOCATION_TITLE from business_info where BUSINESS_ID='".$row['FROM_ID']."'"));
					$from=$name->BUSINESS_LOCATION_TITLE;
				}
				if($row['FROM_TYPE']=='R')
				{
					$name=mysql_fetch_object(mysql_query("select RECEPTIONIST_FIRST_NAME,RECEPTIONIST_LAST_NAME from receptionist_register where RECEPTIONIST_ID='".$row['FROM_ID']."'"));
					$from=$name->RECEPTIONIST_FIRST_NAME.' '.$name->RECEPTIONIST_LAST_NAME;
				}
				
				
				if($row['TO_TYPE']=='P')
				{
					$name=mysql_fetch_object(mysql_query("select PATIENT_FIRST_NAME,PATIENT_LAST_NAME from patientregister where PATIENT_ID='".$row['TO_ID']."'"));
					$to=$name->PATIENT_FIRST_NAME.' '.$name->PATIENT_LAST_NAME;
				}
				if($row['TO_TYPE']=='D')
				{
					$name=mysql_fetch_object(mysql_query("select DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME from doctor_register where DOCTOR_ID='".$row['TO_ID']."'"));
					$to='Dr. '.$name->DOCTOR_FIRST_NAME.' '.$name->DOCTOR_LAST_NAME;
				}
				if($row['TO_TYPE']=='B')
				{
					$name=mysql_fetch_object(mysql_query("select BUSINESS_LOCATION_TITLE from business_info where BUSINESS_ID='".$row['TO_ID']."'"));
					$to=$name->BUSINESS_LOCATION_TITLE;
				}
				if($row['TO_TYPE']=='R')
				{
					$name=mysql_fetch_object(mysql_query("select RECEPTIONIST_FIRST_NAME,RECEPTIONIST_LAST_NAME from receptionist_register where RECEPTIONIST_ID='".$row['TO_ID']."'"));
					$to=$name->RECEPTIONIST_FIRST_NAME.' '.$name->RECEPTIONIST_LAST_NAME;
				}
		  ?>		  
		<tr>
			<td class="timetabH2"><a href="msg_reply.php?chat_id=<?=$row['CHAT_ID']?>" class="iframe" style="text-decoration:none; cursor:pointer; color:#333333;"><input type="radio" name="sel_rad" id="sel_rad" value="<?=$row['CHAT_ID']?>" /></a></td>
			<td class="timetabH2"><?php print dateformat($row['CDATE']); ?></td>
			<td class="timetabH2"><?=$from?></td>
			<td width="84" class="timetabH2"><?=$to?></td>
			<td width="141" class="timetabH2"><?=$row['CONSENT']?></td>
			<td width="270" class="timetabH2"><b><a class="iframe" href="msg_view.php?chat_id=<?=$row['CHAT_ID']?>" style="text-decoration:none; cursor:pointer; color:#333333;">
			  <?=$row['SUBJECT']?>
			</a></b><? print '('.$count_msg.')';?></td>
		</tr>		 
		<? 
		$i=$i+1;
		   }
		   ?>      
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
		 
		 
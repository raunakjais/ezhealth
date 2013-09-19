<?php
include("config/config.php");
if($_SESSION['username'])
{
	$get_bid=mysql_fetch_object(mysql_query("select USER_UN_ID from login where USER_TYPE='".$_SESSION['user_type']."' and USERNAME='".$_SESSION['username']."' and USER_FLAG=0"));
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
<script type="text/javascript">
function validate()
{	
	if(document.getElementById('doc').value=='')
	{
		alert('Please select doctor');
		document.getElementById('doc').focus();
		return false;
	}
	else if(document.getElementById('recption').value=='')
	{
		alert('Please select Recption');
		document.getElementById('recption').focus();
		return false;
	}
}
</script>
</head>
<body>
<div class="maina">
<div class="midcontainer1">
			
<div class="doctor_M">
<form name="signup" method="post" action="" onSubmit="return validate();">
<table width="700" cellpadding="0" cellspacing="0" border="0"> 
			<tr>
				<td colspan="3"><h2 style="color:#003162;">Map Doctor-Receptionist</h2></td>
			</tr>
		  <tr>
            <td colspan="3">&nbsp;</td>
          </tr>  
		  <tr>
			<td colspan="3" style="padding:0px;"><h5>Please select Doctor and Receptionist for mapping.</h5></td>
		  </tr>   
		  <tr>
            <td colspan="3">&nbsp;</td>
          </tr>   
		  <tr>
			<td colspan="3">Doctor <span class="red">*</span></td>
		  </tr>
		  <tr>
			<td colspan="3">
			<select class="drop2" name="doc" id="doc">
			<?php $doc=mysql_query("select DOCTOR_ID,DOCTOR_FIRST_NAME,DOCTOR_LAST_NAME from doctor_register where DOCTOR_IDENTITY='".$get_bid->USER_UN_ID."' and DOCTOR_FLAG=0"); ?>
				<option value="">select doctor</option>
				<?php while($doc_det=mysql_fetch_object($doc)) { ?>
					<option value="<?php print $doc_det->DOCTOR_ID; ?>"><?php print $doc_det->DOCTOR_FIRST_NAME.' '.$doc_det->DOCTOR_LAST_NAME; ?></option>
				<?php } ?>
			</select></td>
		  </tr>
		  <tr>
			<td colspan="3">&nbsp;</td>
		  </tr>  
          <tr>
            <td colspan="3">Receptionist <span class="red">*</span></td>
          </tr>
          <tr>
            <td colspan="3">
			<select class="drop2" name="recption" id="recption">
			<?php $rec=mysql_query("select RECEPTIONIST_ID,RECEPTIONIST_FIRST_NAME,RECEPTIONIST_LAST_NAME from receptionist_register where RECEPTIONIST_IDENTITY='".$get_bid->USER_UN_ID."'"); ?>
				<option value="">select Receptionist</option>
				<?php while($rec_det=mysql_fetch_object($rec)) { ?>
					<option value="<?php print $rec_det->RECEPTIONIST_ID; ?>"><?php print $rec_det->RECEPTIONIST_FIRST_NAME.' '.$rec_det->RECEPTIONIST_LAST_NAME; ?></option>
				<?php } ?>	
			</select>
			</td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
         <tr>
            <td></td>
           <td colspan="2" >
				<input class="but-gray" type="reset" style="margin-right:10px;" name="reset" value="Reset">
				<input class="but-blue" type="submit" name="submit" value="Submit">		    </td>
          </tr>
        </table>
</form>
     
</div>								
</div>
</div>  
</body>
</html>
<?php
	if(($_POST['submit'])=='Submit')
	{
		$chk = mysql_num_rows(mysql_query("select DOC_ID from doc_mapping where DOC_ID='".$_POST['doc']."' and FLAG=0"));
		if($chk>=1)
		{
			print("<script language='javascript'>alert('doctor Mapped already'); window.location.href='map_doc_recp.php';</script>");
		}
		else
		{
			$insert_query=mysql_query("insert into doc_mapping (DOC_ID,RECP_ID,BUSS_ID,CDATE,CUSER) values('".$_POST['doc']."','".$_POST['recption']."','".$get_bid->USER_UN_ID."','".date('Y-m-d')."','".$_SESSION['username']."')");
			if($insert_query==1)
			{
				print("<script language='javascript'>alert('Mapped successfully'); window.location.href='map_doc_recp.php';</script>");	
			}
		}		
	}	
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
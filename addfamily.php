<?php 
include("config/config.php");
if($_SESSION['username'])
{
	$user=mysql_fetch_object(mysql_query("select USER_UN_ID from login where USER_TYPE='".$_SESSION['user_type']."' and USERNAME='".$_SESSION['username']."'"));
	$user_id=$user->USER_UN_ID; 
	if($_GET['fm_id']!='')
	{
		$fa_det=mysql_fetch_object(mysql_query("select * from patient_family where PATIENT_FAMILY_ID='".$_GET['fm_id']."'"));
	}
	$dob=explode('-',$fa_det->DOB);
	$ft_dob=$dob[1].'/'.$dob[2].'/'.$dob[0];
	?>
<head>
<link href="styles/css.css" rel="stylesheet" type="text/css" />
<link href="styles/style1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery_min.js"></script>
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
function CheckedChange()
{
if(document.getElementById('chkbxCopy').checked == true)
{
alert('hello');
}
}


function validate()
{	
	var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
	
	if(document.getElementById('fname').value=='')
	{
		alert('Please enter the first name');
		document.getElementById('fname').focus();
		return false;
	}
	else if(document.getElementById('lname').value=='')
	{
		alert('Please enter the last name');
		document.getElementById('lname').focus();
		return false;
	}
	else if(document.getElementById('dob').value=='')
	{
		alert('Please enter  date of birth');
		document.getElementById('dob').focus();
		return false;
	}
	else if(document.getElementById('gender').value=='')
	{
		alert('Please select your gender');
		document.getElementById('gender').focus();
		return false;
	}
	else if(document.getElementById('relation').value=='')
	{
		alert('Please select relation');
		document.getElementById('gender').focus();
		return false;
	}
	else if(document.getElementById('mobile').value=='')
	{
		alert('Please enter your mobile number');
		document.getElementById('mobile').focus();
		return false;
	}
	else if(!document.getElementById('email').value.match(re) && document.getElementById('email').value!="")
	{
		alert('Please enter your valid email address');
		document.getElementById('email').focus();
		return false;
	}
}
</script>
</head>
<body class="maina">
		<form name="addfamily" method="post" action="" onSubmit="return validate();" >    		
		<input type="hidden" name="userId" value="">
		<!--/form-->
        </div>
        <table width="720" cellpadding="0" cellspacing="0" border="0">
<tr>
<td colspan="2"><h2 style="color:#003162;">Add Family Members </h2></td>
</tr>
		<tr>
		  <td colspan="3">&nbsp;</td>
		</tr> 
			
		 
		  <tr>
            <td class="ntext">First Name <span class="red">*</span></td>
            <td class="ntext">Middle Name</td>
            <td class="ntext">Last Name <span class="red">*</span></td>
          </tr>
          <tr>
            <td><input type="text" size="25" name="fname" value="<?=$fa_det->FNAME?>" id = "fname"  maxlength="80" class="textfild-S" />			</td>
            <td><input type="text" size="25" name="mname" value="<?=$fa_det->MNAME?>" id = "mname" class="textfild-S" maxlength="80" /></td>
            <td><input type="text" size="25" name="lname" value="<?=$fa_det->LNAME?>" id="lname" class="textfild-S" maxlength="80" /></td>
          </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" class="ntext">Date of Birth <span class="red">*</span></td>
            </tr>
            <tr>
              <td colspan="3">
				<input  type="text" size="50" valign="top" name="dob" placeholder="mm/dd/yyyy" value="<?php if($_GET['fm_id']!='') { print $ft_dob; } ?>"  onClick="scwShow(this,event);" id="dob"  maxlength="15" class="textfild-LS" style="width:326px;"/>
				&nbsp;&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" class="ntext">Gender <span class="red">*</span></td>
            </tr>
			<tr>
              <td colspan="3"><select name="gender" id="gender" class="drop3">
				<option value="" >Select</option>
				<option value="Male" <?php if($fa_det->GENDER=='Male') { ?> selected="selected" <? } ?> >Male</option>
				<option value="Female" <?php if($fa_det->GENDER=='Female') { ?> selected="selected" <? } ?> >Female</option>
			</select></td>
            </tr>
			
			<tr>
              <td colspan="3">&nbsp;</td>
            </tr>
			<tr>
			 <td colspan="3" class="ntext">Relation <span class="red">*</span></td></tr>
			<tr>
            <td colspan="3">
			<select name="relation" id="relation" class="drop3">
				<option value="" >Select</option>
				<option value="Friend" <?php if($fa_det->RELATION=='Friend') { ?> selected="selected" <? } ?>>Friend</option>
				<option value="In-Laws" <?php if($fa_det->RELATION=='In-Laws') { ?> selected="selected" <? } ?>>In-Laws</option>
				<option value="Father" <?php if($fa_det->RELATION=='Father') { ?> selected="selected" <? } ?>>Father</option>
				<option value="Mother" <?php if($fa_det->RELATION=='Mother') { ?> selected="selected" <? } ?>>Mother</option>
				<option value="Spouse" <?php if($fa_det->RELATION=='Spouse') { ?> selected="selected" <? } ?>>Spouse</option>
				<option value="Daughter" <?php if($fa_det->RELATION=='Daughter') { ?> selected="selected" <? } ?>>Daughter</option>
				<option value="Son" <?php if($fa_det->RELATION=='Son') { ?> selected="selected" <? } ?>>Son</option>
				<option value="Brother" <?php if($fa_det->RELATION=='Brother') { ?> selected="selected" <? } ?>>Brother</option>
				<option value="Sister" <?php if($fa_det->RELATION=='Sister') { ?> selected="selected" <? } ?>>Sister</option>
			</select></td>
		  </tr>
		  
		  <tr>
		  <td colspan="3">&nbsp;</td>
		  </tr>
		
               
			<tr>
            <td colspan="3" class="ntext">Mobile <span class="red">*</span></td>
		  </tr>
		  <tr>
			<td colspan="3"><input type="text" class="textfiled-M" size="25" name="mobile" value="<?php print $fa_det->MOBILE;?>" id = "mobile" maxlength="10" o/></td>
		  </tr>
		  <tr>
		<tr>
		  <td colspan="3">&nbsp;</td>
		</tr> 
		<tr>
            <td colspan="3" class="ntext">E-mail ID <span class="red">*</span></td>
	  </tr>
		  <tr>
			<td colspan="3"><input type="text" class="textfiled-M" size="25" name="email" value="<?php print $fa_det->EMAIL;?>" id = "email"  maxlength="100" />               </td>
		  </tr>
           
          	<tr>
              <td colspan="3">&nbsp;</td>
            </tr>
			<tr>
              <td colspan="3" align="center" style="  margin-top:0;"><input type="reset" value="Reset" name="submi" class="but-gray" style="margin-right:10px;" />
               <input type="submit" value="Add" name="submit" class="but-blue" onClick="" style="margin-right:10px;"/> &nbsp;&nbsp;<!--input class="but-blue" type="button" name="submi" value="View Family Members" onClick="window.location='p_family.php'" --></td>
            </tr>
		  </table>
        </form>		
</div>
		
</body>
</html>
<?php
	if(isset($_POST['submit']) && $_GET['fm_id']=='')
	{
		$dat=explode('/',$_POST['dob']);
		$date_val=$dat[2].'-'.$dat[0].'-'.$dat[1];
		$date1=date('Y-m-d');
		if($date_val<$date1)
		{
	$insert_family=mysql_query("insert into patient_family (PATIENT_ID,FNAME,MNAME,LNAME,DOB,GENDER,RELATION,MOBILE,EMAIL,CUSER,CDATE) values ('".$user_id."','".$_POST['fname']."','".$_POST['mname']."','".$_POST['lname']."','".$date_val."','".$_POST['gender']."','".$_POST['relation']."','".$_POST['mobile']."','".$_POST['email']."','".$_SESSION['username']."','".date('Y-m-d')."')");
			if($insert_family==1)
			{
				print("<script language='javascript'>alert('inserted successfully...'); window.location.href='p_family.php';</script>");
			}	
		}
		else
		{
			print("<script language='javascript'>alert('date of birth can not be the future date...'); window.location.href='addfamily.php';</script>");
		}
	}
	else if(isset($_POST['submit'])  && $_GET['fm_id']!='')
	{
		$dat=explode('/',$_POST['dob']);
		$date_val=$dat[2].'-'.$dat[0].'-'.$dat[1];
		$date1=date('Y-m-d');
		if($date_val<$date1)
		{
			$update_family=mysql_query("update patient_family set FNAME='".$_POST['fname']."', MNAME='".$_POST['mname']."', LNAME='".$_POST['lname']."', DOB='".$date_val."', GENDER='".$_POST['gender']."', RELATION='".$_POST['relation']."', MOBILE='".$_POST['mobile']."', EMAIL='".$_POST['email']."', EUSER='".$_SESSION['username']."', EDATE='".date('Y-m-d')."' where PATIENT_FAMILY_ID='".$_GET['fm_id']."'");
			if($update_family==1)
			{
				print("<script language='javascript'>alert('updated succesfully...'); window.location.href='p_family.php';</script>");
			}
		}	
		else
		{
			$fm_id=$_GET['fm_id'];
			print("<script language='javascript'>alert('date of birth can not be the future date...'); window.location.href='addfamily.php?fm_id=$fm_id';</script>");
		}
	}
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}

?>
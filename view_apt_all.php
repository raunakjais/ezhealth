<?php 
include("config/config.php");
if($_SESSION['username'])
{
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
<script type="text/javascript" src="advance_search.js"></script>
<script type="text/javascript" src="scw.js"></script>
</head>
<body class="maina">
<!--div class="dashright"-->
<form name="search1" method="post" action="" >
  <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <th width="157" class="timetabH4">Doctor Name</th>
      <th width="284" class="timetabH4">Booking Count</th>
      <th width="146" class="timetabH4">Day</th>
	  <th width="131" class="timetabH4">Date</th>
    </tr>
    <?php $get_doc_list=mysql_query("select * from doc_mapping,doctor_register where DOC_ID=DOCTOR_ID and RECP_ID='".$_SESSION['recp_id']."'"); 
		while($val=mysql_fetch_object($get_doc_list))
		{
			$sel_count=mysql_num_rows(mysql_query("select * from booking where DOCTOR_ID='".$val->DOCTOR_ID."' and APT_DATE='".date('Y-m-d')."' and FLAG=0"));
	?>
    <tr>
      <td width="157" class="timetabH1"><?=$val->DOCTOR_FIRST_NAME.' '.$val->DOCTOR_LAST_NAME?>      </td>
      <td width="284" class="timetabH2"><!--a href="view_apt.php?id=<?=$val->DOCTOR_ID?>" style="text-decoration:none; color:#999999;"--><?=$sel_count?><!--/a--></td>
      <td width="146" class="timetabH1"><?php print date('l');?></td>
	  <td width="131" class="timetabH2"><?=date('d/m/Y');?></td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>
<?php
}
else
{
	print("<script language='javascript'> parent.parent.location.href='logout.php';</script>");
}
?>
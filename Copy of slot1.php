<?php 
include("config/config.php");
$dt_sch='';
$dt_time='';
$get_sch=mysql_query("select APT_TIME,APT_DATE from booking where DOCTOR_ID='".$_SESSION['doc_id']."' and APT_DATE>='".date('Y-m-d')."'");
while($sch=mysql_fetch_object($get_sch))
{
	$var_dt=explode('-',$sch->APT_DATE);
	//print_r($var_dt);
	$fdt=$var_dt[2].'/'.$var_dt[1].'/'.$var_dt[0];
	if($dt_sch==''){ $dt_sch=$fdt.'~'.$dt_time=$sch->APT_TIME; } else { $dt_sch=$dt_sch.','.$fdt.'~'.$dt_time=$sch->APT_TIME; }
} 
$dt_h=explode(',',$dt_sch);
//print_r($dt_h);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="30">
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
<body bgcolor="">
					
<table width="100%" class="timetable">					
					<?php 
					$a=540;
					$b=1260;
					$lp=1;
					while($a<$b) { ?>
					<tr>
						<td width="74px;"><?php $hr=$a/60; $mn=$a%60; if($mn=='0') { $mn='00'; } print floor($hr).' : '.$mn; ?></td>
						<?php for($i=7;$i<14;$i++) { 
								$apt_date = date("d/m/Y", strtotime("+ $i day")); 
								$apt_date1 = date('Y-m-d', strtotime("+ $i day")); 
								?>
						<td width="74px;" 
						<?php if (in_array($apt_date.'~'.$lp, $dt_h)) { 
						$get_bk_det=mysql_fetch_object(mysql_query("select * from booking,booking_details where APT_DATE='".$apt_date1."' and APT_TIME='".$lp."' and DOCTOR_ID='".$_SESSION['doc_id']."' and booking.BOOKING_ID=booking_details.BOOKING_ID"));
						if($get_bk_det->FLAG=='1' && $_SESSION['user_type']!='P') { ?> bgcolor="#CC3366" 
						<? } else { ?> bgcolor="#FF0000" <? } ?> ;>
						<a href="#" <?php if($_SESSION['user_type']=='D' || $_SESSION['user_type']=='R') { ?> onclick="window.open('book_view.php?dt=<?php print $apt_date; ?>&bk_id=<?php print $lp; ?>','view_slot', 'menubar=0,resizable=no,scrollbars=1,width=750,height=650')" <?php } ?> > 
						 <div style=" height:100%; width:30px; color:#FFFFFF; text-align:center;">
						<?php 
						if($_SESSION['user_type']!='P') {
						 print $get_bk_det->FNAME; 
						 }
						 ?>
						</div>
						</a>
						 <? } else { ?>    
						   bgcolor="#00CC33;"> 

<a href="#" onclick="window.open('<?php if($_SESSION['user_type']=='D' || $_SESSION['user_type']=='R'){ ?>book_d.php<?php } if($_SESSION['user_type']=='P'){?>book_p.php<? } ?>?dt=<?php print $apt_date; ?>&bk_id=<?php print $lp; ?>','view_slot', 'menubar=0,resizable=no,scrollbars=1,width=750,height=650')">
<div style="background-color:#00CC33; height:100%; width:100%;">&nbsp;</div>
</a>
<? } ?>
</td>


						<?php } ?>
						<?php $a=$a+15; 
							  $lp=$lp+1;	
						          } ?>
					</tr>
				</table>
</body>
</html>




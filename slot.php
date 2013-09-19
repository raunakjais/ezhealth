<?php 
include("config/config.php");
$dt_sch='';
$dt_time='';
$get_sch=mysql_query("select APT_TIME,APT_DATE from booking where DOCTOR_ID='".$_SESSION['doc_id']."' and APT_DATE>='".date('Y-m-d')."'");
while($sch=mysql_fetch_object($get_sch))
{
	$var_dt=explode('-',$sch->APT_DATE);
	$fdt=$var_dt[2].'/'.$var_dt[1].'/'.$var_dt[0];
	if($dt_sch==''){ $dt_sch=$fdt.'~'.$dt_time=$sch->APT_TIME; } else { $dt_sch=$dt_sch.','.$fdt.'~'.$dt_time=$sch->APT_TIME; }
} 
$dt_h=explode(',',$dt_sch);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--meta http-equiv="refresh" content="10"-->
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
<body bgcolor="">	
<table width="100%" class="timetable">					
					<?php 
					$a=540;
					$b=1260;
					$lp=1;
					while($a<$b) { ?>
					<tr>
						<td width="74px;" align="center"><b><?php $hr=$a/60; $mn=$a%60; if($mn=='0') { $mn='00'; } print floor($hr).' : '.$mn; ?></b></td>
						<?php for($i=0;$i<7;$i++) { 
								$apt_date = date("d/m/Y", strtotime("+ $i day")); 
								$apt_date1 = date('Y-m-d', strtotime("+ $i day")); 
								?>
						<td width="74px;" 
						<?php if (in_array($apt_date.'~'.$lp, $dt_h)) { 
						$get_bk_det=mysql_fetch_object(mysql_query("select * from booking,booking_details where APT_DATE='".$apt_date1."' and APT_TIME='".$lp."' and DOCTOR_ID='".$_SESSION['doc_id']."' and booking.BOOKING_ID=booking_details.BOOKING_ID"));
						if($get_bk_det->FLAG=='1' && $_SESSION['user_type']!='P' && $_SESSION['user_type']!='') { ?> bgcolor="#95DFB3" 
						<? } else { ?> bgcolor="#FFB871" <? } ?> ;>
						<a class="iframe" <?php if($_SESSION['user_type']=='D') { ?> href="book_view.php?dt=<?php print $apt_date; ?>&bk_id=<?php print $lp; ?>" <?php } if($_SESSION['user_type']=='R') { ?> href="book_view_r.php?dt=<?php print $apt_date; ?>&bk_id=<?php print $lp; ?>" <? } ?> > 
						 <div style=" height:100%; width:30px; color:#FFFFFF; text-align:center;">
						<?php 
						if($_SESSION['user_type']!='P' && $_SESSION['user_type']!='') {
						 print $get_bk_det->FNAME; 
							} 
						 ?>
						</div>
						</a>
						 <? } else if($_SESSION['user_type']=='') { ?>    
						   bgcolor="#000;"> 

<a href="login_new.php?dt=<?php print $apt_date; ?>&bk_id=<?php print $lp; ?>" target="_parent">
<div style="background-color:#FFF; height:100%; width:100%;">&nbsp;</div>
</a>
<? } else { ?>
bgcolor="#000;"> 
<a href="<?php if($_SESSION['user_type']=='D' || $_SESSION['user_type']=='R'){ ?>book_d.php<?php } if($_SESSION['user_type']=='P'){?>book_p.php<? } ?>?dt=<?php print $apt_date; ?>&bk_id=<?php print $lp; ?>" class="iframe">
<div style="background-color:#FFF; height:100%; width:100%;">&nbsp;</div>
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




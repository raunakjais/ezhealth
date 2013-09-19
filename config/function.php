<?php
function slot($a)
{
	$b=explode(':',$a);
	$c=$b[0].':'.$b[1];
	if($b[0]>=9 && $b[0]<12)
	{
		return $c.' am';
	}
	else 
	{
		return $c.' pm';
	}	
}
function dateformat($a)
{
	return date('D, M d, Y', strtotime($a));
}
?>
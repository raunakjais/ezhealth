<?php
session_start();
mysql_connect("localhost","root","vs",false,65536);
mysql_select_db("ez"); 
$from ='support@ezpointment.com';
date_default_timezone_set('Asia/Calcutta');
?>
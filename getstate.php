<?php
include("config/config.php");
 $q=explode('~',$_GET["q"]);
	if($q[1]=='state_list')
	{
	?>
		<select name="cmbState" id="cmbState" onChange="showUser1(this.value,'city_list');" class="drop3">
			<option value="">Select State</option>
			<?php $sel_query1=mysql_query("select * from state_table where COUNTRY_ID='".$q[0]."'");
			while($row=mysql_fetch_object($sel_query1)) { 
			?>
			<option value="<?=$row->STATE_ID?>"><?php print $row->STATE_NAME; ?></option>
			<?php 
			} ?>
			</select>
	<?php  
	}
	else if($q[1]=='city_list')
	{
	?>	
		<select id="cmbCity" name="cmbCity" onChange="showUser1(this.value,'area_list');" class="drop3">
			<option value="">Select City</option>
			<?php 
			$sel_query=mysql_query("select * from city_table where STATE_ID='".$q[0]."'");
			while($row3=mysql_fetch_object($sel_query)) { ?>
			<option value="<?=$row3->CITY_ID?>"><?php print $row3->CITY_NAME; ?></option>
			<?php }
			?>
		</select>
		
	<?php  
	}
	else if($q[1]=='area_list')
	{
	?>	
		<select name="cmbArea" id="cmbArea" class="drop3">
		<option value="">Select Area</option>
			<?php 
			$sel_query2=mysql_query("select * from area_table where CITY_ID='".$q[0]."'");
			while($row4=mysql_fetch_object($sel_query2)) { ?>
			<option value="<?=$row4->AREA_ID?>"><?php print $row4->AREA_NAME; ?></option>
			<?php }
			?>
		</select>
	<?php  
	}
	else if($q[1]=='search_area_list')
	{
	?>
		<select name="area" id="area" class="drop2">
			<option value="" >Search in Area/Locality</option>
			<?php 
			$sel_query2=mysql_query("select * from area_table where CITY_ID='".$q[0]."'");
			while($row4=mysql_fetch_object($sel_query2)) { ?>
			<option value="<?=$row4->AREA_ID?>"><?php print $row4->AREA_NAME; ?></option>
			<?php }
			?>
		</select>
	<?
	}
?>
<?php
include("config_db25788.php");
$sid=$_GET['sid'];
$q=mysql_query("select * from sdcac_user_table where user_id='$sid'") or die(mysql_error());
$st_data=mysql_fetch_array($q);

?>
	<h3 style='background-color:black;height:20px;color:white;'><span><center> Student Information</center></span></h3><br>
	<table id="ast" style="width:100%;border:1px solid #333333" cellpadding="1" cellspacing="1">
	<tr height='5px'><th></th><th></th><th></th></tr>
	<tr>
		<th align='left' style='width:20%;'><h4>&nbsp;&nbsp;ID <th>:</th></h4></th><th align='left' style='width:80%'>&nbsp;&nbsp;<?php echo $st_data['user_id']?></th>
	</tr>
	<tr height='4px'><th></th><th></th><th></th></tr>
	<tr>
		<th align='left' style='width:20%'><h4>&nbsp;&nbsp;Name</h4></th><th>:</th><th align='left' style='width:80%'>&nbsp;&nbsp;<?php echo $st_data['user_name']?></th>
	</tr>
	<tr height='4px'><th></th><th></th><th></th></tr>
	<tr>
		<th align='left' style='width:20%'><h4>&nbsp;&nbsp;Branch </h4></th><th>:</th><th align='left' style='width:80%'>&nbsp;&nbsp;<?php echo $st_data['branch']?></th>
	</tr>
	<tr height='4px'><th></th><th></th><th></th></tr>
	<tr>
		<th align='left' style='width:20%'><h4>&nbsp;&nbsp;Class </h4></th><th>:</th><th align='left' style='width:80%'>&nbsp;&nbsp;<?php echo $st_data['class']?></th>
	</tr>
	<tr height='5px'><th></th><th></th><th></th></tr>
	</table>






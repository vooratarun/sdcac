<?php
	include("config_db25788.php");
	$id=addslashes(htmlentities(($_GET['e3_id'])));
	$batch=mysql_query("SELECT Branch FROM students WHERE ID='$id'");
	$ary=mysql_fetch_array($batch);
	if($ary[0]=="none"){
		die("<span style='color:red;'>Only for Engineering students.........</span>");
	}
	if(mysql_num_rows($batch)==0)
	{
			die("<span style='color:red;'>Id doesn't exist........</span>");
	}
		$query=mysql_query("INSERT INTO ornt_e3 VALUES('$id')");
		if($query){
			echo"<span style='color:green;'>Successfully registered.............</span>";
		}
		else{
			echo "<span style='color:red;'>Already Registered</span>";
		}
?>

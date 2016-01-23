<?php
session_start();
if(isset($_SESSION['login_id']))
{
	include("../config_db25788.php");
	$id=$_SESSION['login_id'];
	$mai=htmlentities(addslashes($_POST['mail']));
	$gr=htmlentities(addslashes($_POST['group']));
	if(mysql_query("update sdcac_user_table set mail_id='$mai',memb_group='$gr' where user_id='$id'")) echo "Successfully Updated</div><div><a href=''>Refresh</a>";
}
else
{
	echo "Not Allowed";
}
?>

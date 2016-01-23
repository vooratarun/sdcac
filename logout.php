<?php
session_start();
if(isset($_SESSION['login_id']))
{
include("config_db25788.php");
$id=$_SESSION['login_id'];
	$st=mysql_query("select * from sdcac_user_state where user_id='$id'")or die(mysql_error());
	if(mysql_num_rows($st)==1)
		mysql_query("update sdcac_user_state set state='off' where user_id='$id'")or die("");
	else if(mysql_num_rows($st)==0)
		mysql_query("insert into sdcac_user_state values('$id','off')")or die(mysql_error());
}
session_destroy();
header('Location:../sdcac/');
?>

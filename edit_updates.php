<?php
session_start();
include "config_db25788.php";
if(isset($_GET['times']))
{
	if(isset($_SESSION['admin_id']))
	{
		$qno=$_GET['times'];
		$query1=mysql_query("select * from sdcac_admins_posts where query_no=$qno") or die(mysql_error());
		$dat=mysql_fetch_array($query1);$dat[0]=htmlentities(addslashes($dat[0]));$dat[1]=htmlentities(addslashes($dat[1]));$dat[2]=htmlentities(addslashes($dat[2]));$dat[3]=htmlentities(addslashes($dat[3]));$dat[4]=htmlentities(addslashes($dat[4]));$dat[5]=htmlentities(addslashes($dat[5]));$dat[6]=htmlentities(addslashes($dat[6]));$dat[7]=htmlentities(addslashes($dat[7]));$dat[8]=htmlentities(addslashes($dat[8]));
		$query2=mysql_query("insert into sdcac_admins_posts_backup values('$dat[0]','$dat[1]','$dat[2]','$dat[3]','$dat[4]','$dat[5]','$dat[6]','$dat[7]','$dat[8]')")or die(mysql_error());
		$query1=mysql_query("delete from sdcac_admins_posts where query_no=$qno") or die(mysql_error());
		if($query1){echo "Deleted";}else {echo "Sorry Try again";}
	}
	else if(isset($_SESSION['login_id']) && isset($_SESSION['sdcac_organize']))
	{
		$qno=$_GET['times'];
		$id=$_SESSION['login_id'];
		$query1=mysql_query("select * from sdcac_admins_posts where query_no=$qno and admin_id='$id'") or die(mysql_error());
		$dat=mysql_fetch_array($query1);$dat[0]=htmlentities(addslashes($dat[0]));$dat[1]=htmlentities(addslashes($dat[1]));$dat[2]=htmlentities(addslashes($dat[2]));$dat[3]=htmlentities(addslashes($dat[3]));$dat[4]=htmlentities(addslashes($dat[4]));$dat[5]=htmlentities(addslashes($dat[5]));$dat[6]=htmlentities(addslashes($dat[6]));$dat[7]=htmlentities(addslashes($dat[7]));$dat[8]=htmlentities(addslashes($dat[8]));
		$query2=mysql_query("insert into sdcac_admins_posts_backup values('$dat[0]','$dat[1]','$dat[2]','$dat[3]','$dat[4]','$dat[5]','$dat[6]','$dat[7]','$dat[8]')")or die(mysql_error());
		$query1=mysql_query("delete from sdcac_admins_posts where query_no=$qno and admin_id='$id'") or die(mysql_error());
		if($query1){echo "Deleted";}else {echo "Sorry Try again";}
	}
	else if(isset($_SESSION['login_id']))
	{
		$times=$_GET['times'];
		$id=$_SESSION['login_id'];
		$query1=mysql_query("select * from posted_queries where id='$id' and timestamp='$times'") or die(mysql_error());
		$dat=mysql_fetch_array($query1);$dat[0]=htmlentities(addslashes($dat[0]));$dat[1]=htmlentities(addslashes($dat[1]));$dat[2]=htmlentities(addslashes($dat[2]));$dat[3]=htmlentities(addslashes($dat[3]));$dat[4]=htmlentities(addslashes($dat[4]));$dat[5]=htmlentities(addslashes($dat[5]));$dat[6]=htmlentities(addslashes($dat[6]));$dat[7]=htmlentities(addslashes($dat[7]));$dat[8]=htmlentities(addslashes($dat[8]));
		$query2=mysql_query("insert into posted_queries_backup values('$dat[0]','$dat[1]','$dat[2]','$dat[3]','$dat[4]','$dat[5]','$dat[6]','$dat[7]','$dat[8]')")or die(mysql_error());
		$query1=mysql_query("delete from posted_queries where id='$id' and timestamp='$times'") or die(mysql_error());
		if($query1){echo "Deleted";}else {echo "Sorry Try again";}
	}
}
else
{
	if(isset($_SESSION['login_id']) && isset($_SESSION['sdcac_organize']))
	{
		$id=$_SESSION['login_id'];
		$query1=mysql_query("update sdcac_admins_posts set view_response=1 where admin_id='$id' and post_response!=''") or die(mysql_error());
		if($query1){
			echo "<em><img alt='' src='assets/img/icons/information.png'></img>Saved In All Notifications...</em>";}
		else {echo "Sorry Try again";}
	}
	else if(isset($_SESSION['login_id']))
	{
		$id=$_SESSION['login_id'];
		$query1=mysql_query("update posted_queries set view_response=1 where id='$id'") or die(mysql_error());
		if($query1){
			echo "<em><img alt='' src='assets/img/icons/information.png'></img>Saved In All Notifications...</em>";}
		else {echo "Sorry Try again";}
	}

}

?>

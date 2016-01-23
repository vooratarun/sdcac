<?php
session_start();
include "config_db25788.php";
if(!isset($_SESSION['admin_id']))
{
header("Location:index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<?php
$query=$_POST["q"];
$id=$_POST['id'];
$ans=htmlentities(addslashes($_POST["ans"]));
if($ans=="@"){
		$query1=mysql_query("select * from posted_queries where id='$id' and timestamp='$query'") or die(mysql_error());
		$dat=mysql_fetch_array($query1);
		$dat[0]=htmlentities(addslashes($dat[0]));$dat[1]=htmlentities(addslashes($dat[1]));$dat[2]=htmlentities(addslashes($dat[2]));$dat[3]=htmlentities(addslashes($dat[3]));$dat[4]=htmlentities(addslashes($dat[4]));$dat[5]=htmlentities(addslashes($dat[5]));$dat[6]=htmlentities(addslashes($dat[6]));$dat[7]=htmlentities(addslashes($dat[7]));$dat[8]=htmlentities(addslashes($dat[8]));
		$query2=mysql_query("insert into posted_queries_backup values('$dat[0]','$dat[1]','$dat[2]','$dat[3]','$dat[4]','$dat[5]','$dat[6]','$dat[7]','$dat[8]')")or die(mysql_error());
		$query1=mysql_query("delete from posted_queries where timestamp='$query'") or die(mysql_error());
		echo "<span style='color:white'>Deleted</span>";
}
else
{
		mysql_query("update posted_queries set response='$ans' where id='$id' and timestamp='$query'");
		echo "<span style='color:white'>Succefully submitted</span>";
}
?>
</body>
</html>



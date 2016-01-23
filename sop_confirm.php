<?php
session_start();
include "config_db25788.php";
$sbwork=$_GET['sdwork'];
$sop=$_GET['sop'];
$fgoal=$_GET['fgoal'];
$worked=$_GET['worked'];
$eca=$_GET['eca'];
$id=$_SESSION['login_id'];


$mine=mysql_query("SELECT * FROM sop_reg WHERE id='$id'");
if(mysql_num_rows($mine)>0)
{
	echo "<center><h3><font color=red>Already Registred</font></h3></center>";
}
else
{
echo "<center><font color=red>Data Processing...</font></center>";
$kk="INSERT INTO `sdcac_database`.`sop_reg` (
`id` ,
`sdcac_bwork` ,
`other_org` ,
`sop` ,
`goals` ,
`eca`
)
VALUES (
'$id', '$sbwork', '$worked', '$sop', '$fgoal', '$eca'
)";
$q1=mysql_query($kk);
if($q1==true)
	echo "<center><h3><font color=green>Registration Done Successfully.</font></h3></center>";

}



?>
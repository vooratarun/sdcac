<?php
session_start();
if(!isset($_SESSION['admin_id1']))
die("Dead link<a href='http://10.11.3.11/sdcac/'>back</a>");
?>
<form action="" method="post">
<select name="tb_n">
<?php
include("config_db25788.php");
$q=mysql_query("show tables;")or die(mysql_error());
while($d=mysql_fetch_array($q))
{
echo "<option>".$d[0]."</option>";
}
?>
</select>
<input type="submit" value="show" name="show">
</form>

<?php
if(isset($_POST['tb_n']))
{
$tb=$_POST['tb_n'];
$qq=mysql_query("SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = 'sdcac_database' AND table_name ='$tb'")or die(mysql_error());
$dd=mysql_fetch_array($qq);
$q=mysql_query("select * from $tb")or die(mysql_error());
echo "<table border=1>";
while($d=mysql_fetch_array($q))
{
echo "<tr>";
for($i=0;$i<$dd[0];$i++)
  echo "<td>".$d[$i]."</td>";
echo "</tr>";
}
echo "</table>";
}
?>
<?php
include 'config_db25788.php';
$q=mysql_query('SELECT DISTINCT ID1,ID2,ID3,AI FROM art_reg');
$c=1;
echo "<table >";
while($r=mysql_fetch_array($q)){
 echo "<tr style='border:1px dotted black;'><td style='width:60px;'>".$c++."</td><td style='width:120px;'>".$r[0]."</td><td style='width:120px;'>".$r[1]."</td><td style='width:120px;'>".$r[2]."</td><td style='width:200px;'>".$r[3]."</td></tr>";

}
echo "</table>";
?>
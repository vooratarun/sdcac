<?php
session_start();
include "config_db25788.php";
$query = mysql_query('select * from festname');
$count=0;
if(!$query)
    die(mysql_error());
else
  {
      echo "<div style='margin-top:20px;width:1180px;height:35px;color:orange;font-weight:bold;text-align:center;margin-left:auto;margin-right:auto;'>Collected Fest Names Information </div>";
      echo "<table cellspacing=0 cellpadding=0 style='font-size:14px;width:1180px;margin-top:5px;;margin-left:auto;margin-right:auto;border-bottom:1px solid rgb(200,200,200);'><tr style='text-align:center;background:#cccccc;color:red;font-weight:bold;font-size:14px;height:35px;'><td style='width:80px;'>COUNT</td><td style='width:120px;text-align:center;'>ID</td><td style='width:230px;text-align:left;'>FEST NAME</td><td>DESCRIPTION</td></tr>";
      while($row=mysql_fetch_array($query))
      {
         $count++;
         if($row[2]=="")
               $desc = "<span style='color:#c1c1c1;'>Not Given</span>";
         else
               $desc = $row[2];
          echo "<tr class='rows' style='line-height:15px;text-align:center;height:45px;'><td>".$count."</td><td>".$row[0]."</td><td style='text-align:left;font-weight:bold;font-size:13px;'>".$row[1]."</td><td style='text-align:left;line-height:18px;'>".$desc."</td></tr>";
      }
      echo "</table>";
  }
?>
<style>
     .rows:nth-child(even)
     {
           background:#f1f1f1;
     }
     .rows:nth-child(odd)
     {
           background:#f8f8f8;
     }
     .rows:hover
     {
         background:#d8d8d8;
     }

</style>
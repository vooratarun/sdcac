<?php
   echo "<div style='margin-top:70px;margin-left:100px;font-size:15px;'>";
   echo "<h5 style='margin-left:200px;font-weight:bold;text-decoration:underline;color:green;'>Available Techfest Events</h5>";
   $arr = Array('Open to all','Chemical','Civil','CSE','ECE','Mechanical','MME','Robotics');
   $fests = 'fests2';
   $main = scandir($fests);
   for($j=2;$j<sizeof($main);$j++)
   {
  
      $sub=$main[$j];
      echo "<br /><div style='width:300px;height:30px;font-weight:bold;cursor:pointer;' onclick='show(\"$sub\")'>&rarr;<span style='color:brown;padding-left:10px;'>".$arr[$j-2]."</span></div>";
      $subf = scandir($fests."/".$sub);
      echo "<ul id='$sub' style='display:none;'>";
      for($i=2;$i<sizeof($subf);$i++)
      {
        $var = $subf[$i];
        $subf[$i] = str_ireplace(' ','%20',$var);
        echo "<li><a href=fests2/".$sub."/".$subf[$i]." target='blank'  style='cursor:pointer;text-decoration:none;font-size:13px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$var."</a></li><br />";
      }
      echo "</ul>";
   }
   echo "</div>";
?>





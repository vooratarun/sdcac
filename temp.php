<?php
function del($s)
{
if(scandir($s))
{
$var = scandir($s);
for($i=2;$i<sizeof($var);$i++)
  del($s."/".$var[$i]);
  rmdir($s);
}
else
unlink($s);
}
del('../sdcac/discuss1');
del('../sdcac/discuss2');
del('../sdcac/discuss3');
del('../sdcac/discussion');
?>
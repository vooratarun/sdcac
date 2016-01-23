<?php
include("../config_db25788.php");
$qn=$_GET['qn'];
if(isset($_GET['sep']))
{
	
$q=mysql_query("select * from discuss_ans_gcg where query_no='$qn' and state=2 order by timestamp desc");
echo <<<s
<div class="response" id="num_ans_$qn" style="background:#F5F5F5;">
	<h6>Your Response</h6>
	<textarea id="ansfor_$qn"></textarea>
	<span><button class="btn btn-primary" onclick="send_ans1($qn)"><i class="icon-ok icon-white"></i>Send</button></span>
</div>
s;
}
else
{
	
$q=mysql_query("select * from discuss_ans where query_no='$qn' and state=2 order by timestamp desc");
echo <<<s
<div class="response" id="num_ans_$qn" style="background:#F5F5F5;">
	<h6>Your Response</h6>
	<textarea id="ansfor_$qn"></textarea>
	<span><button class="btn btn-primary" onclick="send_ans($qn)"><i class="icon-ok icon-white"></i>Send</button></span>
</div>
s;
}
while($r=mysql_fetch_array($q))
{
	echo <<<s
	<div class="response">
		<strong>$r[2]</strong>
		$r[3]
		<p>$r[4]</p>
	</div>
s;

}
if(mysql_num_rows($q)==0)
	echo "<span class='pull-left'>No answers available</span><br/>";
?>

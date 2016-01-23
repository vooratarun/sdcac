<?php
session_start();
if(!isset($_SESSION['login_id']))
{
	die("Not Allowed without login");
}
?>
<style>
.response
{
	padding-right:5px;
}
</style>
<?php
include("../config_db25788.php");
$q11=mysql_query("select distinct query_no from discuss_ans where state=1 order by query_no desc")or die(mysql_error());
while($quer_no=mysql_fetch_array($q11))
{
	$q=mysql_query("select * from discussion_forum where query_no=$quer_no[0] and state=2") or die(mysql_error());
	while($r=mysql_fetch_array($q)){

		$q1=mysql_query("select * from discuss_ans where query_no=".$r['query_no']." and state=1 order by timestamp desc")or die(mysql_error());
		$resp_no=mysql_num_rows($q1);
		echo <<<s
			<div style="margin-top:50px;">
			<div class="discussion_main">
				&nbsp;
				<span class="pull-left" style="color: rgb(0, 136, 204);">Post by <span class="badge">$r[1] (<span id="cat$r[0]">$r[5]</span>)</span></span>
				<div class="pull-right"><span class="label label-warning">id $r[0] </span> <span class="label label-info">$r[6]</span></div>
				<p><b>$r[2]</b></p>
				<div><strong> <span class="pull-right">Responses <span class="badge badge-success" id="resp_no_$r[0]">$resp_no</span></span></strong></div>
				<p></p>
				<div class="cont">$r[3]</div>
			</div>
			<div class="responses" id="ans_div_$r[0]">
				<div class="response" id="num_ans_$r[0]" >
					<h6>Your Response</h6>
					<textarea id="ansfor_$r[0]"></textarea>
					<span ><button class="btn btn-primary" onclick="send_ans($r[0])"><i class="icon-ok icon-white"></i>Send</button></span>
				</div>
				
s;
		if($resp_no!=0)
		{
			$cc=1;
			while($r2=mysql_fetch_array($q1))
				{
					
					echo <<<s
					<div class="response">
					<span id='ac$r2[0]$cc' class='pull-right'><i class='icon-ok' style='cursor:pointer;' onclick='confirmation("a",$r[0],"c",$cc)'></i>
						<i class='icon-trash' style='cursor:pointer;margin-left:30px' onclick='confirmation("a",$r[0],"d",$cc)'></i></span>
						<strong>$r2[2]</strong>
						$r2[3]
						<p id='tim$r2[0]$cc'>$r2[4]</p>
					</div>
s;
					$cc++;
				}
			
			echo <<<s
				</div>
				
			</div>
s;
			
		}
		echo '</div>
			<div class="seperator"></div>';
	}
}
?>

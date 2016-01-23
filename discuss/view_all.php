<?php
session_start();
include "../config_db25788.php";
if(!isset($_SESSION['login_id']))
{
	die("<br/><h1>Access Forbidden</h1>");
}
?>
<style>
#main
{
	
}
</style>
<ul class="breadcrumb">
    <li><a href="../">Home</a> <span class="divider"></span></li>
    <li><a href="">Discussion</a> <span class="divider"></span></li>
    <li class="active">All Discussions</li>
    </ul>
<?php
	$q=mysql_query("select * from discussion_forum where state=1 order by query_no desc")or die(mysql_error());
	$no_q=mysql_num_rows($q);
	$qa=mysql_query("select * from discuss_ans where state=1")or die(mysql_error());
	$no_a=mysql_num_rows($qa);
if(isset($_GET['nop']))
{?>
<ul class="nav nav-pills" style="margin-left:10%;margin-top:2%;">
		<li id='m1'><a onclick="$('#m2').removeClass(),$('#m1').addClass('active'),load_option('view_all')">Questions<strong>(<?php echo $no_q ?>)</strong></a></li>
		<li id="m2"><a onclick="$('#m1').removeClass(),$('#m3').removeClass(),$('#m2').addClass('active'),load_answers()">Answers<strong>(<?php echo $no_a ?>)</strong></a></li>
		<li class="active" id="m3"><a onclick="$('#m1').removeClass(),$('#m2').removeClass(),$('#m3').addClass('active'),load_all()">Show all</a></li>
</ul>	
<?php
}
if(isset($_SESSION['confirm']) && $_SESSION['confirm']=="other" && !isset($_GET['nop']))
{
?>
<ul class="nav nav-pills" style="margin-left:10%;margin-top:2%;">
		<li class="active" id='m1'><a onclick="$('#m2').removeClass(),$('#m1').addClass('active'),load_option('view_all')">Questions<strong>(<?php echo $no_q ?>)</strong></a></li>
		<li id="m2"><a onclick="$('#m1').removeClass(),$('#m3').removeClass(),$('#m2').addClass('active'),load_answers()">Answers<strong>(<?php echo $no_a ?>)</strong></a></li>
		<li id="m3"><a onclick="$('#m1').removeClass(),$('#m2').removeClass(),$('#m3').addClass('active'),load_all()">Show all</a></li>
</ul>
<?php
	echo '<div class="discussion_holder" id="questions">';
	
		$cc=1;
		while($r=mysql_fetch_array($q)){
			echo <<<s
			<div style="margin-top:50px;">
			<div class="discussion_main">
				&nbsp;
				<span class="pull-left" style="color: rgb(0, 136, 204);">Post by <span class="badge">$r[1] (<span id="cat$cc">$r[5]</span>)</span></span>
				<div class="pull-right"><span class="label label-warning">id $r[0] </span> <span class="label label-info">$r[6]</span></div>
				<p><b>$r[2]</b></p>
				<div class="cont">$r[3]
				<span style='margin-left:50px' id='qc$r[0]$cc'><span class='label label-success' style='cursor:pointer' onclick='confirmation("q",$r[0],"c",$cc)'>Confirm ?</span>
				<span class='label label-important' style='cursor:pointer' onclick='confirmation("q",$r[0],"d",$cc)'>Delete <i class='icon-trash icon-white'></i></span></span>
s;
				$cc++;
				echo "</div>";
			echo "</div>
			<div class='seperator'></div>";
			
		}?>
<script type="text/javascript">
function confirmation(what,qn,ac,cc)
{
	tim=1;
	if(what=="a")
	{
	tim=document.getElementById('tim'+qn+''+cc).innerHTML;
	cat=document.getElementById('cat'+qn).innerHTML;
	}
	else
		cat=document.getElementById('cat'+cc).innerHTML;
	post_dat={'what':what,'qno':qn,'action':ac,'tim':tim,'cat':cat};
	$.post("confirm.php",post_dat,function(data){
		$('#'+what+'c'+qn+''+cc).html(data);
	});
}
function load_answers()
{
	$.post("load_answers.php",function(data){
		$(".discussion_holder").html(data);
	});
}
function load_all()
{
	$.post("view_all.php?&nop=1",function(data){
		$('#main').html(data);
		});
}
</script>
<?php		
}
else
{?>
<div class="discussion_holder" >
	
	<?php
		
		$q=mysql_query("select * from discussion_forum where state=2 order by query_no desc");
		while($r=mysql_fetch_array($q)){
			$q1=mysql_query("select * from discuss_ans where query_no=".$r['query_no']." and state=2 order by timestamp desc")or die(mysql_error());
			$resp_no=mysql_num_rows($q1);
			
			echo <<<s
			<div style="margin-top:50px;">
			<div class="discussion_main">
				&nbsp;
				<span class="pull-left" style="color: rgb(0, 136, 204);">Post by <span class="badge">$r[1] (<span>$r[5]</span>)</span></span>
				<div class="pull-right"><span class="label label-warning">id $r[0] </span> <span class="label label-info">$r[6]</span></div>
				<p></p>
				<div><strong>$r[2] <span class="pull-right">Responses <span class="badge badge-success" id="resp_no_$r[0]">$resp_no</span></span></strong></div>
				<p></p>
				<div class="cont">$r[3]</div>
			</div>
			<div class="responses" id="ans_div_$r[0]">
				<div class="response" id="num_ans_$r[0]" style="background:#F5F5F5;">
					<h6>Your Response</h6>
					<textarea id="ansfor_$r[0]"></textarea>
					<span><button class="btn btn-primary" onclick="send_ans($r[0])"><i class="icon-ok icon-white"></i>Send</button></span>
				</div>
				
s;
		if($resp_no!=0)
		{
			if($resp_no>=3)
			{
				$n=mt_rand(1,3);
				for($i=0;$i<$n;$i++)
				{
				$r2=mysql_fetch_array($q1);
				echo <<<s
				<div class="response">
					<strong>$r2[2]</strong>
					$r2[3]
					<p>$r2[4]</p>
				</div>
				
				
s;
				}	
			}
			else
			{
			$r2=mysql_fetch_array($q1);
			echo <<<s
			<div class="response">
					<strong>$r2[2]</strong>
					$r2[3]
					<p>$r2[4]</p>
				</div>
				
			
s;
			}
			echo <<<s
			<div class="response" style="background:none;">
				<span class="pull-right"><span class="badge badge-inverse" onclick="load_ans($r[0])" style="cursor:pointer;">load_all<i class="icon-chevron-right icon-white"></i></span></span>
				</div>
			</div>
s;
			
		}
		echo '</div>
			<div class="seperator"></div>';
			
			
		}
	?>
	
</div>
<?php }?>

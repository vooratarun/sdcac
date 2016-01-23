<?php
session_start();
if(!isset($_SESSION['login_id']))
{
	die("<br/><h1>Access Forbidden</h1>");
}
$ct=htmlentities(addslashes($_GET['cat']));
?>
<ul class="breadcrumb">
    <li><a href="../">Home</a> <span class="divider"></span></li>
    <li><a href="">Discussion</a> <span class="divider"></span></li>
    <li class="active" id='cat'><?php echo $ct; ?></li>
    <li onclick="load_url('<?php echo $ct; ?>')"><a>( Refresh )</a></li>
</ul>
<div class="response" id="post_new">
	<h6>Your question(<?php echo "<strong >".$ct."</strong>"; ?>)</h6>
	<textarea id="gcg" ></textarea>
	<button class="btn btn-primary" onclick="start_new('<?php echo $ct; ?>')"><i class="icon-thumbs-up icon-white"></i> post</button>
</div>
<?php
include "../config_db25788.php";
	$q=mysql_query("select * from discussion_gcg where state=1 and post_subject='$ct' order by query_no desc")or die(mysql_error());
	$no_q=mysql_num_rows($q);
	$qa=mysql_query("select * from discuss_ans_gcg where state=1 and memb_group='$ct'")or die(mysql_error());
	$no_a=mysql_num_rows($qa);
if(isset($_GET['nop']))
{?>
	<ul class="nav nav-pills" style="margin-left:10%;margin-top:2%;">
		<li id='m1'><a onclick="$('#m2').removeClass(),$('#m1').addClass('active'),load_url('<?php echo $ct; ?>')">Questions<strong>(<?php echo $no_q ?>)</strong></a></li>
		<li id="m2"><a onclick="$('#m1').removeClass(),$('#m3').removeClass(),$('#m2').addClass('active'),load_answers()">Answers<strong>(<?php echo $no_a ?>)</strong></a></li>
		<li id="m3" class="active"><a onclick="load_all('<?php echo $ct; ?>')">Show all</a></li>
	</ul>
<?php
}
if(isset($_SESSION['confirm']) && $_SESSION['confirm']==$ct &&!(isset($_GET['nop'])))
{
	?>
	<ul class="nav nav-pills" style="margin-left:10%;margin-top:2%;">
		<li class="active" id='m1'><a onclick="$('#m2').removeClass(),$('#m1').addClass('active'),load_url('<?php echo $ct; ?>')">Questions<strong>(<?php echo $no_q ?>)</strong></a></li>
		<li id="m2"><a onclick="$('#m1').removeClass(),$('#m2').addClass('active'),load_answers()">Answers<strong>(<?php echo $no_a ?>)</strong></a></li>
		<li id="m3"><a onclick="$('#m1').removeClass(),$('#m2').removeClass(),$('#m3').addClass('active'),load_all('<?php echo $ct; ?>')">Show all</a></li>
	</ul>
	<?php
	echo '<div class="discussion_holder" id="questions">';
	$q=mysql_query("select * from discussion_gcg where post_subject='$ct' and state=1 order by query_no desc")or die(mysql_error());
		$cc=1;
		while($r=mysql_fetch_array($q)){
			echo <<<s
			<div style="margin-top:50px;">
			<div class="discussion_main">
				&nbsp;
				<span class="pull-left" style="color: rgb(0, 136, 204);">Post by <span class="badge">$r[1]</span></span>
				<div class="pull-right"><span class="label label-warning">id $r[0] </span> <span class="label label-info">$r[6]</span></div>
				<p></p>
				<div class="cont">$r[3]
s;
				if(isset($_SESSION['confirm']))
				{
					echo "<span style='margin-left:50px' id='qc$r[0]$cc'><span class='label label-success' style='cursor:pointer' onclick='confirmation(".'"q",'.$r[0].',"c"'.",$cc)'>Confirm ?</span>";
					echo " <span class='label label-important' style='cursor:pointer' onclick='confirmation(".'"q",'.$r[0].',"d"'.",$cc)'>Delete <i class='icon-trash icon-white'></i></span></span>";
				}
				$cc++;
				echo "</div>";
			echo "</div>
			<div class='seperator'></div>";
			
		}
}
else
{
	echo '<div class="discussion_holder" >';
		$q=mysql_query("select * from discussion_gcg where post_subject='$ct' and state=2 order by query_no desc");
		while($r=mysql_fetch_array($q)){
			$q1=mysql_query("select * from discuss_ans_gcg where query_no=".$r['query_no']." and state=2 order by timestamp desc")or die(mysql_error());
			$resp_no=mysql_num_rows($q1);
			
			echo <<<s
			<div style="margin-top:50px;">
			<div class="discussion_main">
				&nbsp;
				<span class="pull-left" style="color: rgb(0, 136, 204);">Post by <span class="badge">$r[1] (<span>$r[5]</span>)</span></span>
				<div class="pull-right"><span class="label label-warning">id $r[0] </span> <span class="label label-info">$r[6]</span></div>
				<p></p>
				<div><span class="pull-right">Responses <span class="badge badge-success" id="resp_no_$r[0]">$resp_no</span></span></div>
				<p></p>
				<div class="cont">$r[3]</div>
			</div>
			<div class="responses" id="ans_div_$r[0]">
				<div class="response" id="num_ans_$r[0]" style="background:#F5F5F5;">
					<h6>Your Response</h6>
					<textarea id="ansfor_$r[0]"></textarea>
					<span><button class="btn btn-primary" onclick="send_ans1($r[0])"><i class="icon-ok icon-white"></i>Send</button></span>
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
				<span class="pull-right"><span class="badge badge-inverse" onclick="load_ans1($r[0])" style="cursor:pointer;">load_all<i class="icon-chevron-right icon-white"></i></span></span>
				</div>
			</div>
s;
			
		}
		echo '</div>
			<div class="seperator"></div>';
			
			
		}
	
	
echo '</div>';

}
?>
<script type="text/javascript">
function start_new(cat)
{
	que=$('#gcg').val();
	cat=document.getElementById('cat').innerHTML;
	pos={'content':que,'cat':cat};
	if(que!="")
	{
		$.post("gcg/discuss.php",pos,function(data){
			$('#post_new').html(data);
		});
	}
	else{alert('Empty post');}
}
function send_ans1(q_no)
{
	ans=document.getElementById("ansfor_"+q_no).value;
	cat=document.getElementById('cat').innerHTML;
	if(ans=="")
	{
		alert("Empty Answer");
		document.getElementById("ansfor_"+q_no).focus();
		return 0;
	}
	post_dat={'qn':q_no,'ans':ans,'sep':cat};
	$.post("giv_answer.php",post_dat,function(data){
		$("#num_ans_"+q_no).html(data);
	});
}
function confirmation(what,qn,ac,cc)
{
	tim=1;
	cat=document.getElementById('cat').innerHTML;
	if(what=="a")
	{
	tim=document.getElementById('tim'+qn+''+cc).innerHTML;
	}
	post_dat={'what':what,'qno':qn,'action':ac,'tim':tim,'cat':cat};
	$.post("gcg/confirm.php",post_dat,function(data){
		$('#'+what+'c'+qn+''+cc).html(data);
	});
	
}
function load_ans1(qn)
{
	sep=document.getElementById('cat').innerHTML;
	$.post("show_ans.php?qn="+qn+"&sep="+cat,function(data){
		$("#ans_div_"+qn).html(data);
	});
}
function load_answers()
{
	sep=document.getElementById('cat').innerHTML;
	$.post("gcg/load_answers.php?answers="+sep,function(data){
		$(".discussion_holder").html(data);
	});
}
function load_all(ct)
{
	$.post("open_spec.php?cat="+ct+"&nop=1",function(data){
		$('#main').html(data);
		});
}
</script>

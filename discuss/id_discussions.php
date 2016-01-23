<?php
session_start();
if(!isset($_SESSION['login_id']))
{
	die("<br/><h1>Access Forbidden</h1>");
}
?>
<table class="table_forum">
<?php
include "../config_db25788.php";
$q1=mysql_query("select * from discussion_forum where user_id='".$_SESSION["login_id"]."'");
while($r=mysql_fetch_array($q1)){
	$num=mysql_query("select * from discuss_ans where q_no=".$r['query_no']);
	echo '<tr><td><div class="questions"><br/>';
	echo '<blockquote class="pull-left">Posted by <strong>'.$r['user_id'].'</strong></blockquote><blockquote class="pull-right">Posted On <strong>'.$r['date'].'</strong></blockquote><br/><br/><span class="question_sub">Subject&emsp;<strong>'.$r['subject'].'</strong></span><br/><br/>';
	echo '<span class="question">&emsp;&emsp;'.$r['content'].'</span><br/><br/>';
	echo '<button class="btn btn-success pull-left" onclick="load_ans_field('.$r['query_no'].')">Your Answer</button>';
	echo '<button class="btn btn-inverse pull-right" onclick="load_ans('.$r['query_no'].')" id="btn_ans" style="cursor:pointer;">Answers&emsp;<span id="num_ans_'.$r['query_no'].'" class="badge badge-important">'.mysql_num_rows($num).'</span></button><br/><br/>
';
	echo '<div id="ans_field_'.$r['query_no'].'" class="ans_field"><textarea id="ansfor_'.$r['query_no'].'" class="text_ans"></textarea><br/>
	<button class="btn btn-primary" onclick="send_ans('.$r["query_no"].')">Post</button><br/></div><div id="ans_div_'.$r['query_no'].'" class="ans_div"><br/><br/></div><br/></div><br/></tr></td>';
}
?>
</table>
<br/><br/>
<table class="table_forum">
<?php
$q2=mysql_query("select * from discuss_ans where id='".$_SESSION["login_id"]."'");
while($r2=mysql_fetch_array($q2)){
	$q3=mysql_query("select * from discussion_forum where query_no=".$r2['q_no']);
while($r=mysql_fetch_array($q3)){
	$num=mysql_query("select * from discuss_ans where q_no=".$r['query_no']);
	echo '<tr><td><div class="questions"><br/>';
	echo '<blockquote class="pull-left">Posted by <strong>'.$r['user_id'].'</strong></blockquote><blockquote class="pull-right">Posted On <strong>'.$r['date'].'</strong></blockquote><br/><br/><span class="question_sub">Subject&emsp;<strong>'.$r['subject'].'</strong></span><br/><br/>';
	echo '<span class="question">&emsp;&emsp;'.$r['content'].'</span><br/><br/>';
	echo '<button class="btn btn-success pull-left" onclick="load_ans_field('.$r['query_no'].')">Your Answer</button>';
	echo '<button class="btn btn-inverse pull-right" onclick="load_ans('.$r['query_no'].')" id="btn_ans" style="cursor:pointer;">Answers&emsp;<span id="num_ans_'.$r['query_no'].'" class="badge badge-important">'.mysql_num_rows($num).'</span></button><br/><br/>';
	echo '<div id="ans_field_'.$r['query_no'].'" class="ans_field"><textarea id="ansfor_'.$r['query_no'].'" class="text_ans"></textarea><br/><button class="btn btn-primary" onclick="send_ans('.$r["query_no"].')">Post</button><br/></div><div id="ans_div_'.$r['query_no'].'" class="ans_div"><br/><br/></div><br/></div><br/></tr></td>';
	}
	}
?>
</table>
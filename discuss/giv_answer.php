<?php
session_start();
if(!isset($_SESSION['login_id']))
{
	die("<br/><h1>Access Forbidden</h1>");
}
include("../config_db25788.php");
$qn=htmlentities(addslashes($_POST['qn']));
$id=htmlentities(addslashes($_SESSION['login_id']));
$ans=htmlEntities(addslashes($_POST["ans"]));
if(!isset($_POST['sep']))
{
	$o=mysql_query("select * from discussion_forum where query_no='$qn'");
	$r=mysql_fetch_array($o);
	$u_branch=$r['user_branch'];
	$su_q=mysql_query("insert into discuss_ans values('$qn','".$r["user_id"]."','$id','$ans',CURRENT_TIMESTAMP,1)") or die(mysql_error());
	$ans=htmlentities($_POST['ans']);
	if($su_q)
	{
		echo <<<s
	
	
		<strong>$id</strong>
		$ans
		<p>Just Now...</p>
		<script type="text/javascript">
			document.getElementById('resp_no_$qn').innerHTML=parseInt(document.getElementById('resp_no_$qn').innerHTML)+1;
		</script>
s;
	}
}
else
{
	$cat=htmlentities(addslashes($_POST['sep']));
	$o=mysql_query("select * from discussion_gcg where query_no='$qn'");
	$r=mysql_fetch_array($o);
	$query1=mysql_query("select * from sdcac_user_table where user_id='$id'")or die(mysql_error());
	$data1=mysql_fetch_array($query1);
	$u_branch=$data1['branch'];
	if($u_branch=="none")
	{
		die("PUC students are not allowed to answer");
	}
	else if($data1['memb_group']!=$cat)
	{
		echo <<<s
			<script type="text/javascript">
				$('#num_ans_$qn').removeClass();
				document.getElementById('num_ans_$qn').style.background="rgb(242, 222, 222)"
				$('#num_ans_$qn').addClass('alert alert-error');
			</script>
s;
		die("You are not the member of this group");
	}
	else
	{
	$su_q=mysql_query("insert into discuss_ans_gcg values('$qn','".$r["user_id"]."','$id','$ans',CURRENT_TIMESTAMP,1,'$cat')") or die(mysql_error());
	$ans=htmlentities($_POST['ans']);
	if($su_q)
	{
		
		echo <<<s
	
	
		<strong>$id</strong>
		$ans
		<p>Just Now...</p>
		<script type="text/javascript">
			document.getElementById('resp_no_$qn').innerHTML=parseInt(document.getElementById('resp_no_$qn').innerHTML)+1;
		</script>
s;
	}
	}
}
?>

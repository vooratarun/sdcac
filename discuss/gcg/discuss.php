<?php
session_start();
if(isset($_SESSION['login_id']))
{
	$id=$_SESSION['login_id'];
	include "../../config_db25788.php";
	mysql_select_db("sdcac_database");
	$query1=mysql_query("select * from sdcac_user_table where user_id='$id'")or die(mysql_error());
	$data1=mysql_fetch_array($query1);
	$u_name=$data1['user_name'];
	$u_branch=$data1['branch'];
	$u_batch=$data1['batch'];
	$con=htmlentities(addslashes($_POST['content']));
	$cat=htmlentities(addslashes($_POST['cat']));
	$dat=date("Y-m-d");
	$query2=mysql_query("select * from discussion_gcg")or die(mysql_error());
	$n=mysql_num_rows($query2)+1;
	if($u_branch=="none")
	{
		die("PUC students are forbidden to post");
	}
	else if($data1['memb_group']!=$cat)
	{
		echo <<<s
			<script type="text/javascript">
				$('#post_new').removeClass();
				document.getElementById('post_new').style.background="rgb(242, 222, 222)"
				$('#post_new').addClass('alert alert-error');
			</script>
s;
		die("You are not the member of this group");
	}
	else
	{
	$query2=mysql_query("insert into discussion_gcg values('$n','$id','$cat','$con','$u_batch','$u_branch','$dat',CURRENT_TIMESTAMP,1)") or die("<span style='color:red;'>Some Technical Error Occured.<br/>Please Try again</span>");
	
	if($query2){
		echo <<<s
			<script type="text/javascript">
				$('#post_new').removeClass();
				$('#post_new').addClass("alert alert-success");
				document.getElementById('post_new').style.width='50%';
				document.getElementById('post_new').style.background='#fff';
			</script>
s;
		echo "Successfully posted";
		}
	}

?>
<?php
}
else
{
	echo "No Access";
}
?>

<?php
session_start();
if(isset($_SESSION['login_id']))
{
	$id=$_SESSION['login_id'];
	include "../config_db25788.php";
	mysql_select_db("sdcac_database");
	$query1=mysql_query("select * from sdcac_user_table where user_id='$id'")or die(mysql_error());
	$data1=mysql_fetch_array($query1);
	$u_name=$data1['user_name'];
	$u_branch=$data1['branch'];
	if($u_branch=="none")
	{
		$u_branch="PUC";
	}
	else if($u_branch=="Sec-B" || $u_branch=="Sec-A") $u_branch="E1";
	$u_batch=$data1['class'];
	$mes=htmlentities(addslashes($_POST['subject']));
	$con=htmlentities(addslashes($_POST['content']));
	$dat=date("Y-m-d");
	$query2=mysql_query("select * from discussion_forum")or die(mysql_error());
	$n=mysql_num_rows($query2)+1;
	$query2=mysql_query("insert into discussion_forum values('$n','$id','$mes','$con','$u_batch','$u_branch','$dat',CURRENT_TIMESTAMP,1)") or die("<span style='color:red;'>Some Technical Error Occured.<br/>Please Try again</span>");
	
	if($query2){
		//$query3=mysql_query("update discuss_dashboard set no_post=(no_post+1) where branch='$u_branch'")or die(mysql_error());
		echo <<<s
			<script type="text/javascript">
				$('#result').removeClass();
				$('#result').addClass("alert alert-success");
			</script>
s;
		echo "Successfully posted";
		}

?>
<?php
}
else
{
	echo "No Access";
}
?>

<?php
session_start();
if(!isset($_SESSION['login_id']))
{
	die("<br/><h1>Access Forbidden</h1>");
}
include("../config_db25788.php");
if(isset($_POST['id']))
{
	$id=htmlentities(addslashes($_POST['id']));
	$name=htmlentities(addslashes($_POST['user']));
	$branch=htmlentities(addslashes($_POST['branch']));
	$quer=htmlentities(addslashes($_POST['quer']));
	$cls=htmlentities(addslashes($_POST['class']));
	$date=date("Y-m-d");
	$querr=mysql_query("insert into posted_queries values('webteam@sdcac','$name','$branch','$id','$quer','@web',0,'$date',CURRENT_TIMESTAMP)");
	if($querr)
	{
		echo <<<s
		<script type="text/javascript">
			$('#alert1').removeClass();
			$('#alert1').addClass('alert alert-success');
		</script>
s;
		echo "<strong>".$id."</strong> &nbsp;&nbsp;Successfully Posted";
	}
	else
	{
		echo <<<s
		<script type="text/javascript">
			$('#alert1').removeClass();
			$('#alert1').addClass('alert alert-error');
		</script>
s;
		echo "<strong>Sorry!</strong> &nbsp;&nbsp;Please Try Again";
	}
}
else
{
	$id=$_SESSION['login_id'];
	$quer=mysql_query("select * from sdcac_user_table where user_id='$id'")or die(mysql_error());
	$dat=mysql_fetch_array($quer);
?>
<div class="alert alert-info" id="alert1" style="margin-top:7%;width:50%;margin-left:auto;margin-right:auto;">
<strong>To WebAdmins</strong> &nbsp;&nbsp;Send Your problem
</div>
<div style="box-shadow:0px 0px 5px rgb(204,204,204);-moz-box-shadow:0px 0px 5px rgb(204,204,204);-webkit-box-shadow:0px 0px 5px rgb(204,204,204);height:360px;width:50%;margin-left:auto;margin-right:auto;margin-top:2%;padding-top:15px;font-weight:bold;">
	<table  style="width:70%;height:80%;" align=center>
		<tr>
			<td width='100px'>ID</td><td id="id1"><?php echo $id; ?></td>
		</tr>
		<tr>
			<td>Name</td><td id="user1"><?php echo $dat['user_name']; ?></td>
		</tr>
		<tr>
			<td>Branch</td><td id="branch"><?php echo $dat['branch']; ?></td>
		</tr>
		<tr>
			<td>Problem</td><td><textarea  id="que"></textarea></td>
		</tr>
		<tr>
			<td></td><td><button class="btn btn-success" onclick="post_a_problem(),document.getElementById('que').value=''">Send</button></td>
		</tr>
	</table>
</div>
<script type="text/javascript">
	function post_a_problem()
	{
		
			id=document.getElementById('id1').innerHTML;
			nam=document.getElementById('user1').innerHTML;
			cls="";
			brnch=document.getElementById('branch').innerHTML;
			que=document.getElementById('que').value;
			if(que!=''){
			post_data = {'id':id,'user':nam,'class':cls,'branch':brnch,'quer':que};
			$.post("problem_post.php",post_data,function(data)
			{
				$("#alert1").html(data);
			});}
			else {
				$('#alert1').removeClass();
				$('#alert1').addClass('alert alert-error')
				document.getElementById('alert1').innerHTML="Please Enter Your Problem";
				}
	}
</script>
<?php
}
?>

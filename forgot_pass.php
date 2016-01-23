<?php
session_start();
if($_SESSION['ac']<2)
{
if(isset($_POST['act']))
{
	$_SESSION['ac']+=1;
	include('config_db25788.php');
	include('password_encrypt_code.php');
	$act=$_POST['act'];
	$id=htmlentities(addslashes($_POST['us_id']));
	if($act=='load')
	{
		$query1=mysql_query("select user_security from sdcac_user_table where user_id='$id'") or die(mysql_error());
		if(mysql_num_rows($query1)==1){
			$d1=mysql_fetch_array($query1);
			echo $d1[0];
			}
		else
			echo "Invalid ID/Un Registered ID";
	}
	else if($act='action')
	{
		$qu=htmlentities(addslashes($_POST['us_qu']));
		$ans=$_POST['us_ans'];
		$query2=mysql_query("select * from sdcac_user_table where user_id='$id' and user_answer='$ans'") or die(mysql_error());
		if(mysql_num_rows($query2)!=1){
			$ans=encrypt($ans);
			$query2=mysql_query("select * from sdcac_user_table where user_id='$id' and user_answer='$ans'") or die(mysql_erro());
			}
		$pas=encrypt($_POST['us_pass']);
		if(mysql_num_rows($query2)==1)
		{
			$query3=mysql_query("update sdcac_user_table set user_password='$pas' where user_id='$id'") or die(mysql_error());
			if($query3)
			{
				echo <<<s
				<div style='width:60%;height:60%;font-weight:1em;color:#330099;margin-left:20%'>
				<div class='notification confirm' style="width:110%"><em><img alt='' src='assets/img/icons/tick_circle.png'></img>
				Password Changed
				<img style="float:right;cursor:pointer;" src="assets/img/icons/cross.png" onclick="$('#register_black').fadeOut()"></img>
				</em></div>
				Your Password is Changed...</br></br>Other Details are not Modified</br></br>Login with new Password
				</div>
s;
			}
		}
		else
		{
				echo <<<s
				<div style='width:60%;height:60%;font-weight:1em;color:#330099;margin-left:20%'>
				<div class='notification error' style="width:110%"><em><img alt='' src='assets/img/icons/cross_circle.png'></img>
				Invalid Inputs are given.Try Again For Sometime
				<img style="float:right;cursor:pointer;" src="assets/img/icons/cross.png" onclick="$('#register_black').fadeOut()"></img>
				</em></div>
s;
		}
	}
}
else
{
	echo 'Not Authenticate';
}
}
else
	{echo 'You are not supposed to View all Security questions';}
?>

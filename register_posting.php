<?php
session_start();
include("config_db25788.php");
if(isset($_GET['specify']))
	$sp=$_GET['specify'];
else
	$sp=$_POST['specify'];
if($sp=='register')
{
	include("password_encrypt_code.php");
	$idnum = htmlentities(addslashes($_GET['id']));
    $pass = htmlentities(addslashes($_GET['password1']));
    $quest = htmlentities(addslashes($_GET['sec_quest']));
    $ans = htmlentities(addslashes($_GET['sec_ans']));
    $mail_id=$idnum.'@rgukt.in';
    $batch = "20".''.$idnum[1].''.$idnum[2];
    $query1 = mysql_query("select * from students where id='$idnum'") or die(mysql_error());
    if(mysql_num_rows($query1)==1)
    {
    $row=mysql_fetch_array($query1);
    $pass=encrypt($pass);
    $ans=encrypt($ans);
	$branch = $row['Branch'];$class=$row['Class'];$name=$row['Name'];
    $query = mysql_query("insert into sdcac_user_table values('$idnum','$name','$pass','$branch','$class','$batch','$mail_id','not given','$quest','$ans',CURRENT_TIMESTAMP,'')")or die("Already Registered...");
    if($query)
    {
		//mysql_query("delete from students where ID='$idnum'");
		echo "<script>alert('Successfully Registred.');</script><font color=green>Successfully Registered...</font><script type='text/javascript'>$('#register_black').fadeOut(1500);</script>";
	}
	else
		echo "<script>alert('Registration Fail.');</script>";
	}
	else
		echo "Must be IIITN";
}
else if($sp=='problem')
{
	if((isset($_SESSION['login_id'])&&isset($_SESSION['sdcac_organize']))||(isset($_SESSION['admin_id1'])))
	{
		$subj=htmlentities(addslashes($_POST['subj']));
		$quer=htmlentities(addslashes($_POST['quer']));
		$to=htmlentities(addslashes($_POST['to1']));
		echo "came";
		$date=date("Y-m-d");
		$id=$_SESSION['login_id'];
		if(isset($_SESSION['admin_id1']))$id=$_SESSION['admin_id1'];
		$quer1=mysql_query("select user_name from sdcac_user_table where user_id='$id'")or die(mysql_error());
		$ro=mysql_fetch_array($quer1);
		$user_name=$ro['user_name'];
		$query5=mysql_query("select MAX(query_no) from sdcac_admins_posts")or die(mysql_error());
		$dd=mysql_fetch_array($query5);
		$sn=$dd[0]+1;
		if($to=="wt")
		{
			$query4=mysql_query("insert into sdcac_admins_posts values($sn,'webteam@sdcac','$user_name','$id','$subj','$quer','@web',0,'$date')")or die(mysql_error());
		}
		else if($to=="co")
		{
		$query4=mysql_query("insert into sdcac_admins_posts values($sn,'$id','$user_name','Organizer','$subj','$quer','',0,'$date')") or die(mysql_error());
		}
		if($query4){
			echo <<<s
					<tr><td colspan=2 style="color:#00CC00;font-weight:bold;font-size:1.9em;height:50px">Successfully Submitted.....</td></tr>
					<tr><td style="color:#990033;font-weight:bold;width:150px;height:40px">Subject</td><td width=350px  style="color:#990033;">: $subj</td></tr>
					<tr><td style="color:#330099;font-weight:bold;height:40px">Message</td><td style="color:#330099;height:40px">: $quer</td></tr>
				
				
s;
			}
	}
	else if(isset($_SESSION['login_id']))
	{
		$sub_id=$_SESSION['login_id'];
		$sub_name=htmlentities(addslashes($_POST['user']));
		$sub_class=htmlentities(addslashes($_POST['class']));
		$sub_branch=htmlentities(addslashes($_POST['branch']));
		$sub_content=htmlentities(addslashes($_POST['quer']));
		$to=htmlentities(addslashes($_POST['to1']));
		$date=date("Y-m-d");
		if($to=="wt")
		{
			$query6=mysql_query("insert into posted_queries values('webteam@sdcac','$sub_name','$sub_branch','$sub_id','$sub_content','@web',0,'$date',CURRENT_TIMESTAMP)")or die(mysql_error());
		}
		else if($to=="co")
		{
			$query6=mysql_query("insert into posted_queries values('$sub_id','$sub_name','$sub_branch','$sub_class','$sub_content','',0,'$date',CURRENT_TIMESTAMP)") or die(mysql_error());
		}
		if($query6){
			echo <<<s
					<tr><td colspan=2 style="color:#00CC00;font-weight:bold;font-size:1.9em;height:50px">Successfully Submitted.....</td></tr>
					<tr><td style="color:#990033;font-weight:bold;width:150px;height:40px;">ID</td><td width=350px>: $sub_id</td></tr>
					<tr><td style="color:#330099;font-weight:bold;height:40px;">Message</td><td>: $sub_content</td></tr>
				
s;
			}
	}
	else
		echo "Not authorized";
}
else if($sp=='post')
{
	if(isset($_SESSION['sdcac_senior']))
	{
		$quer=htmlentities(addslashes($_POST['quer']));
		$id=$_SESSION['login_id'];
		$query7=mysql_query("select MAX(query_no) from senior_posts") or die(mysql_error());
		$d7=mysql_fetch_array($query7);
		$sn=$d7[0]+1;
		$date=date("Y-m-d");
		$query7=mysql_query("insert into senior_posts values($sn,'$id','$quer','','$date')") or die(mysql_error());
		if($query7)
		{
			echo "<em><img src='assets/img/icons/tick_circle.png' alt=''/> Successfully Posted...</em>";
		}
		else
			echo "Technical Problems, Try Again";
	}
	else
		echo "Permissions Denied";
}
?>




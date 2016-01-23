<?php
session_start();
include "config_db25788.php";
include("password_encrypt_code.php");
$id=addslashes($_GET['user_id']);
$pass=$_GET['password'];
$pass=encrypt($pass);
$des=$_GET['specify'];

 if($des=='student')
{
	$query=mysql_query("select * from sdcac_user_table where user_id='$id' and user_password='$pass'") or die(mysql_error());
	if(mysql_num_rows($query)==1)
	{
		$query2=mysql_query("select * from seniors where id='$id'") or die(mysql_error());
		if(mysql_num_rows($query2)==1){$_SESSION['sdcac_senior']=$id;}
		$query2=mysql_query("select * from sdcac_organizers where id='$id'") or die(mysql_error());
		if(mysql_num_rows($query2)==1){$_SESSION['sdcac_organize']=$id;}
		$_SESSION['login_id']=$id;
		echo <<<s
			<script type="text/javascript">
                 window.location="login.php";
/*
		$.post("login.php",function(data)
			{
				$("body").html(data);
		});
*/
		
			</script>
s;
	}
	else
	{
		echo "<p style='color:#CC6600 	;'><span style='color:red;font-size:0.82em;'>&#10006;&nbsp;&nbsp; </span>Invalid credentails</p><script type='text/javascript'>$('#stud_login_error').fadeIn(500).fadeOut(5000);</script>";
	}
}
else if($des=='admin_login')
{
	//echo $pass;
    $query=mysql_query("select * from sdcac_admin_table where admin_name='$id' and admin_password='$pass'") or die(mysql_error());
	if(mysql_num_rows($query)==1)
	{
		if($id=="sdcac@admin")
		{
			$_SESSION['admin_id']=$id;
			echo <<<s
			<script type="text/javascript">
				window.location="admin_login.php";
			</script>
s;
		}
		else
		{
			$_SESSION['admin_id1']=$id;
			echo <<<s
			<script type="text/javascript">
				window.location="student_login.php";
			</script>
s;
		}
		
	}
	else
	{
		echo "<p style='color:pink;'><span style='color:red;font-size:0.82em;'>&#10006;&nbsp;&nbsp; </span>Invalid credentails</p><script type='text/javascript'>$('#stud_login_error').fadeIn(500).fadeOut(5000);</script>";
	}
}
?>







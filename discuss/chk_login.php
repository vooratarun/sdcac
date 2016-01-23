<?php
session_start();
include("../password_encrypt_code.php");
include("../config_db25788.php");
$uname=$_POST["un"];
$pasd=encrypt($_POST["pas"]);
$q=mysql_query("select * from sdcac_user_table where user_id='$uname'") or die("Invalid ID");
if(mysql_num_rows($q)==0){die("Invalid ID");}
$r=mysql_fetch_array($q) or die("error3");
if($r['user_password']==$pasd)
{
	mysql_query("update sdcac_hits set hit=hit+1");
	$_SESSION['login_id']=$uname;
	$qq=mysql_query("select * from discuss_gcg_ids where gcg_id='$uname'") or die(mysql_error());
	$dd=mysql_fetch_array($qq);
	if(mysql_num_rows($qq)==1){$_SESSION['confirm']=$dd['category'];}
			echo <<<s
			<script type="text/javascript">
                 window.location.reload();
s;
}
else
{
	echo "Invalid Credentials";
}
?>

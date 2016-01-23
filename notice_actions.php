<?php
session_start();
include "config_db25788.php";
if(isset($_SESSION['admin_id']))
	{
		$qno=$_GET["qno"];
		if(isset($_GET["del"]))
		{
		$query1=mysql_query("select * from sdcac_updates where query_no=$qno") or die(mysql_error());
		$dat=mysql_fetch_array($query1);$dat[0]=htmlentities(addslashes($dat[0]));$dat[1]=htmlentities(addslashes($dat[1]));$dat[2]=htmlentities(addslashes($dat[2]));$dat[3]=htmlentities(addslashes($dat[3]));$dat[4]=htmlentities(addslashes($dat[4]));$dat[5]=htmlentities(addslashes($dat[5]));$dat[6]=htmlentities(addslashes($dat[6]));$dat[7]=htmlentities(addslashes($dat[7]));$dat[8]=htmlentities(addslashes($dat[8]));
		$query2=mysql_query("insert into sdcac_updates_backup values('$dat[0]','$dat[1]','$dat[2]','$dat[3]','$dat[4]','$dat[5]','$dat[6]','$dat[7]','$dat[8]')")or die(mysql_error());
		$query1=mysql_query("delete from sdcac_updates where query_no=$qno") or die(mysql_error());
		
		
		
		echo "<h3 style='color:#993300'>deleted successfully...........</h3>";
		}
		else if(isset($_GET["sconfirm"]))
		{
			$sc=$_GET["sconfirm"];
			if($sc=="ok")
			{
				mysql_query("update senior_posts set state='ok' where query_no=$qno") or die(mysql_error());
				echo "<h3 style='color:#993300'>confirmed...</h3>";
				}
			else if($sc=="notok")
			{
					mysql_query("delete from senior_posts where query_no=$qno") or die(mysql_error());
					echo "<h3 style='color:#993300'>deleted...</h3>";
					}
		}
	
	}
else if(isset($_SESSION['admin_id1']))
{
		if(isset($_POST['query']))
		{
		  $to=$_POST['to1'];
		  $ids=$_POST['id_no'];
		  $token = strtok($ids, ",");
		  $qq=htmlentities(addslashes($_POST['query']));
		  $dat=date("Y-m-d");
		  if($to=="stu")
		  {
			while ($token != false)
			{
			  $iid=$_SESSION['admin_id1'];
			  mysql_query("insert into posted_queries values('$token','name','branch','@web','By Webteam','$qq',0,'$dat',CURRENT_TIMESTAMP)") or die(mysql_error());
			  $token = strtok(" ");
			}
			echo "<div style='margin-left:10%;margin-top:10%;color:green;font-size:1.1em;'>Successfully Posted</div>";
		  }
		  else if($to=="org")
		  {

			while ($token != false)
			{
			  $iid=$_SESSION['admin_id1'];
			  $query5=mysql_query("select MAX(query_no) from sdcac_admins_posts")or die(mysql_error());
			  $dd=mysql_fetch_array($query5);
			  $sn=$dd[0]+1;
			  mysql_query("insert into sdcac_admins_posts values($sn,'$token','name','Organizer','@web','By Webteam','$qq',0,'$dat')") or die(mysql_error());
			  $token = strtok(" ");
			}
			echo "<div style='margin-left:10%;margin-top:10%;color:green;font-size:1.1em;'>Successfully Posted</div>";
		  }
		}
		if(isset($_GET["time"])){
		$id=$_GET['sid'];
		$time=$_GET["time"];
		$act=$_GET["action"];
		if($act=="s"){
			mysql_query("delete from posted_queries where class='$id' and timestamp='$time'") or die(mysql_error());
			echo "deleted success.....";
		}
		else if($act=="r"){
		$res=$_GET["res"];
		echo $id.$time;
		mysql_query("update posted_queries set id='$id',response='$res',class='@web' where class='$id' and timestamp='$time'") or die(mysql_error());
			echo "response send success.....";
		}
		}
		else if(isset($_POST['qno']))
		{
		 $qn=htmlentities(addslashes($_POST['qno']));
		 $sid=htmlentities(addslashes($_POST['sid']));
		 $resp=htmlentities(addslashes($_POST['res']));
		 $act=htmlentities(addslashes($_POST['action']));
		 if($act=='r')
		 {
		   mysql_query("update sdcac_admins_posts set admin_id='$sid',admin_designation='@web',post_response='$resp' where query_no='$qn'") or die(mysql_error());
		   echo "Send Success";
		 }
		 else if($act=="s")
		 {
		   mysql_query("delete from sdcac_admins_posts where query_no='$qn'")or die(mysql_error());
		   echo "Deleted";
		 }
		}

}
else{
echo "<script type='text/javascript'>window.location='./';</script>";

}
?>


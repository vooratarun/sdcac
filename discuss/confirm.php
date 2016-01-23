<?php
session_start();
if(isset($_SESSION['confirm']))
{
	include("../config_db25788.php");
	$what=htmlentities(addslashes($_POST['what']));
	$qn=htmlentities(addslashes($_POST['qno']));
	$act=htmlentities(addslashes($_POST['action']));
	$tim=htmlentities(addslashes($_POST['tim']));
	$cat=htmlentities(addslashes($_POST['cat']));
	if($what=='q')
	{
		if($act=='c')
		{
			if($cat=="PUC")$cat='none';
			$su_q1=mysql_query("update discuss_dashboard set no_post=(no_post+1) where branch='$cat'")or die(mysql_error());
			if(mysql_query("update discussion_forum set state=2 where query_no=$qn")) echo "Confirmed";
			else echo "Try again";
			
			
		}
		else if($act=='d')
		{
			if(mysql_query("update discussion_forum set state=3 where query_no=$qn")) echo "Deleted";
			else echo "Try again";
		}
		else echo "Don't try hard";
		
	}
	else if($what=='a')
	{
		if($act=='c')
		{
			if($cat=="PUC")$cat='none';
			$su_q1=mysql_query("update discuss_dashboard set no_resp=(no_resp+1) where branch='$cat'")or die(mysql_error());
			if(mysql_query("update discuss_ans set state=2 where query_no=$qn and timestamp='$tim'"))
			{
				echo <<<s
				Confirmed
				<script type="text/javascript">
					document.getElementById('resp_no_$qn').innerHTML=parseInt(document.getElementById('resp_no_$qn').innerHTML)-1;
				</script>
s;
			}
			else echo "Try again";
		}
		else if($act=='d')
		{
			if(mysql_query("update discuss_ans set state=3 where query_no=$qn and timestamp='$tim'"))
			{
				echo <<<s
				Deleted
				<script type="text/javascript">
					document.getElementById('resp_no_$qn').innerHTML=parseInt(document.getElementById('resp_no_$qn').innerHTML)-1;
				</script>
s;
			}
			else echo "Try again";
		}
		else echo "Don't try hard";
	}
?>
<?php
}
else
{
	echo "No Entry";
}
?>

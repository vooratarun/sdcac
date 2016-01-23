<?php
session_start();
if(!isset($_SESSION['login_id']))
{
	die("<br/><h1>Access Forbidden</h1>");
}
$id=$_SESSION['login_id'];
?>
<ul class="breadcrumb">
    <li><a href="../">Home</a> <span class="divider"></span></li>
    <li><a href="">Discussion</a> <span class="divider"></span></li>
    <li class="active"><?php echo $id ;?></li>
    </ul>
    
    <h4 align=center style="margin-top:5%;margin-bottom:2%;text-decoration:underline;">Discussions initialized by You</h4>
    
<?php
		include "../config_db25788.php";
		$q=mysql_query("select * from discussion_forum where user_id='$id' and state=2 order by timestamp desc");
		if(mysql_num_rows($q)==0)
		{
			echo '<div id="result" class="alert" style="display: block; width: 40%; margin-left: 24%;text-align:center;"><span style="color:red">Currently Your have Not Started a single Discussion</span></div>';
		}
		while($r=mysql_fetch_array($q)){
			$q1=mysql_query("select * from discuss_ans where query_no=".$r['query_no']." and state=2 order by timestamp desc")or die(mysql_error());
			$resp_no=mysql_num_rows($q1);
			
			echo <<<s
			<div style="margin-top:50px;">
			<div class="discussion_main">
				&nbsp;
				<span class="pull-left" style="color: rgb(0, 136, 204);">Post by <span class="badge">you</span></span>
				<div class="pull-right"><span class="label label-warning">id $r[0] </span> <span class="label label-info">$r[6]</span></div>
				<p></p>
				<div><strong>$r[2] <span class="pull-right">Responses <span class="badge badge-success" id="resp_no_$r[0]">$resp_no</span></span></strong></div>
				<p></p>
				<div class="cont">$r[3]</div>
			</div>
			<div class="responses" id="ans_div_$r[0]">
				<div class="response" id="num_ans_$r[0]" style="background:#F5F5F5;">
					<h6>Your Response</h6>
					<textarea id="ansfor_$r[0]"></textarea>
					<span><button class="btn btn-primary" onclick="send_ans($r[0])"><i class="icon-ok icon-white"></i>Send</button></span>
				</div>
				
s;
		if($resp_no!=0)
		{
			if($resp_no>=3)
			{
				$n=mt_rand(1,3);
				for($i=0;$i<$n;$i++)
				{
				$r2=mysql_fetch_array($q1);
				echo <<<s
				<div class="response">
					<strong>$r2[2]</strong>
					$r2[3]
					<p>$r2[4]</p>
				</div>
				
				
s;
				}	
			}
			else
			{
			$r2=mysql_fetch_array($q1);
			echo <<<s
			<div class="response">
					<strong>$r2[2]</strong>
					$r2[3]
					<p>$r2[4]</p>
				</div>
				
			
s;
			}
			echo <<<s
			<div class="response" style="background:none;">
				<span class="pull-right"><span class="badge badge-inverse" onclick="load_ans($r[0])" style="cursor:pointer;">See More<i class="icon-chevron-right icon-white"></i></span></span>
				</div>
			</div>
s;
			
		}
		echo '</div>
			<div class="seperator"></div>';
			
			
		}
	?>

<?php
session_start();
if(!isset($_SESSION['login_id']))
{
	die("<br/><h1>Access Forbidden</h1>");
}
?>
    
<?php
if(!isset($_GET['key']))
{?>
<h4 align=center style="margin-top:10%;text-decoration:underline;">Search Here</h4>
<div style="box-shadow:0px 0px 3px rgb(204,204,204);-moz-box-shadow:0px 0px 3px rgb(204,204,204);-webkit-box-shadow:0px 0px 3px rgb(204,204,204);height:300px;width:80%;margin-left:auto;margin-right:auto;margin-top:2%;padding-top:15px;">
<ul class="breadcrumb" style="width:85%;margin-left:auto;margin-right:auto;">
    <li><a href="../">Home</a> <span class="divider"></span></li>
    <li><a href="">Discussion</a> <span class="divider"></span></li>
    <li class="active">Search Here</li>
    </ul>
    <div style="height:31px;width:40%;margin-left:auto;margin-right:auto;margin-top:5%;">
		<ul>You can Search Discussion by any one of the following
		<ul>
		<li>Search By Discussion_id</li>
		<li>Search By Discussion_subject</li>
		<li>Search By Discussion_content</li>
		<li>Search by ID (posted by)</li>
		</ul>
		</ul>
    <input type="text" style="height:30px;" placeholder="Search" id="search_form1">
	<button class="btn btn-primary" style="margin-top:-10px;" type="submit" onclick="search_this()">
	<i class="icon-search icon-white"></i>
	</button>
	</div>
</div>
<?php 
}
else
{?>
<ul class="breadcrumb">
    <li><a href="../">Home</a> <span class="divider"></span></li>
    <li><a href="">Discussion</a> <span class="divider"></span></li>
    <?php if(isset($_GET['onekey']))
    {
		$ke=$_GET['onekey'];
		if($ke=="none")
			echo "<li class='active'>PUC</li>";
		else
			echo "<li class='active'>$ke</li>";
	}
	else
	{
		echo "<li class='active'>Search Results (".$_GET['key'].")</li>";
	}
    ?>
    
    </ul>
<div class="discussion_holder" >    
<?php
	include "../config_db25788.php";
	$key=htmlentities(addslashes($_GET['key']));
	$q=mysql_query("select * from discussion_forum where (user_id='$key' or query_no='$key' or post_subject like '%$key%' or post_content like '%$key%') and state=2 order by timestamp desc") or die(mysql_error());
	if(isset($_GET['onekey']))
	{
		$key=htmlentities(addslashes($_GET['onekey']));
		$q=mysql_query("select * from discussion_forum where user_branch='$key' and state=2 order by timestamp desc");
	}
	while($r=mysql_fetch_array($q)){
			$q1=mysql_query("select * from discuss_ans where query_no=".$r['query_no']." and state=2 order by timestamp desc")or die(mysql_error());
			$resp_no=mysql_num_rows($q1);
			echo <<<s
			<div style="margin-top:50px;">
			<div class="discussion_main">
				&nbsp;
				<span class="pull-left" style="color: rgb(0, 136, 204);">Post by <span class="badge">$r[1]</span></span>
				<div class="pull-right"><span class="label label-warning">id $r[0] </span> <span class="label label-info">$r[6]</span></div>
				<p></p>
				<div><strong>$r[2] <span class="pull-right">Responses <span class="badge badge-success" id="resp_no_$r[0]">$resp_no</span></span></strong></div>
				<p></p>
				<div class="cont">$r[3]</div>
			</div>
			<div class="responses" id="ans_div_$r[0]">
				<div class="response" id="num_ans_$r[0]">
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
	<?php
	if(!isset($_GET['onekey']))
	{
	?>
	</div>
	<div style="position:fixed;top:70px;right:0%;">
    <input type="text" style="height:30px;" placeholder="Search" id="search_form1">
	<button class="btn btn-primary" style="margin-top:-10px;" type="submit" onclick="search_this()">
	<i class="icon-search icon-white"></i>
	</button>
	</div>
	<?php
	}
}

?>
<script type="text/javascript">
	function search_this()
	{
		ke=document.getElementById("search_form1").value;
		$.post("search.php?key="+ke,function(data){
			$('#main').html(data);
		});
	}
</script>

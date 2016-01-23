<?php
session_start();
include "config_db25788.php";
if(isset($_SESSION['admin_id1']))
{
	$_SESSION['login_id']=$_SESSION['admin_id1'];
	$_SESSION['sdcac_organize']=$_SESSION['admin_id1'];
}
if(isset($_SESSION['login_id']))
{
	$id=$_SESSION['login_id'];
	$query=mysql_query("select * from sdcac_user_table where user_id='$id'") or die(mysql_error());
	$user_data=mysql_fetch_array($query);
	$user_name=$user_data['user_name'];
	$user_branch=$user_data['branch'];
	$user_class=$user_data['class'];
	$query1=mysql_query("select * from posted_queries where id='$id' and response!='' and response!='@' and view_response=1 order by timestamp desc") or die(mysql_error());
	
?>
<style>
	.btn_delete
	{
		background:#094AB2;
		border:0px;
		color:#fff;
		height:25px;
		font-size:0.789em;
		font-weight:bold;
		border:1px solid #fff;
	}
	
</style>
<div style="margin-top:10%;">
<center>		<div class="notification attention" style="width:60%;margin-left:auto;margin-right:auto;font-size:13px;"><em>
			<img alt="" src="assets/img/icons/exclamation.png"></img>Saved Notifications and Notices are displayed here
		</em></div></br></center>
		<?php
		if(isset($_SESSION['sdcac_organize']))
		{
			$query1=mysql_query("select * from sdcac_admins_posts where admin_id='$id' and post_response!='' and view_response=1 order by query_no desc") or die(mysql_error());
			$query3=mysql_query("select * from sdcac_updates where news_to='or' order by query_no desc") or die(mysql_error());
		?>
		<!-- check organizer or not  procede if true -->
			<div class="admin_notifications1" id="urgent" style="width:60%;margin-left:auto;margin-right:auto;font-size:17px;text-decoration:underline;letter-spacing:.07em;word-spacing:2px;cursor:pointer" onClick="$('#show_admin_posts_div1').slideToggle(1000),$('#resp').slideToggle()"> <?php echo mysql_num_rows($query3); ?> Notices from admin
			</div>
			<!-- nano divisions scroll divisions start -->
			<div id="show_admin_posts_div1" style="display:none;margin-left:15%;width:auto;height:500px;overflow:auto;">
			<div  >
			<?php
			
			$count1=0;
			$color_ar=Array("#99FFFF","#669999","#FFCCCC","#CCFF99","#CC9900","#8CCDDF","#F0CAFE");
			$width=Array(3,2,3,4,2);
			shuffle($color_ar);
			shuffle($width);
			while($data3=mysql_fetch_array($query3))
			{
				$count1++;
			?>
				<!-- individual notification division -->
				<div>
				<div style="float:left;width:5%;background:url(img/info.gif) no-repeat;text-align:right;font-size:1.1em;text-shadow:0 1px;color:blue;background-position:left bottom"><?php echo $data3['query_no'];?>. </div>
				<!-- while if start below-->
				<?php
				if(strlen($data3['news_details'])<80){ ?>
					<div class="mydiv" style="display:inline-block;width:<?php echo ($width[mt_rand(1,4)]*20).'%'?>;max-width:80%;background:<?php echo $color_ar[mt_rand(0,6)];?>;border-radius:4px;color:#330033;text-shadow:0px  1px #;padding:3% 3% 3% 5%;" >
					<table cellspacing=0 cellpadding=0>
						<tr><td width=70px height=30px>From</td><td><?php echo $data3['news_by'];?><span style="float:right"> (<?php echo $data3['news_date'];?>)</span></td></tr>
						<tr><td height=30px; style="border-bottom:1px dotted gray;">Subject</td><td  style="border-bottom:1px dotted gray;"><?php echo $data3['news_subject']?></td></tr>
						<tr><td style="min-height:30px;">Notice</td><td ><?php echo $data3['news_details']?></td></tr>
						
					</table>
					</div>
				<!-- while if ends below -->
				<?php 
				}
				else
				{
				?>
					<!-- while else start -->
					<div class="mydiv" style="display:inline-block;width:<?php echo (mt_rand(3,4)*20).'%'?>;max-width:80%;background:<?php echo $color_ar[mt_rand(0,6)];?>;border-radius:4px;color:#330033;text-shadow:0px  1px #;padding:3% 3% 3% 5%;" >
					<table cellspacing=0 cellpadding=0>
						<tr><td width=70px height=30px>From</td><td><?php echo $data3['news_by']?><span style="float:right"> (<?php echo $data3['news_date'];?>)</span></td></tr>
						<tr><td height=30px; style="border-bottom:1px dotted gray;">Subject</td><td  style="border-bottom:1px dotted gray;"><?php echo $data3['news_subject']?></td></tr>
						<tr><td style="min-width:30px;">Notice</td><td ><?php echo $data3['news_details']?></td></tr>
					</table>
					</div>
					<!-- while else ends below -->
				<?php
				}
				?>
				</div></br>
				<!-- ends individual notification division -->
				<?php
				}
					
				echo "<div style='padding-right:5%;'>
					<div style='display:inline-block;float:left;cursor:pointer;color:#0066FF;padding-left:3%;font-size:.978em;font-weight:bold;background:url(img/lar.png) no-repeat;background-position:left;'>Prev </div>
					<div style='display:inline-block;float:right;cursor:pointer;color:#0066FF;padding-right:3%;font-size:.978em;font-weight:bold;background:url(img/rar.png) no-repeat;background-position:right center;'>Next </div>
						
					</div>";
				echo "</div></div><!-- nano divisions scroll divisions start -->";
				
			}
				?>
			<!-- Organizer ends here -->
			
<!-- Start of posted queries or admin postings -->
<p style="margin-left:15%;margin-top:3%;">
	<?php
		if(mysql_num_rows($query1)>0){
	?>
					<div class="admin_notifications"  id="resp" style="width:60%;margin-left:auto;margin-right:auto;font-size:17px;text-decoration:underline;letter-spacing:.07em;word-spacing:2px;cursor:pointer" onClick="$('#show_admin_posts_div').slideToggle(1000),$('#home_dialog').slideToggle(),$('#urgent').slideToggle()"> You have <?php echo mysql_num_rows($query1); ?> notifications from admin
					</div>
					<div id="show_admin_posts_div" style="height:200px;display:none;margin-left:15%;width:auto;overflow:auto;height:450px;">
						<div >
						<?php
							
							$count1=0;
							$color_ar=Array("#99FFFF","#669999","#FFCCCC","#CCFF99","#CC9900","#8CCDDF","#F0CAFE");
							$width=Array(3,2,3,4,2);
							shuffle($color_ar);
							shuffle($width);
							while($data1=mysql_fetch_array($query1))
							{
								$count1++;
								if(isset($_SESSION['sdcac_organize']))
								{
									
						?>
								<div>
								<div style="float:left;width:5%;background:url(img/info.gif) no-repeat;text-align:right;font-size:1.1em;text-shadow:0 1px;color:blue;background-position:left bottom"><?php echo $data1['query_no'];?>. </div>
									<?php
									if(strlen($data1['admin_post'])<80){ ?>
										<div class="mydiv" style="display:inline-block;width:<?php echo ($width[mt_rand(1,4)]*20).'%'?>;max-width:80%;background:<?php echo $color_ar[mt_rand(0,6)];?>;border-radius:4px;color:#330033;text-shadow:0px  1px #;padding:3% 3% 3% 5%;"  id="notif<?php echo $count1;?>">
										<table  cellspacing=0 cellpadding=0>
										<?php echo "<tr><td width=40px></td><td>Date</td><td>:</td><td>".$data1['posted_date']."</td></tr>"; ?>
										<?php echo "<tr><td></td><td>Query</td><td>:</td><td><strong>".$data1['admin_post']."</strong></td></tr>";?>
										<?php echo "<tr><td></td><td>Response</td><td>:</td><td>".$data1['post_response']."</td></tr>" ?>
										<tr><td></td><td></td><td></td><td><input type="submit" class="btn_delete" value="Delete Post"  name="<?php echo $data1['query_no'] ?>" onclick="delete_this_not(this.name,'notif<?php echo $count1;?>')"></td></tr>
										</table>
										</div>
									<?php
									}
									else
									{
									?>
										<div class="mydiv" style="display:inline-block;width:<?php echo (mt_rand(3,4)*20).'%'?>;max-width:80%;background:<?php echo $color_ar[mt_rand(0,6)];?>;border-radius:4px;color:#330033;text-shadow:0px  1px #;padding:3% 3% 3% 5%;"  id="notif<?php echo $count1;?>">
										<table cellspacing=0 cellpadding=0>
										<?php echo "<tr><td width=40px></td><td>Date</td><td>:</td><td>".$data1['posted_date']."</td></tr>"; ?>
										<?php echo "<tr><td></td><td>Query</td><td>:</td><td><strong>".$data1['admin_post']."</strong></td></tr>";?>
										<?php echo "<tr><td></td><td>Response</td><td>:</td><td>".$data1['post_response']."</td></tr>" ?>
										<tr><td></td><td></td><td></td><td><input type="submit" class="btn_delete" value="Delete Post"  name="<?php echo $data1['query_no'] ?>" onclick="delete_this_not(this.name,'notif<?php echo $count1;?>')"></td></tr>
										</table>
										</div>
									<?php
									}
								echo "</div></br>";
								}
								else
								{?>
								<div>
								<div style="float:left;width:5%;background:url(img/info.gif) no-repeat;text-align:right;font-size:1.1em;text-shadow:0 1px;color:blue;background-position:left bottom"><?php echo $count1;?>. </div>
								<?php
									if(strlen($data1['query'])<80){ ?>
										<div class="mydiv" style="display:inline-block;width:<?php echo ($width[mt_rand(1,4)]*20).'%'?>;max-width:80%;background:<?php echo $color_ar[mt_rand(0,6)];?>;border-radius:4px;color:#330033;text-shadow:0px  1px #;padding:3% 3% 3% 5%;"  id="notif<?php echo $count1;?>">
										<table cellspacing=0 cellpadding=0>
										<?php echo "<tr><td width=40px></td><td>Date</td><td>:</td><td>".$data1['query_date']."</td></tr>"; ?>
										<?php echo "<tr><td></td><td>Query</td><td>:</td><td><strong>".$data1['query']."</strong></td></tr>";?>
										<?php echo "<tr><td></td><td>Response</td><td>:</td><td>".$data1['response']."</td></tr>" ?>
										<tr><td></td><td></td><td></td><td><input type="submit" class="btn_delete" value="Delete Post"  name="<?php echo $data1['timestamp'] ?>"  onclick="delete_this_not(this.name,'notif<?php echo $count1;?>')"></td></tr>
										</table>
										</div>
									<?php
									}
									else
									{?>
										<div class="mydiv" style="display:inline-block;width:<?php echo (mt_rand(3,4)*20).'%'?>;max-width:80%;background:<?php echo $color_ar[mt_rand(0,6)];?>;border-radius:4px;color:#330033;text-shadow:0px  1px #;padding:3% 3% 3% 5%;"  id="notif<?php echo $count1;?>">
										<table cellspacing=0 cellpadding=0>
										<?php echo "<tr><td width=40px></td><td>Date</td><td>:</td><td>".$data1['query_date']."</td></tr>"; ?>
										<?php echo "<tr><td></td><td>Query</td><td>:</td><td><strong>".$data1['query']."</strong></td></tr>";?>
										<?php echo "<tr><td></td><td>Response</td><td>:</td><td>".$data1['response']."</td></tr>" ?>
										<tr><td></td><td></td><td></td></tr>
										<tr><td></td><td></td><td></td><td><input type="submit" value="Delete Post" class="btn_delete"  name="<?php echo $data1['timestamp'] ?>"  onclick="delete_this_not(this.name,'notif<?php echo $count1;?>')"></td></tr>
										</table>
										</div>
									<?php
									}
								echo "</div></br>";
								}
							}
						
						echo "</div></div>";
						echo <<<s
						<script type="text/javascript">
						function two()
						{
							document.getElementById('show_admin_posts_div').style.display='none';
						}
						setTimeout("two()",1);
						</script>
s;
					}
						?>
				</p>

 <!-- End -->
</div>		
			

<?php
}
else if(isset($_SESSION['admin_id']))
{

	$query3=mysql_query("select * from sdcac_updates where display=1 order by news_timestamp desc") or die(mysql_error());
	if(isset($_GET['key']))
	{
		$ke=$_GET['key'];
		$query3=mysql_query("select * from sdcac_updates where news_subject like '%$ke%' or news_date='$ke' or query_no=$ke")or die(mysql_error());
		echo '<div id="show_admin_posts_div1" >';
	}
	else
	{
		echo '<div ><input type="text" id="search_key" class="search_note" placeholder="Enter Any Keyword in news ID/subject/ Date(Y-m-d)">&nbsp;<input type="submit" value="Search" class="search_but" onclick="search_this_key()"></div>';
		echo '<div id="show_admin_posts_div1" style="display:block;margin-left:10%;margin-top:2%;width:80%;height:auto;overflow:auto"  id="middle_div">';
	}
	
?>
<style type="text/css">
.notice_tb{
	width:90%;
	border:0px solid;
	border-collapSe:collapse;
	}
.notice_tb td{
	padding-left:0.5%;
	padding-right:auto;
	}
.notice_tb th{
background-color:#E9E9D1;
	}
.notice_tb td, .notice_tb th{
border-width:1px 1px medium;
border-style:solid solid none;
border-color:#cccccc;
padding-top:10px;
padding-bottom:10px;
}
input[type=checkbox]{
opacity:0.5;
}


	.search_note
	{
		width:40%;
		margin-top:7%;
		margin-left:14%;
		height:27px;
		border:1px solid rgb(51, 153, 255);
		letter-spacing:0.07em;
		word-spacing:0.25em;
		padding-left:10px;
	}
	.search_note:focus
	{
		box-shadow: 0px 0px 3px rgb(51, 153, 255);
	}
	.search_but
	{
		height:30px;
		width:100px;
		border:1px solid blue;
		background:rgb(0, 140, 196);
		color:#fff;
		font-weight:bold;
	}
</style>
	
	
	<!-- nano divisions scroll divisions start -->
	
	<div  id="innercontent">
  <sub style="color:gray">Click on the subject to view notice</sub>
	<table class="notice_tb">
		<tr >
		<th style="width:12%;">News ID</th>
		<th style="width:36%;">News Subject </th>
		<th style="width:20%;">Time Posted</th>
		<th style="width:20%;">Option</th>
	</tr>
	     

		<?php
		
		while($data3=mysql_fetch_array($query3))
		{
			
			?>
		<tr id="ntr<?php echo $data3['query_no'];?>">
		<td align="center"><?php echo $data3['query_no'];?>.</td>		
		<td title="click to view nitice" onclick="show_enotice('n<?php echo $data3['query_no'];?>')" id="s<?php echo $data3['query_no'];?>" style="cursor:pointer"><?php echo $data3['news_subject']; ?></td>
		<td><?php echo $data3['news_timestamp']; ?></td>
		<td><sub onclick="re_edit_notice('<?php echo $data3['query_no'];?>')"> <img src="assets/img/icons/pencil.png" /> <a style="color:#6699CC; cursor:pointer;">Edit</a></sub> <sub onclick="del_notice('<?php echo $data3['query_no']; ?>')"> &nbsp; <img src="assets/img/icons/cross.png" /> <a style="color:#6699CC; cursor:pointer;">Delete</a></sub></td>
		</tr>  
		<tr>
	 <td colspan="4" style="padding-top:0px; display:none;" ></td> 
	</tr>
		<tr style="border-bottom:1px solid gray;">
	 <td colspan="5" style="padding-top:0px; background-color:#0; display:none;" id="n<?php echo $data3['query_no'];?>"><div id="nd<?php echo $data3['query_no'];?>" style="min-height:70px; width:65%; border:1px solid; margin:0px auto 0px auto; border-radius:3px;padding:5px 5px 5px 5px;"><?php echo $data3['news_details']; ?></div></td> 
	</tr> 
	
	<?php } ?>
	</table>
	</br>
	</div>
	<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $(".notice_tb tr:even").css("background-color","#FFFFFF");
  $(".notice_tb tr:odd").css("background-color","#F9F9F9");
});
function show_enotice(x){
	$("#"+x).slideToggle();

}
function del_notice(x){
$.post("notice_actions.php?qno="+x+"&del=k",function(data)
			{
				$("#ntr"+x).html("<td colspan=4>"+data+"</td>");
		});
		$("#ntr"+x).hide(1000);
}
function re_edit_notice(x){
	subj=document.getElementById('s'+x).innerHTML;
	news=document.getElementById('nd'+x).innerHTML;
	$.post("post_news.php?nqno="+x+"&subjj="+subj+"&nnews="+news,function(data)
			{
				$("#content").html(data);
		});
}

</script>
	<?php 					
}
else
{
		echo "Not authenticated";
}
?>

<script type="text/javascript">

function two()
{
	document.getElementById('show_admin_posts_div').style.display='none';
}
function search_this_key()
{
	key=document.getElementById('search_key').value;
	$.post("load_notifications.php?key="+key,function(data)
			{
				$("#innercontent").html(data);
	});
}
function update_notification(no)
{
	alert('Under Construction');
	/*
	sv=document.getElementById('n_sub').innerHTML;
	mv=document.getElementById('n_mes').innerHTML;
	alert(mv);
	document.getElementById('n_sub').innerHTML="<input type='text'  id='n_sub1' value="+sv+">";
	document.getElementById('n_mes').innerHTML="<textarea id='n_mes1' value='f'></textarea>";
	document.getElementById('bhold').innerHTML='<input type="submit" value="Submit" class="btn_edit" onclick="update_notification1('+no+')">';
	*/
}


function update_notification1(no)
{
	subj=document.getElementById('n_sub').value;
	mess=document.getElementById('n_mes').value;
	$.post("updates.php?qno="+no+"&subj=",function(data)
			{
				$("#innercontent").html(data);
	});
}
</script>












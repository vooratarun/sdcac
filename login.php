<?php
session_start();
include "config_db25788.php";
if(isset($_SESSION['login_id']))
{
	$id=$_SESSION['login_id'];
	$st=mysql_query("select * from sdcac_user_state where user_id='$id'")or die(mysql_error());
	if(mysql_num_rows($st)==1)
		mysql_query("update sdcac_user_state set state='on' where user_id='$id'")or die("");
	else if(mysql_num_rows($st)==0)
		mysql_query("insert into sdcac_user_state values('$id','on')")or die(mysql_error());
	$query=mysql_query("select * from sdcac_user_table where user_id='$id'") or die(mysql_error());
	$user_data=mysql_fetch_array($query);
	$user_name=$user_data['user_name'];
	$user_branch=$user_data['branch'];
	$user_class=$user_data['class'];
	$last=$user_data['last_login'];
	$query1=mysql_query("select * from posted_queries where id='$id' and response!='' and view_response=0") or die(mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="main_scripts.js"></script>
<title><?php echo $id." | ".$user_name; ?></title>
<!--favicon-->
    
<!--css-->
<link rel="stylesheet" href="assets/css/reset.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="assets/css/main.css" type="text/css" media="screen"/>

	
</head>
<style>
.inp
{
	width:80%;
	border:1px solid #BDB76B;
	height:25px;
	opacity:0.75;
	border:1px solid rgb(204,204,204);
	border-radius:3px;
}
.inp:focus
{
	border:1px solid blue;
	box-shadow:0px 0px 3px blue;
}
.login
{
	height:25px;
	border:1px solid rgb(204,204,204);
	background:gray;
}
.new_class
{
font-family:Arial;
display: inline-block;
padding: 2px 4px;
font-size: 11.844px;
font-weight: bold;
line-height: 14px;
color: rgb(255, 255, 255);
text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.25);
white-space: nowrap;
vertical-align: baseline;
background-color: rgb(58, 135, 173);
background-color: rgb(185, 74, 72);
border-radius:2px;
}
.robotics_close
{
	color:#990000;font-size:1.2em;font-weight:bold;margin-left:97%;cursor:pointer;
	
}
.robotics_close:hover
{
	color:#CC3300;
}

</style>
<body id="b_main">
	
<div id="header" style="margin-top:0px;height:100px;">
    <div id="logo" style='background-image:url(images/header.png);width:100%;height:93px;'>
		<div style="float:right;width:20%;
			margin-right:5%;height:45%;margin-top:0px;padding:10px 10px 0px 10px;border-radius:5px;color:rgb(185, 168, 148);font-size:0.89em;">
			<div>Welcome <?php echo "<span style='color:#fff;'>".$user_name."</span>";?> | <a href="logout.php">Logout</a></div>
			<?php
			if(!isset($_SESSION['visit1']))
			{?>
			<div class="notification attention" id='st_notif'><a  class="close" onclick="$('#st_notif').fadeOut()" style='cursor:pointer'>&nbsp;</a> <em><img src="assets/img/icons/exclamation.png" alt=""/>Last Login <strong><?php echo $last;?></strong></em></div>
			<?php
				$qq=mysql_query("update sdcac_user_table set last_login=CURRENT_TIMESTAMP where user_id='$id'")or die(mysql_error());
				$_SESSION['visit1']=1;
			}
			?>
	</div>
    <h1><a href="../sdcac/"></a></h1>
    
    
  </div>
  
    
</div><!--/end #header-->



    
<div id="wrapper"  style="background:#fff;"><!--holds pretty much everything-->
    <div id="menu_main">
		
        <div class="menu_main_section first" style="margin-left:4%;">
            <ul id='show-profileul' class='points'>
				<li><a style='cursor:pointer' onclick="load_url('user_profile')">Edit Profile</a></li>
               <!-- <li><a style='cursor:pointer' onclick="load_url('festname')">Title for Fest <span class="new_class"><blink>New</blink></span></a></li>-->
                
                <li><a title='Discussion Forum' href="discuss">Discussion Forum </a></li>
                <li><a onClick='load_url("load_notifications")'>All Notifications</a></li>
                <li><a >Weeks of welcome</a></li>
                <li><a name="job_intern" onclick="load_url(this.name)">Jobs & Internships</a></li>
                <li><a title='STUDENT ORGANIZATION COMMITTEE' onClick='load_url("council")'>Student Organizing</a></li>
            </ul>
           <ul class='points'>
				<div style='height:22px;width:86%;text-align:center;font-size:1.1em;color:white;font-weight:bold;background-color:brown;'> CLUBS </div>
				<li><a style='cursor:pointer;' name='quizclub/QUIZ%20CLUB' onclick='load_url(this.name)' title='QUIZ CLUB'>Quiz Club</a></li>
				<li><a style='cursor:pointer;' name='clubs/robotics_club' onclick='load_url(this.name)' title='ROBOTICS CLUB'>Robotics Club</a></li>
				<li><a style='cursor:pointer;' name='clubs/news_ideas' onclick='load_url(this.name)' title='NEWS & IDEAS COLLECTION CLUB'>News & Ideas</a></li>
				<li><a style='cursor:pointer;' name='clubs/events_shedule' onclick='load_url(this.name)' title='EVENTS PLANNING & SHEDULING CLUB'>Events planning </a></li>
				<li><a style='cursor:pointer;' name='clubs/debate' onclick='load_url(this.name)' title='JOURNAL & DEBATE CLUB'>Journal & Debating</a></li>
				<li><a style='cursor:pointer;' name='clubs/exibition' onclick='load_url(this.name)' title='EXIBITION ORGANIZING CLUB'>Exhibition Organi</a></li>
				<li><a style='cursor:pointer;' name='clubs/discipline' onclick='load_url(this.name)' title='DISCIPLINARY CLUB'>Disciplinary Team</a></li>
				<li><a style='cursor:pointer;' name='clubs/jobs_intern' onclick='load_url(this.name)' title='JOBS-INTERNSHIPS & CAREER GUIDANCE CLUB'>Jobs & Internships </a></li>
				<li><a style='cursor:pointer;' name='clubs/stu_advisory' onclick='load_url(this.name)' title='STUDENT ADVISORY & EXTERNAL AFFAIRS COMMITTEE'>Student Advisory</a></li>
                               <li><a style='cursor:pointer;' name='clubs/design_club' onclick='load_url(this.name)' title='DESIGNING COMMITTEE'>Designing Team</a></li>
				
			</ul>
        </div><!--/end #menu_main_section-->
    </div><!--/end #menu_main-->

	<div id="content" >
		
				<div class="container1" style="width:73%;margin-left:0%;border:0px solid black;">
					
					
					<?php echo "<h4 style='color:green' align=center><span style='border-bottom:1px dotted green;'> HELLO, ".$user_name."</span></h4>"; ?>
					<?php
					if(isset($_SESSION['sdcac_organize']))
					{
						echo "<div class='notification confirm' id='confirmation' style='margin-left:10%;width:50%;'><em><img src='assets/img/icons/tick_circle.png' alt=''/> Your are logged in as Organizer...</em></div>";
					}
					else
						echo "<div class='notification confirm' id='confirmation' style='display:none;margin-left:10%;width:50%;'><em><img src='assets/img/icons/tick_circle.png' alt=''/> Your are logged in as Organizer...</em></div>";
					if(isset($_SESSION['sdcac_senior']))
					{
						echo "<div class='notification information' id='confirmation1' style='margin-left:10%;width:50%;'><em><img src='assets/img/icons/information.png' alt=''/> Your are logged in as E4 Students...</em></div>";
						echo "<div id='senior_post_div'>Your Suggestion</br>";
						echo "<textarea id='que1' cols=60 rows=1></textarea>";
						echo " <input type=submit value='Post' onclick=".'"'."post_y_problem('se')".'"'."></div>";
					}
					?>
					<p style="font-size:14px;font-weight:normal;letter-spacing:.07em;word-spacing:2px;color:#0066FF;margin-left:10%;margin-top:5%;" id="home_dialog">
<?php
					$iid=$_SESSION['login_id'];
			$qqq=mysql_query("select * from sdcac_user_table where user_id='$iid'")or die(mysql_error());
			$ddd=mysql_fetch_array($qqq);
			if($ddd['mail_id']==$iid."@rgukt.in")
{?>
<blink>Note : Update your email id(It may be fake)</blink>
<?php } ?>
</br></br>
					We are here to take care of you. If we can't solve, we will
					show you the way.</br></br>
					You can share any kind of problems with us...
					Your Details will not be revealed out.
				</p></br>
				
				<!-- Urgent Notices start-->
				<?php
						if(isset($_SESSION['sdcac_organize']))
						{
						$date=date("Y-m-d");
						$query1=mysql_query("select * from sdcac_admins_posts where admin_id='$id' and post_response!='' and view_response=0") or die(mysql_error());
						$query3=mysql_query("select * from sdcac_updates where news_to='or' and news_date='$date' order by news_date desc") or die(mysql_error());
						if(mysql_num_rows($query3)>0){
						?>
						<div class="admin_notifications1" id="urgent" style="font-weight:bold;margin-left:20%;font-size:15px;letter-spacing:.07em;word-spacing:2px;cursor:pointer;width:50%;color:#66CC33;" onClick="$('#show_admin_posts_div1').slideToggle(1000),$('#home_dialog').slideToggle()" class="notification information"><em><img src="assets/img/icons/information.png" alt=""/> You Got <?php echo mysql_num_rows($query3); ?> Notifications from admin</em>
						</div>
						<?php } ?>
						<div id="show_admin_posts_div1" style="display:none;margin-left:20%;width:80%;height:73%;" >
						<div  tabindex="0"  class="overthrow content">
						<?php
						$count1=0;
						$color_ar=Array("#99FFFF","#669999","#FFCCCC","#CCFF99","#CC9900");
						$width=Array(3,2,3,4,2);
						shuffle($color_ar);
						shuffle($width);
							while($data3=mysql_fetch_array($query3))
							{
								$count1++;
						?>
						<div>
						<div style="float:left;width:5%;background:url(img/info.gif) no-repeat;text-align:right;font-size:1.1em;text-shadow:0 1px;color:blue;background-position:left bottom"><?php echo $count1;?>. </div>
						<?php
						if(strlen($data3['news_details'])<80){ ?>
						<div class="mydiv" style="display:inline-block;width:<?php echo ($width[$count1-1]*20).'%'?>;max-width:80%;background:<?php echo $color_ar[$count1-1];?>;border-radius:4px;color:#330033;text-shadow:0px  1px #;padding:3% 3% 3% 5%;" >
						<table cellspacing=0 cellpadding=0>
							<tr><td width=70px height=30px>From</td><td><?php echo $data3['news_by'];?><span style="float:right"> (<?php echo $data3['news_date'];?>)</span></td></tr>
							<tr><td height=30px; style="border-bottom:1px dotted gray;">Subject</td><td  style="border-bottom:1px dotted gray;"><?php echo $data3['news_subject']?></td></tr>
							<tr><td style="min-height:30px;">Notice</td><td ><?php echo $data3['news_details']?></td></tr>
						</table>
						</div>
						<?php 
						}
						else
						{

						?>
						<div class="mydiv" style="display:inline-block;width:<?php echo (mt_rand(3,4)*20).'%'?>;max-width:80%;background:<?php echo $color_ar[$count1-1];?>;border-radius:4px;color:#330033;text-shadow:0px  1px #;padding:3% 3% 3% 5%;" >
						<table cellspacing=0 cellpadding=0>
							<tr><td width=70px height=30px>From</td><td><?php echo $data3['news_by']?><span style="float:right"> (<?php echo $data3['news_date'];?>)</span></td></tr>
							<tr><td height=30px; style="border-bottom:1px dotted gray;">Subject</td><td  style="border-bottom:1px dotted gray;"><?php echo $data3['news_subject']?></td></tr>
							<tr><td style="min-width:30px;">Notice</td><td ><?php echo $data3['news_details']?></td></tr>
						</table>
						</div>
						<?php
						}
						?>
						</div></br>
						<?php
							}
					
					/* echo "<div style='padding-right:5%;'>
						<div style='display:inline-block;float:left;cursor:pointer;color:#0066FF;padding-left:3%;font-size:.978em;font-weight:bold;background:url(img/lar.png) no-repeat;background-position:left;'>Prev </div>
						<div style='display:inline-block;float:right;cursor:pointer;color:#0066FF;padding-right:3%;font-size:.978em;font-weight:bold;background:url(img/rar.png) no-repeat;background-position:right center;'>Next </div>
						
					</div>";*/
				echo "</div></div>";
			
			}
				?>
				<!-- Urgent Notices end-->
				
				<!-- Posted queries start-->
				<p style="margin-left:15%;margin-top:3%;">
	<?php
		if(mysql_num_rows($query1)>0){
	?>
					<div class="admin_notifications" style="margin-left:20%;font-size:15px;font-weight:bold;letter-spacing:.07em;word-spacing:2px;color:#66CC33;cursor:pointer;text-decoration:underline;" onClick="show_responses()"><em><img src="assets/img/icons/balloon.png" alt=""/> You Got <?php echo mysql_num_rows($query1); ?> Responses from admin<span style="position:absolute;"><img src="new.gif"></span></em>
					</div>
					<div id="show_admin_posts_div" style="height:300px;overflow:auto;display:none;margin-left:5%;border-radius:15px;width:90%;overflow:auto;height:70%;" >
							<?php
							
							$count1=0;
							while($data1=mysql_fetch_array($query1))
							{
								$count1++;
								if(isset($_SESSION['sdcac_organize']))
								{
									
						?>
							 <br />
							<div style="width:90%;margin-left:auto;margin-right:auto;border-top:1px dotted #003366;">
							<br />
							<table cellpadding=0 cellspacing=0 style='margin-left:2px;color:#003300;border:0px solid gray;width:94%;height:30%;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;'>
							<?php echo "<tr><td  style='width:40px;color:#003333;font-weight:bold;'>$count1)</td><td style='width:15%;color:#660066;font-weight:bold;font-size:14px;'>ID No</td><td width=10px>:&nbsp;&nbsp;</td><td style='color:#333300;font-weight:bold;font-size:14px;'>".$data1['admin_id']."</td></tr>"; ?>
                                                                                                                                                         

							<?php echo "<tr><td></td><td style='color:#660066;font-weight:bold;font-size:14px;'>Query</td><td>:&nbsp;&nbsp;</td><td style='color:#333300;font-weight:bold;font-size:14px;'><strong>".$data1['admin_post']."</strong></td></tr>";?>
							<?php echo "<tr><td></td><td style='color:#993300;font-weight:bold;font-size:14px;'>Response</td><td>:&nbsp;&nbsp;</td><td style='color:#006699;font-weight:bold;font-size:14px;'>".$data1['post_response']."</td></tr>" ?>
							</table>
							</div></br>
							
							<?php
								}
								else
								{
									
							?>
							
							<br />
							<div style="width:90%;margin-left:auto;margin-right:auto;border-top:1px dotted #003366;">
							<br />
							<table cellpadding=0 cellspacing=0 style='margin-left:2px;color:#003300;border:0px solid gray;width:94%;height:30%;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;'>
							<?php echo "<tr><td style='width:40px;color:#003333;font-weight:bold;'>$count1)</td><td style='width:15%;color:#660066;font-weight:bold;font-size:14px;'>ID No</td><td width=10px>:&nbsp;&nbsp;</td><td style='color:#333300;font-weight:bold;font-size:14px;'>".$data1['id']."</td></tr>"; ?>


							<?php echo "<tr><td></td><td style='color:#660066;font-weight:bold;font-size:14px;'>Query</td><td>:&nbsp;&nbsp;</td><td style='color:#333300;font-weight:bold;font-size:14px;'><strong>".$data1['query']."</strong></td></tr>";?>
							<?php echo "<tr><td></td><td style='color:#993300;font-weight:bold;font-size:14px;'>Response</td><td>:&nbsp;&nbsp;</td><td style='color:#006699;font-weight:bold;font-size:14px;'>".$data1['response']."</td></tr>" ?>
							</table>
							</div></br>
						<?php
								}
							}
						echo "</div>";

					}
						?>
				</p>

				<!-- Posted queries end -->
					
				</div>
            
         	<div class="container2" style="float:right;">

                              <div style='font-weight:bold;margin-left:-20%;width:120%;color:#5F07A4;font-size:13px;cursor:pointer;margin-top:2%;' name="spoorthi_register" onclick="sop_load()"><font color=green>SOP REGISTRATION</font><span class="new_class"><blink>New</blink></span></div> 

				<div class='notice_board' style='margin-left:-20%;width:120%;background-color:white;margin-top:3%;text-align:center;box-shadow:0px 0px 1px #D0D0D0;border:1px solid #D0D0D0 '>
					<span style='font-weight:bold;border-bottom:1px dashed gray;color:#CC3300;line-height:40px;'>NOTICE BOARD</span>
					<div class='notices_div' style='text-align:center;width:99%;height:340px;line-height:30px;color:#383838;font-size:13px;'>
					</div>
					<script type="text/javascript">
						$.post("updates.php",function(data){
							$('.notices_div').html(data)
							})
					</script>
				</div>
       	    </div><!--/end .container2-->
       	    
       	    <div class="container1 separator" style="width:100%;">
				
				<div  style="background:;float:left;width:60%;font-size:1.1em;">
					<h4 style='color:rgb(204, 51, 0);'><u>Robotics</u></h4>
						
						<table style="">
							<tr>
							<td style="">
								<b>1 . ARM ROVER</b><br />
								<span style='color:#404040;margin-left:20px;font-size:0.9em;'>To design a manual controlled robot, that is capable of collecting balls from one box and drop them into other box ......</span><br />
								<b>2 . Atonomous Grid Solver</b><br />
								<span style='color:#404040;margin-left:20px;font-size:0.9em;'>An autonomous bot has to detect and count the number of black nodes present in the 5x5 arena ......</span><br />
								<b>3 . Golem</b><br />
								<span style='color:#404040;margin-left:20px;font-size:0.9em;'>This is a simple rack and pinion mechanism. This is used to strike any hurdle that comes in front of the robot ......</span><br />
								<b>4 . Machine Enchanters</b><br />
								<span style='color:#404040;margin-left:20px;font-size:0.9em;'>The main mechanism that picks the balls is connected to a slotted square plate. This plate has slots on 4 sides. The mechanism has four jaws hinged in the four slots through revolute pairs ......</span><br />
						<span style='color:#FF4500;text-decoration:underline;float:right;font-family:Arial;cursor:pointer;' onclick='robotics_window()'>More ....</span>
						
							</td>
							<td style='width:5%;'>&nbsp;</td>
							<td valign="center" style="width:20%;margin-top:10%;background:url(images/robo7.jpg)no-repeat;background-size:100% 90%;-moz-background-size:100% 90%;-webkit-background-size:100% 90%;" >&nbsp;</td>

							</tr>
						</table>	
						
					
					<div style="background:;height:50%;width:100%" class="container1 separator">
					<div style="background:;">
						<h4 style='color:rgb(204, 51, 0);margin-left:5%;'><u>Technical Quiz</u></h4>
						<table style="">
							<tr><td valign="center" style="width:25%;margin-top:10%;background:url(images/quiz1.png) no-repeat;background-size:100% 80%;-moz-background-size:100% 80%;-webkit-background-size:100% 80%;" >&nbsp;</td>
							<td style='width:5%;'>&nbsp;</td>
							<td style="font-size:0.95em;line-height:22px;">
								We have conducted engineering technical quiz for E1, E2 and E3, E4 students separately as junior quiz and senior quiz.
						<br /><br /><h5 style='color:#A0522D;font-weight:bold;'>Rules :</h5>
						In senior quiz we kept rule as each participating team should contain 6 members from 6 different branches. And a team can include both E3 and E4 students of different branches.<br />
						In junior quiz if the team contains only E1 students they should be from two different sections and if the team contains E2 students they should be from 6 different branches. A team can include both E1 and E2 students and form a team of 6 members.
						<br /><span style='color:#FF4500;text-decoration:underline;float:right;font-family:Arial;cursor:pointer;' onclick="load_url('clubs/quiz_club')">More....</span>
							</td>
							</tr>
						</table>
					</div>
					</div>
				</div>
				<div style="margin-left:4%;background:;float:left;width:34%;">
					<div style='width:100%;float:left;'>
						<h4 style='color:rgb(204, 51, 0);'><u>Jobs & Internships</u></h4>
						1 . Summer research fellowship program 2014, IIT Delhi . <br /><span style='float:left;color:#787878;font-size:0.8em;'>Last Date : March 14, 2014</span><br /></br>
						2 . Institute of plasma Research, Gandhinagar summer school 2014 .<br /><span style='float:left;color:#787878;font-size:0.8em;'>Last Date : March 14,2014.</span><br /></br>
						<img src='images/intern2.jpg' style='height:120px;width:45%;float:right;' />
						<span style=''>
						3 . ICTS-TIFR Bangalore's Excellence Fellowship program . <span style='color:#787878;font-size:0.8em;'>(Last Date : February 28, 2014)</span><br /></br>
						4 . Summer Internship at Gujarat Energy Research and Management Institute . <span style='color:#787878;font-size:0.8em;'> (Last Date : February 28, 2014).</span><br /></br>
						</span>
						5 . IISER Pune Summer student program 2014 .<br /><span style='float:left;color:#787878;font-size:0.8em;'>Last Date : March 15,2014</span><br /></br>
						6 . Indian Institute of Astrophysics, Bangalore's summer program .<br /><span style='float:left;color:#787878;font-size:0.8em;'>Last Date : February 24, 2014</span><br /></br>
						7 . NIT Rourkela Summer Internship program . <br /><span style='float:left;color:#787878;font-size:0.8em;'>Last Date : February 28, 2014</span><br /></br>
						8 .IIT Mandi Summer Internship Program 2014 . <br /><span style='float:left;color:#787878;font-size:0.8em;'>Last Date : March 2, 2014</span><br /></br>
						9 . Summer program 2014-center for Nano science and Engineering, IISC Bangalore .<span style='color:#787878;font-size:0.8em;'> (Last Date : March 26, 2014)</span><br /></br>
						10. IIT Mandi Summer Internship Program 2014 .<span style='color:#787878;font-size:0.8em;'> (Last Date : March 12,2014)</span><br />
						<br /><span style='color:#FF4500;text-decoration:underline;float:right;font-family:Arial;cursor:pointer;' onclick="load_url('clubs/jobs_intern')">More....</span>
					</div>
				</div>
			</div>
				
			
        
			
        
        <div id="middle_content" style="width:100%;height:100%;">
		</div>
    </div><!--/end #content-->
    
    
</div>
    <div class='container1' style="margin-top:100px;font-weight:bold;background:#F8F8F8;color:black;height:90px;width:100%;min-width:1349px;box-shadow:0px 0px 5px gray;-moz-box-shadow:0px 0px 5px gray;-webkit-box-shadow:0px 0px 5px gray;-o-box-shadow:0px 0px 5px gray;font-size:1.1em;">
<div style="float:right;min-width:100px;color:white;background-color:black;text-align:center;font-family:Calibri;font-size:20px;height:18px;padding-top:5px;padding-bottom:3px;margin-top:-43px;padding-left:25px;padding-right:15px;border-radius:20px 0px 0px 0px;-moz-border-radius:20px 0px 0px 0px;-webkit-border-radius:20px 0px 0px 0px;box-shadow:0px 0px 5px gray;-moz-box-shadow:0px 0px 5px gray;-webkit-box-shadow:0px 0px 5px gray;-o-box-shadow:0px 0px 5px gray;" id="hit_counter">
<?php
$r=mysql_fetch_array(mysql_query("select * from sdcac_hits"));
for($i=0;$i<7-strlen($r[0]);$i++)
{
echo '0';
}
echo $r[0]." <span style='font-size:14px;color:#C0C0C0;'>Visits</span>";
?>
</div>
		<span style="float:left;margin-left:160px;line-height:20px;width:200px;height:80px;">
<pre>
24/7 STUDENT SERVICE

S.D.C.A.C
</pre>
		</span>
		<span style="float:left;margin-left:210px;line-height:20px;width:220px;height:80px;">
<pre>
&copy; Copy Rights Reserved
                
<a href="http://10.11.3.11/sdcac/">SDCAC @ RGUKT</a>
</pre>
		</span>
		<span style="float:left;margin-left:210px;line-height:20px;width:200px;height:80px;">
			
<pre>
<a href="">sdcac@rgukt.in</a>

<a style="border-bottom:1px dotted;" onclick="load_url('webteam')">Web Team</a>
</pre>
		</span>
	</div>

    
    
</div>
<!--/end #wrapper-->

<div  id="welcome">
		<ul class="navigation" style='position:absolute;top:0%;background-color:black;width:96%;height:;'>
			<li style="margin-left:3%;"><a style="font-weight:bold;font-size:15px;">SDCAC</a></li>
			<li style="margin-left:0%;"><a></a></li>
			<li><a name="home" style="margin-left:5%;" href="" id="l1">Home</a></li>
			<li><a name="problem_post_form" onClick="load_url(this.name)" id="l2">Post A Query</a></li>
			<li><a name="council" onClick="load_url(this.name)" id="l3">Council</a></li>
			<li><a name="awards_prizes" onClick="load_url(this.name)" id="l4">Awards& Prizes</a></li>
			<li><a onClick="load_url('gallery')" id="l5">Gallery</a></li>
			<li  style="float:right">
			<a name='user_register' href='login.php'><?php echo $_SESSION['login_id']; ?></a></li>
			<li style="float:right;"><input type=text placeholder="Search"   id="search_input" class="login_search"></li>
		</ul>
	</div>    

<!-- news show divisions starts -->
<div style=" position:fixed; left:0px; top:0px;min-height:1000px; min-width:1400px; background-color:#000; opacity:0.7; display:none;" id="news_show_div1" onclick='hide_news()'></div>


<div style=" position:fixed; left:20%; top:30px;padding-bottom:10px; background-color:#FFFFFF;min-height:75%;height:auto; width:60%; display:none;text-align:left; font-weight:100; color:#000000;font-size:15px;" id="news_show_div"></div>
<!-- news show division ends -->

<!-- more robotics division start-->
<div id='robotics_black' style='display:none;position:fixed;top:0px;left:0px;width:100%;height:100%;background-color:rgba(16,16,16,0.6)  ;'>
	<div id='register_form' style='background-color:white;position:fixed;top:30px;left:200px;width:950px;height:560px;overflow:hidden;'>
		<span class='robotics_close' onclick='robotics_close()'>&#10006;</span>
		<table style='border:0px solid green;color:brown;width:90%;height:95%;margin-left:auto;margin-right:auto;margin-top:5px;'>
			<tr><td colspan='4' style='height:35px;color:#660033;font-weight:bold;font-size:1.5em;text-align:center;line-height:30px;'>ROBOTICS</td></tr>
			<tr>
				<td>1)</td><td><div style='background:#330033;height:22px;color:white;width:90px;text-align:center;border-radius:8px;'>ARM ROVER</div></td><td><a href='robotics pdfs/ARM ROVER.pdf' target='blank'>Arm Rover Document</a></td>
				<td style='width:150px;height:100px;box-shadow:0px 0px 2px 0px  #B0B0B0;border-radius:2px;background:url(images/armrover.png);background-size:100% 100%;-moz-background-size:100% 100%;-webkit-background-size:100% 100%; '>&nbsp;</td>
			</tr>
			<tr><td height=1px></td></tr>
			<tr>
				<td>2)</td><td><div style='background:#993300;height:22px;color:white;width:160px;text-align:center;border-radius:8px;'>ATONOMOUS GRID SOLVER</div></td><td><a href='robotics pdfs/Autonomous Grid Solver.pdf' target='blank'>Autonomous Grid Solver Document</a></td>
				<td style='width:150px;height:100px;box-shadow:0px 0px 2px 0px  #B0B0B0;border-radius:2px;background:url(images/grid.png);background-size:100% 100%;-moz-background-size:100% 100%;-webkit-background-size:100% 100%; '>&nbsp;</td>
			</tr>
			<tr><td height=1px></td></tr>
			<tr>
				<td>3)</td><td><div style='background:#003300;height:22px;color:white;width:90px;text-align:center;border-radius:8px;'>GOLEM</div></td><td><a href='robotics pdfs/GOLEM.pdf' target='blank'>Golem Document</a></td>
				<td style='width:150px;height:100px;box-shadow:0px 0px 2px 0px  #B0B0B0;border-radius:2px;background:url(images/golem.png);background-size:100% 100%;-moz-background-size:100% 100%;-webkit-background-size:100% 100%; '>&nbsp;</td>
			</tr>
			<tr><td height=1px></td></tr>
			<tr>
				<td>4)</td><td><div style='background:#990066;height:22px;color:white;width:160px;text-align:center;border-radius:8px;'>MACHINE ENCHANTERS</div></td><td><a href='robotics pdfs/Machine Enchanters.pdf' target='blank'>Machine Enchanters Document</a></td>
				<td style='width:150px;height:100px;box-shadow:0px 0px 2px 0px  #B0B0B0;border-radius:2px;background:url(images/machine.png);background-size:100% 100%;-moz-background-size:100% 100%;-webkit-background-size:100% 100%; '>&nbsp;</td>
			</tr>
			
		</table>
	</div>
</div>
<!-- more robotics division end -->
</body><!--/end #b_main-->

<script type="text/javascript">
	$("#show-profileul").mouseleave(function(){
		$("#profile").slideUp();
		});
	function show_responses()
	{
		$('#show_admin_posts_div').slideToggle(1000);
		$('#home_dialog').slideToggle();
		$('#urgent').slideToggle();
		$('#confirmation').removeClass();
		$('#confirmation').addClass('notification information');
		$('#confirmation').show();
		
		$.post("edit_updates.php",function(data)
			{
				$("#confirmation").html(data);
			});
			
	}

	function delete_this_not(tim,divid)
	{
		$.post("edit_updates.php?times="+tim,function(data)
			{
				$("#"+divid).html(data);
			});
	}

	function post_y_problem(men)
	{
		if(men=='st')
		{
			var to=document.getElementById("tosend").checked?"co":"wt";
			id=document.getElementById('id1').value;
			nam=document.getElementById('user1').value;
			cls=document.getElementById('clas').value;
			brnch=document.getElementById('branc').value;
			que=document.getElementById('que').value;
			if(que!=''){
			post_data = {'specify':'problem', 'id':id,'user':nam,'class':cls,'branch':brnch,'quer':que,'to1':to};
			$.post("register_posting.php",post_data,function(data)
			{
				$("#body1").html(data);
			});}
			else {alert('Empty Post');}
		}
		else if(men=='or')
		{
				var to=document.getElementById("tosend").checked?"co":"wt";
			subj=document.getElementById('sub').value;
			quer=document.getElementById('que').value;
			que=subj+quer;
			if(quer!='' || subj!='')
			{
			post_data = {'specify':'problem', 'subj':subj,'quer':quer,'to1':to};
			$.post("register_posting.php",post_data,function(data)
			{
				$("#body1").html(data);
			});
			}
			else alert('Empty Fields Not Allowed');
		}
		else if(men=="se")
		{
			que=document.getElementById('que1').value;
			if(que!=''){
			post_data = {'specify':'post','quer':que};
			$.post("register_posting.php",post_data,function(data)
			{
				$("#confirmation1").html(data);
			});
			$('#confirmation1').removeClass();
			$('#confirmation1').addClass("notification confirm");
			$('#senior_post_div').hide(1000);
			}
			else {alert('Empty Post');}
		}
	}
	
</script>


<!-- Mirrored from www.snaptin.com/demo/broom_cupboard/1.html by HTTrack Website Copier/3.x [XR&CO'2010], Fri, 11 Feb 2011 12:50:55 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=iso-8859-1"><!-- /Added by HTTrack -->
</html>
<?php
}
else
{
	echo "not authenticated";
}
?>













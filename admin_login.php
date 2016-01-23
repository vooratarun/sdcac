<?php
session_start();
include "config_db25788.php";
if(isset($_SESSION['admin_id']))
{
	$id=$_SESSION['admin_id'];
	$query=mysql_query("select * from sdcac_admin_table where admin_name='$id'") or die(mysql_error());
	$admin_data=mysql_fetch_array($query);
	$admin_name=$admin_data['name'];
	$admin_desgn=$admin_data['designation'];
	$last=$admin_data['last_login'];
	$query1=mysql_query("select * from sdcac_admins_posts where post_response='' order by query_no desc") or die(mysql_error());
	$query2=mysql_query("select * from posted_queries where response=''") or die(mysql_error());
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="main_scripts.js"></script>
<script type="text/javascript" src="scripts.js"></script>
<title>SDCAC | <?php echo $admin_name; ?></title>
<!--favicon-->
    
<!--css-->
<link rel="stylesheet" href="assets/css/reset.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="assets/css/main.css" type="text/css" media="screen"/>

<style>
.send
{
	font-weight:bold;height:31px;width:23%;-moz-border-radius:2px;-webkit-border-radius:2px;border-radius:2px;color:white;border:0px;cursor:pointer;box-shadow:0px 0px 2px 0px #6699CC inset;-moz-box-shadow:0px 0px 2px 0px #99FFCC inset;-webkit-box-shadow:0px 0px 2px 0px #99FFCC inset;background-color:#0066CC;font-size:13px;
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
	
</head>
<body id="b_main">
<div id="header" style="height:100px;">
    <div id="logo">
    <h1><a href="../sdcac/"></a></h1>
    <div style="float:right;width:20%;
			margin-right:5%;height:45%;margin-top:0%;padding:10px 10px 0px 10px;border-radius:5px;color:rgb(185, 168, 148);font-size:0.89em;">
			<div>Welcome <?php echo "<span style='color:#fff;'>".$admin_name."</span>";?> | <a style="color:rgb(185,168,148);border-bottom:1px dotted gray;text-decoration:none" href="logout.php">Logout</a></div>
			<?php
			if(!isset($_SESSION['visit1']))
			{?>
			<div class="notification attention" id='st_notif'><a  class="close" onclick="$('#st_notif').fadeOut()" style='cursor:pointer'>&nbsp;</a> <em><img src="assets/img/icons/exclamation.png" alt=""/>Last Login <strong><?php echo $last;?></strong></em></div>
			<?php
				$qq=mysql_query("update sdcac_admin_table set last_login=CURRENT_TIMESTAMP where admin_name='$id'")or die(mysql_error());
				$_SESSION['visit1']=1;
			}
			?>
	</div>
    
  </div>
  
    
</div><!--/end #header-->
    
<div id="wrapper"  style="background:#fff;"><!--holds pretty much everything-->
    <div id="menu_main">
		
        <div class="menu_main_section first" style="margin-left:15%;">
            <ul id='show-profileul' class='points'>
				<li><a style='cursor:pointer' onclick="load_url('user_profile')">Edit Profile</a></li>
                <li><a onClick='load_url("load_notifications")'>Edit Notices</a></li>
                <li><a onClick='show_set_notice()'>Post News</a></li>
                <li><a onClick='load_url("posted_queries")'>Posted Problems</a></li>
                <li><a >Weeks of welcome</a></li>
                <li><a >Jobs & Internships</a></li>
                <li><title='STUDENT ORGANIZATION COMMITTEE' a onClick='load_url("council")'>Student Organizing</a></li>
            </ul>
             <ul class='points'>
				<div style='height:22px;width:100%;text-align:center;font-size:1.1em;color:white;font-weight:bold;background-color:brown;'> CLUBS </div>
				<li><a style='cursor:pointer;' name='quizclub/QUIZ%20CLUB' onclick='load_url(this.name)' title='QUIZ CLUB'>Quiz Club</a></li>
				<li><a style='cursor:pointer;' name='clubs/robotics_club' onclick='load_url(this.name)' title='ROBOTICS CLUB'>Robotics Club</a></li>
				<li><a style='cursor:pointer;' name='clubs/news_ideas' onclick='load_url(this.name)' title='NEWS & IDEAS COLLECTION CLUB'>News & Ideas</a></li>
				<li><a style='cursor:pointer;' name='clubs/events_shedule' onclick='load_url(this.name)' title='EVENTS PLANNING & SHEDULING CLUB'>Events planning </a></li>
				<li><a style='cursor:pointer;' name='clubs/debate' onclick='load_url(this.name)' title='JOURNAL & DEBATE CLUB'>Journal & Debating</a></li>
				<li><a style='cursor:pointer;' name='clubs/exibition' onclick='load_url(this.name)' title='EXIBITION ORGANIZING CLUB'>Exhibition Organize</a></li>
				<li><a style='cursor:pointer;' name='clubs/discipline' onclick='load_url(this.name)' title='DISCIPLINARY CLUB'>Disciplinary Team</a></li>
				<li><a style='cursor:pointer;' name='clubs/jobs_intern' onclick='load_url(this.name)' title='JOBS-INTERNSHIPS & CAREER GUIDANCE CLUB'>Jobs & Internships</a></li>
				<li><a style='cursor:pointer;' name='clubs/stu_advisory' onclick='load_url(this.name)' title='STUDENT ADVISORY & EXTERNAL AFFAIRS COMMITTEE'>Student Advisory</a></li>
				<li><a style='cursor:pointer;' name='clubs/design_club' onclick='load_url(this.name)' title='DESIGNING COMMITTEE'>Designing Team</a></li>
			</ul>
        </div><!--/end #menu_main_section-->
    </div><!--/end #menu_main-->

	<div id="content">
		
				<div class="container1" style="width:77%;margin-left:0%;border:0px solid black;">
					
					
					<?php echo "<h4 style='color:green' align=center><span style='border-bottom:1px dotted green;'> HELLO, ".$admin_name."</span></h4>"; ?>
					
					
				<!-- Admins posts start here -->
				<p style="margin-left:15%;margin-top:3%;">
					<div class="admin_notifications" style="margin-left:30%;font-size:14px;font-weight:bold;letter-spacing:.07em;word-spacing:2px;color:#0066FF;cursor:pointer" onClick="$('#not1').slideToggle(),$('#not2').slideToggle(),$('#show_admin_posts_div').slideToggle(1000)"># <?php echo mysql_num_rows($query1); ?> notifications from Student admin
					</div>
					<div id="show_admin_posts_div" style="display:none;margin-left:20%;height:400px;overflow:auto;" id="middle_div">
					<div  tabindex="0"  class="overthrow content">
						<?php
							$count1=0;
							$color_ar=Array("#99FFFF","#669999","#FFCCCC","#CCFF99","#CC9900","#8CCDDF","#F0CAFE");
							$width=Array(3,2,3,4,2);
							shuffle($color_ar);
							shuffle($width);
							while($data1=mysql_fetch_array($query1))
							{
								$count1++;
								?>
								<div id="ddiv<?php echo $count1;?>">
								<div style="float:left;width:5%;background:url(img/info.gif) no-repeat;text-align:right;font-size:1.1em;text-shadow:0 1px;color:blue;background-position:left bottom"><?php echo $data1['query_no']?>. </div>
								<?php
								if(strlen($data1['admin_post'])<80){ ?>
									<div class="mydiv" id="div<?php echo $count1;?>" style="display:inline-block;width:<?php echo ($width[mt_rand(1,4)]*20).'%'?>;max-width:80%;background:<?php echo $color_ar[mt_rand(0,6)];?>;border-radius:4px;color:#330033;text-shadow:0px  1px #;padding:3% 3% 3% 5%;" >
										<table cellspacing=0 cellpadding=0 style="width:100%;">
											<tr><td >From</td><td><?php echo $data1['admin_id'].' &rarr;'.$data1['posted_date'];?></td></tr>
											<tr><td >Name</td><td><?php echo $data1['admin_name'].'('.$data1['admin_designation'].')'; ?></td></tr>
											<tr><td style="border-bottom:1px dotted gray;">Subject</td><td  style="border-bottom:1px dotted gray;"><strong id="post_subj"><?php echo $data1['subject']?></strong></td></tr>
											<tr><td style="min-width:40px">Request</td><td  id="post_mess"><?php echo $data1['admin_post'] ?></td></tr>
											<tr><td colspan=2>
												<div style="width:100%;margin-top:5px;">
												<div style="display:inline-block;margin-left:10%;border-bottom:1px dotted gray;cursor:pointer;" onclick="load_div_response('<?php echo $data1['query_no']?>','<?php echo $data1['admin_id']?>','<?php echo $data1['subject']?>','<?php echo "div".$count1; ?>')">Respond</div><div style="display:inline-block;margin-left:10%;border-bottom:1px dotted gray;cursor:pointer;" onclick="set_notification('post_subj','post_mess')">Set As Notice</div><div style="display:inline-block;margin-left:10%;border-bottom:1px dotted gray;cursor:pointer;"  id="<?php echo $data1['query_no']; ?>" onclick="delete_response(this.id,<?php echo $count1;?>)">Delete</div>
												</div>
											</td></tr>
										</table>
									</div>
								<?php 
								}
								else
								{
									?>
									<div class="mydiv" id="div<?php echo $count1;?>" style="display:inline-block;width:<?php echo (mt_rand(3,4)*20).'%'?>;max-width:80%;background:<?php echo $color_ar[mt_rand(0,6)];?>;border-radius:4px;color:#330033;text-shadow:0px  1px #;padding:3% 3% 3% 5%;" >
										<table cellspacing=0 cellpadding=0 style="width:100%;">
											<tr><td >From</td><td><?php echo $data1['admin_id'].' &rarr;'.$data1['posted_date'];?></td></tr>
											<tr><td >Name</td><td><?php echo $data1['admin_name'].'('.$data1['admin_designation'].')'; ?></td></tr>
											<tr><td style="border-bottom:1px dotted gray;">Subject</td><td  style="border-bottom:1px dotted gray;"><strong id="post_subj"><?php echo $data1['subject']?></strong></td></tr>
											<tr><td style="min-width:40px">Request</td><td id="post_mess"><?php echo $data1['admin_post'] ?></td></tr>
											<tr><td colspan=2>
												<div style="width:100%;margin-top:5px;">
												<div style="display:inline-block;margin-left:10%;border-bottom:1px dotted gray;cursor:pointer;" onclick="load_div_response('<?php echo $data1['query_no']?>','<?php echo $data1['admin_id']?>','<?php echo $data1['subject']?>','<?php echo "div".$count1; ?>')">Respond</div><div style="display:inline-block;margin-left:10%;border-bottom:1px dotted gray;cursor:pointer;"  onclick="set_notification('post_subj','post_mess')">Set As Notice</div><div style="display:inline-block;margin-left:10%;border-bottom:1px dotted gray;cursor:pointer;" id="<?php echo $data1['query_no']; ?>" onclick="delete_response(this.id,<?php echo $count1;?>)">Delete</div>
												</div>
											</td></tr>
										</table>
									</div>
									<?php
								}
								?>
								</div></br>
						<?php
							}
							
						?>
						</div>
						</div>
						<!-- Admins posts ends here -->
						
						<!-- Posted Queries start-->
					<div class="student_notifications" style="margin-top:5%;margin-left:20%;font-size:14px;font-weight:bold;letter-spacing:.07em;word-spacing:2px;color:#0066FF;" id="not1">
						Status of Posted Problems : <span style="margin-left:10%;cursor:pointer;text-decoration:underline;" onclick='load_url("posted_queries")'> Not Answered</span>
						<div style="border:1px solid green;border-radius:15px;float:right;margin-right:5%;width:8%;font-weight:bold;color:#fff;background:#2DB82D;text-align:center"><?php echo mysql_num_rows($query2); ?></div>
					</div>
					
					<!-- Weeks of welcome proposals -->
					<div class="weeks_notifications" style="margin-top:5%;margin-left:20%;font-size:14px;font-weight:bold;letter-spacing:.07em;word-spacing:2px;color:#0066FF;"  id="not2">
						Senior suggestions : <span style="margin-left:20%;cursor:pointer;text-decoration:underline;" onclick="$('#not1').slideToggle(),$('.admin_notifications').slideToggle(),$('#senior_sug').slideToggle(1000)"> Not confirmed.</span>
						<div  style="border:1px solid green;border-radius:15px;float:right;margin-right:5%;width:8%;font-weight:bold;color:#fff;background:#2DB82D;text-align:center"><?php $qu=mysql_query("select * from senior_posts where state!='ok'") or die(mysql_error()); $ssug=mysql_num_rows($qu);echo $ssug;?></div>
						<br /><br />
						<div id="senior_sug" style="display:none;width:95%; max-height:500px; border:0px; color: black; font-weight:normal; overflow:auto;">
							<?php
							$sgcount=0;
							while($sdata=mysql_fetch_array($qu)){
							$qqnoo=$sdata["query_no"];
							
							 ?>
							<div id='s<?php echo $qqnoo; ?>' style=" padding-left:8px;width:auto; height:auto; min-height:80px; min-width:300px; max-width:500px; max-height:200px; border-bottom:1px dotted gray; margin-top:5px;"><?php echo ++$sgcount; ?> <br />Posted by: <?php echo $sdata['id']." <span style='float:right;padding-right:5px;'>Posted on: ".$sdata['date']."</span><br /><br /><b>Suggestion: </b>".$sdata['post']; ?><br /><br />
							<center><span style="top:2px;"><a onclick="sug_action('<?php echo $qqnoo; ?>','ok')"><img src='assets/img/icons/tick_circle.png' />confirm</a> &emsp;&ensp;
							  <a onclick="sug_action('<?php echo $qqnoo; ?>','notok')"><img src='assets/img/icons/cross_circle.png'  />decline</a></span></center></div>							 
							 
							<?php
							}
							?>
						</div>
						
						
					</div>
				</p>
					
				</div>
            
         	<div class="container2" style="float:right;">

                             <div style='font-weight:bold;margin-left:-20%;width:120%;color:#5F07A4;font-size:13px;cursor:pointer;margin-top:2%;' name="spoorthi_register" onclick="load_url('fest_drafts')">Techzite Events <span class="new_class"><blink>New</blink></span></div>

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
				
				<div  style="background:;float:left;width:60%;font-size:1.1em;margin-left:5px;">
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
							<td style="">
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
						<br /><span style='color:#FF4500;text-decoration:underline;float:right;font-family:Arial;cursor:pointer;' onclick="load_url('clubs/quiz_club')">More....</span>
					</div>
				</div>
			</div>
				
			
        
			
        
        <div id="middle_content" style="width:100%;height:100%;">
		</div>
    </div><!--/end #content--><br />
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
		<ul class="navigation">
			<li style="margin-left:5%;"><a style="font-weight:bold;font-size:15px;">SDCAC</a></li>
			<li style="margin-left:2%;"><a></a></li>
			<li><a name="home" style="margin-left:5%;" href="" id="l1">Home</a></li>
			<li><a name="problem_post_form" onClick="load_url(this.name)" id="l2">Post A Query</a></li>
			<li><a name="council" onClick="load_url(this.name)" id="l3">Council</a></li>
			<li><a name="awards_prizes" onClick="load_url(this.name)" id="l4">Awards& Prizes</a></li>
			<li><a onClick="load_url('gallery')" id="l5">Gallery</a></li>
			<li  style="float:right">
			<a name='user_register' href='admin_login.php'><?php echo $_SESSION['admin_id']; ?></a></li>
			<li style="float:right;"><input type=text placeholder="Search"   id="search_input" onKeyUp="seastu1(this.value)"></li>
		</ul>
	</div>    

<div style="position:fixed;height:35%;width:30%;right:5%;top:15%;display:none;background:#fff;border-radius:2px;box-shadow:0px 0px 3px black;font-family:inherit" id="div_response" >
				<input type="button" id="qno" style="display:none"><div style="display:inline-block;float:right;margin-right:5%;top:5%;cursor:pointer" onclick="$('#div_response').slideUp()">&#10006;</div>
				<table style="margin-left:10%;margin-top:5%;">
				<tr><td width="60px">ID</td><td><input type='text' id='div_resp_id' style="border:0px;background:transparent;"></td></tr>
				<tr><td height=45px>Subject</td><td><input type='text' id='div_resp_subj' style="border:0px;background:transparent;font-weight:bold;"></td></tr>
				<tr ><td>Anwer</td><td><textarea  id="text" style="font-family:inherit" cols=20></textarea></td></tr>
				<tr><td ></td><td style="padding-top:5px;"><input type=button id="snd" class="send" value="Send" onClick="send_response(this.name)"></td></tr>
				</table>
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
	
	function load_url(nam)
	{
		$.post(nam+".php",function(data)
			{
				$("#content").html(data);
			});
	}
	function send_response(div1)
	{
		qno1=document.getElementById('qno').value;
		adm_id=document.getElementById('div_resp_id').value;
		resp=document.getElementById('text').value;
		if(resp.indexOf('#')==-1 && resp.indexOf('+')==-1 && resp.indexOf('&')==-1)
		{
		div_id="d"+div1;
		$.post("send_admin_response.php?sno="+qno1+"&adm_id="+adm_id+"&cont="+resp+"&div_id="+div_id,function(data)
			{
				$("#"+div1).html(data);
			});
		}
		else alert("+,#,& are not allowed");
	}
	function disp(div2)
	{
		$('#ddiv'+div2).slideUp();
	}
	function delete_response(qno,div)
	{
		
		$.post("edit_updates.php?times="+qno,function(data)
			{
				$("#div"+div).html(data);
		});
		setTimeout("disp("+div+")",500);
	}
	function set_notification(subj,mess)
	{
		subj1=document.getElementById(subj).innerHTML;
		me=document.getElementById(mess).innerHTML;
		$.post("post_news.php?subjj="+subj1+"&nnews="+me,function(data)
			{
				$("#content").html(data);
		});
	}
	function load_div_response(qno,id,subj,no)
	{
		document.getElementById('qno').value=qno;
		document.getElementById('div_resp_id').value=id;
		document.getElementById('div_resp_subj').value=subj;
		document.getElementById('snd').name=no;
			$('#div_response').slideToggle();
	}



/* this is for posted queries */
xmlHttp="sd";
function search_box(a)
{
	$("#content").slideDown();
	document.getElementById("search_input").value=a;
	document.getElementById("stu_ids").style.display="none";
	$.post("give_stu_data.php?sid="+a,function(data)
		{
			$("#content").html(data);
		});
}
var xmlHttp;
function seastu1(str)
{
	
	if(str.length==0)
	{ 
		document.getElementById("stu_ids").innerHTML="";
		document.getElementById("stu_ids").style.border="0px";
		return;
	}
	document.getElementById("stu_ids").style.display="block";
	xmlHttp=GetXmlHttpObject();
	if(xmlHttp==null)
	{
		alert("Browser does not support HTTP Request");
		return;
	} 
	var url="stu_search1.php";
	url=url+"?q="+str;
	xmlHttp.onreadystatechange=stateChanged1 ;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function stateChanged1() 
{ 
	if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		document.getElementById("stu_ids").
		innerHTML=xmlHttp.responseText;
		document.getElementById("stu_ids").
		style.border="1px solid #A5ACB2";
	} 
}

function send_resp(x,y,z)
{	
	ans=document.getElementById(x).value;
	post_data = {'q':y,'ans':ans,'id':z};
	$.post("rec_resp.php",post_data,function(data){
		$("#status").show(1000);
		$("#status").html(data);
		$("#status").hide(5000);
		$("#query_"+x).hide(1000);
	});
}
function skip_resp(x,y,z)
{
	 post_data = {'q':y,'ans':'@','id':z};
     $.post("rec_resp.php",post_data,function(data){
     $("#query_"+x).hide(1000);
     });
}

function show_set_notice()
{
	$('#news_show_div1').fadeIn(500);
	$('#news_show_div').fadeIn();
	$.post("post_news.php",function(data){
		$('#news_show_div').html(data);
	});
}
function sug_action(qn,action){
$.post('notice_actions.php?qno='+qn+'&sconfirm='+action,function(data){
	$("#s"+qn).html(data);
	});$("#s"+qn).fadeOut(2000);
}
/* posted queries ends */
	
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








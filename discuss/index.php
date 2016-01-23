<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Discussion Forum</title>
    <link rel="SHORTCUT ICON" href="img/d_logo.png" />
   <link href="assets/css/bootstrap.min.css" rel="stylesheet"> 
   <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="todc-bootstrap.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
	<link rel="stylesheet" href="todc-bootstrap.css" />

	
	   <script src="jquery.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="docs.min.js"></script>
    <script type="text/javascript" src="functions.js"></script>
	<style type="text/css">
a{cursor:pointer;}
#user_id, #password
{
margin-left:13%;font-size:14px;
width:75%;height:33px;border:0;color:#003333;
border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;
box-shadow:0px 0px 1px 0px rgb(204,204,204) inset;-moz-box-shadow:0px 0px 1px 0px rgb(204,204,204) inset;-webkit-box-shadow:0px 0px 1px 0px rgb(204,204,204) inset;
border:1px solid rgb(204,204,204);
}
input:hover
{
  border:1px solid #3399FF;
  box-shadow:0px 0px 1px 0px #0033CC inset;-moz-box-shadow:0px 0px 1px 0px #0033CC inset;-webkit-box-shadow:0px 0px 1px 0px #0033CC inset;
}
.admin_head
{
  margin-left:auto;margin-right:auto;font-weight:bold;color:#330000;font-size:20px;text-decoration:underline;height:10%;margin-top:1%;text-align:center;
}

.admin_table
{
   width:400px;
   background-color:white;
   box-shadow:0px 0px 3px 0px #C8C8C8 ;margin-top:2%;-moz-box-shadow:0px 0px 3px 0px #C8C8C8 ;-webkit-box-shadow:0px 0px 3px 0px #C8C8C8 ;
   border-radius:2px;
   border:1px solid #C8C8C8;
   height:250px;
   margin-left:auto;
   margin-right:auto;
}
.admin_table tr
{
    color:#003366;font-weight:bold;
}
#admin_login_error
{
  text-align:center;color:#CC6600;
}
.login_submit
{
 font-weight:bold;margin-left:14%;height:31px;width:23%;-moz-border-radius:2px;-webkit-border-radius:2px;border-radius:2px;color:white;border:0px;cursor:pointer;box-shadow:0px 0px 2px 0px #6699CC inset;-moz-box-shadow:0px 0px 2px 0px #99FFCC inset;-webkit-box-shadow:0px 0px 2px 0px #99FFCC inset;background-color:#0066CC;font-size:13px;
}
.login_submit:hover
{
  box-shadow:0px 0px 1px 0px #003333 inset;-moz-box-shadow:0px 0px 1px 0px #003333 inset;-webkit-box-shadow:0px 0px 1px 0px #003333 inset;
}

li a
{
cursor:pointer;
}
.answer
{
margin-left:50px;
font-size:18px;
}
.table_forum
{
margin-left:100px;
}
.table_forum td
{
height:auto;
width:700px;
border:0px solid red;
font-family:calibri;
font-size:16px;

}
.question_sub
{
margin-left:-100px;
}
.question
{
	margin-left:100px;
}
.ans_div
{
	max-height:200px;
	overflow:auto;
	width:95.9%;
	margin-left:40px;
	display:none;
	height:auto;
	border:0px solid black;
}
.ans_field
{
width:100%;
margin-left:40px;
display:none;
height:auto;
border:0px solid black;
}
.text_ans
{
width:620px;
height:60px;
}
.questions
{
	background-color:GhostWhite;
	border-top:5px groove #f6f6f6;
	border-bottom:8px groove #f6f6f6;
	border-radius:10px 10px;
	-webkitborder-radius:10px 10px;
	-moz-border-radius:10px 10px;
	overflow:hidden;
}
.active1
{
	background:rgb(221,221,221);
	font-weight:normal;
}
.discussion_holder
{
	width:90%;margin-left:auto;margin-right:auto;min-height:400px;
	
}
.discussion_main
{
	width:80%;margin-left:auto;margin-right:auto;height:100px;padding-right:10px;font-size:1.1em;
	padding-left:10px;
	height:auto;
	color:#666;
	padding-bottom:10px;
	margin-top:15px;
	
}

.responses
{
	width:80%;
	margin-top:5px;
	margin-left:auto;
	margin-right:auto;
	max-height:300px;
	overflow:auto;
	padding-bottom:10px;
}
.response
{
	width:90%;
margin-left:5%;
	border-top:1px solid #fff;
	padding-left:5px;
	min-height:43px;
	background:rgb(240,240,240);
	display:inline-block;
}
.response strong
{
	color: rgb(0, 136, 204);
	border-bottom:1px dotted;
}
.response p
{
	margin-left:55px;
}
.response textarea
{
	width:80%;
	margin-left:auto;
	margin-right:auto;
	height:35px;
}
.seperator
{
	width:90%;
	margin-left:auto;
	margin-right:auto;
	border-bottom:1px solid rgb(204,204,204);
	
}
#search_form
{
	height:35px;
	margin-top:5px;
	background:#999;
	color:#333;
	border:1px solid #666;
	border-radius:4px;
}
#search_form:focus
{
	background:#AAA;
	color:#000;
}
#logout
{
	height:35px;
	margin-top:5px;
	line-height:40px;
	width:80px;
	text-align:center;
	padding-left:10px;
	font-size:1.1em;
	color:#777;
	cursor:pointer;
}
#logout:hover
{
	color:#AAA;
}
.table tr
{
	height:40px;
}
.table tr td
{
	font-size:0.94em;
}
.table tbody tr:hover
{
	border-left:2px solid rgb(0, 136, 204);
}
#post_new
{
	background:#F9F9F9;
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	box-shadow:0px 0px 3px rgb(204,204,204);
	-moz-box-shadow:0px 0px 3px rgb(204,204,204);
	-webkit-box-shadow:0px 0px 3px rgb(204,204,204);
	padding-bottom:10px;padding-left:10px;
	border:1px solid rgb(205,205,205);
}
#footer
{
	height:100px;
	background:#F8F8F8;
	box-shadow:0px 0px 2px rgb(204,204,204);
}
.round
{
	width:130px;
	height:130px;
	cursor:pointer;
}
.round:hover
{
	box-shadow:0px 0px 5px #000;
}
.col-xs-6{
	width:20%;
	}
</style>
  </head>

  <body>
	  
	<?php
		if(!isset($_SESSION["login_id"]))
		{
		die('<br/><br/><br/><br/><br/><br/><div id="main">
		<table class="admin_table" align="center">
 <tbody><tr><td colspan="2"><div class="admin_head">
 Student Login
 </div></td></tr>
 <tr><td><br></td></tr>
 <tr><td colspan="2" id="admin_login_error"></td></tr>
 <tr><td><input placeholder="Username" id="user_id" type="text"></td></tr>
 <tr><td height="10px"></td></tr>
<tr><td><input placeholder="Password" id="password" type="password">
</td></tr><tr><td><br></td></tr>
<tr><td>
<input value="Login" name="submit" onclick="discuss_login()" class="login_submit" align="middle" type="submit"><a class="pull-right" style="padding-right:10px;" href="../">Register</a></td></tr>
<tr><td><br></td></tr>
</tbody></table></div>');
		}
		else{
			
	?>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation" style="background:#000;opacity:0.8">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="../" ><img src="../images/head3.png" width='40px' ></img>SDCAC</a>
        </div>
        <div class="navbar-collapse collapse">
				<a href="../logout.php">
				<div class="navbar-search pull-right" id="logout">
					    <i class="icon-user icon-white"></i> Logout
				</div>
				</a>
                <div class="navbar-search pull-right">
					<input type="text" class="search-query" placeholder="Search" id="search_form">
				</div>
				
        </div>
      </div>
    </div>
	<?php
	include("../config_db25788.php");
			$iid=$_SESSION['login_id'];
			$qqq=mysql_query("select * from sdcac_user_table where user_id='$iid'")or die(mysql_error());
			$ddd=mysql_fetch_array($qqq);
			$dddm=$ddd['mail_id'];
			if($ddd['mail_id']==$iid."@rgukt.in" || $ddd['memb_group']=='')
			{
				echo <<<s
				<style>
				body
				{
					background:#F8F8F8;
				}
				
				</style>
				<div class="alert alert-info" style="margin-top:10%;width:400px;margin-left:auto;margin-right:auto;">If you have already updated your email, just select group</div>
				<div style="background:#fff;height:250px;width:400px;margin-left:auto;margin-right:auto;
				box-shadow:0px 0px 3px gray;
				-moz-box-shadow:0px 0px 3px gray;
				-webkit-box-shadow:0px 0px 3px gray;
				border-radius:3px;
				-moz-border-radius:3px;
				-webkit-border-radius:3px;
				padding:20px 0px 0px 10px;
				">
					<center>
					<link href="assets/css/select2.css" rel="stylesheet">
					<script src="assets/js/select2.min.js"></script>
					<h4>Update Email to Continue</h4>
					<div id="tab">
					<table>
					<tr><td>&nbsp;</td></tr>
					<tr><td><input type="text" value='$iid' class="input" style="height:25px;" readonly></td></tr>
					
					<tr>
						<td><input type="email" value="$dddm" id="mail" placeholder="Email" style="height:25px" /></td></tr>
					<tr>
						<td>
						Select Group
						<select  style="width:100px;" id="group">
							<option>gate</option>
							<option>cat</option>
							<option>gre</option>
							<option>civils</option>
							<option>ifs</option>
						</select>
						</td></tr>
					<tr>
						<td><button class="btn btn-primary" onclick="update_email()">Update</button></td></tr>
					</table>
					</div>
					</center>
				</div>
					<script type="text/javascript">
					function update_email()
					{
					$('.modal hide fade').show();
					ev=$('#mail').val();
					gr=$('#group').val();
					var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
					if(ev.match(mailformat))
					{
						d={'mail':ev,'group':gr};
						$('#tab').addClass('alert alert-success');
						$.post("update_mail.php",d,function(data){
							$('#tab').html(data);
							});
					}
					else
						alert('Check mail format');
				}
		</script>
s;
				die("");
			}
	?>
    <div class="container-fluid">
      <div class="row">
		  
        <div class="col-sm-3 col-md-2 sidebar" style="width:255px;overflow:hidden;">
          <ul class="nav nav-sidebar">
		  <li class="active1"><a href=""><h4 align="center"><img src="img/d_logo.png" style="display:inline;"/>Discussion Forum</h3></a></li>
		  <br/><br/><br/>    
            <li id='l2'><a onClick="load_option('forum','l2','pencil')"><i id="pencil" class="icon-pencil"></i> Start New</a></li>
            <li id='l3'><a onClick="load_option('view_all','l3','th-list')"><i id="th-list" class="icon-th-list"></i> View All</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li id='l4'><a onClick="load_option('search','l4','search')"><i id="search" class="icon-search"></i> Search </a></li>
            <li id='l5'><a onClick="load_option('user_dicussion','l5','user')"><i id="user" class="icon-user"></i> Your Discussions</a></li>
            <li><a></a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li id='l6'><a onClick="load_option('problem_post','l6','question-sign')"><i id="question-sign" class="icon-question-sign"></i> Problem with Website</a></li>
            <li id='l7'><a onClick="load_option('instructions','l7','info-sign')"><i class="icon-info-sign"></i> Instructions</a></li>
          </ul>
		  <br/>
          
        </div> 
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="main">
		<?php
			include("../config_db25788.php");
			$query=mysql_query("select * from discuss_dashboard order by batch_order asc") or die(mysql_error());
			$r01=mysql_fetch_array($query);
			$r03=mysql_fetch_array($query);
			$r05=mysql_fetch_array($query);
			$r07=mysql_fetch_array($query);
			$r09=mysql_fetch_array($query);
			$r11=mysql_fetch_array($query);
			$r13=mysql_fetch_array($query);
			$r15=mysql_fetch_array($query);
			$r1=mysql_fetch_array($query);
			$r2=mysql_fetch_array($query);
			$r3=mysql_fetch_array($query);
			$r4=mysql_fetch_array($query);
			$r5=mysql_fetch_array($query);
		?>
		 
          <h1 class="page-header">Dashboard</h1>
          <div class="row placeholders" style="width:90%;margin-left:auto;margin-right:auto">
            <div class="col-xs-6 col-sm-3 placeholder" >
              <img src="img/g1.jpg" class="round" alt="GATE" onclick="load_url('gate')">
              <h4>GATE</h4>
              <span class="text-muted" ><span class="badge badge-important" title="Questions" ><?php echo $r1[2];?></span> / <span class="badge badge-info" title="Answers"><?php echo $r1[3];?></span></span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder" >
              <img src="img/c3.jpg" class="round" alt="CAT" onclick="load_url('cat')">
              <h4>CAT</h4>
              <span class="text-muted" ><span class="badge badge-important" title="Questions" ><?php echo $r2[2];?></span> / <span class="badge badge-info" title="Answers"><?php echo $r2[3];?></span></span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="img/gr1.jpg" class="round" alt="GRE" onclick="load_url('gre')">
              <h4>GRE</h4>
              <span class="text-muted" ><span class="badge badge-important" title="Questions" ><?php echo $r3[2];?></span> / <span class="badge badge-info" title="Answers"><?php echo $r3[3];?></span></span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="img/c1.jpg" class="round" alt="CIVILS" onclick="load_url('civils')">
              <h4>CIVILS</h4>
              <span class="text-muted" ><span class="badge badge-important" title="Questions" ><?php echo $r4[2];?></span> / <span class="badge badge-info" title="Answers"><?php echo $r4[3];?></span></span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="img/ifs.jpg" class="round" alt="CIVILS" onclick="load_url('ifs')">
              <h4>IFS</h4>
              <span class="text-muted" ><span class="badge badge-important" title="Questions" ><?php echo $r5[2];?></span> / <span class="badge badge-info" title="Answers"><?php echo $r5[3];?></span></span>
            </div>
          </div>

          
		
          <div class="table-responsive" style="margin-top:50px;">
			 <!-- start table -->
            <table class="table table-hover">
              <thead > 
                <tr>
                  <th>S.no</th>
                  <th>Branch</th>
                  <th># Posts</th>
                  <th>Responses</th>
                  <th>Links</th>
                </tr>
              </thead>
              <tbody>
				  
                <tr>
					<td>1</td>
					<td >Chemical</td>
					<?php
					echo <<<s
					<td>$r01[2]</td>
					<td>$r01[3]</td>
					<td><a onclick="load_branchwise('$r01[1]','E3')">Click Here</a></td>
s;
?>
				</tr>
				<tr>
					<td>2</td>
					<td >Civil</td>
					<?php
					echo <<<s
					<td>$r03[2]</td>
					<td>$r03[3]</td>
					<td><a onclick="load_branchwise('$r03[1]','E3')">Click Here</a></td>
s;
?>
				</tr>
				
				<tr>
					<td>3</td>
					<td >CSE</td>
					<?php
					echo <<<s
					<td>$r05[2]</td>
					<td>$r05[3]</td>
					<td><a onclick="load_branchwise('$r05[1]','E3')">Click Here</a></td>
s;
?>
				</tr>
				
				<tr>
					<td>4</td>
					<td >ECE</td>
					<?php
					echo <<<s
					<td>$r07[2]</td>
					<td>$r07[3]</td>
					<td><a onclick="load_branchwise('$r07[1]','E3')">Click Here</a></td>
s;
?>
				</tr>
				
				<tr>
					<td>5</td>
					<td >Mech</td>
					<?php
					echo <<<s
					<td>$r09[2]</td>
					<td>$r09[3]</td>
					<td><a onclick="load_branchwise('$r09[1]','E3')">Click Here</a></td>
s;
?>
				</tr>
				
				<tr>
					<td>6</td>
					<td >MME</td>
					<?php
					echo <<<s
					<td>$r11[2]</td>
					<td>$r11[3]</td>
					<td><a onclick="load_branchwise('$r11[1]','E3')">Click Here</a></td>
s;
?>
				</tr>
				
				<tr>
					<td>7</td>
					<td >E1</td>
					<?php
					echo <<<s
					<td>$r13[2]</td>
					<td>$r13[3]</td>
					<td><a onclick="load_branchwise('E1','E1')">Click Here</a></td>
s;
?>
				</tr>
				
				<tr>
					<td>8</td>
					<td>PUC</td>
					<?php
					echo <<<s
					<td>$r15[2]</td>
					<td>$r15[3]</td>
					<td><a onclick="load_branchwise('PUC','')">Click Here</a></td>
s;
?>
				</tr>
              </tbody>
            </table>
            <!-- end table-->
          </div>
          </div>
        </div>
    </div>
</div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2" id="footer">
<center>
		<div style="float:left;width:33%;line-height:40px;">
			24/7 STUDENT SERVICE</br>S.D.C.A.C
		</div>
		<div style="float:left;width:33%;line-height:40px;">
		Developed by using</br>
		<a href="http://10.11.3.11/sdcac/">Bootstrap</a>
		</div>
		<div style="float:left;width:33%;line-height:40px;">
			<a href="">sdcac@rgukt.in</a></br>
			<a style="border-bottom:1px dotted;" onclick="$.post('../webteam.php',function(data){$('#main').html(data)})">Web Team</a>
		</div>
</center>
	  </div>
	
<?php
}
?>
<script type="text/javascript">
function load_branchwise(m,n)
{
	var xmlhttp;
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
			if(xmlhttp.readyState<4)
			{
				document.getElementById("main").innerHTML="<div style='min-height:500px;'><img src='../images/276.GIF' style='margin-left:20%;margin-top:20%;' /></div>";
			}
			else if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("main").innerHTML=xmlhttp.responseText;
			}
			else if(xmlhttp.status==404)
			{
				document.getElementById("main").innerHTML="Page Under Construction";
			}
			}
			xmlhttp.open("GET","search.php?key="+n+"&onekey="+m,true);
			xmlhttp.send();
}
function load_url(k)
{
	$.post("open_spec.php?cat="+k,function(data){
		$('#main').html(data);
});

	
}
</script>
  </body>
</html>

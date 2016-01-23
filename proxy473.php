<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SDCAC</title>
<!--favicon-->

<!--jQuery-->
<script type="text/javascript" src="assets/scripts/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="main_scripts.js"></script>
      <!--form validation-->
	<script type="text/javascript" src="assets/scripts/jquery.validate.js"></script>
	
    <!--datepicker-->
	<script type="text/javascript" src="assets/scripts/jquery.datePicker.js"></script>
    <script type="text/javascript" src="assets/scripts/date.js"></script>
    <!--[if IE]><script type="text/javascript" src="assets/scripts/jquery.bgiframe.js"></script><![endif]-->
    
    <!--tabber-->
    <script type="text/javascript" src="assets/scripts/tabber-minimized.js"></script>
    
<!--css-->
<link rel="stylesheet" href="assets/css/reset.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="assets/css/main.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="assets/css/tabber.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="assets/css/datePicker.css" type="text/css" media="screen"/>
<!--[if lt IE 7]>
<link rel="stylesheet" href="assets/ie6/ie6.css" type="text/css" media="screen"/>
<![endif]--> 

<!--[if lt IE 8]>
<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js"
type="text/javascript"></script>
<![endif]-->


	<script type="text/javascript">
    
    $(document).ready(function(){
   
    $(".broom_form").validate();//validates any form with class="broom_form"
	$('.date-pick').datePicker({startDate:'01/01/1996'});//initiates datepicker, in this case with a begin date of 01/01/1996; earlier dates cannot be selected
	$("a.close").click(function(){   $(this).parent().slideUp(); return false;});  //links with class 'close' close parent div

    });
    
    </script>
</head>
<style>
.inp
{
	width:80%;
	border:1px solid #BDB76B;
	height:21px;
	opacity:0.75;
	border:1px solid rgb(204,204,204);
	border-radius:3px;
	font-family:inherit;
}
.inp:focus
{
	border:1px solid orange;
	box-shadow:0px 0px 1px orange;
}
.login
{
	height:23px;
	border:1px solid rgb(204,204,204);
	background:gray;
	cursor:pointer;
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

<div id="header">
    <div id="logo">
		<!-- <div style="width:15%;height:80%;background:url(assets/img/layout/head3.png);background-size:100% 100%;position:absolute;)"></div> -->
    <h1 id="header_broomcupboard"><a href="#" style='cursor:text;'></a></h1>
    </div>
    
</div><!--/end #header-->
    
    
<div id="wrapper"  style="background:#fff;"><!--holds pretty much everything-->
    <div id="menu_main">
		
        <div class="menu_main_section first">
            <ul class='points'>
				<div style='height:22px;width:100%;text-align:center;font-size:1.1em;color:white;font-weight:bold;background-color:brown;'> SUB LINKS </div>
                <li><a href="#">Orientation</a></li>
                <li><a href="#">Student Activities</a></li>
                <li><a href="#">Tech Support</a></li>
                <li class="selected1"><a href="#">Weeks of welcome</a></li>
                <li><a href="#" onclick='jobsinterns()'>Jobs & Internships</a></li>
                <li><a href="#">Student Organization</a></li>
             
            </ul>
            
        </div><!--/end #menu_main_section-->
    </div><!--/end #menu_main-->

	<div id="content" style="">
				<div class="container1" style="width:78%;margin-left:-3%;border:0px solid black;" id="slides">
					
       	    </div><!--/end .container2-->
            
         	<div class="container2" style="float:right;">
				<div class='notice_board' style='margin-left:-20%;width:120%;background-color:white;margin-top:3%;text-align:center;box-shadow:0px 0px 1px #D0D0D0;border:1px solid #D0D0D0;height:360px;'>
					<span style='font-weight:bold;border-bottom:1px dashed gray;color:#CC3300;line-height:40px;'>NOTICE BOARD</span>
					<script type="text/javascript">
						$.post("updates.php",function(data){
							$('.notices_div').html(data)
							})
						$.post("basic_form.php",function(data){
							$('#slides').html(data)
							})
					</script>
					<div class='notices_div' style='text-align:center;width:99%;line-height:30px;color:#383838;font-size:13px;'>
						
					</div>
				</div>
       	    </div><!--/end .container2-->
       	   
       	    <div class="container1 separator" style="width:100%;">
				
				
			</div>
				
			
        
    </div><!--/end #content--></br>
    </div> 
    <div class='container1' style="font-weight:bold;line-height:40px;text-align:center;background:#000;color:white;height:40px;width:100%;">
		SDCAC @ RGUKT
	</div>
    

    
    
</div>
<!--/end #wrapper-->

<div  id="welcome">
		<ul class="navigation">
			<li style="margin-left:10%;"><a></a></li>
			<li><a name="home" style="margin-left:5%;" href="" id="l1">Home</a></li>
			<li><a name="aboutus" onClick="load_url(this.name)" id="l2">About Us</a></li>
			<li><a name="council" onClick="load_url(this.name)" id="l3">Council</a></li>
			<li><a name="awards_prizes" onClick="load_url(this.name)" id="l4">Awards& Prizes</a></li>
			<li><a onClick="load_url('gallery')" id="l5">Gallery</a></li>
			<li  style="float:right">
			<div id="stud_login_error" class="student_login_error" style='display:none;position:absolute;left:-280px;color:white;font-weight:bold;' align="center"></div>
		
		</ul>
	</div>    

<!-- news show divisions starts -->
<div style=" position:fixed; left:0px; top:0px;min-height:1000px; min-width:1400px; background-color:#000; opacity:0.7; display:none;" id="news_show_div1" onclick='hide_news()'></div>


<div style=" position:fixed; left:20%; top:70px; background-color:#FFFFFF;height:75%; width:60%; display:none;text-align:left; font-weight:100; color:#000000;font-size:15px;" id="news_show_div"></div>
<!-- news show division ends -->


</body><!--/end #b_main-->




<script type='text/javascript'>
function reg_close()
{
	$('#register_black').fadeOut();
}
function reset_register()
{
  document.getElementById('id1').value="";
  document.getElementById('id2').value="";
  document.getElementById('id3').value="";
  document.getElementById('id4').value="";
  document.getElementById('id5').value="";
  document.getElementById('id6').value="";
}
function validate_register1()
	{
		var uname = document.getElementById('id1').value;
		var name = document.getElementById('id2').value;
		var pass1 = document.getElementById('id3').value;
		var pass2 = document.getElementById('id4').value;
		var quest = document.getElementById('id5').value;
		var ans = document.getElementById('id6').value;
		if(uname==" "||uname=="" || uname.length<7||(uname[0]!='N'))
		{
			document.getElementById('id1').focus();
			document.getElementById('error_register').innerHTML='Invalid User ID' ;
			$('#error_register').css({'visibility':'visible'}).fadeIn(700).fadeOut(4500);
			//document.getElementById('error_register').style.display='block';
		}
		else if(name==" " || name=="")
		{
			document.getElementById('id2').focus();
			document.getElementById('error_register').innerHTML='Please Enter your Name' ;
			document.getElementById('error_register').style.display='block';
		}
		else if(pass1==" "||pass1=="")
		{
			document.getElementById('id3').focus();
			document.getElementById('error_register').innerHTML='Please Enter Password' ;
			document.getElementById('error_register').style.display='block';
		}
		else if(pass2==" "||pass2=="")
		{
			document.getElementById('id4').focus();
			document.getElementById('error_register').innerHTML='Please Re-Enter Password' ;
			document.getElementById('error_register').style.display='block';
		}
		else if(pass1!=pass2)
		{
			document.getElementById('id4').focus();
			document.getElementById('error_register').innerHTML="Password and Confirm Password doesn't Match" ;
			document.getElementById('error_register').style.display='block';
		}
		else if(quest=="" || quest==" ")
		{
			document.getElementById('id5').focus();
			document.getElementById('error_register').innerHTML="Enter Security Question" ;
			document.getElementById('error_register').style.display='block';
		}
		else if(ans=="" || ans==" ")
		{
			document.getElementById('id6').focus();
			document.getElementById('error_register').innerHTML="Enter Ans for your Question" ;
			document.getElementById('error_register').style.display='block';
		}
		else
		{
			a=uname+pass1+quest+ans;
			if(a.indexOf('#')==-1 && a.indexOf('+')==-1 && a.indexOf('&')==-1)
			{
				document.getElementById('error_register').style.display='block';
			$.post("register_posting.php?specify=register&id="+uname+"&password1="+pass1+"&sec_quest="+quest+"&sec_ans="+ans,function(data)
			{
				$("#error_register").html(data);
			});
			}
			else
			{
				document.getElementById('error_register').innerHTML="+,#,& are not allowed" ;
				document.getElementById('error_register').style.display='block';
			}
		}
			
	}
	
	 
</script>


<!-- Mirrored from www.snaptin.com/demo/broom_cupboard/1.html by HTTrack Website Copier/3.x [XR&CO'2010], Fri, 11 Feb 2011 12:50:55 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=iso-8859-1"><!-- /Added by HTTrack -->
</html>




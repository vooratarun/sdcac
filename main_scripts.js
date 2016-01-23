
	function load_url(name)
	{
	 $("html, body").animate({ scrollTop: 0 }, 1000);
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
   document.getElementById("content").innerHTML="<img src='images/276.GIF' style='margin-left:20%;margin-top:20%;' />";
  }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("content").innerHTML=xmlhttp.responseText;
    }
	else if(xmlhttp.status==404)
	{
		document.getElementById("content").innerHTML="<img style='margin-left:300px;margin-top:170px;width:200px;' src='images/uc.jpg' />";
	}
  }
	  xmlhttp.open("GET",name+".php?",true);
xmlhttp.send();
	
   }
   

function stud_reg()
{
document.getElementById("register_field").style.display='none';
document.getElementById("h2").style.display='none';
document.getElementById("register").style.display='inline';
}
function senior_sug()
{
$('#senior_black').fadeIn();
	$.post("senior_suggest.php",function(data){
		$("#senior_form").html(data);
	});
}



function change_profile()
	{
				var id=document.getElementById('uids').innerHTML;
				var pwd=document.getElementById('pwd').value;
				var rpwd=document.getElementById('rpwd').value;
				var mid=document.getElementById('mid').value;
				var phno=document.getElementById('phno').value;
				var sq=document.getElementById('sq').value;
				var sqa=document.getElementById('sqa').value;
				var cpwd=document.getElementById('cpw').value;

				
				
				if(sq=="" || cpwd=="")
				{
						document.getElementById("error").innerHTML="(*)Mandatory Fields were Left Unfilled.";
						$("#error").fadeIn(100);
						$("#error").fadeOut(5000);
						return false;
				
				}
				if(pwd!=rpwd){
				document.getElementById("error").innerHTML="Mismatch in Password & Re-enter Password";
						$("#error").fadeIn(100);
						$("#error").fadeOut(5000);
				
				return false;
				}
				
			if(mid!="")
			{
						var atpos=mid.indexOf("@");
					var dotpos=mid.lastIndexOf(".");
					if (atpos<1 || dotpos<atpos+2 || dotpos+2>=mid.length)
					{
						
						document.getElementById("error").innerHTML="Invalid Em@l ID";
								$("#error").fadeIn(100);
						$("#error").fadeOut(5000);
						
						 return false;
					}
			}
			
			if(phno!="" && phno!="not given")
			{
				phoneno=/^\d{10}$/;
				if(!(phno.match(phoneno)) || phno<7000000000)
				{

						document.getElementById("error").innerHTML="Enter Valid Phone Number";
					$("#error").fadeIn(100);
						$("#error").fadeOut(5000);
						return false;
			
				}
			}
								
				$.post("change_profile.php?uid="+id+"&pwd="+pwd+"&mid="+mid+"&phno="+phno+"&sq="+sq+"&sqa="+sqa+"&cpwd="+cpwd,function(data)
					{ 
						$("#ch_prof").html(data);
				});

		}

function change_profile1()
	{
				var id=document.getElementById('uids').innerHTML;
				var pwd=document.getElementById('pwd').value;
				var rpwd=document.getElementById('rpwd').value;
				var mid=document.getElementById('mid').value;
				var phno=document.getElementById('phno').value;
				var sq=document.getElementById('sq').value;
				var sqa=document.getElementById('sqa').value;
				var cpwd=document.getElementById('cpw').value;
				var uname=document.getElementById('uname').value;
				
				
				if(sq=="" || cpwd=="" || uname=="")
				{
						document.getElementById("error").innerHTML="(*)Mandatory Fields were Left Unfilled.";
						$("#error").fadeIn(100);
						$("#error").fadeOut(5000);
						return false;
				
				}
				if(pwd!=rpwd){
				document.getElementById("error").innerHTML="Mismatch in Password & Re-enter Password ";
						$("#error").fadeIn(100);
						$("#error").fadeOut(5000);
				
				return false;
				}
				
			if(mid!="")
			{
						var atpos=mid.indexOf("@");
					var dotpos=mid.lastIndexOf(".");
					if (atpos<1 || dotpos<atpos+2 || dotpos+2>=mid.length)
					{
						
						document.getElementById("error").innerHTML="Invalid Em@il ID";
							$("#error").fadeIn(100);
						$("#error").fadeOut(5000);
						
						 return false;
					}
			}
			
			if(phno!=""  && phno!="not given")
			{
				phoneno=/^\d{10}$/;
				if(!(phno.match(phoneno)) || phno<7000000000)
				{

						document.getElementById("error").innerHTML="Enter valid Phone Number";
						$("#error").fadeIn(100);
						$("#error").fadeOut(5000);
						return false;
			
				}
			}
			else{
								
				return true;
				}
		}
function prof_close(){
	$("#ch_prof").fadeOut(300);	
	$("#profile_close").fadeIn(1000);	
	
	}


	
function check_login()
	{
              
		id=document.getElementById('user_id').value;
             
		pas=document.getElementById('password').value;
		$.post("check_login.php?user_id="+id+"&password="+pas+"&specify=student",function(data)
			{
				$("#stud_login_error").html(data);
		});
	}


function load_dirs(x,y)
{	
	$.post("getinfo.php?sub="+y+"&folder="+x,function(data){
		$("#load_content").fadeIn();
		$("#load_content").html(data);
		$("#load_gallery").hide();
	});
}
	function check_post_news()
	{ 
		var subj = document.getElementById('subject').value;
		var mess = document.getElementById('news').value;
		var by = document.getElementById('user').value;
		var n = document.getElementById("addfiles").name[4];
		var flinks="";
		for(i=0;i<n;i++)
		{
			if(document.getElementById('f'+i).value==""){
					document.getElementById('f'+i).removeAttribute("type");
					document.getElementById('f'+i).removeAttribute("value");
					document.getElementById('f'+i).style.display="none";
					document.getElementById('fc'+i).style.display="none";
					document.getElementById('fcb'+i).style.display="none";
				}
			else
			{
			flinks+=document.getElementById('f'+i).value+"";
			}
		}
		var to= "all";
		if(subj=="" || subj==" ")
			{
		    document.getElementById('post_news_error_message').innerHTML='Please Enter Subject';
		    document.getElementById('post_news_error_message').style.display='block';
		    return false;
			}
		else if(mess=="" || mess==" ")
			{
		    document.getElementById('post_news_error_message').innerHTML='Please Enter News to Update';
		    document.getElementById('post_news_error_message').style.display='block';
		    return false;
			}
		else if(by=="" || by==" ")
			{
		    document.getElementById('post_news_error_message').innerHTML='Please Check Updated By Field';
		    document.getElementById('post_news_error_message').style.display='block';
		    return false;
			}
			
			return true;
		   
	}
	
function addattachment(){
	var bn=document.getElementById("addfiles").name;
	
	
	var n=(bn.length==5)?bn[4]:(bn[4]*10)+(bn[5]*1);
	if(n<10){
		document.getElementById("post_file_field").innerHTML+="<input name='ipfile"+n+"' id='f"+n+"' type='file' value='' /><a class=fremove id='fc"+n+"' 			onclick=removeattachment('f"+n+"','fc"+n+"','fcb"+n+"')><img src='assets/img/icons/cross.png'></img></a><br id='fcb"+n+"' />";
		++n;
		document.getElementById("addfiles").name="file"+n;
		document.getElementById("no_files").value=n;
		}
	else{
			alert("you can't add more than"+n);	
		}
		
	}
function removeattachment(x,y,z){
	document.getElementById(x).removeAttribute("type");
	document.getElementById(x).removeAttribute("value");
	document.getElementById(x).style.display="none";
	document.getElementById(y).style.display="none";
	document.getElementById(z).style.display="none";

	
	}

function show_news(news_time){
	$("#news_show_div1").show(10);
	$("#news_show_div").fadeIn(700);
	$("#news_show_div").html(document.getElementById(news_time).value);
	
	}
function hide_news(){
	$("#news_show_div1").hide(100);
	$("#news_show_div").hide(100);
	
	}

function load_posted_queries(){
	$.post("postedqueries.php",function(data){
		$("#middle_div").html(data);
	});
	
	}






$('#register_black').keyup(function(e){
	var regst = document.getElementById('register_black').style.display;
	if(regst!='none')
	{
		if(e.keyCode==27)
		{
		$('#register_black').fadeOut();
		}
	}
	
});
function robotics_window()
{
	$('#robotics_black').fadeIn();
}
function robotics_close()
{
	$('#robotics_black').fadeOut();
}

$('#robotics_black').keyup(function(e){
	var regst = document.getElementById('robotics_black').style.display;
	if(regst!='none')
	{
		if(e.keyCode==27)
		{
		$('#robotics_black').fadeOut();
		}
	}
	
});
$('#senior_black').keyup(function(e){
	var regt = document.getElementById('senior_black').style.display;
	if(regt!='none')
	{
		if(e.keyCode==27)
		{
		$('#senior_black').fadeOut();
		}
	}
	
});
function senior_close()
{
	$('#senior_black').fadeOut();
}
	
function stud_reg()
{
	$('#register_black').fadeIn();
	$.post("user_register.php",function(data){
		$("#register_form").html(data);
	});
}
 $('#robotics_black').ready(function(){
        $(window).scroll(function(){
            var scrollTop = 99;
            if($(window).scrollTop() >= scrollTop){
                $('#welcome').css({
					'position':'fixed',
					'top':'0px',
					'box-shadow':'0px 0px 10px #000',
					'-moz-box-shadow':'0px 0px 5px #000',
					'-webkit-box-shadow':'0px 0px 5px #000'
                });
            }
            if($(window).scrollTop() < scrollTop){
                $('#welcome').removeAttr('style');
            }
        });
    })

function load_security()
{
	id=$('#us_id').val();
	if(id.length==7)
	{
	post_data = {'us_id':id,'act':'load'};
	$.post('forgot_pass.php', post_data, function(data) {
		$('#us_qu').html(data)
	});
	}
}
function forgot_password()
{
	id=$('#us_id').val();
	que=document.getElementById('us_qu').innerHTML;
	ans=$('#us_ans').val();
	pass=$('#us_pass').val();
	post_data = {'us_id':id,'us_qu':que,'us_ans':ans,'us_pass':pass,'act':'action'};
	$.post('forgot_pass.php', post_data, function(data) {
		$('#forgot').html(data)
	});
	
}



function search_this_key()
{
	key=document.getElementById('search_key').value;
	$.post("news_all.php?key="+key,function(data)
			{
				$("#innercontent").html(data);
	});
}
$(document).ready(function(){
  $(".login_search").keydown(function(event){ 
    if(event.which==13)
    {
		key=document.getElementById('search_input').value;
		$.post("news_all.php?key="+key,function(data)
			{
				$("#content").html("<div style='margin-top:10%;'><h5 style='margin-left:35%;text-decoration:underline;'>Search Results</h5>"+data+"</div>");
		});
	}
  });
});
function show_forgot_div()
{
	$('#register_black').fadeIn();
	$.post("user_register.php?forg=1",function(data){
		$("#register_form").html(data);
	});	
}

function load_url1(name)
{
	$.post(name+".php",function(data){
		$("#slides").html(data);
	});	
}

function load_url13(nav,val)
{
	if(nav=="next")
	{

		$.post("senior_suggest.php?nav="+nav+"&key1="+val,function(data){
			$("#content").html(data);
		});	
	}
	else
	{
		$.post("senior_suggest.php?nav="+nav+"&key1="+val,function(data){
			$("#content").html(data);
		});	
	}
}

     function show(id)
     {
        //document.getElementById(id).style.display='block'; 
         $("#"+id).slideToggle();
     }

function fname_post(){
  //aid=$("#idno").val();
  if($("#ftitle").val()==""){alert("Title field is mandatory.");}
else{
  arr={festname:$("#ftitle").val(),des:$("#destitle").val()}
  $.post("festname.php",arr,function(data){
    $("#fname_post").html(data);
   });
 }}


values="";
function go(va)
	{
	vall=$("#"+va).val();
	values+=vall;
	values+=" ";
	
	}
function validate_this()
{
var k=$('input[name="sdcacbwork"]:checked').val();
var sop=$("#sop").val();
var fgoal=$("#fgoal").val();




str="";
if(sop==false || fgoal==false)
	{
	alert("Fill Required Fields");
	return false;
	}
else
	{
	var eca=$("#eca").val();
	str+="?sdwork="+k;
	str+="&sop="+sop;
	str+="&fgoal="+fgoal;
	str+="&worked="+values;
	str+="&eca="+eca;
	$.post("sop_confirm.php"+str,function(data){
	$('#ganicontent').hide();
	$('#ganicontent').html(data);
	$('#ganicontent').show(1000);

	});

	
	
	return false;
	}


}

function sop_load()
{
$("#content").html("<center><br><br><br><Br><img src='images/276.GIF'></center>");
$("#content").load("sop_reg.php");
}

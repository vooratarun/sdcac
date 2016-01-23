$(document).ready(function(){
$("#search_form").keyup(function(event)
{	
	key=$("#search_form").val();
	if(event.keyCode==13){
	$.post("search.php?key="+key,function(data){
		$("#main").html(data);									  
	});	
	if(key=="")
	{
		$.post("view_all.php",function(data){
				$("#main").html(data);					   
		});	
	}
	}
});
});
function discuss_login()
{
	u=$("#user_id").val();	
	p=$("#password").val();
	data={"un":u,"pas":p};
	$.post("chk_login.php",data,function(x){
		$('#admin_login_error').html(x);
	});
}
function load_option(nam,li,cl)
		{
			ar=['pencil','pencil','th-list','search','user','question-sign','info-sign'];
			for(i=1;i<=7;i++)
			{
			$("#l"+i).removeClass();
			$('#'+ar[i]).removeClass();
			$('#'+ar[i]).addClass("icon-"+ar[i]);
			}
			$('#'+cl).addClass("icon-"+cl+" icon-white");
			$("#"+li).addClass("active");
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
			xmlhttp.open("GET",nam+".php",true);
			xmlhttp.send();
		}
function load_ans(q_no)
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
				document.getElementById("ans_div_"+q_no).innerHTML="<div style='min-height:500px;'><img src='../images/276.GIF' style='margin-left:20%;margin-top:20%;' /></div>";
			}
			else if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("ans_div_"+q_no).innerHTML=xmlhttp.responseText;
			}
			else if(xmlhttp.status==404)
			{
				document.getElementById("ans_div_"+q_no).innerHTML="Page Under Construction";
			}
			}
			xmlhttp.open("GET","show_ans.php?qn="+q_no,true);
			xmlhttp.send();

	
	
}

function send_ans(q_no){
	
	ans=document.getElementById("ansfor_"+q_no).value;
	if(ans=="")
	{
		alert("Please write something");
		return 0;
	}
	post_dat={'qn':q_no,'ans':ans};
	$.post("giv_answer.php",post_dat,function(data){
		$("#num_ans_"+q_no).html(data);
	});

}
function start_new1()
{	
	subj=$('#mess').val();
	con=$('#cont').val();
	
	if(subj=="" || con=="")
	{		
		$("#result").html('<span style="color:red;">Please fill out all the fields<span><button class="close" onclick="$(\'#result\').hide();">&times;</button>');
		document.getElementById("result").style.display="block";
		return 0;
	}
	document.getElementById('mess').value="";
	document.getElementById('cont').value="";
	post_data = {'subject':subj, 'content':con};
	$.post('discuss.php', post_data, function(data) {
		$('#result').html(data+'<button class="close" onclick="$(\'#result\').hide();">&times;</button>');
		document.getElementById("result").style.display="block";
	});
}
function confirmation(what,qn,ac,cc)
{
	tim=1;
	if(what=="a")
	{
	tim=document.getElementById('tim'+qn+''+cc).innerHTML;
	cat=document.getElementById('cat'+qn).innerHTML;
	}
	else
		cat=document.getElementById('cat'+cc).innerHTML;
	post_dat={'what':what,'qno':qn,'action':ac,'tim':tim,'cat':cat};
	$.post("confirm.php",post_dat,function(data){
		$('#'+what+'c'+qn+''+cc).html(data);
	});
}
function load_answers()
{
$.post("load_answers.php",function(data){
		$(".discussion_holder").html(data);
	});


}
function load_all()
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
			xmlhttp.open("GET","view_all.php?nop=1",true);
			xmlhttp.send();
}



function post_a_problem()
	{
		
			id=document.getElementById('id1').innerHTML;
			nam=document.getElementById('user1').innerHTML;
			cls="";
			brnch=document.getElementById('branch').innerHTML;
			que=document.getElementById('que').value;
			if(que!=''){
			post_data = {'id':id,'user':nam,'class':cls,'branch':brnch,'quer':que};
			$.post("problem_post.php",post_data,function(data)
			{
				$("#alert1").html(data);
			});}
			else {
				$('#alert1').removeClass();
				$('#alert1').addClass('alert alert-error')
				document.getElementById('alert1').innerHTML="Please Enter Your Problem";
				}
	}
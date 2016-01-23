<?php
session_start();
include "config_db25788.php";
if(isset($_SESSION['admin_id']) || isset($_SESSION['admin_id1']))
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="styles.css" />
<script type="text/javascript" src="js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="js/jquery-ui-1.10.1.custom.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.1.custom.min.js"></script>
<script type="text/javascript" src="js/college.js"></script>

</head>

<body>
<div style='width:20%;position:fixed;top:10%;right:2%;'>

              <div id="stu_ids" style='background-color:white;color:gray;margin-top:75px;margin-left:-40px;font-family:inherit;font-size:12px;line-height:25px;padding-left:10px'></div>
    <div style='background-color:white;width:100%;margin-top:40%;font-size:11px;-webkit-border-radius:2px;-moz-border-radius:2px;border-radius:2px;' class='content'> </div>
</div>

<center><div id="status" style="position:fixed;left:10px;top:400px;color:white;border:1px solid white;height:24px; width:200px;padding-top:3px;font-size:16px;background-color:gray;display:none;"></div></center>
<h4 >Posted Queries</h4>
<div id="main" style="height:auto;margin-top:5%;">
    <ul id="holder" style="height:auto;">
		
    <?php
$q=mysql_query("select * from posted_queries order by timestamp desc") or die(mysql_error());
$n=0;
while($r=mysql_fetch_array($q)){
if($r['response']==""){
$mg="<center><div style=\'text-align:left;margin-left:120px;height:auto;\'><br/><br/><table><tr><td style=\'text-align:right\'>Name:</td><td>&nbsp;&nbsp;&nbsp;".$r['name']."</td><tr><td style=\'text-align:right\'>Id: </td><td>&nbsp;&nbsp;&nbsp;".$r['id']."</td><tr><td style=\'text-align:right\'>Branch:</td><td>&nbsp;&nbsp;&nbsp;".$r['branch']."</td><tr><td style=\'text-align:right\'>Class:</td><td>&nbsp;&nbsp;&nbsp;".$r['class']."</td></tr></table></div></center>";
$t=$r['query'];
$time=$r['timestamp'];
$id = $r['id'];
$date = $r['query_date'];
echo "<li id='query_resp_txt_$n'><span style='color:gray;font-weight:bold;color:black;float:left;'>Posted By : $id </span>
<span style='color:gray;font-weight:bold;float:right;color:black;'>Posted On : $date</span>
	<div><p style='margin:10px 10px 10px 10px;'><br/>".$t."<br/></p><br/>
	<span tyle='color:gray;font-weight:bold;color:black;float:left;cursor:pointer;'><a onclick=\"skip_resp('resp_txt_$n','$time','$id')\">Skip</a></span><span style='color:gray;font-weight:bold;color:black;float:right;cursor:pointer;'><a onclick='show_resp(\"resp_$n\")'>Respond</a></span><br/><br/></div><div id='resp_$n' style='display:none;'><textarea style='width:100%;' class='resp_txt' name='response' id='resp_txt_$n'></textarea><input type='button' value='Send' onclick=\"send_resp('resp_txt_$n','$time','$id')\" /></div></li>";
$n++;
}
}
?>
    
    </ul>
</div>
<script type="text/javascript" src="jquery-1.4.2.min.js"></script>

<script type="text/javascript" src="script.js"></script>
<?php
$username=$_SESSION['admin_id'];
if(isset($_POST['chnpwd']))
{
$r=mysql_fetch_array(mysql_query("select * from admin where Username='$username'"));
if($r['Password']==$_POST['cpwd'])
{
	mysql_query("update admin set Password='$_POST[npwd]' where Username='$username'");?>
	<script>alert('Password updated successfully\nPlease login with new password now\nLoggin out...!');window.location='logout.php';</script><?php
}
else
{
	?><script>alert('Wrong Password entered\n Logging out....');window.location='logout.php'</script><?php
}
}
?>
<script type="text/javascript">
xmlHttp="sd";
function search_box(a)
{
	$(".content").slideDown();
	document.getElementById("search_input").value=a;
	document.getElementById("stu_ids").style.display="none";
	$.post("give_stu_data.php?sid="+a,function(data)
		{
			$(".content").html(data);
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

function show_resp(x)
{
$("#"+x).slideToggle();
}
</script>
</body>
<?php
}
else
{
header("Location:index.php");
}
?>
</html>
















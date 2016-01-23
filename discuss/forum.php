<?php
session_start();
if(!isset($_SESSION['login_id']))
{
	die("<br/><h1>Access Forbidden</h1>");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<?php
if(isset($_SESSION["login_id"]))
{
$id=$_SESSION["login_id"];

?>

<body>
<script type="text/javascript" src="functions.js"></script>
 <br/><br/>
<div id="result" class="alert" style="display:none;width:40%;margin-left:24%;">
</div>
 <br/>
<table style="width:50%" align=center id="new_table">
	<th colspan="2" style="text-decoration:underline;">Start New Discussion<br/><br/></th>
	<tr><td>ID</td><td><?php echo $id; ?><br/></td></tr>
	<tr><td>Subject</td><td><br/><input type="text" class="input-small" style="width:300px;height:30px;" id="mess"><br/><br/></td></tr>
	<tr><td valign="top">Content</td><td><textarea id="cont" style="height:200px;width:300px;"></textarea></td></tr>
	<tr><td></td><td><br/><button class="btn btn-primary" onclick="start_new1()"><i class="icon-thumbs-up icon-white"></i> send</button><br/></td></tr>
</table><br/><br/>
 </body> 
<?php
}
else
{
	echo "<br/><h1>Access Forbidden</h1>";
}
?>
</html>

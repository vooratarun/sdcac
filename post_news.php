<?php
session_start();
if(isset($_SESSION["admin_id"]))
	{
	include "config_db25788.php";
	$dat=date("Y-m-d");
	if(isset($_REQUEST["post_newss"]))
	{
	$state=$_POST["update"];
	}
	else{
	$state="abc";
	}
	
	if($state=="send")
	{
		$sub=addslashes($_POST["subject"]);
		$news=addslashes($_POST["news"]);
		$postedby=addslashes($_POST["user"]);
		$postedto=addslashes($_POST["tosend"]);
		$qno=$_POST["qno"];
		$n=(int)$_POST["no_files"];
		$file_paths="";
		for($i=0;$i<$n;$i++)
		{	
			if(isset($_FILES["ipfile".$i])){
				if(move_uploaded_file($_FILES["ipfile".$i]["tmp_name"],"news_uploads/" . $_FILES["ipfile".$i]["name"]))
				{	
					if($file_paths!=""){$file_paths.=",";}
					$file_paths.=$_FILES["ipfile".$i]["name"];
				}
				else{echo "not sent";}
				}
		}
		if($file_paths=="")
			$file_paths="nofiles";
		if($qno==0)
		{
			$q1=mysql_query("select max(query_no) from sdcac_updates");
			$n1=mysql_fetch_array($q1);
			$n1=$n1[0]+1;
			$nn=mysql_query("insert into sdcac_updates values('$n1','$sub','$news','$postedby','$postedto',CURRENT_TIMESTAMP,'$dat','$file_paths',1)") or die(mysql_error());
			if($nn)
			{
				echo "<h3 style='color:#993300'>update sent successfully...........</h3>";
	//			echo "<script type='text/javascript'>window.location='./admin_login.php';</script>";
			}
			
			else{
				echo "<h3 style='color:#993300'>Failed to post news...........</h3>";
			}
		}
		else
		{
			mysql_query("update sdcac_updates set news_subject='$sub',news_details='$news',news_by='$postedby',news_to='$postedto',news_timestamp=CURRENT_TIMESTAMP,news_date='$dat' where query_no=$qno") or die(mysql_error());
			echo "<h3 style='color:#993300'>News updates successfully...........</h3>";
			echo "<script type='text/javascript'>window.location='./admin_login.php';</script>";
		}
	}
	else{


?>

<style type='text/css'>
	.post_input
	{
		width:40%;
		height:31px;
		border:1px dashed #A0A0A0;
		font-family:Serif;color:#003333;
		font-size:15px;
		margin-left:10px;
	}

	.post_input:focus
	{
		border:1px solid #0099FF;
	}
	.post_news_main_div
	{
		background-color:;
		height:500px;
		width:100%;
		margin-left:auto;margin-right:auto;
		margin-top:0px;
		background:#fff;;
		font-size:1em;
		
	}

      .post_news_main_div input[type=file]
         {
            border:0px;
            height:30px;
            width:200px;

          }
	.post_news_heading
	{
		background:#E2E2C5;
		color:#000;
		font-size:20px;
		text-align:center;
		font-weight:normal;
		height:8%;
	}
	.col1
	{
		width:15%;text-align:center;color:#CC3300;font-size:14px;font-weight:bold;
	}
	.col2
	{
		color:#000033;font-size:14px;font-weight:bold;
		
	}
	.post_submit
	{
		border: 1px solid rgb(58, 58, 58);
		color: rgb(255, 255, 255);
		text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.25);
		background-color: rgb(54, 54, 54);
		background-image: linear-gradient(to bottom, rgb(98, 68, 68), rgb(94, 34, 34));
		background-repeat: repeat-x;
		border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
		border-radius:2px;
		font-weight:bold;
		height:30px;
		cursor:pointer;
	}
.add_file
	{
		border: 1px solid green;
		font-size:0.9em;
		color: rgb(255, 255, 255);
		text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.25);
		background-color: rgb(250, 167, 50);
		background-image: linear-gradient(to bottom, rgb(51, 180, 80), rgb(48, 148, 6));
		background-repeat: repeat-x;
		border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
		border-radius:2px;
		font-weight:bold;
		height:30px;
		cursor:pointer;
	}

	.post_news_textarea
	{
		width:600px;
		margin-top:6px;
		padding-top:2%;
		padding-left:2%; 
		min-height:100px;
		border:1px solid #A0A0A0;
		border-radius:1px;
	}
	.post_news_textarea:focus
	{
	border:1px solid #0099FF;
	}
	.post_news_error_message
	{
		color:#FF0000;font-weight:bold;margin-left:20%;font-size:17px;display:none;margin-top:0%;
	}
#main_post{
margin-left:10%;
margin-top:3%;
display:none;
}
.fremove{
cursor:pointer;
}
#post_file_field
{
	-moz-column-count:3; /* Firefox */
	-webkit-column-count:3; /* Safari and Chrome */
	column-count:3;

	-moz-column-gap:40px; /* Firefox */
	-webkit-column-gap:40px; /* Safari and Chrome */
	column-gap:40px;
}
</style>
<div class='post_news_main_div' id="post_news_div">
	<div class='post_news_heading'><p style='padding:7px;'>Post New Notice<img src="assets/img/icons/cross.png" style="float:right;cursor:pointer" onclick="hide_news()"></p></div>
<div style="text-align:left;float:right;margin-top:10px;font-weight:normal;padding-right:12px;line-height:20px;color:#999;">
      News id: #no </br>Posted On : <strong><?php echo date("M-d-Y"); ?></strong>
</div>
<form action='post_news.php' method='post' enctype="multipart/form-data" onsubmit="return check_post_news();">
<input name="update" value="send" style="display:none;" /><input name="no_files"  id="no_files" value=0 style="display:none;" />
<input name="qno"  id="nqno" value=0 style="display:none;" />
<div style="margin-top:7%;margin-left:5%;">
<table style="width:100%">
	<tr>
		<td>Subject  </td>
		<td >:<input type="text" id='subject' name="subject" placeholder='Write Subject' value="" class='post_input'/></td>
	</tr>

	<tr>
		<td colspan="2">News  </td>
	</tr>
	<tr>
		<td colspan="2"><textarea  class='post_news_textarea' name="news" id='news' value=""></textarea></td>
	</tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr>
		<td></td><td style="text-align:center">SD/-</td>
	</tr>
	<tr>
	<td colspan="2">To :
	<input type='radio' name='tosend' id='tosend' value='or' /> Only to Organizers &nbsp;&nbsp; 
	<input type='radio' name='tosend' id='tosend' value='all' checked='true'/> For all  
	<input type="text" name="user" id='user'  value="SDCAC" class='post_input' style="width:auto;margin-left:25%;" /></td>
	</tr>
	<tr><td ></td>
	<td   >
	<span class='post_news_error_message' id='post_news_error_message'> Error !</span>
	</td></tr>
	</table>
	</form>
		<input type="button" value="Add an attachment" class="add_file" id="addfiles" name="file0" onclick="addattachment()" />
		<input type="submit" class='post_submit' value="Post News" name="post_newss" />
		
	<div id="post_file_field" style="margin-top:5px;height:150px;overflow:auto;"></div>

</div>


	<?php
	if(isset($_GET['subjj']))
	{
		$suub=addslashes($_GET['subjj']);
		$nnew=addslashes($_GET['nnews']);
		$newqno=addslashes($_GET['nqno']);
		echo <<<s
		<script type="text/javascript">
			document.getElementById('subject').value='$suub';
			document.getElementById('news').value='$nnew';
			document.getElementById('nqno').value='$newqno';
		</script>
s;
	}
	
}}

else{

		echo "<script type='text/javascript'>window.location='./';</script>";


}



?>


<style type='text/css'>
.notices:hover
{
background:#FBFBFB;
border-radius:5px;
}
.news_blocks{
width:95%;
line-height:30px;margin-top:6px;color:#000000;-moz-box-shadow:1px 0px 1px 1px #E5E5E5;box-shadow:1px 0px 1px 1px #E5E5E5;-webkit-box-shadow:1px 0px 1px 1px #E5E5E5;border-radius:2px;-moz-border-radius:2px;-webkit-border-radius:2px;padding-top:3px;padding-left:7px;
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
</style>
<center>
<?php
include "config_db25788.php";
$dt=date("Y-m-d");
$q=mysql_query("select * from sdcac_updates where news_to='all' and display=1 order by query_no desc ") or die(mysql_error());
$c=0;
echo "<div style='width:100%;padding-top:0%;'>";
while($r=mysql_fetch_array($q))
	{
		$c++;
		if($c>7) die("<sub style='margin-top:10px;float:right;font-siz:10px;cursor:pointer;color:red;text-decoration:underline' onclick=load_url('news_all')>Old notices....</sub>");
		
		$files="<br /><br />";
		$fl=$r["files"];
		$d1=$r["news_date"];
		if($r["files"]!="nofiles")
			{
				$ft=strtok($fl,",");
				while($ft!=false)
				{
				$files.="<a href='news_uploads/".$ft."' target=_blank style='font-size:20px;text-decoration:underline;color:#787878;'><img src='images/index4.jpg' style='width:30px;height:30px;' /> ".$ft."</a><br />";
				$ft=strtok(",");				
				}
			}
	echo "<textarea style='display:none;' id='".$r['news_timestamp']."'>
			<div style='background-color:#E2E2C5;height:10%;width:100%;margin-top:0%;color:white;'>
				<a onclick='hide_news()' style='float:right;margin-right:0%;cursor:pointer;height:30px;width:30px;text-align:center;'><img src='assets/img/icons/cross.png'></img></a>
				<h3 style='text-align:center;padding-top:10px;color:black'>Notice</h3>
				<br /></div>
<div style='text-align:left;float:right;margin-top:10px;font-weight:normal;padding-right:12px;line-height:20px;color:#999;' >News id: ".$r['query_no']."<br />Posted on : <b><i>".$r['news_timestamp']."</i></b> .</div>
			<div style='padding-top:2%; padding-left:5%; padding-right:4%;height:73%;font-weight:100;'><br /><div style='line-height:70px;' >Subject : &nbsp; <b>".$r['news_subject']."</b></div>
			<div style='width:95%;margin-top:6px;height:auto;padding-top:2%;padding-left:2%; min-height:40%;-moz-box-shadow:1px 0px 1px 2px #DDDDDD;box-shadow:1px 0px 1px 2px #DDDDDD;-webkit-box-shadow:1px 0px 1px 2px #DDDDDD;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;line-height:23px;'>".$r['news_details']."<br />".$files."
			<div style='text-align:right;font-weight:bold; width:90%;padding-bottom:12px;margin-bottom:0px;'>SD/-&nbsp; <br /><font style='font-size:18px;color:green'>".$r["news_by"]."</font></div></div></div>
			</textarea>
			
			<div class='notices' style='text-align:left;text-overflow:ellipsis; white-space:nowrap;width:81%; overflow:hidden;cursor:pointer;float:left;padding-left:15px;height:40px;' onclick=\"javascript:show_news('".$r['news_timestamp']."')\">".$r['news_subject']."</div>";
	if($dt==$d1)
		{
			echo "<div style='float:right;'><span class='new_class'><blink>New</blink></span></div>";
		}
		echo "<br />";
		
	}
	echo "</div>";
	
?>


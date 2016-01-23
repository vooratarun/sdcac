<?php
include 'config_db25788.php';
$query3=mysql_query("select * from sdcac_updates where display=1 order by news_timestamp desc") or die(mysql_error());
	if(isset($_GET['key']))
	{
		$ke=htmlentities(addslashes($_GET['key']));
		$query3=mysql_query("select * from sdcac_updates where (news_subject like '%$ke%' or news_date='$ke' or query_no='$ke') and news_to='all' ")or die(mysql_error());
		echo '<div id="show_admin_posts_div1" >';
	}
	else
	{
		echo '<div ><input type="text" id="search_key" class="search_note" placeholder="Enter Any Keyword in ID/ subject/ Date(Y-m-d)">&nbsp;<input type="submit" value="Search" class="search_but" onclick="search_this_key()"></div>';
		echo '<div id="show_admin_posts_div1" style="display:block;margin-left:10%;margin-top:2%;width:80%;height:auto;overflow:auto"  id="middle_div">';
	}
	
?>
<style type="text/css">
.notice_tb{
	width:90%;
	border:0px solid;
	border-collapSe:collapse;
	}
.notice_tb td{
	padding-left:0.5%;
	padding-right:auto;
	}
.notice_tb th{
background-color:#E9E9D1;
	}
.notice_even
{
	background-color:#FFFFFF;
}
.notice_odd
{
	background-color:#F9F9F9;
}
.notice_tb td, .notice_tb th{
border-width:1px 1px medium;
border-style:solid solid none;
border-color:#cccccc;
padding-top:10px;
padding-bottom:10px;
}
input[type=checkbox]{
opacity:0.5;
}


	.search_note
	{
		width:40%;
		margin-top:7%;
		margin-left:14%;
		height:30px;
		border:1px solid rgb(51, 153, 255);
		letter-spacing:0.07em;
		word-spacing:0.25em;
		padding-left:10px;
	}
	.search_note:focus
	{
		box-shadow: 0px 0px 3px rgb(51, 153, 255);
	}
	.search_but
	{
		height:30px;
		width:100px;
		border:1px solid blue;
		background:rgb(0, 140, 196);
		color:#fff;
		font-weight:bold;
	}
</style>
	
	
	<!-- nano divisions scroll divisions start -->
	
	<div  id="innercontent">
  <sub style="color:gray">Click on the subject to view notice</sub>
	<table class="notice_tb">
		<tr >
		<th style="width:15%;text-align:center">News ID</th>
		<th style="width:50%;text-align:center">News Subject </th>
		<th style="width:35%;text-align:center">Time Posted</th>
	</tr>
	     

		<?php
		$as=Array("notice_even","notice_odd");
		$coun=0;
		while($data3=mysql_fetch_array($query3))
		{
                  $files="<br /><br />";
		$fl=$data3["files"];
		$d1=$data3["news_date"];
		if($data3["files"]!="nofiles")
			{
				$ft=strtok($fl,",");
				while($ft!=false)
				{
				$files.="<a href='news_uploads/".$ft."' target=_blank style='font-size:20px;text-decoration:underline;color:#787878;'><img src='images/index4.jpg' style='width:30px;height:30px;' /> ".$ft."</a><br />";
				$ft=strtok(",");				
				}
			}
			
			?>
		<tr id="ntr<?php echo $data3['query_no'];?>"  class="<?php echo $as[($coun++)%2]; ?>">
		<td style="text-align:center"><?php echo $data3['query_no'];?>.</td>		
		<td title="click to view nitice" id="s<?php echo $data3['query_no'];?>" style="cursor:pointer;padding-left:15px;" onclick="show_news('<?php echo $data3['news_timestamp'];?>')" ><?php echo $data3['news_subject'];  ?></td>
		<td style="text-align:center"><?php echo $data3['news_timestamp']; ?></td>
		</tr>  
		<tr>
	 <td colspan="4" style="padding-top:0px; display:none;" ></td> 
	</tr>
		<tr style="border-bottom:1px solid gray;">
	 <td colspan="5" style="padding-top:0px; background-color:#0; display:none;"><?php echo "<textarea style='display:no;' id='".$data3['news_timestamp']."'>
			<div style='background-color:#E2E2C5;height:10%;width:100%;margin-top:0%;color:white;'>
				<a onclick='hide_news()' style='float:right;margin-right:0%;cursor:pointer;height:30px;width:30px;text-align:center;'><img src='assets/img/icons/cross.png'></img></a>
				<h3 style='text-align:center;padding-top:10px;color:black'>Notice</h3>
				<br /></div>
<div style='text-align:left;float:right;margin-top:10px;font-weight:normal;padding-right:12px;line-height:20px;color:#999;' >News id: ".$data3['query_no']."<br />Posted on : <b><i>".$data3['news_timestamp']."</i></b> .</div>
			<div style='padding-top:2%; padding-left:5%; padding-right:4%;height:73%;font-weight:100;'><br /><div style='line-height:70px;' >Subject : &nbsp; <b>".$data3['news_subject']."</b></div>
			<div style='width:95%;margin-top:6px;height:auto;padding-top:2%;padding-left:2%; min-height:40%;-moz-box-shadow:1px 0px 1px 2px #DDDDDD;box-shadow:1px 0px 1px 2px #DDDDDD;-webkit-box-shadow:1px 0px 1px 2px #DDDDDD;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;line-height:23px;'>".$data3['news_details']."<br />".$files."
			<div style='text-align:right;font-weight:bold; width:90%;padding-bottom:12px;margin-bottom:0px;'>SD/-&nbsp; <br /><font style='font-size:18px;color:green'>".$data3["news_by"]."</font></div></div></div>
			</textarea>"; ?></td> 
	</tr> 
	
	<?php } ?>
	</table>
	</br>
	</div>
	<script type="text/javascript" src="jquery.js"></script>


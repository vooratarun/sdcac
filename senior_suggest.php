<?php
session_start();
?>
 <div style='margin-left:auto;margin-right:auto;font-size:0.99em;margin-top:30px;line-height:40px;'>
      <div style='width:500px;margin-left:20%;margin-top:15%;font-size:1.2em;'>
      
You have been an integral part facing the odds and gaining glory for RGUKT from its very first day. Your experience means a lot to us. Help us improve and we would be very happy hearing from you.


<?php

	if(isset($_SESSION['sdcac_senior']))
	{
		 echo "<b></br>To give your Suggestions :</b> <a href='login.php' style='text-decoration:underline;color:blue;'>Click Here </a><span id='messag' style='color:red;font-weight:bold;'></span>";
	}
	else
		{
		   echo "<b></br>To Give your Suggestions :</b> <a onclick='$(\"#messag\").fadeIn(),$(\"#user_id\").focus()' style='text-decoration:underline;color:blue;'>Click Here</a><span id='messag' style='color:red;font-weight:bold;display:none;'>Please Login</span>";
		}


?>
      </div>
</div>

<style type='text/css'>
  	.broom_heading
	{
		color:#CC3300;
		font-weight:bold;
		height:30px;
		font-size:1.1em;
		text-align:center;
		border-bottom:1px solid #B8B8B8 ;
	}
	table.broom_table td {
	vertical-align:middle;
	text-align:center;
    padding: 20px 10px 0px 20px;}
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
.notice_tb td, .notice_tb th{
border-width:1px 1px medium;
border-style:solid solid none;
border-color:#cccccc;
padding-top:10px;
padding-bottom:10px;
text-align:center;
	border-bottom:1px solid #cccccc;
}
.notice_tb tr:hover
{
	cursor:auto;
	background:#FFFFDD;
}
	.odd
	{
		background:#fff;
	}
	.even
	{
		background:#F9F9F9;

	}
</style>

<?php 
if(false)
{
	?>
	<div style='margin-top:40px;margin-left:150px;color:black;font-size:1.2em;font-weight:bold;text-align:center;width:60%;'>Suggestions Till Now</div>
	<?php
     $min=0;$max=0;
      include "config_db25788.php";
	if(!isset($_GET['key1'])){
	      $q=mysql_query("select * from senior_posts order by query_no desc") or die(mysql_error());}
	
	else
	{
			$key=$_GET['key1'];
			$n=$_GET['nav'];
			if($n=="next")
				$q=mysql_query("select * from senior_posts where query_no<$key order by query_no desc") or die(mysql_error());
			else if($n=="prev")
				$q=mysql_query("select * from senior_posts where query_no>$key order by query_no desc") or die(mysql_error());
			
	}

      $count =0;$min=0;
      while($row=mysql_fetch_array($q))
      { 
	  	echo $row['query_no']."</br>";
	    if($count==0){
			$max = $row['query_no'];}
        $count++;
        if($count<=3)
        {
			$min=$row['query_no'];
           echo "<div style='min-height:120px;border:1px solid #E6E6FA;margin-top:30px;width:750px;background:#F8F8FF;margin-left:100px;border-radius:3px;'>
               <div style='height:25px;'><span style='color:#008B8B;float:left;margin-left:20px;'><span style='font-weight:bold;'>Posted By</span>: $row[1]</span><span style='color:#008B8B;float:right;margin-right:20px;'><span style='font-weight:bold;'>Posted On :</span> $row[4]</span></div>
               <p style='margin-top:10px;text-align:center;'>$row[2]</p>
           </div>";
        }
      }
		
		
		echo $min."|".$max;

        
?>
		    <div style='font-size:1.1em;color:#FF8C00;margin-left:100px;width:750px;height:50px;margin-top:20px;'>
                 <a style='cursor:pointer;float:left;font-weight:bold;margin-left:20px;'  onclick='load_url13("prev",<?php echo $max; ?>)'><< Prev</a>
                 <span><input type='text' style='display:none' id='inp_min' ><input type='text' style='display:none' id='inp_max' ></span>
                 <a style='cursor:pointer;float:right;font-weight:bold;margin-right:20px;' onclick='load_url13("next",<?php echo $min; ?>)'>Next >></a>
            </div>

<?php
}
?>

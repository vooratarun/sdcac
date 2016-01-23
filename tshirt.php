<head>
<title>T-Shirts</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script type="text/javascript" src="js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="js/jquery-ui-1.10.1.custom.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.1.custom.min.js"></script>
<script type="text/javascript" src="js/college.js"></script>
<script type="text/javascript">
function validate(){

	var id=document.getElementById("id_no").value;
	var full=document.getElementById("fullsleeve").value;
	var roundneck=document.getElementById("roundneck").value;
	var full_chek=document.getElementById("full_sleeve").value;
	var round_check=document.getElementById("round_neck").value;
	var full_quan=document.getElementById("full_quan").value;
	var round_quan=document.getElementById("round_quan").value;
	var full_size=document.getElementById("full_size").value;
	var round_size=document.getElementById("round_size").value;
	var modal=document.getElementById("modal").value;
	var color_r=document.getElementById("round_color").value;
	var color_f=document.getElementById("sweat_color").value;
	var request=id+"&";
	if(id=="" || id.length<7){
		document.getElementById("error_status").innerHTML="Invalid ID has been given";
		return false;
	}
	if(!document.getElementById("full_sleeve").checked && !document.getElementById("round_neck").checked)
	{
		document.getElementById("error_status").innerHTML="Please select atleast one of the Shirts";
		return false;
	}
	if(document.getElementById("full_sleeve").checked && full_quan=="non"){
		document.getElementById("error_status").innerHTML="Please select quantity";
		return false;
	}
	if(document.getElementById("round_neck").checked && round_quan=="non"){
		document.getElementById("error_status").innerHTML="Please select quantity";
		return false;
	}
	document.getElementById("full_sleeve").checked?request+="full=yes&f_size="+full_size+"&f_modal="+modal+"&f_color="+color_f+"&f_q="+full_quan:request+="full=no&f_modal=none&f_color=none&f_size=0&f_q=0&f_color=none";
	document.getElementById("round_neck").checked?request+="&round=yes&r_color="+color_r+"&r_size="+round_size+"&r_q="+round_quan:request+="&round=no&r_size=0&r_q=0&r_color=none";
	$.post("order.php?id="+request,function(data){
		$("#error_status").html(data);
	});
	
 }
function option1(){
		$("#swet_det").slideToggle();
}
function option2(){
	$("#round_det").slideToggle();
}

</script>

</head>
<body>
<br />
<div style="margin-left:auto;margin-right:auto;width:25%;padding-top:7px;background:url(img/head_ribbon.png);color:white;background-repeat:no-repeat;background-position:center;height:50px;border:0px solid green;background-size:100% 100%;text-align:center;"><b>Order For T-Shirts  </b>
</div>
<br/><br/>

<p style="margin-left:13%;margin-right:13%;">
Do you people regret that despite being an RGUKTian, you are not getting enough attraction. Well then, what are you wating for! Grab on to these cool T-Shirts exclusively designed for you by SDCAC  artists which aptly set the trendy look you would have dreamt of.....<br/>
<strong>Guide Lines:</strong><br/>
	Register online in the link given below <br/>
	within 3 days.
	Make the payment as per your choice and quantity to anyone of the organizers mentioned below.
				<br><br>Venkatesh Naidu N090089<br/>
				K. Bhargav N090349<br/>
				P. Veen N091304<br/>
				CH. Pooja Gayathri N090624<br/><br/>
	The receipt given at the time of payment must be preserved and should be showed while receiving the T-Shirts.<br/>
	Please fill in the details appropriately. Items once bought, can not be exchanged or returned back. The T-Shirts will be at the your disposal within 2-3 weeks from the date of order.<br/><br/>
<strong><i>Note:</strong> <br><b>Upon users choice we are going for Navy Blue / Gray color variations ( depends on the number of  quantity ordered ) in sweatshirts ( even pull over i.e., zip pattern design will be included especially for girls )</i></b> 

Regarding Roundneck we are thinking of dark Gray variant and rest of the design is same.

40 Rupees Extra for pull over.
</p><center>

<table border=0>
	<tr><th colspan=2><h3 style="padding-top:12px;background:url(img/head_ribbon2.png);color:white;background-repeat:no-repeat;background-position:center;height:50px;border:0px solid green;background-size:30% 90%;">Select below T-shirts</h3></th></tr>
	<tr><td colspan=2><div id="error_status" style="color:red;"></div></td></tr>
	<tr><td colspan="2"><br/>Enter your ID here&nbsp; &nbsp;<input type="text" id="id_no" maxlength=7 name="id" required ><br/><br/></td></tr>
	<tr><td><img id="fullsleeve" src="img/black_hoodies_full_sleeves.png" style="width:500px;height:300px"></td><td><img  id="roundneck" src="img/bg2.jpg" style="width:500px;height:300px"></td></tr>
	<tr><td><br/>Price for one piece&nbsp; &nbsp;<b>Rs. 550/-</b></td><td><br/>Price for one piece&nbsp; &nbsp;<b>Rs. 230/-</b></td></tr>
	<tr><td><br/>Click here  for above one&nbsp; &nbsp;<input type="checkbox" id="full_sleeve" value="full" name="sweat" onChange="option1(this)" unchecked /></td>
	
	<td><br/>Click here for above one&nbsp; &nbsp;<input type="checkbox" id="round_neck" value="round" name="round" onChange="option2(this)"></td></tr>
	<tr><td valign="center"><div id="swet_det" style="display:none;">
	<br/><select  id="sweat_color"><option>Black</option><option>Navy Blue</option></select>


	<br/><br/>Model:<select id="modal"><option>Regular</option><option>Pull over(zip pattern)</option></select><br/><br/>
	<select id="full_quan" name="full_quan"><option value="non">Select No. of pieces here</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select><br/><br/>
	<img src="img/swet.jpg" style="width:500px;height:300px;"><br/><br/>
	Select size:<select id="full_size" name="size_full"><option>Small</option><option>Medium</option><option>Large</option><option>XL</option><option>XXL</option></select></div>
	</td><td valign="center">
	<div id="round_det" style="display:none;"><br/><br/>
	<select id="round_color"><option>Black</option><option>Gray</option></select><br/><br/>
	<select id="round_quan" name="round_quan"><option value="non">Select No. of pieces here</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select><br/><br/>
	<img src="img/round neck.jpg" style="width:500px;height:300px;"><br/><br/>
	
	
	Select size:<select id="round_size" name="size_round"><option>Small</option><option>Medium</option><option>Large</option><option>XL</option><option>XXL</option></select></div></td></tr>
	<tr><td colspan=2><br/><center><input type="submit" value="submit" name="submit" onClick="validate()"></center></td></tr>
</table>
</center>
</body>







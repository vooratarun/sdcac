<style type="text/css">
.art_id
{
width:200px;
border:1px solid #000000;
border-radius:4px;
height:30px;
padding-top:5px;
}
</style>
<?php
die("Registrations are closed");
if(isset($_POST["id1"])){
$i1=htmlentities(addslashes($_POST["id1"]));
$i2=htmlentities(addslashes($_POST["id2"]));
$i3=htmlentities(addslashes($_POST["id3"]));
$AI=$_POST["ai"];
$team=$i1.$i2.$i3;
include "config_db25788.php";
$c=0;
if($i1!=""){
$dup=mb_substr_count($team,$i1);
if($dup>1)
{
	die("$i1 has been given $dup times");
}
$q1=mysql_query("select * from students where ID='$i1'");
$q1_1=mysql_query("select * from art_ids where ID='$i1' and AI='$AI'");
if(mysql_num_rows($q1)==0)
{die("$i1 is invalid");}
if(mysql_num_rows($q1_1))
{
	die("$i1 is already registered");
}
}
if($i2!=""){
$dup=mb_substr_count($team,$i2);
if($dup>1)
{
	die("$i2 has been given $dup times");
}
$q2=mysql_query("select * from students where ID='$i2'");
$q2_2=mysql_query("select * from art_ids where ID='$i2' and AI='$AI'");
if(mysql_num_rows($q2)==0)
{die("$i2 is invalid");}
if(mysql_num_rows($q2_2))
{
	die("$i2 is already registered");
}
}
if($i3!=""){
$dup=mb_substr_count($team,$i3);
if($dup>1)
{
	die("$i3 has been given $dup times");
}
$q3=mysql_query("select * from students where ID='$i3'");
$q3_3=mysql_query("select * from art_ids where ID='$i3' and AI='$AI'");
if(mysql_num_rows($q3)==0)
{die("$i3 is invalid");}
if(mysql_num_rows($q3_3))
{
	die("$i3 is already registered");
}
}
$q=mysql_fetch_array(mysql_query("select max(team_id) from art_reg"));
$tid=$q[0]+1;
if(mysql_query("INSERT INTO art_reg values($tid,'$i1','$i2','$i3','$AI')"))
{
	mysql_query("insert into art_ids values('$i1','$AI'),('$i2','$AI'),('$i3','$AI')");
	echo "<span style='color:green;'>Successfully enrolled for ART-EVINCE<br/>Your Team Id is <strong>AE_$tid</strong></span>";
}
else
{
die(mysql_error());
}
}
else{
?>
<div style="margin-left:100px;margin-top:100px;" id="art_div">
<h3 style="color: #00CC00;margin-left:80px;">Art Evince '14 Registration</h3>
<div id="state" style="color:red;"></div><br/>
Enter Member 1 ID&emsp;&emsp;
<input type="text" maxlength=7 class="art_id" id="i1" value="" /><br/><br/>
Enter Member 2 ID&emsp;&emsp;
<input type="text"  maxlength=7 class="art_id" id="i2" value="" /><br/><br/>
Enter Member 3 ID&emsp;&emsp;
<input type="text"  maxlength=7 class="art_id" id="i3" value="" /><br/><br/>
Select area of Interest&emsp;&nbsp;
<select id="ai" class="art_id">
<option>Painting</option>
<option>Paper Work</option>
<option>Design using Junk material</option>
<option>Other</option>
</select><br/><br/>
<input type="button" style="font-family:Calibri;font-size:20px;font-weight:bold;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;color:blue;background-image:linear-gradient(to bottom, rgb(77, 144, 254), rgb(71, 135, 237));border:none;height:30px;" value="Enroll" name="Enroll" onclick="validate_art()"/>
</div>
<?php
}
?>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
function validate_art(){
	if($("#i1").val()=="" && $("#i2").val()=="" && $("#i3").val()=="")
	{
		$("#state").html("Enter atleast one ID to Enroll");
		return false;
	}
	else
	{
		x={"id1":$("#i1").val(),"id2":$("#i2").val(),"id3":$("#i3").val(),"ai":$("#ai").val()};
		$.post("art_reg.php",x,function(data){
				if(data.indexOf("Success")!=-1){
				$("#art_div").html(data);
			}
			else{
			$("#state").html(data);
		}
		});
	}
}
</script>

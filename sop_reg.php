<?php
session_start();
?>
<?php

include "config_db25788.php";
if(isset($_SESSION['login_id']))
{
?>
<style type="text/css" >
.edit_div{
	width:85%;
	height:90%;
	margin-left:auto;
	margin-right:auto;
	margin-top:30px;
	text-align:center;
	background-color:#F8F8F8;
	border:1px solid #D3D3D3;
	
border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	-o-border-radius:4px;
	
	

	}
.profile_tb{
align:center;
width:95%;
margin-left:2%;
height:90%;
font-weight:;
border-collapse:collapse;

}



.tdd{
border:0px solid #F0F0F0;
height:50px;
font-weight:normal;
color:#993300;
font-size:0.95em;
}
.uids
{
  font-weight:normal;
  color:#191970;
  font-size:0.95em;
}


	
	table input[type=text],input[type=password],textarea
	{
	color:#191970;
    line-height: 1.2em;
    height: 25px;
	width:200px;
    font-family: Helvetica;
    font-weight: normal;
    padding: 3px 3px 3px 5px;
    border:1px solid rgb(204,204,204);
	border-radius:0px;
	-moz-border-radius:0px;
	-webkit-border-radius:4px;
	-o-border-radius:4px;
	font-size:0.95em;
}
	table input[type=text]:focus,input[type=password]:focus
	{
		border:1px solid #0099FF;
		box-shadow: 0px 0px 1px #0099FF;
		-moz-box-shadow:0px 0px 1px #0099FF;
		-webkit-box-shadow:0px 0px 1px #0099FF;
               	-o-box-shadow:0px 0px 1px #0099FF;
		background-color:#FFFFFF;
	}
	table textarea:focus
	{
		border:1px solid #3399FF;
		-moz-box-shadow:inset 0px 0px 1px 0px #3399FF;
		box-shadow:inset 0px 0px 1px 0px #3399FF;
		-webkit-box-shadow:inset 0px 0px 1px 0px #3399FF;
	}
input[type=submit]{
	height:31px;
	color:white;font-size:0.97em;letter-spacing:0.02em;
	font-weight:normal;
	border:0px solid #006666;
	border-radius:1px;
	-moz-border-radius:1px;
	-webkit-border-radius:1px;
	-o-border-radius:1px;
    background:-moz-linear-gradient(bottom,#003333,#006699);
    background:-webkit-linear-gradient(bottom,#003333,#006699);
    background:-o-linear-gradient(bottom,#003333,#006699);


}

#error{
background:#FFFACD;
border:1px solid #F0E68C;
width:200px;height:40px;
line-height:40px;
margin-top:0px;
text-align:center;
width:30%;
color:  	#FF4500;
-moz-border-radius:1px;
border-radius:1px;
-webkit-border-radius:1px;
-o-border-radius:1px;
display:none;
}

#prof_head{
color:#FFFFFF;
line-height:27px;
margin-top:-11px;
margin-left:0px;
height:30px;
width:100%;
border:0px solid;
border-bottom:1px solid #D3D3D3;
background-color: 	#DCDCDC;
height:35px;

}
.change_profile_heading
{
color:#008080;
font-family:Arial;
margin-top: 1%;
letter-spacing: 0.03em;
font-weight: bold;
font-size: 1.1em;
}

sup{
color:#FF6633;
}
.prof_edit_close
{
 float:right; margin-top:0.3%;color: #FF6600;height:25px;width:25px; margin-right:5px; cursor:pointer;
}
.prof_edit_close:hover
{
  color:#FF9900;
}
.profile_edit_fields
{
  color:#003366;
}
</style>

<div class="edit_div" id="ch_prof">
<div id="prof_head">
 <div class='prof_edit_close' onclick="prof_close()"><img src="assets/img/icons/cross_circle.png" /></div>
<h3 class='change_profile_heading'>SOP REGISTRATION</h3><br /></div>
<center><div id="error" ></div></center><br />
<div id="edit_status">



<div id="ganicontent"></div>
<table align="center" class="profile_tb">
<center><b><font color=red>Note:</font></b>&nbsp;All the Below Information is just for Records and Verification Only.</center><br>
<tr><td>
Have you worked for SDCAC. <font color=grey>*</font></td><td><input name="sdcacbwork" type="radio" value="yes" >Yes&nbsp;<input name="sdcacbwork" type="radio"   value="no" checked>No</td></tr>
<tr>
<td>
Have you worked for any organization like CDPC : </td><td>
<input type="checkbox" name="cdpc" value="CDPC" id=cdpc onclick="go('cdpc')">CDPC<br>
<input type="checkbox" name="saac" value="SAAC" id=saac onclick="go('saac')">SAAC<br>
<input type="checkbox" name="hhands" value="HELPING HANDS" id=hhands onclick="go('hhands')">Helping Hands<br></td></tr>
<tr><td>
Statement of Purpose SOP <font color=grey>*</font></td>
<td>
<textarea name="sop" id="sop"> 
</textarea></td></tr>
<tr><td>
Future Goals<font color=grey>*</font></td><td>
<textarea  name="fgoal" id="fgoal">
</textarea></td></tr>
<tr><td>
Any Participations in Extra curricular Activities<br>
<font color=grey>Like:Clubs,Debates,Essay Writing</font></td>
<td>
<textarea name="eca" id="eca">
</textarea></td></tr>

	<tr>
			<td colspan="4"><center><input type="submit" value="Register" style='border-radius:10px;cursor:pointer;' onclick="return validate_this()" id="chprofile" /></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	
	

</table>






</div>

</div>
<?php
}
else
	{
	echo "<center><br><br><Br><br><font color=red><h3>Login to Register SOP</h3></font></center>";
	}
?>



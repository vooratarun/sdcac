<?php
session_start();
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
 <div class='prof_edit_close' onclick="prof_close()"><img src="assets/img/icons/cross.png" /></div>
<h3 class='change_profile_heading'>Edit Personal Information</h3><br /></div>
<center><div id="error" ></div></center><br />
<div id="edit_status">
<?php

include "config_db25788.php";
if(isset($_SESSION['login_id']))
{
$uid=$_SESSION['login_id'];
$q1=mysql_query("select * from sdcac_user_table where user_id='$uid';");
$r=mysql_fetch_array($q1);
?>




<table align="center" class="profile_tb">
	<tr>
			<td class="tdd">User Id<sup>*</sup> </td> <td id="uids" class='uids' >: <?php echo $r['user_id']; ?></div></div></td>
			
			<td class="tdd">Branch<sup>*</sup>  </td><td class='uids'>: <?php echo $r['branch']; ?></td>
			
			
	</tr>
	
	<tr>
			<td class="tdd">Batch<sup>*</sup>  </td><td class='uids'>: <?php echo $r['batch']; ?></td>
			
			
			<td class="tdd">Class<sup>*</sup>  </td><td class='uids'>: <?php echo $r['class']; ?></td>
			
	</tr>
	
	<tr>
			<td class="tdd">User Name<sup>*</sup> </td><td class='profile_edit_fields'>: <input type="text"  id="uname" value="<?php echo $r['user_name']; ?>" /></td>
			<td class="tdd"> Phone number  </td><td class='profile_edit_fields'>: <input type="text" id="phno" maxlength="10" value="<?php echo $r['user_phno']; ?>"  /></td>	
			
	</tr>
	
	<tr>
			<td class="tdd"> Mail Id </td><td class='profile_edit_fields'>: <input type="text"  id="mid" value="<?php echo $r['mail_id']; ?>" /></td>
			<td class="tdd">Security question<sup>*</sup>  </td><td class='profile_edit_fields'>: <input type="text"  id="sq" value="<?php echo $r['user_security']; ?>" /></td>
			
			
	</tr>
	
	<tr>
			<td class="tdd"> New password <sub>[optional]</sub> </td><td class='profile_edit_fields'>: <input type="password" id="pwd"  value="" /></td>
			
			
		<td class="tdd">Answer  </td><td class='profile_edit_fields'>: <input type="password"  id="sqa" value="" /></td>
			
	</tr>
	
	<tr>
			<td class="tdd"> Re-type new password </td><td class='profile_edit_fields'>: <input type="password" id="rpwd"  value="" /></td>
			
	
			<td class="tdd">Current password<sup>*</sup>  </td><td>: <input type="password"  id="cpw" value="" /></td>
	</tr>
	<tr>
			<td colspan="4"><center><input type="submit" value="Save changes" onclick="change_profile()" id="chprofile" style='cursor:pointer;' /></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	
	

</table>


<?php
}
else if(isset($_SESSION["admin_id"]) || isset($_SESSION["admin_id1"])){
	if(isset($_SESSION['admin_id1']))
	  $uid=$_SESSION['admin_id1'];
	else
	 $uid=$_SESSION['admin_id'];
	$q1=mysql_query("select * from sdcac_admin_table where admin_name='$uid';");
	$r=mysql_fetch_array($q1);
	
?>

<table align="center" class="profile_tb">
	<tr>
			<td class="tdd">User Id<sup>*</sup> </td>  <td id="uids">: <?php echo $r['admin_name']; ?></td>
			<td class="tdd">Designation<sup>*</sup> </td>  <td>: <?php echo $r['designation']; ?></td>
	
			
	</tr>
	
	<tr>
			<td class="tdd">User Name<sup>*</sup> </td>  <td>: <input type="text"  id="uname" value="<?php echo $r['name']; ?>" /></td>
			<td class="tdd"> Mail Id </td>  <td>: <input type="text"  id="mid" value="<?php echo $r['admin_mail']; ?>" /></td>
			
	
			
	</tr>
	
	<tr>
			<td class="tdd"> Phone number </td>  <td>: <input type="text" id="phno" maxlength="10" value="<?php echo $r['admin_phone']; ?>"  /></td>
			
			<td class="tdd">Security question<sup>*</sup> </td>  <td>: <input type="text"  id="sq" value="<?php echo $r['admin_security_q']; ?>" /></td>
		
	</tr>
	
	<tr>
<td class="tdd"> New password <sub>[optional]</sub> </td>  <td>: <input type="password" id="pwd"  value="" /></td>
			
	
			
			<td class="tdd">Answer </td>  <td>: <input type="password"  id="sqa" value="" /></td>
	</tr>
	
	<tr>
				<td class="tdd"> Re-type new password</td>  <td>: <input type="password" id="rpwd"  value="" /></td>

			<td class="tdd">Current password<sup>*</sup> </td>  <td>: <input type="password"  id="cpw" value="" /></td>
	</tr>
		<tr>
			<td colspan="4"><center><input type="submit" value="Save changes" onclick="change_profile()" id="chprofile" /></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	
</table>




<?php
			

		}
		
		
else{
echo "<script>window.location='./';</script>";

}

?>
</div>
</div>



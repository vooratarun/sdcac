<?php
if(!isset($_GET['forg']))
{
?>
<script type='text/javascript' src='jquery.js'></script>
<style type='text/css'>
.register
{
	width:100%;
	height:100%;
	background-color:white;
	color:#FF3300;
}
.heading_register
{
	width:97%;
	text-align:center;
	color:#FF3300;
	font-size:1.2em;
	font-weight:bold;
	font-family:Arial;
	float:left;
	height:35px;
	color:#fff;
	line-height:30px;
}
.close_reg
{
	width:2.7%;background-color:;
	float:left;
	text-align:center;
	color:#FFCC00;font-weight:bold;
	height:16px;
	line-height:30px;
}
.close_reg:hover{color:#FF9900;cursor:pointer;}
.register_head
{
	width:100%;
	margin-top:0;
	height:31px;
	background-color:#660000;
}
.register_table
{
	background:;
	margin-left:auto;margin-right:auto;
	margin-top:10px;width:90%;
	height:80%;
}
.reg_input_fields
{
	width:80%;
	height:31px;
	border:1px solid #B0B0B0 ;
	color:#000033;
	font-weight:normal;
}
.reg_input_fields:focus
{
	border:1px solid #990066;
}
.register_input_submit
{
	float:right;margin-right:60px;
	height:32px;width:30%;
	font-size:0.95em;
	font-family:Arial;
	color:#fff;
	border:0px;
	background:-moz-linear-gradient(top,#009900,#003300);background:-webkit-linear-gradient(top,#009900,#003300);background:-o-linear-gradient(top,#009900,#003300);
	border-radius:2px;-moz-border-radius:2px;-webkit-border-radius:2px;
	cursor:pointer;
}
.register_input_reset
{
	float:left;
	height:32px;width:30%;
	font-size:0.95em;
	border:0px;
	font-family:Arial;
	color:#fff;
	background:-moz-linear-gradient(top,#CC3300,#663300);background:-webkit-linear-gradient(top,#CC3300,#663300);background:-o-linear-gradient(top,#CC3300,#663300);
	border-radius:2px;-moz-border-radius:2px;-webkit-border-radius:2px;
	cursor:pointer;
}
.reg_input_fields_names
{
	color:#006666;
}
.error_register
{
	text-align:center;font-weight:bold;color:#330000;line-height:30px;
	visibility:hidden;
}
</style>

<div class='register' id='register'>
Note:If Registration form is not Responding ..you are already registred to this site check it or go with forgot password..
	<div class='register_head'>
		<div class='heading_register'><span class='reg_headname'>Registration Form</span></div>
		<div class='close_reg' onclick='reg_close()'>&#10006;</div>
	</div>
	<div class='register_body'></div>
	<table class='register_table' id="register_tab">
				<tr colspan='3'><p class='error_register' id='error_register'>&nbsp;</p></tr>
				<tr>
					<td><p class='reg_input_fields_names'>User ID</p><input class="reg_input_fields" type='text' name='id' id='id1' maxlength=7 value="" onKeyup='getName()'  /></td>
					<td></td>
					<td><p class='reg_input_fields_names'>Name</p><input class="reg_input_fields" name='name' id='id2' type='text' value=""   /></td>
				</tr>
				<tr>
					<td><p class='reg_input_fields_names'>Password</p><input class="reg_input_fields" type='password' name='password1' id='id3' value=""   /></td>
					<td></td>
					<td><p class='reg_input_fields_names'>Re-enter Password</p><input class="reg_input_fields" name='password2' id='id4' type='password' value=""  /></td>
				</tr>
				<tr>
					<td><p class='reg_input_fields_names'>Security Question</p><input class="reg_input_fields" type='text' id='id5' name='sec_quest' value="seq"  /></td>
					<td></td>
					<td><p class='reg_input_fields_names'>Answer</p><input class="reg_input_fields" type='text' value="" id='id6' name='sec_ans'   /></td>
				</tr>
				<tr>
					<td><input type='submit' value="Register" class='register_input_submit' name='reg_submit' onclick="validate_register1()" /></td> 
					<td></td>
					<td><input type='reset' value="Reset" class='register_input_reset' name='reg_reset' onclick='reset_register()' /></td>
				</tr>
			</table>
			
</div>



<?php
}
else
{
?>
<div style="background:#fff;width:80%;height:80%;margin-left:auto;margin-right:auto;box-shadow:0px 0px 2px #fff;padding-top:2%;background:#fdfdfd;" id="forgot">
			<h4 style="color:rgb(204,51,0);text-decoration:underline;" align='center'>Forgot Password Form<img style="float:right;margin-top:1%;margin-right:11%;cursor:pointer;" src="assets/img/icons/cross.png" onclick="$('#register_black').fadeOut()"></img></h4>
			<table style="width:80%;height:80%;margin-left:10%;box-shadow:0px 0px 3px black;padding:10px 0px 0px 10px;border-radius:2px;background:#fff;-moz-box-shadow:0px 0px 3px black;-webkit-shadow:0px 0px 3px black;">
				<tr><td>Enter ID</td><td>:<input type="text" id="us_id" onkeyup="load_security()" class='forg_inp'></td></tr>
				<tr><td>Securty Question</td><td>:<input class="forg_inp" id="us_qu" style="padding-left:10%"></td></tr>
				<tr><td>Answer</td><td>:<input type="text" id="us_ans" class='forg_inp'></td></tr>
				<tr><td>New Password</td><td>:<input type="password" id="us_pass" class='forg_inp'></td></tr>
				<tr><td></td><td><input type="submit" value="Change" class="change" onclick="forgot_password()"></td></tr>
			</table>
		</div>
<?php
}
?>
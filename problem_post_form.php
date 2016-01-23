<?php
session_start();
include "config_db25788.php";
if(isset($_SESSION['login_id']) || isset($_SESSION['admin_id1']))
{
	if(isset($_SESSION['login_id'])){$id=$_SESSION['login_id'];}else	$id=$_SESSION['admin_id1'];
	$query=mysql_query("select * from sdcac_user_table where user_id='$id'") or die(mysql_error());
	$user_data=mysql_fetch_array($query);
	$user_name=$user_data['user_name'];
	$user_branch=$user_data['branch'];
	$user_class=$user_data['class'];
?>
<style>

	.search_note
	{
		width:auto;
		margin-top:2%;
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
	table tr td textarea
	{
		margin-left:14%;
		margin-top:2%;
		border:1px solid rgb(51, 153, 255);
		letter-spacing:0.07em;
		word-spacing:0.25em;
		padding-left:10px;
		font-family:inherit;
	}
	table tr td textarea:focus
	{
		box-shadow: 0px 0px 3px rgb(51, 153, 255);
	}
	.post_sub
	{
		border-radius:1px;
		border:0px;
		margin-top:3%;
		margin-left:14%;
		background:-moz-linear-gradient(bottom,#006600,#00CC00);
		background:-webkit-linear-gradient(bottom,#006600,#00CC00);
		background:linear-gradient(bottom,#006600,#00CC00);
		height:32px;
		color:#fff;
		width:20%;
		cursor:pointer;
	}
	table tr td
	{
		vertical-align:middle;
	}

</style>
<h4  style="color:green;font-family:Algerian;margin-left:30%;">Welcome to SDCAC</h4>
<?php
if(isset($_SESSION['login_id'])&&!isset($_SESSION['sdcac_organize']))
{
?>
<table  id="body1" style="margin-left:15%;margin-top:1%;">
	<tr><td>ID</td><td>:<input id="id1" type="text" value="<?php echo $id ?>" class="search_note" readonly></td></tr>
	<tr><td>Name</td><td>:<input id="user1" type="text" value="<?php echo $user_name; ?>" class="search_note" readonly></td></tr>
	<tr><td>class</td><td>:<input id="clas" type="text" value="<?php echo $user_class; ?>" class="search_note" readonly></td></tr>
	<tr><td>branch</td><td>:<input id="branc" type="text" value="<?php echo $user_branch ?>" class="search_note" readonly></td></tr>
	<tr><td valign=top>Enter your query here</td><td><textarea id='que' style="width:500;height:200;" rows=7 cols=35 spellcheck="false"></textarea></td></tr>
	<tr><td>To </td><td style="height:60px;">
				<span class="search_note" style="border:0px;">
					<input type="radio" id="tosend" name="tosend" checked="true">Coordinator
					<input type="radio" id="tosend" name="tosend" >Web Team
				</span>
	</td></tr>
	<tr><td></td><td><input type="submit" class='post_sub' value="Submit" name="form_submit" onclick="post_y_problem('st')"></td></tr>
</table>
<?php
}
else
{
?>
<table  id="body1" style="margin-left:15%;margin-top:5%;">
	<tr><td>ID</td><td><input name="id" type="text" value="<?php echo $id ?>" class="search_note" readonly></td></tr>
	<tr><td>Name</td><td><input name="user" type="text" value="<?php echo $user_name; ?>" class="search_note" readonly></td></tr>	
	<tr><td>Subject</td><td><input id="sub" type="text" class="search_note" ></td></tr>	
	<tr><td valign=top>Your Query:</td><td><textarea id="que" style="width:500;height:200;" rows=7 cols=35  spellcheck="false"></textarea></td></tr>
			<tr><td>To </td><td style="height:60px;">
				<span class="search_note" style="border:0px;">
					<input type="radio" id="tosend" name="tosend" checked="true">Coordinator
					<input type="radio" id="tosend" name="tosend" >Web Team
				</span>
		</td></tr>
	<tr><td></td><td><input type="submit" value="Submit" class='post_sub' name="form_submit"   onclick="post_y_problem('or')"></td></tr>
</table>
<?php
}
}
else
{
	echo "No Accesss";
}
?>









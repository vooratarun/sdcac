<?php
session_start();
if(isset($_SESSION['admin_id1']))
{?>
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
<table  id="body1" style="margin-left:15%;margin-top:1%;">
	<tr><td>From</td><td>:<input id="id1" type="text" value="<?php echo $_SESSION['admin_id1'] ?>" class="search_note" readonly></td></tr>
	<tr><td valign=top>Enter ID's</td><td><textarea id='id_no' style="width:500;height:200;" rows=7 cols=35 spellcheck="false"></textarea></td></tr>
	<tr><td valign=top>Enter you message</td><td><textarea id='que' style="width:500;height:200;" rows=7 cols=35 spellcheck="false"></textarea></td></tr>
	<tr><td></td><td><input type="submit" class='post_sub' value="Submit" name="form_submit" onclick="send_to_st()"></td></tr>
			<tr><td>To </td><td style="height:60px;">
				<span class="search_note" style="border:0px;">
					<input type="radio" id="tosend" name="tosend" checked="true">Organizers
					<input type="radio" id="tosend" name="tosend" >Students
				</span>
		</td></tr>
</table>
<script type="text/javascript">
function send_to_st()
{
	var to=document.getElementById("tosend").checked?"org":"stu";
	ids=$('#id_no').val();
	quer=$('#que').val();
	pos={'query':quer,'id_no':ids,'to1':to};
	$.post("notice_actions.php",pos,function(data){
		$('#content').html(data);
});
}
</script>
<?php }
?>
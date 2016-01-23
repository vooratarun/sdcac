

<style type='text/css'>

input
{
margin-left:13%;font-size:14px;
width:75%;height:33px;border:0;color:#003333;
border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;
box-shadow:0px 0px 1px 0px rgb(204,204,204) inset;-moz-box-shadow:0px 0px 1px 0px rgb(204,204,204) inset;-webkit-box-shadow:0px 0px 1px 0px rgb(204,204,204) inset;
border:1px solid rgb(204,204,204);
}
input:hover
{
  border:1px solid #3399FF;
  box-shadow:0px 0px 1px 0px #0033CC inset;-moz-box-shadow:0px 0px 1px 0px #0033CC inset;-webkit-box-shadow:0px 0px 1px 0px #0033CC inset;
}
.admin_head
{
  margin-left:auto;margin-right:auto;font-weight:bold;color:#330000;font-size:20px;text-decoration:underline;height:10%;margin-top:1%;text-align:center;
}

.admin_table
{
   width:400px;
   background-color:white;
   box-shadow:0px 0px 3px 0px #C8C8C8 ;margin-top:2%;-moz-box-shadow:0px 0px 3px 0px #C8C8C8 ;-webkit-box-shadow:0px 0px 3px 0px #C8C8C8 ;
   border-radius:2px;
   border:1px solid #C8C8C8;
   height:250px;
   margin-left:auto;
   margin-right:auto;
}
.admin_table tr
{
    color:#003366;font-weight:bold;
}
#admin_login_error
{
  text-align:center;color:#CC6600;
}
.login_submit
{
 font-weight:bold;margin-left:14%;height:31px;width:23%;-moz-border-radius:2px;-webkit-border-radius:2px;border-radius:2px;color:white;border:0px;cursor:pointer;box-shadow:0px 0px 2px 0px #6699CC inset;-moz-box-shadow:0px 0px 2px 0px #99FFCC inset;-webkit-box-shadow:0px 0px 2px 0px #99FFCC inset;background-color:#0066CC;font-size:13px;
}
.login_submit:hover
{
  box-shadow:0px 0px 1px 0px #003333 inset;-moz-box-shadow:0px 0px 1px 0px #003333 inset;-webkit-box-shadow:0px 0px 1px 0px #003333 inset;
}


</style>




	
                            
                                    
                                      <table class='admin_table' align="center">
                                      <tr><td colspan=2><div class = 'admin_head'>
                                      Admin Login
                                      </div></td></tr>
                                      <tr><td><br /></td></tr>
                                      <tr><td colspan=2 id="admin_login_error"></td></tr>
                                      <tr><td><input type='text'  placeholder='Username' id='user_id' ></td></tr>
                                      <tr><td height=10px></td></tr>
                                      <tr><td><input type='password' placeholder='Password' id='password' >
                                      </td></tr><tr><td><br /></td></tr>
                                      <tr><td>
                                      <input type='submit' value='Login' name='submit' onclick="goto_admin_login()"
                                      class='login_submit' align=center></td></tr>
                                      <tr><td><br /></td></tr>
                                      </table>
                                      
                                 

<script type="text/javascript">
function goto_admin_login()
{
	var id=document.getElementById('user_id').value;
	pas=document.getElementById('password').value;
	
	if(id.indexOf('#')==-1 && id.indexOf('+')==-1 && id.indexOf('&')==-1)
		{
                $.post("check_login.php?user_id="+id+"&password="+pas+"&specify=admin_login",function(data)
			{
				$("#admin_login_error").html(data);
		});
	}	
	else document.getElementById('#admin_login_error').innerHTML='Invalid credentails';
		
}
</script>


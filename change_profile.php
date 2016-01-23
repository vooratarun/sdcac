<?php
session_start();
include "config_db25788.php";
include "password_encrypt_code.php";
if(isset($_SESSION["login_id"]))
	{
		
			$id1=htmlentities(addslashes($_SESSION["login_id"]));
			$mid=htmlentities(addslashes($_GET["mid"]));
			$pwd=htmlentities(addslashes($_GET["pwd"]));
			$phno=$_GET["phno"];
			$sq=htmlentities(addslashes($_GET["sq"]));
			$sqa1=htmlentities(addslashes($_GET["sqa"]));
			$cpwd=htmlentities(addslashes($_GET["cpwd"]));
			$q1=mysql_query("select * from sdcac_user_table where user_id='$id1'");
			$r=mysql_fetch_array($q1);
			if($mid==""){$mid=$r["mail_id"];}
			if($phno==""){$phno="not given";}			
		
			if($r["user_password"]==encrypt($cpwd))
			{
				if(mysql_query("update sdcac_user_table set  mail_id='$mid' , user_phno='$phno' , user_security='$sq' where user_id='$id1'") or die(mysql_error()))
				{
                                  if($sqa1!=""){
                                           $sqa=encrypt($sqa1);
                          mysql_query("update sdcac_user_table set user_answer='$sqa' where user_id='$id1'");
                                         }
					if($pwd!=""){ $pd=encrypt($pwd);
					mysql_query("update sdcac_user_table set user_password='$pd' where user_id='$id1'") or die(mysql_error());}
						echo '<div id="confirmation" class="notification confirm" style="margin-left:10%;width:50%;"><em><img alt="" src="assets/img/icons/tick_circle.png"></img>
						       Profile Successfully Updated...
					    </em></div>';
				
				}
			
			}
			else{
				echo '<div id="confirmation" class="notification error" style="margin-left:10%;width:50%;"><em><img alt="" src="assets/img/icons/cross_circle.png"></img>Current Password Doesn\'t Match...</em></div>';
			
			}
		}
		
else if(isset($_SESSION["admin_id"]) || isset($_SESSION["admin_id1"])){
			
		$id2=(isset($_SESSION["admin_id"]))?$_SESSION["admin_id"]:$_SESSION["admin_id1"];
                $id1=htmlentities(addslashes($id2));
			$mid=htmlentities(addslashes($_GET["mid"]));
			$pwd=htmlentities(addslashes($_GET["pwd"]));
			$phno=htmlentities(addslashes($_GET["phno"]));
			$sq=htmlentities(addslashes($_GET["sq"]));
			$sqa1=htmlentities(addslashes($_GET["sqa"]));
			$cpwd=htmlentities(addslashes($_GET["cpwd"]));
			$uname=htmlentities(addslashes($_GET["uname"]));
			$q1=mysql_query("select * from sdcac_admin_table where admin_name='$id1'");
			$r=mysql_fetch_array($q1);
			if($mid==""){$mid=$r["mail_id"];}
			if($phno==""){$phno="not given";}
			$ccp=encrypt($cpwd);
			if($r["admin_password"]==encrypt($cpwd))
			{
				
				if(mysql_query("update sdcac_admin_table set name='$uname' , admin_mail='$mid' , admin_phone='$phno' , admin_security_q='$sq'  where admin_name='$id1' and admin_password='$ccp'") or die(mysql_error()))
				{
                              if($sqa1!=""){
                                 $sqa=encrypt($sqa1);
            mysql_query("update sdcac_admin_table set admin_security_a='$sqa' where admin_name='$id1'") ;
                                 }

                 	if($pwd!=""){ $pd=encrypt($pwd);
					mysql_query("update sdcac_admin_table set admin_password='$pd' where admin_name='$id1'") or die(mysql_error());}
					
						echo '<div id="confirmation" class="notification confirm" style="margin-left:10%;width:50%;"><em><img alt="" src="assets/img/icons/tick_circle.png"></img>
						       Profile Successfully Updated...
					    </em></div>';
				
				}
			
			}
			else{
				echo '<div id="confirmation" class="notification error" style="margin-left:10%;width:50%;"><em><img alt="" src="assets/img/icons/cross_circle.png"></img>
						      Current Password Doesn\'t Match...
					    </em></div>';
			
			}
			
		}
		
		else{
				echo <<<s
					<script type="text/javascript">
						window.location='./';
					</script>
s;
		
		}


	

?>






<?php
$sno=$_GET['sno'];
$adm_id=$_GET['adm_id'];
$resp=htmlentities(addslashes($_GET['cont']));
$div=$_GET['div_id'];
include("config_db25788.php");
$query3=mysql_query("update sdcac_admins_posts set post_response='$resp' where query_no=$sno and admin_id='$adm_id'") or die(mysql_error());
if($query3){echo "Successfully Posted";

echo<<<s
	<script type="text/javascript">
		$('#div_response').slideUp();
		setTimeout("$('#$div').slideUp()",500);
	</script>
s;
}
?>


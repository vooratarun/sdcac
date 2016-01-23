<?php
include("config_db25788.php");
$uc=$_GET["q"];
$aa=mysql_query("select * from sdcac_user_table where user_name like '%$uc%' or user_id like '%$uc%'") or die(mysql_error());
$response="";
?>
<?php
if(mysql_num_rows($aa)>30)
{
	for($i=0;$i<10;$i++)
	{
		$fs=mysql_fetch_array($aa);
		$response=$response."<a title=\"".$fs['user_id']."\" onclick=\"search_box(this.title)\" style=\"cursor:pointer;\">".$fs['user_name']."-".$fs['user_id']."</a></br>";
	}
}
else{
	for($i=0;$i<mysql_num_rows($aa);$i++)
	{
		$fs=mysql_fetch_array($aa);
		
		$response=$response."<a title=\"".$fs['user_id']."\" onclick=\"search_box(this.title)\" style=\"cursor:pointer;\">".$fs['user_name']."-".$fs['user_id']."</a></br>";
	}

}
echo $response;
?>



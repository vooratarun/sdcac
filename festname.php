<?php
  session_start();
  include 'config_db25788.php';
  if(isset($_SESSION["login_id"])){
  if(isset($_POST["festname"])){
     $title=$_POST["festname"];
     $by=$_SESSION["login_id"];
     $des=$_POST["des"];
     if(mysql_query("INSERT INTO festname VALUES('$by','$title','$des')")){
         echo "<span style='color:green;font-weight:bold;'>successfully submitted</span>";

      }
      else{
         echo "<span style='color:red;font-weight:bold;'> Sorry,This name was already suggested..........</span>";
    }
}
 else{
 
?>
<div id='fname_post' style='padding-left:30px;padding-top:100px;' >
<p style='color:red;font-weight:bold;text-decoration:underline;font-size:17px;padding-left:100px;'>Title for Fest</p>
<br />
<table>
<tr>
<td>ID</td><td><input type=text name=idno id='idno' value=<?php echo $_SESSION["login_id"];?> readonly /><br/></td></tr>
<tr><td>Your Title for fest</td><td><input type= text value="" name=ftitle id='ftitle' ><br/></td></tr>
<tr><td>Description of title(optional) <br /><br /><br /><br /></td><td><textarea name=dectitle id='destitle' style="height:80px;width:250px;"></textarea></td></tr>
<tr><td colspan=2 align=center >
<input type=submit value=submit onclick='fname_post()' /></td></tr></table>
<div style='color:green;padding-top:20px;'>*  The one who suggested the suitable name will be awarded.</div>
</div>

<?php
 }
} 
else {
  echo "<span style='color:red;font-weight:bold;padding-left:60px;'><br /><br /><br />Please login.</span>";
}
?>
<?php
if(isset($_GET['us_id']))
{
include("config_db25788.php");
$id=htmlentities(addslashes($_GET['us_id']));
$q2=mysql_query("select * from students where ID='$id'") or die(mysql_error());
$q3=mysql_query("select * from spoorthi where user_id='$id'") or die(mysql_error());
if(mysql_num_rows($q2)==1 && mysql_num_rows($q3)==0)
{
 $q1=mysql_query("insert into spoorthi values('$id')")or die(mysql_error());
 if($q1)
 {
   echo "Successfully Registed...";
 }
 else
 {
   echo "Unable to Register Try Again";
 }
}
else
 {
   echo "Invalid University ID / Already Registered";
 }
}
else
{

?>
<div  style="margin-top:5%;font-size:1.2em;line-height:25px;">
<h4 align='center' style="color:#CC3300;text-decoration:underline;font-size:1.5em;">Due to some unavoidable reasons, spoorthi sevaks workshop is postponed to next month</h4>
<br /><p style="margin-left:100px">
The rush for our dream goal for life has made us to ignore the vital facts that truly contribute to the personality development. Due to which our life has become extremely strenuous and we have been facing stresses that really are devastating our lives. Even a little stress has brome a major threat for our lives. The reasons may be academic or personal. It may seem that there's nothing you can do about stress. The bills won't stop coming, there will never be more hours in the day, and your career and family responsibilities will always be demanding. Due to these stresses we develop restlessness, which is the prime factor that is responsible to disturb and contravene the smooth run of life. It drains away the focus, confidence and leaves us insecure and confused about our strategies. These stresses should not be carried all along the way with us and they have to be sorted out to ensure a safe, secure and smooth living. 
</p>
<br /><p style="margin-left:100px">
In fact, the simple realization that you are re in control of your life is the foundation of stress management. Managing stress is all about taking control of your thoughts, emotions, schedule and the way you deal with your problems. There are definitely effective and efficient measure that truly and completely help to reconcile a strong personality like self motivation, positive thinking and self confidence. In addition to these one definitely should have a perfect planning and execution. If these qualities could be achieved excelling in life is as simple as a walk through a park.
</p>
<br /><p style="margin-left:100px">
To expose you to the efficient strategies that control stress one definitely needs an expertise hand who can guide us towards personal excellence and to offer such hand we present you <strong>Spoorthi Sevaks</strong>. It is with great confidence and belief we bring forth them, who can absolutely turn you into person that you always strived for. Spoorthi sevaks are the people who with their extreme ability to train individuals towards personal excellence. They have been engaged in activities in training individuals to make them the persons that they always wanted to be. The workshop that is going to be conducted by these Spoorthi Sevaks includes two theory lectures followed by one practice session where you will be trained with controlled breathing followed by ascent meditation. These practice sessions, for sure, are going to relieve out the stresses. 
</p>
<br /><p style="margin-left:100px">
It is hereby expected that students should make use of this opportunity completely and get your minds empowered and make your life run smoothly like never before. All you have to do is, Register for the workshop that is going to be conducted by the "Spoorthi Sevaks" and we can ensure you that you would be coming out with flying colours.
</p>
<br /><div style="margin-left:150px;" id="reg_field">
<?php
if(1==0)
{
?>
<p>Register for this workshop(Free for all Students)</br>* E4 students are most preferable</p>
<input type="text" id="user_id1" class="inp" style="width:200px;">
<input type=submit value="Register" onclick="register_spoorthi()" class="login" style="border:1px solid #666;color:#fff;">
<?php
}
?>
</div>
</div>


<?php
}
?>
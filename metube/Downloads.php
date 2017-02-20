<?php
session_start();
include('connect.php');
require('Header.php');
if(isset($_SESSION['id'])){



$ip = getRealIpAddr();
if(isset($_GET['mid'])){
$uid = $_SESSION["id"];
$mid = $_GET['mid'];

$q = mysql_query("SELECT * FROM `Media`WHERE mid='$mid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$url = $row["MediaPath"];
$type = $row['Type'];
$oid = $row['uid'];
$per = $row['permission'];
if(strcmp($per,'private')==0){
if($uid==$oid)
{
Download($mid,$uid,$ip,$type);
echo "<meta http-equiv=\"refresh\" content=\"0;url=$url\">";

}
elseif($uid != $oid)
{
$q = mysql_query("SELECT * FROM `Media` natural join `FriendList` WHERE `mid`='$mid' and `uid_friend`='$uid' and `uid`='$oid' and `status`='1'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$check = $row['mid'];
if(!is_null($check))
{
Download($mid,$uid,$ip,$type);
echo "<meta http-equiv=\"refresh\" content=\"0;url=$url\">";
}
else
{
echo "<meta http-equiv=\"refresh\" content=\"0;url=Private.php\">";
}
}
else
{
echo "<meta http-equiv=\"refresh\" content=\"0;url=Private.php\">";
}
}
else
{

Download($mid,$uid,$ip,$type);
echo "<meta http-equiv=\"refresh\" content=\"0;url=$url\">";
}
}
}
else
{
echo "<div class='sform'>";
echo "<p>Sorry only registered users can download!</p>";
echo "<a id=\"signup\" href=\"SignUp.php\" target=\"_self\">Sign Up Now :)</a><br/>";
echo "</div>";
}
?>
    

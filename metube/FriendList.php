<?php

session_start();
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
include('connect.php');
require('FriendHeader.php');

$username=$_SESSION['username'];
$uid=$_SESSION['id'];

echo "<div class='form'>";
echo "YOUR FRIENDS LIST:<br/><br/>";
$q = mysql_query("SELECT * FROM `FriendList` where `uid_friend`='$uid' and `status`='1'") or die(mysql_error());

while ($row = mysql_fetch_assoc($q)){
$id = $row['uid'];


$r = mysql_query("SELECT * FROM `userList` where uid='$id'") or die(mysql_error());
$row1 = mysql_fetch_assoc($r);
$name=$row1['Name'];
$pic =$row1['ProfilePicture'];
echo "<div class='rbox'>";
echo "<img style=\"float:left;\" src=\"$pic\" alt=\"profile\" height=\"100\" width=\"100\" />";
echo "<br/><b><a style=\"color: #000000; font-size: 12pt\" href=\"Profile_Viewer.php?uid=$id\">";
echo $name."</a><b/><br/>";
echo "</div>";


}
echo "</div>";
?>
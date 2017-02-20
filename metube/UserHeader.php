<?php
	session_start();
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
include('connect.php');
require('Header.php');

$username=$_SESSION['username'];
$uid=$_SESSION['id'];

echo "<div id='smenu-bar'>";
echo "<li>";
echo "<a id=\"favorite\" href=\"FriendFeed.php\">Friend Feed</a><br/>";
echo "</li>";
echo "<li>";
echo "<a id=\"favorite\" href=\"Favourites.php\">Favorited Media</a><br/>";
echo "</li>";
echo "<li>";
echo "<a id=\"history\" href=\"UserHistory.php\">History</a><br/>";
echo "</li>";
echo "<li>";
echo "<a id=\"edit\" href=\"EditProfile.php\">Edit Profile</a><br/>";
echo "</li>";
$q = mysql_query("SELECT COUNT(*) FROM `Messaging` where to_uid='$uid' and status='0'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$unread = $row['COUNT(*)'];
echo "<li>";
echo "<a id=\"messages\" href=\"Inbox.php\">Messages(".$unread.")</a><br/>";
echo "</li>";
$q = mysql_query("SELECT COUNT(*) FROM `FriendList` where uid_friend='$uid' and status='0'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$requests = $row['COUNT(*)'];
echo "<li>";
echo "<a id=\"friends\" href=\"FriendList.php\" target=\"_self\">Friends(".$requests.")</a><br/>";
echo "</li>";
echo "<li>";
echo "<a id=\"blockuser\" href=\"BlockUser.php\" target=\"_self\">Blocked Users</a><br/>";
echo "</li>";
echo "<li>";
echo "<a id=\"logout\" href=\"Logout.php\">Logout</a><br/>";
echo "</li>";
echo "</div>";

?>
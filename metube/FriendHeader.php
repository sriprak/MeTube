<?php
	//session_start();
if(!isset($_SESSION['username'])){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
include('connect.php');
require('Header.php');

$username=$_SESSION['username'];
$uid=$_SESSION['id'];

echo "<div id='messaging'>";
echo "<li>";
echo "<a id=\"feed\" href=\"FriendList.php\" target=\"_self\">Friend List</a><br/>";
echo "</li>";
echo "<li>";
echo "<a id=\"addFriend\" href=\"addFriend.php\" target=\"_self\">Add Friend</a><br/>";
echo "</li>";
$q = mysql_query("SELECT COUNT(*) FROM `FriendList` where uid_friend='$uid' and status='0'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$requests = $row['COUNT(*)'];
echo "<li>";
echo "<a id=\"requests\" href=\"FriendReq.php\" target=\"_self\">Requests(".$requests.")</a><br/>";
echo "</li>";

echo "</div>";

?>

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
echo "<a id=\"subscribedChannel\" href=\"ListSubscribes.php\" target=\"_self\">Subscribed</a><br/>";
echo "</li>";
echo "<li>";
echo "<a id=\"addChannel\" href=\"addChannel.php\" target=\"_self\">Add Channel</a><br/>";
echo "</li>";
echo "<li>";
echo "<a id=\"ViewChannel\" href=\"ViewChannel.php\" target=\"_self\">My Channels</a><br/>";
echo "</li>";

echo "</div>";

?>

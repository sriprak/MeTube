<?php
	//session_start();
if(!isset($_SESSION["username"])){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
include('connect.php');
require('Header.php');

$username=$_SESSION['username'];
$uid=$_SESSION['id'];

echo "<div id='messaging'>";
echo "<li>";
echo "<a id=\"inbox\" href=\"UserHistory.php\" target=\"_self\">History</a><br/>";
echo "</li>";
echo "<li>";
echo "<a id=\"uploads\" href=\"UserUploads.php\" target=\"_self\">Uploads</a><br/>";
echo "</li>";
echo "<li>";
echo "<a id=\"downloads\" href=\"UserDownloads.php\" target=\"_self\">Downloads</a><br/>";
echo "</li>";

echo "</div>";

?>

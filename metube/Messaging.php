<?php
//session_start();
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
include('connect.php');
require('Header.php');

$username=$_SESSION['username'];
$uid=$_SESSION['id'];

echo "<div id='messaging'>";
echo "<li>";
echo "<a id=\"inbox\" href=\"Compose.php\" target=\"_self\">Compose</a><br/>";
echo "</li>";
$q = mysql_query("SELECT COUNT(*) FROM `Messaging` where to_uid='$uid' and status='0'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$unread = $row['COUNT(*)'];
echo "<li>";
echo "<a id=\"inbox\" href=\"Inbox.php\" target=\"_self\">INBOX(".$unread.")</a><br/>";
echo "</li>";
echo "<li>";
echo "<a id=\"sent\" href=\"Sent.php\" target=\"_self\">SENT</a><br/>";
echo "</li>";

echo "</div>";

?>

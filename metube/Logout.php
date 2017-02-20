<?php
include("connect.php");
session_start();
$uid = $_SESSION["id"];
$q = mysql_query("SELECT LastAccessTime FROM userList where `uid`='$uid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$time=$row['LastAccessTime'];
mysql_query("UPDATE `userList` SET `LastAccessTime`= '$time' where `uid`='$uid'") or die(mysql_error());


session_unset();
session_destroy();
echo "<meta http-equiv=\"refresh\" content=\"0;url=Browse.php\">";

?>
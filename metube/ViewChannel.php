<?php
session_start();
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
require('HeaderChannels.php');
$id = $_SESSION["id"];
echo "<div class='form'>";
echo "YOUR CHANNEL LIST:<br/><br/>";
$q = mysql_query("SELECT * FROM `Channels` where `uid` = '$id' order by createTime DESC") or die(mysql_error());
while($row1 = mysql_fetch_assoc($q)){
$id = $row1['chid'];
$name = $row1['channel_name'];
$time = $row1['createTime'];
echo "<div class='rbox'>";
echo "<img style=\"float:left;\" src=\"images/Channel.png\" alt=\"profile\" height=\"100\" width=\"100\" />";
echo "<b><a style=\"color: #0000FF; font-size: 18pt\" href=\"Channel_Viewer.php?id=$id\">";
echo $name."</a><b/><br/>";
echo "<br/><b><a style=\"color: red; font-size: 08pt\" href=\"ChannelControl.php?id=$id&cat=del\">";
echo "DELETE CHANNEL (cannot be reversed)</a><b/><br>";
echo "<br/><font size=\"3\" face=\"arial\" color=\"green\">";
echo $time."</a><b/><br/>";
echo "</font><br/>";

echo "</div>";
}
echo "</div>";
?>

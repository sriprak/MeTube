<?php
session_start();
if(!isset($_SESSION['username'])){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
require('HeaderChannels.php');
$uid = $_SESSION['id'];
echo "<div class='form'>";
echo "LIST OF CHANNELS YOU SUBSCRIBED:<br/><br/>";
$q = mysql_query("SELECT * FROM `Subscribed_Channel` AS sc inner join `Channels` AS ch on sc.chid = ch.chid where sc.uid = $uid") or die(mysql_error());
while($row1 = mysql_fetch_assoc($q)){
$chid = $row1['chid'];
$name = $row1['channel_name'];
$time = $row1['createTime'];
echo "<div class='rbox'>";
echo "<img style=\"float:left;\" src=\"images/Channel.png\" alt=\"profile\" height=\"100\" width=\"100\" />";
echo "<b><a style=\"color: #0000FF; font-size: 18pt\" href=\"Channel_Viewer.php?id=$chid\">";
echo $name."</a><b/><br/>";
echo "<b><a style=\"color: red; font-size: 08pt\" href=\"ChannelControl.php?id=$chid&cat=uns\">";
echo "<br/>UNSUBSCRIBE</a><b/><br/>";
echo "<br/><font size=\"3\" face=\"arial\" color=\"green\">";
echo "Created:".$time."</a><b/><br/>";
echo "</font><br/>";
echo "</div>";
}
echo "</div>";
?>

<?php
session_start();
require('Header.php');
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
$id = $_SESSION["id"];
echo "<div class='form'>";
echo "CHANNELS:<br/><br/>";
$q = mysql_query("SELECT * FROM `Channels`natural join userList order by createTime DESC") or die(mysql_error());
while($row1 = mysql_fetch_assoc($q)){
$id = $row1['chid'];
$name = $row1['channel_name'];
$time = $row1['createTime'];
$uname = $row1['UserName'];
echo "<div class='rbox'>";
echo "<img style=\"float:left;\" src=\"images/Channel.png\" alt=\"profile\" height=\"100\" width=\"100\" />";
echo "<b><a style=\"color: #0000FF; font-size: 18pt\" href=\"Channel_Viewer.php?id=$id\">";
echo $name."</a><b/><br/>";
echo "<b><a style=\"color: red; font-size: 08pt\" href=\"ChannelControl.php?id=$id&cat=sub\">";
echo "<br/>SUBSCRIBE</a><b/><br>";
echo "<b><a style=\"color: red; font-size: 08pt\" href=\"ChannelControl.php?id=$id&cat=uns\">";
echo "<br/>UNSUBSCRIBE</a><b/><br/>";
echo "<br/><font size=\"3\" face=\"arial\" color=\"green\">";
echo "Created on: &nbsp;".$time."&nbsp;by&nbsp;".$uname."<b/><br/>";

echo "</font><br/>";
echo "</div>";
}
echo "</div>";
?>

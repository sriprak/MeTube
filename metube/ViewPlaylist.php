<?php
session_start();
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
require('UserPlaylists.php');
$id = $_SESSION["id"];
echo "<div class='form'>";
echo "YOUR PLAYLISTS:<br/><br/>";
$q = mysql_query("SELECT * FROM `Playlists` where `uid` = '$id'") or die(mysql_error());
while($row1 = mysql_fetch_assoc($q)){
$plid = $row1['plid'];
$name = $row1['playlist_name'];
$time = $row1['createTime'];
echo "<div class='rbox'>";
echo "<img style=\"float:left;\" src=\"images/playlist.png\" alt=\"profile\" height=\"100\" width=\"100\" />";
echo "<b><a style=\"color: #0000FF; font-size: 18pt\" href=\"Playlist_Viewer.php?id=$plid\">";
echo $name."</a><b/><br/>";
echo "<br/><b><a style=\"color: red; font-size: 08pt\" href=\"PlaylistControl.php?plid=$plid&del=del\">";
echo "DELETE PLAYLIST (cannot be reversed)</a><b/><br>";
echo "<br/><font size=\"3\" face=\"arial\" color=\"green\">";
echo $time."</a><b/><br/>";
echo "</font><br/>";
echo "</div>";
}
echo "</div>";
?>

<?php
session_start();
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
require('GroupDisscussionHeader.php');
$id = $_SESSION["id"];
echo "<div class='form'>";
echo "DISCUSSIONS STARTED BY YOU:<br/><br/>";
$q = mysql_query("SELECT * FROM `Group_Discussions` where `uid` = '$id' order by startTime DESC") or die(mysql_error());
while($row1 = mysql_fetch_assoc($q)){
$grdid = $row1['grdid'];
$name = $row1['Title'];
$time = $row1['startTime'];
echo "<div class='rbox'>";
echo "<b><a style=\"color: #0000FF; font-size: 18pt\" href=\"Disscussion_Viewer.php?id=$grdid\">";
echo $name."</a><b/><br/>";
echo "<br/><b><a style=\"color: red; font-size: 08pt\" href=\"DeleteDisscussions.php?id=$grdid&cat=del\">";
echo "DELETE DISCUSSION (cannot be reversed)</a><b/><br>";
echo "<br/><font size=\"3\" face=\"arial\" color=\"green\">";
echo $time."</a><b/><br/>";
echo "</font><br/>";

echo "</div>";
}
echo "</div>";
?>

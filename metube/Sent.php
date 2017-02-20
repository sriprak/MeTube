<?php

session_start();
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
include('connect.php');
require('Messaging.php');

$username=$_SESSION['username'];
$uid=$_SESSION['id'];

echo "<div class='form' style='text-align:center;'>";
echo "<b><a style=\"color: red; font-size: 08pt\" href=\"MessagingControl.php?mesid=0&cat=dasent\">";
	echo "<br/>Delete ALL</a><b/><br><br/><br/>";

$q = mysql_query("SELECT * FROM `Messaging_sent` where from_uid_sent='$uid' order by messageTime desc") or die(mysql_error());
while ($row = mysql_fetch_assoc($q)){
$id = $row['messid'];
$from_id = $row['from_uid_sent'];
$to_id = $row['to_uid_sent'];
$subject = $row['Subject'];
$time = $row['messageTime'];
$msg = $row['Message'];
$r = mysql_query("SELECT UserName FROM `userList` where uid='$to_id'") or die(mysql_error());
$row1 = mysql_fetch_assoc($r);
$name = $row1['UserName'];
 
	echo "<br/><b>To:</b>&nbsp;&nbsp;";
    echo "<b>".$name."<b/><br/>";
    echo "<i><a style=\"color:#0000FF; font-size: 12pt\" href=\"Message_Viewer.php?messid=$id\">";
    echo $subject."</i><br/></a>";
    echo "<font size=\"2\" face=\"arial\" color=\"red\">";
    echo "<br/>TIME:&nbsp;".$time;
    echo "</font><br/>";
    echo "<b><a style=\"color: red; font-size: 08pt\" href=\"MessagingControl.php?mesid=$id&cat=dsmes\">";
	echo "<br/>delete</a><b/><br>";
 
}
echo "</div>";
?>
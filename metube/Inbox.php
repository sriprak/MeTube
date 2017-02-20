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
echo "<b><a style=\"color: red; font-size: 08pt\" href=\"MessagingControl.php?mesid=0&cat=darec\">";
	echo "<br/>Delete ALL</a><b/><br><br/><br/>";
$q = mysql_query("SELECT * FROM `Messaging` where to_uid='$uid' order by messageTime desc") or die(mysql_error());
while ($row = mysql_fetch_assoc($q)){
$id = $row['mesid'];
$status = $row['status'];
$from_id = $row['from_uid'];
$subject = $row['Subject'];
$time = $row['messageTime'];
$msg = $row['Message'];
$r = mysql_query("SELECT uid,Name FROM `userList` where uid='$from_id'") or die(mysql_error());
$row1 = mysql_fetch_assoc($r);
$user = $row1['uid'];
$name = $row1['Name'];
if($status==0){
    echo "<b><a style=\"color:#000000; font-size: 12pt\" href=\"Profile_Viewer.php?uid=$user\">".$name."<b/><br/>";
    echo "<i><a style=\"color:red; font-size: 12pt\" href=\"Message_Viewer.php?mesid=$id\">";
    echo $subject."&nbsp;(unread)</i></a><br/>";
    echo "<font size=\"2\" face=\"arial\" color=\"red\">";
    echo "<br/>TIME:&nbsp;".$time."<br/>";
    echo "</font><br/>";
    echo "<b><a style=\"color: red; font-size: 08pt\" href=\"MessagingControl.php?mesid=$id&cat=drmes\">";
	echo "<br/>delete</a><b/><br>";
    echo "<br/>";
    }
    else{
     echo "<b><a style=\"color:#000000; font-size: 12pt\" href=\"Profile_Viewer.php?uid=$user\">".$name."<b/><br/>";
    echo "<i><a style=\"color:#0000FF; font-size: 12pt\" href=\"Message_Viewer.php?mesid=$id\">";
    echo $subject."</i></a><br/>";
    echo "<font size=\"2\" face=\"arial\" color=\"red\">";
    echo "<br/>TIME:&nbsp;".$time."<br/>";
    echo "</font>";
    echo "<b><a style=\"color: red; font-size: 08pt\" href=\"MessagingControl.php?mesid=$id&cat=drmes\">";
	echo "<br/>delete</a><b/><br>";
    echo "<br/>";
    }
 
}
echo "</div>";
?>
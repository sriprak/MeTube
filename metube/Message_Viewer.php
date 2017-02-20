<?php
	session_start();
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
require('Messaging.php');
echo "<div class='form'>";
if(isset($_GET['mesid'])){
$id = $_GET['mesid'];
$uid = $_SESSION['id'];
mysql_query("Update `Messaging` set `status`='1' where `mesid`='$id'") or die(mysql_error());
$q = mysql_query("SELECT * FROM `Messaging` where `mesid`='$id'") or die(mysql_error());
while ($row = mysql_fetch_assoc($q)){
	$usid = $row['from_uid'];
	$useid = $row['to_uid'];
	if($useid == $uid){
	$r = mysql_query("SELECT UserName FROM `userList` where `uid`='$usid'") or die(mysql_error());
	$row1 = mysql_fetch_assoc($r);
	$uname = $row1['UserName'];
    $sub = $row['Subject'];
    $text = $row['Message'];
    echo "<br/><b>From:</b>";
    echo "&nbsp;&nbsp;".$uname."</a><br/>";
    echo "<br/><b>Subject:</b>";
    echo "&nbsp;&nbsp;".$sub."</a><br/>";
    echo "<br/><font size=\"5\" face=\"arial\" color=\"blue\">";
    echo "<i>Message:<br/>".$text."</i><br/>";
    echo "</font><br/>";
    echo "<br/>";
	echo "<br/>";
            }
            else{
            echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('You are not authorized for this')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=Inbox.php\">";
        	}
            }
            }
            
elseif(isset($_GET['messid'])){
$id = $_GET['messid'];
$q = mysql_query("SELECT * FROM `Messaging_sent` where `messid`='$id'") or die(mysql_error());
while ($row = mysql_fetch_assoc($q)){
	$userid = $row['to_uid_sent'];
	$userssid = $row['from_uid_sent'];
	if($userssid == $uid){
	$s = mysql_query("SELECT UserName FROM `userList` where `uid`='$userid'") or die(mysql_error());
	$row2 = mysql_fetch_assoc($s);
	$usname = $row2['UserName'];
    $sub = $row['Subject'];
    $text = $row['Message'];
    echo "<br/><b>To:</b>";
    echo "&nbsp;&nbsp;".$usname."</a><br/>";
    $sub = $row['Subject'];
    $text = $row['Message'];
    echo "<br/><b>Subject:</b>";
    echo "&nbsp;&nbsp;".$sub."</a><br/>";
    echo "<br/><font size=\"3\" face=\"arial\" color=\"blue\">";
    echo "<i>Message:<br/>".$text."</i><br/>";
    echo "</font><br/>";
    echo "<br/>";
	echo "<br/>";
	}
	else{
            echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('You are not authorized for this')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=Inbox.php\">";
        	}
	}
	}       
       echo "</form>";
                echo "<br/> </div>";
                
?>

<?php
session_start();
include('connect.php');
require('Header.php');

if(!isset($_SESSION["username"])){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}


$username=$_SESSION['username'];
$userid=$_SESSION['id'];

echo "<div class='form'>";
echo "CHANNEL FEED:<br/><br/>";
$q = mysql_query("SELECT * FROM `Subscribed_Channel` where `uid`='$userid'") or die(mysql_error());

while ($row = mysql_fetch_assoc($q)){
$cid = $row['chid'];


$r = mysql_query("SELECT * FROM `Media` m natural join `Channels_related` c natural join `userList` u where chid='$cid' order by addTime DESC limit 0,5") or die(mysql_error());
while ($row1 = mysql_fetch_assoc($r)){
$uid = $row1['uid'];
    $id = $row1['mid'];
    $name = $row1['Title'];
    $uname = $row1['UserName'];
    $type = $row1['Type'];
    $path = $row1['MediaPath'];
    $u = mysql_query("SELECT * FROM `Views` WHERE `mid`='$id'") or die(mysql_error());
	$row5 = mysql_fetch_assoc($u);
	$view=$row5['views'];
	if($view != 0){
	$views = $view;
	}
	else
	{
	$views = 0;
	}

			if(stripos($type,"wmv")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a href=\"player_wmv.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo $views."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$uid\">";
    		echo $uname."</a><b/><br/>";
    		echo "</div>";
		
             }
            elseif(stripos($type,"image")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"$path\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a href=\"ImageViewer.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo $views."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$uid\">";
    		echo $uname."</a><b/><br/>";
    		echo "</div>";
	
            }
            elseif(stripos($type,"audio")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Audio.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a href=\"player.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo $views."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$uid\">";
    		echo $uname."</a><b/><br/>";
    		echo "</div>";
		
           
            }
            elseif(stripos($type,"3gp")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<br/><b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player_quicktime.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo $views."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$uid\">";
    		echo $uname."</a><b/><br/>";
    		echo "</div>";
        	
            }
            elseif(stripos($type,"msvideo")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player_quicktime.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo $views."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$uid\">";
    		echo $uname."</a><b/><br/>";
    		echo "</div>";

			}

            else
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a href=\"player.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo $views."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$uid\">";
    		echo $uname."</a><b/><br/>";
    		echo "</div>";
		
            }

}

}
echo "</div>";
?>

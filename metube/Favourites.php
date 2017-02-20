
<?php

session_start();
if(!isset($_SESSION['username'])){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
include('connect.php');
require('Header.php');

$username=$_SESSION['username'];
$uid=$_SESSION['id'];
echo "<div class='sform'>";
echo "FAVOURITED MEDIA:<br/><br/>";
$q = mysql_query("SELECT * FROM `Favourites` where `uid` = '$uid' ORDER BY `favoritedTime` desc") or die(mysql_error());

while ($row = mysql_fetch_assoc($q)){
	$ft = $row['favoritedTime'];
    $id = $row['uid'];
    $mid = $row['mid'];
	$u = mysql_query("SELECT * FROM `userList` u natural join `Media` m natural join `Views` v WHERE `mid`='$mid'") or die(mysql_error());
	$row5 = mysql_fetch_assoc($u);
	$uname = $row5['UserName']; 
	$views=$row5['views'];
    $name = $row5['Title'];
    $text = $row5['Description'];
    $type = $row5['Type'];
    $path = $row5['MediaPath'];

    
            $path = $row5['MediaPath'];
            $type = $row5['Type'];
            $dPath = "http://mmlab.cs.clemson.edu/spring12/g5/metube/".$path;
            if(stripos($type,"wmv")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<br/><b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player_wmv.php?mid=$mid\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<font size=\"1\" face=\"arial\" color=\"red\">";
    		echo "<br/><b>Favourited on:</b>";  
    		echo $ft."</a><br/>";
    		echo "</font><br/>";
    		echo "</div>";
            }
            elseif(stripos($type,"3gp")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<br/><b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player_quicktime.php?mid=$mid\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$id\">";
    		echo $uname."</a><b/><br/>";
    		echo "</div>";
        	
            }
            elseif(stripos($type,"msvideo")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<br/><b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player_quicktime.php?mid=$mid\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$id\">";
    		echo $uname."</a><b/><br/>";
    		echo "</div>";

        	}

            elseif(stripos($type,"image")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"$path\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<br/>";
            echo "<b><a style=\"color: #0000FF; font-size: 12pt\" href=\"ImageViewer.php?mid=$mid\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<font size=\"1\" face=\"arial\" color=\"red\">";
    		echo "<br/><b>Favourited on:</b>";  
    		echo $ft."</a><br/>";
    		echo "</font><br/>";
    		echo "</div>";		
            }
            elseif(stripos($type,"audio")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Audio.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<br/>";
            echo "<b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player.php?mid=$mid\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<font size=\"1\" face=\"arial\" color=\"red\">";
    		echo "<br/><b>Favourited on:</b>";  
    		echo $ft."</a><br/>";
    		echo "</font><br/>";
    		echo "</div>";
            }
            else
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<br/><b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player.php?mid=$mid\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<font size=\"1\" face=\"arial\" color=\"red\">";
    		echo "<br/><b>Favourited on:</b>";  
    		echo $ft."</a><br/>";
    		echo "</font><br/>";
    		echo "</div>";
            }
            }
               echo "</div>";
?>

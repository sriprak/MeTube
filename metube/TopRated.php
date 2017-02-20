<?php
session_start();
//include_once "functions.php";
include('connect.php');
require('Header.php');
echo "<div class='sform' >";

$q = mysql_query("SELECT * FROM `Media_Rating` Group by mid ORDER BY avg(rating) desc LIMIT 0,5") or die(mysql_error());
while ($row = mysql_fetch_assoc($q)){
	
    $id = $row['mid'];
    
    $r = mysql_query("SELECT * FROM `Media`m natural join`userList`u natural join Views where `mid`='$id'and permission='public'") or die(mysql_error());
    while ($row1 = mysql_fetch_assoc($r)){
    $mid = $row1['mid'];
    $name = $row1['Title'];
    $text = $row1['Description'];
    $uid = $row1['uid'];
    $uname = $row1['UserName'];
    $views = $row1['views'];
    $rating = getRating($mid);
            $path = $row1['MediaPath'];
            $type = $row1['Type'];
            $dPath = "http://mmlab.cs.clemson.edu/spring12/g5/metube/".$path;
            if(stripos($type,"wmv")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a href=\"player_wmv.php?mid=$mid\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<font size=\"2\" face=\"arial\" color=\"blue\">";
			echo "<b>Rating:&nbsp;&nbsp;";
			echo round($rating, 2)."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$uid\">";
    		echo $uname."</a><b/><br/>";
			echo "</div>";		
            }
            elseif(stripos($type,"3gp")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player_quicktime.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<font size=\"2\" face=\"arial\" color=\"blue\">";
			echo "<b>Rating:&nbsp;&nbsp;";
			echo round($rating, 2)."</b>";
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
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<font size=\"2\" face=\"arial\" color=\"blue\">";
			echo "<b>Rating:&nbsp;&nbsp;";
			echo round($rating, 2)."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$uid\">";
    		echo $uname."</a><b/><br/>";
    		echo "</div>";
			}

            elseif(stripos($type,"image")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"$path\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a href=\"ImageViewer.php?mid=$mid\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<font size=\"2\" face=\"arial\" color=\"blue\">";
			echo "<b>Rating:&nbsp;&nbsp;";
			echo round($rating, 2)."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$uid\">";
    		echo $uname."</a><b/><br/>";
			echo "</div>";		
            }
            elseif(stripos($type,"audio")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Audio.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a href=\"player.php?mid=$mid\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<font size=\"2\" face=\"arial\" color=\"blue\">";
			echo "<b>Rating:&nbsp;&nbsp;";
			echo round($rating, 2)."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$uid\">";
    		echo $uname."</a><b/><br/>";
			echo "</div>";
            }
            else
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a href=\"player.php?mid=$mid\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<font size=\"2\" face=\"arial\" color=\"blue\">";
			echo "<b>Rating:&nbsp;&nbsp;";
			echo round($rating, 2)."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$uid\">";
    		echo $uname."</a><b/><br/>";
			echo "</div>";		
            }
            }
            }
            
       echo "</sform>";
                echo "<br/> </div>";      
?>

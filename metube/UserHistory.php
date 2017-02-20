
<?php

session_start();
if(!isset($_SESSION["username"])){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
include('connect.php');
require('HistoryHeader.php');

$username=$_SESSION['username'];
$uid=$_SESSION['id'];
$ip = getRealIpAddr();
echo "<div class='form'>";
echo "YOUR HISTORY:<br/><br/>";
$r = mysql_query("SELECT * FROM `UserHistory` where `uid` = '$uid' order by visitedTime DESC") or die(mysql_error());
while ($row = mysql_fetch_assoc($r)){
	$meid = $row['mid'];
	$time = $row['visitedTime'];
$q = mysql_query("SELECT * FROM `Media` natural join `Views` where `mid` = '$meid' order by views ") or die(mysql_error());
$row1 = mysql_fetch_assoc($q);
	$id = $row1['mid'];	
    $name = $row1['Title'];
    $text = $row1['Description']; 
	$view=$row1['views'];
	if($view != 0){
	$views = $view;
	}
	else
	{
	$views = 0;
	}
            $path = $row1['MediaPath'];
            $type = $row1['Type'];
            $dPath = "http://mmlab.cs.clemson.edu/spring12/g5/metube/".$path;
            
            if(stripos($type,"wmv")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player_wmv.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>Visited time:&nbsp;&nbsp;";
			echo $time."</b>";
			echo "</font><br/>";
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
			echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>Visited time:&nbsp;&nbsp;";
			echo $time."</b>";
			echo "</font><br/>";
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
			echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>Visited time:&nbsp;&nbsp;";
			echo $time."</b>";
			echo "</font><br/>";
    		echo "</div>";

        	            }

            elseif(stripos($type,"image")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"$path\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a style=\"color: #0000FF; font-size: 12pt\" href=\"ImageViewer.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>Visited time:&nbsp;&nbsp;";
			echo $time."</b>";
			echo "</font><br/>";
			echo "</div>";		
            }
            elseif(stripos($type,"audio")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Audio.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>Visited time:&nbsp;&nbsp;";
			echo $time."</b>";
			echo "</font><br/>";
			echo "</div>";	
            }
            else
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>Visited time:&nbsp;&nbsp;";
			echo $time."</b>";
			echo "</font><br/>";
			echo "</div>";
            }
            }
       
            echo "</div>";
?>

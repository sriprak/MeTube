
<?php

session_start();
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
include('connect.php');
require('HistoryHeader.php');

$username=$_SESSION['username'];
$uid=$_SESSION['id'];

echo "<div class='form'>";
echo "YOUR UPLOADS:<br/><br/>";
$r = mysql_query("SELECT * FROM `Media` where `uid` = '$uid' order by UploadTime DESC") or die(mysql_error());
while ($row = mysql_fetch_assoc($r)){
	$id = $row['mid'];
    $name = $row['Title'];
    $text = $row['Description'];
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
            $path = $row['MediaPath'];
            $type = $row['Type'];
            $dPath = "http://people.cs.clemson.edu/~sriprak/metube_revised/metube/".$path;
            
            if(stripos($type,"wmv")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<br/><b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player_wmv.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
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
			echo number_format($views)."</b>";
			echo "</font><br/>";
    		echo "</div>";
        	
            }
            elseif(stripos($type,"msvideo")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<br/><b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player_quicktime.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
    		echo "</div>";

        	            }

            elseif(stripos($type,"image")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"$path\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<br/>";
            echo "<b><a style=\"color: #0000FF; font-size: 12pt\" href=\"ImageViewer.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "</div>";		
            }
            elseif(stripos($type,"audio")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Audio.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<br/>";
            echo "<b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "</div>";	
            }
            else
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<br/><b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "</div>";
            }
            }
       
            echo "</div>";
?>

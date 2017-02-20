<?php
//session_start();
//include_once "function.php";
include('connect.php');
require('Header.php');
echo "<div class='sform' >";
$q = mysql_query("SELECT mid,uid,Title,MediaPath,Type,UserName FROM `Media` m natural join `userList`u where `Type` like 'audio%' and permission='public' order by `UploadTime` DESC") or die(mysql_error());
while ($row = mysql_fetch_assoc($q)){
	
    $id = $row['mid'];
    $name = $row['Title'];
    $uid = $row['uid'];
    $uname = $row['UserName'];
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
            $dPath = "http://mmlab.cs.clemson.edu/spring12/g5/metube/".$path;
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Audio.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$uid\">";
    		echo $uname."</a><b/><br/>";
    		echo "</div>";
		
            }
       echo "</sform>";
                echo "<br/> </div>";      
?>

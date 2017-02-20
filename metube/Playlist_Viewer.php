<?php
session_start();
require('UserPlaylists.php');
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
$url = $_SERVER['REQUEST_URI'];
$id = $_SESSION["id"];
if(isset($_GET['id'])){
$plid = $_GET['id'];
$q = mysql_query("SELECT distinct(mid),rplid,uid,playlist_name FROM `Playlists` natural join `Playlists_related` where `uid` = '$id' and plid = '$plid'") or die(mysql_error());

echo "<div class='form'>";
while($row1 = mysql_fetch_assoc($q)){
$rplid = $row1['rplid']; 
$uid = $row1['uid'];
$name = $row1['playlist_name'];
$mid = $row1['mid'];
if ($id != $uid ) {
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Playlist does not exist or your not allowed to view this.')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=ViewPlaylist.php\">";

}
if(strlen($name) < 1)
{
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('No Media in this PlayList')";
        	echo "</script>";

}
$r = mysql_query("SELECT * FROM `Media` natural join `userList` where `mid` = '$mid'") or die(mysql_error());
$row = mysql_fetch_assoc($r);
	$meid = $row['mid'];
    $name_m = $row['Title'];
    $userid = $row['uid'];
    $uname = $row['UserName'];
	if(strlen($name_m) < 1)
	{	
	echo "No videos to this playlist :(";
	}
    $u = mysql_query("SELECT * FROM `Views` WHERE `mid`='$meid'") or die(mysql_error());
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
            echo "<b><a href=\"player_wmv.php?mid=$meid\">";
    		echo $name_m."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$userid\">";
    		echo $uname."</a><b/><br/>";
    		echo "<br/><b><a style=\"color: red; font-size: 06pt\" href=\"PlaylistControl.php?rplid=$rplid&cat=del&url=$url\">";
			echo "DELETE MEDIA FROM PLAYLIST (cannot be reversed)</a><b/><br>";

    		echo "</div>";
		
             }
            elseif(stripos($type,"image")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"$path\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a href=\"ImageViewer.php?mid=$meid\">";
    		echo $name_m."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$userid\">";
    		echo $uname."</a><b/><br/>";
    		echo "<br/><b><a style=\"color: red; font-size: 06pt\" href=\"PlaylistControl.php?rplid=$rplid&cat=del&url=$url\">";
			echo "DELETE MEDIA FROM PLAYLIST (cannot be reversed)</a><b/><br>";
    		echo "</div>";
	
            }
            elseif(stripos($type,"audio")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Audio.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a href=\"player.php?mid=$meid\">";
    		echo $name_m."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$userid\">";
    		echo $uname."</a><b/><br/>";
    		echo "<br/><b><a style=\"color: red; font-size: 06pt\" href=\"PlaylistControl.php?rplid=$rplid&cat=del&url=$url\">";
			echo "DELETE MEDIA FROM PLAYLIST (cannot be reversed)</a><b/><br>";
    		echo "</div>";
		
           
            }
            elseif(stripos($type,"3gp")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player_quicktime.php?mid=$meid\">";
    		echo $name_m."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$userid\">";
    		echo $uname."</a><b/><br/>";
    		echo "<br/><b><a style=\"color: red; font-size: 06pt\" href=\"PlaylistControl.php?rplid=$rplid&cat=del&url=$url\">";
			echo "DELETE MEDIA FROM PLAYLIST (cannot be reversed)</a><b/><br>";
    		echo "</div>";
        	
            }
            elseif(stripos($type,"msvideo")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player_quicktime.php?mid=$meid\">";
    		echo $name_m."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$userid\">";
    		echo $uname."</a><b/><br/>";
    		echo "<br/><b><a style=\"color: red; font-size: 06pt\" href=\"PlaylistControl.php?rplid=$rplid&cat=del&url=$url\">";
			echo "DELETE MEDIA FROM PLAYLIST (cannot be reversed)</a><b/><br>";
    		echo "</div>";

			}

            else
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a href=\"player.php?mid=$meid\">";
    		echo $name_m."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$userid\">";
    		echo $uname."</a><b/><br/>";
    		echo "<br/><b><a style=\"color: red; font-size: 06pt\" href=\"PlaylistControl.php?rplid=$rplid&cat=del&url=$url\">";
			echo "DELETE MEDIA FROM PLAYLIST (cannot be reversed)</a><b/><br>";
			echo "</div>";
		
            }

}
}
echo "</div>";

<?php
//eession_start();
include("connect.php");
if(!isset($_SESSION)){
session_start();
}
function delAllSent()
{
$uid = $_SESSION['id'];
if(!is_null($uid))
{
mysql_query("DELETE from `Messaging_sent` WHERE `from_uid_sent` ='$uid'") or die(mysql_error());
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Messages Deleted')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=Sent.php\">";
}
else{
			echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('You are not authorized to do this no messages in Sent box')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=Sent.php\">";
      }
      

}

function delAllRec()
{
$uid = $_SESSION['id'];
if(!is_null($uid))
{
mysql_query("DELETE from `Messaging` WHERE `to_uid` ='$uid'") or die(mysql_error());
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Messages Deleted')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=Inbox.php\">";
}
else{
			echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('You are not authorized to do this or no messages in Inbox')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=Inbox.php\">";
      }

}

function delRecMes($mesid)
{
$uid = $_SESSION['id'];
$q = mysql_query("SELECT to_uid FROM `Messaging` where `mesid`='$mesid' and `to_uid`='$uid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$check = $row['to_uid'];

if($check == $uid)
{
mysql_query("DELETE from `Messaging` WHERE `mesid` ='$mesid'") or die(mysql_error());
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Message deleted')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=Inbox.php\">";
}
else{
			echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('You are not authorized to do this or message doesn't exist')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=Inbox.php\">";
      }


}

function delSentMes($messid)
{
$uid = $_SESSION['id'];
$q = mysql_query("SELECT from_uid_sent FROM `Messaging_sent` where `messid`='$messid' and `from_uid_sent`='$uid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$check = $row['from_uid_sent'];

if($check == $uid)
{
mysql_query("DELETE from `Messaging_sent` WHERE `messid` ='$messid'") or die(mysql_error());
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Message deleted')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=Sent.php\">";
}
else{
			echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('You are not authorized to do this or message doesn't exist')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=Sent.php\">";
      }
}

function delPlaylist($uid,$plid)
{
$q = mysql_query("SELECT uid FROM `Playlists` where `plid`='$plid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$check = $row['uid'];

if($check == $uid)
{
mysql_query("DELETE from `Playlists` WHERE `plid` ='$plid'") or die(mysql_error());
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Playlist Deleted')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=ViewPlaylist.php\">";
}
else{
			echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('You are not authorized to do this here or the playlist does not exist')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=ViewPlaylist.php\">";
      }

        	

}
function delMediaPlaylist($uid,$rplid,$url)
{
$q = mysql_query("SELECT uid FROM `Playlists` natural join `Playlists_related` where `rplid`='$rplid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$check = $row['uid'];

if($check == $uid)
{
mysql_query("DELETE from `Playlists_related` WHERE `rplid` ='$rplid'") or die(mysql_error());
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Media Deleted from Playlist')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=$url\">";
}
else{
			echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('You are not authorized to do this or media doesn't exist')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=ViewPlaylist.php\">";
      }

        	

}
function delComment($uid,$cid,$url)
{
$q = mysql_query("SELECT uid FROM `Comments` where `cvid`='$cid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$check = $row['uid'];

if($check == $uid)
{
mysql_query("DELETE from `Comments` WHERE `uid` ='$uid' and `cvid` ='$cid'") or die(mysql_error());
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Comment Deleted')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=$url\">";
}
else{
			echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('You are not authorized to do this')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=$url\">";
      }
      }

function checkPermissionsDis($uid,$grdid)
{
$q = mysql_query("SELECT uid FROM `Group_Discussions` where `grdid`='$grdid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$check = $row['uid'];
if(!is_null($check))
{
if($check != $uid)
{
$r = mysql_query("SELECT * FROM `FriendList` where `uid`='$check' and `uid_friend`='$uid' and `status`='1'") or die(mysql_error());
$row1 = mysql_fetch_assoc($r);
$frid = $row1['uid_friend'];
if(is_null($frid))
{
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('You are not authorized for this')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=ViewDisscussions.php\">";
}
}
}
else
{
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('This Discussion does not exist')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=EditProfile.php\">";
}
}
function addKeywords($tag,$mid)
{
$now = date("Y-m-d H:i:s");
$wordChunks = explode(" ", $tag);
for($i = 0; $i < count($wordChunks); $i++){
		$wordChunks[$i] = stripslashes($wordChunks[$i]);
		$wordChunks[$i] = mysql_real_escape_string($wordChunks[$i]);

	mysql_query("INSERT INTO `Keywords` (`mid`,`Keyword`,`counter`,`accessTime`) VALUES ('$mid','$wordChunks[$i]','0','$now')") 
	or die(mysql_error());
}
}
function delDiscussion($uid,$grdid)
{
$q = mysql_query("SELECT uid FROM `Group_Discussions` where `grdid`='$grdid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$check = $row['uid'];

if($check == $uid)
{
mysql_query("DELETE from `Group_Discussions` WHERE `uid` ='$uid' and `grdid` ='$grdid'") or die(mysql_error());
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Disscussion Deleted')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=ViewDisscussions.php\">";
}
else{
			echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('You are not authorized to do this')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=ViewDisscussions.php\">";
      }
      }

function delGMessage($uid,$grdmid,$url)
{

$q = mysql_query("SELECT uid FROM `GroupDisscussions_messages` where `grdmid`='$grdmid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$check = $row['uid'];

if($check == $uid)
{
mysql_query("DELETE from `GroupDisscussions_messages` WHERE `uid` ='$uid' and `grdmid` ='$grdmid'") or die(mysql_error());
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Post Deleted')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=$url\">";
}
else{
			echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('You are not authorized to do this')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=ViewDisscussions.php\">";
      }

        	
}

function sendGMessage($grdid,$usid,$mess)
{
$mess = stripslashes($mess);
$mess = mysql_real_escape_string($mess);
mysql_query("INSERT INTO `GroupDisscussions_messages` (`uid`,`grdid`,`Message`) VALUES ('$usid','$grdid','$mess')") or die(mysql_error());
			echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Sent :)')";
        	echo "</script>";
 
}

function startDisscussion($name,$uid)
{
$name = stripslashes($name);
$name = mysql_real_escape_string($name);
mysql_query("INSERT INTO `Group_Discussions` (`uid`,`Title`) VALUES ('$uid','$name')") or die(mysql_error());
			echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Disscussion about $name started :)')";
        	echo "</script>";
}

function delChannel($uid,$chid)
{

$q = mysql_query("SELECT uid FROM `Channels` where `chid`='$chid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$check = $row['uid'];

if($check == $uid)
{
mysql_query("DELETE from `Channels` WHERE `uid` ='$uid' and `chid` ='$chid'") or die(mysql_error());
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Channel Deleted')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=ViewChannel.php\">";
}
else{
			echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('You are not authorized to do this')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=Channels.php\">";
      }
      
}
function updatePassword($pass,$uid)
{
$pass = stripslashes($pass);
$pass = mysql_real_escape_string($pass);
mysql_query("UPDATE `userList` SET `Password` = '$pass' WHERE uid ='$uid'") or die(mysql_error());
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Password Updated to $pass')";
        	echo "</script>";
}
function updateAbout($about,$uid)
{
$about = stripslashes($about);
$about = mysql_real_escape_string($about);
	mysql_query("UPDATE `userList` SET `About` = '$about' WHERE uid ='$uid'") or die(mysql_error());
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Updated!')";
        	echo "</script>";
		
}
function updateAll($pass,$about,$uid)
{
$pass = stripslashes($pass);
$pass = mysql_real_escape_string($pass);
$about = stripslashes($about);
$about = mysql_real_escape_string($about);
mysql_query("UPDATE `userList` SET `About` = '$about' and `Password`='$pass'  WHERE uid ='$uid'") or die(mysql_error());
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Updated! Password:$pass')";
        	echo "</script>";
}
function channels(){
	$uid = $_SESSION['id'];
    echo "Post to my channel: <select name='chl'>";
    $q = mysql_query("SELECT * FROM `Channels` where uid='$uid'") or die(mysql_error());
    while ($row = mysql_fetch_assoc($q)){
        $name = $row['channel_name'];
        $id = $row['chid'];
        echo "<option value='$id'>$name</option>";   
    }
    echo "</select>";
}

function unsubsChannel($uid,$chid)
{
$q = mysql_query("SELECT * FROM `Subscribed_Channel` natural join `Channels` where `uid` = '$uid' and `chid`='$chid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$check = $row['chid'];
if(is_null($check))
{
 echo "IM SORRY :(";
}
else{
mysql_query("delete from `Subscribed_Channel` where `uid` = '$uid' and `chid`='$chid'") or die(mysql_error());
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Unsubscribed!')";
        	echo "</script>";
        	echo "<meta http-equiv=\"refresh\" content=\"0;url=ListSubscribes.php\">";
}
}

function subsChannel($uid,$chid)
{
$q = mysql_query("SELECT * FROM `Subscribed_Channel` natural join `Channels` where `uid` = '$uid' and `chid`='$chid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$check = $row['chid'];
if(is_null($check))
{
 mysql_query("INSERT INTO `Subscribed_Channel` (`uid`,`chid`) VALUES ('$uid','$chid') ") or die(mysql_error());
 echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Subscribed!')";
        	echo "</script>";
 echo "<meta http-equiv=\"refresh\" content=\"0;url=ChannelFeed.php\">";
}
else{
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('U have already subscribed to this Channel')";
        	echo "</script>";
}

}
function addMediaChannel($chid,$mid)
{
if(!is_null($chid)){
$q = mysql_query("select * from Channels_related where `mid`='$mid' and `chid`='$chid'") or die(mysql_error());
$row1 = mysql_fetch_assoc($q);
$meid = $row1['mid'];
if(is_null($meid)){
mysql_query("INSERT INTO `Channels_related` (`mid`,`chid`) VALUES ('$mid','$chid')") or die(mysql_error());
			echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Media Added to Channel :)')";
        	echo "</script>";
}
else
{
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Media is already added to this Channel!')";
        	echo "</script>";
}
}
else
{
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('No Channels to post Media')";
        	echo "</script>";
}
}

function addChannel($name)
{
$name = stripslashes($name);
$name = mysql_real_escape_string($name);
$uid = $_SESSION['id'];
mysql_query("INSERT INTO `Channels` (`uid`,`channel_name`) VALUES ('$uid','$name')") or die(mysql_error());
			echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Channel $name Added :)')";
        	echo "</script>";
}

function addFriendName($uid,$name)
{
$name = stripslashes($name);
$name = mysql_real_escape_string($name);
$q =  mysql_query("SELECT uid,UserName from `userList` where `UserName`='$name' or `Email`='$name'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$frid = $row['uid'];
if(!is_null($frid)){
if($uid!=$frid){
addFriend($uid,$frid);
}
else{echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('You Cannot add yourself as friend !')";
        	echo "</script>";}
}
else
{
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('User does not exist with the email or username you have given')";
        	echo "</script>";
}
}
function addHistory($uid,$mid)
{
$ip = getRealIpAddr();
$q =  mysql_query("SELECT * from `UserHistory` where `uid` = $uid and `mid`='$mid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$meid = $row['mid'];
if(is_null($meid)){
mysql_query("INSERT INTO `UserHistory` (`uid`,`mid`,`visitedIP`) VALUES ('$uid','$mid','$ip')") or die(mysql_error());
}
else
{
mysql_query("UPDATE `UserHistory` set `visitedIP`='$ip' where `uid`='$uid' and `mid`='$mid' ") or die(mysql_error());
}
}

function addMediaPlaylist($plid,$mid)
{
if(!is_null($plid)){
$q = mysql_query("select * from Playlists_related where `mid`='$mid' and `plid`='$plid'") or die(mysql_error());
$row1 = mysql_fetch_assoc($q);
$meid = $row1['mid'];
if(is_null($meid)){
mysql_query("INSERT INTO `Playlists_related` (`mid`,`plid`) VALUES ('$mid','$plid')") or die(mysql_error());
			echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Media Added to playlist :)')";
        	echo "</script>";
}
else
{
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Media is already added to this playlist!')";
        	echo "</script>";
}
}
else
{
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('No playlists to Add Media')";
        	echo "</script>";
}
}
function addPlaylist($name)
{
$name = stripslashes($name);
$name = mysql_real_escape_string($name);
$uid = $_SESSION['id'];
mysql_query("INSERT INTO `Playlists` (`uid`,`playlist_name`) VALUES ('$uid','$name')") or die(mysql_error());
			echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('$name Added :)')";
        	echo "</script>";
}
function recommendations()
{
$error = array();
$ip = getRealIpAddr();
$q = mysql_query("SELECT distinct(Type) FROM Media natural join `IP_Address` where `userIP` = '$ip' and `permission`='public' order by time_access desc limit 0,5") or die(mysql_error());
while($row1 = mysql_fetch_assoc($q)){
$term = $row1['Type'];
$term = trim($term);
$term = strip_tags($term);
if (strlen($term) < 3) {
      $error[] = "NO recommendations as of now";
   }else {
   	  $term = substr($term, 0, 4);
      $searchTermDB = mysql_real_escape_string($term);
   }
  if (count($error) < 1) {
  $searchSQL = "SELECT distinct(mid),Title,Description,MediaPath,Type,UserName,uid FROM Media m natural join userList u WHERE ";
  $types = array();
      $types = array_filter($types, "removeDislike");
      
      if (count($types) < 1)
         $types[] = "`Type` LIKE '%{$searchTermDB}%'"; 
      
          $andOr = isset($_GET['matchall'])?'OR':'OR';
      $searchSQL .= implode(" {$andOr} ", $types) . "and `permission`='public' ORDER BY `uploadTime` DESC limit 0,5"; 

      $searchResult = mysql_query($searchSQL) or trigger_error("There was an error.<br/>" . mysql_error() . "<br />SQL Was: {$searchSQL}");
if (mysql_num_rows($searchResult) < 1) {
         $error[] = "Keep using metube to get recommendations";
         
      }
      else {
 		$results = array();
         $i = 1;
         
         while ($row = mysql_fetch_assoc($searchResult)) {
    $id = $row['mid'];
    $name = $row['Title'];
    $text = $row['Description'];
    $type = $row['Type'];
    $usid = $row['uid'];
    $uname = $row['UserName'];
    $u = mysql_query("SELECT * FROM `Views` WHERE `mid`='$id'") or die(mysql_error());
	$row5 = mysql_fetch_assoc($u);
	$views=$row5['views'];
            $path = $row['MediaPath'];
            $type = $row['Type'];
            $dPath = "http://people.cs.clemson.edu/~sriprak/metube_revised/metube/".$path;
            if(stripos($type,"wmv")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a href=\"player_wmv.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$usid\">";
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
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$usid\">";
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
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$usid\">";
    		echo $uname."</a><b/><br/>";
    		echo "</div>";

        	            }
            elseif(stripos($type,"video")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a href=\"player.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><font size=\"2\" face=\"arial\" color=\"green\">";
			echo "<b>VIEWS:&nbsp;&nbsp;";
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$usid\">";
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
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$usid\">";
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
			echo number_format($views)."</b>";
			echo "</font><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$usid\">";
    		echo $uname."</a><b/><br/>";
			echo "</div>";			
            }

            else
            {
            echo "<div class='rbox'>";
            echo "<br/>";
            echo "No media to show. Share some by uploading.";
            echo "</div>";
            }
            }
            }
            }
            
            
      
}

}

function checkPermissions($mid,$oid)
{
$uid = $_SESSION['id'];
$q = mysql_query("SELECT * FROM `Media` natural join `FriendList` where `uid` = '$oid' and `mid`='$mid' and `uid_friend`='$uid' and `status` = '1'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$check = $row['mid'];
if(is_null($check))
{echo "<meta http-equiv=\"refresh\" content=\"0;url=Private.php\">";}
}


function checkDislikes($uid,$mid)
{
$q = mysql_query("SELECT * FROM `Likes_Dislikes` where `uid` = '$uid' and `mid`='$mid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$l = $row['likes'];
$d = $row['dislikes'];
if(($d == 1) && ($l == 0))
{
removeDislike($uid,$mid);
}
elseif(($d==0) || ($d == NULL))
{
addDislike($uid,$mid);
}
elseif(($d==0) && ($l == 1))
{
removeLike($uid,$mid);
addDislike($uid,$mid);
}
}
function checkLikes($uid,$mid)
{
$q = mysql_query("SELECT * FROM `Likes_Dislikes` where `uid` = '$uid' and `mid`='$mid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$l = $row['likes'];
$d = $row['dislikes'];
if(($l == 1) && ($d == 0))
{
removeLike($uid,$mid);
}
elseif(($l==0) || ($l == NULL))
{
addLike($uid,$mid);
}
elseif(($l==0) && ($d == 1))
{
removeDislike($uid,$mid);
addLike($uid,$mid);
}

}
function ignFriend($uid,$uidf)
{
$q = mysql_query("SELECT * FROM `FriendList` where `uid` = '$uid' and `uid_friend`='$uidf'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$check = $row['uid_friend'];
if($check==NULL)
{
 echo "IM SORRY :(";
}
else{
mysql_query("delete from `FriendList` where `uid` = '$uid' and `uid_friend`='$uidf'") or die(mysql_error());
mysql_query("delete from `FriendList` where `uid` = '$uidf' and `uid_friend`='$uid'") or die(mysql_error());
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Removed!')";
        	echo "</script>";
}

}
function appFriend($uid,$uidf)
{
$q = mysql_query("SELECT * FROM `FriendList` where `uid` = '$uidf' and `uid_friend`='$uid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$check = $row['uid_friend'];
if($check==NULL)
{
 echo "IM SORRY :( There was some problem try adding your friend again";
}
else{
mysql_query("update `FriendList` set `status`='1' where `uid` = '$uidf' and `uid_friend`='$uid'") or die(mysql_error());
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Approved!')";
        	echo "</script>";
}

}
function addFriend($uid,$uidf)
{
$q = mysql_query("SELECT * FROM `FriendList` where `uid` = '$uid' and `uid_friend`='$uidf'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$check = $row['uid_friend'];
if(is_null($check))
{
 mysql_query("INSERT INTO `FriendList` (`uid`,`uid_friend`) VALUES ('$uid','$uidf') ") or die(mysql_error());
 mysql_query("INSERT INTO `FriendList` (`uid`,`uid_friend`,`status`) VALUES ('$uidf','$uid','1')") or die(mysql_error());
 echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Friend Request sent :)')";
        	echo "</script>";
}
else{
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('U have already added this user as friend.We are waiting for for their acceptance :) or You both are already friends ;)')";
        	echo "</script>";
}

}
function blockFriend($uid,$uidf)
{
$q = mysql_query("SELECT * FROM `FriendList` where `uid` = '$uid' and `uid_friend`='$uidf'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$check = $row['uid_friend'];
if($check==NULL)
{
echo "You cannot block a user. Who is not on your friend List";
}
else{
mysql_query("update `FriendList` set `status`='-1' where `uid` = '$uid' and `uid_friend`='$uidf'") or die(mysql_error());
mysql_query("update `FriendList` set `status`='-1' where `uid` = '$uidf' and `uid_friend`='$uid'") or die(mysql_error());
}
}
function unblockFriend($uid,$uidf)
{
$q = mysql_query("SELECT * FROM `FriendList` where `uid` = '$uid' and `uid_friend`='$uidf'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$check = $row['uid_friend'];
if($check==NULL)
{
echo "You cannot block a user. Who is not on your friend List";
}
else{
mysql_query("update `FriendList` set `status`='1' where `uid` = '$uid' and `uid_friend`='$uidf'") or die(mysql_error());
mysql_query("update `FriendList` set `status`='1' where `uid` = '$uidf' and `uid_friend`='$uid'") or die(mysql_error());
}
}

function getRating($mid)
{
$q = mysql_query("SELECT AVG(rating) FROM `Media_Rating` where `mid` = '$mid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
return $row['AVG(rating)'];
}

function addRating($uid,$mid,$rating)
{
$r = mysql_query("SELECT * FROM `Media_Rating` where `mid` = '$mid'and uid='$uid'") or die(mysql_error());
$row = mysql_fetch_assoc($r);
$check = $row['rating']; 
if($check == NULL)
{
$q = mysql_query("INSERT INTO `Media_Rating` (`uid`,`mid`,`rating`) VALUES ('$uid','$mid','$rating') ") or die(mysql_error());

}
else
{
  mysql_query("UPDATE `Media_Rating` SET `rating`='$rating' where `uid`='$uid' and `mid`='$mid'") or die(mysql_error());
  
}
}

function Download($mid,$uid,$ip,$type)
{
mysql_query("INSERT INTO `Downloads` (`uid`,`mid`,`dtime`,`ip`,`type`) VALUES ('$uid','$mid','','$ip','$type')") or die(mysql_error());


}

function sendMessage($from,$to,$sub,$body)
{
$q = mysql_query("SELECT * FROM `FriendList` where `uid` = '$to'and `status`='-1'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$s = $row['status'];
if(is_null($s))
{
$sub = stripslashes($sub);
$sub = mysql_real_escape_string($sub);
$body = stripslashes($body);
$body = mysql_real_escape_string($body);
 mysql_query("INSERT INTO `Messaging` (`from_uid`,`to_uid`,`Subject`,`Message`) VALUES ('$from','$to','$sub','$body') ") or die(mysql_error());
 mysql_query("INSERT INTO `Messaging_sent` (`to_uid_sent`,`from_uid_sent`,`Subject`,`Message`) VALUES ('$to','$from','$sub','$body') ") or die(mysql_error());
  echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Message Sent :)')";
        	echo "</script>";
}
else
{
echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('For some reasons we dont know :( The user has blocked you')";
        	echo "</script>";
}

}

function friends(){
	$uid = $_SESSION["id"]; 
    echo "Friends: <select name='friend'>";
    $q = mysql_query("SELECT * FROM `FriendList` where `uid` = '$uid' and `status`='1' ") or die(mysql_error());
    while ($row = mysql_fetch_assoc($q)){
        $id= $row['uid_friend'];
         $r = mysql_query("SELECT * FROM `userList` where `uid` = '$id'") or die(mysql_error());
         $row1 = mysql_fetch_assoc($r);
         $name = $row1['Name'];
        echo "<option value='$id'>$name</option>";
    }
    echo "</select>";
}

function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
function addIPAddress($mid)
{
$ip = getRealIpAddr();
$s = mysql_query("SELECT COUNT(*) FROM `IP_Address` WHERE mid = '$mid' and userIP='$ip'") or die(mysql_error());
$row = mysql_fetch_assoc($s);
$c = $row['COUNT(*)'];
if($c == 0)
{
mysql_query("INSERT INTO `IP_Address` (`mid`,`userIP`) VALUES ('$mid','$ip')") or die(mysql_error());
}
else
{
mysql_query("UPDATE `IP_Address` set `time_access` = CURRENT_TIMESTAMP WHERE mid = '$mid' and userIP='$ip' ") or die(mysql_error());
}
}
function addView($mid)
{
$q = mysql_query("SELECT * FROM `Views` where mid = '$mid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$id = $row['mid'];
$views = $row['views'];
$nviews = $views + 1;

$r = mysql_query("SELECT * FROM `IP_Address` where mid = '$mid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
if($id == NULL){
mysql_query("INSERT INTO `Views` (`mid`,`views`) VALUES ('$mid','1')") or die(mysql_error());
}
else
{
mysql_query("UPDATE `Views` SET `views`='$nviews' where `mid`='$mid'") or die(mysql_error()); 
}

}
function favouriteMedia($uid,$mid)
{
$q = mysql_query("SELECT * FROM `Favourites` where mid = '$mid' and uid = '$uid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
$fid = $row['fid'];
if($fid == NULL){
mysql_query("INSERT INTO `Favourites` (`uid`,`mid`) VALUES ('$uid','$mid')") or die(mysql_error());
}
else
{
echo"<script language=\"javascript\" type=\"text/javascript\">";
        	echo"alert('We already know this is your favourite ;)')";
        	echo"</script>";

}
}

function removeDislike($uid,$mid)
{
 $q = mysql_query("SELECT * FROM `Likes_Dislikes` where `mid` = '$mid'and `uid`='$uid'") or die(mysql_error());
	$row = mysql_fetch_assoc($q);
	$lid = $row['mid'];
	$id = $row['uid']; 
	$dlikes = $row['dislikes'];
	$ndlikes = $dlikes - 1;
	
    mysql_query("UPDATE `Likes_Dislikes` SET `dislikes`='$ndlikes' where `mid`=$lid and `uid`='$id'") or die(mysql_error());  
}
function addDislike($uid,$mid)
{
	$q = mysql_query("SELECT * FROM Likes_Dislikes where mid = '$mid'and `uid`='$uid'") or die(mysql_error());
	$row = mysql_fetch_assoc($q);
	$lid = $row['mid'];
	$id = $row['uid']; 
	$dlikes = $row['dislikes'];
	$ndlikes = $dlikes + 1;
   if($lid == NULL){
    mysql_query("INSERT INTO `Likes_Dislikes` (`uid`,`mid`,`dislikes`) VALUES ('$uid','$mid','1')") or die(mysql_error());
    }
    else{
    mysql_query("UPDATE `Likes_Dislikes` SET `dislikes`='$ndlikes' where `mid`='$lid' and `uid`='$id'") or die(mysql_error()); 
    } 

    }

function removeLike($uid,$mid)
{
   $q = mysql_query("SELECT * FROM `Likes_Dislikes` where `mid` = '$mid' and `uid`='$uid'") or die(mysql_error());
	$row = mysql_fetch_assoc($q);
	$lid = $row['mid'];
	$id = $row['uid']; 
	$likes = $row['likes'];
	$nlikes = $likes - 1;
    
    mysql_query("UPDATE `Likes_Dislikes` SET `likes`='$nlikes' where `mid`=$lid and `uid`='$id'") or die(mysql_error()); 
	}
function addLike($uid,$mid)
{
	$q = mysql_query("SELECT * FROM `Likes_Dislikes` where `mid` = '$mid'and `uid`='$uid'") or die(mysql_error());
	$row = mysql_fetch_assoc($q);
	$lid = $row['mid'];
	$id = $row['uid']; 
	$likes = $row['likes'];
	$nlikes = $likes + 1;
	if($lid == NULL){
    mysql_query("INSERT INTO `Likes_Dislikes` (`uid`,`mid`,`likes`) VALUES ('$uid','$mid','1')") or die(mysql_error());
    }
    else{
    mysql_query("UPDATE `Likes_Dislikes` SET `likes`='$nlikes' where `mid`='$lid' and `uid`='$id'") or die(mysql_error()); 
    } 
}

function addComment($id,$mid,$comment)
{
$comment = stripslashes($comment);
$comment = mysql_real_escape_string($comment);
mysql_query("INSERT INTO `Comments` (`uid`,`mid`,`comment`) VALUES ('$id','$mid','$comment')") 
	or die(mysql_error());
	echo "<meta http-equiv=\"refresh\" content=\"0\">";
}


function restrictUsername($username){
$username = stripslashes($username);
$username = mysql_real_escape_string($username);
$q = mysql_query("SELECT count(*) from `userList` where `UserName`='$username'");
 while ($row = mysql_fetch_assoc($q)){
$c = $row['count(*)'];
}
return $c;
}
function checkuser($username){
$username = stripslashes($username);
$username = mysql_real_escape_string($username);
$q = mysql_query("SELECT count(*) from `userList` where `UserName`='$username'");
 while ($row = mysql_fetch_assoc($q)){
$c = $row['count(*)'];
}
if ($c == 0){
echo"<script language=\"javascript\" type=\"text/javascript\">";
echo"alert('Username is available')";
echo"</script>";
}
else{
echo"<script language=\"javascript\" type=\"text/javascript\">";
echo"alert('Username is taken. Choose something else.')";
echo"</script>";
}
}
function restrictEmail($email){
$email = stripslashes($email);
$email = mysql_real_escape_string($email);
$q = mysql_query("SELECT count(*) from `userList` where `Email`='$email'");
 while ($row = mysql_fetch_assoc($q)){
$c = $row['count(*)'];
}
return $c;
}

function updateAccessTime($uid)
{
$q = mysql_query("UPDATE `userList` SET `LastAccessTime` where `uid`='$uid'") or die(mysql_error()); 
}

function check_email($email){
if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){ 
return 0; 
}else{
return 1;} 

}
function forgot_pass($mail){
require_once "Mail.php";
$q = mysql_query("SELECT * from `userList` where `Email`='$mail'");
$row = mysql_fetch_assoc($q);
$email = $row['Email'];
$pass = $row['Password'];
$message = "Your password is: ".$pass;
        $from = "<metubeassistance.gmail.com>";
        $to = "<sabharwal.rishi.gmail.com>";
        $subject = "Hi!";
        $body = "Hi,\n\nHow are you?";

        $host = "ssl://smtp.gmail.com";
        $port = "465";
        $username = "metubeassistance.gmail.com";
        $password = "cpsc662g5";

        $headers = array ('From' => $from,
          'To' => $to,
          'Subject' => $subject);
        $smtp = Mail::factory('smtp',
          array ('host' => $host,
            'port' => $port,
            'auth' => true,
            'username' => $username,
            'password' => $password));

        $mail = $smtp->send($to, $headers, $body);

        if (PEAR::isError($mail)) {
          echo("<p>" . $mail->getMessage() . "</p>");
         } else {
          echo("<p>You will recieve your password shortly</p>");
         }
}
function permissions(){
    echo "View Control: <select name='per'>";
    $q = mysql_query("SELECT * FROM `Permission`") or die(mysql_error());
    while ($row = mysql_fetch_assoc($q)){
        $name = $row['permission'];
        echo "<option value='$name'>$name</option>";
    }
    echo "</select>";
}
function playlists(){
	$uid = $_SESSION['id'];
    echo "Playlists: <select name='ply'>";
    $q = mysql_query("SELECT * FROM `Playlists` where uid='$uid'") or die(mysql_error());
    while ($row = mysql_fetch_assoc($q)){
        $name = $row['playlist_name'];
        $id = $row['plid'];
        echo "<option value='$id'>$name</option>";   
    }
    echo "</select>";
}

function categories(){
    echo "Category: <select name='cat'>";
    $q = mysql_query("SELECT * FROM `Categories`") or die(mysql_error());
    while ($row = mysql_fetch_assoc($q)){
        $name = $row['Category'];
        echo "<option value='$name'>$name</option>";
    }
    echo "</select>";
}
function upload_profilepic($media_info, $p_id)
{
$hash = md5($media_info["name"]);
    $hash = substr($hash,0,5);
    $media_type = $media_info["type"];
    if(stripos($media_type,"image")!==false)
        $type = "image/"; 
    elseif(stripos($media_type,"video")!==false)
        $type = "video/";
    else
        $type = "";
    $fn = "upload/".$type.$hash."-".$media_info["name"];
    if(!file_exists($fn)){
        move_uploaded_file($media_info["tmp_name"],$fn );
    }
    if(file_exists($fn)){                                                      
        $media_name = $media_info["name"];
        $media_type = $media_info["type"];
        $q = mysql_query("UPDATE `userList` SET `ProfilePicture` = '$fn' WHERE uid ='$p_id'") or die(mysql_error());
    
    }

}

function login($myusername,$mypassword)
{
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM `userList` WHERE `UserName`='$myusername' and `Password`='$mypassword'";
$result=mysql_query($sql);
$row = mysql_fetch_assoc($result);
$uid = $row['uid'];
$name= $row['Name'];
$count=mysql_num_rows($result);


if($count==1){

$_SESSION["username"] = $myusername;
$_SESSION["id"]=$uid;
$_SESSION["name"]=$name;
mysql_query("UPDATE `userList` SET `LastAccessTime`=CURRENT_TIMESTAMP where `uid`='$uid'") or die(mysql_error());
header("location:EditProfile.php");
}
else {
echo "<div class='sform'>";
echo "Wrong Username or Password!";
echo "<br/>";
echo "Check your user name and password and try again.";
echo"<br/>";
echo "<a id =\"login\" href=\"Login.php\">TRY AGAIN</a>";
echo "</div>";
}

}

function sign_up($username,$name,$password,$email,$dob,$about,$sex)
{
$susername = stripslashes($username);
$sname = stripslashes($name);
$spassword = stripslashes($password);
$sabout = stripslashes($about);
$semail = stripslashes($email);
$susername = mysql_real_escape_string($username);
$text = mysql_real_escape_string($name);
$title = mysql_real_escape_string($password);
$text = mysql_real_escape_string($about);
$title = mysql_real_escape_string($email);
mysql_query("INSERT INTO `userList` (`UserName`,`Name`,`Password`,`About`,`Email`,`DOB`,`CreatedTime`,`sex`) VALUES ('$susername','$sname','$spassword','$sabout','$semail','$dob',CURRENT_TIMESTAMP,'$sex')") or die(mysql_error());
echo '<script type="text/javascript">'; 
echo 'alert("'. $susername.' has been added.")'; 
echo '</script>';
return mysql_insert_id();
}

function add_Media($media_info,$title,$text,$cat,$ip,$per){
$title = stripslashes($title);
$text = stripslashes($text);
$title = mysql_real_escape_string($title);
$text = mysql_real_escape_string($text);
	$hash = md5($media_info["name"]);
    $hash = substr($hash,0,5);
    $media_type = $media_info["type"];
    if(stripos($media_type,"image")!==false)
        $type = "image/"; 
    elseif(stripos($media_type,"video")!==false)
        $type = "video/";
    else
        $type = "";
    $uid = $_SESSION["id"];
    if(stripos($media_type,"image")!==false){
    $q = mysql_query("INSERT INTO `Media` (`uid`,`Title`,`Description`,`Category`,`uploadIP`,`permission`) VALUES ('$uid','$title','$text','$cat','$ip','$per') ") or die(mysql_error());
    return mysql_insert_id();
    }
    elseif(stripos($media_type,"video")!==false)
    {
    $q = mysql_query("INSERT INTO `Media` (`uid`,`Title`,`Description`,`Category`,`uploadIP`,`permission`) VALUES ('$uid','$title','$text','$cat','$ip','$per') ") or die(mysql_error());
    return mysql_insert_id();
    }
    elseif(stripos($media_type,"audio")!==false)
    {
    $q = mysql_query("INSERT INTO `Media` (`uid`,`Title`,`Description`,`Category`,`uploadIP`,`permission`) VALUES ('$uid','$title','$text','$cat','$ip','$per') ") or die(mysql_error());
    return mysql_insert_id();
    }
}


function upload_media($media_info, $p_id){
	
    $hash = md5($media_info["name"]);
    $hash = substr($hash,0,5);
    $media_type = $media_info["type"];
    if(stripos($media_type,"image")!==false)
        $type = "image/"; 
    elseif(stripos($media_type,"video")!==false)
        $type = "video/";
    elseif(stripos($media_type,"audio")!==false)
    $type = "video/";
    else
        $type = "";
    $fn = "upload/".$type.$hash."-".$media_info["name"];
    
    if(!file_exists($fn)){
        move_uploaded_file($media_info["tmp_name"],$fn );
    }
    if(file_exists($fn)){                                                 
        $media_name = $media_info["name"];
        $media_type = $media_info["type"];
        if(stripos($media_type,"image")!==false)
        {
         $q = mysql_query("UPDATE `Media` SET `Type` = '$media_type', `MediaPath` = '$fn' WHERE mid ='$p_id'") or die(mysql_error());
        echo"<script language=\"javascript\" type=\"text/javascript\">";
        echo"alert('UPLOADED :)')";
        echo"</script>";
        }
         elseif(stripos($media_type,"video")!==false)
        {
        $q = mysql_query("UPDATE `Media` SET `Type` = '$media_type', `MediaPath` = '$fn' WHERE mid ='$p_id'") or die(mysql_error());
        echo"<script language=\"javascript\" type=\"text/javascript\">";
        echo"alert('UPLOADED :)')";
        echo"</script>";
        }
        elseif(stripos($media_type,"audio")!==false)
        {
        $q = mysql_query("UPDATE `Media` SET `Type` = '$media_type', `MediaPath` = '$fn' WHERE mid ='$p_id'") or die(mysql_error());
        echo"<script language=\"javascript\" type=\"text/javascript\">";
        echo"alert('UPLOADED :)')";
        echo"</script>";
        }
        else
        {
         	echo"<script language=\"javascript\" type=\"text/javascript\">";
        	echo"alert('File Format not supported! :(')";
        	echo"</script>";
        }
    }
}

?>

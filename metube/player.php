<?php
session_start();
include('connect.php');
require('Header.php');
if(isset($_SESSION['id'])){
     $usersid = $_SESSION['id'];
    }
if(isset($_GET['mid'])){
    	$meid = $_GET['mid'];
    $z = mysql_query("SELECT uid,permission FROM `Media` WHERE mid='$meid' and `permission`='private'") or die(mysql_error());
    $row10 = mysql_fetch_assoc($z);
    $permission = $row10['permission'];
    $oid = $row10['uid'];
    if(strcmp($permission,'private')==0)
    {
    if($usersid != $oid){
    checkPermissions($meid,$oid);
    }
    }
    if(isset($_SESSION['id'])){
    $id = $_SESSION["id"];
    }
    $mid = $_GET['mid'];
    if(isset($_SESSION['id'])){
    addHistory($id,$mid);
    }
    $ip = getRealIpAddr();
    $count = 0;
    $s = mysql_query("SELECT * FROM `IP_Address` WHERE mid='$mid'") or die(mysql_error());
     while($row1 = mysql_fetch_assoc($s))
     {
     $ipc = $row1['userIP'];
     $i = strcmp($ip,$ipc);
     if($i == 0)
     {
        $count = $count + 1;
    	break;
     }
         }
    if($count == 0)
    {
    addView($mid);
    }
    addIPAddress($mid);
    
    $q = mysql_query("SELECT * FROM `Media` WHERE mid='$mid'") or die(mysql_error());
    
    $row = mysql_fetch_assoc($q);
    $path = $row["MediaPath"];
    $name = $row['Title'];
    $text = $row['Description'];
    $type = $row['Type'];  
    if(isset($_POST['comment'])){
    if($_SESSION["username"]){
      if(strlen($_POST['text'])>0){
      addComment($id,$mid,$_POST['text']);
      }
    }
    else
    {
    $url = $_SERVER['REQUEST_URI'];
	echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
    }
    }
 }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<head>
<title>
PLAYER
</title>
</head>
<body>
<div class='image'>
   <br/><b><?php echo $name;?></b><br/>
    <!-- START OF THE PLAYER EMBEDDING TO COPY-PASTE -->
        <div id="mediaplayer">JW Player goes here</div>

        <script type="text/javascript" src="jwplayer/jwplayer.js"></script>
        <script type="text/javascript">
                jwplayer("mediaplayer").setup({
                        flashplayer: "jwplayer/player.swf",
                        file: "<?php echo $path;?>",
                        //image: "upload/images/preview.png"
                        height: 400,
                        width: 500
                });
        </script>
        <!-- END OF THE PLAYER EMBEDDING -->
	<br/><b>Description:<br/></b><?php echo $text;?><br/><br/>
	<?php
	if(isset($_POST['like']))
	{
	if(isset($_SESSION["username"])){
	   checkLikes($id,$mid);
	   echo "<meta http-equiv=\"refresh\" content=\"0\">";
	  }
	   else
    {
   	$url = $_SERVER['REQUEST_URI'];
	echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";

    }
	}
	if(isset($_POST['dislike']))
	{
	if(isset($_SESSION["username"])){
	   checkDislikes($id,$mid);
	   echo "<meta http-equiv=\"refresh\" content=\"0\">";
	  }
	   else
    {
	$url = $_SERVER['REQUEST_URI'];
	echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";    
	}
	}
    if(isset($_POST['favour']))
    {
    if(isset($_SESSION["username"])){
    favouriteMedia($id,$mid);
    }
    else
    {
    $url = $_SERVER['REQUEST_URI'];
	echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
    }
    }
    if(isset($_POST['playlist']))
    {
    if(isset($_SESSION["username"])){
    addMediaPlaylist($_POST['ply'],$mid);
    }
    else
    {
    $url = $_SERVER['REQUEST_URI'];
	echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
    }
    }
    if(isset($_POST['rate']))
    {
    if(isset($_SESSION["username"])){
    addRating($id,$mid,$_POST['rating']);
    echo "<meta http-equiv=\"refresh\" content=\"0\">";
    }
    else
    {
    $url = $_SERVER['REQUEST_URI'];
	echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
    }
    }
    if(isset($_POST['channel']))
    {
    if(isset($_SESSION["username"])){
    addMediaChannel($_POST['chl'],$mid);
    }
    else
    {
    $url = $_SERVER['REQUEST_URI'];
	echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
    }
    }

    $u = mysql_query("SELECT * FROM `Views` WHERE mid='$mid'") or die(mysql_error());
	$row5 = mysql_fetch_assoc($u);
	$views=$row5['views'];
	echo "<font size=\"3\" face=\"arial\" color=\"blue\">";
	echo "VIEWS:&nbsp;&nbsp;";
	echo number_format($views);
	echo "</font>";
	echo "<br/>";
	$t = mysql_query("SELECT count(mid) FROM `Downloads` WHERE mid='$mid'") or die(mysql_error());
	$row6 = mysql_fetch_assoc($t);
	$downss=$row6['count(mid)'];
	echo "<font size=\"3\" face=\"arial\" color=\"blue\">";
	echo "DOWNLOADS:&nbsp;&nbsp;";
	echo number_format($downss);
	echo "</font>";
	echo "<br/>";
	echo "<font size=\"2\" face=\"arial\" color=\"green\">";
	echo "Rating:&nbsp;&nbsp;";
	$rate = getRating($mid);
	if($rate != NULL)
	{
	echo round($rate, 2);
	}
	else
	{echo "No one rated this media yet. Be first";}
	echo "</font>";
	echo "<br/>";
	$t = mysql_query("SELECT SUM(likes),SUM(dislikes) FROM `Likes_Dislikes` WHERE mid='$mid'") or die(mysql_error());
	$row4 = mysql_fetch_assoc($t);
	echo "<font size=\"1\" face=\"arial\" color=\"red\">";
	echo "LIKES:";
	$lks=$row4['SUM(likes)'];
	if ($lks == NULL){
	echo "0";
	}
	else{
	echo number_format($lks);
	}
	echo "&nbsp;&nbsp;DISLIKES:";
	$dlks=$row4['SUM(dislikes)'];
	if ($dlks == NULL){
	echo "0";
	}
	else{
	echo number_format($dlks);
	}
	echo "</font>";
	?>
	<br/>
	<form method="post" action="" enctype="multipart/form-data">
	<input type="submit" class="button" name="like" value="Like"/>
	<input name="dislike" class="button" value="Dislike" type="submit" value="Dislike"/>
	<input name="favour" class="button" value="Favourite" type="submit"/>
	&nbsp;&nbsp;Rating:<select style="text-align:right;" name='rating'>
	<option value='1'>★</option>
	<option value='2'>★★</option>
	<option value='3'>★★★</option>
	<option value='4'>★★★★</option>
	<option value='5'>★★★★★</option>
	</select>
  	&nbsp;<input type="submit" class="button" name="rate" value="Rate"/>
	<br/><br/>
	<?php if(isset($_SESSION['username'])){
	$q = mysql_query("SELECT * FROM `Playlists` where uid='$uid'") or die(mysql_error());
    while ($row = mysql_fetch_assoc($q)){
    $id = $row['plid'];
    if(!is_null($id)){
	playlists();echo "&nbsp;<input name=\"playlist\" class=\"button\" value=\"add to playlist!\" type=\"submit\"/>";
	break;
	}
	else{echo "&nbsp;<input name=\"create\" class=\"button\" value=\"Create playlists!\" type=\"submit\"/>";}
	}
	}
	echo "<br/>";
	echo "<br/>";
	if(isset($_SESSION['username'])){
	$q = mysql_query("SELECT * FROM `Channels` where uid='$uid'") or die(mysql_error());
    while ($row = mysql_fetch_assoc($q)){
    $id = $row['chid'];
    if(!is_null($id)){
	channels();echo "&nbsp;<input name=\"channel\" class=\"button\" value=\"Post!\" type=\"submit\"/>";
	break;
	}
	else{echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('You have no channels created :)')";
        	echo "</script>";}
	}
	} 
	?>

	<br/>
	<br/><b><a style=\"color:red; font-size: 12pt" href="Downloads.php?mid=<?php echo "$mid";?>" target="_blank">DOWNLOAD</a><b/><br/>
    <?php
    if(!isset($_SESSION['id'])){
    echo "<p>(Registered users only)</p>";
    }
    ?>
    <br/>
    </form>
     <br/>
	<?php
	echo "<comments>";
	echo "<br/>";
	echo "<span id=\"Comments\">Comments:</span>";
	echo "<br/>";
	$r = mysql_query("SELECT uid,cvid,mid,comment FROM `Comments` WHERE mid='$mid'") or die(mysql_error());
	while ($row2 = mysql_fetch_assoc($r)){
	$uid = $row2['uid'];
	$cvid = $row2['cvid'];
	$comment = $row2['comment'];
	$s = mysql_query("SELECT * FROM `userList` WHERE uid='$uid'") or die(mysql_error());
	$row3 = mysql_fetch_assoc($s);
	$user = $row3['UserName'];
	echo "<br/>";
	echo $comment;
	echo "<br/>";
	echo "<b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$uid\">";
	echo $user."</a><b/><br/>";
	echo "<br/>";
	if($uid == $usersid){
	$url = $_SERVER['REQUEST_URI'];
	echo "<b><a style=\"color:red; font-size: 06pt\" href=\"CommentControl.php?id=$cvid&cat=del&url=$url\">";
	echo "DELETE</a><b/><br/>";
	}
	echo "<br/>";
	echo "</comments>";
	}
	
	?>
	<form method="post" action="" enctype="multipart/form-data">
	<br/><br/>
    <textarea name='text'class='cb' rows='6' cols='60'></textarea><br/>
    <br/>
    <br/>
   <input type="submit" class="button" name="comment" value="Comment"/>
    </form>

			</div>
		<br/>
	
</body>
</html>

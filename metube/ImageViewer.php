<?php
session_start();
include('connect.php');
require('Header.php');
if(!isset($_SESSION['username'])){
$username = 'Guest';
}
else { $username = $_SESSION['username']; }
if(isset($_GET['mid'])){
	$meid = $_GET['mid'];
    $z = mysql_query("SELECT uid,permission FROM `Media` WHERE mid='$meid'") or die(mysql_error());
    $row10 = mysql_fetch_assoc($z);
    $permission = $row10['permission'];
    $oid = $row10['uid'];
    if(isset($_SESSION['id'])){
     $usersid = $_SESSION['id'];
    }
    if(strcmp($permission,'private')==0)
    {
    if($usersid != $oid){
    checkPermissions($meid,$oid);
    }
    }
    if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
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
    $r = mysql_query("SELECT uid,cvid,mid,comment FROM `Comments` WHERE mid='$mid'") or die(mysql_error());
    $q = mysql_query("SELECT * FROM `Media`WHERE mid='$mid'") or die(mysql_error());
    
    $row = mysql_fetch_assoc($q);
    $path = $row["MediaPath"];
    $name = $row['Title'];
    $text = $row['Description'];
    $type = $row['Type'];
    list($width, $height, $type, $attr) = getimagesize($path); 
    if(isset($_POST['comment'])){
    if($_SESSION["username"]){
      if(strlen($_POST['text'])>0){
      addComment($id,$mid,$_POST['text']);
      echo "<meta http-equiv=\"refresh\" content=\"0\">";
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
Image View
</title>
<SCRIPT TYPE="text/javascript"> 
 
var message="Sorry, right-click has been disabled"; 

function clickIE() {if (document.all) {(message);return false;}} 
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) { 
if (e.which==2||e.which==3) {(message);return false;}}} 
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;} 
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;} 
document.oncontextmenu=new Function("return false")  
</SCRIPT> 


</head>

<body>
<div class='image'>
<?php
    echo "<br/><b>".$name."</b><br/>";

?>
<br/>
<img src="<?php echo $path;?>" alt="image" width="500" height="400"/>
 <?php
 echo "<br/><b>Description:<br/></b>".$text."<br/>";
?>
<br/>
<br/>
<p>
*Actual size of the image(<?php echo $width."*".$height;?>)
</p>
<p>Right click has been disabled on this page</p>
<br/>
<?php
	if(isset($_POST['like']))
	{
	if($_SESSION["username"]){
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
	if($_SESSION["username"]){
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
    if($_SESSION["username"]){
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
    if($_SESSION["username"]){
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
    if($_SESSION["username"]){
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
    if($_SESSION["username"]){
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
	$q = mysql_query("SELECT distinct(plid) FROM `Playlists` where uid='$uid'") or die(mysql_error());
    while ($row = mysql_fetch_assoc($q)){
    $id = $row['plid'];
    if(!is_null($id)){
	playlists();echo "&nbsp;<input name=\"playlist\" class=\"button\" value=\"add to playlist!\" type=\"submit\"/>";
	break;
	}
	elseif(is_null($id)){
	echo "Create playlists to add media to your playlists";        	
	}
	}
	}
	echo "<br/>";
	echo "<br/>";
	if(isset($_SESSION['username'])){
	$q = mysql_query("SELECT distinct(chid) FROM `Channels` where uid='$uid'") or die(mysql_error());
    while ($row = mysql_fetch_assoc($q)){
    $id = $row['chid'];
    if(!is_null($id)){
	channels();echo "&nbsp;<input name=\"channel\" class=\"button\" value=\"Post!\" type=\"submit\"/>";
	break;
	}
	else{echo "Create Channels to post media to your channels";}
	}
	} 
	?>
    <br/>
    <br/><b><a style=\"color:red; font-size: 12pt" href="Downloads.php?mid=<?php echo "$mid";?>" target="_blank">DOWNLOAD</a><b/><br/>
    <?php
    if(!isset($_SESSION["id"])){
    echo "<p>(Registered users only)</p>";
    }
    ?>
    <br/>
    <br/>
    </form>
     <br/>
	<?php
	echo "<comments>";
	echo "<br/>";
	echo "Comments:";
	echo "<br/>";
	while ($row1 = mysql_fetch_assoc($r)){
	$uid = $row1['uid'];
	$cvid = $row1['cvid'];
	$comment = $row1['comment'];
	$s = mysql_query("SELECT * FROM `userList` WHERE uid='$uid'") or die(mysql_error());
	$row3 = mysql_fetch_assoc($s);
	$user = $row3['UserName'];
	echo "<br/>";
	echo $comment;
	echo "<br/>";
	echo "<b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$uid\">";
	echo $user."</a><b/><br/><br/>";
	if($uid == $usersid){
	$url = $_SERVER['REQUEST_URI'];
	echo "<b><a style=\"color:red; font-size: 06pt\" href=\"CommentControl.php?id=$cvid&cat=del&url=$url\">";
	echo "DELETE</a><b/><br/>";
	}
	echo "<br/>";
	echo "<br/>";
	echo "</comments>";
	}
	
	?>
	<form method="post" action="" enctype="multipart/form-data">
	<br/><br/>
    <textarea name='text' class='cb' rows='6' cols='60'></textarea><br/>
    <br/>
  	<input type="submit" class="button" name="comment" value="Comment"/>
    </form>
</div>
</body>
</html>

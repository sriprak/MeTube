<?php
include("functions.php");
if(!isset($_SESSION['username'])){
$username = 'Guest';
}
else {
$username=$_SESSION['username'];
$uid=$_SESSION['id'];
}
?>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="SHORTCUT ICON" href="images/Logos/favi.ico"/>
        <meta name="author" content="cTn" />
        <title> METUBE </title>
    </head>
    <body onload="initiate()">
		<div id="main-wrapper">	
			<div id="center">
				<div id="logo">
				<p><a href="Search.php">
<img src="images/Logos/Metube5.png" alt="logo" width="300" height="100" />
</a>
</p>
				</div>
			</div>		
		</div>
	</body>
	<body>

</div>


<div id="menu-bar">
	<li><a id="search"  href="Search.php">Search</a></li>
    <li><a id="browse"  href="Browse.php">Videos</a></li>
    <li><a id="browseI"  href="Browse_images.php">Images</a></li>
    <li><a id="browseA"  href="Browse_audio.php">Audio</a></li>
    <?php
if(isset($_SESSION['username'])){
$user = $_SESSION['username'];
echo "<li><a id=\"channels\"  href=\"Channels.php\">Channels</a></li>";
} 
?>
    <li><?php
if(isset($_SESSION['username'])){
echo "<a id=\"upload\" href=\"Upload.php\">Upload</a>";
}
?></li>

    <li><?php
if(!isset($_SESSION['username'])){
echo "<a id=\"signIn\" href=\"Login.php\">Sign In</a>";
}
?></li>

    <li><?php
if(isset($_SESSION['username'])){
$user = $_SESSION["username"];
echo "<a id=\"userinfo\" href=\"EditProfile.php\">".$user."</a>";
}
?></li>
<li><?php
if(!isset($_SESSION['username'])){
echo "<a id=\"signUp\" href=\"SignUp.php\">Sign Up</a>";
}
?></li>
<li><a id="about"  href="About.php">About Metube</a></li>
</div>
<div class="recomm">
<p>RECOMMENDED:</p>
<?php 
recommendations();
?>
</div>
 <div id="tagcloud">
<h3>POPULAR SEARCHES</h3>
<b>
<?php
$terms = array(); 
$maximum = 0; 
 
$query = mysql_query("SELECT distinct(Keyword),counter FROM Keywords ORDER BY counter DESC LIMIT 100");
 
while ($row = mysql_fetch_array($query))
{
    $term = $row['Keyword'];
    $counter = $row['counter'];
    if ($counter > $maximum) $maximum = $counter;
 
    $terms[] = array('term' => $term, 'counter' => $counter);
 
}
 
shuffle($terms);
foreach ($terms as $term):
 $percent = floor(($term['counter'] / $maximum) * 100);
 
 if ($percent < 20):
   $class = 'smallest';
 elseif ($percent >= 20 and $percent < 40):
   $class = 'small';
 elseif ($percent >= 40 and $percent < 60):
   $class = 'medium';
 elseif ($percent >= 60 and $percent < 80):
   $class = 'large';
 else:
 $class = 'largest';
 endif;
?>
<span class="<?php echo $class; ?>">
  <a href="Search.php?search=<?php echo $term['term']; ?>"><?php echo $term['term']; ?></a>
</span>
<?php endforeach; ?>
</b>
</div>

</div>
<div id="side-bar">
    <ul>
    			<li><a href="TopRated.php" title="TopRated">TOP RATED</a></li>
        		<li><a href="MostViewed.php" title="mostviewed">MOST VIEWED</a></li>
			<li><a href="Categories.php?cat=education" title="education">EDUCATION</a></li>
			<li><a href="Categories.php?cat=sports" title="Sports">SPORTS</a></li>
			<li><a href="Categories.php?cat=history" title="history">HISTORY</a></li>
			<li><a href="Categories.php?cat=music" title="music">MUSIC</a></li>
			<li><a href="Categories.php?cat=movies" title="movies">MOVIES</a></li>
			<li><a href="Categories.php?cat=comedy" title="movies">COMEDY</a></li>
			<?php
			if(isset($_SESSION['username'])){
			echo "<li>";
			echo "<a id=\"users\" href=\"UserList.php\">USERS</a>";
			echo "</li>";
			echo "<li>";
			echo "<a id=\"friendfeed\" href=\"FriendFeed.php\">Friend Feed</a>";
			echo "</li>";
			echo "<li>";
			echo "<a id=\"channelfeed\" href=\"ChannelFeed.php\">Channel Feed</a>";
			echo "</li>";
			echo "<li>";
			echo "<a id=\"favorite\" href=\"Favourites.php\">My Favorites</a>";
			echo "</li>";
			echo "<li>";
			echo "<a id=\"playlists\" href=\"ViewPlaylist.php\">My Playlists</a>";
			echo "</li>";
			echo "<li>";
			echo "<a id=\"history\" href=\"UserHistory.php\">My History</a>";
			echo "</li>";
			$q = mysql_query("SELECT COUNT(*) FROM `Messaging` where to_uid='$uid' and status='0'") or die(mysql_error());
			$row = mysql_fetch_assoc($q);
			$unread = $row['COUNT(*)'];
			echo "<li>";
			echo "<a id=\"messages\" href=\"Inbox.php\">Messages(".$unread.")</a>";
			echo "</li>";
			echo "<li>";
			echo "<a id=\"disscussions\" href=\"ViewFDisscussions.php\">Group Discussions</a>";
			echo "</li>";
			$q = mysql_query("SELECT COUNT(*) FROM `FriendList` where uid_friend='$uid' and status='0'") or die(mysql_error());
			$row = mysql_fetch_assoc($q);
			$requests = $row['COUNT(*)'];
			echo "<li>";
			echo "<a id=\"friends\" href=\"FriendList.php\" target=\"_self\">My Friends(".$requests.")</a>";
			echo "</li>";
			echo "<li>";
			echo "<a id=\"uChannels\" href=\"ListSubscribes.php\" target=\"_self\"> Subscribed Channels </a>";
			echo "</li>";
			echo "<li>";
			echo "<a id=\"blockuser\" href=\"BlockUser.php\" target=\"_self\">Blocked Users</a>";
			echo "</li>";
			echo "<li>";
			echo "<a id=\"logout\" href=\"Logout.php\">Logout</a>";
			echo "</li>";
			}
			?>
	</ul>
</div>
</div>
</body>
</html>

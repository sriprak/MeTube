<?php
	session_start();

require('Header.php');
echo "<div class='sform'>";
if(isset($_GET['uid'])){
$uid = $_GET['uid'];
$q = mysql_query("SELECT * FROM `userList` where `uid`='$uid'") or die(mysql_error());
while ($row = mysql_fetch_assoc($q)){
    $name = $row['Name'];
    $text = $row['About'];
    $email = $row['Email'];
    $pic = $row['ProfilePicture'];
    ?>
    <br/><img style="float:left;" src="<?php echo $pic;?>" alt="profile" height="200" width="160" />
    <?php
    echo "<br/><b>Name:</b>";
    echo "<br/>".$name."</a><br/>";
    echo "<br/><b>Description:<br/></b>".$text."<br/>";
    echo "<br/><b>Email:</b><br/>".$email."</a><br/>";
    echo "<br/>";
	echo "<br/>";
	if(isset($_SESSION["id"])){
	echo "<a id=\"add\" href=\"FriendControl.php?id=$uid&cat=add\" target=\"_self\">Add Friend</a><br/>";
	echo "<a id=\"block\" href=\"FriendControl.php?id=$uid&cat=unf\" target=\"_self\">Remove From FriendList</a><br/>";
	echo "<a id=\"block\" href=\"FriendControl.php?id=$uid&cat=block\" target=\"_self\">Block</a><br/>";
	echo "<a id=\"unblock\" href=\"FriendControl.php?id=$uid&cat=unblock\" target=\"_self\">Unblock</a><br/>";
	}
            }
            }
       echo "</sform>";
                echo "<br/> </div>";
                
?>

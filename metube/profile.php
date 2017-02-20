<?php
//	session_start();
require('UserHeader.php');
if(!isset($_SESSION['username'])){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
echo "<div class='me'>";
$q = mysql_query("SELECT * FROM `userList` where `uid`='$uid'") or die(mysql_error());
while ($row = mysql_fetch_assoc($q)){
	
    $name = $row['UserName'];
    $text = $row['About'];
    $email = $row['Email'];
    $pic = $row['ProfilePicture'];
    $lstacss = $row['LastAccessTime'];
    ?>
    <br/><img src="<?php echo $pic;?>" alt="profile" height="100" width="100" /><br/>
    </form>
    </div>
    <?php
    echo "<div class='prof'>";
   	echo "<font size=\"1\" face=\"arial\" color=\"red\">";
	echo "Most recent login:  ".$lstacss;
	echo "</font>";
	echo "<br/>";
            }
       echo "</me>";
                echo "<br/> </div>";
                
?>

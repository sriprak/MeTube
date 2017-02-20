<?php
	session_start();
if(!isset($_SESSION['username'])){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}

require('Header.php');
echo "<div class='sform'>";

$q = mysql_query("SELECT * FROM `userList` where `uid`='$uid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
    $name = $row['Name'];
    $text = $row['About'];
    $email = $row['Email'];
    $pic = $row['ProfilePicture'];
    ?>
    <br/><img style="float:left;" src="<?php echo $pic;?>" alt="profile" height="200" width="180" />
    <?php
    echo "<br/><b>Name:</b>";
    echo "<br/>".$name."</a><br/>";
    echo "<br/><b>Description:<br/></b>".$text."<br/>";
    echo "<br/><b>Email:</b><br/>".$email."</a><br/>";
    echo "<br/><br/>";
    echo "<b><a style=\"color: #0000FF; font-size: 08pt\" href=\"ProfileEdit.php\">EDIT YOUR PROFILE</a>"; 
	echo "<br/>";
	               
?>
</div>

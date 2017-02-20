<?php
session_start();
include("connect.php");
require('Header.php');

$myusername=$_POST['username']; 
$mypassword=$_POST['password'];

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

if(isset($_GET['url']))
{
$url = $_GET['url'];
mysql_query("UPDATE `userList` SET `LastAccessTime`=CURRENT_TIMESTAMP where `uid`='$uid'") or die(mysql_error());
echo "<meta http-equiv=\"refresh\" content=\"0;url=$url\">";
}
else{
mysql_query("UPDATE `userList` SET `LastAccessTime`=CURRENT_TIMESTAMP where `uid`='$uid'") or die(mysql_error());
echo "<meta http-equiv=\"refresh\" content=\"0;url=Browse.php\">";
}
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
?>

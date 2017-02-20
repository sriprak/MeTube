<?php

session_start();
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
include('connect.php');
require('FriendHeader.php');

$username=$_SESSION['username'];
$uid=$_SESSION['id'];
echo "<div class='form'>";
if((isset($_GET['id'])) && (isset($_GET['cat']))){
$uidf = $_GET['id'];
$cat = $_GET['cat'];
if($uid!=$uidf){
if((strcmp($cat,'add')==0))
{
addFriend($uid,$uidf);
}
elseif((strcmp($cat,'block')==0))
{
blockFriend($uid,$uidf);
}
elseif((strcmp($cat,'app')==0))
{
appFriend($uid,$uidf);
}
elseif((strcmp($cat,'ign')==0))
{
ignFriend($uid,$uidf);
}
elseif((strcmp($cat,'unblock')==0))
{
unblockFriend($uid,$uidf);
}
elseif((strcmp($cat,'unf')==0))
{
ignFriend($uid,$uidf);
}

}
else
{
echo "You cannot add or block yourself ;)";
}
}
echo "</div>";
?>
<?php

session_start();
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
include('connect.php');
require('HeaderChannels.php');

$username=$_SESSION['username'];
$uid=$_SESSION['id'];
echo "<div class='form'>";
if((isset($_GET['id'])) && (isset($_GET['cat']))){
$chid = $_GET['id'];
$cat = $_GET['cat'];

if((strcmp($cat,'sub')==0))
{
subsChannel($uid,$chid);
}
elseif((strcmp($cat,'uns')==0))
{
unsubsChannel($uid,$chid);
}
elseif((strcmp($cat,'del')==0))
{
delChannel($uid,$chid);
}
else
{
echo "Something went wrong here :(";
}
}
echo "</div>";
?>
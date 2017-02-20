<?php

session_start();
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
include('connect.php');
require('UserPlaylists.php');

$username=$_SESSION['username'];
$uid=$_SESSION['id'];
echo "<div class='form'>";
if((isset($_GET['rplid'])) && (isset($_GET['cat']))&& (isset($_GET['url']))){
$rplid = $_GET['rplid'];
$cat = $_GET['cat'];
$urls = $_GET['url'];
if((strcmp($cat,'del')==0))
{
delMediaPlaylist($uid,$rplid,$urls);
}
else
{
echo "Something went wrong here :(";
}
}
if((isset($_GET['plid'])) && (isset($_GET['del']))){
$plid = $_GET['plid'];
$del = $_GET['del'];
if((strcmp($del,'del')==0))
{
delPlaylist($uid,$plid);
}
else
{
echo "Something went wrong here :(";
}
}
echo "</div>";
?>
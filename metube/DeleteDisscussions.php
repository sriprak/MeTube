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
if((isset($_GET['id'])) && (isset($_GET['cat']))){
$grdid = $_GET['id'];
$cat = $_GET['cat'];

if((strcmp($cat,'del')==0))
{
delDiscussion($uid,$grdid);
}
else
{
echo "Something went wrong here :(";
}
}
if((isset($_GET['grdmid'])) && (isset($_GET['del'])&& (isset($_GET['url'])))){
$grdmid = $_GET['grdmid'];
$del = $_GET['del'];
$urls = $_GET['url'];
if((strcmp($del,'del')==0))
{
delGMessage($uid,$grdmid,$urls);
}
else
{
echo "Something went wrong here :(";
}
}
echo "</div>";
?>
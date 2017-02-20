<?php

session_start();
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
include('connect.php');
require('Header.php');

$username=$_SESSION['username'];
$uid=$_SESSION['id'];
echo "<div class='form'>";
if((isset($_GET['id'])) && (isset($_GET['cat'])&& (isset($_GET['url'])))){
$cid = $_GET['id'];
$cat = $_GET['cat'];
$url = $_GET['url'];
if((strcmp($cat,'del')==0))
{
delComment($uid,$cid,$url);
}
else
{
echo "Something went wrong here :(";
}
}
else
{
}
echo "</div>";
?>
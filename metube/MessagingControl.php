<?php

session_start();
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
include('connect.php');
require('Messaging.php');

$username=$_SESSION['username'];
$uid=$_SESSION['id'];
if((isset($_GET['mesid'])) && (isset($_GET['cat']))){
$mesid = $_GET['mesid'];
$cat = $_GET['cat'];
if($uid!=$uid){
if((strcmp($cat,'dasent')==0))
{
delAllSent();
}
elseif((strcmp($cat,'darec')==0))
{
delAllRec();
}
elseif((strcmp($cat,'drmes')==0))
{
delRecMes($mesid);
}
elseif((strcmp($cat,'dsmes')==0))
{
delSentMes($mesid);
}
}
else
{
echo "You are not authorized";
}
}
?>

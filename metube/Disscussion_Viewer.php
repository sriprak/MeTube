<?php
session_start();
require('GroupDisscussionHeader.php');
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
$id = $_SESSION["id"];
if(isset($_GET['id'])){
$grdid = $_GET['id'];
$urls = $_SERVER['REQUEST_URI'];
checkPermissionsDis($id,$grdid);
if(isset($_POST['send'])){
      if(strlen($_POST['text'])>0){
      sendGMessage($grdid,$id,$_POST['text']);
      echo "<meta http-equiv=\"refresh\" content=\"0\">";
      }
      else
      {
      echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Cannot send empty message!')";
        	echo "</script>";
      }  
    }

$q = mysql_query("SELECT * FROM `Group_Discussions` natural join `userList` where grdid = '$grdid'") or die(mysql_error());
echo "<div class='form'>";
while($row1 = mysql_fetch_assoc($q)){
$uid = $row1['uid'];
$name = $row1['Title'];
$grdid = $row1['grdid'];
$uname = $row1['UserName'];
$time = $row1['startTime'];

			echo "<br/><font size=\"4\" face=\"arial\" color=\"blue\">";
			echo "TITLE:&nbsp;".$name;
			echo "</font><br/><br/>";
			echo "Discussion started by&nbsp;";
			echo "<b><a style=\"color:red; font-size: 13pt\" href=\"Profile_Viewer.php?uid=$uid\">";
    		echo $uname."</a><b/>";
    		echo "&nbsp at&nbsp".$time."<br/>";
  $r = mysql_query("SELECT * FROM `GroupDisscussions_messages` natural join `userList` where grdid = '$grdid'") or die(mysql_error());
while($row = mysql_fetch_assoc($r)){
			$usname = $row['UserName'];
			$usid = $row['uid'];
			$grdmid = $row['grdmid'];
			$mes = $row['Message'];
			$mtime = $row['messageTime']; 
			echo "<div class='mbox'>";
			echo "<br/><font size=\"2\" face=\"arial\" color=\"blue\">";
			echo $mes;
			echo "</font><br/>";
			echo "Message by&nbsp;";
			echo "<b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$usid\">";
    		echo $usname."</a><b/>";
    		echo "&nbsp at&nbsp".$mtime;
    		if($usid == $id){
			echo "<b><a style=\"color:red; font-size: 06pt\" href=\"DeleteDisscussions.php?grdmid=$grdmid&del=del&url=$urls\">";
			echo "DELETE</a><b/><br/>";
			}
   			echo "</div>";
   			

			 
    		
    		
}
}
}
	

?>
<form method="post" action="" enctype="multipart/form-data">
	<br/><br/>
    <textarea name='text' class='cb' rows='6' cols='60'></textarea><br/>
    <br/>
  	<input type="submit" class="button" name="send" value="Send!"/>
    </form>
</div>

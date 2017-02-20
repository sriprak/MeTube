<?php
session_start();
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
require('FriendHeader.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Add Friends</title>
    </head>
    
    <body>
        <?php
            if(isset($_POST['submit'])){
            if(!empty($_POST['uname'])){ 
            	$uid = $_SESSION['id'];
            	addFriendName($uid,$_POST['uname']);
            }
            else{echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Name or email field cannot be empty!')";
        	echo "</script>";}
            }
        ?>
        <div class='form' >
            <form method="POST" action="" enctype="multipart/form-data">
            	
                <br/>User Name or email of the friend you want to add:
                <input type='text' class="tb" name='uname'/><input type="submit" class="button" name="submit" value="Add!"/>
            </form>
        </div>
    </body>
</html>
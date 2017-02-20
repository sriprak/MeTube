<?php
session_start();
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
require('UserPlaylists.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Add Playists</title>
    </head>
    
    <body>
        <?php
            if(isset($_POST['submit'])){ 
            	$ip = getRealIpAddr();
            	
                $p_id = addPlaylist($_POST["title"]);
            }
        ?>
        <div class='form' >
            <form method="POST" action="" enctype="multipart/form-data">
            	
                <br/>Playlist Name:
                <input type='text' class="tb" name='title'/><input type="submit" class="button" name="submit" value="Create"/>
            </form>
        </div>
    </body>
</html>
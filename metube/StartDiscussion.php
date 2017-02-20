<?php
session_start();
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
require('GroupDisscussionHeader.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>StartDisscussion</title>
    </head>
    
    <body>
        <?php
            if(isset($_POST['submit'])){
            if(!empty($_POST['title'])){ 
            	$ip = getRealIpAddr();
            	$uid = $_SESSION['id'];
                startDisscussion($_POST["title"],$uid);
                }
                 else{echo "<script language=\"javascript\" type=\"text/javascript\">";
        	echo "alert('Disscussion needs to have a title!')";
        	echo "</script>";}

            }
        ?>
        <div class='form' >
            <form method="POST" action="" enctype="multipart/form-data">
            	
                <br/>Title for the discussion:
                <input type='text' class="tb" name='title'/>
                <input type="submit" class="button" name="submit" value="Create"/>
            </form>
        </div>
    </body>
</html>
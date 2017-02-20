
<?php
require('Header.php');
session_start();

	$uid = $_SESSION['id'];
    $title = $_POST['title'];
    $text = $_POST['text']; 
    $cat = $_POST['cat'];
    $ip = getRealIpAddr();
    $per = $_POST['per'];
    
	$hash = md5($media_info['name']);
    $hash = substr($hash,0,5);
    $media_type = $media_info['type'];
    if(stripos($media_type,"image")!==false)
        $type = "image/"; 
    elseif(stripos($media_type,"video")!==false)
        $type = "video/";
    elseif(stripos($media_type,"audio")!==false)
    $type = "audio/";
    else
        $type = "";
    $fn = "upload/".$type.$hash."-".$media_info["name"];
    if(!file_exists($fn)){
        move_uploaded_file($media_info["tmp_name"],$fn );
    }
    if(file_exists($fn)){                                                      
        $media_name = $media_info["name"];
        $media_type = $media_info["type"];
        if(stripos($media_type,"image")!==false)
        {
        mysql_query("INSERT INTO `Media` (`uid`,`Title`,`Description`,`Category`,`uploadIP`,`permission`) VALUES ('$uid','$title','$text','$cat','$ip','$per') ") or die(mysql_error());
   $p_id = mysql_insert_id();
         $q = mysql_query("UPDATE `Media` SET `Type` = '$media_type', `MediaPath` = '$fn' WHERE mid ='$p_id'") or die(mysql_error());
        echo"<script language=\"javascript\" type=\"text/javascript\">";
        echo"alert('UPLOADED :)')";
        echo"</script>";
        }
         elseif(stripos($media_type,"video")!==false)
        {
        mysql_query("INSERT INTO `Media` (`uid`,`Title`,`Description`,`Category`,`uploadIP`,`permission`) VALUES ('$uid','$title','$text','$cat','$ip','$per') ") or die(mysql_error());
   $p_id = mysql_insert_id();
        $q = mysql_query("UPDATE `Media` SET `Type` = '$media_type', `MediaPath` = '$fn' WHERE mid ='$p_id'") or die(mysql_error());
        echo"<script language=\"javascript\" type=\"text/javascript\">";
        echo"alert('UPLOADED :)')";
        echo"</script>";
        }
        elseif(stripos($media_type,"audio")!==false)
        {
        mysql_query("INSERT INTO `Media` (`uid`,`Title`,`Description`,`Category`,`uploadIP`,`permission`) VALUES ('$uid','$title','$text','$cat','$ip','$per') ") or die(mysql_error());
   $p_id = mysql_insert_id();
        $q = mysql_query("UPDATE `Media` SET `Type` = '$media_type', `MediaPath` = '$fn' WHERE mid ='$p_id'") or die(mysql_error());
        echo"<script language=\"javascript\" type=\"text/javascript\">";
        echo"alert('UPLOADED :)')";
        echo"</script>";
        }
        else
        {
         	echo"<script language=\"javascript\" type=\"text/javascript\">";
        	echo"alert('File Format not supported! :(')";
        	echo"</script>";
        }
    }
}

?>

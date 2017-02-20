<?php
session_start();
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
require('Header.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Add Media</title>
    </head>
    
    <body>
        <?php
            if(isset($_POST['submit'])){
            if(isset($_FILES['media'])){
            if((!empty($_POST['title'])) &&(!empty($_POST['tag'])) && (!empty($_POST['text'])))
            {
            if(strlen($_POST['tag'])<256){
         	if($_FILES["media"]["size"] < 10485760){   
            	$ip = getRealIpAddr();
                $p_id = add_Media($_FILES["media"],$_POST["title"],$_POST["text"],$_POST["cat"],$ip,$_POST["per"]);
                if($p_id > 0){
                       if(strcmp($_POST["per"],'public')==0){
      					addKeywords($_POST['tag'],$p_id);
      					}
      					
                    $m_id = upload_media($_FILES["media"],$p_id);
                    }
                    }
                    else
                    {
                    echo "<script language=\"javascript\" type=\"text/javascript\">";
        			echo "alert('Max upload size is 10 MB. Try some thing smaller in size :)')";
        			echo "</script>";
                    }
                }
                else
                {
                 echo "<script language=\"javascript\" type=\"text/javascript\">";
        			echo "alert('Keyword too long')";
        			echo "</script>";
                }
                }
                else
                {
                echo "<script language=\"javascript\" type=\"text/javascript\">";
        			echo "alert('All fields not full')";
        			echo "</script>";
                }
                
                }
            }
        ?>
        <div class='sform' >
            <form method="POST" action="" enctype="multipart/form-data">
            	
                <br/>Title:
                <input type='text' class="tb" name='title'/><br/>
                <br/>Description:<br/>
                <textarea name='text'  class="cb" rows='5' cols='60'></textarea><br/>
                <br/>TAGS:(max 255 chars, If more than one tag just separate by a space)<br/>
                <input type='text' class="tb" name='tag'/><br/>
                <br/><?php categories();?>&nbsp;&nbsp;
                <?php permissions();?><br/>
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                <br/>Media File:
                <input type="file" class="tb" name="media" /><br/>(Max Upload Size 10 MB)
                 <br/> <br/>
                <sbutton>
                <input type="submit" class="button" name="submit" value="Submit"/>
        		</sbutton>
        		</form>
            </sform>
        </div>
    </body>
</html>
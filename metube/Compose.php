<?php
session_start();
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
require('Messaging.php');

if(isset($_POST['send'])){
            if((!empty($_POST['subject'])) &&(!empty($_POST['message'])))
            {
               $id = $_SESSION["id"];
                sendMessage($id,$_POST['friend'],$_POST['subject'],$_POST['message']);
                
            }
            
           else
        {
        echo"<script language=\"javascript\" type=\"text/javascript\">";
        echo"alert('subject and body cannot be empty!Try again.Thank you')";
        echo"</script>";
        }
        }

?>

<div class='form' style='text-align:center;' >
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
            	<?php friends();?><br/>
                <br/>Subject:
                <input type='text' class="tb" name='subject' maxlength='50'/><br/>
                <br/>Message:<br/>
                <textarea name='message' class="cb" rows='5' cols='60'></textarea><br/>
                <br/>
                <sbutton>
                <input type="submit" class="button" name="send" value="Send"/>
        		</sbutton>
            </form>

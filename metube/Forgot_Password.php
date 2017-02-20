<?php

require('Header.php'); 
if($_SESSION["username"]){
echo "<meta http-equiv=\"refresh\" content=\"0;url=Browse.php\">";
}
?>
<html>
    <head>
        <title>FORGOT PASSWORD</title>
    </head>
    <body>
<?php
 if(isset($_POST['submit'])){
  	forgot_pass($_POST['email']);
  }
?>
<div class='sform' >
            <form method="POST" action="" enctype="multipart/form-data">
                <br/>Registered Email:
                <input type='text' name='email' class="tb"  maxlength='100'/><br/>
                <br/> <br/>
                <sbutton>
                <input type="image" src="images/Submit.png" name="submit" value="Submit"/>
                </sbutton>
                </form>
                
            
        </div>
        
    </body>
</html>
<?php
	session_start();
	require('Header.php');
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}
$uid = $_SESSION['id'];
$q = mysql_query("SELECT * FROM `userList` where `uid`='$uid'") or die(mysql_error());
$row = mysql_fetch_assoc($q);
    $name = $row['Name'];
    $uname = $row['UserName'];
    $text = $row['About'];
    $email = $row['Email'];
    $pic = $row['ProfilePicture'];
    
    if(isset($_POST['updatePass'])){
    if(((strlen($_POST['password']))>5) && ((strlen($_POST['password_check']))>5))
            {
            if((strcmp($_POST['password'],$_POST['password_check'])==0))
            {
              updatePassword($_POST['password'],$uid);

			}
			else
			{
			 echo "<script language=\"javascript\" type=\"text/javascript\">";
       	    echo "alert('The Passwords not matching! Try again.Thank you')";
            echo "</script>";
			}
			}
			else
			{
			 echo "<script language=\"javascript\" type=\"text/javascript\">";
			echo "alert('Password should have minimum length of 6')";
			echo "</script>";
			}

			}

    if(isset($_POST['updateAbout'])){
    if(!empty($_POST['about']))
    {
    updateAbout($_POST['about'],$uid);
    }
    else
			{
			 echo "<script language=\"javascript\" type=\"text/javascript\">";
       	    echo "alert('About field should not be empty')";
            echo "</script>";
			}

    }
    
	if(isset($_POST['upload'])){
	if(isset($_FILES['media'])){
        upload_profilepic($_FILES['media'],$uid);
   	}
   	else
			{
			 echo "<script language=\"javascript\" type=\"text/javascript\">";
       	    echo "alert('Please choose an image')";
            echo "</script>";
			}
    }
    
    if(isset($_POST['all'])){
    if(!empty($_POST['about']))
    {
    if(((strlen($_POST['password']))>5) && ((strlen($_POST['password_check']))>5))
            {
            if((strcmp($_POST['password'],$_POST['password_check'])==0))
            {
		updateAll($_POST['password'],$_POST['about'],$uid);
		if(isset($_FILES['media'])){
        upload_profilepic($_FILES['media'],$uid);
   	}
   	else
			{
			 echo "<script language=\"javascript\" type=\"text/javascript\">";
       	    echo "alert('Choose a proper file! thanks')";
            echo "</script>";
			}
   	}
   	else
			{
			 echo "<script language=\"javascript\" type=\"text/javascript\">";
       	    echo "alert('The Passwords not matching! Try again.Thank you')";
            echo "</script>";
			}
    }
    else
			{
			 echo "<script language=\"javascript\" type=\"text/javascript\">";
       	    echo "alert('Minimum length of password is 6')";
            echo "</script>";
			}
    }
    else
			{
			 echo "<script language=\"javascript\" type=\"text/javascript\">";
       	    echo "alert('All fields not filled')";
            echo "</script>";
			}
    }
    

?>
<html>
    <head>
        <title>UPDATE</title>
    </head>
    
    <body>
		<div class='sform' >
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            	<font size="4" face="arial" color="blue">
 				<br/><p>User Name:&nbsp;&nbsp;<?php echo $uname; ?></p><br/>
                <br/><p>Name:&nbsp;&nbsp;<?php echo $name; ?></p><br/>
                <br/><p>Email:&nbsp;&nbsp;<?php echo $email; ?></p>
                </font><br/><br/>
                 <br/>Password:&nbsp;&nbsp;<br/>
                <input type="password" class="tb" name="password"  maxlength='50'/><br/>(minimum length 6 letters)<br/>
                <br/>Confirm Password:&nbsp;&nbsp;<br/>
                <input type="password" class="tb" name="password_check" maxlength='50'/>
                <input type="submit" class="button" name="updatePass" value="Update Password"/><br/>
                <br/>About:<br/>
                <textarea name='about'class="cb" rows='5' cols='60'></textarea> <input type="submit" class="button" name="updateAbout" value="Update!"/><br/><br/>
                
                <br/>Profile Picture:
                <input type="file" class="tb" name="media"/>
                <br/>
                <input type="submit" class="button" name="upload" value="Change Profile Pic"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="button" name="all" value="Update All!"/>
                <br/>
  			</form>
         
        </div>
        
    </body>
</html>
        
        

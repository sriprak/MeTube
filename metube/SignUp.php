<?php
require('Header.php');
if(isset($_SESSION["username"])){
echo "<meta http-equiv=\"refresh\" content=\"0;url=Browse.php\">";
}
?>

<html>
    <head>
    	<script language="javascript" src="calendar.js"></script>
        <title>SIGN UP</title>
    </head>
    
    <body>
        <?php
            if(isset($_POST['submit'])){
            if((!empty($_POST['name'])) &&(!empty($_POST['username'])) && (!empty($_POST['password'])) && (!empty($_POST['email'])))
            {
            if(((strlen($_POST['password']))>5) && ((strlen($_POST['password_check']))>5))
            {
            $check = restrictUsername($_POST['username']);
            $emailCheck = restrictEmail($_POST['email']);
            if($check==0)
            {
            $i = check_email($_POST['email']);
            $emailCheck = restrictEmail($_POST['email']);
            if($i==1){
            if($emailCheck==0){
            
            if((strcmp($_POST['password'],$_POST['password_check'])==0))
            {
            	$dob = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
                $p_id = sign_up($_POST['username'],$_POST['name'],$_POST['password'],$_POST['email'],$dob,$_POST['about'],$_POST['sex']);
                if(isset($_FILES['media'])){
                    upload_profilepic($_FILES['media'],$p_id);
                    }
            }
            
            else
            {
            echo"<script language=\"javascript\" type=\"text/javascript\">";
       	    echo"alert('The Passwords not matching! Try again.Thank you')";
            echo"</script>";
            }
            }
            else
            {
            echo"<script language=\"javascript\" type=\"text/javascript\">";
       	    echo"alert('Account with this Email already exists')";
            echo"</script>";
            }
            }
            else
            {
            echo"<script language=\"javascript\" type=\"text/javascript\">";
       	    echo"alert('Invalid Email')";
            echo"</script>";
            }
            }
            else
            {
            echo"<script language=\"javascript\" type=\"text/javascript\">";
			echo"alert('Username is taken. Choose something else.')";
			echo"</script>";
            }
            }
            else
            {
            echo"<script language=\"javascript\" type=\"text/javascript\">";
			echo"alert('Password should have minimum length of 6')";
			echo"</script>";
            }
            }
        else
        {
        echo"<script language=\"javascript\" type=\"text/javascript\">";
        echo"alert('All fields are not full!Try again.Thank you')";
        echo"</script>";
        }
        }
        
        
        ?>
        <div class='sform' >
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                <br/>User Name:<br/>
                &nbsp;<input type='text' class="tb" name='username' maxlength='50'/>
                <input type="submit" style="background:#FFFFFF;border-style:outset;border-width:1px;color:#0000FF" name="CheckAvailability" value="Check Availability"/>
                <br/>
                <?php
                if(isset($_POST['CheckAvailability'])){
                if((!empty($_POST['username']))){
                checkuser($_POST['username']);
                }
                else{
                echo"<script language=\"javascript\" type=\"text/javascript\">";
        		echo"alert('Fill in user name to check :)')";
        		echo"</script>";
                }
                }
                ?>
                 <br/>Name:&nbsp;&nbsp;<br/>
                <input type='text' class="tb" name='name'  maxlength='50'/><br/>
                 <br/>Password:&nbsp;&nbsp;<br/>
                <input type="password" class="tb" name="password"  maxlength='50'/><br/>(minimum length 6 letters)<br/>
                <br/>Confirm Password:&nbsp;&nbsp;<br/>
                <input type="password" class="tb" name="password_check" maxlength='50'/>
                <br/>DOB:<br/>
                <?php
				require('calendar/tc_calendar.php');
				 $myCalendar = new tc_calendar("date1", true);
		  		$myCalendar->setIcon("calendar/images/iconCalendar.gif");
		  		$myCalendar->setDate(date('d'), date('m'), date('Y'));
		  		$myCalendar->setPath("calendar/");
		  		$myCalendar->zindex = 150; //default 1
		  		$myCalendar->setYearInterval(1995, date('Y'));
		  		$myCalendar->dateAllow('1920-03-01', date('Y-m-d'));
				$myCalendar->setAlignment('right', 'bottom'); //optional
		  		$myCalendar->writeScript();	  
				?>
				<br/>
                <br/>Sex:&nbsp;&nbsp;
                <input type="radio" name="sex" value="Male"> Male &nbsp;&nbsp;
				<input type="radio" name="sex" value="Female" > Female<br>
                <br/>About:<br/>
                <textarea name='about'class="cb" rows='5' cols='60'></textarea><br/>
                <br/>Email:&nbsp;&nbsp;<br/>
                <input type="text" class="tb" name="email" maxlength='100'/><br/>
                <br/>Profile Picture:
                <input type="file" class="tb" name="media"/>
                <br/>
                <br/>
                <input type="submit" class="button" name="submit" value="Submit"/>
                <br/>
                
                </form>
                
            
        </div>
        
    </body>
</html>

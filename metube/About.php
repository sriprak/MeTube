<?php
require('Header.php');
?>
<html>
    <head>
        <title>USING METUBE</title>
    </head>
    
    <body>
    
    <div class='sform'>
    <?php
	if(isset($_SESSION["username"])){
	echo "<p> Hi ".$_SESSION["username"]."! Learn How to use metube here :)</p>";
	}
	?>
	<br/><br/>
    <p>To access full functionality of the software, please first sign up with us</p><br/>
    <p>To send a friend request to a user, click on the username besides the media and then click on Add Friend link to send the friendship request.</p><br/>
    <p>METUBE----Share it if its worth it :)</p><br/>
    <p>(Works best on Mozilla Firefox, IE 9+<br/>
    Works okay on Chrome, Safari, Opera)</p>
    <br/><br/>
    <p>Thanks for using METUBE </p>
    <br/><br/>
    <p> developed by <a href="http://people.cs.clemson.edu/~sriprak/metube_revised/metube/Profile_Viewer.php?uid=17" target="_blank">Sriprasad Kannan</a> & <a href="http://people.cs.clemson.edu/~sriprak/metube_revised/metube/Profile_Viewer.php?uid=18" target="_blank">Rishi Sabharwal</a> </p>
    <br/>
    <br/>
	<script>(function(d, s, id) {
  	var js, fjs = d.getElementsByTagName(s)[0];
  	if (d.getElementById(id)) return;
  	js = d.createElement(s); js.id = id;
 	js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=314178331941974";
  	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<div class="fb-like" data-send="true" data-width="450" data-show-faces="true" data-font="lucida grande"></div>
    </div>        
    </body>
    </html>
    
    

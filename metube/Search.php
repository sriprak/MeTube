<?php
session_start();
require('SearchHeader.php');

$error = array();
$results = array();

if (isset($_GET['search'])) {
   $searchTerms = ereg_replace( ' +', '', $_GET['search'] );
   $searchTerms = strip_tags($searchTerms); 
   $now = date("Y-m-d H:i:s");
   if (strlen($searchTerms) < 3) {
      $error[] = "Search terms must be atleast 3 characters.";
   }
   else {
      $searchTermDB = mysql_real_escape_string($searchTerms);
      
   }
   

   if (count($error) < 1) {
      $searchSQL = "SELECT * FROM Media m natural join userList u natural join Keywords WHERE ";
      $types = array();
      $types = array_filter($types, "removeEmpty"); 
      
      if (count($types) < 1)
         $types[] = "`Keyword` LIKE '%{$searchTermDB}%'"; 
      
          $andOr = isset($_GET['matchall'])?'OR':'OR';
      $searchSQL .= implode(" {$andOr} ", $types) . "and `permission`='public' ORDER BY `uploadTime` DESC limit 0,100"; 

      $searchResult = mysql_query($searchSQL) or trigger_error("There was an error.<br/>" . mysql_error() . "<br />SQL Was: {$searchSQL}");
      
      if (mysql_num_rows($searchResult) < 1) {
         $error[] = "{$searchTerms}! Hmmmm Nothing of that sort to show :(";
            
      }
      
      else {
         
         $results = array();
         $i = 1;
         echo "<div class='seform' >";
         echo "YOUR SEARCH RESULT(using keywords):<br/><br/>";
         while ($row = mysql_fetch_assoc($searchResult)) {     
    $id = $row['mid'];
    $name = $row['Title'];
    $text = $row['Description'];
    $type = $row['Type'];
    $usid = $row['uid'];
    $uname = $row['UserName'];
    $kid = $row['kid'];
    mysql_query("Update Keywords set counter=counter+1  WHERE `kid`='$kid'");
    $u = mysql_query("SELECT * FROM `Views` WHERE `mid`='$id'") or die(mysql_error());
	$row5 = mysql_fetch_assoc($u);
            $path = $row['MediaPath'];
            $type = $row['Type'];
            $dPath = "http://mmlab.cs.clemson.edu/spring12/g5/metube/".$path;
            if(stripos($type,"wmv")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a href=\"player_wmv.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$usid\">";
    		echo $uname."</a><b/><br/>";
			echo "</div>";		            
			}
            elseif(stripos($type,"3gp")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player_quicktime.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
   			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$usid\">";
    		echo $uname."</a><b/><br/>";
    		echo "</div>";
        	
            }
            elseif(stripos($type,"msvideo")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a style=\"color: #0000FF; font-size: 12pt\" href=\"player_quicktime.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$usid\">";
    		echo $uname."</a><b/><br/>";
    		echo "</div>";

        	            }
            elseif(stripos($type,"video")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Video.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a href=\"player.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
   			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$usid\">";
    		echo $uname."</a><b/><br/>";
			echo "</div>";		         
    		}
    		elseif(stripos($type,"image")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"$path\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a href=\"ImageViewer.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
  			echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$usid\">";
    		echo $uname."</a><b/><br/>";
			echo "</div>";			
            }
            elseif(stripos($type,"audio")!==false)
            {
            echo "<div class='rbox'>";
            echo "<img style=\"float:left;\" src=\"images/Audio.jpg\" alt=\"profile\" height=\"100\" width=\"100\" />";
            echo "<b><a href=\"player.php?mid=$id\">";
    		echo $name."</a><b/><br/>";
    		echo "<br/><b><a style=\"color:red; font-size: 06pt\" href=\"Profile_Viewer.php?uid=$usid\">";
    		echo $uname."</a><b/><br/>";
			echo "</div>";			
            }

            else
            {
            echo "<div class='rbox'>";
            echo "<br/>";
            echo "No media to show. Share some by uploading.";
            echo "</div>";
            }
            }

        
      echo "</seform>";
                echo "<br/> </div>";
      }
   }
}

function removeEmpty($var) {
   return (!empty($var)); 
}
?>
<html>
   <title>Search</title>
   <style type="text/css">
      #error {
         color: red;
      }
   </style>
   <body>
   <div class='form'>
      <?php echo (count($error) > 0)?"The following had errors:<br /><span id=\"error\">" . implode("<br />", $error) . "</span><br /><br />":""; ?>
       <form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>" name="searchForm">
       <b>
         Search: <input type="text"  class="tb" name="search" value="<?php echo isset($searchTerms)?htmlspecialchars($searchTerms):''; ?>" /><input type="submit" name="submit" style="height: 25px;width: 50px;cursor: pointer;border:1px;" value="Search!"/>
         </b>
         
            
      
</div>
   </body>
</html>
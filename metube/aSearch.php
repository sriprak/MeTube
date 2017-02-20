<?php
session_start();
require('SearchHeader.php');

$error = array();
$results = array();

if (isset($_GET['search'])) {
   $searchTerms = ereg_replace( ' +', '', $_GET['search'] );
   $searchTerms = strip_tags($searchTerms);
   
   if (strlen($searchTerms) < 3) {
      $error[] = "Search terms must be longer than 3 characters.";
   }else {
      $searchTermDB = mysql_real_escape_string($searchTerms); 
   }
   
   if (count($error) < 1) {
      $searchSQL = "SELECT * FROM Media m natural join userList u WHERE ";
      
      $types = array();
      $types[] = isset($_GET['title'])?"`Title` LIKE '%{$searchTermDB}%'":'';
      $types[] = isset($_GET['desc'])?"`Description` LIKE '%{$searchTermDB}%'":'';
      $types[] = isset($_GET['type'])?"`Type` LIKE '%{$searchTermDB}%'":'';
      $types[] = isset($_GET['cat'])?"`Category` LIKE '%{$searchTermDB}%'":'';
      $types[] = isset($_GET['name'])?"`Name` LIKE '%{$searchTermDB}%'":'';
      $types[] = isset($_GET['uname'])?"`UserName` LIKE '%{$searchTermDB}%'":'';
      $types = array_filter($types, "removeEmpty"); 
      
      if (count($types) < 1)
         $types[] = "`Title` LIKE '%{$searchTermDB}%'"; 
      
          $andOr = isset($_GET['matchall'])?'AND':'OR';
      $searchSQL .= implode(" {$andOr} ", $types) . " ORDER BY `uploadTime` DESC"; 

      $searchResult = mysql_query($searchSQL) or trigger_error("There was an error.<br/>" . mysql_error() . "<br />SQL Was: {$searchSQL}");
      
      if (mysql_num_rows($searchResult) < 1) {
         $error[] = "{$searchTerms}! Hmmmm Nothing of that sort to show :(";
      }else {
         $results = array(); // the result array
         $i = 1;
         echo "<div class='aseform' >";
         echo "YOUR SEARCH RESULT(using feautures):<br/><br/>";
         while ($row = mysql_fetch_assoc($searchResult)) {
            $id = $row['mid'];
    $id = $row['mid'];
    $name = $row['Title'];
    $text = $row['Description'];
    $type = $row['Type'];
    $usid = $row['uid'];
    $uname = $row['UserName'];

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
        
      echo "</aseform>";
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
   <div class='form' >
      <?php echo (count($error) > 0)?"The following had errors:<br /><span id=\"error\">" . implode("<br />", $error) . "</span><br /><br />":""; ?>
      <form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>" name="searchForm">
         Search For: <input type="text"  class="tb" name="search" value="<?php echo isset($searchTerms)?htmlspecialchars($searchTerms):''; ?>" />
         <input type="submit" name="submit" value="Search!" class="button"/>
         <br />
         Options for search:(default-- title of the Media)<br />
         Title: <input type="checkbox" name="title" value="on" <?php echo isset($_GET['title'])?"checked":''; ?> /> <br/>
         Description: <input type="checkbox" name="desc" value="on" <?php echo isset($_GET['desc'])?"checked":''; ?> /><br />
         Type: <input type="checkbox" name="type" value="on" <?php echo isset($_GET['type'])?"checked":''; ?> /> <br/>
         Category: <input type="checkbox" name="cat" value="on" <?php echo isset($_GET['cat'])?"checked":''; ?> /><br />
         Name: <input type="checkbox" name="name" value="on" <?php echo isset($_GET['name'])?"checked":''; ?> /> <br/>
         User Name: <input type="checkbox" name="uname" value="on" <?php echo isset($_GET['uname'])?"checked":''; ?> /><br />

                 Match All<input type="checkbox" name="matchall" value="on" <?php echo isset($_GET['matchall'])?"checked":''; ?><br /><br />
         
      </form>
      
   </div>
   </body>
</html>
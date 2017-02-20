<?php
session_start();
require('SearchHeader.php');
if(!$_SESSION["username"]){
$url = $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Login.php?url=$url\">";
}

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
      $searchSQL = "SELECT distinct(chid),channel_name,createTime,UserName FROM Channels natural join userList WHERE ";
      
      $types = array();
      $types = array_filter($types, "removeEmpty"); 
      
      if (count($types) < 1)
         $types[] = "`channel_name` LIKE '%{$searchTermDB}%'"; 
      
          $andOr = isset($_GET['matchall'])?'AND':'OR';
      $searchSQL .= implode(" {$andOr} ", $types) . " ORDER BY `createTime` DESC"; 

      $searchResult = mysql_query($searchSQL) or trigger_error("There was an error.<br/>" . mysql_error() . "<br />SQL Was: {$searchSQL}");
      
      if (mysql_num_rows($searchResult) < 1) {
         $error[] = "{$searchTerms}! May be the channel your searching for does not exist :(";
      }else {
         $results = array(); // the result array
         $i = 1;
         echo "<div class='seform' >";
         echo "YOUR SEARCH RESULT(Channels):<br/><br/>";
         while ($row = mysql_fetch_assoc($searchResult)) {
$id = $row['chid'];
$name = $row['channel_name'];
$time = $row['createTime'];
$uname = $row['UserName'];
echo "<div class='rbox'>";
echo "<img style=\"float:left;\" src=\"images/Channel.png\" alt=\"profile\" height=\"100\" width=\"100\" />";
echo "<b><a style=\"color: #0000FF; font-size: 18pt\" href=\"Channel_Viewer.php?id=$id\">";
echo $name."</a><b/><br/>";
echo "<b><a style=\"color: red; font-size: 08pt\" href=\"ChannelControl.php?id=$id&cat=sub\">";
echo "<br/>SUBSCRIBE</a><b/><br>";
echo "<b><a style=\"color: red; font-size: 08pt\" href=\"ChannelControl.php?id=$id&cat=uns\">";
echo "<br/>UNSUBSCRIBE</a><b/><br/>";
echo "<br/><font size=\"3\" face=\"arial\" color=\"green\">";
echo "Created on: &nbsp;".$time."&nbsp;by&nbsp;".$uname;

echo "</font><br/>";
echo "</div>";
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
   <div class='form' >
      <?php echo (count($error) > 0)?"The following had errors:<br /><span id=\"error\">" . implode("<br />", $error) . "</span><br /><br />":""; ?>
      <form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>" name="searchForm">
         Search For: <input type="text"  class="tb" name="search" value="<?php echo isset($searchTerms)?htmlspecialchars($searchTerms):''; ?>" />
         <input type="submit" name="submit" value="Search!" class="button"/>
         <br />
         
      </form>
      
   </div>
   </body>
</html>
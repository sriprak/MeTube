<?php
//	session_start();
include('connect.php');
require('Header.php');

echo "<div id='messaging'>";
echo "<li>";
echo "<a id=\"search\" href=\"Search.php\" target=\"_self\">Search by Keywords</a><br/>";
echo "</li>";
echo "<li>";
echo "<a id=\"aSearch\" href=\"aSearch.php\" target=\"_self\">Feature based Search</a><br/>";
echo "</li>";
if(isset($_SESSION['username'])){
echo "<li>";
echo "<a id=\"searchChannel\" href=\"SearchChannel.php\">Search Channels</a>";
echo "</li>";
			}
echo "</div>";

?>

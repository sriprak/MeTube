<?php
session_start();
if($_SESSION["id"]!=1){
echo $_SERVER['REQUEST_URI'];
echo "<meta http-equiv=\"refresh\" content=\"0;url=Browse.php\">";
}
?>
<html>
	<meta http-equiv="refresh" content="100" >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="SHORTCUT ICON" href="images/Logos/favi.ico"/>
        <meta name="author" content="cTn" />
        <title> METUBE </title>
    </head>
    <body>
<p><?php echo $_SERVER['REQUEST_URI']; ?></p>
    <table border="1">
    <tr>
    <th>ID</th>
    <th>MID</th>
    <th>IP ADDRESS</th>
    <th>Access Time</th>
    </tr>
    <?php
    include("connect.php");
    $s = mysql_query("SELECT * FROM `IP_Address`") or die(mysql_error());
     while($row1 = mysql_fetch_assoc($s))
     {
     echo "<tr>";
     echo "<td>".$row1['ipid']."</td>";
     echo "<td>".$row1['mid']."</td>";
     echo "<td>".$row1['userIP']."</td>";
     echo "<td>".$row1['time_access']."</td>";
     echo "</tr>";
     }
    ?>
    </table>

    </body>
</html>

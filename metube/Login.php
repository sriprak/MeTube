<?php
session_start();
if(isset($_SESSION['username'])){
header("location:Browse.php");
}
if(isset($_GET['url'])){
$url = $_GET['url'];
}
require('Header.php');
?>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<td>&nbsp;</td>
<td>&nbsp;</td>
<div class="login">
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#E4E4E4">
<tr>
<form name="form1" method="post" action="Login_Check.php<?php if(isset($_GET['url'])){ $url = $_GET['url'];echo "?url=".$url;}?>">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#E4E4E4">
<tr>
<td colspan="3"><strong>LOGIN </strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="username" class="tb" type="text" id="username"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="password" class="tb" type="password" id="password"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" class="button" name="login" value="Login"></td>
<tr/>
</table>
</td>
</form>
</tr>
</table>

</div>

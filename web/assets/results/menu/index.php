<?php
	include("includes/functions.php");
	$db = new PHP_fun;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PHP/MySQL/Javascript Multilevel Drop Down Menu</title>
<link href="css/maincss.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<script language="javascript">
	function redirect(url)
	{
		window.open(url)  ;
		return false;
	}
	function showId(id)
	{
		var obj = document.getElementById(id);
		obj.style.display = 'block';
		return false;
	}
	function hideId(id)
	{
		var obj = document.getElementById(id);
		obj.style.display = 'none';
		return false;
	}
</script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>

</head>
<body>
<table width="776" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
	<td align="center" valign="top" height="100"><?=$db->getMenu(0);?></td>
  </tr>
</table>
</body>
</html>


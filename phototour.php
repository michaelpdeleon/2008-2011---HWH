<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Photo Tour</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
<body bgcolor="#ffffff">
<!--url's used in the movie-->
<!--text used in the movie-->
<!--
Hotel
Rooms & Suites
Business Facilities
Catering Facilities
Health Club
Restaurants
-->
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="600" height="450" id="phototour" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="phototour.swf" />
<param name="quality" value="high" />
<param name="bgcolor" value="#ffffff" />
<param name="FlashVars" value="section=<?=$_GET['section'];?>">
<embed src="phototour.swf" FlashVars="section=<?=$_GET['section'];?>" quality="high" bgcolor="#ffffff" width="600" height="450" name="phototour" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
<? include("includes/stats.php") ?>
</body>
</html>
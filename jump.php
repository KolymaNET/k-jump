<?php
define('REMOTE_ADDR', $_SERVER['REMOTE_ADDR']); // change for cloudflare
define('_RETURN', 'index.html');

// URL match
 $URL = strip_tags(urldecode($_SERVER['QUERY_STRING']));
if (!preg_match('/^[a-zA-Z]+:\/\//i', $URL))  {
	die("Invalid URL");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Jump</title>
	<meta name="robots" content="nofollow,noarchive" />
	<script>
		function l() {
			var link = document.getElementById("linkto");
			link.focus();
		}

	</script>
	<script src="https://kncdn.org/knirp.php?js"></script>
</head>

<body onload="l();" link="#0000ee" vlink="#0000EE" text="#000" bgcolor="#ffffff" alink="#FF0000">
	<b><a href="<?=$URL?>"><?=$URL?></a></b><br>
	 Jumping to new URL... click the link to continue
	 <p align="RIGHT"><b><a href="https://www.kolyma.org/join">[★]Developers, Moderators, Janitors, etc wanted! Enlist today! Join the 50 cent army!</a></b></p>
	 <p align="RIGHT"><b><a href="https://nss.kolyma.org/join">[★] Join the NSS</a></b></p>
	     <hr>
		<iframe src='//kncdn.org/fonts.php' frameborder='0' scrolling='no' width='728' height='90'></iframe><br />
		<iframe src='//kncdn.org/fonts.php' frameborder='0' scrolling='no' width='728' height='90'></iframe><br />
		<iframe src='//kncdn.org/fonts.php' frameborder='0' scrolling='no' width='728' height='90'></iframe><br />
	
	
</body>

</html>
<?php
exit;

function error($err) { global $msg, $URL;
	$msg = $err;
	$URL = '';
}
?>

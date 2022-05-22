<?php

$to = "ahdong306@gmail.com";
$to = htmlspecialchars($to);
$host = $_SERVER['SERVER_NAME'];
$ip = $_SERVER['SERVER_ADDR'];
//$from="adong@email.sc.edu";
$from = $_REQUEST['email'];
$subject = $_REQUEST['name'] . ":" . $_REQUEST['subject'];

//$message="This is a test message sent from $host. It originated from the IP address $ip. If you received this email, that means that the PHP mail function is working on this server.";
$message = "Dear Anhua: \n\n" . $_REQUEST['message'];
$headers = "From: $from" . "\r\n" . "Reply-To: test@$host" . "\r\n" . "X-Mailer: PHP/" . phpversion();
$success = mail($to, $subject, $message, $headers);

$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
if (preg_match($regex, $to)) {

    if ($success) {
        echo "The email was sent successfully!!!";
    } else {
        echo "An error occurred, and the email was not sent. Check your domains' error logs and mail log for more info.";
    }

}
?>
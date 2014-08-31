<?php
# Get variables
$company = $_POST["company"];
$title = $_POST["title"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$street = $_POST["street"];
$zip = $_POST["zip"];
$phone = $_POST["phone"];
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$comment = $_POST["comment"];
$data = $_POST["data"];

$recipient = "cmeter@googlemail.com";
$subject = "Funkfatzke :: Anfrage";
$content = $data
// "
// <!DOCTYPE html>
// <html>
// <head>
//     <title>".$subject."</title>
// </head>
// <body>

// ".$data."

// </body>
// </html>
// "

mail($recipient, $subject, $content, "From: $firstname $lastname <$email>");
?>

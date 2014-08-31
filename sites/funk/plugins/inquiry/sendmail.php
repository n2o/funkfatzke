<?php
# Get variables
$company = $_POST["company"];
$title = $_POST["title"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$street = $_POST["street"];
$zip = $_POST["zip"];
$city = $_POST["city"];
$phone = $_POST["phone"];
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$comment = $_POST["comment"];

# Get complete JSON String and convert first layer to array
$localStorage = json_decode($_POST["localStorage"], true);

# Now take all articles and convert them
$articles = json_decode($localStorage["respond-cart"], true);

# Define some mailing stuff
$recipient = "christian.meter@hhu.de";
$subject = "Funkfatzke - Anfrage ".$company;

$content =
"
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
    <title>".$subject."</title>
</head>
<body>

<h2>Kontaktinformationen</h2>
<table>
    <tbody>
        <tr>
            <td>Firma:</td>
            <td>".$company."</td>
        </tr>
        <tr>
            <td>Anrede</td>
            <td>".$title."</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>".$firstname." ".$lastname."</td>
        </tr>
        <tr>
            <td>Stra&szlig;e</td>
            <td>".$street."</td>
        </tr>
        <tr>
            <td>PLZ, Stadt</td>
            <td>".$zip." ".$city."</td>
        </tr>
        <tr>
            <td>Telefon</td>
            <td>".$phone."</td>
        </tr>
        <tr>
            <td>E-Mail</td>
            <td>".$email."</td>
        </tr>
        <tr>
            <td>Bemerkung</td>
            <td>".$comment."</td>
        </tr>
    </tbody>
</table>

<h2>Artikel</h2>
<table>
    <tbody>";


$sumArticles = 0;
$sumPrice = 0;
foreach ($articles as $article) {
    $sumArticles += $article["quantity"];
    $totalPrice = floatval($article["price"]) * intval($article["quantity"]) * intval($article["duration"]);
    $sumPrice += $totalPrice;

    $content .= "<tr>";
        $content .= "<td><strong>Artikel</strong></td>";
        $content .= "<td><strong>".$article["sku"]."</strong></td>";
    $content .= "</tr>";

    $content .= "<tr>";
        $content .= "<td>Beschreibung</td>";
        $content .= "<td>".$article["description"]."</td>";
    $content .= "</tr>";

    $content .= "<tr>";
        $content .= "<td>Anzahl der Ger&auml;te</td>";
        $content .= "<td>".$article["quantity"]."</td>";
    $content .= "</tr>";

    $content .= "<tr>";
        $content .= "<td>Anzahl der Tage</td>";
        $content .= "<td>".$article["duration"]."</td>";
    $content .= "</tr>";

    $content .= "<tr>";
        $content .= "<td>Preis pro Tag</td>";
        $content .= "<td>".$article["price"]." &euro;</td>";
    $content .= "</tr>";

    $content .= "<tr>";
        $content .= "<td>Preis</td>";
        $content .= "<td>".$totalPrice." &euro;</td>";
    $content .= "</tr>";

    $content .= "<tr>";
        $content .= "<td>&nbsp;</td>";
        $content .= "<td>&nbsp;</td>";
    $content .= "</tr>";
}
$content .= "
    </tbody>
    <tfoot>
        <tr>
            <td><strong>Summe</strong></td>
            <td><strong>".$sumPrice." &euro;</strong></td>
        </tr>
    </tfoot>
</table>

</body>
</html>

";






require 'PHPMailer/PHPMailerAutoload.php';

// Create a new PHPMailer instance
$mail = new PHPMailer();

// Tell PHPMailer to use SMTP
$mail->isSMTP();

// Enable SMTP debugging
//   0 = off (for production use)
//   1 = client messages
//   2 = client and server messages
$mail->SMTPDebug = 0;

// Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

// Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

// Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

// Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

// Whether to use SMTP authentication
$mail->SMTPAuth = true;

// Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "cmeter@gmail.com";

// Password to use for SMTP authentication
$mail->Password = "moyeoxtpduxclwdv";

// Set who the message is to be sent from
$mail->setFrom($email, $firstname." ".$lastname);

// Set an alternative reply-to address
$mail->addReplyTo($email, $firstname." ".$lastname);

// Set who the message is to be sent to
$mail->addAddress($email, $firstname." ".$lastname);

// Set the subject line
$mail->Subject = $subject;

// Read an HTML message body from an external file, convert referenced images to embedded,
// convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents("contents.html"), dirname(__FILE__));
$mail->msgHTML($content, dirname(__FILE__));

// Replace the plain text body with one created manually
$mail->AltBody = 'Irgendetwas komisches ist gerade passiert... Vielleicht solltest du den Admin kontaktieren.';

// Attach an image file
#$mail->addAttachment('images/phpmailer_mini.png');

// send the message, check for errors
if (!$mail->send()) {
    echo "Fehler: " . $mail->ErrorInfo;
} else {
    echo "Nachricht erfolgreich verschickt!";
}
?>

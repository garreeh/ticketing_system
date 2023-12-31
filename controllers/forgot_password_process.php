<?php
include './../connections/connections.php';
require '../assets/PHPMailer/src/Exception.php';
require '../assets/PHPMailer/src/PHPMailer.php';
require '../assets/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function generateRandomPassword($length = 8)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $password = '';

  for ($i = 0; $i < $length; $i++) {
    $password .= $characters[rand(0, strlen($characters) - 1)];
  }

  return $password;
}

if (isset($_POST['reset_button'])) {
  $admin_email = $conn->real_escape_string($_POST['admin_email']);

  // Check if the email exists in the database
  $result = mysqli_query($conn, "SELECT * FROM admin_user WHERE admin_email='$admin_email'");

  if ($result->num_rows > 0) {
    // User found, generate a temporary password
    $tempPassword = generateRandomPassword(10);

    // Update the password in the database
    $hashedTempPassword = password_hash($tempPassword, PASSWORD_DEFAULT);
    mysqli_query($conn, "UPDATE admin_user SET admin_password='$hashedTempPassword', admin_confirm_password='$tempPassword' WHERE admin_email='$admin_email'");

    $mail = new PHPMailer;
    $mail->IsSMTP(); // enable SMTP
    // $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only : FOR LIVE
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Username = 'gajultos.garry123@gmail.com';

    // USING APP PASSWORD:
    $mail->Password = 'tehpihixtxqropqd';

    $mail->setFrom('gajultos.garry123@gmail.com', 'Garry Gajultos ');
    $mail->addAddress($_POST['admin_email']);
    $mail->addBcc($_POST['admin_email']);
    $mail->AddCC($_POST['admin_email']);
    //$mail->AddCC($_POST['email']);

    $mail->isHTML(true);
    $mail->Subject = 'Mailer Test';

    $message = "<p>Hi,
        <br>
        <br>
        Testing only
        <br>
        <br>
        Temporary password: <b>" . $tempPassword . "</b>
        <br>
        <br>
        Thank you!
        </p> ";

    $mail->Body = $message;

    if (!$mail->send()) {
      $result = "Something went wrong, Please try again";
      echo "$result";
    } else {
      //$result="Thank you " .$_POST['name']." for contacting us.";
      header("Location: /ticketing_system/views/admin/admin_thankyou.php");
      die();
    }
  } else {
    echo "Email not found!";
  }
}

?>
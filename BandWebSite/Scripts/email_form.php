<?php
  //Prihvaćanje podataka iz html forme
  $name = $_POST['name'];
  $subject = $_POST['subject'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  session_start();
  $user_timezone = $_SESSION['time'];
  
  ini_set('display_errors', '1');

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'vendor/autoload.php';

  //postavke e-mail servisa preko kojeg se mailovi šalju
  $mail = new PHPMailer();

  try {
    $mail->isSMTP();
    $mail->SMTPDEBUG = "2";
    $mail->Host = gethostbyname('smtp.live.com');
    $mail->SMTPAuth = true;
    $mail->Username = 'tomi.jurcevic@hotmail.com';
    $mail->Password = '2206291070';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->SMTPOptions = array(
      'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
    );

    //Oblikovanje maila
    date_default_timezone_set("Europe/Zagreb");
    $time = "This request has been sent at " . date("H:i:sa");
    $message = $message . "<br>" . $time . "<br>" . $user_timezone;
    $mail->setFrom('tomi.jurcevic@hotmail.com');
    $mail->addAddress('tomi.jurcevic@gmail.com');
    $mail->addReplyTo($email);
    $mail->isHTML(true);
    $mail->Subject = $subject . ' from ' . $name;
    $mail->Body = $message;
    $mail->send();
    echo 'Message has been sent. You will be redirected to our home page in 5 seconds.';
    //Vraćanje na početnu stranicu za 5 sekundi
    header("refresh:5;url=../index.html");
  }
  //Ispis pogreške
  catch(Exception $e) {
    echo 'Message could not be sent';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
  }
?>

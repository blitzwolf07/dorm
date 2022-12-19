<?php
use PHPMailer\PHPMailer\PHPMailer;
include 'include/connect.php';
                            
if(isset($_POST['email'])){

    $body = $_POST['body'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "youremail.com";
    $mail->Password = "123123";
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    $mail->isHTML(true);
    $mail->setFrom($email);
    $mail->addAddress("$email");
    $mail->Subject = ("$subject");
    $mail->Body = ("$body");

    if($mail->send()){
        $status = "success";
        $response = "Email is sent!";
    }
    else
    {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}

if($users)
  {
    //echo "Saved";
    $_SESSION['status'] = "Success. Please check to your email!";
    $_SESSION['status_code'] = "success";
    header("Location: forgot_password.php");
  }else
  {
    $_SESSION['status'] = "Error! Please try it again";
    $_SESSION['status_code'] = "error";
    header("Location: forgot_password.php");
  }

?>
      
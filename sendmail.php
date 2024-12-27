<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'lib/PHPMailer/src/PHPMailer.php';
    require 'lib/PHPMailer/src/Exception.php';

    $mail = new PHPMailer(true);
    $mail -> CharSet = 'UTF-8';
    $mail -> isHTML(true);

    $mail->setFrom('site@domain.com', 'Site.com', 0);
    $mail->addAddress('nikolay.nikiforov1980@gmail.com');
    $mail->Subject = 'Заявка с сайту site.com';

    $body = '<h1>Заявка з сайту site.com</h1>';

    if (trim(!empty($_POST['uname']))) {
        $body .= '<p><b>Ім\'я: </b>'.$_POST['uname'].'</p>';
    }

    if (trim(!empty($_POST['uphone']))) {
        $body .= '<p><b>Телефон: </b>'.$_POST['uphone'].'</p>';
    }  

    $mail->Body = $body;

    if(!$mail->send()) {
        $message = 'Error';
    } else {
        $message = 'Message Sent';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);    
?>
<?php
    use PHPMailer\PHPMailer\PHPMailer;

    require_once 'phpmailer/Exception.php';
    require_once 'phpmailer/PHPMailer.php';
    require_once 'phpmailer/SMTP.php';

    $mail = new PHPMailer(true);

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        try{
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'weijieteoh26@gmail.com';
            $mail->Password = 'icnigwfanwuydwap';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = '587';

            $mail->setFrom('weijieteoh26@gmail.com');
            $mail->addAddress('p19011213@student.newinti.edu.my');

            $mail->isHTML(true);
            $mail->Subject = 'Message Received (Contact Page)';
            $mail->Body = "<h3>Name: $name <br>Phone: $phone <br>Subject: $subject <br>Message: $message</h3>";

            $mail->send();
            $alert = '<div class="alert-success">
                        <span>Message Sent! Thank you for contacting us.</span>
                      </div>';
        } catch (Exception $e){
            $alert = '<div class="alert-error">
                        <span>'.$e->getMessage().'</span>
                      </div>';
        }
    }
?>
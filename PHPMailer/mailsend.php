<?php

    // require 'path/to/PHPMailer/src/PHPMailer.php';
    require 'PHPMailerAutoload.php';

    function sendemail($emailobj)
    {
        $mail = new PHPMailer;
        $smtp_set = parse_ini_file($_SERVER["DOCUMENT_ROOT"].'/app.ini');
        echo $_SERVER["DOCUMENT_ROOT"].'/app.ini';
        echo "<br>".$smtp_set['Host']."<br>";
        echo $smtp_set['Username']."<br>";                 // SMTP username
        echo $smtp_set['Password']."<br>";
        echo $smtp_set['Security']."<br>";
        echo $smtp_set['Port']."<br>";
        echo $smtp_set['FromEmail']."<br>";
        // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = $smtp_set['Host'];                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $smtp_set['Username'];                     // SMTP username
        $mail->Password   = $smtp_set['Password'];                               // SMTP password
        $mail->SMTPSecure = "tls";         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = $smtp_set['Port'];                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        // from Recipients
        $mail->setFrom($smtp_set['FromEmail']);
        $mail->FromName = $emailobj->Name;
        $mail->addAddress($emailobj->Address);     // Add a recipient
        $mail->addReplyTo($emailobj->Replyto);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        // Content
        
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = $emailobj->Body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            if ($mail->send()) {
                echo 'Message has been sent';
            } else {
                echo 'Message has not been sent';
            }
    ################ funtion sendmail brackets ########
     } 
    //  dont remove this curly brackets
    ################ funtion sendmail brackets ########
    
    
    // $mail->send();
?>



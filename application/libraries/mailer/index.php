<?php
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.163.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'inyourfaceapp@163.com';                 // SMTP username
	$mail->Password = 'inyourface@app';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->From = 'inyourfaceapp@163.com';
	$mail->FromName = '球约';
	//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
	$mail->addAddress('525114969@qq.com');               // Name is optional
	$mail->addReplyTo('inyourfaceapp@163.com', 'haveSent');
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');
					
	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = '账号激活';
	$mail->Body    = '请点击链接激活您的账号 <b>http://qq.com</b>';
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	    return $mail->ErrorInfo;
	} else {
	    return 'Message has been sent';
	}
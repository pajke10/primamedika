<?php 

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);
$alert = '';
if (isset($_POST['submit'])) {
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$message=$_POST['message'];

	try {
		$mail->isSMTP();
		$mail->Host='smtp.gmail.com';
		$mail->SMTPAuth=true;
		$mail->Username= 'stefanpajevic@gmail.com';
		$mail->Password= 'BozenA2212';
		$mail->SMTPSecure= PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Port= '587';

		$mail->SetFrom('stefanpajevic@gmail.com');
		$mail->addAddress('stefanpajevic@gmail.com');

		$mail->isHTML(true);
		$mail->Subject = 'Nova poruka je pristigla u Vašu ordinaciju!';
		$mail->Body = '<h3> Ime:' . $name . ' <br> Email: ' . $email . '<br>Phone:'. $phone . ' <br> Message:'. $message . '</h3>';

		$mail->send();

		$alert = '<div class="alert-success">
		<span>Message sent! Hvala sto ste Nam pisali.</span>
		</div>';
	} catch (Exception $e) {
			$alert='<div class="alert-error">
		<span>'.$e->getMessage().'</span>
		</div>';
	}


}else{
	
}

?>
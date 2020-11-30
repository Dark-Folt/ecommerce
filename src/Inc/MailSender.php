<?php
namespace App\Inc;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class MailSender
{
	private $mailer;

	public function __construct() {

	    $this->mailer = new PHPMailer();
	    $this->mailer->SMTPDebug = 0;                      
	    $this->mailer->isSMTP();                                            
	   	$this->mailer->Host 	  = "smtp.gmail.com";                  
	    $this->mailer->SMTPAuth   = true;                                   
		$this->mailer->Username = "ecommerce2020.shop@gmail.com";
		$this->mailer->Password = "Meco12-76";                           
	    $this->mailer->SMTPSecure = 'ssl';         
	    $this->mailer->Port       = 465;
	    $this->mailer->setFrom('ecommerce2020.shop@gmail.com', 'Aben-Shop');
	    $this->mailer->isHTML(true);

	    // require_once('corpsMails.php');
	}

    public function ecrireConfirmMessage($client_email, $confirm_token)
    {
        $s ="
        <html>
            <body>
                <div align=\"center\" id=\"message-container\">
                    <p>Votre compte a bien été crée, </br> 
                    Vérifier le en cliquant sur lien ci-dessous.
                    </p>
                    <a href=\"http://localhost:8000/controllers/mailVerificationController.php?email=$client_email&confirm_token=$confirm_token\">Confirmez votre compte</a>
                </div>
            </body>
        </html>
        ";
        return $s;
    }


	public function genererConfirmToken() {
		$s = sha1(openssl_random_pseudo_bytes(50));
		return substr($s,25);
	}

	public function envoyerMailConfirmation($email, $confirm_token) {
		$this->mailer->addAddress($email);                                  
	    $this->mailer->Subject = 'Confirmation de mail';
	    $this->mailer->Body    = $this->ecrireConfirmMessage($email, $confirm_token);

	    $this->mailer->send();
	}

	//TODO:: envoyer message de confirmation de la commande
	public function envoyerMessage($email, $message) {
		$this->mailer->addAddress($email);                                  
	    $this->mailer->Subject = 'Recapitulatif de commande';
	    $this->mailer->Body    = $message;

	    $this->mailer->send();
	}
}
?>
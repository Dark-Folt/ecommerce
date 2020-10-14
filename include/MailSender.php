<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
/*
    Pour l'envoie des mails, nous utilisons une classe déjà faite:
    https://github.com/PHPMailer/PHPMailer
    Cette classe permet d'envoyer un mail en utilisant direment le mot de passe du
    compte et les identifiants sans à faire de reglage dans notre systeme.
    Parce que nous avons essayer d'autres methodes mais il y'a beaucoup de problemes de 
    configuration etc

    class MailSender permet : 
        d'envoyer des mails en instanciant un objet de type PHPMailer
        donc suivant les contextes on va envoyer des mails en utilisant
        les different corps de texte qui sont dans "corpsMails.php"
*/

class MailSender
{
    private $sujet; //sujet du mail
    private $message; //message du mail ou le corps
    private $mailer;



    public function __construct()
    {
        require '../include/PHPMailer/src/Exception.php';
        require '../include/PHPMailer/src/PHPMailer.php';
        require '../include/PHPMailer/src/SMTP.php';

        $this->mailer = new PHPMailer(true);
        $this->mailer->IsSMTP();
        $this->mailer->IsHTML(); //les entetes sont deja definie à l'interieur   
        $this->mailer->Host='localhost';
        $this->mailer->SMTPDebug=0;
        $this->mailer->SMTPAuth=true;
        $this->mailer->SMTPSecure='ssl';
        $this->mailer->Host='smtp.gmail.com';
        $this->mailer->Port=465;
        $this->mailer->Username='ecommerce2020.shop@gmail.com';
        $this->mailer->Password='Meco12-76'; //ton mdp gmail
        $this->mailer->SetFrom("noreply@boson.com");
        $this->mailer->CharSet="utf-8";

    }
    
    public function envoyerMailConfirmation($client_email)
    {
        require_once 'corpsMails.php';
        try{
            $this->mailer->Subject = "Confirmation de compte";
            $this->mailer->Body = $ConfirmCompte;//ConfirmeCompte est definie dans 'corpsMails.php'
            $this->mailer->AddAddress($client_email);
            $this->mailer->Send();
        }catch(Exception $e){
            die("Erreur sur l'envoie du mail de confirmation".$e->getMessage());
        }

        if(!$this->mailer->Send()){
            echo 'E-mail non envoyé';
            echo 'Mailer error:'.$this->mailer->Errorinfo;
        }else{
            echo 'Message envoyé';
        } 
    }

    //TODO:function envoyerMailCommande
    /*public static function envoyerMailCommande($client_email)
    {
        require_once 'corpsMails.php';
        $message = $ConfirmCommande; //ConfirmeCompte est definie dans 'corpsMails.php'
        if(!self::$mail->Send()){
            echo 'E-mail non envoyé';
            echo 'Mailer error:'.self::$mail->Errorinfo;
        }else{
            echo 'Message envoyé';
        } 
    }*/
}
?>
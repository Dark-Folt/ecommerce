<?php
    if(isset($_POST['submit-btn']))
    {
        include('../include/connexionDB.php');
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $email = htmlspecialchars($_POST['email']);
        $req = $pdo->prepare('SELECT email, password FROM client WHERE :email AND :password');
        $res = $req->execute(array(
            'email' => $email,
            'password' => $password
        ));

    }else{
        header('Location: ../connexion/');
    }
?>
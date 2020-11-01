<?php
/*
 *
 * Ce fichier va contenir toutes les genres d'erreurs que l'on pourra rencontrer 
 * dans le site
*/
    function getRegistrationError(){}
    function getEmailError(){}
?>

<?php function getConfirmationMailError(){ ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <div class="alert alert-danger" style="text-align: center; width: 60%; height: 10%; margin: auto;">
        <strong>Erreur!</strong> Vous devez d'abord confirmer votre email.
    </div>
<?php } ?>


<?php function getLoginError(){ ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <div class="alert alert-danger" style="text-align: center; width: 60%; height: 10%; margin: auto;">
        <strong>Erreur!</strong> vérifier le mot de passe ou l'adresse email.
    </div>
<?php } ?>



<?php function getEmptyCartError(){?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <div class="alert alert-danger" style="text-align: center; width: 60%; height: 10%; margin: auto;">
        <strong>Erreur!</strong> Vous n'avez pas encore de compte chez nous. 
    </div>
<?php } ?>




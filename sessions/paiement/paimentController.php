<?php

    require '../../vendor/autoload.php';

    if(isset($_POST['code16c'])){
        $carteCode = $_POST['code16c'];
        $tab = str_split($carteCode);
        $len = count($tab);

        $somme = 0;
        $avance = true;
        for($i=$len-1; $i >= 0; $i--)
        {
            if(!$avance)
            {
                $somme += $tab[$i];
                $avance = true;
            }
            else
            {
                $avance = false;
                $somme += ($tab[$i] * 2) % 9;
            }
        }

        if($somme % 10 == 0)
        {
            echo "le code est bon !";
            echo "Un email vous a été envoyé";
            //TODO:envoie du mail recapitulant les details de la commande

            header("Location: ../panier?paiment=true");
        }
        else
        {
            header("Location: ../../../");
        }
    }
?>
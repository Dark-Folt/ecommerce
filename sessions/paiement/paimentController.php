<?php

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
        }
        else
        {
            echo "non";
        }
    }
?>
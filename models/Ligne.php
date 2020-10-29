<?php

class Ligne
{
    private $commande_id,
            $artincle_id,
            $quantite,
            $prix_unit;
    


    public function __construct() {

    }


    public function getCommand_id(){return $this->command_id;}
    public function getArticle_id(){return $this->article_id;}
    public function getQuantite(){return $this->quantite;}
    public function getPrix_unit(){return $this->prix_unit;}


    public function setQuantite($quantite) {$this->quantite = $quantite;}
    public function setPrix_unit($prix_unit) {$this->prix_unit;}
}
?>
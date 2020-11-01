<?php
/*
 *
 * 
*/
class Commande 
{
    private $id,
            $client_id,
            $date;

    public function __construct($commande) {

    }
    public function getId(){$this->id;}
    public function getClient_id(){$this->client_id;}
    public function getDate(){ $this->date;}


    public function setId($id) {$this->id = $id;}
    public function setClient_id($client_id) {$this->client_id = $client_id;}
    public function setDate($date) {$this->date = $date;}
}
?>
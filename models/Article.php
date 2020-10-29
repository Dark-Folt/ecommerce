<?php
/**
* 
*/
class Article
{
	private $id,
			$nom,
			$marque,
			$prix;
	
	public function __construct($article)
	{

	}

	public function getId() { return $this->id; }
	public function getNom() { return $this->nom;}
	public function getMarque() {return $this->marque;}
	public function getPrix() {return $this->prix;}

	public function setId($id) { $this->id = $id; }
	public function setNom($nom) { $this->nom = $nom; }
	public function setMarque($marque) {$this->marque = $marque;}
	public function setPrix($prix) {$this->prix = $prix;}
}
?>
<?php

namespace App\Models;
/**
* 
*/
class Article
{
	private $id,
			$nom,
			$marque,
			$image,
			$description,
			$prix;
	
	private function hydrate(array $donnees)
	{
		foreach($donnees as $key => $value)
		{
			$method = 'set'.ucfirst($key);
			if(method_exists($this,$method))
			{
				$this->$method($value);
			}
		}
	}

	public function __construct(array $donnees)
	{
		if(!empty($donnees))
		{
			$this->hydrate($donnees);
		}
	}

	public function getId() { return $this->id; }
	public function getNom() { return $this->nom;}
	public function getMarque() {return $this->marque;}
	public function getImage() {return $this->image;}
	public function getDescription() {return $this->description;}
	public function getPrix() {return $this->prix;}

	public function setId($id) { $this->id = $id; }
	public function setNom($nom) { $this->nom = $nom; }
	public function setMarque($marque) {$this->marque = $marque;}
	public function setImage($image){$this->image = $image;}
	public function setDescription($d){$this->description = $d;}
	public function setPrix($prix) {$this->prix = $prix;}
}
?>
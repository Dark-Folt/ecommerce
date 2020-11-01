<?php
    class Client
    {
        private $id,
                $nom,
                $prenom,
                $date_naissance,
                $email,
                $adresse;

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
        
        //getters
        public function getId() { return $this->id; }
        public function getNom() { return $this->nom; }
        public function getPrenom() { return $this->prenom; }
        public function getDateDeNaissance() { return $this->date_naissance; }
        public function getEmail() { return $this->email; }
        public function getAdresse() { return $this->adresse;}

        //settters
        public function setNom($nom) { $this->nom = $nom; }
        public function setPrenom($prenom) { $this->prenom = $prenom; }
        public function setDate_naissance($dn) { $this->date_naissance = $dn; }
        public function setEmail($email) { $this->email = $email; }
        public function setAdresse($adresse) { $this->adresse = $adresse; }

    }
?>
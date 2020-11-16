<?php


namespace App\DataBase;
/*
 *
 * class MyDB 
 * Permet de creer une connexion à la bd
 * 
 *
*/
class MyDB{

    /**
     * @var string adresse utilisé pour se connecter à la BD 
     */
    private $host = 'localhost';

    /**
     * @var int numero de port pour la connexion à la BD
     */
    private $port = 3306;

    /**
     * @var string nom de l'utilisateur qui va se connecter à la BD
     */
    private $userName = 'root';

    /**
     * @var string mot de passe utilisé pour se conencter à la BD
     */
    private $password = '';

    /**
     * @var string  nom de la BD
     */
    private $DBName = 'ecommerce';

    /**
     * @var \PDO reference vers la base de donnée
     */
    private $pdo;

    /**
     * @var permet de garde la refrerence requete 
     * pour pouvoir fermer la BD
     */
    private $ref_query;



    /**
     * @param string adresse de connexion
     * @param string nom de l'hote
     * @param int    numéro de port que l'on va utiliser pour se connecter à la BD
     * @param string mot de passe de l'hote
     * @param string nom de la BD
     * @throws \PDOException
     */
    public function __construct($host = null, $port = null, $userName = null, $password = null, $DBName = null) {
        /**
         * si le host est diffèrent de null
         * on remplie les propriétés avec les valeurs passées en paramètres
         */
        if($host){
            $this->host = $host;
            $this->port = $port;
            $this->userName = $userName;
            $this->password = $password;
            $this->DBName = $DBName;
        }

        // on fait un try car la connexion à la BD peut être suivie d'une erreur
        try{
            //une fois qu'on a remplie les propriétés on va instancier la BD
            $this->pdo = new \PDO('mysql:host='.$this->host.';port='.$this->port.';dbname='.$this->DBName.'', $this->userName, $this->password);

            //on set les attributs pour l'affichage des erreurs
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            /*
                L'orque l'on recupere des informations dans une table 
                le logiciel nous renvoie les informations dans un tableau associatif
                mais dans notre cas nous ne voulons pas cela.
                on va demander au logiciel de nous renvoyer les informations comme des objets 
                donc au lieu d'utilier $donnees['nom'] => $donnees->nom;
            */
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        }catch(\PDOException $e){
            die('Impossible de se connecter à la Base de donnée: '.$e->getMessage());
        }
    }


    /**
     * query permet de faire une requete preparée
     * si les données pour la preparation ne sont passé en parametre alors on execute 
     * la requte sans avec juste la faction query de pdo
     * on garde ensuite la reference de la requetete pour pouvoir fermer la BD
     * @param string la requete à exécuter
     * @param boolean tableau assossiatif qui contient les données de la requete preparée
     * @return 
     */
    public function query($q, $data = array()){
        $r = $this->pdo->prepare($q);
        if(!empty($data)){ $r->execute($data);
        }else{ $r = $this->pdo->query($q); }
        
        $this->ref_query = $r;
        return $r;
    }

    /**
     * close permet de fermer la connexion à la BD
     * @param string nom de la requete
     */
    public function closeDB(){
        $this->ref_query->closeCursor();
    }

}
?>
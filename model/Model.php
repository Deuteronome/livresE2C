<?php

class Model {
    private PDO $bdd;

    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=livres_e2c;charset=utf8','livres_e2c_admin','F9Jx9r5Pfg4Eb7');
        }catch(Exception $e) {
            echo('problème de connexion : '.$e->getMessage());
        }    
    }

    public function getUserByEmail (string $email){
        $sqlQuery = "SELECT id, pseudo, password FROM Users WHERE email = :email";
        $statement = $this->bdd->prepare($sqlQuery);
        $statement->execute([
            'email' => $email
        ]);
        $req = $statement->fetch();//ou fetchAll()

        return $req;
    }    
}
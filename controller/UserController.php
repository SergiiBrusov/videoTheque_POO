<?php

namespace User;
include("./repository/UserRepository.php");
class UserController extends UserRepository {
    public function registration($data){
        $error = [];
        $nom = $data['nom'];
        $email = $data['email'];
        $password = $data['password'];
        // verification des données sinon push error
        // ...
        if(sizeof($error) === 0){
            /* var_dump($error);
            die; */
            // appelle UserRepository pour enregistrer mes données
            $verifData['nom'] = $nom;
            $verifData['email'] = $email;
            $verifData['password'] = $password;
            $this->insert($verifData);
        } else {
            return $error;
        }

    }
}

class Info {
    public function displayInfoUser(){
        return "Info sur les utilisateurs ";
    }
}
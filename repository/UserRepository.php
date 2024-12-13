<?php

namespace User;

use Connection\Connect;
include_once("./repository/pdo.php");

class UserRepository extends Connect{
    private $pdo;
    public function __construct()
    {
        $this->pdo = $this->connect();
    }
    protected function insert($data){
        $rq = "INSERT INTO user(email, password, nom) VALUES (:email,:password,:nom)";
        $statement = $this->pdo->prepare($rq);
        $statement->execute(
            [
                ":email"=>$data['email'],
                ":nom"=>$data['nom'],
                ":password"=>$data['password']
                ]
        );
    }
    protected function getAllUsers(){
        $rq = "SELECT * FROM user";
        $statement = $this->pdo->prepare($rq);
        $statement->execute();
        return $statement->fetchAll();
    }
    protected function getUser($id){
        $rq = "SELECT * FROM user WHERE id_user = $id";
        $statement = $this->pdo->prepare($rq);
        $statement->execute();
        return $statement->fetch();
    }
    protected function getUsersBy($key,$value){
        $rq = "SELECT * FROM user WHERE $key LIKE '%$value%'";
        $statement = $this->pdo->prepare($rq);

        $statement->execute();
        return $statement->fetchAll();
    }
}
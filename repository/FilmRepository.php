<?php
namespace Film;
// pour importer une class depuis un autre namespace
// je dois utiliser le mot cle use suivis du Namespace\Class
use Connection\Connect;

include_once("./repository/pdo.php");
// abstract permet empecher l'instanciation d'une class
// mais garde possible son heritage (extends)
abstract class FilmRepository extends Connect{
    private $pdo;
    public function __construct()
    {
        $this->pdo = $this->connect();
    }
    protected function getRandomFilms(){
        $rq = "SELECT * FROM movies_full ORDER BY RAND() LIMIT 0,10";
        $statement = $this->pdo->prepare($rq);
        $statement->execute();
        return $statement->fetchAll();
    }
    protected function getAllFilms(){
        $rq = "SELECT * FROM movies_full";
        $statement = $this->pdo->prepare($rq);
        $statement->execute();
        return $statement->fetchAll();
    }
    protected function getFilmById($id){
        $rq = "SELECT * FROM movies_full WHERE id_movie = $id";
        $statement = $this->pdo->prepare($rq);
        $statement->execute();
        return $statement->fetch();
    }
    protected function getFilmsBy($key,$value){
        $rq = "SELECT * FROM movies_full WHERE $key LIKE '%$value%'";
        $statement = $this->pdo->prepare($rq);

        $statement->execute();
        return $statement->fetchAll();
    }
}
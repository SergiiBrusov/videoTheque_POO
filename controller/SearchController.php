<?php
abstract class SearchController{
    public static function search($input) {
        $pdo = new PDO('mysql:host=localhost;dbname=netflix;charset=utf8', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        $rq = "SELECT * FROM movies_full WHERE title LIKE '%$input%' LIMIT 0,10";
        $statement = $pdo->prepare($rq);
        $statement->execute();
        $result = $statement->fetchAll();
        $result = json_encode($result);
        return $result;
    }
}

echo(SearchController::search($_GET['input']));
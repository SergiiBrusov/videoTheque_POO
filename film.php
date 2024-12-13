<?php
include("./templates/header.html");
include ("./controller/FilmController.php");
// ... 
// au click dans index.php sur le lien je souhaite puvrir cette page et afficher l'id_movie du film selectionne
// echo $_GET['id_movie'];
$filmController = new Film\FilmController;
$film = $filmController->displayOneFilm($_GET);
var_dump($film);

include("./templates/footer.html");
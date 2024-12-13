<?php

namespace Film;

include("./repository/FilmRepository.php");


class FilmController extends FilmRepository
{
    private $id;
    private $title;
    private $year;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function displayIndex()
    {
        $listFilms = $this->getRandomFilms();
        // je filtre, je trie, je controlle les données fournies par le repository
        /* var_dump($listFilms); */

        foreach ($listFilms as $key => $value) {
            if (!file_exists("./assets/img/posters/" . $value['id_movie'] . ".jpg")) {
                $listFilms[$key]['urlPoster'] = "./assets/img/posters/default.jpg";
            } else {
                $listFilms[$key]['urlPoster'] = "./assets/img/posters/" . $value['id_movie'] . ".jpg";
            }
        }

        return $listFilms;
    }
    public function displayOneFilm($get)
    {
        //possibilité de controle de donnee
        // controle d'un $_GET empty
        if (empty($get)) {
            return ['error' => "Desolé"];
        } else {
            // controle id_movie qui n'existe pas dans ma table

            if($this->getFilmById($get["id_movie"])){
                return $this->getFilmById($get["id_movie"]);
            } else{
                return ['error' => "Desolé"];
            }
            var_dump($this->getFilmById($get["id_movie"]));
            die();
        };

        var_dump($id);

        //$_GET['id_movie']
        return $this->getFilmById($id);
    }
}

class Info
{
    public function displayInfoFilm()
    {
        return "Info sur les films ";
    }
}

<?php
include("./controller/FilmController.php");
include("./controller/UserController.php");
$film = new Film\FilmController();
include("./templates/header.html");
?>
<div id="random-films" class="d-flex flex-wrap">
    <?php foreach ($film->displayIndex() as $value) : ?>
        <div class="card mb-3 w-25">
            <h3 class="card-header"><?php echo $value["title"]; ?></h3>
            <div class="card-body">
                <h5 class="card-title"><?php echo $value["directors"]; ?></h5>
                <h6 class="card-subtitle text-muted"><?php echo $value["year"]; ?></h6>
            </div>
            <img class="img-fluid" src="./assets/img/posters/<?php echo $value["id_movie"]; ?>.jpg" alt="">
            <div class="card-body">
                <p class="card-text"><?php echo $value["plot"]; ?></p>
            </div>
            <div class="card-body">
                <a href="#" class="card-link">Plus d'Info</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
// ici je souhaite appeler mes 2 classes Info pour User et Film
$filmInfo = new Film\Info;
echo($filmInfo->displayInfoFilm());
$userInfo = new User\Info;
echo($userInfo->displayInfoUser());
include("./templates/footer.html");
?>
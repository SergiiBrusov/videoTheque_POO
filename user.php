<?php
include("./templates/header.html");
include("./controller/UserController.php");
// ... 
// besoin d'un signal qui à la validation de mon formulaire appelle mon controller
if( isset($_POST["submit"]) && !empty($_POST["submit"]) ){
    $user = new User\UserController; 
    $error = $user->registration($_POST);  
}
?>
<form action="./user.php" method="post">
    <div class="row">
        <div class="col-sm-10">
            <input type="text" name="email" class="form-control-plaintext" placeholder="Email">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            <input type="text" name="nom" class="form-control-plaintext" placeholder="Nom">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            <input type="password" name="password" class="form-control-plaintext" placeholder="Password">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            <input type="submit" name="submit" class="form-control-plaintext" value="Register">
        </div>
    </div>
</form>

<?php

include("./templates/footer.html");
<?php
$canDo = false;
if(!empty($_POST['dateNaiss'])){
    setcookie('dateNaiss', $_POST['dateNaiss']);
}
if(!empty($_COOKIE['dateNaiss'])){
    $age = 2022 - $_COOKIE['dateNaiss'];
    if($age >= 18){
        $canDo = true;
    }
}
require 'header.php';
?>

<?php 
    if(!empty($_COOKIE['dateNaiss'])){
        if($canDo){
            echo '<h2>Vous avez access au contenu.</h2>';
        }
        else{
            echo "<h2>Impossible d'acceder au contenu.</h2>";
        }
    }
?>

<?php require 'footer.php' ?>
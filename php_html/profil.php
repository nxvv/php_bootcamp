<?php
$user = [
    'prenom' => 'John',
    'nom' => 'Doe',
    'age' => 18
];
var_dump(serialize($user)); die();
$nom = null;
if(!empty($_GET['action']) && $_GET['action'] === 'deconnecter'){
    unset($_COOKIE['utilisateur']);
    setcookie('utilisateur', '', time() - 10);
}
if(!empty($_COOKIE['utilisateur'])){
    $nom = $_COOKIE['utilisateur'];
}
if(!empty($_POST['nom'])){
    setcookie('utilisateur', $_POST['nom']);
    $nom = $_POST['nom'];
}
require 'header.php';
?>

<?php if($nom) : ?>
    <h1>Bonjour <?= htmlentities($nom) ?> </h1>
    <a href="profil.php?action=deconnecter">Se déconnecter</a>
<?php else : ?>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="nom" placeholder="Entrer votre nom">
        </div>
        <button class="btn btn-primary">Se connecter</button>
    </form>
<?php endif; ?>

<?php require 'footer.php'; ?>
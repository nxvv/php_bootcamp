<?php 
$age = null;
if(!empty($_POST['dateNaiss'])){
    setcookie('dateNaiss', $_POST['dateNaiss']);
    $_COOKIE['dateNaiss'] = $_POST['dateNaiss'];
}

if(!empty($_COOKIE['dateNaiss'])){
    $birthday = (int)$_COOKIE['dateNaiss'];
    $age = (int)date('Y') - $birthday;
}

require 'header.php'; 
?>

<?php if($age && $age >= 18): ?>
    <h1>Vous avez accès au contenu.</h1>
<?php elseif ($age !== null): ?>
    <div class="alert alert-danger">
        <h1>Interdit de voir le contenu</h1>
    </div>
<?php else : ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="dateNaiss">Entrez votre annee de naissance</label>
            <select name="dateNaiss" class="form-control">
                <?php for($i = 2010; $i > 1919; $i--) : ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor ?>
            </select>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
<?php endif; ?>

<?php require 'footer.php' ?>
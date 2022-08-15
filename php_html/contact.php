<?php 
$title = 'Nous contacter';
$nav = 'contact';
require_once 'config.php';
require 'header.php'; 

date_default_timezone_set("Africa/Porto-Novo");
$heure = (int)date('H');
$current_creneaux = CRENEAUX[(int)date('N') - 1];
$ouvert = in_creneaux($heure, $current_creneaux);
$color = $ouvert ? 'green': 'red';

if(!empty($_POST['heure'])){
    $dispo = false;
    $message = 'Nous ne sommes pas disponibles';
    if(in_creneaux((int)$_POST['heure'], CRENEAUX[(int)$_POST['jour']])){
        $dispo = true;
        $message = 'Nous sommes disponibles';
    }
}

$creneaux = creneaux_html(CRENEAUX,JOURS); 
?>

<div class="row">
    <div class="col-md-8">
        <h2>Nous contacter</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque necessitatibus sapiente sed consequuntur expedita, quas blanditiis ex ad commodi laboriosam, deserunt incidunt recusandae officiis? Tenetur excepturi consectetur vitae ab maxime.</p>
        <h3>Verifiez si nous serons ouverts a vos horaires de disponibilite</h3>
            <?php if(isset($dispo) && $dispo == true) : ?> 
                <div class="alert alert-success">
                    <?= $message ?>
                </div>
            <?php endif ?>
            <?php if(isset($dispo) && $dispo == false) : ?> 
                <div class="alert alert-danger">
                    <?= $message ?>
                </div>
            <?php endif ?>
        <form method="post">
            <div class="form-group">
                <select class="form-control" name="jour" required>
                    <option value="">Choisir un jour</option>
                    <?php foreach (JOURS as $key => $jour):?>
                        <option value="<?= $key ?>"><?= $jour ?></option>
                    <?php endforeach ?>
                </select><br>
                <div class="form-group">
                    <input type="number" class="form-control" name="heure" style="margin: 10px 0;" placeholder="Choisir une heure" required><br>
                </div>
                <input type="submit" value="Valider" class="btn btn-success">
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <h2>Horaires d'ouvertures</h2>
        <?php if($ouvert) : ?> 
            <div class="alert alert-success">
                Le magasin est ouvert
            </div>
        <?php else : ?>
            <div class="alert alert-danger">
                Le magasin est fermé
            </div>
        <?php endif ?>
        <ul>
            <?php foreach($creneaux as $key => $creneau): ?>
                <li <?php if($key+1 == (int)date('N')): ?> style="color:<?= $color; ?>" <?php endif ?>>
                    <?=$creneau?>
                </li><br>
            <?php endforeach; ?>
        </ul>
    </div>
</div>



<?php require 'footer.php' ?>
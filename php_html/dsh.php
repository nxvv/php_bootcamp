<?php 
require 'functions/compteur.php';
ajouter_vue();
$total = nombre_vues();
$annee_courante = (int)date('Y');
$annee = empty($_GET['annee']) ? $annee_courante : (int)$_GET['annee'] ;
$mois = [
    '01' => 'Janvier',
    '02' => 'Fevrier',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Aout',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Decembre'
];
require 'header.php';
?>
    <div class="row">
        <div class="col-md-4">
            <div class="list-group">
                <?php for($i = 0; $i < 5; $i++) : ?>
                    <a class="list-group-item <?= $annee_courante - $i === $annee ? 'active': ''; ?>" href="dsh.php?annee=<?= $annee_courante - $i ?>">
                        <?= $annee_courante - $i ?>
                    </a>
                    <?php if($annee === $annee_courante - $i) : ?>
                        <div class="list-group">
                            <?php foreach($mois as $nom) : ?>
                                <a class="list-group-item"  href="dsh.php?annee=<?= $annee ?>&mois=<?= $nom ?>"><?= $nom ?></a>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>
                <?php endfor ?>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <strong style="font-size: 3em;"><?= $total ?></strong>
                    visite<?php if($total > 1) : ?>s <?php else : ?> <?php endif; ?> 
                </div>
            </div>
        </div>
    </div>
<?php
require 'footer.php';
?>
<?php 

function nav_item (string $lien, string $titre, string $linkClass = ''):  string  
{

    $classe = 'nav-item';
    if($_SERVER['SCRIPT_NAME'] === $lien){
        $classe .= ' active';
    }
    
    return '<li class="' . $classe . '">
        <a class="' . $linkClass.'" href="' . $lien . '">'. $titre  .'</a>
    </li>';
    
    //   return <<<HTML
    //   <li class="$classe">
    //     <a class="nav-link" href="$lien">$titre</a>
    //   </li>
    // HTML;
}

function nav_menu(string $linkClass = ''): string 
{
    return 
        nav_item('/index.php', 'Accueil', $linkClass) .
        nav_item('/contact.php', 'Contact', $linkClass);
}

function checkbox (string $name, string $value, array $data)
{
    $attributes = '';
    if(isset($data[$name]) && in_array($value, $data[$name])){
        $attributes .= 'checked';
    }
    return <<<HTML
    <input type="checkbox" name="{$name}[]" value="$value" $attributes> 
HTML;
}

function radio (string $name, string $value, array $data)
{
    $attributes = '';
    if(isset($data[$name]) && $value === $data[$name]){
        $attributes .= 'checked';
    }
    return <<<HTML
    <input type="radio" name="$name" value="$value" $attributes> 
HTML;
}

function creneaux_html(array $creneaux, array $jours)
{
    $phrases = [];
    $phrase1 = "";
    $phrase2 = "";

    foreach($jours as $key => $jour) {
        if(!empty($creneaux[$key])){
            $phrase1 = "{$jour} : de <strong>{$creneaux[$key][0][0]}h</strong> à <strong>{$creneaux[$key][0][1]}h</strong>";
            if(isset($creneaux[$key][1])){
                $phrase2 = "de <strong>{$creneaux[$key][1][0]}h</strong> à <strong>{$creneaux[$key][1][1]}h</strong>";
                $phrases [] = $phrase1 . ' et ' . $phrase2;
            }else{
                $phrases[] = $phrase1;
            }
        }else{
            $phrases[] = "{$jour} : <strong> Pas d'ouverture. </strong>";
        }
    }
    return $phrases;
}

function in_creneaux(int $heure, array $creneaux): bool
{
    foreach ($creneaux as $c) {
        $debut = $c[0];
        $fin = $c[1];
        if($heure >= $debut && $heure < $fin){
            return true;
        }
    }
    return false;
}
?>
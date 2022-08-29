<?php

$fichier = __DIR__.DIRECTORY_SEPARATOR.'demo.csv';
$resource = fopen($fichier, 'r');
echo fread($resource,2);
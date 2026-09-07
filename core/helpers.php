<?php

namespace Core\Helpers;

// fonction pour couper dans les textes trop long 

function truncate($text, $limit = 100) 
{
    if (strlen($text) <= $limit) 
        return $text;


    // On coupe d'abord à la limite brute
    $text = substr($text, 0, $limit);

    // On cherche la position du dernier espace
    $last_space = strrpos($text, ' ');

    // On recoupe au niveau du dernier espace et on ajoute des points de suspension
    return substr($text, 0, $last_space) . '...';
}

// fonction pour faire les slug
function slugify(string $text): string {
    // Remplacer les caractères accentués par leur équivalent
    $text = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);
    
    // Mettre en minuscules
    $text = strtolower($text);
    
    // Remplacer tout ce qui n'est pas une lettre ou un chiffre par un tiret
    $text = preg_replace('/[^a-z0-9]+/', '-', $text);
    
    // Supprimer les tirets au début et à la fin
    $text = trim($text, '-');
    
    // Retourner la chaîne ou une valeur par défaut si vide
    return empty($text) ? 'n-a' : $text;
}


// fonction pour le format des dates 

function dateFormator(string $date, string $format ="d/M/Y") :string {
    return date($format, strtotime($date));
}
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
function slugify (string $str){
    return trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($str)), '-');
}

// fonction pour le format des dates 


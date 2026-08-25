<?php

namespace Core\Helpers;

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
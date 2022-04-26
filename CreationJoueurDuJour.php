<?php
// Création d'une nouvelle ressource cURL
$ch = curl_init();

// Configuration de l'URL et d'autres options
curl_setopt($ch, CURLOPT_URL, "http://api.chourmolympique.fr/api/joueur_du_jour/creer");
curl_setopt($ch, CURLOPT_HEADER, 0);

// Récupération de l'URL et affichage sur le navigateur
if( ! $result = curl_exec($ch))
{
    trigger_error(curl_error($ch));
}
// Fermeture de la session cURL
curl_close($ch);
<?php

/** regarder:
 *  https://www.youtube.com/watch?v=dVyecM
 */

require __DIR__ . '/controller/Router.php';

$routeur = new Router();
$routeur->handleRequest('accueil');
?>
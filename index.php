<?php

/**
 * Point d'entrée unique (Front Controller)
 * Toutes les requêtes passent par ici.
 */

require_once __DIR__ . '/controllers/PageController.php';

$controller = new PageController();

// Routage minimal
$route = $_GET['route'] ?? 'index';

switch ($route) {
    case 'project':
        // Route AJAX : GET /index.php?route=project&id=m2l
        $controller->getProjectJson();
        break;

    default:
        // Page principale
        $controller->renderIndex();
        break;
}

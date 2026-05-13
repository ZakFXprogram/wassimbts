<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

require_once __DIR__ . '/../models/ProfileModel.php';
require_once __DIR__ . '/../models/ProjectModel.php';

try {
    $method = $_SERVER['REQUEST_METHOD'];
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    if (strpos($path, '/api/profile') !== false) {
        $profile = ProfileModel::getProfile();
        echo json_encode($profile, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } elseif (strpos($path, '/api/projects') !== false) {
        $projects = ProjectModel::getProjects();
        echo json_encode($projects, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } elseif (strpos($path, '/api/skills') !== false) {
        $skills = ProjectModel::getCompetences();
        echo json_encode($skills, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Endpoint not found']);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
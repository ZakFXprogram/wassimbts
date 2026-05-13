<?php

require_once __DIR__ . '/../models/ProfileModel.php';
require_once __DIR__ . '/../models/ProjectModel.php';

/**
 * PageController
 * Orchestre les données des modèles et les transmet aux vues.
 */
class PageController
{
    private array $profile;
    private array $competences;
    private array $groupedProjects;
    private array $allProjects;

    public function __construct()
    {
        $this->profile         = ProfileModel::getProfile();
        $this->competences     = ProjectModel::getCompetences();
        $this->groupedProjects = ProjectModel::getProjectsByCategory();
        $this->allProjects     = ProjectModel::getProjects();
    }

    /**
     * Affiche la page principale du portfolio.
     */
    public function renderIndex(): void
    {
        $profile         = $this->profile;
        $competences     = $this->competences;
        $groupedProjects = $this->groupedProjects;
        $allProjects     = $this->allProjects;

        require_once __DIR__ . '/../views/index.php';
    }

    /**
     * Retourne un projet en JSON (pour les appels AJAX).
     */
    public function getProjectJson(): void
    {
        $id      = $_GET['id'] ?? '';
        $project = ProjectModel::getProjectById($id);

        header('Content-Type: application/json');

        if (!$project) {
            http_response_code(404);
            echo json_encode(['error' => 'Projet introuvable']);
            return;
        }

        echo json_encode($project);
    }
}
?>
<?php

/**
 * ProjectModel
 * Fournit toutes les données relatives aux projets et au tableau de compétences.
 */
class ProjectModel
{
    /**
     * Retourne les 6 compétences BTS SIO E4 (colonnes du tableau).
     */
    public static function getCompetences(): array
    {
        return [
            'c1' => 'Gérer le patrimoine informatique',
            'c2' => 'Répondre aux incidents',
            'c3' => 'Présence en ligne',
            'c4' => 'Mode projet',
            'c5' => 'Mise à disposition service',
            'c6' => 'Développement professionnel',
        ];
    }

    /**
     * Retourne tous les projets avec leurs détails et compétences associées.
     */
    public static function getProjects(): array
    {
        return [
            'm2l' => [
                'title'    => 'M2L – Réservation de salles & Ticketing',
                'period'   => '2024–2025',
                'category' => 'formation',
                'context'  => 'Dans le cadre de la Maison Pour Tous de Lormont, développement d\'une application de réservation de salles avec un système de ticketing intégré.',
                'techs'    => ['PHP', 'MySQL', 'GitLab', 'HTML/CSS'],
                'skills'   => [
                    'c2' => 'Prise en charge de tickets sous GitLab : affectation, suivi et résolution des demandes utilisateurs.',
                    'c4' => 'Analyse des objectifs du projet, planification des tâches et organisation des livrables.',
                    'c5' => 'Réalisation des tests d\'intégration et d\'acceptation du service avant déploiement.',
                ],
            ],
            'sql' => [
                'title'    => 'AP 2.1 – Générateur SQL',
                'period'   => '2024–2025',
                'category' => 'formation',
                'context'  => 'Application permettant de générer automatiquement des requêtes SQL à partir d\'une interface graphique.',
                'techs'    => ['Python', 'SQL', 'Interface graphique'],
                'skills'   => [
                    'c4' => 'Analyse des besoins, planification des activités, documentation du projet et évaluation des indicateurs de suivi.',
                ],
            ],
            'static' => [
                'title'    => 'AP 2.3 – Site statique',
                'period'   => '2024–2025',
                'category' => 'formation',
                'context'  => 'Conception et développement d\'un site web statique pour valoriser l\'image numérique d\'une organisation.',
                'techs'    => ['HTML', 'CSS', 'JavaScript'],
                'skills'   => [
                    'c3' => 'Valorisation de l\'image de l\'organisation en ligne, référencement des services et participation à l\'évolution du site web.',
                    'c4' => 'Planification des tâches et organisation du projet de développement.',
                ],
            ],
            'm2l-dyn' => [
                'title'    => 'M2L – Site dynamique',
                'period'   => '2024–2025',
                'category' => 'formation',
                'context'  => 'Développement d\'une version dynamique du site M2L avec gestion de contenu, base de données et suivi des demandes.',
                'techs'    => ['PHP', 'MySQL', 'HTML/CSS', 'JavaScript'],
                'skills'   => [
                    'c2' => 'Collecte, suivi et traitement des demandes concernant les applications.',
                    'c3' => 'Création d\'une page dynamique pour valoriser la présence en ligne de l\'organisation.',
                    'c4' => 'Planification des tâches et gestion du projet.',
                    'c5' => 'Réalisation des tests d\'intégration et d\'acceptation du service.',
                ],
            ],
            'orga' => [
                'title'    => 'Organisation & professionnalisation',
                'period'   => 'Stage 1ère année — La Cali, Libourne',
                'category' => 'stage1',
                'context'  => 'Stage de 5 semaines au sein du service DSI de La Cali (Communauté d\'agglomération du Libournais). Mise en place de bonnes pratiques professionnelles.',
                'techs'    => ['Windows', 'Active Directory', 'Outils DSI'],
                'skills'   => [
                    'c4' => 'Planification des activités au sein du service DSI.',
                    'c6' => 'Mise en place de l\'environnement d\'apprentissage personnel et développement du projet professionnel.',
                ],
            ],
            'script' => [
                'title'    => 'Automatisation & scripting (PowerShell & Python)',
                'period'   => 'Stage 1ère année — La Cali, Libourne',
                'category' => 'stage1',
                'context'  => 'Développement de scripts d\'automatisation pour recenser les ressources numériques, traiter des demandes système et déployer des services.',
                'techs'    => ['PowerShell', 'Python', 'Active Directory', 'CSV'],
                'skills'   => [
                    'c1' => 'Recensement et identification des ressources numériques du parc informatique.',
                    'c2' => 'Traitement des demandes concernant les services réseau, système et applicatifs.',
                    'c5' => 'Déploiement de scripts automatisés comme services opérationnels.',
                ],
            ],
            'acc' => [
                'title'    => 'Projet Aux Claviers Citoyens',
                'period'   => 'Stage 2ème année — CDAD, Armée de l\'Air, Caserne Nansouty',
                'category' => 'stage2',
                'context'  => 'Participation au projet Aux Claviers Citoyens lors du stage de 8 semaines au CDAD de l\'armée de l\'air. Développement d\'une application web complète.',
                'techs'    => ['PHP', 'MySQL', 'HTML/CSS', 'JavaScript', 'GitLab'],
                'skills'   => [
                    'c1' => 'Recensement et identification des ressources numériques liées au projet.',
                    'c2' => 'Traitement des demandes concernant l\'application.',
                    'c3' => 'Participation à l\'évolution du site web exploitant les données de l\'organisation.',
                    'c4' => 'Analyse des objectifs et modalités d\'organisation du projet.',
                    'c5' => 'Tests d\'intégration, acceptation et déploiement du service.',
                ],
            ],
        ];
    }

    /**
     * Retourne les projets regroupés par catégorie.
     */
    public static function getProjectsByCategory(): array
    {
        $categories = [
            'formation' => 'Réalisations en cours de formation',
            'stage1'    => 'Réalisations en milieu professionnel — 1ère année',
            'stage2'    => 'Réalisations en milieu professionnel — 2ème année',
        ];

        $grouped = [];
        foreach ($categories as $key => $label) {
            $grouped[$key] = [
                'label'    => $label,
                'projects' => [],
            ];
        }

        foreach (self::getProjects() as $id => $project) {
            $cat = $project['category'];
            if (isset($grouped[$cat])) {
                $grouped[$cat]['projects'][$id] = $project;
            }
        }

        return $grouped;
    }

    /**
     * Retourne un projet par son ID.
     */
    public static function getProjectById(string $id): ?array
    {
        $projects = self::getProjects();
        return $projects[$id] ?? null;
    }
}
?>
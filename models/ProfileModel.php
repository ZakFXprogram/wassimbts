<?php

/**
 * ProfileModel
 * Fournit les données personnelles et de contact du portfolio.
 */
class ProfileModel
{
    public static function getProfile(): array
    {
        return [
            'name'       => 'Wassim DAHMY',
            'title'      => 'BTS SIO — option SLAM · Bordeaux',
            'tag'        => '// étudiant en informatique',
            'initials'   => 'WD',
            'cv_file'    => 'DAHMY_Wassim-4.pdf',
            'about'      => 'Passionné par les <strong>systèmes informatiques et la cybersécurité</strong>, je suis convaincu que ces domaines sont indispensables au bon fonctionnement d\'une organisation moderne. Je cherche à développer mes compétences en développement web et infrastructure IT.',
            'badges'     => [
                'Développement web',
                'PHP / MySQL',
                'PowerShell',
                'Linux',
            ],
            'contact'    => [
                [
                    'icon'  => '@',
                    'label' => 'email',
                    'value' => 'wass.dahmy@gmail.com',
                    'href'  => 'mailto:wass.dahmy@gmail.com',
                ],
                [
                    'icon'  => '#',
                    'label' => 'téléphone',
                    'value' => '06 29 78 39 15',
                    'href'  => 'tel:+33629783915',
                ],
                [
                    'icon'   => 'gh',
                    'label'  => 'github',
                    'value'  => 'github.com/wassim33k',
                    'href'   => 'https://github.com/wassim33k',
                    'target' => '_blank',
                ],
            ],
            'nav' => [
                ['href' => '#about',   'label' => 'À propos',     'prefix' => '01'],
                ['href' => '#cv',      'label' => 'CV',           'prefix' => '02'],
                ['href' => '#skills',  'label' => 'Compétences',  'prefix' => '03'],
                ['href' => '#contact', 'label' => 'Contact',      'prefix' => '04'],
            ],
        ];
    }
}
?>
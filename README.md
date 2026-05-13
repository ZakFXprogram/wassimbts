# Portfolio – Wassim DAHMY
## Architecture MVC (PHP)

---

### Structure du projet

```
portfolio/
│
├── index.php                  ← Front Controller (point d'entrée unique)
├── .htaccess                  ← Redirige toutes les requêtes vers index.php
│
├── controllers/
│   └── PageController.php     ← Orchestre modèles → vues
│
├── models/
│   ├── ProfileModel.php       ← Données personnelles, contact, nav
│   └── ProjectModel.php       ← Projets, compétences, tableau E4
│
├── views/
│   ├── index.php              ← Vue principale (assemble les partials)
│   └── partials/
│       ├── sidebar.php        ← Navigation latérale
│       ├── hero.php           ← Bandeau nom/titre
│       ├── competences.php    ← Tableau de compétences E4
│       └── modal.php          ← Modale projet (remplie par JS)
│
├── public/
│   ├── css/
│   │   └── style.css          ← Styles (thème noir/vert)
│   └── js/
│       └── app.js             ← Interactions (modale, nav active)
│
└── DAHMY_Wassim-4.pdf         ← CV à placer ici
```

---

### Principe MVC appliqué

| Couche | Rôle |
|--------|------|
| **Model** | Fournit les données brutes (projets, compétences, profil) |
| **Controller** | Récupère les données des modèles, les transmet aux vues |
| **View** | Affiche les données sans aucune logique métier |

---

### Ajouter un projet

Ouvrir `models/ProjectModel.php` et ajouter une entrée dans `getProjects()` :

```php
'mon-projet' => [
    'title'    => 'Mon nouveau projet',
    'period'   => '2025',
    'category' => 'formation',   // formation | stage1 | stage2
    'context'  => 'Description...',
    'techs'    => ['PHP', 'MySQL'],
    'skills'   => [
        'c2' => 'Compétence mobilisée sur ce projet...',
        'c4' => 'Autre compétence...',
    ],
],
```

---

### Lancement en local

```bash
cd portfolio/
php -S localhost:8000
```

Puis ouvrir : http://localhost:8000

---

### Deploiement Railway

Ce projet est maintenant compatible Railway via Docker.

Fichiers utilises:

- `Dockerfile` : force un runtime PHP fiable sur Railway
- `.dockerignore` : allege l'image Docker

Etapes:

1. Pousser le repo sur GitHub.
2. Sur Railway, cliquer sur **New Project** puis **Deploy from GitHub repo**.
3. Selectionner ce repository.
4. Railway detecte automatiquement le `Dockerfile` et construit l'image.
5. Une fois deploye, ouvrir l'URL publique Railway.

Notes:

- Le serveur ecoute automatiquement la variable `PORT` fournie par Railway.
- Aucune variable d'environnement n'est obligatoire pour ce projet en l'etat.

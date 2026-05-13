# Portfolio Wassim - Configuration Vercel PHP

## 📋 Structure du projet

Ce projet est maintenant **compatible avec Vercel** en utilisant PHP serverless.

```
portofoliobtswassim/
├── api/                    ← API PHP serverless
│   ├── profile.php        ← Endpoint /api/profile
│   ├── projects.php       ← Endpoint /api/projects
│   └── skills.php         ← Endpoint /api/skills
│
├── public/                 ← Contenu statique
│   ├── index.html         ← Page d'accueil
│   ├── css/
│   │   └── style.css      ← Styles (thème noir/vert)
│   └── js/
│       └── app.js         ← Frontend qui charge l'API
│
├── models/                 ← Modèles PHP
│   ├── ProfileModel.php   ← Données du profil
│   └── ProjectModel.php   ← Données des projets
│
├── vercel.json            ← Configuration Vercel
├── package.json           ← Scripts Node.js (requis par Vercel)
└── README-VERCEL.md       ← Ce fichier
```

## 🚀 Déploiement sur Vercel

### 1. Pré-requis
- Compte GitHub
- Compte Vercel (gratuit)

### 2. Déployer en 3 étapes

1. **Allez sur** https://vercel.com/dashboard
2. **Cliquez** "Add New Project"
3. **Sélectionnez** `wassim33k/portofoliobtswassim`
4. **Cliquez** "Deploy" 🎉

Vercel détectera automatiquement :
- La configuration `vercel.json`
- L'architecture PHP
- Les routes API

### 3. Résultat
Votre portfolio sera accessible à : `https://portofoliobtswassim.vercel.app`

---

## ⚙️ Configuration

### Modifier les données du profil

Editer `models/ProfileModel.php` :

```php
public function getProfile() {
    return [
        'name' => 'Votre Nom',
        'title' => 'Votre Titre',
        'email' => 'votre@email.com',
        'phone' => '+33 6 XX XX XX XX',
        'bio' => 'Votre biographie'
    ];
}
```

### Ajouter des projets

Editer `models/ProjectModel.php` dans `getProjects()` :

```php
'mon-projet' => [
    'title' => 'Mon Projet',
    'period' => '2025',
    'category' => 'formation',  // formation | stage1 | stage2
    'context' => 'Description du projet...',
    'techs' => ['PHP', 'MySQL', 'JavaScript'],
    'skills' => [
        'c1' => 'Compétence 1',
        'c2' => 'Compétence 2'
    ]
]
```

### Personnaliser les styles

Editer `public/css/style.css` pour modifier :
- Les couleurs (`:root`)
- Les layouts
- Les animations

---

## 🔄 Workflow de développement

### En local

```bash
# Démarrer le serveur PHP local
npm run dev

# Puis ouvrez : http://localhost:8000
```

### Après modifications

```bash
git add .
git commit -m "Votre message"
git push
```

Vercel détectera automatiquement le push et redéploiera ! 🚀

---

## 📡 Architecture API

Les endpoints disponibles :

| Endpoint | Méthode | Description |
|----------|---------|-------------|
| `/api/profile` | GET | Données du profil |
| `/api/projects` | GET | Liste des projets |
| `/api/skills` | GET | Compétences BTS |

### Exemple de réponse

```bash
curl https://portofoliobtswassim.vercel.app/api/profile
```

```json
{
  "name": "Wassim DAHMY",
  "title": "Développeur Full Stack BTS",
  "email": "wassim@example.com",
  "phone": "+33 6 XX XX XX XX",
  "bio": "Passionné par le développement web..."
}
```

---

## 🐛 Dépannage

### Les styles ne se chargent pas
→ Assurez-vous que `vercel.json` contient les bonnes routes

### L'API retourne une erreur 500
→ Vérifiez que les modèles PHP retournent des `array` valides

### Les données ne s'affichent pas
→ Ouvrez la console navigateur (F12) pour voir les erreurs

---

## 📚 Ressources

- [Documentation Vercel](https://vercel.com/docs)
- [Vercel PHP Runtime](https://github.com/vercel-community/php)
- [MDN Web Docs](https://developer.mozilla.org/)

---

**Bon déploiement ! 🎉**

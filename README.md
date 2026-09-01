# READ_IT_2026

## 📖 Présentation du Projet

**READ_IT_2026** est une application web de blog dynamique développée en **PHP** avec une architecture **MVC** (Modèle-Vue-Contrôleur). Elle permet de gérer et consulter des articles, des catégories, des tags, des auteurs et des commentaires. L'application inclut aussi un formulaire de contact.

### Fonctionnalités principales
- 📝 **Gestion des articles** : créer, lire, modifier et supprimer des articles
- 🏷️ **Système de catégories et tags** : organiser les contenus
- 👤 **Gestion des auteurs** : afficher les auteurs des articles
- 💬 **Système de commentaires** : permettre aux visiteurs de commenter
- ✉️ **Formulaire de contact** : formulaire pour contacter les administrateurs
- 🎨 **Frontend responsive** : utilise Bootstrap et des animations

---

## 🚀 Installation et Configuration

### Prérequis
- PHP 7.4+ ou supérieur
- MySQL/MariaDB
- Serveur Web (Apache, Nginx, etc.)
- Accès au dossier `c:\wamp64\www\` (WAMP stack)

### Étapes d'installation

1. **Cloner ou copier le projet** dans `c:\wamp64\www\scripts\BES\scripts serveur\READ_IT_2026`

2. **Configurer la base de données**
   - Ouvrir phpMyAdmin (http://localhost/phpmyadmin)
   - Créer une nouvelle base de données nommée `readit`
   - Importer le fichier SQL : `documents/db/readit.sql`
   - Ou importer les données pré-remplies : `documents/db/db_remplie.sql`

3. **Configurer les paramètres de connexion**
   - Dupliquer `app/config/params_exemple.php` en `app/config/params.php`
   - Éditer `app/config/params.php` et remplir les paramètres :
     ```php
     'host' => 'localhost',      // Hôte MySQL
     'user' => 'root',           // Utilisateur MySQL
     'password' => '',           // Mot de passe MySQL
     'dbname' => 'readit'        // Nom de la base de données
     ```

4. **Accéder à l'application**
   - Ouvrir un navigateur et accéder à : `http://localhost/scripts/BES/scripts%20serveur/READ_IT_2026/public/`

---

## 📁 Structure du Projet

```
READ_IT_2026/
├── app/                    # Cœur de l'application
│   ├── config/            # Fichiers de configuration
│   ├── controllers/       # Contrôleurs MVC
│   ├── models/            # Modèles (accès base de données)
│   ├── routers/           # Routeurs (logique des URLs)
│   └── views/             # Vues (templates HTML)
├── core/                   # Fichiers core/helpers
│   ├── connexion.php      # Connexion à la base de données
│   ├── helpers.php        # Fonctions utilitaires
│   └── init.php           # Initialisation
├── documents/              # Documentation et ressources
│   ├── db/                # Fichiers SQL et schéma
│   ├── astuces.txt        # Astuces de développement
│   └── consignes.txt      # Consignes du projet
├── public/                 # Dossier public (racine web)
│   ├── index.php          # Point d'entrée principal
│   ├── css/               # Feuilles de styles
│   ├── js/                # Scripts JavaScript
│   ├── fonts/             # Polices d'écriture
│   └── images/            # Images
└── README.md              # Ce fichier
```

---

## 🔧 Ressources Techniques

### Fichiers importants
- **`public/index.php`** : Point d'entrée de l'application
- **`core/connexion.php`** : Gestion de la connexion à la base de données
- **`app/config/params.php`** : Configuration de l'application
- **`documents/db/readit.mwb`** : Schéma MySQL Workbench
- **`documents/astuces.txt`** : Conseils et astuces pour le développement

### Technologies utilisées
- **Backend** : PHP (Procédural)
- **Frontend** : HTML5, CSS3, Bootstrap
- **JavaScript** : jQuery, AOS (Animate On Scroll), Owl Carousel
- **Base de données** : MySQL/MariaDB
- **Design** : Icônes Flaticon, Ionicons, Icomoon

---

## 📚 Guide pour Reprendre le Projet

### Si vous débutez avec ce projet :

1. **Lire la documentation**
   - Consulter `documents/consignes.txt` pour les objectifs du projet
   - Lire `documents/astuces.txt` pour les conseils de développement

2. **Comprendre l'architecture**
   - Étudier les fichiers dans `app/models/` pour voir comment accéder à la BD
   - Consulter les fichiers dans `app/controllers/` pour la logique métier
   - Examiner les vues dans `app/views/` pour l'affichage

3. **Explorer la base de données**
   - Ouvrir `documents/db/readit.mwb` avec MySQL Workbench pour voir le schéma
   - Consulter les fichiers SQL pour comprendre les tables

### Avant de modifier le code :

- ✅ Faire une **sauvegarde** de la base de données
- ✅ Utiliser un **système de versioning** (Git) pour tracker les changements
- ✅ Lire le code existant pour comprendre les conventions utilisées
- ✅ Tester localement avant de déployer

### Commandes utiles :

#### Sauvegarde de la base de données
```bash
mysqldump -u root -p readit > readit_backup.sql
```

#### Restaurer la base de données
```bash
mysql -u root -p readit < readit_backup.sql
```

---

## 🐛 Dépannage

| Problème | Solution |
|----------|----------|
| Page blanche ou erreur 500 | Vérifier `app/config/params.php` et les identifiants MySQL |
| Base de données non trouvée | Créer la BD et importer `documents/db/readit.sql` |
| Images/CSS ne chargent pas | Vérifier le chemin URL et les permissions d'accès aux fichiers |
| Erreurs de codage (accents) | S'assurer que les fichiers sont en UTF-8 |

---

## 📝 Notes Développement

- Le projet suit une architecture MVC simple (sans framework)
- Les templates utilisent PHP procédural (pas de moteur de template)
- Les styles CSS sont organisés et utilisent Bootstrap
- Les données sont actualisées via des formulaires HTML classiques

---

## 👥 Support et Contact

Pour toute question sur le code ou l'architecture du projet, consulter les fichiers dans le dossier `documents/`.

---

**Dernière mise à jour** : 2026
**Version** : 1.0

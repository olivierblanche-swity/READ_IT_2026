# READ_IT_2026

Application web de blog développée en PHP sans framework, avec une organisation MVC simple. Elle permet de consulter des articles, de les rechercher, de les filtrer par catégorie ou par tag, puis d'afficher leur auteur et leurs commentaires. Les visiteurs peuvent également publier un commentaire et accéder au formulaire de contact.

## Fonctionnalités disponibles

- Liste paginée des articles, dix articles par page
- Consultation du détail d'un article
- Recherche par mots présents dans le titre
- Filtrage par catégorie et par tag
- Affichage de l'auteur, des tags et des commentaires d'un article
- Ajout d'un commentaire via un formulaire `POST`
- Page de contact
- Interface responsive basée sur Bootstrap et les ressources JavaScript présentes dans `public/`

Le projet ne contient pas d'interface d'administration ni d'actions CRUD pour créer, modifier ou supprimer des articles.

## Installation locale avec WAMP

### Prérequis

- PHP avec l'extension PDO MySQL activée
- MySQL ou MariaDB
- Apache, par exemple via WAMP
- phpMyAdmin (facultatif, mais pratique pour importer la base)

### Étapes

1. Copier le projet dans :

   `C:\wamp64\www\scripts\BES\scripts serveur\READ_IT_2026`

2. Importer `documents/db/db_remplie.sql` dans MySQL. Ce dump crée et remplit la base `readit_2026`, qui correspond à la configuration actuelle.

   `documents/db/comments_data.sql` peut ensuite être importé pour ajouter des commentaires de démonstration.

3. Vérifier `app/config/params.php` :

   ```php
   define('DBHOST', 'localhost');
   define('DBNAME', 'readit_2026');
   define('DBUSER', 'root');
   define('DBPWD', '');
   ```

   Adapter l'utilisateur, le mot de passe et l'hôte à l'installation locale. Le fichier `app/config/params_exemple.php` sert uniquement de modèle.

4. Vérifier que le module Apache `mod_rewrite` est disponible si les URLs réécrites générées par les vues sont utilisées.

5. Ouvrir :

   `http://localhost/scripts/BES/scripts%20serveur/READ_IT_2026/www/public/`

## Routes principales

Les routeurs sont centralisés dans `app/routers/` et sont chargés par `public/index.php`.

| Usage | URL de référence |
| --- | --- |
| Liste des articles | `/public/` |
| Page suivante | `/public/?page=2` |
| Détail d'un article | `/public/?posts=show&id=1` |
| Recherche | `/public/?posts=search&query=design` |
| Articles d'une catégorie | `/public/?categories=show&id=1` |
| Articles d'un tag | `/public/?tags=show&id=1` |
| Formulaire de contact | `/public/?contact=show` |
| Formulaire de connexion | `/public/users/login-form` |
| Ajout d'un commentaire | `/public/?comments=add` en `POST` |

Les vues génèrent aussi des URLs lisibles de type `/posts/{id}/{slug}.html`, `/categories/{id}/{slug}.html` et `/tags/{id}/{slug}.html` lorsque la réécriture d'URL est configurée sur le serveur.

## Organisation du projet

```text
READ_IT_2026/
├── app/
│   ├── config/             Configuration de la base de données
│   ├── controllers/        Contrôleurs des articles et commentaires
│   ├── models/             Requêtes PDO vers la base
│   ├── routers/            Routage selon les paramètres GET
│   └── views/              Pages et templates PHP
├── core/
│   ├── connexion.php       Création de la connexion PDO
│   ├── constantes.php      Constantes d'URL publique
│   ├── helpers.php         Fonctions utilitaires
│   └── init.php             Initialisation de l'application
├── documents/
│   ├── db/                 Schémas, données et commentaires SQL
│   ├── astuces.txt         Notes de développement
│   └── consignes.txt       Consignes fonctionnelles d'origine
├── public/                 Racine web et ressources statiques
│   └── index.php            Point d'entrée
└── README.md
```

## Technologies

- PHP et PDO MySQL
- MySQL/MariaDB
- HTML, CSS et Bootstrap
- JavaScript, jQuery, AOS et Owl Carousel
- Icônes Flaticon, Ionicons, Icomoon et Open Iconic

## Développement

Avant toute modification : sauvegarder la base, vérifier les conventions existantes et tester l'application depuis le dossier `public/`. Les modèles utilisent des fonctions PHP regroupées par namespace et les vues sont incluses depuis les contrôleurs.

Sauvegarde de la base :

```bash
mysqldump -u root -p readit_2026 > readit_2026_backup.sql
```

Restauration :

```bash
mysql -u root -p readit_2026 < readit_2026_backup.sql
```

## Dépannage

| Symptôme | Vérifications |
| --- | --- |
| Erreur de connexion | Contrôler `DBHOST`, `DBNAME`, `DBUSER`, `DBPWD` et l'extension PDO MySQL |
| Base introuvable | Importer `documents/db/db_remplie.sql` et utiliser `readit_2026` |
| CSS ou images absents | Accéder à l'application via `public/` et vérifier l'URL de base Apache |
| URLs lisibles en erreur 404 | Activer `mod_rewrite` et la réécriture d'URL du serveur |
| Page blanche | Activer temporairement l'affichage des erreurs PHP et consulter les paramètres de connexion |

Pour plus de contexte fonctionnel, consulter `documents/consignes.txt` et `documents/astuces.txt`.

**Dernière mise à jour :** 2026-09-08

# intro-sf

Application de gestion de tâches (todo list) réalisée avec **Symfony 7.4** dans le cadre d'une introduction au framework.

## Stack

- PHP ≥ 8.2
- Symfony 7.4 (Twig, Doctrine ORM, AssetMapper, Stimulus, Turbo)
- MySQL 8 (base `todos`)
- [Pico CSS](https://picocss.com/) pour le style (chargé via CDN)

## Fonctionnalités

| Route | Nom | Description |
|---|---|---|
| `/task/` | `app_task` | Liste de toutes les tâches |
| `/task/{id}` | `app_task_show` | Détail d'une tâche |
| `/contact` | `app_contact` | Page de contact statique |
| `/generator` | `app_generator` | Renvoie un prénom aléatoire en JSON |

## Modèle de données

- **Task** : `title`, `details` (optionnel), `is_done`, `category` (ManyToOne vers Category)
- **Category** : `name`, `tasks` (OneToMany vers Task)
- **User** : `firstname`, `lastname`, `email`, `is_premium`

## Installation

### Prérequis

- PHP 8.2+ et [Composer](https://getcomposer.org/)
- [Symfony CLI](https://symfony.com/download) (recommandé)
- Un serveur MySQL (WAMP, XAMPP, Laragon, MAMP…)

### Étapes

```bash
# 1. Cloner le dépôt
git clone https://github.com/Athios-dev/intro-sf.git
cd intro-sf

# 2. Installer les dépendances
composer install

# 3. Configurer la base de données
#    Par défaut : mysql://root:@127.0.0.1:3306/todos
#    Pour la modifier, créer un fichier .env.local (non versionné) :
#    DATABASE_URL="mysql://user:password@127.0.0.1:3306/todos?serverVersion=8.0.31&charset=utf8mb4"

# 4. Créer la base et appliquer les migrations
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

# 5. Lancer le serveur
symfony server:start
```

L'application est ensuite accessible sur http://127.0.0.1:8000/task/.

> Sans Symfony CLI : `php -S 127.0.0.1:8000 -t public`

## Commandes utiles

```bash
php bin/console debug:router                # Lister les routes
php bin/console make:entity                 # Créer / modifier une entité
php bin/console make:migration              # Générer une migration
php bin/console doctrine:migrations:migrate # Appliquer les migrations
php bin/console cache:clear                 # Vider le cache
```

## Structure

```
src/
├── Controller/   # TaskController, StaticPageController, GeneratorController
├── Entity/       # Task, Category, User
└── Repository/   # Repositories Doctrine
templates/
├── base.html.twig            # Layout (navbar + footer)
├── _navbar.html.twig
├── _footer.html.twig
├── task/                     # index, show
├── static_page/              # contact
└── generator/
migrations/                   # Migrations Doctrine
```

## Auteur

Thibaud d'Arros

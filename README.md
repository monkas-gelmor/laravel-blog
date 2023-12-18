# Blog Laravel/VueJS

## Installation

- ``git clone git@github.com:monkas-gelmor/laravel-blog.git``
- ``composer install``
- Configurer dans le .env la connexion à une bdd locale MySQL puis
``php artisan migrate``

## Seed de la base

- ``php artisan db:seed --class=PostSeeder``

- ``php artisan db:seed --class=UserSeeder`` (optionnel, utilisateur admin)



## Lancer le projet

- ``php artisan serve``
- Dans une autre console ``npm run dev``
- Serveur local tournant http://localhost:8000


- Accès à l'administration http://localhost:8000/dashboard
- Les identifiants sont 'admin@admin.fr' le mdp 'admin' si le seed a été généré
- L'inscription peut également se faire à cette adresse http://localhost:8000/register

## Ressources utilisées
https://laraveldaily.com/post/laravel-8-vue-3-crud-composition-api

- Utilisation de Laravel Breeze pour le panel administrateur et la gestion de l'authentification

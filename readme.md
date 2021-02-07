PROJET TEST LARAVEL BARRE DE RECHERCHE PRODUITS 


AVANCEMENT DU PROJET


Front-end
 
      On va afficher les produits d’une manière aléatoire.




Etape : J’ai crée mon projet Laravel

         composer create-project --prefer-dist laravel/laravel:^6.0 TestEyefiz

Etape : J’ai crée un dossier products dans Ressources/Views

        A l’intérieur de ce dossier je crée une vue(page) index.blade.php pour afficher l’accueil de notre  
        Boutique. Pour se faire j’utilise Bootstrap pour faciliter le design de la page. Il faudra noter que je 
        ne me suis concentré beaucoup sur le design du frond-end.
        
Etape : Je crée un Controller pour product envie d’afficher la vue index.blade.php

         php artisan make:controller ProductController
         
         A l’intérieur de ce controller je crée une fonction index pour renvoyer la vue en question
         
 Etape  : Création de route GET pour la page index.blade.php qui sera l'accès à la boutique
 
            Route::get('/boutique','ProductController@index');
            
 Etape: Création de model Product pour stocker nos produits, je n'oublie pas le drapeau -m pour ajouter les migrations
 
           php artisan make:model Product -m
           
           Les migrations sont accessibles dans le dossier database/migrations
           Une fois le model crée, j'ajoute des champs/olonnes dans notre table des produits

           
           
  Etape: Création de base de données pour stocker nos données
           
      Dans le fichier .env:  fichier qui contient les variables d’environnement de l’application.
      
      J'affecte le nom de ma base de données créée avec phpmyadmin à ma variable DB_DATABASE
      
      Nom de ma base de données: 
      
                       eyefiztest
      
      Puis j’applique les migrations avec:
      
                     php artisan migrate
                     
                     
                     
Etape : création des seeders pour peupler notre base de données

            php artisan make :seeder ProductsTableSeeder
            
          
Etape : Peupler notre base de données  : 

          Utilisation de faker
         
         Puis:
              php artisan db :seed

         
         

 Etape : Afficher nos produits sur la page
  
                Dans index.blade.php
                On boucle sur la table

Etape : création des catégories

          On va fait un model
          
          php artisan make :model Category –m (le drapeau –m pour les migrations)
          
          Retrouver le model dans database/migrations

Etape : Création d’une table pivot pour stocker les clés étrangères des produits et des catégories

            php artisan make :migration create_category_product_table - -create=category_product         

Etape : Création d’un seeder  pour les fausses catégories, car jusqu’à mena on a que des fausses données pour les produits

           php artisan make :seeder CategoriesTableSeeder(à retrouver dans database/seeds)


Etape : Recherche des produits

     Implémentation des requete SQL Regarder dans le fichier ProductController
     
     Et la vue search.blade.php

Etape : Authentification

    Composer require laravel/ui => cette fonctionne pas  depuis laravel 6
    
    Ce qui fonctionne : composer require laravel/ui="1.*" –dev
    
    Puis  faire php artisan ui vu –auth
    
    ET npm install pour installer les librairie front-end


Etape : Panier

     Installation du librairie form GitHub
     https://github.com/hardevine/LaravelShoppingcart

    Pourquoi ? Ca nous facilite la tache d’écrire toute la logique

Etape : administration avec Voyager

    Lien documentation : https://voyager-docs.devdojo.com/getting-started/installation
    
    Intaller voyager : composer require tcg/voyager
    
    Ensuite il faut publier les assetes et migrer les models dont  «Category »
    
    Préciser notre APP_URL= http://localhost
    
    Puis php artisan voyager:install
    
    Accès dmin : localhost :8000/admin
    
    Créer un utilisateur : php artisan voyager:exemple mail:admin@admin.com, pass: admin ( à ne pas faire si on va le déployer en production)

 Dans Voyager dashboard
 
    BREAD : CRUD avec Voyager, on ajoute bread pour chaque entité, une icône, ouis on peut passer sur l’étape de création de relationship.

    Editer side bar(des tools..) : aller dans Menu builder, builder, faire drag and drop pour placer un élément là où on veut.

    Je cache les id dans le BREAD de chaque entité

Etapes : Galerie d’images

    Ajoute d’un colonne(migrations) dans notre table produit :
    php artisan make :migration add_images_to_products_table –table=products
    
    Puis la logique de création de la colonne et de la drop au cas où on fera de rollback
    Enfin Php artisan migrate
    
    
----------------END-----------------------------












<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

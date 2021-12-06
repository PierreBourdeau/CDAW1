<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# :desktop_computer: - Understanding the application !

## Table of content
[0. Prerequesite](#prerequisite)  
[1. Databases](#databases)  
[2. Start app. with artisan serve](#start)  
[3. Application default datas](#default-datas)  
[4. Application presentation](#presentation)




## :rocket: - Starting the application

<a name="prerequisite"></a>

### 0. Prerequisite
Firt of all, you need to install Laravel environment.
From the pulled repo. go to the `public/Projet/catalogue` folder :   
    
    cd public/Projet/catalogue

Then run :  

    composer install

<a name="databases"></a>  

### 1. Databases
The application handle database migrations and seeding.

#### First of all verify database configuration

In your environment, create the database that will be used by the pplication (MySQL relational database).

Look for the `.env` file in the root folder.

Search for :   

    DB_CONNECTION=mysql
    DB_HOST= _Your database host (localhost for local hosting)_
    DB_PORT= _Your database port (default: 3306)_
    DB_DATABASE= _Your newly created database name (ex: cdaw_project)_ 
    DB_USERNAME= _Your username_
    DB_PASSWORD= _Your password_

**:pushpin: Comment :** _The application is originally run on a Docker environment that can be replicated. For performance issues with Docker running on Windows computers, the project can be pulled on a local environment._

Run the following commands in terminal (from the root folder) :  
    
    php public/Projet/catalogue/artisan migrate

> This will create the tables in the configured database

Then run (from the root folder) :  
    
    php public/Projet/catalogue/artisan db:seed

> This will seed the database with the initial default datas and download medias pictures on the application server. (Fetching from [ImDB API](https://imdb-api.com/api))

<a name="start"></a>  

### 2. Start app. with artisan serve
In order to start the application, we need to use php artisan. Lauch the terminal command  (from the root folder) :  
    
    php public/Projet/catalogue/artisan serve

Now you can access the application on : [localhost:8000](http://localhost:8000) by default.

<a name="default-datas"></a>  

### 3. Application default datas
The default database seeding add the following datas  :floppy_disk: :

| Users        | email           | password  | role |
| ------------- |:-------------:| :-----:| ------: |
| James Bond    | jbond@email.com | password | admin |
| Jhon Doe      | jdoe@email.com  |   password | user |

| Language        | default           | code  | rtl |
| ------------- |:-------------:| :-----:| ------: |
| English    | true | en | false |
| French      | false  |   fr | false |

| Default settings | value  |
| ------------- |:-------------:|
| Language id    | lang. id |
| Website title      | UV CDAW  |

> :file_folder:  The application also contains plenty of pre-generated medias (Movies/Series) and their pictures stored on the application server. 

<a name="presentation"></a>  

### 4. Application presentation 

#### General presentation

The application is a media referencer that contain movies and series developped using [Laravel Framework](https://laravel.com/). The application handle functionnalities such as : 
* User authentification / roles / status with personal datas and user space.
* User personal information and secret informations editing
* Playlist of medias
* Media autocomplete searchbar
* User possibility to like a media to save it
* User dated seen list
* Tag identification and sorting on media
* Media type sorting and referencing
* Admin pannel to handle creation, deletion, edition of media
* Comments system with administration for admin and validation
* Responsive UI, mobile friendly, slider presentation
* Database migrations and seeding
* Translation (en/fr)
* ...

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

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**
- **[Romega Software](https://romegasoftware.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

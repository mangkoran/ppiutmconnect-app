# ApplicationDevelopment

This Repository is dedicated to our project in Application Development subject

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker).

Clone the repository

```bash
    git clone git@github.com:Barongobber/ApplicationDevelopment.git
```

Switch to the repo folder

```bash
    cd ApplicationDevelopment
```

Install all the dependencies using composer

```bash
    composer install
```

```Google Api
    composer require google/apiclient
```

```Flysystem Adapter for Google Drive
    composer require nao-pon/flysystem-google-drive:~1.1
```

```PHP Mailer
    composer require phpmailer/phpmailer
```

Copy the example env file and make the required configuration changes in the .env file

```bash
    cp .env.example .env
```

Generate a new application key

```bash
    php artisan key:generate
```

Run the database migrations (**Set the database connection in .env before migrating**)

```bash
    php artisan migrate
```

Seed the database with seeder (See first if the file in database/seeders/DatabaseSeeder.php `run()` function is commented or not, if So uncomment it first)
```bash
    php artisan db:seed
```

Start the local development server

```bash
    php artisan serve
```

You can now access the server at <http://localhost:8000>

### Github branch renamed - Updating a local clone after a branch name changes

After you rename a branch in a repository on GitHub, any collaborator with a local clone of the repository will need to update the clone.

From the local clone of the repository on a computer, run the following commands to update the name of the default branch.

```git

    git branch -m OLD-BRANCH-NAME NEW-BRANCH-NAME
    git fetch origin
    git branch -u origin/NEW-BRANCH-NAME NEW-BRANCH-NAME
    git remote set-head origin -a

```

Optionally, run the following command to remove tracking references to the old branch name.

```bash

 git remote prune origin
 
```

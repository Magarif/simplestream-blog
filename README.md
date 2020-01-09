# Simplestream code test

This repository represent simple blog application using Laravel according to Code test documentation.

### Local setup instructions

#### Option 1 - No Vagrant, Docker or Valet required (simple local installation)

Prerequisites:
- Php >= 7.2.0
- Mysql Server >= 5.7.0
- Composer

Step 1. - Clone this repo with command `git clone git@github.com:Magarif/simplestream-blog.git` and do composer dance in CLI with `composer install`

Step 2. - Create `simplestream` database using CLI or any DB Management tool (SequelPro, MySQL Workbench etc.)

Step 3. - Be sure to add correct params and credentials to Mysql section in `.env` file. See `.env.example` 

Step 4. - Run `php artisan migrate` command in terminal, console or any othe CLI you use. This command will run DB migrations and create DB structure.

Step 5. - Run `php artisan serve` command in CLI. Simple Php server will run on http://127.0.0.1:8000

Step 6. - Test application

#### Option 2 - Valet required (see [here](https://laravel.com/docs/6.x/valet) for install)

Move app in Valet folder.
Repeat steps 1 - 4 and fire app in browser to test it. If you choose defaults in Valet installation it will be on address http://simplestream-blog.test


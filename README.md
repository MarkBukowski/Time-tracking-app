User Task list
=================================

This is a simple time tracking app, used to enter tasks with time taken to complete them. Built on Win10 machine, tested on Chrome. Technologies used:
```
Laravel 8
Bootstrap 4
MYSQL database
PHP 7.3
```

## Features

* User registration and login
* Tasks CRUD
* Paginated task display
* Export to PDF feature (newest tasks at the top)
* PDF report contains one task per line and total time at the end of the table
* DB relations (tasks visible to dedicated users)
* Task forms with validations
* Responsive design
* All information comes from DB


## Setup

**Clone Repository**

Navigate to the location you want to clone the repository via your terminal window and type in:

```
git clone https://github.com/MarkBukowski/Time-tracking-app
```

Jump up to the cloned project folder and install the Laravel framework alongside with necessary dependencies.

Make sure you have [Composer installed](https://getcomposer.org/download/)
and then run:

```
composer install
```
After the setup finishes, install npm:

```
npm install
```

If you receive any vulnerabilities when installing npm modules, after the command finishes, run:

```
npm audit fix
```

**Setup the Database**

Open `.env` and make sure the `DB_DATABASE` name is
correct for your setup.

If there is no such file, copy the `.env.example` file and name it `.env`.

```
copy .env.example .env
```

Then, create the database on localhost server (I used PhpStorm IDE to create the initial DB in XAMPP) by naming it the same as `DB_DATABASE`

**Generate key**

Update the `.env` file by generating a new key:

```
php artisan key:generate
```

**Run migrations**

Migrate the tadabase tables to update the newly created DB:

```
php artisan migrate
```

**Start the web server**

You can use Nginx or Apache, but the built-in web server works great:

```
php -S localhost:8000 -t public
```

## Authors
[MarkBukowski](https://github.com/MarkBukowski)

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Build Setup

``` bash

# cd to Academy_management project directory
composer install
composer dumpautoload -o

# serch and find .env file and configure your databse username and password
# Academy_management\.env

# generate APP_KEY
php artisan key:generate

# Migrate database 
php artisan migrate

# run project
php artisan serve
```
## Adding data to Database
``` bash
# run Tinker
php artisan tinker
# To add Users 2 users
factory(App\User::class, 2)->create();
# To add 3 Trainees linked to User1
factory(App\Trainee::class, 3)->create(['user_id' => '1']);
# To add 3 Trainees linked to User2
factory(App\Trainee::class, 3)->create(['user_id' => '2']);
# To add times to Trainee1
 factory(App\Time::class, 5)->create(['trainee_id' => '1']);
```
Just change trainee_id to add to diffrent trainees, also to change times->intership_day,
go to Academy_management\database\factories\TimesFactory.php and change intership_day value.

# Routes

## Login route (email, password)
POST api/login 
## Get all trainees
GET api/trainee 
## Store trainee(name, last_name, email, tel, position)
POST api/trainee
## Get a specific trainee
GET api/trainee/{trainee_id}
## Update a specific trainee (name, last_name, email, tel, position)
PUT api/trainee/{trainee_id}
## Delete a specific trainee
DELETE api/trainee/{trainee_id}
## Get Trainee all times
GET api/trainee/{trainee_id}/time
## Get Trainee times by month (month, year)
GET api/trainee/{trainee_id}/timebymonth
## Store Trainee time (contract_start, contract_end, intership_day, type_of_time, time_to, time_from)
POST api/trainee/{trainee_id}/time
## Update Trainee time (intership_day, type_of_time, time_to, time_from)
PUT api/trainee/{trainee_id}/time/{time_id}
## Update Trainee contract dates (contract_start, contract_end)
PUT api/trainee/{trainee_id}/contracts
## Delete Trainee specific time
DELETE api/time/{time_id}
 

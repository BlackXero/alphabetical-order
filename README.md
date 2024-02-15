### Overview

This is a test project to display an unordered list in alphabetical order. It will fetch the data from a given json end point or file and will do the sorting.


#### Project Setup

- Clone the repo using this link `git clone https://github.com/BlackXero/alphabetical-order.git`
- then `cd alphabetical-order`
- Now you need to install the composer dependencies by running `composer install`
- Now we need to update `.env` to first we need to copy the `.env.example` to `.env` and to do that run this cmd `cp .env.example .env`.
- Once our `.env` file is ready we need to generate the project key so `php artisan key:generate`
- Then updates the `.env` variables
- Once `.env` file is ready we need to run the migrations by running `php artisan migrate`
- To run the project `php artisan serve` and open the link in any browser `http://localhost:8000/`


#### Scheduler
- To run the scheduler we need to run the cmd `php artisan schedule:work`

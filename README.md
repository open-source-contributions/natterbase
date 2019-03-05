# natterbase
Create a RESTFUL API for performing CRUD operations on a Country resource using laravel PHP framework. 

## Getting Started
- Copy the `.env.example` file to `.env` and edit the details for your environment
- Run `composer install` to install all php dependencies
- Create your database and set the proper environment variables in your `.env` file.
- Run `php artisan migrate --seed`  to get the database up and running
- Run `php artisan jwt:secret` to set jwt secret

## Routes

POST - `/signup`
payload => {
  'username' => ,
			'email' => ,
			'first_name' => ,
			'last_name' => ,
			'password' => ,
}

POST - `/login`
payload => {
  'email' => ,
	'password' => ,
}

POST - `/countries`
payload => {
  'name' => ,
		'continent' => ,
}

PUT - `/countries/:id`
payload => {
  'name' => ,
		'continent' => ,
}

DELETE - `/countries/:id`
payload => none

GET - `/countries`
payload => none

POST - `/activities`
payload => none

## Unit Tests
run `php vendor/phpunit/phpunit/phpunit` in Command line/terminal

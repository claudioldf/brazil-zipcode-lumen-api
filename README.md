## Requirements
- Used 7.3, but it runs ok with php 7.1(>=)
- php composer package manager
- mysql-client php mod enabled
- mysql-server (if you'd like to run the mysql server database locally)


## Setup
##### 1. Firstly, copy the file .env.example on the root directory of the project.

```bash
cd <your-root-project-diretory>
cp .env.example .env
```

##### 2. Now, open the .env file and edit these lines:

	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=mydatabase
	DB_USERNAME=myusername
	DB_PASSWORD=mypassword

##### 3. Create an strong security key for you app, to protected the traffic of your application. In order to do it, run on terminal:
```bash
php -r "echo bin2hex(random_bytes(32));"
```

###### It will print something like this code:
```
c970d1dadffa1011afb4eaecf0b851b83f073b49ee644a5a4c29c09448e90717
```

##### 4. Copy this security key code, edit the .env file again, and paste this code on ```APP_KEY=``` attribute
> ...
**APP_KEY=c970d1dadffa1011afb4eaecf0b851b83f073b49ee644a5a4c29c09448e90717**
...

##### 5. Install PHP composer package manager, if you don't have it installed in your local yet.
```
See: https://getcomposer.org/download/
```

##### 6. Install project dependencies through composer:
```bash
cd <your-root-project-diretory>
composer install
```

##### 5. With .env file ok, you can now run migrations, to create all tables that this project require. So, type in your terminal/console:
```bash
php artisan migrate
```

##### 6. On step 5, you will create the tables on your database. However in order to have sample data, you need to restore the .sql inside dir <your-root-project-diretory>/data/sample_data.sql. Don't forget to change your mysql username, password and database name to match with .env values
```bash
cd <your-root-project-diretory>
mysql -u MySQL_USER -pMySQL_PASSWORD my_database_name < ./data/sample_data.sql
```

## Run the application
To run the application locally, you should open the terminal/console and type:

```bash
php artisan migrate
php -S localhost:8000 -t public
```

The server will be stared and running on ```localhost:8000```

## Routes and Request Examples:

#### List all states:
###### GET http://localhost:8000/api/states

#### List all cities for a specific state
###### GET http://localhost:8000/api/states/sc/cities

#### Search an address:
###### GET http://localhost:8000/api/search?address=Rua+Guia+Lopes&state_abbr=sc
**Query string arguments:**
You can filter the address by state abbreviation and city name through GET parameters.
- address: Filter the address by the street name (search by like operator)
- zipcode: Filter the address by the zipcode number (search by equal operator)
- state_abbr: Filter the addresse scoped by the state (search by equal operator)
- city_name: Filter the addresse scoped by the city name (search by like operator)
> Example:
>
> curl 'http://localhost:8000/api/search?address=Rua+Guia+Lopes&state_abbr=sc&city_name=Joinville'


## Tools used for development
- Insomnia or Postman (to test Restful API)
- PHP 7.3.6 + Lumen framework v5.8.10
- Linux / MacOS
- Visual Code IDE
- MySQL Server (for database)
- MySQL Workbench (for mysql IDE)
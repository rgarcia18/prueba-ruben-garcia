# sports shop installation

To install the store, please follow the following sequence of steps.

## Download

Download the project from the following repository

```bash
$ git clone https://github.com/rgarcia18/prueba-ruben-garcia.git
```

## .env

Go into the project directory and make a copy of the .env.example file with the name .env

```bash
$ cd prueba-ruben-garcia
$ cp .env.example .env
```

## Dependencies

To install the project dependencies open the terminal of your choice and enter the following command

```python
$ composer update
```

Key generate

```python
$ php artisan key:generate
```

## Settings of database
At the root of the project, find the .env file, locate the following lines of code and configure the connection with the database.


```python
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_sports_store
DB_USERNAME=root
DB_PASSWORD=secrect
```

once the connection with the database is configured, enter the terminal of your choice again and run the migrations and seeder of the project.

Migration

```python
$ php artisan migrate
```

Seeders
```python
$ php artisan db:seed
```

Configure the connection data to connect with the payment gateways, this configuration must be done in the .env file.

## Payment gateway configuration

```python
PLACETOPAY_URL=
PLACETOPAY_LOGIN=
PLACETOPAY_TRANKEY=
```

## Test

run tests

```python
$ php artisan test
```

# CURLEC.COM
A new Eletronic Bank to Bank Direct Debit System delivered by Curlec Sdn Bhd

## .env file
Configuration via the .env file currently allows the following variables to be set:

- CURLEC\_URL='http://api.endpoint/url/'

## Available functions
```php
CBM::doTransaction($method, $parameter)
```
A successful request returns the JSON response of the requested

**FOR LARAVEL SETUP CONFIGURATION:-**
- Do composer require mohdnazrul/laravel-curlec
```php
   composer require mohdnazrul/laravel-curlec
```
- Add this syntax inside config/app.php
```php
   ....
   'providers'=> [
     .
     MohdNazrul\CBMLaravel\CURLECServiceProvider::class,
     .
   ],
   'aliases' => [
      .
      'CBMApi' => MohdNazrul\CURLECLaravel\CURLECApiFacade::class,
      '
    ],
``` 
- Do publish as below
```php
php artisan vendor:publish --tag=curlec 
```
- You can edit the default configuration CURLEC inside config/curlec.php based your account as below
```php
return [
    'serviceUrl'    =>  env('CBM_URL','http://localhost')
];
``` 







     

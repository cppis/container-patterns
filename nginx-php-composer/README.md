# nginx-php-composer  
This example shows how to create a `nginx+php-fpm` container and update packages using `composer`.  

<figure>
<div style="text-align:center">
  <a href="https://drive.google.com/uc?export=view&id=1WZGyVct251iXW2Z7tAHAabrAOqy9E-iS">
  <img src="https://drive.google.com/uc?export=view&id=1WZGyVct251iXW2Z7tAHAabrAOqy9E-iS" style="width: 480px; max-width: 100%; height: auto" title="nginx-php" />
</div>
</figure>

<br/>

## Dependencies  
* [wyveo/nginx-php-fpm](https://github.com/wyveo/nginx-php-fpm)  
  debian based container image running nginx and php-fpm & composer.  

<br/><br/><br/>
 
## Directory structure  
  ```
  + {Project Root}/  
    + nginx-php/  
      + app/  
        + vendor/ (generated)  
        + index.php
        + composer.json  
        + composer.lock (generated)  
  ```

* `app/index.php` file:  
  ```php
  <?php

  declare(strict_types=1);

  // include composer generated autoload file
  require __DIR__ . '/vendor/autoload.php';

  use Brick\Http\Exception\HttpBadRequestException;
  use Brick\Http\Request;
  use Brick\Http\Url;

  $request = Request::getCurrent();

  $body = $request->getBody();
  echo "body:" . $body . PHP_EOL;
  ``` 

  > **require** is identical to [**include**](https://www.php.net/manual/en/function.include.php) except upon failure it will also produce a  
fatal **E_COMPILE_ERROR** level error.

<br/><br/><br/>

## Run  
* Move to working path:  
```shell
cd {Project Root}/nginx-php-composer/app
```

> Use `%cd%` instead of `${PWD}` on Windows  

<br/>

* To add package, run this command:  
```shell
$ docker run --rm -it -v ${PWD}:/app composer require brick/http  
```

<br/>

* Or to update package, run this command:  
```shell
$ docker run --rm -it -v ${PWD}:/app composer update  
```

<br/>

* To run app, run this command:  
```shell
$ docker run -d -p 8000:80 -v ${PWD}:/usr/share/nginx/html wyveo/nginx-php-fpm:php80
```

<br/>

* To test app, run this command:  
```shell
$ curl -d '{"key1":"value1", "key2":"value2"}' -H "Content-Type: application/json" -X POST http://localhost:8000
  body:{"key1":"value1", "key2":"value2"}
```

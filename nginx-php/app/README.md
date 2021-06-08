# nginx-php  
this example shows how to create `nginx+php-fpm` container.  

<br/>

## Dependencies  
----
* [wyveo/nginx-php-fpm](https://github.com/wyveo/nginx-php-fpm)  
  debian based container image running nginx and php-fpm 8.0.x / 7.4.x / 7.3.x / 7.2.x / 7.1.x / 7.0.x & Composer.  

<br/><br/><br/>

## Run  
----
```shell
$ cd {Project Root}/nginx-php
$ docker run -d -p 8000:80 -v {app path}:/usr/share/nginx/html wyveo/nginx-php-fpm:php80
```

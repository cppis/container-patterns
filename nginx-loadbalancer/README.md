# nginx-loadbalancer  

this example shows how to create nginx loadbalancer container, which  
route traffic to two `nginx+php-fpm` container.  

<br/>

## Dependencies  
----
* [nginx](https://hub.docker.com/_/nginx)  
* [wyveo/nginx-php-fpm](https://github.com/wyveo/nginx-php-fpm)  
  debian based container image running nginx and php-fpm 8.0.x / 7.4.x / 7.3.x / 7.2.x / 7.1.x / 7.0.x & Composer.  

<br/><br/><br/>

## Run  
----
```shell
$ cd {Project Root}/nginx-loadbalancer
$ docker-compose up -d [--build --force-recreate]
```

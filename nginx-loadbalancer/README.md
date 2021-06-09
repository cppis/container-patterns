# nginx-loadbalancer  

this example shows how to create nginx loadbalancer container, which  
route traffic to two `nginx+php-fpm` container.  

<figure>
<div style="text-align:center">
  <img src="https://drive.google.com/uc?export=view&id=11Oi7it8xYRrmKowaJ6Muvq3lCgGZ92vB" style="width: 600px; max-width: 100%; height: auto" title="go scheduler async syscall 2" />
</div>
</figure>

<br/>

## Dependencies  
----
* [nginx](https://hub.docker.com/_/nginx)  
  nginx for load balancer  
* [wyveo/nginx-php-fpm](https://github.com/wyveo/nginx-php-fpm)  
  debian based container image running nginx and php-fpm & Composer.  

<br/><br/><br/>

## Run  
----
```shell
$ cd {Project Root}/nginx-loadbalancer
$ docker-compose up -d [--build --force-recreate]
```

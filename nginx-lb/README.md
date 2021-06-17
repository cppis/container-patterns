# nginx-loadbalancer  

this example shows how to create nginx loadbalancer container, which  
route traffic to two `nginx+php-fpm` container.  

<figure>
<div style="text-align:center">
  <a href="https://drive.google.com/uc?export=view&id=11Oi7it8xYRrmKowaJ6Muvq3lCgGZ92vB">
  <img src="https://drive.google.com/uc?export=view&id=11Oi7it8xYRrmKowaJ6Muvq3lCgGZ92vB" style="width: 600px; max-width: 100%; height: auto" title="nginx-loadbalancer" />
</div>
</figure>

<br/>

## Dependencies  
* [nginx](https://hub.docker.com/_/nginx)  
  nginx for load balancer  
* [wyveo/nginx-php-fpm](https://github.com/wyveo/nginx-php-fpm)  
  debian based container image running nginx and php-fpm & Composer.  

<br/><br/><br/>

## Directory structure  
  ```
  + {Project Root}/
    + nginx-lb/  
      + app.1/  
        + index.php
      + app.2/  
        + index.php
      + nginx/  
        + Dockerfile
        + nginx.conf
      + docker-compose.yaml  
  ```

<br/><br/><br/>

## Run  
```shell
$ cd {Project Root}/nginx-lb
$ docker-compose up -d [--build --force-recreate]
```

# nginx-loadbalancer  
This example shows how to create nginx loadbalancer container, which  
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
  debian based container image running nginx and php-fpm & composer.  

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

* `docker-compose.yaml` file:  
  ```
  version: '3.7'
  services:
    app-1:
      image: wyveo/nginx-php-fpm:php80
      volumes:
        - ./app.1:/usr/share/nginx/html
      networks:
        - app-network
    app-2:
      image: wyveo/nginx-php-fpm:php80
      volumes:
        - ./app.2:/usr/share/nginx/html
      networks:
        - app-network
    lb-1:
      build: ./nginx
      ports:
      - "8000:80"
      networks:
        - app-network

  networks:
    app-network:
  ``` 

<br/><br/><br/>

## Run  
* Move to working path:  
```shell
cd {Project Root}/nginx-lb
```

<br/>

```shell
$ docker-compose up -d [--build --force-recreate]
```

To check container, run this command:  
```shell
$ wget localhost:8000
  index.html saved
```

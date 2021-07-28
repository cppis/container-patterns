# Container Patterns  
container patterns using linux, nginx, php stack(LEP stack)

<br/>

## [container-basics](./container-basics/README.md)  
This example shows how to create, delete an `nginx` container.  
It also shows how to run a command which access an interactive shell  
on a running container.  

<figure>
<div style="text-align:center">
  <a href="https://drive.google.com/uc?export=view&id=1CLrvWv2OVyvrdWbFTiNhmMHOK1S6Zg0u">
  <img src="https://drive.google.com/uc?export=view&id=1CszpVbnR0OcZ_RyASi5IfE1dV5VCqZ7G" style="width: 480px; max-width: 50%; height: auto" title="container-basics" />
</div>
</figure>

> :image referenced from the [*Docker for the busy researcher*](http://erick.matsen.org/2018/04/19/docker.html)  

<br/>

## [nginx-php](./nginx-php/README.md)  
This example shows how to create a `nginx+php-fpm` container.  

<figure>
<div style="text-align:center">
  <a href="https://drive.google.com/uc?export=view&id=1STzTfblh6o5POWmd7gD6Te4foy-wX33R">
  <img src="https://drive.google.com/uc?export=view&id=1euIbqKG5GMHILLQKzL6mxYtXmtXK8JKD" style="width: 320px; max-width: 50%; height: auto" title="nginx-php" />
</div>
</figure>

> If you use Docker for development this way,  
> your production Dockerfile would copy the production-ready artifacts   
> directly into the image, rather than relying on a bind mount.  
> :from [docker docs - Good use cases for bind mounts](https://docs.docker.com/storage/#good-use-cases-for-bind-mounts)

<br/>

## [nginx-php-composer](./nginx-php-composer/README.md)  
This example shows how to create a `nginx+php-fpm` container and update packages using `composer`.   

<figure>
<div style="text-align:center">
  <a href="https://drive.google.com/uc?export=view&id=1WZGyVct251iXW2Z7tAHAabrAOqy9E-iS">
  <img src="https://drive.google.com/uc?export=view&id=15WImQr1xDVF83yUSVGYPIevzQ8QUCbqB" style="width: 320px; max-width: 50%; height: auto" title="nginx-php" />
</div>
</figure>

> If you use Docker for development this way,  
> your production Dockerfile would copy the production-ready artifacts   
> directly into the image, rather than relying on a bind mount.  
> :from [docker docs - Good use cases for bind mounts](https://docs.docker.com/storage/#good-use-cases-for-bind-mounts)

<br/>

## [nginx-loadbalancer](./nginx-lb/README.md)  
This example shows how to create nginx loadbalancer container, which  
route traffic to two `nginx+php-fpm` containers.  

<figure>
<div style="text-align:center">
  <a href="https://drive.google.com/uc?export=view&id=11Oi7it8xYRrmKowaJ6Muvq3lCgGZ92vB">
  <img src="https://drive.google.com/uc?export=view&id=1pLpvGrI_1pdgPgyy2FEvWEn0dNfNMIQT" style="width: 480px; max-width: 50%; height: auto" title="nginx-loadbalancer" />
</div>
</figure>

<br/>

## [nginx-php-xdebug](./nginx-php-xdebug/README.md)  
This example shows how to create a `nginx`, `php-fpm+xdebug` container using `docker-compose`.  

<figure>
<div style="text-align:center">
  <a href="https://drive.google.com/uc?export=view&id=1DhZIpDRFDs3TzXSQGybhVnQaT-XFMKCb">
  <img src="https://drive.google.com/uc?export=view&id=1TgATS-jP1rFrk7Nvv8Ns_P0GQePdSvdf" style="width: 320px; max-width: 50%; height: auto" title="nginx-php" />
</div>
</figure>

<br/>

## [k8s-nginx-php](./k8s-nginx-php/README.md)  
This example shows how to create `nginx+php-fpm` container in `k8s`.  

<figure>
<div style="text-align:center">
  <a href="https://drive.google.com/uc?export=view&id=1ABoJwkzoD6nvICVI0g-pTflY6c9xy19N">
  <img src="https://drive.google.com/uc?export=view&id=1HTApftaGBMpf4CZza3rN9SuSXkj1jgJe" style="width: 480px; max-width: 50%; height: auto" title="nginx-loadbalancer" />
</div>
</figure>

<br/>

## [k8s-trow](./k8s-trow/README.md)  
This example shows [`Trow`](https://github.com/ContainerSolutions/trow) to manage images in `k8s` using [`k8s-nginx-php`](./k8s-nginx-php/README.md).  

<figure>
<div style="text-align:center">
  <a href="https://drive.google.com/uc?export=view&id=1vAh5kaOIS8OuZ1MQBE4x2Yiy24tmUqVx">
  <img src="https://drive.google.com/uc?export=view&id=15CpmykDY2NxTe9yTp_Ryt9KJFy45Zu6m" style="width: 480px; max-width: 50%; height: auto" title="nginx-loadbalancer" />
</div>
</figure>

<br/>

## examples to update  
* Distributed lock using redis(or CAS)    
  * [Distributed locks with Redis](https://redis.io/topics/distlock)  

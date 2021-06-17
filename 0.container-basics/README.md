# container basics
shows basic docker commands 

<figure>
<div style="text-align:center">
  <a href="https://drive.google.com/uc?export=view&id=1CLrvWv2OVyvrdWbFTiNhmMHOK1S6Zg0u">
  <img src="https://drive.google.com/uc?export=view&id=1CLrvWv2OVyvrdWbFTiNhmMHOK1S6Zg0u" style="width: 640px; max-width: 100%; height: auto" title="container-basics" />
</div>
</figure>

<br/>

## [Build an image from a Dockerfile](https://docs.docker.com/engine/reference/commandline/build/)  
```shell
$ docker build [-t {Tag}] .
```

> [{Tag} format](https://docs.docker.com/engine/reference/commandline/tag/):  
> ```
> {Repository}/{Image}:{Tag}
> ```

<br/>

## Create an nginx container    
```shell
$ docker run -p 8080:80 -d --name my-nginx nginx
```

check nginx:  
```shell
$ wget localhost:8080
  index.html saved
```

<br/>

## [List container](https://docs.docker.com/engine/reference/commandline/ps/)  
```shell
$ docker ps [-a]
  CONTAINER ID   IMAGE  ...  STATUS                                   NAMES
  {Container ID}  nginx  ...  0.0.0.0:8080->80/tcp, :::8080->80/  tcp  my-nginx
```

<br/>

## [Delete container](https://docs.docker.com/engine/reference/commandline/rm/)  
```shell
$ docker rm [-f] {Container ID}
```

<br/>

## [List images](https://docs.docker.com/engine/reference/commandline/images/)  
```shell
$ docker images
  REPOSITORY                   TAG      IMAGE ID      CREATED         SIZE
  lb-nginxphp_lb-1             latest   22e553463f6f  40 minutes ago  133MB
  nginx                        latest   d1a364dc548d  13 days ago     133MB
  wyveo/nginx-php-fpm          php80    60a2c0073db5  2 weeks ago     482MB
  gcr.io/k8s-minikube/kicbase  v0.0.22  bcd131522525  4 weeks ago     1.09GB
  hello-world                  latest   d1165f221234  3 months ago    13.3kB
```

<br/>

## [Delete image](https://docs.docker.com/engine/reference/commandline/rm/)  
```shell
$ docker rmi [-f] {Image ID}
```

<br/>

## [Remove unused images](https://docs.docker.com/engine/reference/commandline/image_prune/)  
```shell
$ docker image prune
```

<br/>

## [Run a command in a running container](https://docs.docker.com/engine/reference/commandline/exec/)  
execute bash:  
```shell
$ docker exec -it {Container ID} /bin/bash
```

<br/>

<br/>
<br/>
<br/>
<br/>
<br/>

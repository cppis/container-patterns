# nginx-php-xdebug  
This example shows how to create a `nginx`, `php-fpm+xdebug` container using `docker-compose`.  

<figure>
<div style="text-align:center">
  <a href="https://drive.google.com/uc?export=view&id=1DhZIpDRFDs3TzXSQGybhVnQaT-XFMKCb">
  <img src="https://drive.google.com/uc?export=view&id=1DhZIpDRFDs3TzXSQGybhVnQaT-XFMKCb" style="width: 320px; max-width: 50%; height: auto" title="nginx-php" />
</div>
</figure>

<br/>

## Dependencies  
* [docker-compose](https://docs.docker.com/compose/)  
* [vscode](https://code.visualstudio.com/)  
  * [PHP Debug](https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-debug) extensions  

<br/><br/>

## Directory structure  
  ```
  + {Project Root}/  
    + nginx-php-xdebug/  
      + .vscode/
        + launch.json
      + nginx/  
      + php/
        + app/  
          + index.php
    + docker-compose.yml  
    + nginx.Dockerfile  
    + php.Dockerfile  
  ```

<br/><br/>

## Run  
To builds, (re)creates, starts, and attaches to containers for a service,  
run this command:  
```shell
$ cd {Project Root}/nginx-php-xdebug  
$ docker-compose up -d [--force-recreate]
```

> If you need scale service to multiple instance.   
> Add scale option like `--scale SERVICE=NUM`.  

To check nginx, run this command:  
```shell
$ wget localhost:8000
  index.html saved
```

To debug php using *Visual Studio Code*,  
go to *`Run And Debug`* > *`Listen for XDebug nginx-php-xdebug`*  
and add breakpoint to php source(index.php)  

To stop and remove containers, network, volumes, and images created by `up`,  
run this command:  
```shell
$ docker-compose down [--remove-orphans]
```

<br/><br/>

## References  
* [hodanov/docker-template-php](https://github.com/hodanov/docker-template-php)  
  container image running nginx and php-fpm & xdebug.  
* [docker-compose up](https://docs.docker.com/compose/reference/up/)  
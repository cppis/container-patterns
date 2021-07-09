# nginx-php  
This example shows how to create `nginx+php-fpm` container.  

<figure>
<div style="text-align:center">
  <a href="https://drive.google.com/uc?export=view&id=1STzTfblh6o5POWmd7gD6Te4foy-wX33R">
  <img src="https://drive.google.com/uc?export=view&id=1STzTfblh6o5POWmd7gD6Te4foy-wX33R" style="width: 480px; max-width: 100%; height: auto" title="nginx-php" />
</div>
</figure>

<br/>

## Dependencies  
* [hodanov/docker-template-php](https://github.com/hodanov/docker-template-php)  
  container image running nginx and php-fpm & xdebug.  

<br/><br/>

## Directory structure  
  ```
  + {Project Root}/  
    + 3.nginx-php-xdebug/  
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
$ docker-compose up -d [--force-recreate]
```

To check nginx, run this command:  
```shell
$ wget localhost:8000
  index.html saved
```

To stop and remove containers, network, volumes, and images created by `up`,  
run this command:  
```shell
$ docker-compose down [--remove-orphans]
```

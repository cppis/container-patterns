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
* [wyveo/nginx-php-fpm](https://github.com/wyveo/nginx-php-fpm)  
  debian based container image running nginx and php-fpm & composer.  

<br/><br/><br/>

## Directory structure  
  ```
  + {Project Root}/  
    + nginx-php/  
      + app/  
        + index.php
  ```

<br/><br/><br/>

## Run  
* Move to working path:  
```shell
cd {Project Root}/nginx-php/app
```

<br/>

* Run a app:  
```shell
$ docker run -d -p 8000:80 -v ${PWD}:/usr/share/nginx/html wyveo/nginx-php-fpm:php80
```

> Use `%cd%` instead of `${PWD}` on Windows  

* To test a app, run this command:  
```shell
$ wget localhost:8000
  index.html saved
```

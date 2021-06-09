# nginx-php  
this example shows how to create `nginx+php-fpm` container.  

<figure>
<div style="text-align:center">
  <img src="https://drive.google.com/uc?export=view&id=1STzTfblh6o5POWmd7gD6Te4foy-wX33R" style="width: 480px; max-width: 100%; height: auto" title="nginx-php" />
</div>
</figure>

<br/>

## Dependencies  
----
* [wyveo/nginx-php-fpm](https://github.com/wyveo/nginx-php-fpm)  
  debian based container image running nginx and php-fpm & Composer.  

<br/><br/><br/>

## Run  
----
```shell
$ docker run -d -p 8000:80 -v {Project Root}/nginx-php/app:/usr/share/nginx/html wyveo/nginx-php-fpm:php80
```

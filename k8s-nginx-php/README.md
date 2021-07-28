# k8s-nginx-php  
this example shows how to create `nginx+php-fpm` container in `k8s`.  

<figure>
<div style="text-align:center">
  <a href="https://drive.google.com/uc?export=view&id=1ABoJwkzoD6nvICVI0g-pTflY6c9xy19N">
  <img src="https://drive.google.com/uc?export=view&id=1ABoJwkzoD6nvICVI0g-pTflY6c9xy19N" style="width: 480px; max-width: 50%; height: auto" title="k8s-nginx-php" />
</div>
</figure>

<br/>

## Dependencies  
* [k8s](https://kubernetes.io/ko/)  
* [wyveo/nginx-php-fpm](https://github.com/wyveo/nginx-php-fpm)  
  debian based container image running nginx and php-fpm & composer.  
* [minikube hypherv driver](https://minikube.sigs.k8s.io/docs/drivers/hyperv/)  
  There is a native tool for kubernetes called Minikube.  
  You can run kubernetes locally using minikube.  

  I recommend installing VirtualBox or Hyper-V to run Minikube on Windows.  
  Hyper-V can run on three versions of Windows 10:  
  (Windows 10 Enterprise, Windows 10 Professional, and Windows 10 Education.)


<br/><br/><br/>

## Directory structure  
  ```
  + {Project Root}/
    + k8s-nginx-php/  
      + app/  
        + index.php
      + Dockerfile  
      + configmap.yaml  
      + pod.yaml  
  ```

<br/><br/><br/>

## Run  
* Move to working path:  
```shell
cd {Project Root}/k8s-nginx-php/  
```

<br/>

* Build php app image if not exists:  
```
$ docker build . -t k8s-php:1.0.0
```

<br/>

* Start minikube cluster(using-Minikube, non-WSL):  
```
$ minikube start
$ minikube ip
  {Node IP}
$ minikube image load k8s-php:1.0.0
```

> In WSL, `localhost` can be `{Node IP}`.  

<br/>

* Create kubernetes workloads:  
```shell
$ kubectl apply -f configmap.yaml  
$ kubectl apply -f pod.yaml  
$ kubectl expose pod k8s-nginx-php --type=NodePort --port=80
$ kubectl describe service k8s-nginx-php
  ...
  NodePort:	<unset>	{Node Port}/TCP
  ...
```

<br/>

* Check running app:  
```
$ kubectl get all
$ wget {Node IP}:{Node Port}
```

<br/>

* Run command `/bin/sh` in pod:  
```
$ kubectl exec -it k8s-nginx-php -c nginx -- /bin/sh
```

<br/>

* Delete minikube cluster(using-Minikube, non-WSL):  
```
$ minikube delete
```

<br/><br/><br/>

## Tips  
* [The storage location of Docker images and containers](https://www.freecodecamp.org/news/where-are-docker-images-stored-docker-container-paths-explained/)  
  * Ubuntu(WSL): `/var/lib/docker/`  
  * Fedora: `/var/lib/docker/`  
  * Debian: `/var/lib/docker/`  
  * Windows: `C:\ProgramData\DockerDesktop`  
  * MacOS: `~/Library/Containers/com.docker.docker/Data/vms/0/`    

  <br/>

  Run the following command to inspect details about image:  
  ```
  $ docker inspect NAME|ID
  ```

<br/><br/><br/>

## References  
* [docker inspect](https://docs.docker.com/engine/reference/commandline/inspect/)  
* [How to Install and Configure Minikube on Ubuntu](https://www.liquidweb.com/kb/how-to-install-and-configure-minikube-on-ubuntu/)  
  This article will demonstrate how to install and configure Minikube to set up a small Kubernetes cluster  

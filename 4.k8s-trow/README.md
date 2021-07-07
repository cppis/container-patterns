# k8s-trow  
This example shows [`Trow`](https://github.com/ContainerSolutions/trow) to manage images in `k8s` using [`k8s-nginx-php`](./3.k8s-nginx-php/README.md).  

To use images in a Kubernetes, you need a registry.  
Let's run a registy in a Kubernetes cluster.  

<figure>
<div style="text-align:center">
  <a href="https://drive.google.com/uc?export=view&id=1vAh5kaOIS8OuZ1MQBE4x2Yiy24tmUqVx">
  <img src="https://drive.google.com/uc?export=view&id=1vAh5kaOIS8OuZ1MQBE4x2Yiy24tmUqVx" style="width: 480px; max-width: 50%; height: auto" title="nginx-loadbalancer" />
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
* [Trow](https://github.com/ContainerSolutions/trow)  

<br/><br/>

## Directory structure  
  ```
  + {Project Root}/
    + 4.k8s-trow/  
      + app/  
        + index.php
      + Dockerfile  
      + configmap.yaml  
      + pod.yaml  
  ```

<br/><br/>

## Run  
* Install Trow on cluster:  
```
$ git clone https://github.com/ContainerSolutions/trow.git
$ cd trow/quick-install
$ ./install.sh
```

  > You may need to extend your users privileges by running:  
  > ```
  > $ kubectl create clusterrolebinding cluster-admin-binding --clusterrole=cluster-admin --user=username  
  > ```

The registry address `trow.kube-public` is adding to `/etc/hosts` .   

* Try pushing an image to Trow:  
```
$ docker tag k8s-php:1.0.0 trow.kube-public:31000/k8s-php:1.0.0
$ docker tag nginx:1.21.0 trow.kube-public:31000/nginx:1.21.0
$ docker push trow.kube-public:31000/k8s-php:1.0.0
```

<br/>

* Change image field value in the `pod.yaml` of previous example [`k8s-nginx-php`](./3.k8s-nginx-php/README.md):  
  * From:  
  ```
  containers.image: k8s-php:1.0.0
  containers.image: nginx:1.21.0
  ```
  * To:  
  ```
  containers.image: trow.kube-public:31000/k8s-php:1.0.0
  containers.image: trow.kube-public:31000/nginx:1.21.0
  ```

* Create kubernetes ConfigMap and Pod:  
```shell
$ kubectl apply -f configmap.yaml  
$ kubectl apply -f pod.yaml  
```

* Create Service in a cluster with `kubectl expose`:  
```shell
$ kubectl expose pod k8s-nginx-php --type=NodePort --port=80
$ kubectl describe service k8s-nginx-php
  ...
  NodePort:	<unset>	{Node Port}/TCP
  ...
```

* Check running app:  
```
$ kubectl get all
$ wget {Node IP}:{Node Port}
```

<br/><br/>

## Tips  
* Why tag official Docker Hub image `nginx:1.21.0` to Trow?  
  With an integration with Kubernetes, it can allow only certain images  
  to be loaded, preventing others as a security measure.  
  Using an image that is not allowed results in the following error:  
  
  ```
  Error creating: admission webhook "validator.trow.io" denied the request:   
  Remote image docker.io/nginx disallowed as not contained in this registry  
  and not in allow list  
  ```  


<br/><br/>

## References  
### Kubernetes  
* [Exposing an External IP Address to Access an Application in a Cluster](https://kubernetes.io/docs/tutorials/stateless-application/expose-external-ip-address/)  
* [kubernetes - Images](https://kubernetes.io/ko/docs/concepts/containers/images/)  

### Trow  
* [Trow](https://github.com/ContainerSolutions/trow)  
* [Trow, a Container Registry to Run Inside Your Kubernetes Cluster](https://thenewstack.io/trow-a-container-registry-to-run-inside-a-kubernetes-cluster/)  
* [Installing a Registry on Kubernetes (Quickstart)](https://blog.container-solutions.com/installing-a-registry-on-kubernetes-quickstart)  

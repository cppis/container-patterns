# k8s-trow  
this example shows [`Trow`](https://github.com/ContainerSolutions/trow) to manage images in `k8s`.  

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
* [Trow](https://github.com/ContainerSolutions/trow)  

<br/><br/>

## Directory structure  
  ```
  + {Project Root}/
    + k8s-trow/  
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

> You may also need to extend your users privileges by running:  
> ```
> $ kubectl create clusterrolebinding cluster-admin-binding --clusterrole=cluster-admin --user=username  
> ```

The registry address `trow.kube-public` is configured by adding an  
entry to `/etc/hosts` .   

* Try pushing an image to Trow:  
```
$ docker tag k8s-php:1.0.0 trow.kube-public:31000/k8s-php:1.0.0
$ docker tag nginx:1.21.0 trow.kube-public:31000/nginx:1.21.0
$ docker push trow.kube-public:31000/k8s-php:1.0.0
```

> * Why tag official `nginx:1.21.0` image from Docker Hub?  
> With an integration with Kubernetes,  
> it can allow only certain images to be loaded,  
> preventing others as a security measure.  
> Using an image that is not allowed results in the following error:  
>  
> ```
> Error creating: admission webhook "validator.trow.io" denied the request:   
> Remote image docker.io/nginx disallowed as not contained in this registry  
> and not in allow list  
> ```  

<br/>

* Change image field value in the `pod.yaml`:  
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

* create kubernetes workloads:  
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

* check running app:  
```
$ kubectl get all
$ wget {Node IP}:{Node Port}
```

<br/><br/>

## Tips  
...

<br/><br/>

## References  
* [Trow](https://github.com/ContainerSolutions/trow)  
* [Trow, a Container Registry to Run Inside Your Kubernetes Cluster](https://thenewstack.io/trow-a-container-registry-to-run-inside-a-kubernetes-cluster/)  
* [kubernetes - Images](https://kubernetes.io/ko/docs/concepts/containers/images/)  
* [Installing a Registry on Kubernetes (Quickstart)](https://blog.container-solutions.com/installing-a-registry-on-kubernetes-quickstart)  

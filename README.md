# ft_server

## An introduction to Docker for 42 school:

#### To build:
```docker build -t ft_server .```
#### To run:
```docker run -it -p 80:80 -p 443:443 --name ft_server ft_server```
#### To modify while container is running:
```docker exec -it ft_server /bin/bash```
#### To see all containers:
```docker ps -a```
#### To stop:
```docker stop ft_server```
#### To prune:
```docker container prune```
```docker image prune```
```docker system prune
#### To login:
```uwordpress - password```
```adminwordpress - password```

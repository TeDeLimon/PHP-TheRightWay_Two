# More commands 
Docker is running in a terminal, but if we want to run docker without be ligated to a terminal --> 
```command
    docker compose up -d
```

Para ver los contenedores actuales:
```command
    docker ps
```

Lanzar la terminal bash de un servidor linux
```command
    docker exec -it <mycontainer> bash
```

Obtener todos los directorios de una carpeta en Linux
```bash
    ls -d */
```
```bash
    ls -l | grep "^d" 
```

Acceder a un directorio
```bash
    cd <directory/>
```

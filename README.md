# MICROSERVICIOS DE BENEFICIARIOS MUSERPOL

## Requirements

* Docker
* docker-compose

## Install

```sh
sudo apt update
apt install docker
apt install docker-compose
```
* Verificar la instalación

```sh
docker --version
docker-compose --version
```

* Modificar los puertos de despliegue del archivo docker-compose.yml

* Levantar el proyecto

```sh
docker-compose up -d
```

* en caso de error con la configuración, modificar segun la necesidad y levantar nuevamente

```sh
docker-compose up -d --build
```

* Modificar el archivo `.env` de la carpeta src con las credenciales de acceso a la base de datos.

* Verificar que los contenedores se encuentren funcionando:

```sh
docker-compose ps -a
```

* Instalar las dependencias del proyecto

```sh
docker-compose exec php sh
composer install
```

# Notas

* Se pueden verificar los log's de los contenedores levantados o hacer seguimiento en caso de que algun contenedor genere algun error

```sh
docker-compose logs server

docker-compose -f server
```
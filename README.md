# Docker PHP Boilerplate

Este proyecto es un boilerplate para Katas PHP con Docker.

## Uso
1. Para construir el container de docker, ejecuta el siguiente comando (esto ya ejecutará la máquina):
```bash
make
```
2. Para lanzar el container de docker una vez lo has construido, ejecuta el siguiente comando:
```bash
make start
```
3. Para acceder al container de docker, ejecuta el siguiente comando:
```bash
make shell
```
4. Para ejecutar los tests, ejecuta el siguiente comando:
```bash
make test
```
5. Para parar el container de docker, ejecuta el siguiente comando:
```bash
make stop
```
6. Para eliminar el container de docker, ejecuta el siguiente comando:
```bash
make clean
```

## Requisitos
- [Docker](https://www.docker.com/)
- [Make](https://www.gnu.org/software/make/)
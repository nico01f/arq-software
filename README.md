# Repo para gestionar el proyecto de Arquitectura de Software

## Mantengamos el orden

### Directorios

    /
    | - App -> Donde va todo lo concerniente al **Código**
    | - Docs -> Donde va todo lo concerniente a la **Documentación**
    | - Others -> Lo que no calza en los otros dirs.


Si alguien no sabe git, que diga para que le enseñemos cómo y no tengamos
--merge conflicts--


Para levantar backend, frontend, BD de MedicalGest
--------------------------------------------------

**Requisitos:**
- docker
- vagrant
- VirtualBox

Ejecutar estos comandos en los directorios:

**arq-software/App/Negocio**

$ `docker build -t frontend .`
$ `docker run -p 8282:8282 frontend`

**arq-software/App/Servicios**

$ `docker build -t backend .`
$ `docker run -p 8181:8181 backend`

**Para levantar BD**
**arq-software/App**
$ `vagrant up`

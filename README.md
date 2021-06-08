[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]



<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/kimael-code/studium">
    <img src="public/favicon-studium-d0d1e6.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">Studium</h3>

  <p align="center">
    Sistema de Gestión Académica en Línea
    <br />
    <a href="https://github.com/kimael-code/studium"><strong>Revise la Documentación »</strong></a>
    <br />
    <br />
    <a href="https://github.com/kimael-code/studium/issues">Notificar Error</a>
    ·
    <a href="https://github.com/kimael-code/studium/issues">Solicitar Funcionalidad</a>
  </p>
</p>



<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary><h2 style="display: inline-block">Tabla de Contenidos</h2></summary>
  <ol>
    <li>
      <a href="#acerca-del-proyecto">Acerca del Proyecto</a>
      <ul>
        <li><a href="#construido-con">Construido Con</a></li>
      </ul>
    </li>
    <li>
      <a href="#primeros-pasos">Primeros Pasos</a>
      <ul>
        <li><a href="#prerrequisitos">Prerrequisitos</a></li>
        <li><a href="#installación">Instalación</a></li>
      </ul>
    </li>
    <li><a href="#uso">Uso</a></li>
    <li><a href="#hoja-de-ruta">Hoja de Ruta</a></li>
    <li><a href="#colaborar">Colaborar</a></li>
    <li><a href="#licencia">Licencia</a></li>
    <li><a href="#contacto">Contacto</a></li>
    <li><a href="#agradecimientos">Agradecimientos</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## Acerca del Proyecto

[![Studium][product-screenshot]](https://example.com)

Studium pretende ser un sistema de gestión académica en línea y es un proyecto de aprendizaje autodidácta de desarrollo de aplicaciones web [SPA](https://es.wikipedia.org/wiki/Single-page_application) con intención de llegar a ser una [PWA](https://es.wikipedia.org/wiki/Aplicaci%C3%B3n_web_progresiva).


### Construido Con

* [Laravel 8](https://laravel.com/)
* [PostgreSQL 13](https://www.postgresql.org/)
* [Inertia](https://inertiajs.com/)
* [Vue.js 3](https://v3.vuejs.org/)
* [Bulma](https://bulma.io/)



<!-- GETTING STARTED -->
## Primeros Pasos

Para comenzar a usar Studium verifique que cumpla con los prerrequisitos y luego siga las instrucciones de instalación.

### Prerrequisitos

* Docker
* Docker Compose
* Puerto `80` disponible

### Instalación

1. Descargue el repositorio

   ```sh
   git clone https://github.com/kimael-code/studium.git
   ```

2. Diríjase a la carpeta raíz del repositorio (`studium`) y cree el archivo `.env`

   ```sh
   cd /ruta/a/studium

   cp .env.example .env
   ```

3. Instale las dependencias

   ```sh
   docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
   ```

4. Inicie los servicios del sistema

   ```sh
   sail up -d
   ```

5. Migre y establezca el estado inicial de la base de datos

   ```sh
   sail artisan migrate:fresh --seed
   ```

6. Abra la siguiente url en el navegador/explorador web de su preferencia para verificar la instalación

   ```sh
   http://localhost
   ```

7. Si todo salió bien debe mostrarse en el navegador/explorador web la pantalla de bienvenida de Studium.

<!-- USAGE EXAMPLES -->
## Uso

_Próximamente_



<!-- ROADMAP -->
## Hoja de Ruta

Vea los [temas abiertos](https://github.com/kimael-code/studium/issues) para obtener una lista de funcionalidades propuestas (y problemas conocidos).



<!-- CONTRIBUTING -->
## Colaborar

Las contribuciones son lo que hace que la comunidad de código abierto sea un lugar tan increíble para aprender, inspirar y crear. Cualquier contribución que haga es **muy apreciada**.

Para reportar fallos o sugerir cambios visite el apartado [incidencias](https://github.com/kimael-code/studium/issues).

Para aportar una nueva funcionalidad al sistema:

1. Realice un Fork del Proyecto
2. Cree su Rama Feature (`git checkout -b feature/nueva_funcionalidad`)
3. Confirme sus Cambios en la rama Feature (`git commit -m 'Añade la nueva funcionalidad'`)
4. Suba sus Cambios al Repositorio Origen (`git push origin feature/nueva_funcionalidad`)
5. Abra una Petición de Fusión (explicando detalladamente el o los motivos de la nueva funcionalidad)



<!-- LICENSE -->
## Licencia

Distribuido bajo la licencia [MIT](https://github.com/kimael-code/studium/blob/devel/LICENSE).



<!-- CONTACT -->
## Contacto

Maikel Carballo - [@\_kimael\_](https://twitter.com/_kimael_).

Project Link: [https://github.com/kimael-code/studium](https://github.com/kimael-code/studium)



<!-- ACKNOWLEDGEMENTS -->
## Agradecimientos

* [Laravel](https://laravel.com/)
* [PostgreSQL](https://www.postgresql.org/)
* [Inertia](https://inertiajs.com/)
* [Vue.js](https://v3.vuejs.org/)
* [Bulma](https://bulma.io/)





<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/kimael-code/studium.svg?style=for-the-badge
[contributors-url]: https://github.com/kimael-code/studium/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/kimael-code/studium.svg?style=for-the-badge
[forks-url]: https://github.com/kimael-code/studium/network/members
[stars-shield]: https://img.shields.io/github/stars/kimael-code/studium.svg?style=for-the-badge
[stars-url]: https://github.com/kimael-code/studium/stargazers
[issues-shield]: https://img.shields.io/github/issues/kimael-code/studium.svg?style=for-the-badge
[issues-url]: https://github.com/kimael-code/studium/issues
[license-shield]: https://img.shields.io/github/license/kimael-code/studium.svg?style=for-the-badge
[license-url]: https://github.com/kimael-code/studium/blob/master/LICENSE
[product-screenshot]: public/imgs/screenshots/screen-home.jpg

<p align="center">
    Laravel application made with
    <a href="https://www.laravel.com">
        <img src="https://raw.githubusercontent.com/MagicalStrangeQuark/MagicalStrangeQuark/master/assets/laravel.svg" width="10%">
    </a>
    <a href="https://www.mysql.com">
        <img src="https://raw.githubusercontent.com/MagicalStrangeQuark/MagicalStrangeQuark/master/assets/mysql.svg" width="10%">
    </a>
    <a href="https://www.nginx.com">
        <img src="https://raw.githubusercontent.com/MagicalStrangeQuark/MagicalStrangeQuark/master/assets/nginx.svg" width="10%">
    </a> with 👉<a href="https://www.docker.com">Docker</a>👈
</p>

<p align="center">
    <a href="#">
        <img alt="License" src="https://img.shields.io/github/license/Whopag/DockerLaravelMySQL">
    </a>
    <a href="#">
        <img alt="Languages" src="https://img.shields.io/github/languages/count/Whopag/DockerLaravelMySQL">
    </a>
    <a href="#">
        <img alt="Last Commit" src="https://img.shields.io/github/last-commit/Whopag/DockerLaravelMySQL">
    </a>
    <a href="#">
        <img alt="Followers" src="https://img.shields.io/github/followers/Whopag?style=social">
    </a>
</p>

<p align="center">Clone the repository</p>

```bash
    git clone https://github.com/Weavous/LaraVuePost
```

<p align="center">Copy the environment variables example file</p>

```bash
    cp backend/.env.example backend/.env
```

<p align="center">After clone the repository, configure the environment variables</p>

```txt
    DB_CONNECTION=mysql
    DB_HOST=laravuepost_mysql_1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=secret
```

<p align="center">Now you have to build the image from <em>Docker</em> image</p>

```bash
    docker-compose up -d --build
```

<p align="center">Install Laravel dependencies</p>

```bash
    docker-compose run --rm composer install
```

<p align="center">Run Laravel migrations/seeders</p>

```bash
    docker-compose run --rm artisan migrate:fresh --seed
```

<p align="center">Create an Laravel application key</p>

```bash
    docker-compose run --rm artisan key:generate
```

<p align="center">Run Laravel tests</p>

```bash
    docker-compose run --rm artisan test
```

<p align="center">Inside Browser Directory, Start Vue application</p>

```bash
    npm run dev
```

<p>You can open Laravel application in <strong>localhost:8080</strong></p>

<p>You can open Vue application in <strong>localhost:8081</strong></p>

<h4 align="center">Topics</h4>

<h6 align="center">🚀 Docker</h6>

<p>If necessary, you can remove all images using <strong>docker system prune -a --volumes</strong></p>

<h4 align="center">Questions</h4>

<p>Any questions or suggestions regarding the project, please contact me on 📧 <strong>wesleyfloresterres@gmail.com</strong></p>
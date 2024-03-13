### Software Stack
- Docker 24.0.6
- PHP 8.2.3
- MySQL 8.1.0
- Laravel 10.29
- Swagger Api Documentation


### Base Settings
1. Clone git project
2. Run cp .env.example .env
3. Set up your settings in .env:
    - DOCKER_NGINX_PORT, DOCKER_USERNAME, DOCKER_USER_ID
    - APP_URL
4. Set up your Google and Openweather credentials in .env
4. Run docker compose build
5. Run docker compose up -d
6. Run docker exec -it weather-app bash
7. Run composer install
8. Run php artisan key:generate
9. Run php artisan migrate

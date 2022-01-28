
# Lara-do

A laravel todo list


## Installation

Clone the repo

```bash
  git clone git@github.com:AlfredGranson/lara-do.git
```
Install and start laravel Sail (this will start docker)
```bash
  cd lara-do
  
  cp .env.example .env
  
  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
    
  ./vendor/bin/sail up
```
In another tab setup the rest of the application isnide the docker container
```bash
  docker exec -it lara-do_laravel.test_1 bash
  
  php artisan key:generate
  
  php artisan migrate
  
  npm install
  npm run dev
``` 
## Usage/Examples

Visit [localhost](http://localhost) to visit the dev server.

Click on the 'Register' link at the top right and follow the directions to create a new user and login.

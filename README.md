
# Lara-do

A laravel todo list


## Installation

Clone the repo

```bash
  git clone git@github.com:AlfredGranson/lara-do.git
```
Start laravel Sail (this will start docker)
```bash
  cd lara-do
  ./vendor/bin/sail up
```
Enter the container to run npm install/run and migrations
```bash
  docker exec -it lara-do_laravel.test_1 bash
  npm install
  npm run dev
  php artisan migrate
``` 
## Usage/Examples

Visit [localhost](http://localhost) to visit the dev server.

Click on the 'Register' link at the top right and follow the directions to create a new user and login.

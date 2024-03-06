## About Repo

Implemented search mechanism for data from database using ajax and  jQuery auto-complete(package) feature, integrated with images. Using the Laravel framework.

follow the below step to setup this repo on your local


- Rename .env.example as .env and make the required database connection.
- Now open terninal navigate repo root path.
- Run below commands
- php artisan migrate
- php artisan db:seed --class=DatabaseSeeder
- php artisan serv
- Now your project will run(most probably) on http://127.0.0.1:8000 .

Some useful files :
- View : /resources/views/autocomplete.blade.php
- Controller : /app/Http/Controllers/SearchController.php
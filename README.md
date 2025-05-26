This file contains information to start the project.

Info:
I work via XAMPP for my Apache and MySQL-database. These can be accessed through the XAMPP-control panel.

If you cloned the repo from GitHub, this is what you should do next:

    --> "composer install" in terminal
    --> "cp .env.example .env" in terminal to make a valid .env file. Change these values in the .env:
        --> APP_NAME = Laravel-2025
        --> DB_CONNECTION = mysql
        --> Remove hashtags in front of the other DB-credentials
        --> DB_DATABASE = laravel-2025
        --> DB_USERNAME = sethdepreter
        --> DB_PASSWORD = /*My password*/
        --> MAIL_MAILER = smtp
        --> MAIL_HOST = smtp.gmail.com
        --> MAIL_PORT = 587
        --> MAIL_USERNAME = seth.depreter@gmail.com
        --> MAIL_PASSWORD = ucjtbwxdwnxaqfer
        --> MAIL_ENCRYPTION = tls
        --> MAIL_FROM_ADDRESS = "unitedforum.info@gmail.com"
        --> MAIL_FROM_NAME="United Forum"
        --> MAIL_TO_ADDRESS = seth.depreter@gmail.com
        --> Save .env file
    --> "php artisan key:generate" in terminal
    --> "php artisan migrate:fresh --seed" in terminal
    --> "npm install" in terminal
    --> "npm run build" in terminal
    --> "php artisan storage:link" in terminal (to work with images)
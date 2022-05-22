# How to Run
## Installation

- install php 7.4 , apache
- git clone https://github.com/kundu/iniSev-task.git
- rename example.env to .env [root folder]
- change database connection value from env file: DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
- change email configuration value from env file: MAIL_MAILER, MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD, MAIL_ENCRYPTION
- set QUEUE_CONNECTION=database if you want to run job from cron or supervisor. set QUEUE_CONNECTION=sync if you want to run job in runtime
- run command: composer install
- run command: php artisan migrate --seed
- run command: php artisan serve --port=8090 
 
## Links
 
```sh

Admin Panel: http://127.0.0.1:8090/admin
User credentials: Email: admin@admin.com : Password: 12345678
User Panel: http://127.0.0.1:8090/

```
 
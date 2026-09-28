# Tasks for Today

A small CodeIgniter 4 app for viewing assignments by due date. It has a Welcome page, full Task List, demo Profile, and About page.

## Run it

You need PHP 8.2+, Composer, and MySQL or MariaDB.

1. Run `composer install`.
2. Create a MySQL database named `tasks_for_today`.
3. Copy `.env.example` to `.env` and enter your database username and password.
4. Run `php spark migrate`.
5. Run `php spark db:seed DemoSeeder`.
6. Run `php spark serve` and open `http://localhost:8080`.

The demo data has 10 tasks and one user. Run the seeder again to reset the tasks.

### Screenshots

# Tasks for Today Management System

A CodeIgniter 4 / PHP MVC app backed by MySQL. The Welcome page groups assignments by scheduled date, the Task List page shows every task by date, the Profile page shows one demo user, and the About page identifies the developer. Styling is plain CSS, with no client-side JavaScript.

## Requirements

- PHP 8.2 or newer with the extensions required by CodeIgniter 4, including `intl` and `mysqli`
- Composer 2
- MySQL 8 or compatible MariaDB server

## Setup

1. Run `composer install`.
2. Create a MySQL database named `tasks_for_today` (or use another name in `.env`). For example: `CREATE DATABASE tasks_for_today;`.
3. Copy `.env.example` to `.env` and set your database credentials and `app.baseURL`. The default app time zone is `Asia/Singapore`.
4. Run `php spark migrate` to create the `tasks` and `users` tables.
5. Run `php spark db:seed DemoSeeder` to load the ten assessment tasks and one demo user. Repeating the seeder refreshes the task list and profile while preserving the user's original `created_at` value.
6. Run `php spark serve`, then open `http://localhost:8080/`.

For Apache or another web server, point the document root to `public/` and configure URL rewriting. Set `app.baseURL` to the hosted URL.

## Routes

| Route | Data |
| --- | --- |
| `/` | Tasks grouped by `task_date`, with today's group marked |
| `/tasks` | Every task, ordered by `task_date` then `id` |
| `/profile` | The single demo user |
| `/about` | Developer information |

The migration and seeder live in `app/Database/`. Queries live in `app/Models/`, route actions in `app/Controllers/`, and plain PHP templates in `app/Views/`.

The assessment dates are fixed in 2026. A second migration adds nullable `due_time` to support the September 29, 12:00 PM deadline for IT0035: Summative Assessment 1.

The GitHub repository contains the source code; Composer installs the framework dependency into the ignored `vendor/` directory. No hosted deployment has been configured yet.

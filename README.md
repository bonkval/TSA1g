# Tasks for Today Management System

An Express MVC application backed by MySQL. The Welcome page shows tasks dated today; the Task List shows every task in date order. The Profile page shows one demo user, and the About page identifies the developer.

## Requirements

- Node.js 20 or newer
- MySQL 8 or a compatible MariaDB server
- A MySQL account permitted to create a database and tables

## Setup

1. Copy `.env.example` to `.env` and set your MySQL credentials. Set `APP_TIME_ZONE` to the team's time zone (default: `Asia/Singapore`).
2. Run `npm install`.
3. Run `npm run db:setup`. This creates the database and the two required tables. On empty tables, it inserts eight tasks across yesterday, today, and tomorrow, plus exactly one demo user. Repeating setup does not duplicate records.
4. Run `npm start` and open `http://localhost:3000`.

## Pages

| Route | Content |
| --- | --- |
| `/` | Tasks whose `task_date` equals today in `APP_TIME_ZONE` |
| `/tasks` | All tasks, ordered by `task_date` then `id` |
| `/profile` | The demo user |
| `/about` | Developer information |

The setup script seeds relative to its run date. To repopulate the sample tasks for a later day, clear the `tasks` table and rerun `npm run db:setup`.

## Structure

- `models/`: SQL retrieval logic
- `controllers/`: Page handlers
- `routes/`: URL mapping
- `views/`: Plain EJS page templates
- `scripts/setupDatabase.js`: Schema creation and sample data

No hosted URL has been configured. Deploy the same code with a reachable MySQL server and set the environment variables from `.env.example`.

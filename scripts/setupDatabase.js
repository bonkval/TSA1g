require('dotenv').config();
const mysql = require('mysql2/promise');
const { todayInTimeZone } = require('../lib/date');

const databaseName = process.env.DB_NAME || 'tasks_for_today';
if (!/^[A-Za-z0-9_]+$/.test(databaseName)) {
  throw new Error('DB_NAME may contain only letters, numbers, and underscores.');
}

function shiftDate(date, days) {
  const shifted = new Date(`${date}T00:00:00Z`);
  shifted.setUTCDate(shifted.getUTCDate() + days);
  return shifted.toISOString().slice(0, 10);
}

async function setup() {
  const connection = await mysql.createConnection({
    host: process.env.DB_HOST || '127.0.0.1',
    port: Number(process.env.DB_PORT || 3306),
    user: process.env.DB_USER || 'root',
    password: process.env.DB_PASSWORD || '',
    dateStrings: true
  });

  try {
    await connection.query(`CREATE DATABASE IF NOT EXISTS \`${databaseName}\``);
    await connection.query(`USE \`${databaseName}\``);
    await connection.query(`CREATE TABLE IF NOT EXISTS tasks (
      id INT AUTO_INCREMENT PRIMARY KEY,
      title VARCHAR(150) NOT NULL,
      status VARCHAR(20) NOT NULL DEFAULT 'pending',
      task_date DATE NOT NULL,
      created_at DATETIME NOT NULL
    )`);
    await connection.query(`CREATE TABLE IF NOT EXISTS users (
      id INT AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(50) NOT NULL UNIQUE,
      full_name VARCHAR(100) NOT NULL,
      email VARCHAR(100) NOT NULL,
      created_at DATETIME NOT NULL
    )`);

    const today = todayInTimeZone();
    const now = new Intl.DateTimeFormat('sv-SE', {
      timeZone: process.env.APP_TIME_ZONE || 'Asia/Singapore',
      year: 'numeric', month: '2-digit', day: '2-digit',
      hour: '2-digit', minute: '2-digit', second: '2-digit', hourCycle: 'h23'
    }).format(new Date());
    const records = [
      ['Review yesterday\'s progress', 'completed', shiftDate(today, -1)],
      ['Prepare team meeting notes', 'completed', shiftDate(today, -1)],
      ['Check project inbox', 'pending', today],
      ['Attend daily team meeting', 'pending', today],
      ['Update task tracker', 'pending', today],
      ['Review open requests', 'pending', today],
      ['Draft weekly report', 'pending', shiftDate(today, 1)],
      ['Plan next sprint', 'pending', shiftDate(today, 1)]
    ];

    const [[taskCount]] = await connection.query('SELECT COUNT(*) AS count FROM tasks');
    if (taskCount.count === 0) {
      for (const [title, status, taskDate] of records) {
        await connection.execute(
          'INSERT INTO tasks (title, status, task_date, created_at) VALUES (?, ?, ?, ?)',
          [title, status, taskDate, now]
        );
      }
    }

    const [[userCount]] = await connection.query('SELECT COUNT(*) AS count FROM users');
    if (userCount.count === 0) {
      await connection.execute(
        'INSERT INTO users (username, full_name, email, created_at) VALUES (?, ?, ?, ?)',
        ['demo_user', 'Alex Morgan', 'alex.morgan@example.com', now]
      );
    } else if (userCount.count !== 1) {
      throw new Error('The users table must contain exactly one record. Remove extra users before setup.');
    }

    console.log('Database ready. Sample records are seeded when the tables are empty.');
  } finally {
    await connection.end();
  }
}

setup().catch(error => {
  console.error(error);
  process.exitCode = 1;
});

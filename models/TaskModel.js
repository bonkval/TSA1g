const db = require('../config/database');

class TaskModel {
  static async getForDate(date) {
    const [rows] = await db.execute(
      'SELECT id, title, status, task_date, created_at FROM tasks WHERE task_date = ? ORDER BY id ASC',
      [date]
    );
    return rows;
  }

  static async getAll() {
    const [rows] = await db.execute(
      'SELECT id, title, status, task_date, created_at FROM tasks ORDER BY task_date ASC, id ASC'
    );
    return rows;
  }
}

module.exports = TaskModel;

const db = require('../config/database');

class UserModel {
  static async getDemoUser() {
    const [rows] = await db.execute(
      'SELECT id, username, full_name, email, created_at FROM users ORDER BY id ASC LIMIT 1'
    );
    return rows[0] || null;
  }
}

module.exports = UserModel;

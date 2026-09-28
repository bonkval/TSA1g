const test = require('node:test');
const assert = require('node:assert/strict');
const app = require('../app');
const TaskModel = require('../models/TaskModel');
const UserModel = require('../models/UserModel');
const { todayInTimeZone } = require('../lib/date');

test('the four routes render the expected database results', async () => {
  const originalGetForDate = TaskModel.getForDate;
  const originalGetAll = TaskModel.getAll;
  const originalGetDemoUser = UserModel.getDemoUser;
  const today = todayInTimeZone();
  let receivedDate;
  TaskModel.getForDate = async date => {
    receivedDate = date;
    return [{ id: 1, title: 'Today only', status: 'pending', task_date: today }];
  };
  TaskModel.getAll = async () => [
    { id: 1, title: 'Today only', status: 'pending', task_date: today },
    { id: 2, title: 'Another day', status: 'completed', task_date: '2020-01-01' }
  ];
  UserModel.getDemoUser = async () => ({
    username: 'demo_user', full_name: 'Alex Morgan',
    email: 'alex.morgan@example.com', created_at: '2026-01-01 12:00:00'
  });

  const server = app.listen(0);
  try {
    const base = `http://127.0.0.1:${server.address().port}`;
    const welcome = await (await fetch(base)).text();
    assert.equal(receivedDate, today);
    assert.match(welcome, /Today only/);
    assert.doesNotMatch(welcome, /Another day/);

    const tasks = await (await fetch(`${base}/tasks`)).text();
    assert.match(tasks, /Today only/);
    assert.match(tasks, /Another day/);

    const profile = await (await fetch(`${base}/profile`)).text();
    assert.match(profile, /Alex Morgan/);

    const about = await (await fetch(`${base}/about`)).text();
    assert.match(about, /developed by Cedri/);
  } finally {
    await new Promise(resolve => server.close(resolve));
    TaskModel.getForDate = originalGetForDate;
    TaskModel.getAll = originalGetAll;
    UserModel.getDemoUser = originalGetDemoUser;
  }
});

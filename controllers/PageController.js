const TaskModel = require('../models/TaskModel');
const UserModel = require('../models/UserModel');
const { todayInTimeZone } = require('../lib/date');

async function welcome(req, res, next) {
  try {
    const today = todayInTimeZone();
    const tasks = await TaskModel.getForDate(today);
    res.render('welcome', { pageTitle: 'Welcome', today, tasks });
  } catch (error) {
    next(error);
  }
}

async function tasks(req, res, next) {
  try {
    const allTasks = await TaskModel.getAll();
    res.render('tasks', { pageTitle: 'Task List', tasks: allTasks });
  } catch (error) {
    next(error);
  }
}

async function profile(req, res, next) {
  try {
    const user = await UserModel.getDemoUser();
    res.render('profile', { pageTitle: 'Profile', user });
  } catch (error) {
    next(error);
  }
}

function about(req, res) {
  res.render('about', { pageTitle: 'About' });
}

module.exports = { welcome, tasks, profile, about };

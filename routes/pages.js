const express = require('express');
const pages = require('../controllers/PageController');

const router = express.Router();

router.get('/', pages.welcome);
router.get('/tasks', pages.tasks);
router.get('/profile', pages.profile);
router.get('/about', pages.about);

module.exports = router;

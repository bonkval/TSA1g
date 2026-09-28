const express = require('express');
const path = require('node:path');
const pages = require('./routes/pages');

const app = express();
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));
app.use(pages);

app.use((req, res) => {
  res.status(404).send('Page not found');
});

app.use((error, req, res, next) => {
  console.error(error);
  res.status(500).send('Unable to load the page. Check the database connection.');
});

module.exports = app;

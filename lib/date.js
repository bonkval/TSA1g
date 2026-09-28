function todayInTimeZone(timeZone = process.env.APP_TIME_ZONE || 'Asia/Singapore') {
  return new Intl.DateTimeFormat('sv-SE', {
    timeZone,
    year: 'numeric',
    month: '2-digit',
    day: '2-digit'
  }).format(new Date());
}

module.exports = { todayInTimeZone };

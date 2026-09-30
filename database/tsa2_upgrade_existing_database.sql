-- TSA2 schema upgrade for an existing TSA1 Tasks for Today database.
-- Back up the database before importing this file. Import it only once.
-- Existing task and user rows are preserved. The demo user's password is
-- set to password123 using a PHP password_hash() value.

ALTER TABLE `users`
  ADD COLUMN `password` varchar(255) NOT NULL DEFAULT '';

ALTER TABLE `tasks`
  ADD COLUMN `is_archived` tinyint(1) NOT NULL DEFAULT 0;

UPDATE `users`
SET `password` = '$2y$10$GGLwt51Vhc2t4xOHDmhNS.xV0MPXJqDCkpvL7oxA2Y9eOqpT6k87m'
WHERE `username` = 'MrDemoGuy';

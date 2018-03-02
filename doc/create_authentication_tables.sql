###############################################################################
## Default MySQL tables for autentication purposes within template

# Database configuration for use with this authentication script
DROP TABLE IF EXISTS auth_api;
DROP TABLE IF EXISTS auth_access;
DROP TABLE IF EXISTS auth_session;
DROP TABLE IF EXISTS auth_user;
CREATE TABLE `auth_user` (
  `user` VARCHAR(45) NOT NULL,
  `fullname` VARCHAR(250) NULL,
  `first` VARCHAR(250) NULL,
  `last` VARCHAR(250) NULL,
  `department` VARCHAR(250) NULL,
  `session` TEXT NULL,
  `lastlogin` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT PK_auth_user PRIMARY KEY (user)
);

# Store Session IDs of successfully logged on instances
DROP TABLE IF EXISTS auth_session;
CREATE TABLE auth_session (
 `user` VARCHAR(45) NOT NULL,
 `id` VARCHAR(96) NOT NULL,
 `lastvisit` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 CONSTRAINT PK_auth_session PRIMARY KEY (id),
 CONSTRAINT FK_auth_session_user FOREIGN KEY(user)
  REFERENCES auth_user (user)
  ON DELETE CASCADE ON UPDATE CASCADE
);

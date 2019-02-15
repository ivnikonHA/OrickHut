USE oh;
CREATE TABLE categories (
  id              INT AUTO_INCREMENT PRIMARY KEY,
  category_name   CHAR(30)
);

CREATE TABLE lots (
  id              INT AUTO_INCREMENT PRIMARY KEY,
  lot_created     DATETIME,
  lot_name        CHAR(30),
  lot_description CHAR(100),
  lot_image       CHAR(30),
  lot_price       DECIMAL,
  lot_finished    DATETIME,
  lot_price_step  DECIMAL,
  lot_favorites   INT,
  user_id         INT,
  winner_id       INT,
  category_id     INT
);
CREATE INDEX lots_user_id ON lots(user_id);

CREATE TABLE bets (
  id              INT AUTO_INCREMENT PRIMARY KEY,
  bet_date        DATETIME,
  bet_price       DECIMAL,
  user_id         INT,
  lot_id          INT
);
CREATE INDEX bets_user_id ON bets(user_id);

CREATE TABLE users (
  id              INT AUTO_INCREMENT PRIMARY KEY,
  user_reg_date   DATETIME,
  user_email      CHAR(100),
  user_name       CHAR(100),
  user_password   CHAR(64),
  user_avatar     CHAR(100),
  user_contacts   CHAR(255)
);
CREATE UNIQUE INDEX user_email ON users(user_email);


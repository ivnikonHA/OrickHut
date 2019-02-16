USE oh;
-- Заполнение таблицы категорий
INSERT INTO categories (category_name) VALUES('Доски и лыжи');
INSERT INTO categories (category_name) VALUES('Крепления');
INSERT INTO categories (category_name) VALUES('Ботинки');
INSERT INTO categories (category_name) VALUES('Одежда');
INSERT INTO categories (category_name) VALUES('Инструменты');
INSERT INTO categories (category_name) VALUES('Разное');
-- Заполнение таблицы лотов
INSERT INTO lots (lot_created, lot_name, lot_description, lot_image, lot_price,
                  lot_finished, lot_price_step, lot_favorites, user_id,
                  winner_id, category_id)
  VALUES('2016-12-27 16:28:00', '2014 Rossignol District Snowboard',
      'No description', 'img/lot-1.jpg', 10999, NULL, 1, 0, 1, NULL, 1);
INSERT INTO lots (lot_created, lot_name, lot_description, lot_image, lot_price,
                  lot_finished, lot_price_step, lot_favorites, user_id,
                  winner_id, category_id)
  VALUES('2017-03-15 23:15:00', 'DC Ply Mens 2016/2017 Snowboard',
      'No description', 'img/lot-2.jpg', 15999, NULL, 1, 0, 1, NULL, 1);
INSERT INTO lots (lot_created, lot_name, lot_description, lot_image, lot_price,
                  lot_finished, lot_price_step, lot_favorites, user_id,
                  winner_id, category_id)
  VALUES('2017-06-11 13:19:00', 'Крепления Union Contact Pro 2015 года размер L/XL',
      'No description', 'img/lot-3.jpg', 8000, NULL, 1, 0, 1, NULL, 2);
INSERT INTO lots (lot_created, lot_name, lot_description, lot_image, lot_price,
                  lot_finished, lot_price_step, lot_favorites, user_id,
                  winner_id, category_id)
  VALUES('2018-06-28 19:36:00', 'Ботинки для сноуборда DC Mutiny Charocal',
      'No description', 'img/lot-4.jpg', 10999, NULL, 1, 0, 1, NULL, 3);
INSERT INTO lots (lot_created, lot_name, lot_description, lot_image, lot_price,
                  lot_finished, lot_price_step, lot_favorites, user_id,
                  winner_id, category_id)
  VALUES('2017-11-01 06:16:00', 'Куртка для сноуборда DC Mutiny Charocal',
      'No description', 'img/lot-5.jpg', 7500, NULL, 1, 0, 1, NULL, 4);
INSERT INTO lots (lot_created, lot_name, lot_description, lot_image, lot_price,
                  lot_finished, lot_price_step, lot_favorites, user_id,
                  winner_id, category_id)
  VALUES('2018-03-08 12:18:00', 'Маска Oakley Canopy',
      'No description', 'img/lot-6.jpg', 7500, NULL, 1, 0, 1, NULL, 6);
-- Заполнение таблицы ставок
INSERT INTO bets(bet_date, bet_price, user_id, lot_id)
  VALUES('2019-02-16 10:00:00', 9000, 2, 4);
INSERT INTO bets(bet_date, bet_price, user_id, lot_id)
  VALUES('2019-02-16 15:00:00', 9500, 3, 4);
-- Заполнение таблицы пользователей
INSERT INTO users(user_reg_date, user_email, user_name, user_password,
                  user_avatar, user_contacts)
  VALUES('1977-12-27 23:59:00', 'ivnikon@mail.ru', 'ivnikon', '12345',
          NULL, NULL);
INSERT INTO users(user_reg_date, user_email, user_name, user_password,
                  user_avatar, user_contacts)
  VALUES('2019-02-16 13:00:00', 'ignat.v@gmail.com', 'ignat.v', 'ugOGdVMi',
          NULL, NULL);
INSERT INTO users(user_reg_date, user_email, user_name, user_password,
                  user_avatar, user_contacts)
  VALUES('2019-02-16 14:00:00', 'kitty93@list.ru', 'kitty93', 'daecNazD',
          NULL, NULL);
INSERT INTO users(user_reg_date, user_email, user_name, user_password,
                  user_avatar, user_contacts)
  VALUES('2019-02-16 15:00:00', 'warrior07@mail.ru', 'warrior07', 'oixb3aL8',
          NULL, NULL);

-- Запросы

-- Получить все категории
SELECT * FROM categories;
-- Получить открытые лоты
SELECT lot_name, lot_price, lot_image, MAX(bet_price), COUNT(bets.lot_id), category_name
FROM lots
JOIN categories ON category_id = categories.id
JOIN bets ON lot_id = lots.id
WHERE lot_finished IS NULL
GROUP BY bets.lot_id;
-- Получить лот по ID
SELECT lot_name, lot_price, lot_image, category_name FROM lots
JOIN categories ON category_id = categories.id
WHERE lots.id = 3;
-- Обновить название лота по его идентификатору
UPDATE lots SET lot_name = 'New name' WHERE id = 2;
-- Получить список самых свежих ставок для лота по его id
SELECT bet_date, bet_price FROM bets
WHERE lot_id = 4
ORDER BY bet_date DESC;

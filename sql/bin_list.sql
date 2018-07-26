CREATE TABLE IF NOT EXISTS @TABLE_NAME@
(
ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  bin_number INT NOT NULL
COMMENT 'banking card first six number',
  virtual_pos_id INT NOT NULL
COMMENT 'Turk Pos POS ID',
  bank_name VARCHAR (255
) NOT NULL
COMMENT 'Bank name',
  dkk            TINYINT NOT NULL
COMMENT '1 ise Diğer Kredi Kartı SanalPos_ID si kullanılır
0 ise BIN, Sanal POS uyumu var. Kart markasına ait SanalPOS_ID den çekim yapılır.',
  card_type VARCHAR (50
) NOT NULL
COMMENT 'card type -> Debit or Credit card',
  date_add DATETIME NULL,
  date_upd DATETIME NULL
) ENGINE = innoDB DEFAULT CHARSET = utf8;
CREATE UNIQUE INDEX @TABLE_NAME@_bin_number_uindex
ON @TABLE_NAME@(bin_number);
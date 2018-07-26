CREATE TABLE IF NOT EXISTS @TABLE_NAME@
(
ID BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  guid VARCHAR (255
) NOT NULL,
  pos_id INT NOT NULL,
  order_id BIGINT,
  cart_id BIGINT NOT NULL,
  customer_id INT NOT NULL,
  currency_id INT NOT NULL,
  cart_hash VARCHAR (50
) NOT NULL,
  receipt_id VARCHAR (100
) COMMENT 'Dekont ID -> aynı zamanda transaction ID',
  process_id VARCHAR (100
) COMMENT 'işlem ID',
  order_process_id VARCHAR (100
) COMMENT '3D den donen post icindeki islem ID',
  process_status SMALLINT COMMENT 'hata kodlarını barındıdır 1 ile -215 arasındadır. 1 ise başarılı, -1 başarısız ve diğer sıfırdan küçük değerler hata...',
  process_status_msg VARCHAR (1024
) COMMENT 'işlem sonucu mesajı',
  card_owner VARCHAR (255
) NOT NULL,
  card_number VARCHAR (20
) NOT NULL,
  owner_gsm VARCHAR (15
),
  installment_number TINYINT NOT NULL COMMENT 'taksit sayısı',
  cart_amount DECIMAL (13, 2
) NOT NULL COMMENT 'işlem tutarı - sepet tutarı - ',
  total_amount DECIMAL (10, 2
) NOT NULL COMMENT 'komisyon dahil toplam tutar.',
  description VARCHAR (1024
),
  redirect_url VARCHAR (500
) NOT NULL,
  date_add DATETIME NULL,
  date_upd DATETIME NULL
) ENGINE = innoDB DEFAULT CHARSET = utf8;
---CREATE UNIQUE INDEX @TABLE_NAME@_receipt_id_uindex ON @TABLE_NAME@(receipt_id);
---CREATE UNIQUE INDEX @TABLE_NAME@_process_id_uindex ON @TABLE_NAME@(process_id);
CREATE INDEX @TABLE_NAME@_order_id_guid_index ON @TABLE_NAME@(order_id, guid);
ALTER TABLE @TABLE_NAME@ COMMENT = 'transactions...';
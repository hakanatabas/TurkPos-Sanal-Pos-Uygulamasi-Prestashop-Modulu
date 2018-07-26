CREATE TABLE IF NOT EXISTS @TABLE_NAME@
(
ID BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  error_code SMALLINT,
  error_msg VARCHAR (1024
),
  guid VARCHAR (255
) NOT NULL,
  cart_id VARCHAR (50
) NOT NULL,
  pos_id INT NOT NULL,
  process_id VARCHAR (100
),
  date_add DATETIME NULL,
  date_upd DATETIME NULL
) ENGINE = innoDB DEFAULT CHARSET = utf8;
CREATE INDEX @TABLE_NAME@_pos_id_guid_order_id_index ON @TABLE_NAME@(pos_id, guid, order_id);
ALTER TABLE @TABLE_NAME@ COMMENT = 'turk pos islem loglarını barındırır.';
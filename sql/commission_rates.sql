CREATE TABLE IF NOT EXISTS @TABLE_NAME@
(
ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  special_rate_sk_id INT NOT NULL
COMMENT 'Ozel_Oran_SK_ID',
  client_guid VARCHAR (255
) NOT NULL
COMMENT 'GUID',
  virtual_pos_id INT NOT NULL
COMMENT 'SanalPOS_ID',
  credit_card_brand VARCHAR (50
) NOT NULL
COMMENT 'Kredi_Karti_Banka -> kart markası',
  credit_card_brand_eng VARCHAR (50
) NOT NULL
COMMENT 'Kredi_Karti_Banka -> kart markası web gore ayarlı',
  card_brand_image VARCHAR (500
) NOT NULL
COMMENT 'Kredi_Karti_Banka_Gorsel',
  installment_rate_1 DECIMAL (10, 4
) NOT NULL
COMMENT 'Taksit komisyon oranları
MO_01',
  installment_rate_2 DECIMAL (10, 4
) NOT NULL
COMMENT 'Taksit komisyon oranları
MO_02',
  installment_rate_3 DECIMAL (10, 4
) NOT NULL
COMMENT 'Taksit komisyon oranları
MO_03',
  installment_rate_4 DECIMAL (10, 4
) NOT NULL
COMMENT 'Taksit komisyon oranları
MO_04',
  installment_rate_5 DECIMAL (10, 4
) NOT NULL
COMMENT 'Taksit komisyon oranları
MO_05',
  installment_rate_6 DECIMAL (10, 4
) NOT NULL
COMMENT 'Taksit komisyon oranları
MO_06',
  installment_rate_7 DECIMAL (10, 4
) NOT NULL
COMMENT 'Taksit komisyon oranları
MO_07',
  installment_rate_8 DECIMAL (10, 4
) NOT NULL
COMMENT 'Taksit komisyon oranları
MO_08',
  installment_rate_9 DECIMAL (10, 4
) NOT NULL
COMMENT 'Taksit komisyon oranları
MO_09',
  installment_rate_10 DECIMAL (10, 4
) NOT NULL
COMMENT 'Taksit komisyon oranları
MO_10',
  installment_rate_11 DECIMAL (10, 4
) NOT NULL
COMMENT 'Taksit komisyon oranları
MO_11',
  installment_rate_12 DECIMAL (10, 4
) NOT NULL
COMMENT 'Taksit komisyon oranları
MO_12',
  date_add DATETIME NULL,
  date_upd DATETIME NULL
) ENGINE = innoDB DEFAULT CHARSET = utf8;
ALTER TABLE @TABLE_NAME@
COMMENT = 'komisyon oranları';
CREATE INDEX @TABLE_NAME@_client_guid_virtual_pos_id_index ON @TABLE_NAME@(client_guid, virtual_pos_id);
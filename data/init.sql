CREATE DATABASE IF NOT EXISTS onlineshop;
USE onlineshop;

CREATE TABLE IF NOT EXISTS customers (
  customer_id int(11) NOT NULL AUTO_INCREMENT,
  firstname varchar(30) NOT NULL,
  lastname varchar(30) NOT NULL,
  email varchar(50) NOT NULL,
  pass varchar(50) NOT NULL,
  address1 varchar(100) NOT NULL,
  address2 varchar(100) NOT NULL,
  city VARCHAR(50) NOT NULL,
  country varchar(30) NOT NULL,
  eircode varchar(30) NOT NULL,
  PRIMARY KEY (customer_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS products (
  product_id int(11) NOT NULL AUTO_INCREMENT,
  product_name varchar(50) NOT NULL,
  product_brand varchar(50) NOT NULL,
  product_image varchar(255) NOT NULL,
  product_fullDesc text NOT NULL,
  product_cartDesc varchar(250) NOT NULL,
  product_serial varchar(50) NOT NULL,
  product_price float NOT NULL,
  product_stock int(4) DEFAULT NULL,
  PRIMARY KEY (product_id),
  UNIQUE KEY product_serial (product_serial)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS productcategories (
  cat_id int(11) NOT NULL AUTO_INCREMENT,
  category_name varchar(50) NOT NULL,
  product_id int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (cat_id),
  KEY FK1productserial (product_id),
  CONSTRAINT FK1productserial FOREIGN KEY (product_id) REFERENCES products (product_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS orders (
  order_id int(11) NOT NULL AUTO_INCREMENT,
  customer_id int(11) NOT NULL DEFAULT 0,
  product_id int(11) NOT NULL DEFAULT 0,
  order_qty int(11) NOT NULL DEFAULT 0,
  order_amount float NOT NULL DEFAULT 0,
  order_ship_name varchar(100) NOT NULL DEFAULT 0,
  order_ship_address varchar(100) NOT NULL DEFAULT 0,
  order_ship_address2 varchar(100) NOT NULL DEFAULT 0,
  order_email varchar(50) NOT NULL DEFAULT 0,
  order_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (order_id),
  KEY FKorder_customer (customer_id),
  KEY FK2order_product (product_id),
  CONSTRAINT FK2order_product FOREIGN KEY (product_id) REFERENCES products (product_id),
  CONSTRAINT FKorder_customer FOREIGN KEY (customer_id) REFERENCES customers (customer_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


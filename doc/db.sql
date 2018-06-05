drop table category;
drop table product;
CREATE TABLE category (
     id INT(11) NOT NULL AUTO_INCREMENT,
     name varchar(500) not null,
     parent_id INT(11),
     PRIMARY KEY (id)
);

CREATE TABLE product (
     id INT(11) NOT NULL AUTO_INCREMENT,
     category_id INT(11),
     name varchar(500) not null,
     link varchar(200) not null,
     description varchar(5000),
     specifications varchar(5000),
     features varchar(5000),
     detail varchar(5000),
     image varchar(200),
     document varchar(200),
     PRIMARY KEY (id)
);

alter table product ADD column title varchar(500);
alter table product ADD column meta_keywords varchar(5000);
alter table product ADD column meta_description varchar(5000);
alter table product ADD column intro varchar(5000);
ALTER TABLE product ADD CONSTRAINT product_name UNIQUE (name);

delete from category;
delete from product;

ALTER TABLE `product` ADD `new` TINYINT(2) NOT NULL DEFAULT '0' AFTER `meta_description`;

CREATE TABLE setting (
     id INT(11) NOT NULL AUTO_INCREMENT,
     field varchar(50) not null,
     value varchar(5000),
     PRIMARY KEY (id)
);

CREATE TABLE quote (
     id INT(11) NOT NULL AUTO_INCREMENT,
     subject varchar(500) not null,
     message varchar(5000) not null,
     name varchar(500),
     company varchar(500),
     address varchar(500),
     city varchar(200),
     province varchar(200),
     postal varchar(200),
     country varchar(200),
     phone varchar(200),
     fax varchar(200),
     email varchar(200),
     type varchar(500),
     PRIMARY KEY (id)
);
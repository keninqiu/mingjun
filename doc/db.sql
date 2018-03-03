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

ALTER TABLE product ADD CONSTRAINT product_name UNIQUE (name);

delete from category;
delete from product;
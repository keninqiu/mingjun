CREATE TABLE category (
     id INT(11) NOT NULL AUTO_INCREMENT,
     name varchar(50) not null,
     parent_id INT(11),
     PRIMARY KEY (id)
);

drop table product;
CREATE TABLE product (
     id INT(11) NOT NULL AUTO_INCREMENT,
     category_id INT(11),
     name varchar(50) not null,
     link varchar(200) not null,
     description varchar(200),
     specifications JSON,
     detail JSON,
     image varchar(200),
     document varchar(200),
     PRIMARY KEY (id)
);

delete from category;
delete from product;
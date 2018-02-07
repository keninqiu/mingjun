CREATE TABLE category (
     id INT(11) NOT NULL AUTO_INCREMENT,
     name varchar(50) not null,
     parent_id INT(11),
     PRIMARY KEY (id)
);
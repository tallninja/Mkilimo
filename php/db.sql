CREATE TABLE admin(
	uid int(2) PRIMARY KEY AUTO_INCREMENT NOT null,
    name varchar(100) NOT null,
    email varchar(128) NOT null,
    phone varchar(128) NOT null,
    pass varchar(20) NOT null
	
);

CREATE TABLE afya(
	uid int(22) PRIMARY KEY NOT null AUTO_INCREMENT,
    name varchar(128) NOT null,
    email varchar(128) NOT null,
	phone varchar(128) NOT null,
	ailment varchar(128)NOT null
);

CREATE TABLE kilimo(
	uid int(22) PRIMARY KEY NOT null AUTO_INCREMENT,
    name varchar(128) NOT null,
    email varchar(128) NOT null,
	phone varchar(128) NOT null
);

CREATE TABLE afyamessages (
    
	id int(255) PRIMARY KEY AUTO_INCREMENT NOT null,
    message varchar(1000) NOT null

);

DELIMITER $$
CREATE TRIGGER maxadmin BEFORE INSERT ON admin
FOR EACH ROW
BEGIN 
IF (SELECT COUNT(id) FROM mytable) > 3 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'You can store only 3 records.';
END IF;
END;
$$  


SET  @num := 0;

UPDATE kilimomessages SET id = @num := (@num+1);

ALTER TABLE kilimomessages AUTO_INCREMENT =1;


DELIMITER $$
CREATE TRIGGER maxadmin BEFORE INSERT ON admin
FOR EACH ROW
BEGIN 
IF (SELECT COUNT(id) FROM mytable) > 3 THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'You can store only 3 records.';
END IF;
END;
$$  

ALTER TABLE afya ADD firstname varchar(128) not NULL;
ALTER TABLE afya ADD lastname varchar(128) not NULL;
ALTER TABLE kilimo ADD firstname varchar(128) not NULL;
ALTER TABLE kilimo ADD lastname varchar(128) not NULL;
ALTER TABLE afya ADD date datetime not NULL;
ALTER TABLE kilimo ADD date datetime not NULL;



ALTER TABLE afya DROP ALL;
ALTER TABLE kilimo DROP ALL;

ALTER TABLE afya ADD firstname varchar(128) not NULL;
ALTER TABLE afya ADD lastname varchar(128) not NULL;
ALTER TABLE afya ADD username varchar(128) not NULL;
ALTER TABLE afya ADD email varchar(128) not NULL;
ALTER TABLE afya ADD phone varchar(128) not NULL;
ALTER TABLE afya ADD date datetime;

ALTER TABLE kilimo ADD firstname varchar(128) not NULL;
ALTER TABLE kilimo ADD lastname varchar(128) not NULL;
ALTER TABLE kilimo ADD username varchar(128) not NULL;
ALTER TABLE kilimo ADD email varchar(128) not NULL;
ALTER TABLE kilimo ADD phone varchar(128) not NULL;
ALTER TABLE kilimo ADD date datetime;

ALTER TABLE afya DROP firstname;
ALTER TABLE afya DROP lastname;
ALTER TABLE afya DROP username;
ALTER TABLE afya DROP email;
ALTER TABLE afya DROP phone;
ALTER TABLE afya DROP date;

ALTER TABLE kilimo DROP firstname;
ALTER TABLE kilimo DROP lastname;
ALTER TABLE kilimo DROP username;
ALTER TABLE kilimo DROP email;
ALTER TABLE kilimo DROP phone;
ALTER TABLE kilimo DROP date;


ALTER TABLE admin DROP uname;
ALTER TABLE admin DROP email;
ALTER TABLE admin DROP phone;
ALTER TABLE admin DROP pass;


ALTER TABLE admin ADD name varchar(128) not NULL;
ALTER TABLE admin ADD email varchar(128) not NULL;
ALTER TABLE admin ADD phone varchar(128) not NULL;
ALTER TABLE admin ADD pass varchar(255) not NULL;

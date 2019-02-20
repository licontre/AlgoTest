create database ALGOTEST;
create table ALGOTEST.USERS(
    ID      smallint unsigned not null auto_increment,
    NAME     varchar(70),
PRIMARY KEY(ID)) ENGINE=INNODB;

create table  ALGOTEST.CONECTIONS(
    ID      smallint unsigned not null auto_increment,
    INITIATOR smallint unsigned not null,
    RECEIVER smallint unsigned not null,
PRIMARY KEY(ID),
FOREIGN KEY(INITIATOR) REFERENCES ALGOTEST.USERS(ID),
FOREIGN KEY(RECEIVER) REFERENCES ALGOTEST.USERS(ID)
                     ) ENGINE=INNODB;

insert into ALGOTEST.USERS(NAME) values ('ADMIN');
insert into ALGOTEST.USERS(NAME) values ('test1');
insert into ALGOTEST.USERS(NAME) values ('test2');
insert into ALGOTEST.CONECTIONS(INITIATOR,RECEIVER) VALUES (2,3);
insert into ALGOTEST.CONECTIONS(INITIATOR,RECEIVER) VALUES (3,2);
insert into ALGOTEST.CONECTIONS(INITIATOR,RECEIVER) VALUES (1,2);
insert into ALGOTEST.CONECTIONS(INITIATOR,RECEIVER) VALUES (1,3);

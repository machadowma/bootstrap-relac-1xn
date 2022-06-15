create database relac1xn;
use relac1xn;
drop table if exists filho;
drop table if exists pai;

create table pai (
    id integer auto_increment primary key
    , nome varchar(50)
);

create table filho (
    id integer auto_increment primary key
    , nome varchar(50)
    , id_pai integer not null
    , foreign key(id_pai) references pai(id) on delete cascade
);




drop database if exists login;
create database login character set utf8 collate utf8_general_ci;
grant all on login.* to 'admin'@'localhost' identified by 'password';
use login;

create table login_database (
    username varchar(30) not null,
    password varchar(30) not null
)
# create database car_master_db;

use car_master_db;

create table client
(
    id int unsigned auto_increment primary key,
    name varchar(32) not null,
    surname varchar(32) not null,
    age int not null,
    phone_number int not null
);

create table company
(
    id int unsigned auto_increment primary key,
    name varchar(255) not null,
    email varchar(255) not null,
    website varchar(255) not null,
    about text not null
);

create table employee
(
    id int unsigned auto_increment primary key,
    name varchar(32) not null,
    surname varchar(32) not null,
    age int not null,
    salary float not null,
    specialization varchar(124) not null,
    company_id int unsigned
);

create table vehicle
(
    id int unsigned auto_increment primary key,
    brand varchar(150) not null,
    model varchar(150) not null,
    color varchar(150) not null,
    release_date date not null,
    state_number varchar(25) not null,
    mileage int not null,
    vin_code varchar(17) not null,
    client_id int unsigned
);

create table car_part
(
    id int unsigned auto_increment primary key,
    name varchar(255) not null,
    number int not null,
    price float not null,
    description text not null,
    part_condition varchar(150) not null,
    added_date date not null,
    manufacturer varchar(150)
);

create table company_employees
(
    company_id int unsigned,
    employee_id int unsigned
);

alter table employee add foreign key (company_id) references company(id);
alter table vehicle add foreign key (client_id) references  client(id);
alter table company_employees add foreign key (company_id) references company(id);
alter table company_employees add foreign key (employee_id) references employee(id);
# create database car_master_db;

use car_master_db;

CREATE TABLE employee (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(255),
                          surname VARCHAR(255),
                          age INT,
                          salary FLOAT,
                          specialization VARCHAR(255),
                          company_id INT,
                          FOREIGN KEY (company_id) REFERENCES company(id)
);

CREATE TABLE company (
                         id INT AUTO_INCREMENT PRIMARY KEY,
                         name VARCHAR(255),
                         email VARCHAR(255),
                         website VARCHAR(255),
                         about TEXT
);

create table car (
                     id int auto_increment primary key,
                     brand varchar(150),
                     model varchar(150),
                     vin_code varchar(150),
                     client_id int
);

create table client (
                        id int auto_increment primary key,
                        name varchar(150),
                        surname varchar(150)
);

create table part (
                      id int auto_increment primary key,
                      name varchar(150),
                      price float
);

create table service_order (
                               id int auto_increment primary key,
                               service_number int not null,
                               car_id int not null,
                               part_id int not null,
                               work_hours int not null,
                               foreign key (car_id) references car(id),
                               foreign key (part_id) references part(id)
);



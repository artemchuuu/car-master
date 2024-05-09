use db;

create table carOwners
(
    id int unsigned auto_increment primary key,
    name varchar(32),
    surname varchar(32),
    email varchar(100),
    age int,
    phoneNumber varchar(20),
    index (id)
);

create table cars
(
    id int unsigned auto_increment primary key,
    brand varchar(32),
    model varchar(32),
    color varchar(32),
    stateNumber varchar(32),
    mileage int,
    vinCode char(17),
    releaseDate date,
    owner_id int unsigned,
    FOREIGN KEY (owner_id) references carOwners(id),
    index (owner_id),
    index (vinCode)
);

create table employees
(
    id int unsigned auto_increment primary key,
    name varchar(32),
    surname varchar(32),
    age int,
    salary float
);

create table servicing
(
    id int unsigned auto_increment primary key,
    owner_id int unsigned,
    employee_id int unsigned,
    car_id int unsigned,
    FOREIGN KEY (owner_id) references carOwners(id),
    FOREIGN KEY (employee_id) references employees(id),
    FOREIGN KEY (car_id)  references cars(id)
);

create table CarOwners_Cars (
    owner_id int unsigned,
    car_id int unsigned,
    primary key (owner_id, car_id),
    foreign key (owner_id) references carOwners(id),
    foreign key (car_id) references cars(id)
);

explain
select cars.*, carOwners.name, carOwners.surname
from cars
join carOwners on cars.owner_id = carOwners.id
where cars.vinCode = '2GKALMEK9FJ202605'
group by cars.id, carOwners.name, carOwners.surname;
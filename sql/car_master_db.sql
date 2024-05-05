USE car_master_db;


# В нас є таблиця carOwners в якій зберігаються наші власники автівок або клієнти
# Далі, в таблиці cars зберігаються автівки. Авто може мати одного клієнта, а наш клієнт
# (або власник авто) може мати декілька машин

# В таблиці employees зберігаються наші співробітники.


# А в таблиці servicing зберігаються одразу айдішники власника авто, робітника і айді авто.
# Співробітники можуть обслуговувати декілька машин

create table carOwners
(
    id int unsigned auto_increment primary key,
    name varchar(32),
    surname varchar(32),
    email varchar(100),
    age int,
    phoneNumber varchar(20)
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
    owner_id int unsigned
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
    car_id int unsigned
);

alter table cars add
    FOREIGN KEY (owner_id) references carOwners(id);

alter table servicing add
    FOREIGN KEY (owner_id) references carOwners(id);

alter table servicing add
    FOREIGN KEY (employee_id) references employees(id);

alter table servicing add
    FOREIGN KEY (car_id)  references cars(id);
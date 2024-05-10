# create database sql_query_fix;
# use sql_query_fix;

# ВИКОНАТИ НАСТУПНИЙ СКРИПТ:

create table if not exists author
(
    id int unsigned auto_increment
    primary key,
    first_name varchar(50) not null,
    last_name  varchar(50) not null,
    index(first_name),
    index(last_name)
    );

create table if not exists book
(
    id int unsigned auto_increment primary key,
    name      varchar(50)                                                                                              not null,
    isbn10    char(13)                                                                                                 not null,
    author_id int unsigned                                                                                             not null,
    index(author_id),
    foreign key (author_id) references author(id)
    );

INSERT IGNORE INTO author (id, first_name, last_name) VALUES (1675, 'Zaria', 'Barton');

INSERT IGNORE INTO book (id, name, isbn10, author_id) VALUES (3326, 'Est aperiam.', '8830161489', 1675);
INSERT IGNORE INTO book (id, name, isbn10, author_id) VALUES (3327, 'Accusantium quia.', '3679509375', 1675);
INSERT IGNORE INTO book (id, name, isbn10, author_id) VALUES (8649, 'Tempora dolores et.', '0797121986', 1675);
INSERT IGNORE INTO book (id, name, isbn10, author_id) VALUES (22943, 'Occaecati aut in.', '7482383522',  1675);
INSERT IGNORE INTO book (id, name, isbn10, author_id) VALUES (24583, 'Quidem facilis odit.', '4758194009', 1675);
INSERT IGNORE INTO book (id, name, isbn10, author_id) VALUES (25146, 'Voluptates ut.', '2154230628', 1675);
INSERT IGNORE INTO book (id, name, isbn10, author_id) VALUES (25310, 'Et iusto facere vel.', '9573912252', 1675);
INSERT IGNORE INTO book (id, name, isbn10, author_id) VALUES (27888, 'Magni et ut.', '1667543172', 1675);


# ОПИС: Запит підраховує кількість книг для автора  "Zaria Barton"
#
# ЗАВДАННЯ:
# 1. Виправити помилку в запиті, бо зараз кількість книг невірна
# 2. Оптимізувати запит через використання індексів, позбутись підзапиту.
#
# НА ВИХОДІ має бути новий SQL-файл з додаванням індексів для потрібних колонок та оптимізованим запитом,
# що видає правильну кількість книг для цього автора.
#

explain
select author.id, author.first_name, author.last_name, COUNT(book.id) as book_count
from author
left join book on author.id = book.author_id
where author.first_name = 'Zaria' and author.last_name = 'Barton'
group by author.id, author.first_name, author.last_name;
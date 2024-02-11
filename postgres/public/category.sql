create table category
(
    id_category   serial
        constraint category_pk
            primary key,
    category_name varchar(50) not null
);

alter table category
    owner to docker;


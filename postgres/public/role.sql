create table role
(
    id_role serial
        constraint role_pk
            primary key,
    role    varchar(100) not null
);

alter table role
    owner to docker;


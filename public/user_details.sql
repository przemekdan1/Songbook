create table user_details
(
    id_user_details integer not null
        constraint user_details_pk
            primary key,
    name            varchar(100),
    surname         varchar(100),
    phone           varchar(10)
);

alter table user_details
    owner to docker;


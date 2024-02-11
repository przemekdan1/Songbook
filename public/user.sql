create table "user"
(
    id_user  integer generated always as identity
        constraint id
            primary key,
    email    varchar(250)      not null,
    password varchar(255)      not null,
    id_role  integer default 2 not null
        constraint user_role_id_role_fk
            references role
            on update cascade on delete cascade
);

alter table "user"
    owner to docker;

create trigger beforeuserinsert
    before insert
    on "user"
    for each row
execute procedure create_user_details();


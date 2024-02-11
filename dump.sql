create sequence projects_id_project_seq
    as integer;

alter sequence projects_id_project_seq owner to docker;

create sequence a;

alter sequence a owner to docker;

create sequence user_id_user_seq
    as integer
    maxvalue 100;

alter sequence user_id_user_seq owner to docker;

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

create table category
(
    id_category   serial
        constraint category_pk
            primary key,
    category_name varchar(50) not null
);

alter table category
    owner to docker;

create table role
(
    id_role serial
        constraint role_pk
            primary key,
    role    varchar(100) not null
);

alter table role
    owner to docker;

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

alter sequence a owned by "user".id_user;

create table artists
(
    id_artist   serial
        constraint artists_pk
            primary key,
    artist_name varchar(100) not null
);

alter table artists
    owner to docker;

create table projects
(
    id_song        integer default nextval('projects_id_project_seq'::regclass) not null
        constraint projects_pk
            primary key,
    title          varchar(100)                                                 not null,
    description    text,
    "like"         integer default 0,
    dislike        integer default 1,
    created_at     date,
    id_assigned_by integer                                                      not null
        constraint projects_users_id_fk
            references "user"
            on update cascade on delete cascade,
    image          varchar(255),
    id_artist      integer
        constraint projects_artists_id_artist_fk
            references artists
            on update cascade on delete cascade,
    id_category    integer
        constraint projects_category_id_category_fk
            references category
            on update cascade on delete cascade,
    content        varchar(4000)
);

alter table projects
    owner to docker;

alter sequence projects_id_project_seq owned by projects.id_song;

create table users_project
(
    id_user    integer not null
        constraint users_project_users_id_fk
            references "user"
            on update cascade on delete cascade,
    id_project integer not null
        constraint users_project_projects_id_project_fk
            references projects
            on update cascade on delete cascade
);

alter table users_project
    owner to docker;

create view vsong_informations(title, artist_name, category_name, id_song) as
SELECT projects.title,
       artists.artist_name,
       category.category_name,
       projects.id_song
FROM projects
         JOIN artists ON projects.id_artist = artists.id_artist
         JOIN category ON projects.id_category = category.id_category;

alter table vsong_informations
    owner to docker;

create function create_user_details() returns trigger
    language plpgsql
as
$$
BEGIN
    NEW.id_user = nextval('user_details_id_user_details_seq');
    INSERT INTO user_details (id_user, name, surname, phone) 
    VALUES (NEW.id_user, NULL, NULL, NULL);
    RETURN NEW;
END;
$$;

alter function create_user_details() owner to docker;

create trigger beforeuserinsert
    before insert
    on "user"
    for each row
execute procedure create_user_details();



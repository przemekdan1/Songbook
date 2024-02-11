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


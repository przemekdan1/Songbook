create table artists
(
    id_artist   serial
        constraint artists_pk
            primary key,
    artist_name varchar(100) not null
);

alter table artists
    owner to docker;


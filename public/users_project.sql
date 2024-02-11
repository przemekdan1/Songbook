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


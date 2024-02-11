create sequence projects_id_project_seq
    as integer;

alter sequence projects_id_project_seq owner to docker;

alter sequence projects_id_project_seq owned by projects.id_song;


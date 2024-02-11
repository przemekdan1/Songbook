create sequence a;

alter sequence a owner to docker;

alter sequence a owned by "user".id_user;


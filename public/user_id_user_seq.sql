create sequence user_id_user_seq
    as integer
    maxvalue 100;

alter sequence user_id_user_seq owner to docker;


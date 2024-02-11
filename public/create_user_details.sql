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


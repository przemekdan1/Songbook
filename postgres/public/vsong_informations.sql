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


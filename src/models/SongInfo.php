<?php

namespace models;

class SongInfo
{
    private $title;
    private $artist_name;
    private $category_name;
    private $id_song;



    public function __construct($title, $artist_name, $category_name, $id_song)
    {
        $this->title = $title;
        $this->artist_name = $artist_name;
        $this->category_name = $category_name;
        $this->id_song = $id_song;
    }


    public function getTitle()
    {
        return $this->title;
    }


    public function setTitle($title): void
    {
        $this->title = $title;
    }


    public function getArtistName()
    {
        return $this->artist_name;
    }


    public function setArtistName($artist_name): void
    {
        $this->artist_name = $artist_name;
    }


    public function getCategoryName()
    {
        return $this->category_name;
    }

    public function setCategoryName($category_name): void
    {
        $this->category_name = $category_name;
    }


    public function getIdSong()
    {
        return $this->id_song;
    }

    public function setIdSong($id_song): void
    {
        $this->id_song = $id_song;
    }





}
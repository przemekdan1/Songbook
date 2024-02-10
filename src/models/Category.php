<?php

namespace models;

class Category {
    private $id_category;
    private $category_name;

    public function __construct($id_category, $category_name)
    {
        $this->id_category = $id_category;
        $this->category_name = $category_name;
    }


    public function getIdCategory()
    {
        return $this->id_category;
    }


    public function setIdCategory($id_category): void
    {
        $this->id_category = $id_category;
    }

    public function getCategoryName()
    {
        return $this->category_name;
    }

    public function setCategoryName($category_name): void
    {
        $this->category_name = $category_name;
    }


}
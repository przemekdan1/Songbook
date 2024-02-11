<?php

namespace repository;
use DateTime;
use models;
use PDO;
use Repository;

require_once 'Repository.php';
require_once __DIR__.'/../models/Category.php';
require_once __DIR__.'/../models/SongInfo.php';


class ProjectRepository extends Repository
{
    public function getProject(int $idProject): ?models\Project
    {
        $statement = $this->database->connect()->prepare('
        SELECT * FROM public.projects WHERE id = :id');

        $statement->bindParam(':id', $idProject, PDO::PARAM_INT);
        $statement->execute();

        $project = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$project) {
            return null;
        }

        return new \models\Project(
            $project['title'],
            $project['id_artist'],
            $project['image'],
        );
    }

    public function addProject(models\Project $project): void
    {
        $date = new DateTime();
        $statement = $this->database->connect()->prepare('
        INSERT INTO public.projects (title, description, created_at, id_assigned_by, image) 
        VALUES (?, ?, ?, ?, ?)
        ');

        //TODO: downoad user id from session
        $id_assigned_by = 1;
        $statement->execute([
            $project->getTitle(),
            $project->getDescription(),
            $date->format('Y-m-d'),
            $id_assigned_by,
            $project->getImage()
        ]);
    }

    public function getProjects(): array
    {
        $result = [];

        $statement = $this->database->connect()->prepare('
            SELECT * FROM vsong_informations
        ');
        $statement->execute();
        $projects = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($projects as $project) {
            $result[] = new models\SongInfo(
                $project['title'],
                $project['artist_name'],
                $project['category_name'],
                $project['id_song']
            );
        }

        return $result;
    }

    public function getCategories(): array
    {
        $result = [];

        $statement = $this->database->connect()->prepare('
            SELECT * FROM category
        ');
        $statement->execute();
        $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($categories as $category) {
            $result[] = new models\Category(
                $category['id_category'],
                $category['category_name']
            );
        }

        return $result;
    }

    public function getProjectsByTitle(string $searchString)
    {
        $searchString = '%'.strtolower($searchString).'%';

        $statement = $this->database->connect()->prepare('
        SELECT * FROM vsong_informations WHERE LOWER(title) LIKE :search OR LOWER(artist_name) LIKE :search OR LOWER(category_name) LIKE :search
        ');
        $statement->bindParam(':search',$searchString,PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function like(int $id){
        $statement = $this->database->connect()->prepare('
            UPDATE projects SET "like" = "like" + 1 WHERE id_project = :id
        ');

        $statement->bindParam(':id',$id,PDO::PARAM_INT);
        $statement->execute();
    }
    public function dislike(int $id){
        $statement = $this->database->connect()->prepare('
            UPDATE projects SET "dislike" = "dislike" + 1 WHERE id_project = :id
        ');

        $statement->bindParam(':id',$id,PDO::PARAM_INT);
        $statement->execute();
    }

}
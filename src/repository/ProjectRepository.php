<?php

namespace repository;
use DateTime;
use models;
use PDO;
use Repository;

require_once 'Repository.php';
require_once __DIR__ . '/../models/Project.php';

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
            $project['description'],
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
            SELECT * FROM projects
        ');
        $statement->execute();
        $projects = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($projects as $project) {
            $result[] = new models\Project(
                $project['title'],
                $project['description'],
                $project['image']
            );
        }

        return $result;
    }

    public function getProjectsByTitle(string $searchString)
    {
        $searchString = '%'.strtolower($searchString).'%';

        $statement = $this->database->connect()->prepare('
            SELECT * FROM projects WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search
        ');
        $statement->bindParam(':search',$searchString,PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}
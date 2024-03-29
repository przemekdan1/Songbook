<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Project.php';
require_once __DIR__.'/../repository/ProjectRepository.php';
class ProjectController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png','image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    private $messages = [];
    private $projectRepository;

    private function validate($file) : bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'File type is not supported.';
            return false;
        }
        return true;
    }


    public function __construct()
    {
        parent::__construct();
        $this->projectRepository = new repository\ProjectRepository();
    }

    public function projects()
    {
        if($this->isSession())
        {
            header('Location: /index');
        }
        $projects = $this->projectRepository->getProjects();
        $categories = $this->projectRepository->getCategories();
        $this->render('projects',['projects'=>$projects,'categories'=>$categories]);
    }


    public function addProjects()
    {
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file']))
        {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $project = new \models\Project($_POST['title'], $_POST['description'], $_FILES['file']['name']);
            $this->projectRepository->addProject($project);

            return $this->render("projects",['messages' => $this->messages, 'projects'=>$this->projectRepository->getProjects()]);
        }
        $this->render("addProjects",['messages' => $this->messages]);
    }

    public function search()
    {

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->projectRepository->getProjectsByTitle($decoded['search']));
        }
    }

    public function like (int $id)
    {
        $this->projectRepository->like($id);
        http_response_code(200);
    }
    public function dislike (int $id)
    {
        $this->projectRepository->dislike($id);
        http_response_code(200);
    }


    public function showSong()
    {
        if($this->isSession())
        {
            header('Location: /index');
        }
        $this->render("showSong");
    }
    public function profile()
    {
        if($this->isSession())
        {
            header('Location: /index');
        }
        $projects = $this->projectRepository->getProjects();
        $this->render("profilePage", ['projects' => $projects]);
    }
    public function profileSettings()
    {
        if($this->isSession())
        {
            header('Location: /index');
        }
        $this->render("profileSettings");
    }
    public function admin()
    {
        if($this->isSession())
        {
            header('Location: /index');
        }
        $this->render("adminPanel");
    }


}
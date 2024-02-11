<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
class SecurityController extends AppController
{
    private $userRepository;

    public function login()
    {
        if($this->isSession())
        {
            header('Location: /index');
        }

        $userRepository = new UserRepository();



        if(!$this->isPost())
        {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];


        $user = $userRepository->getUser($email);
        if(!$user)
        {
            return $this->render('login',['messages'=>['User not exist']]);
        }
        if($user->getEmail() !== $email)
        {
            return $this->render('login',['messages'=>['User with this email not exist']]);
        }

        if($user->getPassword() !== $password)
        {
            return $this->render('login',['messages'=>['Wrong password']]);
        }
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/projects");
    }


    public function register()
    {
        if($this->isSession())
        {
            header('Location: /index');
        }

        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];


        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }


        $user = new models\User($email, md5($password));


        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);


    }
    public function logout()
    {
        session_start();
        session_unset();
        header('Location: /index');
    }

}
<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
class UserRepository extends Repository
{
    public function getUser(string $email): ?models\User
    {
        $statement = $this->database->connect()->prepare('
        SELECT * FROM public.user WHERE email = :email');

        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if(!$user)
        {
            return null;
        }

        return new \models\User(
            $user['email'],
            $user['password'],
        );
    }

    public function addUser(models\User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."user" (email, password)
            VALUES (?, ?)
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
        ]);
    }

}
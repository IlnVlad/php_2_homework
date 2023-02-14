<?php

namespace GeekBrains\LevelTwo\Blog\UsersRepositories;

use GeekBrains\LevelTwo\Blog\User;
use PDO;

class SqliteUsersRepository
{
    public function __construct(
        private PDO $connection
    ) {
    }
    public function save(User $user): void
    {
        //подготовка запроса
        $statment = $this->connection->prepare(
            'INSERT INTO users (first_name, last_name, login) VALUES (:first_name, :last_name, :login)'
        );
        $statment->execute([
            ':first_name' => $user->name()->first(),
            ':last_name' => $user->name()->last(),
        ]);
    }
}

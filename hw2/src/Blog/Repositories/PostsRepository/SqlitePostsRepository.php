<?php

namespace GeekBrains\LevelTwo\Blog\Repositories\PostsRepository;

use GeekBrains\LevelTwo\Blog\Exceptions\InvalidArgumentException;
use GeekBrains\LevelTwo\Blog\Exceptions\UserNotFoundException;
use GeekBrains\LevelTwo\Blog\Post;
use GeekBrains\LevelTwo\Blog\User;
use GeekBrains\LevelTwo\Blog\UUID;
use GeekBrains\LevelTwo\Person\Name;
use \PDO;
use \PDOStatement;


class SqlitePostsRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Post $post): void
    {

        // Подготавливаем запрос
        $statement = $this->connection->prepare(
            'INSERT INTO posts (uuid, author_uuid, title, text) 
VALUES (:uuid, :author_uuid, :title, :text)'

        );
        // Выполняем запрос с конкретными значениями
        $statement->execute([
            ':uuid' => $post->uuid(),
            ':author_uuid' => $post->getUser()->uuid(),
            ':title' => $post->getTitle(),
            ':text' => $post->getText(),
        ]);
    }
}

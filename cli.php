<?php

use GeekBrains\LevelTwo\Blog\User;
use GeekBrains\LevelTwo\Person\{Name, Person};
use GeekBrains\LevelTwo\Blog\Post;
use GeekBrains\LevelTwo\Blog\Repositories\InMemoryUsersRepository;
use GeekBrains\LevelTwo\Blog\Exceptions\UserNotFoundException;
use GeekBrains\LevelTwo\Blog\UsersRepositories\SqliteUsersRepository;

include __DIR__ . "/vendor/autoload.php";

//создвем объект репозтория
$connection = new PDO('sqlite:' . __DIR__ . '/db.sqlite');
$userRepository = new SqliteUsersRepository($connection);

//добавляем в репозиторий несколько пользователей
$userRepository->save(new User(123, new Name('Ivan', 'Nikitin'), 'ivanVld'));
$userRepository->save(new User(321, new Name('Vlad', 'Ilnitsky'), 'ilnvladand'));

$name = new Name('Peter', 'Sidorov');
$person = new Person($name, new DateTimeImmutable());


$post = new Post(
    1,
    $person,
    'Всем привет!'
);

echo $post;

$name2 = new Name('Иван', 'Таранов');
$user2 = new User(2, $name2, "User");
$userRepository = new InMemoryUsersRepository();
try {
    $userRepository->save($user);
    $userRepository->save($user2);


    echo $userRepository->get(1);
    echo $userRepository->get(2);
    echo $userRepository->get(3);
} catch (UserNotFoundException | Exception $e) {
    echo $e->getMessage();
}

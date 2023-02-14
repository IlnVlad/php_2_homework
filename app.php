<?php

use GeekBrains\LevelTwo\Blog\Comment;
use GeekBrains\LevelTwo\Blog\Post;
use GeekBrains\LevelTwo\Blog\User;
use GeekBrains\LevelTwo\Blog\UUID;
use GeekBrains\LevelTwo\Person\{Name};

include __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/cli.php";


$faker = Faker\Factory::create('ru_RU');
$name = new Name(
    $faker->firstName('female'),
    $faker->lastName('female')
);
$user = new User(
    $uuid = UUID::random(),
    $name,
    $faker->sentence(1)
);

$route = $argv[1] ?? null;

switch ($route) {
    case "user":
        echo $user;
        break;

    case "post":
        $post = new Post(
            $uuid = UUID::random(),
            $user,
            $faker->realText(20),
            $faker->realText(rand(50, 100))
        );
        $postRepository->save($post);
        break;

    case "comment":
        $post = new Post(
            $uuid = UUID::random(),
            $user,
            $faker->realText(20),
            $faker->realText(rand(50, 100))
        );
        $comment = new Comment(
            $uuid = UUID::random(),
            $user,
            $post,
            $faker->realText(rand(50, 100))
        );
        $commentRepository->save($comment);
        break;

    default:
        echo "error try user post comment parametr";
}

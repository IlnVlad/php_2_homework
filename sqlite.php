<?php

//Создаём объект подключения к SQLite
$connection = new PDO('sqlite:' . __DIR__ . '/db.sqlite');
//Вставляем строку в таблицу пользователей
$connection->exec(
    "INSERT INTO users (first_name, last_name, lohin) VALUES ('Ivan', 'Nikitin')"
);

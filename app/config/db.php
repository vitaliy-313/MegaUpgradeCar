<?php

const CONFIG_CONNECTION = [
    "host" => "localhost",
    "dbname" => "tuningmuc3",
    "login" => "root",
    "password" => "",
    "options" => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    ],

];

<?php

$connect = mysqli_connect("localhost", "sarrah", "Qwerty@12345", "recipeDB");

mysqli_set_charset($connect, 'UTF8');

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

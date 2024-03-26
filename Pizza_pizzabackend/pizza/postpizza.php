<?php

//$azon=$_POST["azon"];
$nev = $_POST["pnev"];
$ar = $_POST["par"];
require_once("./databaseconnect.php");
$sql = 'INSERT INTO pizza(pazon, pnev, par) VALUES (NULL,?,?)';
$stmt = $connection->prepare($sql);
$stmt->bind_param("si", $nev, $ar);
if ($stmt->execute()) {
    http_response_code(201);
    echo 'Sikeresen hozzáadva';
} else {
    http_response_code(404);
    echo 'Sikertelen hozzáadás!';
}



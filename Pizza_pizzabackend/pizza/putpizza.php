<?php

$putdata = fopen("php://input", "r");
$raw_data= '';
while($chuck = fread($putdata, 1024))
    $raw_data .= $chuck;

fclose($putdata);
//$azon=$_POST["azon"];
$adatJSON = json_decode($raw_data);
$pazon = $adatJSON->pazon;
$pnev = $adatJSON->pnev;
$par = $adatJSON->par;
require_once("./databaseconnect.php");
$sql = 'UPDATE pizza SET pnev=?, par=? WHERE pazon=?';
$stmt = $connection->prepare($sql);
$stmt->bind_param("sii", $pnev, $par, $pazon);
if ($stmt->execute()) {
    http_response_code(201);
    echo 'Sikeresen update';
} else {
    http_response_code(404);
    echo 'Sikertelen update!';
}

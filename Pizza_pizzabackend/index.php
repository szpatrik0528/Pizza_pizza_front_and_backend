<?php

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');

/* fogadja az url kéréseket és megválaszolja azokat
  GET http://localhost/Pizza_pizzabackend/index.php?pizza -> minden vevő
  GET http://localhost/Pizza_pizzabackend/index.php?pizza/{id} -> adott ügyfél
  POST http://localhost/Pizza_pizzabackend/index.php?pizza -> létrehoz vevőt
  PUT http://localhost/Pizza_pizzabackend/index.php?pizza/{id} -> modosit adott vevot
  DELETE http://localhost/Pizza_pizzabackend/index.php?pizza/{id} -> torol adott vevot
 */

$keresSzoveg = explode('/', $_SERVER['QUERY_STRING']);
if($keresSzoveg[0] === "pizza"){
    require_once 'pizza/index.php';
} else{
    http_response_code(404);
    $errorJson = array("message" => "Nincs ilyen api!");
    return json_encode($errorJson);
}

<?php


/*$valasz = array("code"=>$keresSzoveg[1]);
echo json_encode($valasz);
die();*/
// osszes ugyfel adatai json-ben
if (count($keresSzoveg) > 0) {
    
        $sql = 'DELETE FROM pizza WHERE pazon=' . $keresSzoveg[1];
        var_dump($sql);
}else {
        http_response_code(404);
        echo "Nem létező vevő!";

}
require_once './databaseconnect.php';

if ($result = $connection->query($sql)) {
    http_response_code(200);
    echo 'Sikeres törlés!';
} else {
    http_response_code(404);
    echo 'Sikertelen törlés!';
}   

<?php
require '../vendor/autoload.php';
use App\DataBase\MyDB;
use  App\Models\Client;

$DB = new MyDB();
$clientBDD = $DB->query('SELECT * FROM client')->fetchAll(\PDO::FETCH_ASSOC);
$clients = array();
foreach($clientBDD as $client)
{
    array_push($clients, new Client($client));
}
$DB->closeDB();
?>
<html>
    <head>
        <title>Liste des articles</title>
        <link rel="stylesheet" type="text/css" href="/assets/css/index.css">
    </head>
    <body>
        <div>
        </div>
    </body>
</html>
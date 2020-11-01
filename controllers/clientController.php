<?php
require_once('../include/MyDB.php');
require_once('../models/Client.php');

$DB = new MyDB();
$clientBDD = $DB->query('SELECT * FROM client')->fetchAll(PDO::FETCH_ASSOC);
$clients = array();
foreach($clientBDD as $client)
{
    array_push($clients, new Client($client));
}
?>
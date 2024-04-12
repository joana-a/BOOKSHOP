<?php
// define("servername","localhost");
// define("username","root");
// define("password","");
// define("database", "joslibraryy");

$connectionstring= getenv("AZURE_MYSQL_CONNECT");

// $connectionstring= env('AZURE_MYSQL_CONNECT');
$user = $_ENV["AZURE_MYSQL_USER"];
$password = $_ENV["AZURE_MYSQL_PASSWORD"];
$host = $_ENV["AZURE_MYSQL_HOST"];
$database = $_ENV["AZURE_MYSQL_DATABASE"];

echo $user;

$mysqli = new mysqli($host, $user, $password, $database);
// $mysqli= new mysqli(getenv("AZURE_MYSQL_HOST"), getenv("AZURE_MYSQL_USERNAME"), getenv("AZURE_MYSQL_PASSWORD"), getenv("AZURE_MYSQL_DBNAME"));

if ($mysqli->connect_error) {
    echo("Connection failed: ". $mysqli->connect_error);
    die();
}
<?php
// define("servername","localhost");
// define("username","root");
// define("password","");
// define("database", "joslibraryy");

$connectionstring= getenv("AZURE_MYSQL_CONNECT");

// $connectionstring= env('AZURE_MYSQL_CONNECT');

$mysqli= new mysqli(getenv("AZURE_MYSQL_HOST"), getenv("AZURE_MYSQL_USERNAME"), getenv("AZURE_MYSQL_PASSWORD"), getenv("AZURE_MYSQL_DBNAME"));

if ($mysqli->connect_error) {
    echo("Connection failed: ". $mysqli->connect_error);
    die();
}
<?php

$DB_CONNECTION = "mysql";
$DB_HOST = "localhost";
$DB_PORT = "3306";
$DB_DATABASE = "balidosodb";
$DB_USERNAME = "root";
$DB_PASSWORD = "";

$connection = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
if (!$connection)
{
   die("Cannot connect: ".mysqli_connect_error());
}
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "sre_upnvy";

$db = new mysqli($host, $user, $password, $database);

if ($db->connect_error){
    die("Koneksi Database Gagal : " . $db->connect_error);
}
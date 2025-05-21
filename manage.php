<?php
require_once("settings.php");

$conn = mysqli_connect($host, $user, $pwd, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
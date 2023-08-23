<?php
const SERVER = "localhost";
const USER = "root";
const PASSWORD = "";
const DATA_BASE = "brogui";
const CONFIG = "mysql:host=" . SERVER . ";dbname=" . DATA_BASE . ";charset=utf8;";

try {
    $conn = new PDO(CONFIG, USER, PASSWORD);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage());
}

function mensagem($msg)
{
    echo "<script>alert('{$msg}');history.back();</script>";
    exit;
}

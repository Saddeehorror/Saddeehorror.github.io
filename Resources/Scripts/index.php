<?php
session_start();
require_once './Conect.php';
if (isset($_SESSION["session_username"])) {
    header("Location: ./Home.php");
}
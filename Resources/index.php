<?php
session_start();
require_once 'Scripts/Conect.php';
if (isset($_SESSION["session_username"])) {
    header("Location: Scripts/Home.php");
}
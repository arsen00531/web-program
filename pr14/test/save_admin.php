<?php
require_once "model.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["admin_name"] ?? "");
    $pass = $_POST["admin_pass"] ?? "";
    if ($name !== "" && $pass !== "") {
        saveAdmin($name, $pass);
    }
}

header("Location: helloAdmin2025.php");
exit;

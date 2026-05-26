<?php
session_start();
include '../koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
}

$id = $_GET['id'];

mysqli_query($conn,
    "DELETE FROM berita WHERE id='$id'"
);

header("Location: dashboard.php");
?>
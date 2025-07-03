<?php

session_start();

include '../conexao.php';

$id_user = $_SESSION['id_user'];
$username = $_POST['username'];

$stmt = $conn->prepare("UPDATE userlogin SET username = ? WHERE id_user = ?");
$stmt->bind_param("si", $username, $id_user);



$stmt->close();
$conn->close();

?>
<?php

include '../conexao.php';

$email = $_POST['email'];
$nome = $_POST['nome'];
$dt_nascimento = $_POST['dt_nascimento'];
$senha_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

$verifica = $conn->prepare("SELECT id_login FROM userlogin WHERE email = ?");
$verifica->bind_param("s", $email);
$verifica->execute();
$verifica->store_result();

if ($verifica->num_rows > 0) {
    echo "<script>alert('Este e-mail já está cadastrado!'); history.back();</script>";
    exit;    
}

$stmt1 = $conn->prepare("INSERT INTO user (nome, dt_nascimento) VALUES (?, ?)");
$stmt1->bind_param("ss", $nome, $dt_nascimento);
$stmt1->execute();
$id_user = $stmt1->insert_id;

$stmt2 = $conn->prepare("INSERT INTO userlogin (email, senha_hash, id_user) VALUES (?, ?, ?)");
$stmt2->bind_param("ssi", $email, $senha_hash, $id_user);
$stmt2->execute();

$conn->commit();

session_start();
$_SESSION['id_user'] = $id_user;

header("Location: ../php/escolher_username.php");

exit;


$stmt1->close();
$stmt2->close();
$conn->close();

?>
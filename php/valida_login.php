<?php
session_start();
include '../conexao.php';

$username = $_POST['username'];
$senha_hash = $_POST['senha_hash'];

$stmt = $conn->prepare("SELECT id_login, senha_hash, id_user FROM userlogin WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($senha_hash, $user['senha_hash'])) {
        $_SESSION['id_login'] = $user['id_login'];
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['username'] = $username;

        header("Location: ../html/home.html");
        exit;
    } else {
        echo "<script>alert('Senha incorreta'); history.back();</script>";
    }
} else {
    echo "<script>alert('Usuário não cadastrado'); history.back();</script>";
}

$stmt->close();
$conn->close();
?>
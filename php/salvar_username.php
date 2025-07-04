<?php

session_start();

include '../conexao.php';

$id_user = $_SESSION['id_user'];
$username = $_POST['username'];

if (empty($username)) {
    echo "O nome de usuário não pode estar vazio.";
    exit;
};

$verifica = $conn->prepare("SELECT id_user FROM userlogin WHERE username = ? AND id_user != ?");
$verifica->bind_param("si", $username, $id_user);
$verifica->execute();
$verifica->store_result();

if ($verifica->num_rows>0) {
    echo "Username já cadastrado. Escolha outro.";
    exit;
}
$verifica->close();

$stmt = $conn->prepare("UPDATE userlogin SET username = ? WHERE id_user = ?");
$stmt->bind_param("si", $username, $id_user);

if ($stmt->execute()) {
    echo "Nome de usuário atualizado com sucesso!";
} else {
    echo "Erro ao atualizar nome de usuário: " . $stmt->error;
}


$stmt->close();
$conn->close();

?>
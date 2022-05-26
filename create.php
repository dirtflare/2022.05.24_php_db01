<?php
// var_dump($_POST);
// exit();
include('function.php');

if (
!isset($_POST['email']) || $_POST['email'] == '' ||
!isset($_POST['password']) || $_POST['password'] == ''
) {
exit('paramError');
}

$email = $_POST['email'];
$password = $_POST['password'];

// DB接続
$pdo = connect_to_db();

$sql = 'INSERT INTO user (id, email, password) VALUES (NULL, :email, :password);';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

try {
$status = $stmt->execute();
} catch (PDOException $e) {
echo json_encode(["sql error" => "{$e->getMessage()}"]);
exit();
}

header("Location:index.html");
exit();
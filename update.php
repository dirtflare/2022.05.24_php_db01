<?php
// var_dump($_POST);
// exit();
include('function.php');
// 入力項目のチェック
if (
!isset($_POST['email']) || $_POST['email'] == '' ||
!isset($_POST['password']) || $_POST['password'] == '' ||
!isset($_POST['id']) || $_POST['id'] == ''
) {
exit('paramError');
}

$email = $_POST['email'];
$password = $_POST['password'];
$id = $_POST['id'];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'UPDATE user SET email=:email, password=:password  WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
$status = $stmt->execute();
} catch (PDOException $e) {
echo json_encode(["sql error" => "{$e->getMessage()}"]);
exit();
}

header('Location:management.php');
exit();
<?php
// データ受け取り
// var_dump($_GET);
// exit();

// DB接続
include('function.php');
$pdo = connect_to_db();
$id = $_GET['id'];
// var_dump($id);
// exit();

// SQL実行
$sql = 'DELETE FROM user WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
$status = $stmt->execute();
} catch (PDOException $e) {
echo json_encode(["sql error" => "{$e->getMessage()}"]);
exit();
}

header("Location:management.php");
exit();
<?php
require_once('config.php');
session_start();
// var_dump($_POST);
// exit();
//メールのバリデーションを作成
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
echo '入力された値がメールアドレスではありません';
return false;
}

//ログイン処理を作る
try{
//PDOとは (PHP_Data_ObjectでDB接続を簡単にしてくれる)
$pdo = new PDO(DSN, DB_USER, DB_PASS);
//emailとpasswordが一致するときは1を返し、一致しないときは0を返すsqlを作成
$sql = "Select count(*) from user where email = :email and password = :password";
$stmt = $pdo->prepare($sql);
//POST値をsq1に代入
$stmt->bindParam(":email", $_POST['email']);
$stmt->bindParam(":password", $_POST['password']);
//クエリを実行
$stmt->execute();
//実行結果を取得
$cnt = $stmt->fetchColumn();
if($cnt == 1){
    //成功
    //一旦セッションにメールアドレスを保管
    $_SESSION['EMAIL'] = $_POST['email'];
    echo 'ログイン成功';
    $result = true;
    
    //成功した場合は以下のページに移動
    header("Location:management.php");
    
}else{
    //失敗
    echo 'ログイン失敗  メールアドレスが間違っています';
    $result = false;
}
return $result;
}catch(\Exception $e){
//通信エラーの場合ここに
echo $e->getMessage() . PHP_EOL;
}
?>
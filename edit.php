<?php
include('function.php');
// var_dump($_GET);
// exit();
// id受け取り
$id = $_GET['id'];
// var_dump($id);
// exit();
// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'SELECT * FROM user WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
// exit();
try {
$status = $stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($result);
// exit();
} catch (PDOException $e) {
echo json_encode(["sql error" => "{$e->getMessage()}"]);
exit();
}

// $record = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($result);
// exit();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User edit list (edit screen)</title>
</head>

<body>
<form action="update.php" method="POST">
<fieldset>
<legend>User edit list (edit screen)</legend>
<a href="management.php">overview screen</a>
<div>
    email: <input type="text" name="email" value="<?= $result['email'] ?>">
</div>
<div>
    password: <input type="text" name="password" value="<?= $result['password'] ?>">
</div>
<div>
    <input type="hidden" name="id" value="<?= $result['id'] ?>">
</div>
<div>
    <button>submit</button>
</div>
</fieldset>
</form>

<!-- 背景動画 -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.3.9/css/jquery.mb.YTPlayer.min.css">
    <div id="ytPlayer" data-property="{
        videoURL: 'https://www.youtube.com/watch?v=i9ZzrGYEhhw&list=PL1ghDHqXqwH2ecnNCqC6eWQwRB2_DxNLt&index=23',
        autoPlay: true,
        loop: 1,
        mute: true,
        showControls: false,
        showYTLogo: false,
        }">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.3.9/jquery.mb.YTPlayer.min.js"></script>
    <script>
        $(function () {
        $("#ytPlayer").YTPlayer();
        });
    </script>



</body>

</html>


<!-- var_dump($result);
exit(); -->
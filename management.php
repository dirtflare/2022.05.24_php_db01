<?php
include('function.php');

$pdo = connect_to_db();

$sql = 'SELECT * FROM user ORDER BY id ASC';

$stmt = $pdo->prepare($sql);

try {
$status = $stmt->execute();
} catch (PDOException $e) {
echo json_encode(["sql error" => "{$e->getMessage()}"]);
exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
$output .= "
<tr>
    <td>{$record["password"]}</td>
    <td>{$record["email"]}</td>
    <td>
    <a href='edit.php?id={$record["id"]}'>edit</a>
    </td>
    <td>
    <a href='delete.php?id={$record["id"]}'>delete</a>
    </td>
</tr>
";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User edit list (list view)</title>
</head>

<body>
<fieldset>
<legend>User edit list (list view)</legend>
<a href="index.html">BACK TO LOGIN FORM</a>
<table>
<thead>
<tr>
    <th>password</th>
    <th>email</th>
</tr>
</thead>
<tbody>
<?= $output ?>
</tbody>
</table>
</fieldset>


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
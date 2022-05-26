<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<title>Login</title>
<title>SIGNUP</title>
</head>

<body>
<!-- データを飛ばす場所 -->
<form action="create.php" method="POST">
<div class="mb-md-5 mt-md-4 pb-5">

    <!-- 会員登録画面タイトル -->
    <h2 class> SIGN UP</h2>
    <p class>🥦Please enter the email & password you will be using🥦</p>
    
    <div class="form-outline form-white mb-4">
    <!-- email入力 -->
    <input name="email" type="email" id="typeEmailX" class="form-control form-control-lg" />
    <label class="form-label" for="typeEmailX">Email</label>
    </div>
    
    <div class="form-outline form-white mb-4">
    <!-- password入力 -->
    <input name="password" type="password" id="typePasswordX" class="form-control form-control-lg" />
    <label class="form-label" for="typePasswordX">Password</label>
    <!-- サインアップ実行 -->
    <button class="btn btn-outline-light btn-lg px-5" type="submit">Sign Up</button>
    </div>
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
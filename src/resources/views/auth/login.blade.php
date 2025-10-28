<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="container">
        <h1 class="logo">PiGLy</h1>
        <p class="subtitle">ログイン</p>
        <form action="login" method="post">
            @csrf
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <div class="input-group">
                    <input type="text" id="email" name="email" placeholder="メールアドレスを入力">
                </div>
                <div class="error">
                    <!-- エラーメッセージ表示エリア -->
                </div>
            </div>

            <div class="form-group">
                <label for="password">パスワード</label>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="パスワードを入力">
                </div>
                <div class="error">
                    <!-- エラーメッセージ表示エリア -->
                </div>
            </div>

            <div class="button-group">
                <button type="submit" class="login-button">ログイン</button>
            </div>
        </form>
        <div class="register">
            <a href="/register" class="register-button">アカウント作成はこちら</a>
        </div>
    </div>

</body>

</html>
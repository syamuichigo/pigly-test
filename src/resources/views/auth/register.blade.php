<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <div class="container">
        <h1 class="logo">PiGLy</h1>
        <p class="subtitle">新規会員登録</p>
        <p class="step">STEP1 アカウント情報の登録</p>

        <form action="register" method="post">
            <div class="form-group">
                <label for="name">お名前</label>
                <div class="input-group">
                    <input type="text" id="name" name="name" placeholder="名前を入力">
                </div>
                <div class="error">
                    <!-- エラーメッセージ表示エリア -->
                </div>
            </div>

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
                <button type="submit" class="register-button">アカウント作成</button>
            </div>
        </form>
        <div class="login">
            <a href="/login" class="login-button">ログインはこちら</a>
        </div>
    </div>

</body>

</html>
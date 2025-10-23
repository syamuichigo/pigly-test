<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__container">
            <div class="header__logo">
                <a href="/admin">PiGLy</a>
            </div>
            <nav class="header__nav">
                <ul class="header__nav-list">
                    <li class="header__nav-item">
                        <a href="/target"><img src="" alt="">目標体重設定</a>
                    </li>
                    <li class="header__nav-item">
                        <form action="logout" method="post">
                            <button><img src="" alt="">ログアウト</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="main">
        @yield('content')
    </main>
</body>

</html>
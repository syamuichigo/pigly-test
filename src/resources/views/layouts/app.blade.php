<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')

    <!-- Alpine.js を defer で読み込む -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine の初期未表示用 -->
    <style>
        [x-cloak] {
            display: none !important
        }
    </style>
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
                        <a href="/target"><img src="{{asset('image/seeting.png')}}" alt="歯車マーク">目標体重設定</a>
                    </li>
                    <li class="header__nav-item">
                        <form action="/logout" method="post">
                            @csrf
                            <button><img src="{{asset('image/logout.png')}}" alt="ログアウト">ログアウト</button>
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
<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/weight_register.css') }}">
</head>

<body>
    <div class="container">
        <h1 class="logo">PiGLy</h1>
        <p class="subtitle">新規会員登録</p>
        <p class="step">STEP2 体重データの入力</p>

        <form>
            <div class="form-group">
                <label for="current_weight">現在の体重</label>
                <div class="input-group">
                    <input type="number" id="current_weight" name="current_weight" placeholder="現在の体重を入力">
                    <span>kg</span>
                </div>
                <div class="error">
                    <!-- エラーメッセージ表示エリア -->
                </div>
            </div>

            <div class="form-group">
                <label for="target_weight">目標の体重</label>
                <div class="input-group">
                    <input type="number" id="target_weight" name="target_weight" placeholder="目標の体重を入力" required>
                    <span>kg</span>
                </div>
                <div class="error">
                    <!-- エラーメッセージ表示エリア -->
                </div>
            </div>

            <div class="button-group">
                <button type="submit" class="btn">アカウント作成</button>
            </div>
        </form>
    </div>

</body>

</html>
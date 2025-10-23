@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="weight-log-form">
    <h2 class="form-title">Weight Log</h2>
    <form action="" method="post">

        <div class="form-group">
            <div class="input-group">
                <input type="number" class="weight-input">
            </div>
            <div class="error">
                <!-- エラーメッセージ表示エリア -->
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <input type="number" class="weight-input">
                <span class="unit">kg</span>
            </div>
            <div class="error">
                <!-- エラーメッセージ表示エリア -->
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <input type="number" class="weight-input">
                <span class="unit">kg</span>
            </div>
            <div class="error">
                <!-- エラーメッセージ表示エリア -->
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <input type="number" class="weight-input">
            </div>
            <div class="error">
                <!-- エラーメッセージ表示エリア -->
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <input type="number" class="weight-input">
            </div>
            <div class="error">
                <!-- エラーメッセージ表示エリア -->
            </div>
        </div>

        <div class="button-group">
            <a href="" class="back-button">戻る</a>
            <button class="update-button">更新</button>
        </div>
    </form>
</div>
@endsection
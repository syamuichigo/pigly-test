@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/target.css') }}">
@endsection

@section('content')
<div class="target-weight-form">
    <h2 class="form-title">目標体重設定</h2>
    <form action="" method="post">
        <div class="input-group">
            <input type="number" class="weight-input">
            <span class="unit">kg</span>
        </div>
        <div class="button-group">
            <a href="" class="back-button">戻る</a>
            <button class="update-button">更新</button>
        </div>
    </form>
</div>
@endsection
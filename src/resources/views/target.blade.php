@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/target.css') }}">
@endsection


@section('content')
<div class="target-weight-form">
    <h2 class="form-title">目標体重設定</h2>
    <form action="target/update" method="post">
        @csrf
        <div class="input-group">
            <input type="hidden" name="id" value="{{$target_weight['user_id']}}">
            <input type="number" class="weight-input" value="{{$target_weight['target_weight']}}" name="target_weight" id="target_weight">
            <span class="unit">kg</span>
        </div>
        <div class="error">
            @error('target_weight')
            {{ $message }}
            @enderror
        </div>
        <div class="button-group">
            <a href="" class="back-button">戻る</a>
            <button class="update-button">更新</button>
        </div>
    </form>
</div>
@endsection
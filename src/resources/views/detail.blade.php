@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="weight-log-form">
    <h2 class="form-title">Weight Log</h2>
    <div class="input-content">
        <form action="/update" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $log->id }}">
            <div class="form-group">
                <label for="" class="input-lavel">日付</label>
                <div class="input-group">
                    <input type="date" class="weight-input" value="{{ $log->date }}" name="date" id="date">
                </div>
                <div class="error">
                    @error('date')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="weight" class="input-lavel">体重</label>
                <div class="input-group">
                    <input type="number" class="weight-input" value="{{ $log->weight }}" name="weight" id="weight">
                    <span class="unit">kg</span>
                </div>
                <div class="error">
                    @error('weight')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="calories" class="input-lavel">摂取カロリー</label>
                <div class="input-group">
                    <input type="number" class="weight-input" value="{{ $log->calories }}" name="calories" id="calories">
                    <span class="unit">cal</span>
                </div>
                <div class="error">
                    @error('calories')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="exercise_time" class="input-lavel">運動時間</label>
                <div class="input-group">
                    <input type="time" class="weight-input" value="{{ $log->exercise_time }}" name="exercise_time" id="exercise_time">
                </div>
                <div class="error">
                    @error('exercise_time')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="exercise_content" class="input-lavel">運動内容</label>
                <div class="input-group">
                    <textarea name="exercise_content" id="exercise_content" rows="5" class="weight-input">{{$log->exercise_content}}</textarea>
                </div>
                <div class="error">
                    @error('exercise_content')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="button-group">
                <a href="/admin" class="back-button">戻る</a>
                <button class="update-button">更新</button>
            </div>
        </form>
        <form action="delete" method="post">
            @method('DELETE')
            @csrf
            <input type="hidden" name="id" value="{{ $log->id }}">
            <button class="delete-button">
                <img class="delete-button_submit" src="{{asset('/image/dustbox-close.png')}}" alt="削除ボタン">
            </button>
        </form>
    </div>
</div>
@endsection
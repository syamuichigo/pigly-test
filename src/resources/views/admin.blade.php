@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')

<div class="body">
    <div class="admin-header">
        @foreach($target_weight as $target)
        <div class="header-group">
            <p class="tile">目標体重</p>
            <div class="weight-group">
                <h2 class="weight">{{$target['target_weight']}}</h2>
                <span class="weight-unit">kg</span>
            </div>
        </div>
        <div class="header-group">
            <p class="tile">目標まで</p>
            <div class="weight-group">
                @php
                $diff = null;
                if(isset($last_weight['weight']) && isset($target['target_weight'])) {
                $diff = floatval($last_weight['weight']) - floatval($target['target_weight']);
                }
                @endphp
                <h1 class="weight">{{ isset($diff) ? number_format($diff, 1) : '-' }}</h1>
                <span class="weight-unit">kg</span>
            </div>
        </div>
        <div class="header-group">
            <p class="tile">最新体重</p>
            <div class="weight-group">
                <h1 class="weight">{{$last_weight['weight']}}</h1>
                <span class="weight-unit">kg</span>
            </div>
        </div>
        @endforeach
    </div>
    <div class="admin-main">
        <div class="main-header">
            <form class="search-form" action="/search" method="get">
                <input class="search-form_input" type="date" name="start_date" id="start_date" value="{{ request()->get('start_date') }}">
                <span class="search-form_unit">~</span>
                <input class="search-form_input" type="date" name="end_date" id="end_date" value="{{ request()->get('end_date') }}">
                <button class="search-form_button">検索</button>
                @if(request()->get('start_date') || request()->get('end_date'))
                <a class="search-form_reset" href="/admin">リセット</a>
                @endif
            </form>

            <div x-data="{ open: {{ $errors->any() ? 'true' : 'false' }} }">
                <button class="add-button" @click="open = true">データ追加</button>
                <div x-show="open" x-cloak class="modal">
                    <div class="modal-content">
                        <p class="modal-title">データ追加</p>
                        <form action="/add" method="post">
                            @csrf
                            <div class="modal-row">
                                <div class="modal-row_title">
                                    <label class="modal-row_label" for="date">日付</label>
                                    <span class="modal-row_title-unit">必須</span>
                                </div>
                                <div class="modal-row_content">
                                    <input class="modal-row_input" type="date" name="date" id="date" value="{{$today}}">
                                </div>
                                <div class="error">
                                    @error('date')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-row">
                                <div class="modal-row_title">
                                    <label class="modal-row_label" for="weight">体重</label>
                                    <span class="modal-row_title-unit">必須</span>
                                </div>
                                <div class="modal-row_content">
                                    <input class="modal-row_input" type="number" name="weight" id="weight" value="{{old('weight')}}">
                                    <span class="modal-row_unit">kg</span>
                                </div>
                                <div class="error">
                                    @error('weight')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-row">
                                <div class="modal-row_title">
                                    <label class="modal-row_label" for="calorie">食事摂取カロリー</label>
                                    <span class="modal-row_title-unit">必須</span>
                                </div>
                                <div class="modal-row_content">
                                    <input class="modal-row_input" type="number" name="calories" id="calories" value="{{old('calories')}}">
                                    <span class="modal-row_unit">cal</span>
                                </div>
                                <div class="error">
                                    @error('calories')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-row">
                                <div class="modal-row_title">
                                    <label class="modal-row_label" for="exercise_time">運動時間</label>
                                    <span class="modal-row_title-unit">必須</span>
                                </div>
                                <div class="modal-row_content">
                                    <input class="modal-row_input" type="time" name="exercise_time" id="exercise_time" value="{{old('exercise_time')}}">
                                </div>
                                <div class="error">
                                    @error('exercise_time')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-row">
                                <div class="modal-row_title">
                                    <label class="modal-row_label" for="exercise_content">運動内容</label>
                                </div>
                                <div class="modal-row_content">
                                    <textarea name="exercise_content" id="exercise_content" class="modal-row_input" rows="5">{{old('exercise_content')}}</textarea>
                                </div>
                                <div class="error">
                                    @error('exercise_content')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="button">
                                <p class="close" @click="open = false">戻る</p>
                                <button class="modal-submit_button" type="submit">追加</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if(request()->get('start_date') || request()->get('end_date'))
        <div class="search-result">
            <p>{{ request()->get('start_date') ?? '' }}{{ request()->get('start_date') && request()->get('end_date') ? '～' : '' }}{{ request()->get('end_date') ?? '' }}の検索結果：{{ $weight_logs->count() }}件</p>
        </div>
        @endif
        <div class="detail-header">
            <p class="detail-header_title">日付</p>
            <p class="detail-header_title">体重</p>
            <p class="detail-header_title">食事摂取カロリー</p>
            <p class="detail-header_title">運動時間</p>
            <p class="detail-header_title"> </p>
        </div>
        <div class="detail-content">
            @foreach($weight_logs as $weight_log)
            <form action="/detail" method="get">
                @csrf
                <div class="detail-row">
                    <input type="hidden" name="id" value="{{$weight_log['id']}}">
                    <p class="detail-row_item">{{$weight_log['date']}}</p>
                    <p class="detail-row_item">{{$weight_log['weight']}}kg</p>
                    <p class="detail-row_item">{{$weight_log['calories']}}cal</p>
                    <p class="detail-row_item">{{$weight_log['exercise_time']}}</p>
                    <button class="detail-row_item-button"><img src="{{asset('image/Frame.png')}}" alt="編集"></button>
                </div>
            </form>
            @endforeach
        </div>
    </div>
    <div class="pagination">
        {{ $weight_logs->links() }}
    </div>
</div>
@endsection
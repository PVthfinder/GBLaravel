@extends('layouts.app')

@section('title')
@parent - {{$title}}
@endsection

@section('content')
<div class="container">
    <div class="card-header">{{$title}}</div>

    <div class="row">
        @forelse($news as $item)

        <div class="card col-12 col-md-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $item['title'] }}</h5>
                <p class="card-text">{{ $item['text'] }}</p>
                <a href="/categories/{{ $item['category_id'] }}/{{ $item['id'] }}" class="card-link">Редактировать (пока просто содержимое)</a>
                <a href="/admin/delete/{{ $item['id'] }}" class="card-link">Удалить</a>
            </div>
        </div>
        @empty <h3>Новостей нет</h3>
        @endforelse
    </div>
</div>
@endsection
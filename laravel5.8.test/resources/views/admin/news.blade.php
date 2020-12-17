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
            <img class="card-img-top" src="{{ empty($item->image) ? 'https://via.placeholder.com/200' : $item->image }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $item->title }}</h5>
                <p class="card-text">{{ $item->spoiler }}</p>
                <a href="{{ route('admin.news.edit', $item) }}" class="card-link">Редактировать</a>
                <a href="/admin/delete/{{ $item->id }}" class="card-link">Удалить</a>
            </div>
        </div>
        @empty <h3>Новостей нет</h3>
        @endforelse

        {{ $news->links() }}
    </div>
</div>
@endsection
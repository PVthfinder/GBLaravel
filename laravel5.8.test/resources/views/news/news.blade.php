@extends('layouts.app')

@section('title')
@parent - {{$title}}
@endsection

@section('content')
<div class="container">
    <div class="card-header">{{$title}}</div>

    <div class="row">
        @forelse($news as $item)
        @if (!$item->is_private)
        <div class="card col-12 col-md-3" style="width: 18rem;">
            <img class="card-img-top" src="{{ empty($item->image) ? 'https://via.placeholder.com/200' : $item->image }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $item->title }}</h5>
                <p class="card-text">{{ $item->spoiler }}</p>
                <a href="/categories/{{ $item->category_id }}/{{ $item->id }}" class="card-link">Читать</a>
            </div>
        </div>
        @endif
        @empty <h3>Новостей нет</h3>
        @endforelse
    </div>

</div>
@endsection
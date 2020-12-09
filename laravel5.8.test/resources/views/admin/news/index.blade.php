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

                <form class="card-link" action="{{ route('admin.news.destroy', $item) }}" method="POST" style="float:right">
                    @method('DELETE')
                    @csrf

                    <input type='submit' class="button button-danger" value='Удалить'>
                </form>
            </div>
        </div>
        @empty <h3>Новостей нет</h3>
        @endforelse

        {{ $news->links() }}
    </div>
</div>
@endsection
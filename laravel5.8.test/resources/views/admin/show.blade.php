@extends('layouts.app')

@section('title')
@parent - {{$title}}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$title}}</div>

                <img class="card-img-top" src="{{ empty($one_news->image) ? 'https://via.placeholder.com/500' : $one_news->image }}" alt="Card image cap">

                <div class="card-body">

                    <p><?= $one_news['text'] ?></p>

                </div>

            </div>

            <a href="/categories/{{ $category->id }}">Вернуться к новостям</a>
        </div>
    </div>
</div>
@endsection
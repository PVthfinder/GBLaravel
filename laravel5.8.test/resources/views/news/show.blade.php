@extends('layouts.app')

@section('title')
@parent - {{$news->title}}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$news->title}}</div>

                <img class="card-img-top" src="{{ empty($news->image) ? 'https://via.placeholder.com/500' : $news->image }}" alt="Card image cap">

                <div class="card-body">

                    <p>{{ $news->text }} </p>

                </div>

            </div>

            <a href="/categories/{{ $category_id }}">Вернуться к новостям</a>
        </div>
    </div>
</div>
@endsection
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

                <div class="card-body">

                    <p><?= $one_news['text'] ?></p>

                </div>

            </div>

            <a href="/categories/{{ $category['id'] }}">Вернуться к новостям</a>
        </div>
    </div>
</div>
@endsection
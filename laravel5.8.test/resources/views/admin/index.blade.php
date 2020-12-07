@extends('layouts.app')

@section('title')
    @parent - {{ $title }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title }}</div>

                <div class="card-body">
                    Админка
                </div>
            </div>
            <a class="nav-link" href="/admin/add">Добавить новость</a>
            <a class="nav-link" href="/admin/news">Администрирование новостей</a>
        </div>
    </div>
</div>
@endsection
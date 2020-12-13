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
            <a class="nav-link" href="{{ route('admin.news.create') }}">Добавить новость</a>
            <a class="nav-link" href="{{ route('admin.news.index') }}">Администрирование новостей</a>
            <a class="nav-link" href="{{ route('admin.users.index') }}">Администрирование пользователей</a>
        </div>
    </div>
</div>
@endsection
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

                    @forelse($news as $item)
                        @if (!$item['is_privat'])
                            <li>
                                <a href="/categories/{{ $item['category_id'] }}/{{ $item['id'] }}">{{ $item['title'] }}</a>
                            </li>
                        @endif
                    @empty <h3>Новостей нет</h3>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
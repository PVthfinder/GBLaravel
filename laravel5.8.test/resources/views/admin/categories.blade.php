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

                    @foreach($categories as $item)
                    <li>
                        <a href="categories/{{ $item->id }}">{{ $item->title }}</a>
                    </li>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title')
@parent - {{$user->name}}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$user->name}}</div>

                {{ $user }}

                <user-edit-component
                    :user="{{ json_encode($user) }}"
                ></user-edit-component>
                <example-component></example-component>

            </div>
        </div>
    </div>
</div>
@endsection
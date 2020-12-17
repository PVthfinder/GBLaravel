@extends('layouts.app')

@section('title')
    @parent - Калькулятор
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Калькулятор</div>

                {{ $result }}
            </div>
        </div>
    </div>
</div>
@endsection
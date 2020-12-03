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

                    @if (session()->has('errors'))
                    @foreach (session()->get('errors') as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                    @endforeach
                    @endif

                    <form class='form' action="{{ route('admin.add') }} " method='post'>
                        @csrf

                        <p>Название новости</p><input class='form_item' type='text' name='title' value="{{ old('title') }}"><br><br>
                        <select name="category_id">
                            @foreach($categories as $item)
                            <option value="{{ $item['id'] }}" @if(old('category_id')==$item['id']) selected @endif>{{ $item['title'] }}</option>
                            @endforeach
                        </select><br><br>
                        <p>Описание новости</p><textarea class='form_item' name='text'>{{ old('text') }}</textarea><br><br>
                        <div class="form-check">
                            <input name="is_privat" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" @if(old('is_privat')) checked @endif>
                            <label class="form-check-label" for="flexCheckDefault">
                                Новость приватна?
                            </label>
                        </div><br><br>
                        <p><input type='submit' class='btn' name='reg' value='Добавить'></p>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection
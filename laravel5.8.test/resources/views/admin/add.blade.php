@extends('layouts.app')

@section('title')
@parent - @if (empty($news)) Добавить @else Редактировать @endif
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@if (empty($news)) Добавить @else Редактировать @endif новость</div>

                <div class="card-body">

                    @if (session()->has('errors'))
                    @foreach (session()->get('errors') as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                    @endforeach
                    @endif

                    <form class='form' action="{{ (empty($news)) ? route('admin.add') : route('admin.news.edit', $news) }} " method='post' enctype="multipart/form-data">
                        
                        @csrf

                        <p>Название новости</p><input class='form_item' type='text' name='title' value="{{ old('title') ?? $news->title }}"><br><br>
                        <select name="category_id">
                            @foreach($categories as $item)
                            <option value="{{ $item->id }}" @if(old('category_id')==$item->id || $news->category_id == $item->id) selected @endif>{{ $item->title }}</option>
                            @endforeach
                        </select><br><br>
                        <p>Краткое описание</p><input class='form_item' type='text' name='spoiler' value="{{ old('spoiler') ?? $news->spoiler }}"><br><br>
                        <p>Описание новости</p><textarea class='form_item' name='text'>{{ old('text') ?? $news->text }}</textarea><br><br>
                        <div class="form-group">
                            <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div><br>
                        <div class="form-check">
                            <input name="is_private" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" @if(old('is_private')) checked @endif>
                            <label class="form-check-label" for="flexCheckDefault">
                                Новость приватна?
                            </label>
                        </div><br><br>
                        <p><input type='submit' class='btn' value='Добавить'></p>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection
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

                    <form class='form' action="{{ route('admin.news.update', $news) }} " method='post' enctype="multipart/form-data">
                        
                        @method('PATCH')
                        @csrf

                        <p>Название новости</p><input class='form_item' type='text' name='title' value="{{ old('title', $news->title) }}"><br><br>
                        <select name="category_id">
                            @foreach($categories as $item)
                            <option value="{{ $item->id }}" @if(old('category_id', $news->category_id) == $item->id) selected @endif>{{ $item->title }}</option>
                            @endforeach
                        </select><br><br>
                        <p>Краткое описание</p><input class='form_item' type='text' name='spoiler' value="{{ old('spoiler', $news->spoiler) }}"><br><br>
                        <p>Описание новости</p><textarea class='form_item' name='text'>{{ old('text', $news->text) }}</textarea><br><br>
                        <div class="form-group">
                            <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div><br>
                        <div class="form-check">
                            <input name="is_private" class="form-check-input" id="is_private_false" type="radio" value="0" @if(old('is_private', $news->is_private) == 0) checked @endif>
                            <label class="form-check-label" for="is_private_false">
                                Публичная
                            </label>
                        </div><br><br>
                        <div class="form-check">
                            <input name="is_private" class="form-check-input" id="is_private_true" type="radio" value="1" @if(old('is_private', $news->is_private) == 1) checked @endif>
                            <label class="form-check-label" for="is_private_true">
                                Приватная
                            </label>
                        </div><br><br>
                        <p><input type='submit' class='btn' value='Редактировать'></p>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection
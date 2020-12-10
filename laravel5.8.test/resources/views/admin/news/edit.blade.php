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

                        <p>Название новости</p><input dusk="title" class='form_item @error('title') is-invalid @enderror' type='text' name='title' value="{{ old('title', $news->title) }}">
                        @foreach ($errors->get('title') as $error)
                            <div class="text-danger">{{ $error }}</div>
                        @endforeach
                        <br><br>

                        <select name="category_id">
                            @foreach($categories as $item)
                            <option value="{{ $item->id }}" @if(old('category_id', $news->category_id) == $item->id) selected @endif>{{ $item->title }}</option>
                            @endforeach
                        </select><br><br>
                        
                        <p>Краткое описание</p><input dusk="spoiler" class='form_item @error('spoiler') is-invalid @enderror' type='text' name='spoiler' value="{{ old('spoiler', $news->spoiler) }}">
                        @foreach ($errors->get('spoiler') as $error)
                            <div class="text-danger">{{ $error }}</div>
                        @endforeach
                        <br><br>
                        
                        <p>Описание новости</p><textarea dusk="text" class='form_item @error('text') is-invalid @enderror' name='text'>{{ old('text', $news->text) }}</textarea>
                        @foreach ($errors->get('text') as $error)
                            <div class="text-danger">{{ $error }}</div>
                        @endforeach
                        <br><br>
                        
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
                        
                        <p><input dusk="submit" type='submit' class='btn' value='Редактировать'></p>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection
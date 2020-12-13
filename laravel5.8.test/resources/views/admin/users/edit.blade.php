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

                <div class="card-body">

                    @if (session()->has('errors'))
                    @foreach (session()->get('errors') as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                    @endforeach
                    @endif

                    <form class='form' action="{{ route('admin.users.update', $user) }} " method='post' enctype="multipart/form-data">
                        
                        @method('PATCH')
                        @csrf
                        
                        <div class="form-check">
                            <input name="role" class="form-check-input" id="admin_false" type="radio" value="0" @if(old('role', $user->role) == 0) checked @endif>
                            <label class="form-check-label" for="admin_false">
                                Обычный пользователь
                            </label>
                        </div><br><br>
                        <div class="form-check">
                            <input name="role" class="form-check-input" id="admin_true" type="radio" value="1" @if(old('role', $user->role) == 1) checked @endif>
                            <label class="form-check-label" for="admin_true">
                                Администратор
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
@extends('layouts.site')
@section('content')
    <div class="col_md_9">
        <div class="">
            <h2>Добавление нового материала</h2>
        </div>

        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success">
                {{'message'}}
            </div>
        @endif
        <form method="post" action="{{route('admin_update_post')}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" value="{{$article->id}}">
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class = "form-control" id="title" value="{{$article->title}}" placeholder="введите название">
            </div>
            <div class="form-group">
                <label for="alias">Псевдоним</label>
                <input type="text" class = "form-control" id="alias" value="{{$article->alias}}" placeholder="введите псевдоним">
            </div>
            <div class="form-group">
                <label for="desc">Краткое описание</label>
                <input type="text" class = "form-control" id="desc" value="{{$article->desc}}" placeholder="введите краткое описание">
            </div>
            <div class="form-group">
                <label for="text">Текст</label>
                <textarea type="text" class = "form-control" id="text"rows="3">{{$article->text}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
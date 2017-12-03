@extends('layouts.site');
@section('content');
<div class="container">
    <!-- Example row of columns -->
    <div class="row">

        <div class="form">
            @if($article)
            <form method="POST" action="{{route('articleEditing',['$article'=>$article->id])}}">
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок" value="{{ $article->title }}">
                </div>
                <div class="form-group">
                    <label for="alias">Псевдоним</label>
                    <input type="text" class="form-control" id="alias" name="alias" placeholder="Псевдоним" value="{{$article->alias}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Краткое описание</label>
                    <textarea class="form-control" name="desc">{{ $article->text }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Полный текст</label>
                    <textarea class="form-control" name="text">{{ $article->text }}</textarea>
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            {{ csrf_field() }}<!--защита от меж сайтовых подделок запроса-->
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
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

        {{--не работает --}}
        @if(session('status'))
            <div class="alert alert-success">
                {{'status'}}
            </div>
        @endif
        @cannot('update',$article)
            <div class="alert alert-success">
                У вас нет прав
            </div>
        @endcannot
        {{--не работает--}}

        <form method="POST" action="{{route('admin_save_update_post')}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" value="{{$article->id}}">
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class = "form-control" id="title" name="title" value="{{$article->title}}" placeholder="введите название">
            </div>
            <div class="form-group">
                <label for="alias">Псевдоним</label>
                <input type="text" class = "form-control" id="alias"  name="alias" value="{{$article->alias}}" placeholder="введите псевдоним">
            </div>
            <div class="form-group">
                <label for="desc">Краткое описание</label>
                <input type="text" class = "form-control" id="desc" name="desc" value="{{$article->desc}}" placeholder="введите краткое описание">
            </div>
            <div class="form-group">
                <label for="text">Текст</label>
                <textarea type="text" class = "form-control" id="text" name = "text" rows="3">{{$article->text}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
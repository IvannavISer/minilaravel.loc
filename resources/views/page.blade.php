@extends('layouts.site')
@section('content')
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container">

    <!-- Example row of columns -->
    <div class="row">
        <div class="row">
            @if(request()->session()->get('status'))
                <p>{{ Session::get('status') }}</p>
                <p>{{ request()->session()->get('status')}}</p>
        @endif
        </div>
        @foreach($articles as $article)
            <div class="col-md-4">
                <h2>{{ $article->title }}</h2>
                <p>{!! $article->desc !!}</p>
                <p><a class="btn btn-default"  href= "{{route('articleShow',['id'=>$article->id])}}" role="button">Подробнее &raquo;</a></p>
                <p><a class="btn btn-default" href="{{route('admin_update_post',['id'=>$article->id])}}" role="button">Редактировать статьи ADMIN &raquo;</a></p>
                <form action="{{route('articleDelete')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="id" value="{{$article->id}}">
                    {{--<input type="hidden" name="_method" value="DELETE" тоже самое ниже только круче>--}}
                    {{method_field('DELETE')}}
                    {{csrf_field()}} {{--защита от атак межсайтовых подделок запроса--}}
                    @if(Session::has('password_hash'))
                    <button type="submit" class="btn btn-danger">Удалить</button>
                        @endif
                </form>
            </div>
        @endforeach
    </div>
    <hr>
    <footer>
        <p>&copy; 2016 Company, Inc.</p>
    </footer>
</div><!-- /container -->
@endsection
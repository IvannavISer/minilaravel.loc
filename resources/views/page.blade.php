@extends('layouts.site')
@section('content')
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        @foreach($articles as $article)
            <div class="col-md-4">
                <h2>{{ $article->title }}</h2>
                <p>{!! $article->desc !!}</p>
                <p><a class="btn btn-default"  href= "{{route('articleShow',['id'=>$article->id])}}" role="button">Подробнее &raquo;</a></p>
                <p><a class="btn btn-default" href="{{route('articleVisual',['id'=>$article->id])}}" role="button">Редактировать &raquo;</a></p>
                <form action="{{route('articleDelete',['$article'=>$article->id])}}" method="post">
                    {{--<input type="hidden" name="_method" value="DELETE" тоже самое ниже только круче>--}}
                    {{method_field('DELETE')}}
                    {{csrf_field()}} {{--защита от атак межсайтовых подделок запроса--}}
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        @endforeach
    </div>
    <hr>
    <footer>
        <p>&copy; 2016 Company, Inc.</p>
    </footer>
</div> <!-- /container -->
    @endsection
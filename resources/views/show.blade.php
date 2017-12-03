@extends('layouts.site')
@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            @if($article)
                <div>
                    <h2>{{ $article->title }}</h2>
                    <p>{!! $article->text !!}</p>
                </div>
            @endif
        </div>
        <ul>
            @foreach($data as $kay=>$value)
                <li>{{$kay.'=>'.$value}}</li>
            @endforeach
        </ul>
        <ul>
            @forelse($data as $kay=>$value)
                <li>{{$kay.'=>'.$value}}</li>
                @empty
                <p>no items</p>
            @endforelse
        </ul>
        <hr>
        <footer>
            <p>&copy; 2016 Company, Inc.</p>
        </footer>
    </div> <!-- /container -->
@endsection
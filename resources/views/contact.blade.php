@extends('layouts.site');
@section('contact');
<div class="container">
    <!-- Example row of columns -->
    <div class="row">

        <div class="form">

            <form method="POST" action="{{route('contact')}}">
                <h1>Contact US</h1>
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" class="form-control" value="{{old('name')}}" id="title" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="alias">Email</label>
                    <input type="text" class="form-control" value="{{old('email')}}" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="alias">Site</label>
                    <input type="text" class="form-control" value="{{old('site')}}" id="site" name="site" placeholder="Site">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Text</label>
                    <textarea class="form-control" name="text"></textarea>
                </div>

                <button type="submit" class="btn btn-default">Submit</button>

            {{ csrf_field() }}<!--защита от меж сайтовых подделок запроса-->

            </form>
        </div>
    </div>
</div>
@endsection
@extends('template')

@section('title')
    {{ $title }}
@endsection

@section('head')
    <link href='/css/style.css' rel='stylesheet'>
@endsection

@section('content')
    <p>My form:</p>
    <form name="myForm" id="myForm" method="post" action="{{ url('') }}">
        @csrf
        <div class="form-group">
            <label for="inputOne">Input One</label>
            <input type="text" id="inputOne" name="inputOne" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputTwo">Input Two</label>
            <textarea name="inputTwo" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

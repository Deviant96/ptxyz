@extends('layout')

@section('title', 'Home - Welcome')

@section('content')
    <div class="container">
        <h1>Welcome!</h1>
        <a href="{{ route('user.list') }}" >Go to user list</a>
    </div>
@endsection

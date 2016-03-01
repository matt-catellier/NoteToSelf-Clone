@extends('layouts.notes')

@section('header')
    <h1> Users: </h1>
    @foreach($users as $user)
        <p> email: {{ $user->email }} pass: {{  $user->password; }} </p>
    @endforeach
@stop
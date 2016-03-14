@extends('layouts.main')

@section('head')
    <style>
        p {
            margin: 0px;
        }
    </style>
@stop

@section('content')
    <h1> Thank you for registering </h1>
    <p> An email has been sent to <span class="red">{{$email}}</span></p>
    <p> Please confirm registration by clicking the link in your email. </p>
@stop
@extends('layouts.main')

@section('head')
    <style>
        p {
            margin: 0px;
        }
    </style>
@stop

@section('content')
    <h1> Success </h1>
    <p> Your password has been reset.</p>
    <p> An email has been sent to <span class="red">{{$email}}</span></p>
    <p> Please use the link that has been sent to you to login with your new password.</p>
@stop
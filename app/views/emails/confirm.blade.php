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
    <p> Thank you for confirming your registration for <span class="red">{{$email}} </span>.
        {{ link_to_action('SessionsController@create', 'login', ['e' => urldecode($email)]) }}
        </p>

    {{--{{ URL::to(action('SessionsController@create') . '?' . urldecode(http_build_query(array('e' => $email)) ) ) }}--}}

@stop
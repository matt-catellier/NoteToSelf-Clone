@extends('layouts.main')


@section('content')
    <p> Login error. Did you {{link_to('forgot', 'forget your password')}}?
        Please try to {{ link_to('users/create','register') }}  or {{ link_to('login', 'login')}}</p>
@stop
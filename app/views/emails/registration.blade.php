@extends('layouts.main')

@section('head')
@stop

@section('content')
    <p> From admin@note-to-self.com on {{ date('l jS \of F Y h:i:s A'); }}</p>
    <p> Welcome to {{ link_to('login') }}.
    <p> To log in, click link below: </p>

    {{ URL::to(action('SessionsController@create') . '?' . urldecode(http_build_query(array('e' => $email, 'r' => $confirmation_code)) ) ) }}<p> Please confirm registration by clicking the link in your email. </p>
@stop
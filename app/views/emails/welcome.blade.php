@extends('layouts.main')

@section('content')
    <p> From admin@note-to-self.com on {{ date('l jS \of F Y h:i:s A'); }}</p>
    <p> Welcome to {{ link_to('login') }}. Your new password is <b> {{$pass}} </b>. Please keep this email or write it down.</p>
    <p> To log in with new password, click link below: </p>

    {{ URL::to(action('SessionsController@create') . '?' . urldecode(http_build_query(array('e' => $email)) ) ) }}

@stop
@extends('layouts.notes')

@section('pagetitle')
    <title> note to self - notes </title>
@stop

@section('header')
    <script type="text/javascript">
        function openInNew(textbox){
            window.open(textbox.value);
            this.blur();
        }
    </script>
@stop

@section('header')
    <h1>{{ Auth::user()->email }} - {{ link_to('logout', 'log out') }}</h1>
@stop


@section('notes')
    {{ Form::open(['action'=>'NotesController@store', 'method'=>'post', 'enctype'=>'miltipart/form-data']) }}
    <h3>notes</h3>
    {{ Form::textarea('notes', $notes, $attributes = array('class'=>'col-sm-12 col-xs-12', 'id'=>'notes')) }}
@stop

@section('websites')
    <h3>websites</h3>
    <h4> click to open </h4>

        @for($i = 0; $i < count($websites); $i++)
            @if($websites[$i] != '')
                {{  Form::text('websites[]',$websites[$i] , ['onclick'=>'openInNew(this)']); }}
            @else
                {{  Form::text('websites[]',$websites[$i]); }}
            @endif

        @endfor
@stop

@section('images')
    <h3>images</h3>
    <h4> click for full size </h4>
    {{ Form::file('images') }}
    <div class="image">
        <a href="{{ URL::to('images/ghostmatt.jpg') }}" >  {{ HTML::image('images/ghostmatt.jpg',null, $attributes = array('class'=>'col-sm-12 col-xs-12' )) }} </a>
        {{ Form::checkbox('delete[]', '1', false )}}
        {{ Form::label('delete[]', 'delete?') }}
    </div>
@stop

@section('tbd')
    <h3>tbd</h3>
    {{ Form::textarea('tbd', $tbds, $attributes = array('class'=>'col-sm-12 col-xs-12', 'id'=>'tbd')) }}
@stop

@section('save')
    {{ Form::submit('save', $attributes = array('class'=>'col-sm-offset-3 col-sm-6 col-xs-12 btn btn-primary')) }}
@stop
{{ Form::close() }}



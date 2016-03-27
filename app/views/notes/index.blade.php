@extends('layouts.notes')

@section('pagetitle')
    <title> note to self - notes </title>
@stop

@section('headers')
    <script type="text/javascript">
        function openInNew(textbox){
            window.open(textbox.value);
            this.blur();
        }
    </script>
    <style>
        .image {
            height: 200px;
            display: block;
            width: auto;
        }

    </style>
@stop

@section('header')
    <h1>{{ Auth::user()->email }} - {{ link_to('logout', 'log out') }}</h1>
@stop


@section('notes')
    {{ Form::open(['action'=>'NotesController@store', 'method'=>'post', 'enctype'=>'miltipart/form-data', 'files'=>'true']) }}
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
    @if(count($images) <= 4)
        {{ Form::file('images') }}
    @else
        <p> maximum 4 images.</p>
    @endif
    <div class="image col-sm-12">
        @for($i = 0; $i < count($images); $i++)
            @if($images[$i] != '')
                <a href="{{ URL::to($images[$i]) }}" class="clearfix" >  {{ HTML::image($images[$i],null, $attributes = array('class'=>'col-sm-8 col-xs-8' )) }} </a>
                {{ Form::checkbox('delete[]', $images[$i], false, $attributes = array('class'=>'col-sm-1 col-xs-1' ) )}}
                {{ Form::label('delete[]', 'delete?', $attributes = array('class'=>'col-sm-1 col-xs-1' )) }}
            @endif
        @endfor
    </div>
@stop

@section('tbd')
    <h3>tbd</h3>
    {{ Form::textarea('tbd', $tbds, $attributes = array('class'=>'col-sm-12 col-xs-12', 'id'=>'tbd')) }}
@stop

@section('save')
    {{ Form::submit('save', $attributes = array('class'=>'col-sm-offset-3 col-sm-6 col-xs-12 btn btn-primary')) }}
    {{ Form::close() }}
@stop






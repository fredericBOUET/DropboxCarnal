@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>Formulaire Dropbox to Server</p>
@stop

@section('content')
    {{Form::open(array('url'=>'postFormDropbox'))}}
    <select name="directory" id="directory" class="">
        <option value=" ">Pick a directory...</option>
        @foreach($arrayFolders as $value)
            <option value="{{$value}}" >{{$value}}</option>
        @endforeach
    </select>
    {{Form::submit('Submit')}}
    {{Form::close()}}
@stop

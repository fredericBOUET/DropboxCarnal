@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>Dashboard</p>
@stop

@section('content')
    <p>Tools</p>
    <a href="/dropboxForm">Dropbox form</a>
@stop

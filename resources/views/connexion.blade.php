@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>Connexion</p>
@stop

@section('content')
<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" data-redirecturi="http://dropboxtestcarnal.com:8000/callback"></div>
<p id='msgError'></p>
@stop

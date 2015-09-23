@extends('layouts.master')

@section('title', 'Setup Passwords')

@section('title.header')
    <h3 class="text-center">
        @yield('title')
    </h3>
@stop

@section('content')

    <div class="col-md-3"></div>

    <div class="col-md-6 text-center">
        <i class="fa fa-6 fa-lock"></i>

        <div class="alert alert-info" role="alert">
            <b>Hey There.</b>

            <br>

            You have to setup a pin before you can start storing passwords.
        </div>
    </div>

    <div class="col-md-3"></div>

    <div class="clearfix"></div>

    {!! $form !!}

@stop

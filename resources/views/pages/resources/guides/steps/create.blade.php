@extends('layouts.master')

@section('extra.top')
    <a class="btn btn-primary" href="{{ route('resources.guides.show', [$guide->getSlug()]) }}">
        <i class="fa fa-chevron-left"></i>
        Back to Guide
    </a>
@endsection

@section('title.header')
    <h2>
        @section('title') Create Step {{ $steps }} @show
    </h2>
@endsection

@section('content')

    {!! $form !!}

    <hr>

    <div class="col-md-12 text-center">
        <a href="{{ route('resources.guides.show', [$guide->getSlug()]) }}" class="btn btn-warning">
            <i class="fa fa-angle-double-left"></i>
            Back to Guide
        </a>
    </div>

@endsection

@extends('layouts.app')
@section('header')
    <h2 class="h4 font-weight">
        Welcome, {{ Auth::user()->username }}
    </h2>
@endsection
@section('content')
    @include('vendor.jetstream.components.writer')
@endsection

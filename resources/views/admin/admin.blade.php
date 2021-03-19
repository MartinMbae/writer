@extends('layouts.app')


@section('navbar')
    @include('navigation-menu-admin')
@endsection

@section('header')
    <h2 class="h4 font-weight">
        {{ Auth::user()->username }}, you are logged in as an <b>Admin</b>
    </h2>
@endsection
@section('content')
    @include('vendor.jetstream.components.admin')
@endsection

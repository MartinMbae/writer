@extends('layouts.app')


@section('navbar')
    @include('navigation-menu-admin')
@endsection

@section('header')
    <h2 class="h4 font-weight">
       Add a new order
    </h2>
@endsection
@section('content')
    @include('vendor.jetstream.components.new_order')
@endsection

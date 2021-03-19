@extends('layouts.app')

@section('navbar')
    @include('navigation-menu-writer')
@endsection
@section('header')
    <h2 class="h4 font-weight">
        Welcome, {{ Auth::user()->username }}
    </h2>
@endsection
@section('content')

    <div class="row justify-content-center">
        <h3><u>Orders</u></h3>
    </div>
    <div class="row">
        @include('vendor.jetstream.components.counter', ['title'=>'Available Orders', 'count'=>$available_count, 'url'=>'writer/orders/available'])
        @include('vendor.jetstream.components.counter', ['title'=>'Delivered Orders', 'count'=>0, 'url'=>'writer/orders/delivered'])
        @include('vendor.jetstream.components.counter', ['title'=>'Completed Orders', 'count'=>0, 'url'=>'writer/orders/completed'])
        @include('vendor.jetstream.components.counter', ['title'=>'Paid Orders', 'count'=>0, 'url'=>'writer/orders/paid'])
        @include('vendor.jetstream.components.counter', ['title'=>'Orders in Progress', 'count'=>0, 'url'=>'writer/orders/progress'])
        @include('vendor.jetstream.components.counter', ['title'=>'Under Revision', 'count'=>0, 'url'=>'writer/orders/revision'])
        @include('vendor.jetstream.components.counter', ['title'=>'Rejected Orders', 'count'=>0, 'url'=>'writer/orders/rejected'])
    </div>

    <hr>

    <div class="row justify-content-center" style="margin-top: 10px">
        <h3><u>Financials</u></h3>
    </div>
    <div class="row">
        @include('vendor.jetstream.components.counter', ['title'=>'My earnings', 'count'=>5, 'url'=>'writer/orders/earnings'])
        @include('vendor.jetstream.components.counter', ['title'=>'My Advances / Fines ', 'count'=>2, 'url'=>'writer/orders/advances'])
    </div>



@endsection

@extends('layouts.app')

@section('navbar')
    @include('navigation-menu-admin')
@endsection

@section('header')
    <h2 class="h4 font-weight">
        All Orders
    </h2>
@endsection
@section('content')

    <table class="table table-bordered table-hover table-striped ">

        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Source of the order</th>
            <th>Order Number</th>
            <th>Order Topic</th>
            <th>Paper Type</th>
            <th>Subject</th>
            <th>Paper Level</th>
            <th>Writing Format</th>
            <th>Action</th>
        </tr>
        </thead>

        @if(sizeof($orders) == 0)
            <tr>
                <td colspan="9">You have not added any order</td>
            </tr>
        @else
            @foreach($orders as $key => $order)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $order->source_name }}</td>
                    <td>{{ $order->order_no }}</td>
                    <td>{{ $order->topic }}</td>
                    <td>{{ $order->paper_type }}</td>
                    <td>{{ $order->subject }}</td>
                    <td>{{ $order->paper_level }}</td>
                    <td>{{ $order->writing_format }}</td>
                    <td><a href="{{ url("orders/$order->id") }}">View</a> </td>
                </tr>
            @endforeach
        @endif
    </table>

@endsection



@extends('layouts.app')

@section('navbar')
    @include('navigation-menu-admin')
@endsection

@section('header')
    <h2 class="h4 font-weight">
        Your Sources
    </h2>
@endsection
@section('content')

    <table class="table table-bordered table-hover table-striped ">

        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Name of the source</th>
            <th>Description</th>
        </tr>
        </thead>

        @if(sizeof($sources) == 0)
            <tr>
                <td colspan="3">You have not added any source</td>
            </tr>
        @else
            @foreach($sources as $key => $source)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $source->name }}</td>
                    <td>{{ $source->description }}</td>
                </tr>
            @endforeach
        @endif
    </table>

@endsection


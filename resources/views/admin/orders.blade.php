@extends('admin.layout',['title'=>$title, 'counts'=> $counts])

@section('content')
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Orders</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{ url('admin') }}" class="breadcrumb-link">Dashboard</a>
                                        </li>
                                        @if($classification == 0)
                                        <li class="breadcrumb-item active" aria-current="page">View all Orders</li>
                                        @elseif($classification == 1)
                                            <li class="breadcrumb-item">
                                                <a href="{{ url('orders') }}" class="breadcrumb-link">Orders</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">{{ $subtitle }}</li>
                                        @endif
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ecommerce-widget">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">{{ $subtitle }}</h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">#</th>
                                                <th class="border-0">Source of the order</th>
                                                <th class="border-0">Order Number</th>
                                                <th class="border-0">Order Topic</th>
                                                <th class="border-0">Subject</th>
                                                <th class="border-0">Paper Level</th>
                                                <th class="border-0">Writing Format</th>
                                                <th class="border-0">Status</th>
                                                <th class="border-0">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @if(sizeof($orders) == 0)
                                                <tr>
                                                    <td colspan="9">We could not find any order under this category</td>
                                                </tr>
                                            @else
                                                @foreach($orders as $key => $order)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $order->source_name }}</td>
                                                        <td>{{ $order->order_no }}</td>
                                                        <td>{{ $order->topic }}</td>
                                                        <td>{{ $order->subject }}</td>
                                                        <td>{{ $order->paper_level }}</td>
                                                        <td>{{ $order->writing_format }}</td>
                                                        <td><span class="badge-dot {{ $order->badge }} mr-1"></span>{{ $order->status_name }}</td>
                                                        <td><a href="{{ url("orders/$order->id") }}"><i class="fa fa-fw fa-eye"></i></a> </td>
                                                    </tr>
{{--                                                    <tr>--}}
{{--                                                        <td><span class="badge-dot badge-danger mr-1"></span>Danger</td>--}}
{{--                                                        <td><span class="badge-dot badge-warning mr-1"></span>Warning</td>--}}
{{--                                                        <td><span class="badge-dot badge-secondary mr-1"></span>Secondary</td>--}}
{{--                                                        <td><span class="badge-dot badge-success mr-1"></span>Success</td>--}}
{{--                                                        <td><span class="badge-dot badge-brand mr-1"></span>Brand</td>--}}
{{--                                                        <td><span class="badge-dot badge-dark mr-1"></span>Dark</td>--}}
{{--                                                        <td><span class="badge-dot badge-info mr-1"></span>Info</td>--}}
{{--                                                        <td><span class="badge-dot badge-light mr-1"></span>Light</td>--}}
{{--                                                        <td><span class="badge-dot badge mr-1"></span>Pill</td>--}}

{{--                                                    </tr>--}}
                                                @endforeach
                                            @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.footer')
    </div>
@endsection

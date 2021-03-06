@extends('admin.layout',['title'=>$title])

@section('content')
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Home</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('admin') }}"
                                                                       class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ecommerce-widget">
                    <div class="row">
                        @include('admin.admin_components.card_holder',['title'=>'Active Writers','count'=>9,'url'=>'admin/orders/new'])
                        @include('admin.admin_components.card_holder',['title'=>'Inactive Writers','count'=>3,'url'=>'admin/orders/new'])
                        @include('admin.admin_components.card_holder',['title'=>'Sources','count'=>3,'url'=>'sources'])
                        @include('admin.admin_components.card_holder',['title'=>'Total Orders','count'=>3,'url'=>'orders'])
                    </div>
                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Recent Payments</h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">#</th>
                                                <th class="border-0">MPESA ID</th>
                                                <th class="border-0">Writer</th>
                                                <th class="border-0">Phone Number</th>
                                                <th class="border-0">Amount</th>
                                                <th class="border-0">Order Number</th>
                                                <th class="border-0">Date of Payment</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td colspan="6">No Payments made</td>
                                            </tr>
                                            <tr>
                                                <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View All</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Recent Registered Users</h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">#</th>
                                                <th class="border-0">Username</th>
                                                <th class="border-0">Email Address</th>
                                                <th class="border-0">Phone number</th>
                                                <th class="border-0">Registration Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(sizeof($users) == 0)
                                                <tr>
                                                    <td colspan="6">No User found</td>
                                                </tr>
                                            @else
                                                @foreach($users as $key => $user)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $user->username }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->phone }}</td>
                                                        <td>{{ $user->joined }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="9"><a href="{{ url('users') }}" class="btn btn-outline-light float-right">View All</a></td>
                                                </tr>
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

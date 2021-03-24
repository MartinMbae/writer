@extends('admin.layout',['title'=>$title])

@section('content')
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Users</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('admin') }}"
                                                                       class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                                <h5 class="card-header">Users</h5>
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
                                                <th class="border-0">Category</th>
                                                <th class="border-0">Status</th>
                                                <th class="border-0">Action</th>
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
                                                        <td> <span class="badge-dot {{ $user->status == 0 ? 'badge-brand ' : 'badge-success ' }} mr-1"></span> {{ $user->type }}</td>
                                                        <td> <span class="badge-dot {{ $user->active == 0 ? 'badge-success ' : 'badge-danger ' }} mr-1"></span> {{ $user->active == 0 ? "Active" : "Deactivated" }}</td>
                                                        <td><a href="{{ url("users/$user->id") }}"><i class="fa fa-fw fa-eye"></i></a> </td>
                                                    </tr>
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
    </div>
@endsection

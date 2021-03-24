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
                                        <li class="breadcrumb-item"><a href="{{ url('users') }}"
                                                                       class="breadcrumb-link">Users</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">View User</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ecommerce-widget">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card" id="text">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h3 class="mr-auto">User Details</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @include('admin.admin_components.user', ['title'=>'Username', 'child'=> $user->username])
                                        @include('admin.admin_components.user', ['title'=>'Phone Number', 'child'=> $user->phone])
                                        @include('admin.admin_components.user', ['title'=>'Email Address', 'child'=> $user->email])
                                        @include('admin.admin_components.user', ['title'=>'Joined At', 'child'=> $user->joined])
                                        @include('admin.admin_components.user', ['title'=>'Type', 'child'=> $user->type])

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    @if($user->status == 0)
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Change User Level</h5>
                                    <div class="card-body">
                                        <button class="btn btn-outline-danger" onclick="event.preventDefault();
                                                                       var check = confirm('Are you sure you would like to make this user an admin?');
                                                                       if (check === true) {
                                                                       $('#upgrade_user').submit();
                                                                       }">Upgrade User to Admin
                                        </button>

                                        <form id="upgrade_user"
                                              action="{{ url("user/upgrade/admin/$user->id") }}"
                                              method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Change User Level</h5>
                                    <div class="card-body">
                                        <button class="btn btn-outline-danger" onclick="event.preventDefault();
                                                                       var check = confirm('Are you sure you would like to make this user a writer?');
                                                                       if (check === true) {
                                                                       $('#upgrade_user').submit();
                                                                       }">Downgrade User to Writer
                                        </button>

                                        <form id="upgrade_user"
                                              action="{{ url("user/downgrade/writer/$user->id") }}"
                                              method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($user->active == 0)
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Deactivate User</h5>
                                    <div class="card-body">
                                        <button class="btn btn-outline-danger" onclick="event.preventDefault();
                                                                       var check = confirm('Are you sure you would like to deactivate this user?');
                                                                       if (check === true) {
                                                                       $('#deactivate_user').submit();
                                                                       }">Deactivate User
                                        </button>

                                        <form id="deactivate_user"
                                              action="{{ url("user/deactivate/$user->id") }}"
                                              method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Activate User</h5>
                                    <div class="card-body">
                                        <button class="btn btn-outline-success" onclick="event.preventDefault();
                                                                       var check = confirm('Are you sure you would like to activate this user?');
                                                                       if (check === true) {
                                                                       $('#activate_user').submit();
                                                                       }">Activate User
                                        </button>

                                        <form id="activate_user"
                                              action="{{ url("user/activate/$user->id") }}"
                                              method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif



                </div>
            </div>
        </div>
    </div>

@endsection

@extends('admin.layout',['title'=>$title])

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
                                        <li class="breadcrumb-item"><a href="{{ url('admin') }}"
                                                                       class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ url('orders') }}"
                                                                       class="breadcrumb-link">Orders</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">View Order</li>
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
                                        <h3 class="mr-auto">Order Details</h3>
                                            <a class="edit" title="Edit" data-toggle="tooltip" href="{{ url("orders/$order->id/edit") }}" ><i class="material-icons">&#xE254;</i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @include('admin.admin_components.order', ['title'=>'Order Number', 'child'=> $order->order_no])
                                        @include('admin.admin_components.order', ['title'=>'Name of the source', 'child'=> $order->source_name])
                                        @include('admin.admin_components.order', ['title'=>'Paper Type', 'child'=> $order->paper_type])
                                        @include('admin.admin_components.order', ['title'=>'Paper Level', 'child'=> $order->paper_level])
                                        @include('admin.admin_components.order', ['title'=>'Subject', 'child'=> $order->subject])
                                        @include('admin.admin_components.order', ['title'=>'Writing format', 'child'=> $order->writing_format])
                                        @include('admin.admin_components.order', ['title'=>'Spacing required', 'child'=> $order->spacing])
                                        @include('admin.admin_components.order', ['title'=>'Pages', 'child'=> $order->page_count])
                                        @include('admin.admin_components.order', ['title'=>'Slides', 'child'=> $order->slide_count])
                                        @include('admin.admin_components.order', ['title'=>'Source Count', 'child'=> $order->source_count])
                                        @include('admin.admin_components.order', ['title'=>'Deadline', 'child'=> "$order->days Days, $order->hours Hours"])
                                        @include('admin.admin_components.order', ['title'=>'Amount(USD)', 'child'=> $order->amount])
                                        @include('admin.admin_components.order', ['title'=>'Topic', 'child'=> $order->topic])
                                        @include('admin.admin_components.order', ['title'=>'Language', 'child'=> $order->language])
                                        @include('admin.admin_components.order', ['title'=>'Order Instructions', 'child'=> $order->instructions])
                                        @include('admin.admin_components.order', ['title'=>'Notes', 'child'=> $order->notes])
                                        @include('admin.admin_components.order', ['title'=>'Pending Notes', 'child'=> $order->pending_notes])
                                        @include('admin.admin_components.order', ['title'=>'Date Added', 'child'=> $order->created_at])

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card" id="text">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h3 class="mr-auto">Attachments</h3>
                                        <a class="edit" title="Edit" data-toggle="tooltip" href="{{ url("orders/edit_attachments/$order->id") }}" ><i class="material-icons">&#xE254;</i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="lead">Below are files attached to this order. </p>
                                    <div class="row">
                                        @foreach($attachments as $attachment)
                                            @include('admin.admin_components.order_attachments', ['attachment'=>$attachment])
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    @if($order->status == 0)
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Assign this order to a user</h5>
                                    <div class="card-body">
                                        <form method="POST" action="{{ url('assign') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="assign_user">Select User</label>
                                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                <select class="form-control" id="assign_user" name="user_id">
                                                    <option disabled {{ (old("user_id") == null ? "selected":"") }}>
                                                        Select
                                                        User
                                                    </option>
                                                    @foreach($users as $user)
                                                        <option
                                                            value="{{ $user->id }}  {{ (old("user_id") == $user->id ? "selected":"") }}">{{ $user->username }}</option>
                                                    @endforeach
                                                </select>
                                                {!! $errors->first('user_id', '<p class="text-danger">:message</p>') !!}
                                                <br>
                                                <button type="submit" class="btn btn-primary btn-block">Assign</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @elseif($assigned_user != null)
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Order Assignment</h5>
                                    <div class="card-body">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 col-12">
                                            <span class="lead">Order was assigned to: </span>
                                            <ul class="list-unstyled arrow">
                                                <li><span
                                                        class="font-weight-bold">Name : </span> {{ $assigned_user->username }}
                                                </li>
                                                <li><span
                                                        class="font-weight-bold">Email Address : </span> {{ $assigned_user->email }}
                                                </li>
                                                <li><span class="font-weight-bold">Phone Number : </span> I will add
                                                </li>
                                                <li><span
                                                        class="font-weight-bold">Date Assigned : </span>{{ $assignmentDetails->date_of_assignment }}
                                                </li>
                                                <li><span
                                                        class="font-weight-bold">Assignment Status : </span>{{ $assignmentDetails->status }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif


                    @if($order->status == 5)
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">This Order is Cancelled.</h5>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-lg-6">

                                                <button class="btn btn-outline-danger" onclick="event.preventDefault();
                                                                       var check = confirm('Are you sure you would like to delete this order.');
                                                                       if (check === true) {
                                                                       $('#delete_order').submit();
                                                                       }">Delete this Order
                                                </button>
                                                <form id="delete_order"
                                                      action="{{ url("orders/$order->id") }}"
                                                      method="POST" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Cancel this order</h5>
                                    <div class="card-body">
                                        <button class="btn btn-outline-danger" onclick="event.preventDefault();
                                                                       var check = confirm('Are you sure you would like to cancel this order?');
                                                                       if (check === true) {
                                                                       $('#cancel_order').submit();
                                                                       }">Cancel this order
                                        </button>

                                        <form id="cancel_order"
                                              action="{{ url("order/cancel/$order->id") }}"
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
        @include('admin.footer')
    </div>

@endsection

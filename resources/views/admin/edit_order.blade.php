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
                                        <li class="breadcrumb-item"><a href="{{ url('admin') }}" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ url('orders') }}" class="breadcrumb-link">Orders</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Order</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ecommerce-widget">
                        <div class="card">
                            <h5 class="card-header">Edit Order</h5>
                            <div class="card-body">
                                <form method="POST" action="{{ url("orders/$order->id") }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">


                                        @include("admin.admin_components.edit_selection", ['labelText'=> 'Source of the order', 'select_id' => 'source_of_order', 'name' => 'source_id', 'sources' => $sources ])

                                        <div class="form-group">
                                            <label for="order-number-label">Source Order No</label>
                                            <input type="text" id="order-number-label"
                                                   class="form-control {{($errors->first('order_no') ? "form-error" : "")}}" name="order_no"
                                                    value="{{ old('order_no')  == null ? $order->order_no : old('order_no') }}"/>
                                            {!! $errors->first('order_no', '<p class="text-danger">:message</p>') !!}
                                        </div>

                                        <div class="form-group">
                                            <label for="topic">Order Topic</label>
                                            <input type="text" id="topic" class="form-control {{($errors->first('topic') ? "form-error" : "")}}"
                                                   name="topic"
                                                   value="{{ old('topic')  == null ? $order->topic : old('topic') }}"/>
                                            {!! $errors->first('topic', '<p class="text-danger">:message</p>') !!}
                                        </div>


                                        @include("admin.admin_components.edit_selection", ['labelText'=> 'Paper Type', 'select_id' => 'paperType', 'name' => 'paper_type', 'sources' => null, 'lists' => $paper_types ])


                                        @include("admin.admin_components.edit_selection", ['labelText'=> 'Subject', 'select_id' => 'subject', 'name' => 'subject', 'sources' => null, 'lists' => $subjects ])


                                        <div class="form-group">
                                            <label for="page_count">Page Count</label>
                                            <input type="number" id="page_count"
                                                   class="form-control {{($errors->first('page_count') ? "form-error" : "")}}" name="page_count"
                                                   value="{{ old('page_count')  == null ? $order->page_count : old('page_count') }}"/>
                                            {!! $errors->first('page_count', '<p class="text-danger">:message</p>') !!}
                                        </div>

                                        <div class="form-group">
                                            <label for="slide_count">Slide Count</label>
                                            <input type="number" id="slide_count"
                                                   class="form-control {{($errors->first('slide_count') ? "form-error" : "")}}"
                                                   name="slide_count"
                                                   value="{{ old('slide_count')  == null ? $order->slide_count : old('slide_count') }}"/>
                                            {!! $errors->first('slide_count', '<p class="text-danger">:message</p>') !!}
                                        </div>

                                        <div class="form-group">
                                            <label for="source_count">Source Count</label>
                                            <input type="number" id="source_count"
                                                   class="form-control {{($errors->first('source_count') ? "form-error" : "")}}"
                                                   name="source_count"
                                            value="{{ old('source_count')  == null ? $order->source_count : old('source_count') }}"/>
                                            {!! $errors->first('source_count', '<p class="text-danger">:message</p>') !!}
                                        </div>

                                        @include("admin.admin_components.edit_selection", ['labelText'=> 'Paper Level', 'select_id' => 'paper_level', 'name' => 'paper_level', 'sources' => null, 'lists' => $paper_levels])

                                        @include("admin.admin_components.edit_selection", ['labelText'=> 'Writing Format', 'select_id' => 'writing_format', 'name' => 'writing_format', 'sources' => null, 'lists' => $writing_formats])

                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                        @include("admin.admin_components.edit_selection", ['labelText'=> 'Spacing', 'select_id' => 'spacing', 'name' => 'spacing', 'sources' => null, 'lists' => $spacings])
                                        @include("admin.admin_components.edit_selection", ['labelText'=> 'Language', 'select_id' => 'language', 'name' => 'language', 'sources' => null, 'lists' => $languages])


                                        <div class="form-group">
                                            <label for="amount">Amount Paid in USD</label>
                                            <input type="number" id="amount"
                                                   class="form-control {{($errors->first('amount') ? "form-error" : "")}}"
                                                   name="amount" step="0.1"
                                                   value="{{ old('amount')  == null ? $order->amount : old('amount') }}"/>
                                            {!! $errors->first('amount', '<p class="text-danger">:message</p>') !!}
                                        </div>


                                        <div class="form-group">
                                            <label for="deadline">Deadline</label>

                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text">Days</span></div>
                                                <input type="number" id="deadline"
                                                       class="form-control {{($errors->first('days') ? "form-error" : "")}}"
                                                       name="days"
                                                       value="{{ old('days')  == null ? $order->days : old('days') }}"/>
                                                {!! $errors->first('days', '<p class="text-danger">:message</p>') !!}
                                            </div>

                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text">Hours</span></div>
                                                <input type="number" id="deadline"
                                                       class="form-control {{($errors->first('hours') ? "form-error" : "")}}"
                                                       name="hours"
                                                       value="{{ old('hours')  == null ? $order->hours : old('hours') }}"/>
                                                {!! $errors->first('hours', '<p class="text-danger">:message</p>') !!}
                                            </div>
                                        </div>

                                        <br>
                                        <div class="form-group">
                                            <label for="instructions">Order Instructions</label>
                                            <textarea class="form-control {{($errors->first('instructions') ? "form-error" : "")}}"
                                                      id="instructions" rows="3" name="instructions">{{  old('instructions')  == null ? $order->instructions : old('instructions') }}</textarea>
                                            {!! $errors->first('instructions', '<p class="text-danger">:message</p>') !!}

                                        </div>
                                        <div class="form-group">
                                            <label for="notes">Order Notes</label>
                                            <textarea class="form-control {{($errors->first('notes') ? "form-error" : "")}}" id="notes" rows="3"
                                                      name="notes">{{  old('notes')  == null ? $order->notes : old('notes') }}</textarea>
                                            {!! $errors->first('notes', '<p class="text-danger">:message</p>') !!}

                                        </div>

                                        <div class="form-group">
                                            <label for="pending_notes">Pending notes</label>
                                            <textarea class="form-control {{($errors->first('pending_notes') ? "form-error" : "")}}"
                                                      id="pending_notes" rows="3" name="pending_notes">{{  old('pending_notes')  == null ? $order->pending_notes : old('pending_notes') }}</textarea>
                                            {!! $errors->first('pending_notes', '<p class="text-danger">:message</p>') !!}

                                        </div>

                                        <div class="row justify-content-end">
                                            <button type="submit" class="btn btn-primary" style="margin-right: 20px">Update</button>
                                        </div>
                                    </div>
                            </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        @include('admin.footer')
    </div>
@endsection

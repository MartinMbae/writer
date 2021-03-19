@extends('layouts.app')

@section('navbar')
    @include('navigation-menu-admin')
@endsection

@section('header')
    <h2 class="h4 font-weight">
        Order Number : {{ $order->order_no }}
    </h2>
@endsection
@section('content')

    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header bg-primary" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn" style="color: white" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        About this work
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="source-name-label">Name of the source</label>
                                    <input type="text" disabled class="form-control" id="source-name-label"
                                           value="{{ $order->source_name}}"/>

                                </div>
                                <div class="form-group">
                                    <label>Paper Type</label>
                                    <input type="text" disabled class="form-control" value="{{ $order->paper_type}}"/>

                                </div>
                                <div class="form-group">
                                    <label>Paper Level</label>
                                    <input type="text" disabled class="form-control" value="{{ $order->paper_level}}"/>

                                </div>
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" disabled class="form-control" value="{{ $order->subject}}"/>

                                </div>
                                <div class="form-group">
                                    <label>Writing format</label>
                                    <input type="text" disabled class="form-control"
                                           value="{{ $order->writing_format}}"/>

                                </div>
                                <div class="form-group">
                                    <label>Spacing required</label>
                                    <input type="text" disabled class="form-control" value="{{ $order->spacing}}"/>
                                </div>
                                <div class="form-group">
                                    <label>Pages</label>
                                    <input type="text" disabled class="form-control" value="{{ $order->page_count}}"/>
                                </div>
                                <div class="form-group">
                                    <label>Slides</label>
                                    <input type="text" disabled class="form-control" value="{{ $order->slide_count}}"/>
                                </div>
                                <div class="form-group">
                                    <label>Source Count</label>
                                    <input type="text" disabled class="form-control" value="{{ $order->source_count}}"/>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Deadline</label>
                                    <input type="text" disabled class="form-control"
                                           value="{{ $order->days}} Days, {{ $order->hours}} Hours"/>
                                </div>
                                <div class="form-group">
                                    <label>Amount(USD)</label>
                                    <input type="text" disabled class="form-control" value="{{ $order->amount}}"/>
                                </div>
                                <div class="form-group">
                                    <label>Topic</label>
                                    <input type="text" disabled class="form-control" value="{{ $order->topic}}"/>
                                </div>
                                <div class="form-group">
                                    <label>Language</label>
                                    <input type="text" disabled class="form-control" value="{{ $order->language}}"/>
                                </div>
                                <div class="form-group">
                                    <label>Order Instructions</label>
                                    <textarea class="form-control" disabled>{{ $order->instructions }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea class="form-control" disabled>{{ $order->notes }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Pending Notes</label>
                                    <textarea class="form-control" disabled>{{ $order->pending_notes }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Date Added</label>
                                    <input type="text" disabled class="form-control" value="{{ $order->created_at}}"/>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="accordion" id="accordionTwo">
        <div class="card">
            <div class="card-header bg-primary" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn" style="color: white" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        View order attachments
                    </button>
                </h5>
            </div>
            <hr>

            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionTwo">
                <div class="card-body">
                    <div class="container-fluid">
                        <h4><u>Order attachments</u></h4>
                        <div class="row">
                            <ul style="list-style: none">
                            @foreach($attachments as $attachment)
                                <li><a href="{{url('/')}}{{ Storage::disk()->url($attachment)}}">{{ $attachment }}</a></li>
                            @endforeach

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="assign_user">Assign to user</label>
                    <select class="form-control" id="assign_user" name="user_id">
                        <option disabled {{ (old("user_id") == null ? "selected":"") }}>Assign to user</option>
                        @foreach($users as $user)
                            <option
                                value="{{ $user->id }}  {{ (old("user_id") == $user->id ? "selected":"") }}">{{ $user->username }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('user_id', '<p class="text-danger">:message</p>') !!}
                </div>

            </div>
        </div>
    </div>

@endsection


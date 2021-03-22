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
                                        <li class="breadcrumb-item active" aria-current="page">Create a new Order</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ecommerce-widget">
                        <div class="card">
                            <h5 class="card-header">Create a new Order</h5>
                            <div class="card-body">
                                <form method="POST" action="{{ url('orders') }}">
                                    @csrf
                                    <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                        <div class="form-group">
                                            <label for="source_of_order">Source of the order</label>
                                            <select class="form-control" id="source_of_order" name="source_id">
                                                <option disabled {{ (old("source_id") == null ? "selected":"") }}></option>
                                                @foreach($sources as $source)
                                                    <option
                                                        value="{{ $source->id }}" {{ (old("source_id") == $source->id ? "selected":"") }}>{{ $source->name }}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('source_id', '<p class="text-danger">:message</p>') !!}
                                        </div>

                                        <div class="form-group">
                                            <label for="order-number-label">Source Order No</label>
                                            <input type="text" id="order-number-label"
                                                   class="form-control {{($errors->first('order_no') ? "form-error" : "")}}" name="order_no"
                                                    value="{{ old('order_no') }}"/>
                                            {!! $errors->first('order_no', '<p class="text-danger">:message</p>') !!}
                                        </div>

                                        <div class="form-group">
                                            <label for="topic">Order Topic</label>
                                            <input type="text" id="topic" class="form-control {{($errors->first('topic') ? "form-error" : "")}}"
                                                   name="topic"  value="{{ old('topic') }}"/>
                                            {!! $errors->first('topic', '<p class="text-danger">:message</p>') !!}
                                        </div>

                                        <div class="form-group">
                                            <label for="paperType">Paper Type</label>
                                            <select class="form-control" id="paperType" name="paper_type">
                                                <option disabled {{ (old("paper_type") == null ? "selected":"") }}></option>
                                                @foreach($paper_types as $paper_type)
                                                    <option
                                                        value="{{ $paper_type }}" {{ (old("paper_type") == $paper_type ? "selected":"") }}>{{ $paper_type }}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('paper_type', '<p class="text-danger">:message</p>') !!}
                                        </div>


                                        <div class="form-group">
                                            <label for="subject">Subject</label>
                                            <select class="form-control" id="subject" name="subject">
                                                <option disabled {{ (old("subject") == null ? "selected":"") }}></option>
                                                @foreach($subjects as $subject)
                                                    <option
                                                        value="{{ $subject }}" {{ (old("subject") == $subject ? "selected":"") }}>{{ $subject }}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('subject', '<p class="text-danger">:message</p>') !!}
                                        </div>


                                        <div class="form-group">
                                            <label for="page_count">Page Count</label>
                                            <input type="number" id="page_count"
                                                   class="form-control {{($errors->first('page_count') ? "form-error" : "")}}" name="page_count"
                                                   value="{{ old('page_count') }}"/>
                                            {!! $errors->first('page_count', '<p class="text-danger">:message</p>') !!}
                                        </div>

                                        <div class="form-group">
                                            <label for="slide_count">Slide Count</label>
                                            <input type="number" id="slide_count"
                                                   class="form-control {{($errors->first('slide_count') ? "form-error" : "")}}"
                                                   name="slide_count" value="{{ old('slide_count') }}"/>
                                            {!! $errors->first('slide_count', '<p class="text-danger">:message</p>') !!}
                                        </div>

                                        <div class="form-group">
                                            <label for="source_count">Source Count</label>
                                            <input type="number" id="source_count"
                                                   class="form-control {{($errors->first('source_count') ? "form-error" : "")}}"
                                                   name="source_count" value="{{ old('source_count') }}"/>
                                            {!! $errors->first('source_count', '<p class="text-danger">:message</p>') !!}
                                        </div>

                                        <div class="form-group">
                                            <label for="paper_level">Paper Level</label>
                                            <select class="form-control" id="paper_level" name="paper_level">
                                                <option disabled {{ (old("paper_level") == null ? "selected":"") }}></option>
                                                @foreach($paper_levels as $paper_level)
                                                    <option
                                                        value="{{ $paper_level }}" {{ (old("paper_level") == $paper_level ? "selected":"") }}>{{ $paper_level }}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('paper_level', '<p class="text-danger">:message</p>') !!}
                                        </div>


                                        <div class="form-group">
                                            <label for="writing_format">Writing Format</label>
                                            <select class="form-control" id="writing_format" name="writing_format">
                                                <option disabled {{ (old("writing_format") == null ? "selected":"") }}></option>
                                                @foreach($writing_formats as $writing_format)
                                                    <option
                                                        value="{{ $writing_format }}" {{ (old("writing_format") == $writing_format ? "selected":"") }}>{{ $writing_format }}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('writing_format', '<p class="text-danger">:message</p>') !!}
                                        </div>

                                        <div class="form-group">
                                            <label for="spacing">Spacing</label>
                                            <select class="form-control" id="spacing" name="spacing">
                                                <option disabled {{ (old("spacing") == null ? "selected":"") }}></option>
                                                @foreach($spacings as $spacing)
                                                    <option
                                                        value="{{ $spacing }}" {{ (old("spacing") == $spacing ? "selected":"") }}>{{ $spacing }}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('spacing', '<p class="text-danger">:message</p>') !!}
                                        </div>

                                        <div class="form-group">
                                            <label for="language">Language</label>
                                            <select class="form-control" id="language" name="language">
                                                <option disabled {{ (old("language") == null ? "selected":"") }}></option>
                                                @foreach($languages as $language)
                                                    <option
                                                        value="{{ $language }}" {{ (old("language") == $language ? "selected":"") }}>{{ $language }}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('language', '<p class="text-danger">:message</p>') !!}
                                        </div>

                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="amount">Amount Paid in USD</label>
                                            <input type="number" id="amount"
                                                   class="form-control {{($errors->first('amount') ? "form-error" : "")}}"
                                                   name="amount" step="0.1" value="{{ old('amount') }}"/>
                                            {!! $errors->first('amount', '<p class="text-danger">:message</p>') !!}
                                        </div>



                                        <div class="form-group">
                                            <label for="deadline">Deadline</label>

                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text">Days</span></div>
                                                <input type="number" id="deadline"
                                                       class="form-control {{($errors->first('days') ? "form-error" : "")}}"
                                                       name="days" value="{{ old('days') }}"/>
                                                {!! $errors->first('days', '<p class="text-danger">:message</p>') !!}
                                            </div>

                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text">Hours</span></div>
                                                <input type="number" id="deadline"
                                                       class="form-control {{($errors->first('hours') ? "form-error" : "")}}"
                                                       name="hours" value="{{ old('hours') }}"/>
                                                {!! $errors->first('hours', '<p class="text-danger">:message</p>') !!}
                                            </div>
                                        </div>

                                        <br>
                                        <div class="form-group">
                                            <label for="instructions">Order Instructions</label>
                                            <textarea class="form-control {{($errors->first('instructions') ? "form-error" : "")}}"
                                                      id="instructions" rows="3" name="instructions">{{ old('instructions') }}</textarea>
                                            {!! $errors->first('instructions', '<p class="text-danger">:message</p>') !!}

                                        </div>
                                        <div class="form-group">
                                            <label for="notes">Order Notes</label>
                                            <textarea class="form-control {{($errors->first('notes') ? "form-error" : "")}}" id="notes" rows="3"
                                                      name="notes">{{ old('notes') }}</textarea>
                                            {!! $errors->first('notes', '<p class="text-danger">:message</p>') !!}

                                        </div>

                                        <div class="form-group">
                                            <label for="pending_notes">Pending notes</label>
                                            <textarea class="form-control {{($errors->first('pending_notes') ? "form-error" : "")}}"
                                                      id="pending_notes" rows="3" name="pending_notes">{{ old('pending_notes') }}</textarea>
                                            {!! $errors->first('pending_notes', '<p class="text-danger">:message</p>') !!}

                                        </div>


                                        <div class="form-group">
                                            <label for="pending_notes">Attachments</label>

                                            <div id="myId" class="fallback dropzone">
                                            </div>
                                        </div>

                                        <input type="hidden" name="random_id" value="{{ old('random_id') == null ? $random: old('random_id')  }}">
                                        <script>
                                            let randomV =  {!! json_encode(old('random_id') == null ? $random: old('random_id')) !!};
                                            $("div#myId").dropzone({
                                                url: "/order_files/"+randomV
                                            });
                                        </script>

                                        <div class="row justify-content-end">
                                            <button type="submit" class="btn btn-primary" style="margin-right: 20px">Submit</button>
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

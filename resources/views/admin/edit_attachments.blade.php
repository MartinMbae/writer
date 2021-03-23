@extends('admin.layout',['title'=>$title])

@section('content')
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">


                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Attachments</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('admin') }}"
                                                                       class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ url('orders') }}"
                                                                       class="breadcrumb-link">Orders</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit attachments</li>
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
                                        <h3 class="mr-auto">Attachments</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="lead">Below are files attached to this order. </p>
                                    <div class="row">
                                        @if(sizeof($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @include('admin.admin_components.order_attachments', ['attachment'=>$attachment, 'edit'=> true])
                                        @endforeach
                                        @else
                                        <span class="text-danger" style="margin-left: 20px">No attachment found</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="card-body border-top">
                                    <div class="accordion">
                                        <div id="accordion3">
                                            <div class="card">
                                                <div class="card-header" id="headingSeven">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseAttachment" aria-expanded="false" aria-controls="collapseAttachment">
                                                            <span class="fas mr-3 fa-angle-down"></span>Add More Attachments
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseAttachment" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion3" style="">
                                                    <div class="card-body">

                                                        <div class="form-group">
                                                            <label for="pending_notes">Attachments</label>

                                                            <div id="myId" class="fallback dropzone">
                                                            </div>
                                                        </div>

                                                        <script>
                                                            let randomV =  {!! json_encode($order->random_id) !!};
                                                            $("div#myId").dropzone({
                                                                url: "/order_files/"+randomV
                                                            });
                                                        </script>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                </div>
            </div>
        </div>
        @include('admin.footer')
    </div>

@endsection

@extends('admin.layout',['title'=>$title])

@section('content')
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Sources</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('admin') }}" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ url('sources') }}" class="breadcrumb-link">Sources</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit "{{ $source->name }}"</li>
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
                                <h5 class="card-header">Edit a Source</h5>
                                <div class="card-body">
                                    <form method="POST" action="{{ url("sources/$source->id") }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Name of the Source</label>
                                            <input id="inputText3" type="text" class="form-control {{($errors->first('name') ? "form-error" : "")}}" name="name" value="{{ old('name') == null ? $source->name : old('name')  }}"/>
                                            {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Brief description of the source</label>
                                            <textarea class="form-control {{($errors->first('description') ? "form-error" : "")}}" id="desc" rows="3" name="description" >{{ old('description') == null ? $source->description : old('description')  }}</textarea>
                                            {!! $errors->first('description', '<p class="text-danger">:message</p>') !!}
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

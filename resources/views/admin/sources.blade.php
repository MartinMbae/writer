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
                                        <li class="breadcrumb-item"><a href="{{ url('admin') }}"
                                                                       class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">View all Sources</li>
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
                                <h5 class="card-header">Sources</h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">#</th>
                                                <th class="border-0">Name of the source</th>
                                                <th class="border-0">Description</th>
                                                <th class="border-0">% of Orders</th>
                                                <th class="border-0">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @if(sizeof($sources) == 0)
                                                <tr>
                                                    <td colspan="3">You have not added any source</td>
                                                </tr>
                                            @else
                                                @foreach($sources as $key => $source)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $source->name }}</td>
                                                        <td>{{ $source->description }}</td>
                                                        <td><span class="ml-1 text-success">5.86%</span></td>
                                                        <td>
                                                            <a class="edit" title="Edit" data-toggle="tooltip"
                                                               href="{{ url("sources/$source->id/edit") }}"><i
                                                                    class="material-icons">&#xE254;</i></a>
                                                            <a class="delete" title="Delete" data-toggle="tooltip"
                                                               href="#" onclick="event.preventDefault();
                                                                       var check = confirm('Are you sure you want to delete this source?');
                                                                       if (check === true) {
                                                                       $('#delete_source').submit();
                                                                       }"><i class="material-icons">&#xE872;</i></a>
                                                            <form id="delete_source"
                                                                  action="{{ url("sources/$source->id") }}"
                                                                  method="POST" class="d-none">
                                                                @csrf
                                                                {{ method_field('DELETE') }}
                                                            </form>
                                                        </td>

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

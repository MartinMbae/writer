@if($attachment->is_image)
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <!-- .card -->
        <div class="card card-figure">
            <!-- .card-figure -->
            <figure class="figure">
                <!-- .figure-img -->
                <div class="figure-attachment">
                    <img src="{{url('/')}}{{ Storage::disk()->url($attachment->name)}}" alt="{{ $attachment->trimmed_name }}" class="img-fluid"></div>
                <!-- /.figure-img -->
                <figcaption class="figure-caption">
                    <ul class="list-inline d-flex text-muted mb-0">
                        <li class="list-inline-item text-truncate mr-auto">{{ $attachment->trimmed_name }}</li>
                        <li class="list-inline-item">
                            <a href="{{url('/')}}{{ Storage::disk()->url($attachment->name)}}" download="{{url('/')}}{{ Storage::disk()->url($attachment->name)}}"> <span><i
                                        class="fas fa-download "></i></span></a>
                        </li>
                    </ul>
                </figcaption>
            </figure>
            <!-- /.card-figure -->
        </div>
        <!-- /.card -->
    </div>
@else
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <!-- .card -->
        <div class="card card-figure">
            <!-- .card-figure -->
            <figure class="figure">
                <!-- .figure-img -->
                <div class="figure-attachment">
                                            <span class="fa-stack fa-lg">
                                                       <i class="fa fa-square fa-stack-2x text-primary"></i>
                                                       <i class="fa fa-file-pdf fa-stack-1x fa-inverse"></i>
                                                          </span>
                </div>
                <!-- /.figure-img -->
                <figcaption class="figure-caption">
                    <ul class="list-inline d-flex text-muted mb-0">
                        <li class="list-inline-item text-truncate mr-auto">
                            <span><i class="fas fa-file-pdf"></i></span>{{ $attachment->trimmed_name }}
                        </li>
                        <li class="list-inline-item">
                            <a download="{{url('/')}}{{ Storage::disk()->url($attachment->name)}}" href="{{url('/')}}{{ Storage::disk()->url($attachment->name)}}">

                                <i class="fas fa-download "></i></a>
                        </li>
                    </ul>
                </figcaption>
            </figure>
            <!-- /.card-figure -->
        </div>
        <!-- /.card -->
    </div>
@endif


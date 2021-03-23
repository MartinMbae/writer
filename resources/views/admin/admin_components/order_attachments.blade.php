@if($attachment->is_image)
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <!-- .card -->
        <div class="card card-figure">
            <!-- .card-figure -->
            <figure class="figure">
                <!-- .figure-img -->
                <div class="figure-attachment">
                    <img src="{{url('/')}}{{ Storage::disk()->url($attachment->name)}}"
                         alt="{{ $attachment->trimmed_name }}" class="img-fluid"></div>
                <!-- /.figure-img -->
                <figcaption class="figure-caption">
                    <ul class="list-inline d-flex text-muted mb-0">
                        <li class="list-inline-item text-truncate mr-auto">{{ $attachment->trimmed_name }}</li>
                        <li class="list-inline-item">
                            <a href="{{url('/')}}{{ Storage::disk()->url($attachment->name)}}"
                               download="{{url('/')}}{{ Storage::disk()->url($attachment->name)}}"> <span><i
                                        class="fas fa-download "></i></span></a>
                        </li>
                        @if($edit)
                            <li class="list-inline-item">
                                <a onclick="event.preventDefault();
                                    var check = confirm('Are you sure you would like to delete this attachment.');
                                    if (check === true) {
                                    let attachment_id=  {!! json_encode($attachment->id) !!};
                                    $('#delete_attachment'+attachment_id).submit();
                                    }"
                                   href="#"> <span>
                                        <i class="m-r-10 mdi mdi-delete-forever"></i></span></a>
                            </li>
                            <form id="delete_attachment{{ $attachment->id }}"
                                  action="{{ url("orders/delete/attachment/$attachment->id") }}"
                                  method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endif
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
                            <a download="{{url('/')}}{{ Storage::disk()->url($attachment->name)}}"
                               href="{{url('/')}}{{ Storage::disk()->url($attachment->name)}}">

                                <i class="fas fa-download "></i></a>
                        </li>
                        @if($edit)
                            <li class="list-inline-item">
                                <a onclick="event.preventDefault();
                                                                       var check = confirm('Are you sure you would like to delete this attachment.');
                                                                       if (check === true) {
                                    let attachment_id=  {!! json_encode($attachment->id) !!};
                                                                       $('#delete_attachment'+attachment_id).submit();
                                                                       }"
                                   href="#"> <span>
                                        <i class="m-r-10 mdi mdi-delete-forever"></i></span></a>
                            </li>
                            <form id="delete_attachment{{ $attachment->id }}"
                                  action="{{ url("orders/delete/attachment/$attachment->id") }}"
                                  method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endif
                    </ul>
                </figcaption>
            </figure>
            <!-- /.card-figure -->
        </div>
        <!-- /.card -->
    </div>
@endif



<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12" style="margin-bottom: 20px">
    <div class="card border-3 border-top border-top-primary">
        <div class="card-body">
            <h5 class="text-muted">{{ $title }}</h5>
            <div class="metric-value d-inline-block">
                <h1 class="mb-1">{{ $count  }}</h1>
            </div>
            <a href="{{ url("$url") }}">
                <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                        <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i
                                class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">View</span>
                </div>
            </a>
        </div>
    </div>
</div>

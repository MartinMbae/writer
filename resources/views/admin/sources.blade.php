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


                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Visual Distribution of Orders</h5>
                                <div class="card-body">
                                    <div id="c3chart_category" style="height: 420px; max-height: 420px; position: relative;" class="c3"><svg width="593" height="420" style="overflow: hidden;"><defs><clipPath id="c3-1616414862594-clip"><rect width="593" height="396"></rect></clipPath><clipPath id="c3-1616414862594-clip-xaxis"><rect x="-31" y="-20" width="655" height="40"></rect></clipPath><clipPath id="c3-1616414862594-clip-yaxis"><rect x="-29" y="-4" width="20" height="420"></rect></clipPath><clipPath id="c3-1616414862594-clip-grid"><rect width="593" height="396"></rect></clipPath><clipPath id="c3-1616414862594-clip-subchart"><rect width="593" height="0"></rect></clipPath></defs><g transform="translate(0.5,4.5)"><text class="c3-text c3-empty" text-anchor="middle" dominant-baseline="middle" x="296.5" y="198" style="opacity: 0;"></text><g clip-path="url(file:///home/martin/Documents/concept/index.html#c3-1616414862594-clip)" class="c3-regions" style="visibility: hidden;"></g><g clip-path="url(file:///home/martin/Documents/concept/index.html#c3-1616414862594-clip-grid)" class="c3-grid" style="visibility: hidden;"><g class="c3-xgrid-focus"><line class="c3-xgrid-focus" x1="-10" x2="-10" y1="0" y2="396" style="visibility: hidden;"></line></g></g><g clip-path="url(file:///home/martin/Documents/concept/index.html#c3-1616414862594-clip)" class="c3-chart"><g class="c3-chart-bars"><g class="c3-chart-bar c3-target c3-target-Men" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Men c3-bars c3-bars-Men" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-Women" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Women c3-bars c3-bars-Women" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-Accessories" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Accessories c3-bars c3-bars-Accessories" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-Children" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Children c3-bars c3-bars-Children" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-Apperal" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Apperal c3-bars c3-bars-Apperal" style="cursor: pointer;"></g></g></g><g class="c3-chart-lines"><g class="c3-chart-line c3-target c3-target-Men" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Men c3-lines c3-lines-Men"></g><g class=" c3-shapes c3-shapes-Men c3-areas c3-areas-Men"></g><g class=" c3-selected-circles c3-selected-circles-Men"></g><g class=" c3-shapes c3-shapes-Men c3-circles c3-circles-Men" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-Women" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Women c3-lines c3-lines-Women"></g><g class=" c3-shapes c3-shapes-Women c3-areas c3-areas-Women"></g><g class=" c3-selected-circles c3-selected-circles-Women"></g><g class=" c3-shapes c3-shapes-Women c3-circles c3-circles-Women" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-Accessories" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Accessories c3-lines c3-lines-Accessories"></g><g class=" c3-shapes c3-shapes-Accessories c3-areas c3-areas-Accessories"></g><g class=" c3-selected-circles c3-selected-circles-Accessories"></g><g class=" c3-shapes c3-shapes-Accessories c3-circles c3-circles-Accessories" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-Children" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Children c3-lines c3-lines-Children"></g><g class=" c3-shapes c3-shapes-Children c3-areas c3-areas-Children"></g><g class=" c3-selected-circles c3-selected-circles-Children"></g><g class=" c3-shapes c3-shapes-Children c3-circles c3-circles-Children" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-Apperal" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Apperal c3-lines c3-lines-Apperal"></g><g class=" c3-shapes c3-shapes-Apperal c3-areas c3-areas-Apperal"></g><g class=" c3-selected-circles c3-selected-circles-Apperal"></g><g class=" c3-shapes c3-shapes-Apperal c3-circles c3-circles-Apperal" style="cursor: pointer;"></g></g></g><g class="c3-chart-arcs" transform="translate(296.5,193)"><text class="c3-chart-arcs-title" style="text-anchor: middle; opacity: 1;"></text><g class="c3-chart-arc c3-target c3-target-Men"><g class=" c3-shapes c3-shapes-Men c3-arcs c3-arcs-Men"><path class=" c3-shape c3-shape c3-arc c3-arc-Men" transform="" style="fill: rgb(89, 105, 255); cursor: pointer;" d="M1.1226949531183361e-14,-183.35A183.35,183.35,0,0,1,151.75677781206588,102.89364843419281L91.05406668723953,61.736189060515684A110.00999999999999,110.00999999999999,0,0,0,6.736169718710016e-15,-110.00999999999999Z"></path></g><text dy=".35em" class="" transform="translate(129.59354667934264,-68.70615008184521)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text></g><g class="c3-chart-arc c3-target c3-target-Women"><g class=" c3-shapes c3-shapes-Women c3-arcs c3-arcs-Women"><path class=" c3-shape c3-shape c3-arc c3-arc-Women" transform="" style="fill: rgb(255, 64, 123); cursor: pointer;" d="M151.75677781206588,102.89364843419281A183.35,183.35,0,0,1,-126.08969578077512,133.11127344410605L-75.65381746846506,79.86676406646363A110.00999999999999,110.00999999999999,0,0,0,91.05406668723953,61.736189060515684Z"></path></g><text dy=".35em" class="" transform="translate(15.858897622423793,145.82015555540147)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text></g><g class="c3-chart-arc c3-target c3-target-Accessories"><g class=" c3-shapes c3-shapes-Accessories c3-arcs c3-arcs-Accessories"><path class=" c3-shape c3-shape c3-arc c3-arc-Accessories" transform="" style="fill: rgb(37, 213, 242); cursor: pointer;" d="M-126.08969578077512,133.11127344410605A183.35,183.35,0,0,1,-176.66689112839956,-49.051320869332514L-106.00013467703972,-29.430792521599507A110.00999999999999,110.00999999999999,0,0,0,-75.65381746846506,79.86676406646363Z"></path></g><text dy=".35em" class="" transform="translate(-141.3335129027196,39.24105669546618)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text></g><g class="c3-chart-arc c3-target c3-target-Children"><g class=" c3-shapes c3-shapes-Children c3-arcs c3-arcs-Children"><path class=" c3-shape c3-shape c3-arc c3-arc-Children" transform="" style="fill: rgb(255, 199, 80); cursor: pointer;" d="M-176.66689112839956,-49.051320869332514A183.35,183.35,0,0,1,-76.98666677107457,-166.40395319666993L-46.19200006264474,-99.84237191800196A110.00999999999999,110.00999999999999,0,0,0,-106.00013467703972,-29.430792521599507Z"></path></g><text dy=".35em" class="" transform="translate(-111.79393024612177,-94.95862025179842)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text></g><g class="c3-chart-arc c3-target c3-target-Apperal"><g class=" c3-shapes c3-shapes-Apperal c3-arcs c3-arcs-Apperal"><path class=" c3-shape c3-shape c3-arc c3-arc-Apperal" transform="" style="fill: rgb(46, 197, 81); cursor: pointer;" d="M-76.98666677107457,-166.40395319666993A183.35,183.35,0,0,1,-3.368084859355008e-14,-183.35L-2.0208509156130047e-14,-110.00999999999999A110.00999999999999,110.00999999999999,0,0,0,-46.19200006264474,-99.84237191800196Z"></path></g><text dy=".35em" class="" transform="translate(-31.53186417015305,-143.2507031115555)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text></g></g><g class="c3-chart-texts"><g class="c3-chart-text c3-target c3-target-Men  " style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Men"></g></g><g class="c3-chart-text c3-target c3-target-Women  " style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Women"></g></g><g class="c3-chart-text c3-target c3-target-Accessories  " style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Accessories"></g></g><g class="c3-chart-text c3-target c3-target-Children  " style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Children"></g></g><g class="c3-chart-text c3-target c3-target-Apperal  " style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Apperal"></g></g></g><g class="c3-event-rects" style="fill-opacity: 0;"><rect class="c3-event-rect" x="0" y="0" width="593" height="396"></rect></g></g><g clip-path="url(file:///home/martin/Documents/concept/index.html#c3-1616414862594-clip-grid)" class="c3-grid c3-grid-lines"><g class="c3-xgrid-lines"></g><g class="c3-ygrid-lines"></g></g><g class="c3-axis c3-axis-x" clip-path="url(file:///home/martin/Documents/concept/index.html#c3-1616414862594-clip-xaxis)" transform="translate(0,396)" style="visibility: visible; opacity: 0;"><text class="c3-axis-x-label" transform="" style="text-anchor: end;" x="593" dx="-0.5em" dy="-0.5em"></text><g class="tick" transform="translate(297, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">0</tspan></text></g><path class="domain" d="M0,6V0H593V6"></path></g><g class="c3-axis c3-axis-y" clip-path="url(file:///home/martin/Documents/concept/index.html#c3-1616414862594-clip-yaxis)" transform="translate(0,0)" style="visibility: visible; opacity: 0;"><text class="c3-axis-y-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="1.2em"></text><g class="tick" transform="translate(0,364)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">20</tspan></text></g><g class="tick" transform="translate(0,322)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">30</tspan></text></g><g class="tick" transform="translate(0,281)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">40</tspan></text></g><g class="tick" transform="translate(0,240)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">50</tspan></text></g><g class="tick" transform="translate(0,199)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">60</tspan></text></g><g class="tick" transform="translate(0,158)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">70</tspan></text></g><g class="tick" transform="translate(0,117)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">80</tspan></text></g><g class="tick" transform="translate(0,76)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">90</tspan></text></g><g class="tick" transform="translate(0,34)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">100</tspan></text></g><path class="domain" d="M-6,1H0V396H-6"></path></g><g class="c3-axis c3-axis-y2" transform="translate(593,0)" style="visibility: hidden; opacity: 0;"><text class="c3-axis-y2-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="-0.5em"></text><g class="tick" transform="translate(0,396)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0</tspan></text></g><g class="tick" transform="translate(0,357)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.1</tspan></text></g><g class="tick" transform="translate(0,317)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.2</tspan></text></g><g class="tick" transform="translate(0,278)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.3</tspan></text></g><g class="tick" transform="translate(0,238)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.4</tspan></text></g><g class="tick" transform="translate(0,199)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.5</tspan></text></g><g class="tick" transform="translate(0,159)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.6</tspan></text></g><g class="tick" transform="translate(0,120)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.7</tspan></text></g><g class="tick" transform="translate(0,80)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.8</tspan></text></g><g class="tick" transform="translate(0,41)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.9</tspan></text></g><g class="tick" transform="translate(0,1)" style="opacity: 1;"><line x2="6"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">1</tspan></text></g><path class="domain" d="M6,1H0V396H6"></path></g></g><g transform="translate(0.5,420.5)" style="visibility: hidden;"><g clip-path="url(file:///home/martin/Documents/concept/index.html#c3-1616414862594-clip-subchart)" class="c3-chart"><g class="c3-chart-bars"></g><g class="c3-chart-lines"></g></g><g clip-path="url(file:///home/martin/Documents/concept/index.html#c3-1616414862594-clip)" class="c3-brush" fill="none" pointer-events="all" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><rect class="overlay" pointer-events="all" cursor="crosshair" x="0" y="0" width="593" height="0"></rect><rect class="selection" cursor="move" fill="#777" fill-opacity="0.3" stroke="#fff" shape-rendering="crispEdges" style="display: none;"></rect><rect class="handle handle--e" cursor="ew-resize" style="display: none;"></rect><rect class="handle handle--w" cursor="ew-resize" style="display: none;"></rect></g><g class="c3-axis-x" transform="translate(0,0)" clip-path="url(file:///home/martin/Documents/concept/index.html#c3-1616414862594-clip-xaxis)" style="opacity: 0;"><g class="tick" transform="translate(297, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">0</tspan></text></g><path class="domain" d="M0,6V0H593V6"></path></g></g><g transform="translate(0,400)"><g class="c3-legend-item c3-legend-item-Men" style="visibility: visible; cursor: pointer;"><text x="138.0234375" y="9" style="pointer-events: none;">Men</text><rect class="c3-legend-item-event" x="124.0234375" y="-5" width="50.671875" height="19" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="122.0234375" y1="4" x2="132.0234375" y2="4" stroke-width="10" style="stroke: rgb(89, 105, 255); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-Women" style="visibility: visible; cursor: pointer;"><text x="188.6953125" y="9" style="pointer-events: none;">Women</text><rect class="c3-legend-item-event" x="174.6953125" y="-5" width="68.203125" height="19" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="172.6953125" y1="4" x2="182.6953125" y2="4" stroke-width="10" style="stroke: rgb(255, 64, 123); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-Accessories" style="visibility: visible; cursor: pointer;"><text x="256.8984375" y="9" style="pointer-events: none;">Accessories</text><rect class="c3-legend-item-event" x="242.8984375" y="-5" width="91.875" height="19" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="240.8984375" y1="4" x2="250.8984375" y2="4" stroke-width="10" style="stroke: rgb(37, 213, 242); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-Children" style="visibility: visible; cursor: pointer;"><text x="348.7734375" y="9" style="pointer-events: none;">Children</text><rect class="c3-legend-item-event" x="334.7734375" y="-5" width="74" height="19" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="332.7734375" y1="4" x2="342.7734375" y2="4" stroke-width="10" style="stroke: rgb(255, 199, 80); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-Apperal" style="visibility: visible; cursor: pointer;"><text x="422.7734375" y="9" style="pointer-events: none;">Apperal</text><rect class="c3-legend-item-event" x="408.7734375" y="-5" width="60.203125" height="19" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="406.7734375" y1="4" x2="416.7734375" y2="4" stroke-width="10" style="stroke: rgb(46, 197, 81); pointer-events: none;"></line></g></g><text class="c3-title" x="296.5" y="0"></text></svg><div class="c3-tooltip-container" style="position: absolute; pointer-events: none; display: none;"></div></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        @include('admin.footer')
    </div>
@endsection

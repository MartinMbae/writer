<div class="row justify-content-center">
    <h3><u>Orders</u></h3>
</div>
<div class="row">
    @include('vendor.jetstream.components.counter', ['title'=>'New Orders', 'count'=>24, 'url'=>'admin/orders/new'])
    @include('vendor.jetstream.components.counter', ['title'=>'Available Orders', 'count'=>24, 'url'=>'admin/orders/available'])
    @include('vendor.jetstream.components.counter', ['title'=>'Awarded Orders', 'count'=>2, 'url'=>'admin/orders/delivered'])
    @include('vendor.jetstream.components.counter', ['title'=>'Delivered Orders', 'count'=>0, 'url'=>'admin/orders/completed'])
    @include('vendor.jetstream.components.counter', ['title'=>'Under Revision', 'count'=>4, 'url'=>'admin/orders/paid'])
    @include('vendor.jetstream.components.counter', ['title'=>'Completed Orders', 'count'=>1, 'url'=>'admin/orders/progress'])
    @include('vendor.jetstream.components.counter', ['title'=>'Paid Orders', 'count'=>1, 'url'=>'admin/orders/progress'])
    @include('vendor.jetstream.components.counter', ['title'=>'Cancelled Orders', 'count'=>1, 'url'=>'admin/orders/progress'])
    @include('vendor.jetstream.components.counter', ['title'=>'Rejected Orders', 'count'=>1, 'url'=>'admin/orders/revision'])
</div>
<hr>
<div class="row justify-content-center" style="margin-top: 10px">
    <h3><u>Writers</u></h3>
</div>
<div class="row">
    <div class="col-6">
        <h5 class="text-center">Active Writers</h5>
        <table class="table table-bordered table-hover table-striped ">

            <thead class="thead-dark">
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Phone Number</th>
            </tr>
            </thead>

            <tr>
                <td>Martin</td>
                <td>martin@hfuhe.co</td>
                <td>0756432</td>
            </tr>
            <tr>
                <td>Martin</td>
                <td>martin@hfuhe.co</td>
                <td>0756432</td>
            </tr>
        </table>
        <div class="d-flex flex-row-reverse">
            <a href="">View All</a>
        </div>
    </div>


    <div class="col-6">
        <h5 class="text-center">Dormant Writers</h5>
        <table class="table table-bordered table-hover table-striped ">

            <thead class="thead-dark">
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Phone Number</th>
            </tr>
            </thead>

            <tr>
                <td>Martin</td>
                <td>martin@hfuhe.co</td>
                <td>0756432</td>
            </tr>
            <tr>
                <td>Martin</td>
                <td>martin@hfuhe.co</td>
                <td>0756432</td>
            </tr>
        </table>
        <div class="d-flex flex-row-reverse">
            <a href="">View All</a>
        </div>
    </div>


</div>



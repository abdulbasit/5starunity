@extends('admin.layouts.apps')

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
        <!-- Stats -->
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-12">
            <div class="card">
                <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-primary bg-darken-2">
                    <i class="icon-camera font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-primary white media-body">
                    <h5>Products</h5>
                    <h5 class="text-bold-400 mb-0"><i class="ft-plus"></i> {{$products}}</h5>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12">
            <div class="card">
                <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-danger bg-darken-2">
                    <i class="icon-user font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-danger white media-body">
                    <h5>Total Users</h5>
                    <h5 class="text-bold-400 mb-0"><i class="ft-arrow-up"></i>{{$totalUsers}}</h5>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12">
            <div class="card">
                <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-warning bg-darken-2">
                    <i class="icon-basket-loaded font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-warning white media-body">
                    <h5>New Orders</h5>
                    <h5 class="text-bold-400 mb-0"><i class="ft-arrow-down"></i> {{$Ttallotteries}}</h5>
                    </div>
                </div>
                </div>
            </div>
            </div>
            {{-- <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                    <div class="media align-items-stretch">
                        <div class="p-2 text-center bg-success bg-darken-2">
                        <i class="icon-wallet font-large-2 white"></i>
                        </div>
                        <div class="p-2 bg-gradient-x-success white media-body">
                        <h5>Total Profit</h5>
                        <h5 class="text-bold-400 mb-0"><i class="ft-arrow-up"></i> 5.6 M</h5>
                        </div>
                    </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <!--/ Stats -->
        <!--Product sale & buyers -->
        {{-- <div class="row match-height">
            <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                <h4 class="card-title">Products Sales</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
                </div>
                <div class="card-content">
                <div class="card-body">
                    <div id="products-sales" class="height-300"></div>
                </div>
                </div>
            </div>
            </div>

        </div> --}}
        <!--/ Product sale & buyers -->
        <!--Recent Orders & Monthly Salse -->
        <div class="row match-height">
            <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                <h4 class="card-title">Recent Purchased Lotteries</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                    {{-- <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li> --}}
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
                            <tr>
                                <th>Lottery Name</th>
                                <th>Purchased Lotteries</th>
                                <th>Total Lotteries</th>
                                <th>Collected Amount</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lotteries as $loteryResult)
                            
                            <tr>
                                {{-- <td class="text-truncate"></td> --}}
                                <td class="text-truncate"><a href="/admin/lottery/detail/{{$loteryResult->id}}"> {{$loteryResult->name}} </a></td>
                                <td align="center" class="text-truncate"> {{$loteryResult->totalClients}} </td>
                                <td align="center" class="text-truncate">
                                    {{$loteryResult->created_lots}}
                                </td>
                                <td align="center" class="text-truncate">
                                    £ {{number_format($loteryResult->totalClients*$loteryResult->one_lot_amount,2,".",",")}}</td>
                                <td class="text-truncate">£ {{number_format($loteryResult->lot_amount,2,".",",")}}</td>
                            </tr>
                            @endforeach 
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-xl-4 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <h4 class="card-title">Recent Registered</h4>
                        {{-- <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a> --}}
                        {{-- <div class="heading-elements">
                            <ul class="list-inline mb-0">
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            </ul>
                        </div> --}}
                        </div>
                        <div class="card-content px-1">
                        <div id="recent-buyers" class="media-list height-300 position-relative" style="overflow: auto">
                            @foreach($latestRegisterdUser as $userList)
                            <a class="media border-0">
                                <div class="media-left pr-1">
                                    <span class="avatar avatar-md avatar-online">
                                    <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-7.png"
                                    alt="Generic placeholder image">
                                    <i></i>
                                    </span>
                                </div>
                                <div class="media-body w-100">
                                    <h6 class="list-group-item-heading"> {{$userList->name." ".$userList->last_name}}</h6>
                                    <p class="list-group-item-text mb-0">
                                        @if($userList->status=="0" && $userList->verification=="")
                                            <span class="badge badge-primary"> Active</span>
                                         @elseif($userList->status=="1")
                                           <span class="badge badge-warning">
                                               Unverified Documents 
                                           </span>
                                         @elseif($userList->status=="4")
                                         <span class="badge badge-danger">
                                             Account Deleted 
                                         </span>
                                         @elseif($userList->verification!="")
                                         <span class="badge badge-warning ml-1">
                                             Email Verificitaion Pending
                                         </span>
                                         @elseif($userList->status=="3")
                                         <span class="badge badge-warning ml-1">
                                           Delete Account Rquest 
                                         </span>
                                         @else
                                         <span class="badge badge-danger">
                                             Disabled
                                         </span>
                                        @endif
                                    </p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    Morris.Area({
        element: 'products-sales',
        data: [{
            month: '2017-01',
            electronics: 0,
            apparel: 0,
            decor: 0
        }, {
            month: '2017-02',
            electronics: 240,
            apparel: 0,
            decor: 0
        }, {
            month: '2017-03',
            electronics: 500,
            apparel: 0,
            decor: 0
        }, {
            month: '2017-04',
            electronics: 0,
            apparel: 190,
            decor: 0
        }, {
            month: '2017-05',
            electronics: 0,
            apparel: 25,
            decor: 80
        }, {
            month: '2017-06',
            electronics: 0,
            apparel: 150,
            decor: 0
        }, {
            month: '2017-07',
            electronics: 0,
            apparel: 0,
            decor: 0
        },{
            month: '2017-08',
            electronics: 80,
            apparel: 0,
            decor: 0
        },{
            month: '2017-09',
            electronics: 0,
            apparel: 0,
            decor: 0
        },{
            month: '2017-10',
            electronics: 0,
            apparel: 0,
            decor: 150
        },{
            month: '2017-11',
            electronics: 300,
            apparel: 0,
            decor: 0
        },{
            month: '2017-12',
            electronics: 0,
            apparel: 0,
            decor: 0
        }],
        xkey: 'month',
        ykeys: ['electronics', 'apparel', 'decor'],
        labels: ['Electronics', 'Apparel', 'Decor'],
        xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
            var month = months[x.getMonth()];
            return month;
        },
        dateFormat: function(x) {
            var month = months[new Date(x).getMonth()];
            return month;
        },
        behaveLikeLine: true,
        ymax: 1000,
        resize: false,
        pointSize: 0,
        pointStrokeColors:['#00B5B8', '#FA8E57', '#F25E75'],
        smooth: true,
        gridLineColor: '#E4E7ED',
        numLines: 6,
        gridtextSize: 14,
        lineWidth: 0,
        fillOpacity: 0.9,
        hideHover: 'auto',
        lineColors: ['#00B5B8', '#FA8E57', '#F25E75']
    });
</script>
@endsection

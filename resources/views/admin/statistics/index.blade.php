@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/charts/apexcharts.css')}}">
@endsection
@section('content')
    <div class="row hight-card">
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between pb-0">
                    <h4 class="card-title">{{__('site.users')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body py-0">
                        <div id="customer-chart"></div>
                    </div>
                    <ul class="list-group list-group-flush customer-info">
                        <li class="list-group-item d-flex justify-content-between ">
                            <div class="series-info">
                                <i class="fa fa-circle font-small-3 text-primary"></i>
                                <span class="text-bold-600">{{__('site.active_users')}}</span>
                            </div>
                            <div class="product-result">
                                <span>{{$activeUsers}}</span>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between ">
                            <div class="series-info">
                                <i class="fa fa-circle font-small-3 text-warning"></i>
                                <span class="text-bold-600">{{__('site.not_active_users')}}</span>
                            </div>
                            <div class="product-result">
                                <span>{{$notActiveUsers}}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between pb-0">
                    <h4 class="card-title">{{__('site.users')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-2 col-12 d-flex flex-column flex-wrap text-center">
                                <h1 class="font-large-2 text-bold-700 mt-2 mb-0">{{$activeUsers + $notActiveUsers}}</h1>
                                <small>{{__('site.users')}}</small>
                            </div>
                            <div class="col-sm-10 col-12 d-flex justify-content-center">
                                <div id="support-tracker-chart"></div>
                            </div>
                        </div>
                        <div class="chart-info d-flex justify-content-between">
                            <div class="text-center">
                                <p class="mb-50">{{__('site.active_users')}}</p>
                                <span class="font-large-1">{{$activeUsers}}</span>
                            </div>
                            <div class="text-center">
                                <p class="mb-50">{{__('site.not_active_users')}}</p>
                                <span class="font-large-1">{{$notActiveUsers}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between pb-0">
                    <h4>{{__('site.users')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div id="product-order-chart" class="mb-3"></div>
                        <div class="chart-info d-flex justify-content-between mb-1">
                            <div class="series-info d-flex align-items-center">
                                <i class="fa fa-circle-o text-bold-700 text-primary"></i>
                                <span class="text-bold-600 ml-50">{{__('site.active_users')}}</span>
                            </div>
                            <div class="product-result">
                                <span>{{$activeUsers}}</span>
                            </div>
                        </div>
                        <div class="chart-info d-flex justify-content-between mb-1">
                            <div class="series-info d-flex align-items-center">
                                <i class="fa fa-circle-o text-bold-700 text-warning"></i>
                                <span class="text-bold-600 ml-50">{{__('site.not_active_users')}}</span>
                            </div>
                            <div class="product-result">
                                <span>{{$notActiveUsers}}</span>
                            </div>
                        </div>
                        <div class="chart-info d-flex justify-content-between mb-75">
                            <div class="series-info d-flex align-items-center">
                                <i class="fa fa-circle-o text-bold-700 text-danger"></i>
                                <span class="text-bold-600 ml-50">{{__('site.all_users')}}</span>
                            </div>
                            <div class="product-result">
                                <span>{{$activeUsers + $notActiveUsers}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end">
                    <h4 class="card-title">{{__('admin.country_and_cities')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body pb-0">
                        <div id="revenue-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end">
                    <h4>{{__('admin.users')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body pt-0">
                        <div id="session-chart" class="mb-1"></div>
                        <div class="chart-info d-flex justify-content-between mb-1">
                            <div class="series-info d-flex align-items-center">
                                <i class="feather icon-monitor font-medium-2 text-primary"></i>
                                <span class="text-bold-600 mx-50">{{__('site.active_users')}}</span>
                            </div>
                            <div class="series-result">
                                <span>{{round( ($activeUsers * 100) / ($activeUsers + $notActiveUsers))}}%</span>
                            </div>
                        </div>
                        <div class="chart-info d-flex justify-content-between mb-1">
                            <div class="series-info d-flex align-items-center">
                                <i class="feather icon-tablet font-medium-2 text-warning"></i>
                                <span class="text-bold-600 mx-50">{{__('site.not_active_users')}}</span>
                            </div>
                            <div class="series-result">
                                <span>{{round( ($notActiveUsers * 100) / ($activeUsers + $notActiveUsers))}}%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end">
                    <h4 class="mb-0">{{__('admin.users')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body px-0 pb-0">
                        <div id="goal-overview-chart" class="mt-75"></div>
                        <div class="row text-center mx-0">
                            <div class="col-6 border-top border-right d-flex align-items-between flex-column py-1">
                                <p class="mb-50">{{__('admin.active_customers')}}</p>
                                <p class="font-large-1 text-bold-700">{{round( ($activeUsers * 100) / ($activeUsers + $notActiveUsers))}} %</p>
                            </div>
                            <div class="col-6 border-top d-flex align-items-between flex-column py-1">
                                <p class="mb-50">{{__('admin.dis_active_customers')}}</p>
                                <p class="font-large-1 text-bold-700">{{round( ($notActiveUsers * 100) / ($activeUsers + $notActiveUsers))}} %</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($menus as $key => $menu)
            @php $color = $colores[array_rand($colores)] @endphp
            <a href="{{$menu['url']}}" class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-{{$color}} p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="feather {!! $menu['icon'] !!} text-{!! $color !!} font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">{{$menu['count']}}</h2>
                            <p class="mb-0 line-ellipsis" style="color: #6e6a6a">{{$menu['name']}}</p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="row">

        <h3 class="col-12 d-flex  mb-2">{{__('admin.induction_Statistics')}}</h3>

        @foreach($introSiteCards as $key => $menu)
            @php $color = $colores[array_rand($colores)] @endphp
            <a href="{{$menu['url']}}" class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-{{$color}} p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="feather {!! $menu['icon'] !!} text-{!! $color !!} font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">{{$menu['count']}}</h2>
                            <p class="mb-0 line-ellipsis" style="color: #6e6a6a">{{$menu['name']}}</p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection

@section('js')
    <script src="{{asset('admin/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/charts_functions.js')}}"></script>
    <script>

        new ApexCharts( 
            document.querySelector("#support-tracker-chart"),
            radialBarFunction(['#EA5455'] , ['#7367F0'] , ['Active Users'] , [ Math.round( '{{($activeUsers * 100) / ($activeUsers + $notActiveUsers)}}') ])
        ).render();


       new ApexCharts(
            document.querySelector("#customer-chart"),
            pieChartFunction(['active', 'not active'] , [ Number('{{$activeUsers}}'), Number('{{$notActiveUsers}}')] , ['#7367F0', '#FF9F43'])
        ).render();

        var productChart = new ApexCharts(
            document.querySelector("#product-order-chart"),
            radialBarFunction2(['#7367F0', '#FF9F43'] , [ '#8F80F9', '#FFC085'] , [ Math.round((Number('{{$activeUsers}}') * 100 / (Number('{{$activeUsers}}') + Number('{{$notActiveUsers}}')))) , Math.round((Number('{{$notActiveUsers}}') * 100 / (Number('{{$activeUsers}}') + Number('{{$notActiveUsers}}'))))] , ['Finished', 'Pending'])
        ).render();

        var sessionChart = new ApexCharts(
            document.querySelector("#session-chart"),
            donutFunction([Math.round(Number('{{($activeUsers * 100) / ($activeUsers + $notActiveUsers)}}')) , Math.round(Number('{{($notActiveUsers * 100) / ($activeUsers + $notActiveUsers)}}'))] , ['Active Users', 'Not Active Users'] , ['#7367F0', '#FF9F43'] , ['#A9A2F6', '#ffc085'])
        ).render();

        var goalChart = new ApexCharts(
            document.querySelector("#goal-overview-chart"),
            radialBarFunction3([Math.round( Number('{{($activeUsers * 100) / ($activeUsers + $notActiveUsers)}}'))  , Math.round(Number('{{($notActiveUsers * 100) / ($activeUsers + $notActiveUsers)}}'))])
        ).render();


        var revenueChartoptions = {
            chart: {
            height: 270,
            toolbar: { show: false },
            type: 'line',
            },
            stroke: {
            curve: 'smooth',
            dashArray: [0, 8],
            width: [4, 2],
            },
            grid: {
            borderColor: '#e7e7e7',
            },
            legend: {
            show: false,
            },
            colors: ['#f29292', '#b9c3cd'],

            fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                inverseColors: false,
                gradientToColors: ['#7367F0', '#b9c3cd'],
                shadeIntensity: 1,
                type: 'horizontal',
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100, 100, 100]
            },
            },
            markers: {
            size: 0,
            hover: {
                size: 5
            }
            },
            xaxis: {
            labels: {
                style: {
                colors: '#b9c3cd',
                }
            },
            axisTicks: {
                show: false,
            },
            categories: ['1', '2', '3', '4', '5', '6', '7', '8' ,'9','10','11','12'],
            axisBorder: {
                show: false,
            },
            tickPlacement: 'on',
            },
            yaxis: {
            tickAmount: 5,
            labels: {
                style: {
                color: '#b9c3cd',
                },
                formatter: function (val) {
                return val > 999 ? (val / 1000).toFixed(1) + 'k' : val;
                }
            }
            },
            tooltip: {
            x: { show: false }
            },
            series: [{
            name: "{{__('admin.cities')}}",
            data: @json($countryArray)
            }
            ,
            {
            name: "{{__('admin.countries')}}",
            data: @json($cityArray)
            }
            ],

        }

        var revenueChart = new ApexCharts(
            document.querySelector("#revenue-chart"),
            revenueChartoptions
        ).render();

    </script>
@endsection
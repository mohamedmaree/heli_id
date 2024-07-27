@extends('admin.layout.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/charts/apexcharts.css')}}">
@endsection
@section('content')
{{--        <div class="row">--}}
{{--            <div class="col-lg-6 col-md-12 col-sm-12">--}}
{{--                <div class="card bg-analytics text-white">--}}
{{--                    <div class="card-content">--}}
{{--                        <div class="card-body text-center">--}}
{{--                            <img src="{{asset('admin/app-assets/images/elements/decore-left.png')}}" class="img-left" alt="card-img-left">--}}
{{--                            <img src="{{asset('admin/app-assets/images/elements/decore-right.png')}}" class="img-right" alt="card-img-right">--}}
{{--                            <div class="text-center">--}}
{{--                                <h1 class="mb-2 text-white">{{__('admin.welcome')}} {{auth('admin')->user()->name}}</h1>--}}
{{--                                <p class="m-auto w-75">{{  date('d-m-Y', strtotime(\Carbon\Carbon::now())) }} </p>--}}
{{--                                <p class="m-auto w-75">{{  date('h:i A', strtotime(\Carbon\Carbon::now())) }} </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-6 col-md-12 weatherWidgetInner">--}}
{{--                <a class="weatherwidget-io" href="https://forecast7.com/{{lang()}}/24d7146d68/riyadh/" data-label_1="{{__('admin.riyadh')}}" data-label_2="{{__('admin.weather')}}" data-font="en-us"  data-icons="Climacons" data-theme="original" data-basecolor="rgb(16 22 58)" ></a>--}}
{{--            </div>--}}
{{--        </div>--}}
        {{-- <div class="row align-center">
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
        </div> --}}
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
        {{-- <div class="row hight-card">
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

            <div class="col-lg-6 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-end">
                        <h4 class="card-title">{{__('admin.Project_cases')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body pb-0">
                            <div id="columns-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
                  
        </div> --}}
@endsection
@section('js')
    <script>
        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
    </script>

    <script src="{{asset('admin/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/charts_functions.js')}}"></script>
    <script>
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
        //columns chart
        var options = {
          series: [{
          name: 'Net Profit',
          data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
          name: 'Revenue',
          data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }, {
          name: 'Free Cash Flow',
          data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        },
        yaxis: {
          title: {
            text: '$ (thousands)'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#columns-chart"), options);
        chart.render();
    </script>
    
@endsection
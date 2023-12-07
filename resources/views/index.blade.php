@extends('partials.main')
@section('container')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>

                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>


                {{-- Chart --}}

                <div class="container">
                    <h1>Grafik dan Charts</h1>
                    <div>
                        Basic Column
                        <div id="container"></div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js "
                    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN / o0jlpcV8Qyq46cDfL " crossorigin="anonymous">
                </script>
                <script type="text/javascript">
                    Highcharts.chart('container', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Jumlah Stok Produk per Kategori',
                            align: 'left'
                        },
                        subtitle: {
                            text: 'Source: <a target="_blank" ' +
                                'href="https://www.indexmundi.com/agriculture/?commodity=corn">indexmundi </a> ',
                            align: 'left'
                        },
                        xAxis: {
                            categories: ['Sport', 'Daily'],
                            crosshair: true,
                            accessibility: {
                                description: 'Countries'
                            }
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: '1000 metric tons (MT)'
                            }
                        },
                        tooltip: {
                            valueSuffix: ' (1000 MT)'
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0

                            }
                        },
                        series: [{
                            name: 'Corn',

                            data: [51, 6]
                        }, ]
                    });
                </script>

                <div class="container">
                    <h1>Grafik dan Charts</h1>
                    <div>
                        Pie
                        <div id="pie"></div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
                </script>
                <script type="text/javascript">
                    Highcharts.chart('pie', {
                        chart: {
                            type: 'pie'
                        },
                        title: {
                            text: 'Jumlah Produk per Kategori'
                        },
                        tooltip: {
                            valueSuffix: '%'
                        },
                        subtitle: {
                            text: 'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default ">MDPI</a>'
                        },
                        plotOptions: {
                            series: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: [{
                                    enabled: true,
                                    distance: 20

                                }, {
                                    enabled: true,
                                    distance: -40,
                                    format: '{point.percentage:.1f}%',
                                    style: {

                                        fontSize: '1.2em',
                                        textOutline: 'none',
                                        opacity: 0.7

                                    },
                                    filter: {

                                        operator: '>',

                                        property: 'percentage',
                                        value: 10

                                    }
                                }]
                            }
                        },
                        series: [{
                            name: 'Percentage',
                            colorByPoint: true,
                            data: [{
                                    name: 'Sport',
                                    y: 3

                                },
                                {

                                    name: 'Daily',
                                    y: 1

                                }
                            ]
                        }]
                    });
                </script>



            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

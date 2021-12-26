@extends('layouts.app')

@section('content')

@include('components.header')

@include('components.sidebar')

<!-- BEGIN: Page Main-->
<div id="main">
    <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Prediction</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Prediction
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="section section-data-tables">
                    <div class="card">
                        <div class="card-content">

                            <div class="row">
                                <form method="POST" action="{{ url('prediction/filter') }}" class="col s12">
                                    @csrf
                                    <div class="row">
                                        <div class="input-field col s3">
                                            <input id="icon_prefix" type="date" name="from_date" class="validate">
                                            <label for="icon_prefix">From Date</label>
                                        </div>
                                        <div class="input-field col s3">
                                            <input id="icon_prefix" type="date" name="to_date" class="validate">
                                            <label for="icon_prefix">To Date</label>
                                        </div>
                                        <div class="input-field col s2" style="margin-top: 25px;">
                                            <i class="material-icons prefix">phone</i>
                                            <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php if (count($wmas) == 0) { ?>
                        <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <p>Benchmark sales data for 7 days before request date is not available.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } else{ ?>
                        <!-- Page Length Options -->
                        <div class="row">
                            <div class="col s12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <script src="https://code.highcharts.com/highcharts.js"></script>
                                                <script src="https://code.highcharts.com/modules/series-label.js"></script>
                                                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                                                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                                                <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    
                                                <style>
                                                    .highcharts-figure,
                                                    .highcharts-data-table table {
                                                        min-width: 360px;
                                                        max-width: 800px;
                                                        margin: 1em auto;
                                                    }
    
                                                    .highcharts-data-table table {
                                                        font-family: Verdana, sans-serif;
                                                        border-collapse: collapse;
                                                        border: 1px solid #EBEBEB;
                                                        margin: 10px auto;
                                                        text-align: center;
                                                        width: 100%;
                                                        max-width: 500px;
                                                    }
    
                                                    .highcharts-data-table caption {
                                                        padding: 1em 0;
                                                        font-size: 1.2em;
                                                        color: #555;
                                                    }
    
                                                    .highcharts-data-table th {
                                                        font-weight: 600;
                                                        padding: 0.5em;
                                                    }
    
                                                    .highcharts-data-table td,
                                                    .highcharts-data-table th,
                                                    .highcharts-data-table caption {
                                                        padding: 0.5em;
                                                    }
    
                                                    .highcharts-data-table thead tr,
                                                    .highcharts-data-table tr:nth-child(even) {
                                                        background: #f8f8f8;
                                                    }
    
                                                    .highcharts-data-table tr:hover {
                                                        background: #f1f7ff;
                                                    }
                                                </style>
    
                                                <figure class="highcharts-figure">
                                                    <div id="container"></div>
                                                </figure>
    
                                                <?php
                                                foreach ($wmas as $key => $value) {
                                                    $dates[] = $value['date'];
                                                    $wmass[] = $value['wmas_final'];
                                                }
                                                ?>
                                                <script>
                                                    Highcharts.chart('container', {
    
                                                        title: {
                                                            text: 'Peramalan Penjualan Dengan Metode Weighted Moving Average'
                                                        },
    
                                                        yAxis: {
                                                            title: {
                                                                text: 'Total'
                                                            }
                                                        },
    
                                                        xAxis: {
                                                            categories: <?php echo json_encode($dates) ?>,
                                                            title: {
                                                                text: null
                                                            }
                                                        },
    
                                                        legend: {
                                                            layout: 'vertical',
                                                            align: 'right',
                                                            verticalAlign: 'middle'
                                                        },
    
                                                        plotOptions: {
                                                            series: {
                                                                label: {
                                                                    connectorAllowed: false
                                                                },
                                                            }
                                                        },
    
                                                        series: [{
                                                            name: 'Penjualan ',
                                                            data: [
                                                                <?php foreach ($wmas as $key => $value) {
                                                                    $date = $value['date'];
                                                                    $total = $value['wmas_final'];
    
                                                                ?> {
                                                                        name: <?php echo json_encode($date); ?>,
                                                                        y: <?php echo $total ?>
                                                                    },
    
                                                                <?php } ?>
                                                            ]
                                                        }],
    
                                                        responsive: {
                                                            rules: [{
                                                                condition: {
                                                                    maxWidth: 500
                                                                },
                                                                chartOptions: {
                                                                    legend: {
                                                                        layout: 'horizontal',
                                                                        align: 'center',
                                                                        verticalAlign: 'bottom'
                                                                    }
                                                                }
                                                            }]
                                                        }
    
                                                    });
                                                </script>
                                            </div>
                                            <?php if (count($wmas_future) != 0){ 
                                                foreach ($wmas_future as $key => $value) {
                                                    $dates_future[] = $value['date'];
                                                    $wmass_future[] = $value['wmas_final'];
                                                }
                                                ?>
                                            <div class="input-field col s6">
                                                <style>
                                                    .highcharts-figures,
                                                    .highcharts-data-table table {
                                                        min-width: 310px;
                                                        max-width: 800px;
                                                        margin: 1em auto;
                                                    }
    
                                                    #container {
                                                        height: 400px;
                                                    }
    
                                                    .highcharts-data-table table {
                                                        font-family: Verdana, sans-serif;
                                                        border-collapse: collapse;
                                                        border: 1px solid #EBEBEB;
                                                        margin: 10px auto;
                                                        text-align: center;
                                                        width: 100%;
                                                        max-width: 500px;
                                                    }
    
                                                    .highcharts-data-table caption {
                                                        padding: 1em 0;
                                                        font-size: 1.2em;
                                                        color: #555;
                                                    }
    
                                                    .highcharts-data-table th {
                                                        font-weight: 600;
                                                        padding: 0.5em;
                                                    }
    
                                                    .highcharts-data-table td,
                                                    .highcharts-data-table th,
                                                    .highcharts-data-table caption {
                                                        padding: 0.5em;
                                                    }
    
                                                    .highcharts-data-table thead tr,
                                                    .highcharts-data-table tr:nth-child(even) {
                                                        background: #f8f8f8;
                                                    }
    
                                                    .highcharts-data-table tr:hover {
                                                        background: #f1f7ff;
                                                    }
                                                </style>
                                                <figure class="highcharts-figures">
                                                    <div id="containers"></div>
                                                </figure>
    
                                                <script>
                                                    Highcharts.chart('containers', {
                                                        chart: {
                                                            type: 'column'
                                                        },
                                                        title: {
                                                            text: 'Peramalan Penjualan Dengan Metode Weighted Moving Average'
                                                        },
                                                        xAxis: {
                                                            categories: <?php echo json_encode($dates_future) ?>,
                                                            title: {
                                                                text: null
                                                            }
                                                        },
                                                        yAxis: {
                                                            min: 0,
                                                            title: {
                                                                text: 'Total'
                                                            }
                                                        },
                                                        tooltip: {
                                                            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                                            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                                                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                                            footerFormat: '</table>',
                                                            shared: true,
                                                            useHTML: true
                                                        },
                                                        plotOptions: {
                                                            column: {
                                                                pointPadding: 0.2,
                                                                borderWidth: 0
                                                            }
                                                        },
                                                        series: [{
                                                            name: 'Penjualan ',
                                                            data: [
                                                                <?php foreach ($wmas_future as $key => $value) {
                                                                    $date = $value['date'];
                                                                    $total = $value['wmas_final'];
    
                                                                ?> {
                                                                        name: <?php echo json_encode($date); ?>,
                                                                        y: <?php echo $total ?>
                                                                    },
    
                                                                <?php } ?>
                                                            ]
                                                        }],
                                                    });
                                                </script>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div><!-- START RIGHT SIDEBAR NAV -->
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
</div>
<!-- END: Page Main-->
@endsection
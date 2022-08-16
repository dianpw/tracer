@extends('template')
@section('konten')
<head>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
</head>



<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Nilai Soft Skill Lulusan UNISMA
                </h3> 
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#m_tabs_1_3"><i class="flaticon-edit-1"></i>
                    Data Lulusan UNISMA</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#" data-target="#m_tabs_1_1"><i class="flaticon-analytics"></i>
                    Grafik</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane" id="m_tabs_1_1" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div id="chart_soft_skill"></div>
                    </div>
                </div>
            </div>

            <div class="tab-pane active show" id="m_tabs_1_3" role="tabpanel">
                <div class="row">
                    <div class="col-md-9">
                        <div class="m-alert m-alert--icon m-alert--air alert alert-dismissible fade show" role="alert" style="background-color: #95a57e36">
                            <div class="m-alert__icon">
                                <i class="la la-question"></i>
                            </div>
                            <div class="m-alert__text">
                                <strong>Pertanyaan : </strong></br>
                                Apakah nilai soft skill yang Anda inginkan dari lulusan Unisma Malang ?
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{url('export_soft_skill')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon">
                            <span>
                                <i class="la la-file-excel-o"></i>
                                <span>Export Excell</span>
                            </span>
                        </a>
                    </div>
                </div>
            <br>
                <table cellpadding="0" class="table-striped tabel_show table table-bordered nowrap" cellspacing="0" width="100%">
                    <thead style="background-image: url('https://www.transparenttextures.com/patterns/sos.png');background-color: #349d44;color: #e5f6dd;">
                        <tr>
                            <th style="5%">No.</th>
                            <th style="15%">Perusahaan</th>
                            <th style="15%">Kepercayaan diri</th>
                            <th style="15%">Kepemimpinan</th>
                            <th style="15%">Kejujuran</th>
                            <th style="15%">Kedisiplinan</th>
                            <th style="15%">Komunikasi</th>
                            <th style="15%">Motivasi tinggi</th>
                            <th style="15%">Mudah adaptasi & bekerjasama</th>
                            <th style="15%">Mampu bekerja dalam tekanan</th>
                            <th style="15%">Created</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src ="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://code.highcharts.com/highcharts.src.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script>

    $(document).ready(function(){
        $('.tabel_show').DataTable({
            
            responsive:true,
            paging: true,
            info: true,
            searching: true,
            scrollX: true,
            
            "aaSorting": [],
            "ordering": true,
            ajax: {
                url: '{{url("datatable-soft-skill")}}',
                dataSrc: 'result',
            },
        });
        //m_tabs_1_1

        
        $.ajax({
            url: "{{url('graph-soft-skill')}}",
            type: 'GET',
            dataType: 'JSON',
            success:function(response){

                Highcharts.chart('chart_soft_skill', {
                    chart: {
                        type: 'column'
                    },
                    backgroundColor: '#000000',
                    credits: {
                            text: '',
                        },
                    title: {
                        text: 'Nilai Soft Skill Lulusan UNISMA <br><br>'
                    },

                    xAxis: {
                        type: 'category'
                    },

                    yAxis: {
                        title: {
                            text: 'Nilai Soft Skill Lulusan UNISMA'
                        }
                    },
                    colors : ['#00a65a'],
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },

                    plotOptions: {
                        column :{
                            stacking : '',
                            dataLabels:{
                                enabled:false
                            }
                        }
                    },
                    series: [
                        
                        {
                            "data": [
                                        ['Kepercayaan diri', response['percara_diri'][0].ke1],
                                        ['Kepemimpinan', response['kepemimpinan'][0].ke1],
                                        ['Kejujuran', response['kejujuran'][0].ke1],
                                        ['Kedisiplinan', response['kedisiplinan'][0].ke1],
                                        ['Komunikasi', response['komunikasi'][0].ke1],
                                        ['Motivasi tinggi', response['motivasi'][0].ke1],
                                        ['Mudah adaptasi & bekerjasama', response['adaptasi'][0].ke1],
                                        ['Mampu bekerja dalam tekanan', response['tekanan'][0].ke1]
                                    ],
                            "name": '1',
                            "color" : '#4169E1'
                        },
                        {
                            "data": [
                                        ['Kepercayaan diri', response['percara_diri'][1].ke2],
                                        ['Kepemimpinan',  response['kepemimpinan'][1].ke2],
                                        ['Kejujuran',  response['kejujuran'][1].ke2],
                                        ['Kedisiplinan',  response['kedisiplinan'][1].ke2],
                                        ['Komunikasi',  response['komunikasi'][1].ke2],
                                        ['Motivasi tinggi',  response['motivasi'][1].ke2],
                                        ['Mudah adaptasi & bekerjasama', response['adaptasi'][1].ke2],
                                        ['Mampu bekerja dalam tekanan', response['tekanan'][1].ke2]

                                    ],
                            "name": '2',
                            "color" : '#CD5C5C'
                        },
                        {
                            "data": [
                                        ['Kepercayaan diri', response['percara_diri'][2].ke3],
                                        ['Kepemimpinan',  response['kepemimpinan'][2].ke3],
                                        ['Kejujuran',  response['kejujuran'][2].ke3],
                                        ['Kedisiplinan',  response['kedisiplinan'][2].ke3],
                                        ['Komunikasi',  response['komunikasi'][2].ke3],
                                        ['Motivasi tinggi',  response['motivasi'][2].ke3],
                                        ['Mudah adaptasi & bekerjasama', response['adaptasi'][2].ke3],
                                        ['Mampu bekerja dalam tekanan', response['tekanan'][2].ke3]
                                    ],
                            "name": '3',
                            "color" : "#D2B48C"
                        },
                        {
                            "data": [
                                        ['Kepercayaan diri', response['percara_diri'][3].ke4],
                                        ['Kepemimpinan',  response['kepemimpinan'][3].ke4],
                                        ['Kejujuran',  response['kejujuran'][3].ke4],
                                        ['Kedisiplinan',  response['kedisiplinan'][3].ke4],
                                        ['Komunikasi',  response['komunikasi'][3].ke4],
                                        ['Motivasi tinggi',  response['motivasi'][3].ke4],
                                        ['Mudah adaptasi & bekerjasama', response['adaptasi'][3].ke4],
                                        ['Mampu bekerja dalam tekanan', response['tekanan'][3].ke4]
                                    ],
                            "name": '4',
                            "color": '#90EE90'
                        },
                        {
                            "data": [
                                        ['Kepercayaan diri', response['percara_diri'][4].ke5],
                                        ['Kepemimpinan',  response['kepemimpinan'][4].ke5],
                                        ['Kejujuran',  response['kejujuran'][4].ke5],
                                        ['Kedisiplinan',  response['kedisiplinan'][4].ke5],
                                        ['Komunikasi',  response['komunikasi'][4].ke5],
                                        ['Motivasi tinggi',  response['motivasi'][4].ke5],
                                        ['Mudah adaptasi & bekerjasama', response['adaptasi'][4].ke5],
                                        ['Mampu bekerja dalam tekanan', response['tekanan'][4].ke5]
                                    ],
                            "name": '5',
                            "color": '#ffb822'
                        },
                        {
                            "data": [
                                        ['Kepercayaan diri', response['percara_diri'][5].ke6],
                                        ['Kepemimpinan',  response['kepemimpinan'][5].ke6],
                                        ['Kejujuran',  response['kejujuran'][5].ke6],
                                        ['Kedisiplinan',  response['kedisiplinan'][5].ke6],
                                        ['Komunikasi',  response['komunikasi'][5].ke6],
                                        ['Motivasi tinggi',  response['motivasi'][5].ke6],
                                        ['Mudah adaptasi & bekerjasama', response['adaptasi'][5].ke6],
                                        ['Mampu bekerja dalam tekanan', response['tekanan'][5].ke6]
                                    ],
                            "name": '6',
                            "color": '#00c5dc'
                        },
                        {
                            "data": [
                                        ['Kepercayaan diri', response['percara_diri'][6].ke7],
                                        ['Kepemimpinan',  response['kepemimpinan'][6].ke7],
                                        ['Kejujuran',  response['kejujuran'][6].ke7],
                                        ['Kedisiplinan',  response['kedisiplinan'][6].ke7],
                                        ['Komunikasi',  response['komunikasi'][6].ke7],
                                        ['Motivasi tinggi',  response['motivasi'][6].ke7],
                                        ['Mudah adaptasi & bekerjasama', response['adaptasi'][6].ke7],
                                        ['Mampu bekerja dalam tekanan', response['tekanan'][6].ke7]
                                    ],
                            "name": '7',
                            "color": '#9816f4'
                        }
                    ],
                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                        }]
                    }
                });
            }
        });
    });

</script>
@endsection

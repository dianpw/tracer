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
                    Tingkat Kepuasan Pengguna Lulusan
                </h3> 
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#m_tabs_1_3"><i class="flaticon-edit-1"></i>
                    Data Pengguna Lulusan</a>
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
                        <div id="chart_tingkat_kepuasan"></div>
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
                                Tingkat Kepuasan Pengguna Lulusan
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{url('export_tingkat_kepuasan')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon">
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
                            <th style="15%">Etika</th>
                            <th style="15%">Keahlian pada bidang ilmu </th>
                            <th style="15%">Kemampuan berbahasa asing</th>
                            <th style="15%">Penggunaan teknologi informasi</th>
                            <th style="15%">Kemampuan berkomunikasi</th>
                            <th style="15%">Kerjasama tim</th>
                            <th style="15%">Pengembangan diri</th>
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
                url: '{{url("datatable-tingkat-kepuasan")}}',
                dataSrc: 'result',
            },
        });
        //m_tabs_1_1

        
        $.ajax({
            url: "{{url('graph-tingkat-kepuasan')}}",
            type: 'GET',
            dataType: 'JSON',
            success:function(response){

                Highcharts.chart('chart_tingkat_kepuasan', {
                    chart: {
                        type: 'column'
                    },
                    backgroundColor: '#000000',
                    credits: {
                            text: '',
                        },
                    title: {
                        text: 'Tingkat Kepuasan Pengguna Lulusan <br><br>'
                    },

                    xAxis: {
                        type: 'category'
                    },

                    yAxis: {
                        title: {
                            text: 'Tingkat Kepuasan Pengguna Lulusan'
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
                                        ['Etika', response['etika'][0].Sangatbaik],
                                        ['Keahlian pada bidang ilmu ', response['keahlian'][0].Sangatbaik],
                                        ['Kemampuan berbahasa asing', response['bahasa_inggris'][0].Sangatbaik],
                                        ['Penggunaan teknologi informasi', response['penggunaan_ti'][0].Sangatbaik],
                                        ['Kemampuan berkomunikasi', response['kerjasama'][0].Sangatbaik],
                                        ['Kerjasama tim', response['pengembangan_diri'][0].Sangatbaik]
                                    ],
                            "name": 'Sangat Baik',
                            "color" : '#4169E1'
                        },
                        {
                            "data": [
                                        ['Etika', response['etika'][1].Baik],
                                        ['Keahlian pada bidang ilmu ',  response['keahlian'][1].Baik],
                                        ['Kemampuan berbahasa asing',  response['bahasa_inggris'][1].Baik],
                                        ['Penggunaan teknologi informasi',  response['penggunaan_ti'][1].Baik],
                                        ['Kemampuan berkomunikasi',  response['kerjasama'][1].Baik],
                                        ['Kerjasama tim',  response['pengembangan_diri'][1].Baik]

                                    ],
                            "name": 'Baik',
                            "color" : '#CD5C5C'
                        },
                        {
                            "data": [
                                        ['Etika', response['etika'][2].Cukup],
                                        ['Keahlian pada bidang ilmu ',  response['keahlian'][2].Cukup],
                                        ['Kemampuan berbahasa asing',  response['bahasa_inggris'][2].Cukup],
                                        ['Penggunaan teknologi informasi',  response['penggunaan_ti'][2].Cukup],
                                        ['Kemampuan berkomunikasi',  response['kerjasama'][2].Cukup],
                                        ['Kerjasama tim',  response['pengembangan_diri'][2].Cukup]
                                    ],
                            "name": 'Cukup',
                            "color" : "#D2B48C"
                        },
                        {
                            "data": [
                                        ['Etika', response['etika'][3].Cukup],
                                        ['Keahlian pada bidang ilmu ',  response['keahlian'][3].Kurang],
                                        ['Kemampuan berbahasa asing',  response['bahasa_inggris'][3].Kurang],
                                        ['Penggunaan teknologi informasi',  response['penggunaan_ti'][3].Kurang],
                                        ['Kemampuan berkomunikasi',  response['kerjasama'][3].Kurang],
                                        ['Kerjasama tim',  response['pengembangan_diri'][3].Kurang]
                                    ],
                            "name": 'Kurang',
                            "color": '#90EE90'
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

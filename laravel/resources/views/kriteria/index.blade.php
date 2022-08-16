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
                    Kriteria Lulusan UNISMA
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
                        <div id="chart_kriteria"></div>
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
                                Selain nilai soft skill, kriteria apakah yang Anda inginkan dari lulusan Unisma Malang ?
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{url('export_kriteria')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon">
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
                            <th style="15%">IPK</th>
                            <th style="15%">Kemampuan Bahasa asing</th>
                            <th style="15%">Kemampuan menggoperasikan computer</th>
                            <th style="15%">Jumlah penghargaan yang diterima</th>
                            <th style="15%">Lama pengalaman kerja</th>
                            <th style="15%">Jumlah pelatihan yang pernah diikuti</th>
                            <th style="15%">Kemampuan mengendarai</th>
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
                url: '{{url("datatable-kriteria")}}',
                dataSrc: 'result',
            },
        });
        //m_tabs_1_1

        
        $.ajax({
            url: "{{url('graph-kriteria')}}",
            type: 'GET',
            dataType: 'JSON',
            success:function(response){

                Highcharts.chart('chart_kriteria', {
                    chart: {
                        type: 'column'
                    },
                    backgroundColor: '#000000',
                    credits: {
                            text: '',
                        },
                    title: {
                        text: 'Kriteria Lulusan UNISMA <br><br>'
                    },

                    xAxis: {
                        type: 'category'
                    },

                    yAxis: {
                        title: {
                            text: 'Kriteria Lulusan UNISMA'
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
                                        ['IPK', response['krit_ipk'][0].ke1],
                                        ['Kemampuan Bahasa asing', response['bahasa_asing'][0].ke1],
                                        ['Kemampuan menggoperasikan computer', response['komputer'][0].ke1],
                                        ['Jumlah penghargaan yang diterima', response['penghargaan'][0].ke1],
                                        ['Lama pengalaman kerja', response['pengalaman'][0].ke1],
                                        ['Jumlah pelatihan yang pernah diikuti', response['pelatihan'][0].ke1],
                                        ['Kemampuan mengendarai', response['berkendara'][0].ke1]
                                    ],
                            "name": '1',
                            "color" : '#4169E1'
                        },
                        {
                            "data": [
                                        ['IPK', response['krit_ipk'][1].ke2],
                                        ['Kemampuan Bahasa asing',  response['bahasa_asing'][1].ke2],
                                        ['Kemampuan menggoperasikan computer',  response['komputer'][1].ke2],
                                        ['Jumlah penghargaan yang diterima',  response['penghargaan'][1].ke2],
                                        ['Lama pengalaman kerja',  response['pengalaman'][1].ke2],
                                        ['Jumlah pelatihan yang pernah diikuti',  response['pelatihan'][1].ke2],
                                        ['Kemampuan mengendarai', response['berkendara'][1].ke2]

                                    ],
                            "name": '2',
                            "color" : '#CD5C5C'
                        },
                        {
                            "data": [
                                        ['IPK', response['krit_ipk'][2].ke3],
                                        ['Kemampuan Bahasa asing',  response['bahasa_asing'][2].ke3],
                                        ['Kemampuan menggoperasikan computer',  response['komputer'][2].ke3],
                                        ['Jumlah penghargaan yang diterima',  response['penghargaan'][2].ke3],
                                        ['Lama pengalaman kerja',  response['pengalaman'][2].ke3],
                                        ['Jumlah pelatihan yang pernah diikuti',  response['pelatihan'][2].ke3],
                                        ['Kemampuan mengendarai', response['berkendara'][2].ke3]
                                    ],
                            "name": '3',
                            "color" : "#D2B48C"
                        },
                        {
                            "data": [
                                        ['IPK', response['krit_ipk'][3].ke4],
                                        ['Kemampuan Bahasa asing',  response['bahasa_asing'][3].ke4],
                                        ['Kemampuan menggoperasikan computer',  response['komputer'][3].ke4],
                                        ['Jumlah penghargaan yang diterima',  response['penghargaan'][3].ke4],
                                        ['Lama pengalaman kerja',  response['pengalaman'][3].ke4],
                                        ['Jumlah pelatihan yang pernah diikuti',  response['pelatihan'][3].ke4],
                                        ['Kemampuan mengendarai', response['berkendara'][3].ke4]
                                    ],
                            "name": '4',
                            "color": '#90EE90'
                        },
                        {
                            "data": [
                                        ['IPK', response['krit_ipk'][4].ke5],
                                        ['Kemampuan Bahasa asing',  response['bahasa_asing'][4].ke5],
                                        ['Kemampuan menggoperasikan computer',  response['komputer'][4].ke5],
                                        ['Jumlah penghargaan yang diterima',  response['penghargaan'][4].ke5],
                                        ['Lama pengalaman kerja',  response['pengalaman'][4].ke5],
                                        ['Jumlah pelatihan yang pernah diikuti',  response['pelatihan'][4].ke5],
                                        ['Kemampuan mengendarai', response['berkendara'][4].ke5]
                                    ],
                            "name": '5',
                            "color": '#ffb822'
                        },
                        {
                            "data": [
                                        ['IPK', response['krit_ipk'][5].ke6],
                                        ['Kemampuan Bahasa asing',  response['bahasa_asing'][5].ke6],
                                        ['Kemampuan menggoperasikan computer',  response['komputer'][5].ke6],
                                        ['Jumlah penghargaan yang diterima',  response['penghargaan'][5].ke6],
                                        ['Lama pengalaman kerja',  response['pengalaman'][5].ke6],
                                        ['Jumlah pelatihan yang pernah diikuti',  response['pelatihan'][5].ke6],
                                        ['Kemampuan mengendarai', response['berkendara'][5].ke6]
                                    ],
                            "name": '6',
                            "color": '#00c5dc'
                        },
                        {
                            "data": [
                                        ['IPK', response['krit_ipk'][6].ke7],
                                        ['Kemampuan Bahasa asing',  response['bahasa_asing'][6].ke7],
                                        ['Kemampuan menggoperasikan computer',  response['komputer'][6].ke7],
                                        ['Jumlah penghargaan yang diterima',  response['penghargaan'][6].ke7],
                                        ['Lama pengalaman kerja',  response['pengalaman'][6].ke7],
                                        ['Jumlah pelatihan yang pernah diikuti',  response['pelatihan'][6].ke7],
                                        ['Kemampuan mengendarai', response['berkendara'][6].ke7]
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

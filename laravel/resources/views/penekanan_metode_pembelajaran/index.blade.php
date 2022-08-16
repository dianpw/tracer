@extends('template')
@section('konten')
<head>
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
</head>



<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Penekanan Metode Pembelajaran
                </h3> 
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#m_tabs_1_3"><i class="flaticon-edit-1"></i>
                    Data Tracer Alumni</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#" data-target="#m_tabs_1_1"><i class="flaticon-analytics"></i>
                    Grafik</a>
            </li>



        </ul>

        <div class="tab-content">
            <div class="tab-pane" id="m_tabs_1_1" role="tabpanel">
                <div class="col-md-12">
                <div class="input-group" style="width:100%">
                        <div class="input-group-prepend" >
                            <button style="background: darkcyan;border-color: cadetblue;" class="btn btn-focus" type="button">Tahun lulus</button>
                        </div>
                        <select id="change_graph"  style="width:25%"  class="custom-select form-control" name="param" >
                            <option></option>
                            <option value="" disabled selected>Filter Tahun lulus<option>
                                @foreach ($show_tahun as $item)
                                    <option value="{{ $item->tahun_lulus }}">{{ $item->tahun_lulus }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div id="chart_penekanan_metode_pembelajaran"></div>
                </div>
            </div>

            <div class="tab-pane active show" id="m_tabs_1_3" role="tabpanel">
                <div class="row">
                    <div class="col-md-9">
                        <div class="m-alert m-alert--icon m-alert--air alert alert-dismissible fade show" role="alert" style="background-color: #95a57e36">
                            <div class="m-alert__icon">
                                <i class="la
                                la-question
                                 "></i>
                            </div>
                            <div class="m-alert__text">
                                <strong>Pertanyaan : </strong></br>
                                Menurut Anda seberapa Besar penekanan pada metode pembelajaran di bawah ini dilaksanakan di program studi Anda?
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{url('export_penekanan_metode_pembelajaran')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon">
                            <span>
                                <i class="la la-file-excel-o"></i>
                                <span>Export Excell</span>
                            </span>
                        </a>
                    </div>
                </div>

 <b>Filter Tahun Lulus: </b>
        @foreach ($show_tahun as $item)
            <label class="m-checkbox m-checkbox--solid m-checkbox--success">
                <input class="filter-checkbox" type="checkbox"  value="{{$item->tahun_lulus}}"> {{$item->tahun_lulus}}
                <span></span>
            </label>
        @endforeach
        &nbsp
            <br>
                <table cellpadding="0" class="table-striped tabel_show table table-bordered nowrap" cellspacing="0" width="100%">
                    <thead style="background-image: url('https://www.transparenttextures.com/patterns/sos.png');background-color: #349d44;color: #e5f6dd;">
                        <tr>
                            <th style="5%">No.</th>
                            <th style="15%">NPM</th>
                            <th style="25%">Nama</th>
                            <th style="25%">Prodi</th>
                            <th style="15%">Tahun lulus</th>
                            <th style="15%">Perkuliahan</th>
                            <th style="15%">Demontrasi</th>
                            <th style="15%">Partisipasi riset</th>
                            <th style="15%">Praktikum</th>
                            <th style="15%">Kerja lapangan</th>
                            <th style="15%">Magang</th>
                            <th style="15%">Diskusi</th>
                            <th style="15%">Created</th>
                        </tr>
                    </thead>

                </table>
            </div>

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src ="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://code.highcharts.com/highcharts.src.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script>

    $(document).ready(function(){
        var table_evaluasi_pegawai = $('.tabel_show').DataTable({
            responsive:true,
            paging: true,
            info: true,
            searching: true,
            "aaSorting": [],
            "ordering": true,

            ajax: {
                url: '{{url("datatable-penekanan-metode-pembelajaran")}}',
                dataSrc: 'result',
            },
            scrollX: true,
            autoWidth: true,
        });

    $('.filter-checkbox').on('change', function(e){
        var searchTerms = []
        $.each($('.filter-checkbox'), function(i,elem){
          if($(elem).prop('checked')){
            searchTerms.push($(this).val())
          }
        })
        
        //console.log(searchTerms);
        table_evaluasi_pegawai.column(4).search(searchTerms.join('|'), true, false, true).draw();
      });

        var data = {"name":"Percentage","data":[50,28,150,125,34,75]};
        var categories = [5600, 5700,5800,5900,6000,6100];
        Highcharts.setOptions({
            chart: {
                style:{
                        fontFamily:'Arial, Helvetica, sans-serif',
                        fontSize: '1em',
                        color:'#f00'
                    }
            }
        });

     $('#change_graph').select2({width: 'resolve'});
        $('#change_graph').on('change', function(){
            var tahun = $(this).val();
            //console.log(tahun);
            chart(tahun);
        });

        var n = "{{ $tahun_terakhir[0]->tahun_lulus }}"
        chart(n);
        function chart(tahun){
        	$.ajax({
            url: "{{url('graph-penekanan-metode-pembelajaran')}}" + '/' + tahun,
            type: 'GET',
            dataType: 'JSON',
            success:function(response){

            Highcharts.chart('chart_penekanan_metode_pembelajaran', {
                    chart: {
                    type: 'column'
                    },
                    backgroundColor: '#000000',
                    credits: {
                            text: '',
                        },
                    title: {
                        text: 'Penekanan Metode Pembelajaran Pada Bidang Studi- Tahun lulus: '+'<b style="color:#1978a9">' +tahun+'</b><br><br>'
                    },

                    xAxis: {
                        type: 'category'
                    },

                    yAxis: {
                        title: {
                            text: 'Penekanan Metode Pembelajaran'
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
                                            ['Perkuliahan', response['perkuliahan'][0].Sangatbesar],
                                            ['Demontrasi', response['demontrasi'][0].Sangatbesar],
                                            ['Partisipasi riset', response['partisipasi_riset'][0].Sangatbesar],
                                            ['Praktikum', response['praktikum'][0].Sangatbesar],
                                            ['Kerja lapangan', response['kerja_lapangan'][0].Sangatbesar],
                                            ['Magang', response['magang'][0].Sangatbesar],
                                            ['Diskusi', response['diskusi'][0].Sangatbesar]
                                        ],
                                "name": 'Sangat Besar',
                                "color" : '#4169E1'
                            },
                            {
                                "data": [
                                            ['Perkuliahan', response['perkuliahan'][1].Besar],
                                            ['Demontrasi',  response['demontrasi'][1].Besar],
                                            ['Partisipasi riset',  response['partisipasi_riset'][1].Besar],
                                            ['Praktikum',  response['praktikum'][1].Besar],
                                            ['Kerja lapangan',  response['kerja_lapangan'][1].Besar],
                                            ['Magang',  response['magang'][1].Besar],
                                            ['Diskusi',  response['diskusi'][1].Besar]

                                        ],
                                "name": 'Besar',
                                "color" : '#CD5C5C'
                            },
                            {
                                "data": [
                                            ['Perkuliahan', response['perkuliahan'][2].Cukup],
                                            ['Demontrasi',  response['demontrasi'][2].Cukup],
                                            ['Partisipasi riset',  response['partisipasi_riset'][2].Cukup],
                                            ['Praktikum',  response['praktikum'][2].Cukup],
                                            ['Kerja lapangan',  response['kerja_lapangan'][2].Cukup],
                                            ['Magang',  response['magang'][2].Cukup],
                                            ['Diskusi',  response['diskusi'][2].Cukup]
                                        ],
                                "name": 'Cukup',
                                "color" : "#D2B48C"
                            },
                            {
                                "data": [
                                            ['Perkuliahan', response['perkuliahan'][3].Tidak],
                                            ['Demontrasi',  response['demontrasi'][3].Tidak],
                                            ['Partisipasi riset',  response['partisipasi_riset'][1].Tidak],
                                            ['Praktikum',  response['praktikum'][3].Tidak],
                                            ['Kerja lapangan',  response['kerja_lapangan'][3].Tidak],
                                            ['Magang',  response['magang'][3].Tidak],
                                            ['Diskusi',  response['diskusi'][3].Tidak]
                                        ],
                                "name": 'Tidak',
                                "color": '#90EE90'
                            },
                            {
                                "data": [
                                            ['Perkuliahan', response['perkuliahan'][4].Tidak_sama_sekali],
                                            ['Demontrasi',  response['demontrasi'][4].Tidak_sama_sekali],
                                            ['Partisipasi riset',  response['partisipasi_riset'][4].Tidak_sama_sekali],
                                            ['Praktikum',  response['praktikum'][4].Tidak_sama_sekali],
                                            ['Kerja lapangan',  response['kerja_lapangan'][4].Tidak_sama_sekali],
                                            ['Magang',  response['magang'][4].Tidak_sama_sekali],
                                            ['Diskusi',  response['diskusi'][4].Tidak_sama_sekali]
                                        ],
                                "name": 'Tidak Sama Sekali',
                                "color": '#FFE4B5'
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
        }
    });

</script>
@endsection

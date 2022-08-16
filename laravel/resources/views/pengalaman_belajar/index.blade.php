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
                Penilaian Terhadap Pengalaman Belajar
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
                    <div id="chart_pengalaman_belajar"></div>
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
                                Bagaimana penilaian Anda terhadap pengalaman belajar di bawah ini?
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{url('export_pengalaman_belajar')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon">
                            <span>
                                <i class="la la-file-excel-o"></i>
                                <span>Export Excell</span>
                            </span>
                        </a>
                    </div>
                </div>

 <b>Filter Tahun Lulus: </b>
        @foreach ($show_tahun as $item)
            <organisasi_lintasel class="m-checkbox m-checkbox--solid m-checkbox--success">
                <input class="filter-checkbox" type="checkbox"  value="{{$item->tahun_lulus}}"> {{$item->tahun_lulus}}
                <span></span>
            </organisasi_lintasel>
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
                            <th >Tahun lulus</th>
                            <th >Pembelajaran di kelas</th>
                            <th >Magang/kerja lapangan/prakmagang_kerjaum</th>
                            <th >Pengabdian masyarakat</th>
                            <th >Pelaksanaan riset/penulisan thesis</th>
                            <th >Organisasi kemahasiswaan internal fakultas</th>
                            <th >Organisasi kemahasiswaan lintas fakultas di UNISMA</th>
                            <th >Organisasi kemahasiswaaan lintas universitas nasional</th>
                            <th >Organisasi kemahasiswaan lintas universitas lintas negara (internasional)</th>
                            <th >Kegiatan ekstrakurikuler</th>
                            <th >Rekreasi dan olahraga</th>
                            <th >Created</th>
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
                url: '{{url("datatable-pengalaman-belajar")}}',
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
            url: "{{url('graph-pengalaman-belajar')}}" + '/' + tahun,
            type: 'GET',
            dataType: 'JSON',
            success:function(response){

            Highcharts.chart('chart_pengalaman_belajar', {
                    chart: {
                    type: 'column'
                    },
                    backgroundColor: '#000000',
                    credits: {
                            text: '',
                        },
                    title: {
                        text: 'Penilaian Terhadap Pengalaman Belajar - Tahun lulus: '+'<b style="color:#1978a9">' +tahun+'</b><br><br>'
                    },

                    xAxis: {
                        type: 'category'
                    },

                    yAxis: {
                        title: {
                            text: 'Penilaian Terhadap Pengalaman Belajar'
                        }
                    },
                    colors : ['#00a65a'],
                    legend: {
                        layout: 'horizontal',
                        align: 'right',
                        horizontalAlign: 'middle'
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
                                            ['Pembelajaran di kelas', response['kelas'][0].Sangatbesar],
                                            ['Magang/kerja lapangan/praktikum', response['magang_kerja'][0].Sangatbesar],
                                            ['Pengabdian masyarakat', response['pengabdian'][0].Sangatbesar],
                                            ['Organisasi kemahasiswaan internal fakultas', response['organisasi_internal'][0].Sangatbesar],
                                            ['Pelaksanaan riset/penulisan thesis', response['thesis'][0].Sangatbesar],
                                            ['Organisasi kemahasiswaan lintas fakultas di UNISMA', response['organisasi_lintas'][0].Sangatbesar],
                                            ['Organisasi kemahasiswaaan lintas universitas nasional', response['organisasi_lintas_nasional'][0].Sangatbesar],
                                            ['Organisasi kemahasiswaan lintas universitas lintas negara (internasional)', response['organisasi_lintas_negara'][0].Sangatbesar],
                                            ['Kegiatan ekstrakurikuler', response['ekstrakurikuler'][0].Sangatbesar],
                                            ['Rekreasi dan olahraga', response['olahraga'][0].Sangatbesar]
                                        ],
                                "name": 'Sangat Besar',
                                "color" : '#4169E1'
                            },
                            {
                                "data": [
                                            ['Pembelajaran di kelas', response['kelas'][1].Besar],
                                            ['Magang/kerja lapangan/praktikum',  response['magang_kerja'][1].Besar],
                                            ['Pengabdian masyarakat',  response['pengabdian'][1].Besar],
                                            ['Organisasi kemahasiswaan internal fakultas',  response['organisasi_internal'][1].Besar],
                                            ['Pelaksanaan riset/penulisan thesis',  response['thesis'][1].Besar],
                                            ['Organisasi kemahasiswaan lintas fakultas di UNISMA',  response['organisasi_lintas'][1].Besar],
                                            ['Organisasi kemahasiswaaan lintas universitas nasional',  response['organisasi_lintas_nasional'][1].Besar],
                                            ['Organisasi kemahasiswaan lintas universitas lintas negara (internasional)', response['organisasi_lintas_negara'][1].Besar],
                                            ['Kegiatan ekstrakurikuler', response['ekstrakurikuler'][1].Besar],
                                            ['Rekreasi dan olahraga', response['olahraga'][1].Besar]

                                        ],
                                "name": 'Besar',
                                "color" : '#CD5C5C'
                            },
                            {
                                "data": [
                                            ['Pembelajaran di kelas', response['kelas'][2].Cukup],
                                            ['Magang/kerja lapangan/praktikum',  response['magang_kerja'][2].Cukup],
                                            ['Pengabdian masyarakat',  response['pengabdian'][2].Cukup],
                                            ['Organisasi kemahasiswaan internal fakultas',  response['organisasi_internal'][2].Cukup],
                                            ['Pelaksanaan riset/penulisan thesis',  response['thesis'][2].Cukup],
                                            ['Organisasi kemahasiswaan lintas fakultas di UNISMA',  response['organisasi_lintas'][2].Cukup],
                                            ['Organisasi kemahasiswaaan lintas universitas nasional',  response['organisasi_lintas_nasional'][2].Cukup],
                                            ['Organisasi kemahasiswaan lintas universitas lintas negara (internasional)', response['organisasi_lintas_negara'][2].Cukup],
                                            ['Kegiatan ekstrakurikuler', response['ekstrakurikuler'][2].Cukup],
                                            ['Rekreasi dan olahraga', response['olahraga'][2].Cukup]
                                        ],
                                "name": 'Cukup',
                                "color" : "#D2B48C"
                            },
                            {
                                "data": [
                                            ['Pembelajaran di kelas', response['kelas'][3].Tidak],
                                            ['Magang/kerja lapangan/praktikum',  response['magang_kerja'][3].Tidak],
                                            ['Pengabdian masyarakat',  response['pengabdian'][1].Tidak],
                                            ['Organisasi kemahasiswaan internal fakultas',  response['organisasi_internal'][3].Tidak],
                                            ['Pelaksanaan riset/penulisan thesis',  response['thesis'][3].Tidak],
                                            ['Organisasi kemahasiswaan lintas fakultas di UNISMA',  response['organisasi_lintas'][3].Tidak],
                                            ['Organisasi kemahasiswaaan lintas universitas nasional',  response['organisasi_lintas_nasional'][3].Tidak],
                                            ['Organisasi kemahasiswaan lintas universitas lintas negara (internasional)', response['organisasi_lintas_negara'][3].Tidak],
                                            ['Kegiatan ekstrakurikuler', response['ekstrakurikuler'][3].Tidak],
                                            ['Rekreasi dan olahraga', response['olahraga'][3].Tidak]
                                        ],
                                "name": 'Tidak',
                                "color": '#90EE90'
                            },
                            {
                                "data": [
                                            ['Pembelajaran di kelas', response['kelas'][4].Tidak_sama_sekali],
                                            ['Magang/kerja lapangan/praktikum',  response['magang_kerja'][4].Tidak_sama_sekali],
                                            ['Pengabdian masyarakat',  response['pengabdian'][4].Tidak_sama_sekali],
                                            ['Organisasi kemahasiswaan internal fakultas',  response['organisasi_internal'][4].Tidak_sama_sekali],
                                            ['Pelaksanaan riset/penulisan thesis',  response['thesis'][4].Tidak_sama_sekali],
                                            ['Organisasi kemahasiswaan lintas fakultas di UNISMA',  response['organisasi_lintas'][4].Tidak_sama_sekali],
                                            ['Organisasi kemahasiswaaan lintas universitas nasional',  response['organisasi_lintas_nasional'][4].Tidak_sama_sekali],
                                            ['Organisasi kemahasiswaan lintas universitas lintas negara (internasional)', response['organisasi_lintas_negara'][4].Tidak_sama_sekali],
                                            ['Kegiatan ekstrakurikuler', response['ekstrakurikuler'][4].Tidak_sama_sekali],
                                            ['Rekreasi dan olahraga', response['olahraga'][4].Tidak_sama_sekali]
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

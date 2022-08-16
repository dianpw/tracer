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
                    Penilaian Terhadap Aspek Belajar Mengajar
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
                    <div id="chart_pbm"></div>
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
                                Bagaimana penilaian Anda terhadap aspek belajar mengajar di bawah ini?
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{url('export_pbm')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon">
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
                            <th >Tahun lulus</th>
                            <th >Interaksi dengan Dosen di Luar Jadwal Kuliah</th>
                            <th >Pembimbingan akademik</th>
                            <th >Berpartisipasi dalam proyek riset</th>
                            <th >Kondisi umum belajar mengajar</th>
                            <th >Kesempatan menjadi bagian dari jejaring ilmiah profesional</th>
                            <th >Kesempatan berinteraksi dengan teman</th>
                            <th >Kesempatan berpartisipasi dalam pelayanan pasien</th>
                            <th >Lainnya</th>
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
                url: '{{url("datatable-pbm")}}',
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
            url: "{{url('graph-pbm')}}" + '/' + tahun,
            type: 'GET',
            dataType: 'JSON',
            success:function(response){

            Highcharts.chart('chart_pbm', {
                    chart: {
                    type: 'column'
                    },
                    backgroundColor: '#000000',
                    credits: {
                            text: '',
                        },
                    title: {
                        text: 'Penilaian Terhadap Aspek Belajar Mengajar - Tahun lulus: '+'<b style="color:#1978a9">' +tahun+'</b><br><br>'
                    },

                    xAxis: {
                        type: 'category'
                    },

                    yAxis: {
                        title: {
                            text: 'Penilaian Terhadap Aspek Belajar Mengajar'
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
                                            ['Kesempatan untuk berinteraksi dengan dosen di luar jadwal kuliah', response['interaksi_dosen'][0].Sangatbesar],
                                            ['Pembimbingan akademik', response['bimbingan_akademik'][0].Sangatbesar],
                                            ['Kesempatan berpartisipasi dalam proyek riset', response['proyek_riset'][0].Sangatbesar],
                                            ['Kesempatan untuk memasuki dan menjadi bagian dari jejaring ilmiah profesional', response['jejaring_ilmiah'][0].Sangatbesar],
                                            ['Kondisi umum belajar mengajar', response['kondisi_belajar'][0].Sangatbesar],
                                            ['Kesempatan untuk berinteraksi dengan teman', response['interaksi_teman'][0].Sangatbesar],
                                            ['Kesempatan untuk berpartisipasi dalam pelayanan pasien', response['partisipasi_pelayanan'][0].Sangatbesar],
                                            ['Lainnya', response['lainnya'][0].Sangatbesar]
                                        ],
                                "name": 'Sangat Besar',
                                "color" : '#4169E1'
                            },
                            {
                                "data": [
                                            ['Kesempatan untuk berinteraksi dengan dosen di luar jadwal kuliah', response['interaksi_dosen'][1].Besar],
                                            ['Pembimbingan akademik',  response['bimbingan_akademik'][1].Besar],
                                            ['Kesempatan berpartisipasi dalam proyek riset',  response['proyek_riset'][1].Besar],
                                            ['Kesempatan untuk memasuki dan menjadi bagian dari jejaring ilmiah profesional',  response['jejaring_ilmiah'][1].Besar],
                                            ['Kondisi umum belajar mengajar',  response['kondisi_belajar'][1].Besar],
                                            ['Kesempatan untuk berinteraksi dengan teman',  response['interaksi_teman'][1].Besar],
                                            ['Kesempatan untuk berpartisipasi dalam pelayanan pasien',  response['partisipasi_pelayanan'][1].Besar],
                                            ['Lainnya', response['lainnya'][0].Besar]

                                        ],
                                "name": 'Besar',
                                "color" : '#CD5C5C'
                            },
                            {
                                "data": [
                                            ['Kesempatan untuk berinteraksi dengan dosen di luar jadwal kuliah', response['interaksi_dosen'][2].Cukup],
                                            ['Pembimbingan akademik',  response['bimbingan_akademik'][2].Cukup],
                                            ['Kesempatan berpartisipasi dalam proyek riset',  response['proyek_riset'][2].Cukup],
                                            ['Kesempatan untuk memasuki dan menjadi bagian dari jejaring ilmiah profesional',  response['jejaring_ilmiah'][2].Cukup],
                                            ['Kondisi umum belajar mengajar',  response['kondisi_belajar'][2].Cukup],
                                            ['Kesempatan untuk berinteraksi dengan teman',  response['interaksi_teman'][2].Cukup],
                                            ['Kesempatan untuk berpartisipasi dalam pelayanan pasien',  response['partisipasi_pelayanan'][2].Cukup],
                                            ['Lainnya', response['lainnya'][0].Cukup]
                                        ],
                                "name": 'Cukup',
                                "color" : "#D2B48C"
                            },
                            {
                                "data": [
                                            ['Kesempatan untuk berinteraksi dengan dosen di luar jadwal kuliah', response['interaksi_dosen'][3].Tidak],
                                            ['Pembimbingan akademik',  response['bimbingan_akademik'][3].Tidak],
                                            ['Kesempatan berpartisipasi dalam proyek riset',  response['proyek_riset'][1].Tidak],
                                            ['Kesempatan untuk memasuki dan menjadi bagian dari jejaring ilmiah profesional',  response['jejaring_ilmiah'][3].Tidak],
                                            ['Kondisi umum belajar mengajar',  response['kondisi_belajar'][3].Tidak],
                                            ['Kesempatan untuk berinteraksi dengan teman',  response['interaksi_teman'][3].Tidak],
                                            ['Kesempatan untuk berpartisipasi dalam pelayanan pasien',  response['partisipasi_pelayanan'][3].Tidak],
                                            ['Lainnya', response['lainnya'][0].Tidak]
                                        ],
                                "name": 'Tidak',
                                "color": '#90EE90'
                            },
                            {
                                "data": [
                                            ['Kesempatan untuk berinteraksi dengan dosen di luar jadwal kuliah', response['interaksi_dosen'][4].Tidak_sama_sekali],
                                            ['Pembimbingan akademik',  response['bimbingan_akademik'][4].Tidak_sama_sekali],
                                            ['Kesempatan berpartisipasi dalam proyek riset',  response['proyek_riset'][4].Tidak_sama_sekali],
                                            ['Kesempatan untuk memasuki dan menjadi bagian dari jejaring ilmiah profesional',  response['jejaring_ilmiah'][4].Tidak_sama_sekali],
                                            ['Kondisi umum belajar mengajar',  response['kondisi_belajar'][4].Tidak_sama_sekali],
                                            ['Kesempatan untuk berinteraksi dengan teman',  response['interaksi_teman'][4].Tidak_sama_sekali],
                                            ['Kesempatan untuk berpartisipasi dalam pelayanan pasien',  response['partisipasi_pelayanan'][4].Tidak_sama_sekali],
                                            ['Lainnya', response['lainnya'][0].Tidak_sama_sekali]
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

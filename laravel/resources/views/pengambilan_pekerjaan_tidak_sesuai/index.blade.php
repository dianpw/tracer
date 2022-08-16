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
                    Alasan Pengambilan pekerjaan tidak sesuai
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
                    <div id="chart_pengambilan_pekerjaan_tidak_sesuai"></div>
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
                                F4. Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya? (Jawaban bisa lebih dari satu)
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-md-3 text-right">     
                        <a href="{{url('export_pengambilan_pekerjaan_tidak_sesuai')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon">
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
                            <th style="15%">pertanyaan tidak sesuai </th>
                            <th style="25%">Saya belum mendapatkan pekerjaan yang lebih sesuai</th>

                            <th style="15%">di pekerjaan ini saya memeroleh prospek karir yang baik</th>
                            <th style="15%">saya lebih suka bekerja di area pekerjaan</th>
                            <th style="15%">saya dipromosikan ke posisi yang kurang</th>
                            <th style="15%">Saya dapat memeroleh pendapatan</th>
                            <th style="15%">Pekerjaan saya saat ini lebih aman terjamin secure</th>
                            <th style="15%">Pekerjaan saya saat ini lebih menarik</th>
                            <th style="15%">Pekerjaan saya saat ini lebih memungkinkan</th>
                            <th style="15%">Pekerjaan saya saat ini lokasinya lebih dekat</th>
                            <th style="15%">Pekerjaan saya saat ini dapat lebih</th>
                            <th style="15%">Pada awal meniti karir ini</th>
                            <th style="15%">Lainnya</th>

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
                url: '{{url("datatable-pengambilan-pekerjaan-tidak-sesuai")}}',
                dataSrc: 'result',
            },
            scrollX:        true,

            autoWidth:         true,

        });
    
    $('.filter-checkbox').on('change', function(e){
        var searchTerms = []
        $.each($('.filter-checkbox'), function(i,elem){
          if($(elem).prop('checked')){
            searchTerms.push( $(this).val())
          }
        })
        table_evaluasi_pegawai.column(4).search(searchTerms.join('|'), true, false, true).draw();
      });

    
    $('#change_graph').select2({width: 'resolve'});
        $('#change_graph').on('change', function(){
            var tahun = $(this).val();
            console.log(tahun);
            chart(tahun);
        });

        var n = "{{ $tahun_terakhir[0]->tahun_lulus }}"
        chart(n);
        function chart(tahun){
        	$.ajax({
            url: "{{url('graph-pengambilan-pekerjaan-tidak-sesuai')}}"+ '/' + tahun,
            type: 'GET',
            dataType: 'JSON',
            success:function(response){

            Highcharts.chart('chart_pengambilan_pekerjaan_tidak_sesuai', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Alasan Pengambilan pekerjaan tidak sesuai - Tahun lulus: '+'<b style="color:#1978a9">' +tahun+'</b><br><br>'
                },
                subtitle: {
                    text: 'Source: <a href="">http://cdc.unisma.ac.id/tracer_study/</a>'
                },
                xAxis: {
                    categories: ['Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya.',
                                'Saya belum mendapatkan pekerjaan yang lebih sesuai',
                                'Di pekerjaan ini saya memeroleh prospek karir yang baik',
                                'Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya',
                                'Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya',
                                'Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini',
                                'Pekerjaan saya saat ini lebih aman/terjamin/secure',
                                'Pekerjaan saya saat ini lebih menarik',
                                'Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll',
                                'Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya',
                                'Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya',
                                'Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya.',
                                'Lainnya'
                                ],
                    title: {
                        text: null
                    }
                },


                yAxis: {
                    min: 0,
                    title: {
                        text: 'Total ',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: ' Data'
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                legend: {
                    layout: 'horizontal',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -40,
                    y: 80,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor:
                        Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                    shadow: true
                },
                credits: {
                    enabled: false
                },
                series: [{
                    data: [
                        {y:response.pertanyaan_tidak_sesuai_pekerjaan[0], color:'#0074D9'},
                        {y:response.Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai[0], color:'#39CCCC'},
                        {y:response.di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik[0], color:'#B10DC9'},
                        {y:response.saya_lebih_suka_bekerja_di_area_pekerjaan[0], color:'#AAAAAA'},

                        {y:response.saya_dipromosikan_ke_posisi_yang_kurang[0], color:'#B10DC9'},
                        {y:response.Saya_dapat_memeroleh_pendapatan[0], color:'#B10DC9'},
                        {y:response.Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure[0], color:'#B10DC9'},
                        {y:response.Pekerjaan_saya_saat_ini_lebih_menarik[0], color:'#B10DC9'},
                        {y:response.Pekerjaan_saya_saat_ini_lebih_memungkinkan[0], color:'#B10DC9'},
                        {y:response.Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat[0], color:'#B10DC9'},
                        {y:response.Pekerjaan_saya_saat_ini_dapat_lebih[0], color:'#B10DC9'},
                        {y:response.Pada_awal_meniti_karir_ini[0], color:'#B10DC9'},
                        {y:response.Lainnya[0], color:'#B10DC9'},


                    ]
                  }]

                });
            }
        });
        }
    
        

    });

</script>
@endsection

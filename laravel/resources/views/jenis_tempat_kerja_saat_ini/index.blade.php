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
                   Jenis Tempat Kerja
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
                    <div id="jenis_tempat_kerja"></div>
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
                                D4. Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-md-3 text-right">     
                        <a href="{{url('export_jenis_tempat_kerja_saat_ini')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon">
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
                            <th style="15%">wirausaha ijin</th>
                            <th style="25%">wirausaha lokal</th>
                            <th style="15%">perusahaan swasta ijin</th>
                            <th style="15%">perusahaan lokal</th>
                            <th style="15%">instansi pemerintah bumn</th>
                            <th style="15%">organisasi non profit</th>
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
                url: '{{url("datatable-jenis-tempat-bekerja")}}',
                dataSrc: 'result',
            },
            scrollX:        true,

            autoWidth:         true,

        });
    
    $('.filter-checkbox').on('change', function(e){
        var searchTerms = []
        $.each($('.filter-checkbox'), function(i,elem){
          if($(elem).prop('checked')){
            searchTerms.push($(this).val())
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
            url: "{{url('graph-jenis-tempat-bekerja')}}" + '/' + tahun,
            type: 'GET',
            dataType: 'JSON',
            success:function(response){

            Highcharts.chart('jenis_tempat_kerja', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Jenis Tempat Kerja Saat Ini - Tahun lulus: '+'<b style="color:#1978a9">' +tahun+'</b><br><br>'
                },
                subtitle: {
                    text: 'Source: <a href="">http://cdc.unisma.ac.id/tracer_study/</a>'
                },
                xAxis: {
                    type: 'category'
                },


                yAxis: {
                    title: {
                        text: 'Jenis tempat kerja'
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
                series: [
                            {
                                "data": [
                                            [ 'Wirausaha Ijin', response['count_wirausaha_ijin'][0].berijin],
                                            [ 'Wirausaha Lokal', response['count_wirausaha_lokal'][0].berijin],
                                            [ 'Perusahaan Swasta ijin', response['count_perusahaan_swasta_ijin'][0].berijin],
                                            [ 'Perusahaan Lokal', response['count_perusahaan_lokal'][0].berijin],
                                            [ 'Instansi/Pemerintah/BUMN', response['count_instansi_pemerintah_bumn'][0].berijin],
                                            [ 'Organisasi no profit', response['count_organisasi_non_profit'][0].berijin],

                                        ],
                                "name": 'Berijin',
                                "color" : '#4169E1'
                            },
                            {
                                "data": [
                                            [ 'Wirausaha Ijin', response['count_wirausaha_ijin'][0].tidakberijin],
                                            [ 'Wirausaha Lokal', response['count_wirausaha_lokal'][0].tidakberijin],
                                            [ 'Perusahaan Swasta ijin', response['count_perusahaan_swasta_ijin'][0].tidakberijin],
                                            [ 'Perusahaan Lokal', response['count_perusahaan_lokal'][0].tidakberijin],
                                            [ 'Instansi/Pemerintah/BUMN', response['count_instansi_pemerintah_bumn'][0].tidakberijin],
                                            [ 'Organisasi no profit', response['count_organisasi_non_profit'][0].tidakberijin],


                                        ],
                                "name": 'Tidak Berijin',
                                "color" : 'red'
                            },
                            {
                                "data": [
                                            [ 'Wirausaha Ijin', response['count_wirausaha_ijin'][0].lokal],
                                            [ 'Wirausaha Lokal', response['count_wirausaha_lokal'][0].lokal],
                                            [ 'Perusahaan Swasta ijin', response['count_perusahaan_swasta_ijin'][0].lokal],
                                            [ 'Perusahaan Lokal', response['count_perusahaan_lokal'][0].lokal],
                                            [ 'Instansi/Pemerintah/BUMN', response['count_instansi_pemerintah_bumn'][0].lokal],
                                            [ 'Organisasi no profit', response['count_organisasi_non_profit'][0].lokal],


                                        ],
                                "name": 'Lokal',
                                "color" : 'green'
                            },
                            {
                                "data": [
                                            [ 'Wirausaha Ijin', response['count_wirausaha_ijin'][0].nasional],
                                            [ 'Wirausaha Lokal', response['count_wirausaha_lokal'][0].nasional],
                                            [ 'Perusahaan Swasta ijin', response['count_perusahaan_swasta_ijin'][0].nasional],
                                            [ 'Perusahaan Lokal', response['count_perusahaan_lokal'][0].nasional],
                                            [ 'Instansi/Pemerintah/BUMN', response['count_instansi_pemerintah_bumn'][0].nasional],
                                            [ 'Organisasi no profit', response['count_organisasi_non_profit'][0].nasional],


                                        ],
                                "name": 'Nasional',
                                "color" : 'yellow'
                            },

                            {
                                "data": [
                                            [ 'Wirausaha Ijin', response['count_wirausaha_ijin'][0].internasional],
                                            [ 'Wirausaha Lokal', response['count_wirausaha_lokal'][0].internasional],
                                            [ 'Perusahaan Swasta ijin', response['count_perusahaan_swasta_ijin'][0].internasional],
                                            [ 'Perusahaan Lokal', response['count_perusahaan_lokal'][0].internasional],
                                            [ 'Instansi/Pemerintah/BUMN', response['count_instansi_pemerintah_bumn'][0].internasional],
                                            [ 'Organisasi no profit', response['count_organisasi_non_profit'][0].internasional],


                                        ],
                                "name": 'Internasional',
                                "color" : 'orange'
                            },





                            ],

                });
            }
        });
        }

        

    });

</script>
@endsection

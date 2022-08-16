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
                    Cara Memperoleh Pekerjaan
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


                    <br><br>
                    <div id="chart_cara_memperoleh_pekerjaan"></div>
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
                                F4. Bagaimana cara Anda mendapatkan pekerjaan setelah lulus dari program pascasarjana Unisma? (jawaban boleh lebih dari satu)
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{url('export_cara_memperoleh_pekerjaan')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon">
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
                        <tr class="text-center">
                            <th style="5%">No.</th>
                            <th style="15%">NPM</th>
                            <th style="25%">Nama</th>
                            <th style="25%">Prodi</th>
                            <th style="15%">Tahun lulus</th>
                            <th style="15%">Melalui iklan di koran/majalah, brosur</th>
                            <th style="25%">Melamar ke perusahaan tanpa mengetahui lowongan yang ada</th>
                            <th style="25%">Pergi ke bursa/pameran kerja</th>
                            <th style="25%">Mencari lewat internet/iklan online/milis</th>
                            <th style="25%">Dihubungi oleh perusahaan</th>
                            <th style="25%">Menghubungi Kemenakertrans</th>
                            <th style="25%">Menghubungi agen tenaga kerja komersial/swasta</th>
                            <th style="25%">Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas</th>
                            <th style="25%">Menghubungi kantor kemahasiswaan/hubungan alumni</th>
                            <th style="25%">Membangun jejaring (network) sejak masih kuliah</th>
                            <th style="25%">Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)  </th>
                            <th style="25%">Membangun bisnis sendiri</th>
                            <th style="25%">Melalui penempatan kerja atau magang</th>
                            <th style="25%">Bekerja di tempat yang sama dengan tempat kerja semasa kuliah</th>
                            <th style="25%">Lainnya</th>
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
                url: "{{url('graph-cara-memperoleh-pekerjaan')}}"+ '/' + tahun,
                type: 'GET',
                dataType: 'JSON',
                success:function(response){
                    Highcharts.chart('chart_cara_memperoleh_pekerjaan', {
                        chart: {
                            type: 'bar'
                        },
                        title: {
                            text: 'Cara Memperoleh Pekerjaan - Tahun lulus: '+'<b style="color:#1978a9">' +tahun+'</b><br><br>'
                        },
                        subtitle: {
                            text: 'Source: <a href="">http://cdc.unisma.ac.id/tracer_study/</a>'
                        },
                        xAxis: {
                            categories: ['Melalui iklan di koran/majalah, brosur',
                                        'Melamar ke perusahaan tanpa mengetahui lowongan yang ada',
                                        'Pergi ke bursa/pameran kerja',
                                        'Mencari lewat internet/iklan online/milis',
                                        'Dihubungi oleh perusahaan',
                                        'Menghubungi Kemenakertrans',
                                        'Menghubungi agen tenaga kerja komersial/swasta',
                                        'Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas',
                                        'Menghubungi kantor kemahasiswaan/hubungan alumni',
                                        'Membangun jejaring (network) sejak masih kuliah',
                                        'Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)',
                                        'Membangun bisnis sendiri',
                                        'Melalui penempatan kerja atau magang',
                                        'Bekerja di tempat yang sama dengan tempat kerja semasa kuliah',
                                        'lainnya'
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
                            layout: 'vertical',
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
                                {y:response.melalui_iklan[0], color:'#0074D9'},
                                {y:response.melamar_keperusahaan[0], color:'#39CCCC'},
                                {y:response.pergi_kebursa[0], color:'#B10DC9'},
                                {y:response.mencari_lewat_internet[0], color:'#AAAAAA'},
                                {y:response.dihubungi_oleh_perusahaan[0], color:'#FFDC00'},
                                {y:response.menghubungi_kemenakertrans[0], color:'#01FF70'},
                                {y:response.menghubungi_agen_tenaga_kerja[0], color:'#01FF70'},
                                {y:response.memeroleh_informasi_dari_pusat[0], color:'#2ECC40'},
                                {y:response.menghubungi_kantor_kemahasiswaan[0], color:'#85144b'},
                                {y:response.membangun_jejaring[0], color:'#FF4136'},
                                {y:response.melalui_relasi[0], color:'#FF851B'},
                                {y:response.membangun_bisnis_sendiri[0], color:'#001f3f'},
                                {y:response.melalui_penempatan_kerja_magang[0], color:'#7FDBFF'},
                                {y:response.bekerja_ditempat_yang_sama[0], color:'#F012BE'},
                                {y:response.lainnya[0], color:'#DDDDDD'},
                            ],
                            showInLegend: true
                        }]
                    });
                }
            });
        }
        
        var table_evaluasi_pegawai = $('.tabel_show').DataTable({
            responsive:true,
            paging: true,
            info: true,
            searching: true,
            "aaSorting": [],
            "ordering": true,
            ajax: {
                url: '{{url("datatable-cara-memperoleh-pekerjaan")}}',
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
    });

</script>
@endsection

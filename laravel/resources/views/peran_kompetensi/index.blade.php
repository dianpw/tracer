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
                Peran Kompetensi dalam Melaksanakan Pekerjaan
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
                    <div id="chart_peran_kompetensi"></div>
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
                                Seberapa besar peran kompetensi yang diperoleh di S2/S3 UNISMA berikut ini dalam melaksanakan pekerjaan Anda?
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{url('export_peran_kompetensi')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon">
                            <span>
                                <i class="la la-file-excel-o"></i>
                                <span>Export Excell</span>
                            </span>
                        </a>
                    </div>
                </div>

 <b>Filter Tahun Lulus: </b>
        @foreach ($show_tahun as $item)
            <keterampilan_risetel class="m-checkbox m-checkbox--solid m-checkbox--success">
                <input class="filter-checkbox" type="checkbox"  value="{{$item->tahun_lulus}}"> {{$item->tahun_lulus}}
                <span></span>
            </keterampilan_risetel>
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
                            <th >Kompetensi multidisiplin di bidang program studi Anda</th>
                            <th >Pengetahuan isu terkini</th>
                            <th >Ketrampilan internet</th>
                            <th >Ketrampilan komputer</th>
                            <th >Berpikir kritis</th>
                            <th >Ketrampilan riset</th>
                            <th >Kemampuan belajar</th>
                            <th >Kemampuan berkomunikasi</th>
                            <th >Bekerja di bawah tekanan</th>
                            <th >Manajemen waktu</th>
                            <th >Bekerja secara mandiri</th>
                            <th >Bekerja dalam tim/bekerjasama dengan orang lain</th>
                            <th >Kemampuan dalam memecahkan masalah</th>
                            <th >Negosiasi</th>
                            <th >Kemampuan analisis</th>
                            <th >Toleransi</th>
                            <th >Kemampuan adaptasi</th>
                            <th >Loyalitas</th>
                            <th >Integritas</th>
                            <th >Bekerja dengan orang yang berbeda budaya maupun latar belakang</th>
                            <th >Kepemimpinan</th>
                            <th >Kemampuan dalam memegang tanggungjawab</th>
                            <th >Inisiatif</th>
                            <th >Manajemen proyek/program</th>
                            <th >Kemampuan untuk memresentasikan ide/produk/laporan</th>
                            <th >Kemampuan dalam menulis laporan, memo dan dokumen</th>
                            <th >Kemampuan untuk terus belajar sepanjang hayat</th>
                            <th >Kemampuan berbahasa Inggris</th>
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
                url: '{{url("datatable-peran-kompetensi")}}',
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
            url: "{{url('graph-peran-kompetensi')}}" + '/' + tahun,
            type: 'GET',
            dataType: 'JSON',
            success:function(response){

            Highcharts.chart('chart_peran_kompetensi', {
                    chart: {
                    type: 'column'
                    },
                    backgroundColor: '#000000',
                    credits: {
                            text: '',
                        },
                    title: {
                        text: 'Peran Kompetensi dalam Melaksanakan Pekerjaan - Tahun lulus: '+'<b style="color:#1978a9">' +tahun+'</b><br><br>'
                    },

                    xAxis: {
                        type: 'category'
                    },

                    yAxis: {
                        title: {
                            text: 'Peran Kompetensi dalam Melaksanakan Pekerjaan'
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
                                            ['Kompetensi multidisiplin di bidang program studi Anda', response['multidisiplin'][0].Sangatbesar],
                                            ['Pengetahuan isu terkini', response['isu_terkini'][0].Sangatbesar],
                                            ['Ketrampilan internet', response['keterampilan_internet'][0].Sangatbesar],
                                            ['Berpikir kritis', response['berfikir_kritis'][0].Sangatbesar],
                                            ['Ketrampilan komputer', response['keterampilan_komputer'][0].Sangatbesar],
                                            ['Ketrampilan riset', response['keterampilan_riset'][0].Sangatbesar],
                                            ['Kemampuan belajar', response['kemampuan_belajar'][0].Sangatbesar],
                                            ['Kemampuan berkomunikasi', response['kemampuan_komunikasi'][0].Sangatbesar],
                                            ['Bekerja di bawah tekanan', response['di_bawah_tekanan'][0].Sangatbesar],
                                            ['Manajemen waktu', response['manajemen_waktu'][0].Sangatbesar],
                                            ['Bekerja secara mandiri', response['bekerja_mandiri'][0].Sangatbesar],
                                            ['Bekerja dalam tim/bekerjasama dengan orang lain', response['bekerja_tim'][0].Sangatbesar],
                                            ['Kemampuan dalam memecahkan masalah', response['pemecahan_masalah'][0].Sangatbesar],
                                            ['Negosiasi', response['negosiasi'][0].Sangatbesar],
                                            ['Kemampuan analisis', response['analisis'][0].Sangatbesar],
                                            ['Toleransi', response['toleransi'][0].Sangatbesar],
                                            ['Kemampuan adaptasi', response['adaptasi'][0].Sangatbesar],
                                            ['Loyalitas', response['loyalitas'][0].Sangatbesar],
                                            ['Integritas', response['integritas'][0].Sangatbesar],
                                            ['Bekerja dengan orang yang berbeda budaya maupun latar belakang', response['beda_budaya'][0].Sangatbesar],
                                            ['Kepemimpinan', response['kepemimpinan'][0].Sangatbesar],
                                            ['Kemampuan dalam memegang tanggungjawab', response['tanggungjawab'][0].Sangatbesar],
                                            ['Inisiatif', response['inisiatif'][0].Sangatbesar],
                                            ['Manajemen proyek/program', response['manajemen_proyek'][0].Sangatbesar],
                                            ['Kemampuan untuk memresentasikan ide/produk/laporan', response['presentasi'][0].Sangatbesar],
                                            ['Kemampuan dalam menulis laporan, memo dan dokumen', response['menulis_laporan'][0].Sangatbesar],
                                            ['Kemampuan untuk terus belajar sepanjang hayat', response['belajar_sepanjang_hayat'][0].Sangatbesar],
                                            ['Kemampuan berbahasa Inggris', response['berbahasa_inggris'][0].Sangatbesar]
                                        ],
                                "name": 'Sangat Besar',
                                "color" : '#4169E1'
                            },
                            {
                                "data": [
                                            ['Kompetensi multidisiplin di bidang program studi Anda', response['multidisiplin'][1].Besar],
                                            ['Pengetahuan isu terkini',  response['isu_terkini'][1].Besar],
                                            ['Ketrampilan internet',  response['keterampilan_internet'][1].Besar],
                                            ['Berpikir kritis',  response['berfikir_kritis'][1].Besar],
                                            ['Ketrampilan komputer',  response['keterampilan_komputer'][1].Besar],
                                            ['Ketrampilan riset',  response['keterampilan_riset'][1].Besar],
                                            ['Kemampuan belajar',  response['kemampuan_belajar'][1].Besar],
                                            ['Kemampuan berkomunikasi', response['kemampuan_komunikasi'][1].Besar],
                                            ['Bekerja di bawah tekanan', response['di_bawah_tekanan'][1].Besar],
                                            ['Manajemen waktu', response['manajemen_waktu'][1].Besar],
                                            ['Bekerja secara mandiri', response['bekerja_mandiri'][1].Besar],
                                            ['Bekerja dalam tim/bekerjasama dengan orang lain', response['bekerja_tim'][1].Besar],
                                            ['Kemampuan dalam memecahkan masalah', response['pemecahan_masalah'][1].Besar],
                                            ['Negosiasi', response['negosiasi'][1].Besar],
                                            ['Kemampuan analisis', response['analisis'][1].Besar],
                                            ['Toleransi', response['toleransi'][1].Besar],
                                            ['Kemampuan adaptasi', response['adaptasi'][1].Besar],
                                            ['Loyalitas', response['loyalitas'][1].Besar],
                                            ['Integritas', response['integritas'][1].Besar],
                                            ['Bekerja dengan orang yang berbeda budaya maupun latar belakang', response['beda_budaya'][1].Besar],
                                            ['Kepemimpinan', response['kepemimpinan'][1].Besar],
                                            ['Kemampuan dalam memegang tanggungjawab', response['tanggungjawab'][1].Besar],
                                            ['Inisiatif', response['inisiatif'][1].Besar],
                                            ['Manajemen proyek/program', response['manajemen_proyek'][1].Besar],
                                            ['Kemampuan untuk memresentasikan ide/produk/laporan', response['presentasi'][1].Besar],
                                            ['Kemampuan dalam menulis laporan, memo dan dokumen', response['menulis_laporan'][1].Besar],
                                            ['Kemampuan untuk terus belajar sepanjang hayat', response['belajar_sepanjang_hayat'][1].Besar],
                                            ['Kemampuan berbahasa Inggris', response['berbahasa_inggris'][1].Besar]

                                        ],
                                "name": 'Besar',
                                "color" : '#CD5C5C'
                            },
                            {
                                "data": [
                                            ['Kompetensi multidisiplin di bidang program studi Anda', response['multidisiplin'][2].Cukup],
                                            ['Pengetahuan isu terkini',  response['isu_terkini'][2].Cukup],
                                            ['Ketrampilan internet',  response['keterampilan_internet'][2].Cukup],
                                            ['Berpikir kritis',  response['berfikir_kritis'][2].Cukup],
                                            ['Ketrampilan komputer',  response['keterampilan_komputer'][2].Cukup],
                                            ['Ketrampilan riset',  response['keterampilan_riset'][2].Cukup],
                                            ['Kemampuan belajar',  response['kemampuan_belajar'][2].Cukup],
                                            ['Kemampuan berkomunikasi', response['kemampuan_komunikasi'][2].Cukup],
                                            ['Bekerja di bawah tekanan', response['di_bawah_tekanan'][2].Cukup],
                                            ['Manajemen waktu', response['manajemen_waktu'][2].Cukup],
                                            ['Bekerja secara mandiri', response['bekerja_mandiri'][2].Cukup],
                                            ['Bekerja dalam tim/bekerjasama dengan orang lain', response['bekerja_tim'][2].Cukup],
                                            ['Kemampuan dalam memecahkan masalah', response['pemecahan_masalah'][2].Cukup],
                                            ['Negosiasi', response['negosiasi'][2].Cukup],
                                            ['Kemampuan analisis', response['analisis'][2].Cukup],
                                            ['Toleransi', response['toleransi'][2].Cukup],
                                            ['Kemampuan adaptasi', response['adaptasi'][2].Cukup],
                                            ['Loyalitas', response['loyalitas'][2].Cukup],
                                            ['Integritas', response['integritas'][2].Cukup],
                                            ['Bekerja dengan orang yang berbeda budaya maupun latar belakang', response['beda_budaya'][2].Cukup],
                                            ['Kepemimpinan', response['kepemimpinan'][2].Cukup],
                                            ['Kemampuan dalam memegang tanggungjawab', response['tanggungjawab'][2].Cukup],
                                            ['Inisiatif', response['inisiatif'][2].Cukup],
                                            ['Manajemen proyek/program', response['manajemen_proyek'][2].Cukup],
                                            ['Kemampuan untuk memresentasikan ide/produk/laporan', response['presentasi'][2].Cukup],
                                            ['Kemampuan dalam menulis laporan, memo dan dokumen', response['menulis_laporan'][2].Cukup],
                                            ['Kemampuan untuk terus belajar sepanjang hayat', response['belajar_sepanjang_hayat'][2].Cukup],
                                            ['Kemampuan berbahasa Inggris', response['berbahasa_inggris'][2].Cukup]
                                        ],
                                "name": 'Cukup',
                                "color" : "#D2B48C"
                            },
                            {
                                "data": [
                                            ['Kompetensi multidisiplin di bidang program studi Anda', response['multidisiplin'][3].Tidak],
                                            ['Pengetahuan isu terkini',  response['isu_terkini'][3].Tidak],
                                            ['Ketrampilan internet',  response['keterampilan_internet'][1].Tidak],
                                            ['Berpikir kritis',  response['berfikir_kritis'][3].Tidak],
                                            ['Ketrampilan komputer',  response['keterampilan_komputer'][3].Tidak],
                                            ['Ketrampilan riset',  response['keterampilan_riset'][3].Tidak],
                                            ['Kemampuan belajar',  response['kemampuan_belajar'][3].Tidak],
                                            ['Kemampuan berkomunikasi', response['kemampuan_komunikasi'][3].Tidak],
                                            ['Bekerja di bawah tekanan', response['di_bawah_tekanan'][3].Tidak],
                                            ['Manajemen waktu', response['manajemen_waktu'][3].Tidak],
                                            ['Bekerja secara mandiri', response['bekerja_mandiri'][3].Tidak],
                                            ['Bekerja dalam tim/bekerjasama dengan orang lain', response['bekerja_tim'][3].Tidak],
                                            ['Kemampuan dalam memecahkan masalah', response['pemecahan_masalah'][3].Tidak],
                                            ['Negosiasi', response['negosiasi'][3].Tidak],
                                            ['Kemampuan analisis', response['analisis'][3].Tidak],
                                            ['Toleransi', response['toleransi'][3].Tidak],
                                            ['Kemampuan adaptasi', response['adaptasi'][3].Tidak],
                                            ['Loyalitas', response['loyalitas'][3].Tidak],
                                            ['Integritas', response['integritas'][3].Tidak],
                                            ['Bekerja dengan orang yang berbeda budaya maupun latar belakang', response['beda_budaya'][3].Tidak],
                                            ['Kepemimpinan', response['kepemimpinan'][3].Tidak],
                                            ['Kemampuan dalam memegang tanggungjawab', response['tanggungjawab'][3].Tidak],
                                            ['Inisiatif', response['inisiatif'][3].Tidak],
                                            ['Manajemen proyek/program', response['manajemen_proyek'][3].Tidak],
                                            ['Kemampuan untuk memresentasikan ide/produk/laporan', response['presentasi'][3].Tidak],
                                            ['Kemampuan dalam menulis laporan, memo dan dokumen', response['menulis_laporan'][3].Tidak],
                                            ['Kemampuan untuk terus belajar sepanjang hayat', response['belajar_sepanjang_hayat'][3].Tidak],
                                            ['Kemampuan berbahasa Inggris', response['berbahasa_inggris'][3].Tidak]
                                        ],
                                "name": 'Tidak',
                                "color": '#90EE90'
                            },
                            {
                                "data": [
                                            ['Kompetensi multidisiplin di bidang program studi Anda', response['multidisiplin'][4].Tidak_sama_sekali],
                                            ['Pengetahuan isu terkini',  response['isu_terkini'][4].Tidak_sama_sekali],
                                            ['Ketrampilan internet',  response['keterampilan_internet'][4].Tidak_sama_sekali],
                                            ['Berpikir kritis',  response['berfikir_kritis'][4].Tidak_sama_sekali],
                                            ['Ketrampilan komputer',  response['keterampilan_komputer'][4].Tidak_sama_sekali],
                                            ['Ketrampilan riset',  response['keterampilan_riset'][4].Tidak_sama_sekali],
                                            ['Kemampuan belajar',  response['kemampuan_belajar'][4].Tidak_sama_sekali],
                                            ['Kemampuan berkomunikasi', response['kemampuan_komunikasi'][4].Tidak_sama_sekali],
                                            ['Bekerja di bawah tekanan', response['di_bawah_tekanan'][4].Tidak_sama_sekali],
                                            ['Manajemen waktu', response['manajemen_waktu'][4].Tidak_sama_sekali],
                                            ['Bekerja secara mandiri', response['bekerja_mandiri'][4].Tidak_sama_sekali],
                                            ['Bekerja dalam tim/bekerjasama dengan orang lain', response['bekerja_tim'][4].Tidak_sama_sekali],
                                            ['Kemampuan dalam memecahkan masalah', response['pemecahan_masalah'][4].Tidak_sama_sekali],
                                            ['Negosiasi', response['negosiasi'][4].Tidak_sama_sekali],
                                            ['Kemampuan analisis', response['analisis'][4].Tidak_sama_sekali],
                                            ['Toleransi', response['toleransi'][4].Tidak_sama_sekali],
                                            ['Kemampuan adaptasi', response['adaptasi'][4].Tidak_sama_sekali],
                                            ['Loyalitas', response['loyalitas'][4].Tidak_sama_sekali],
                                            ['Integritas', response['integritas'][4].Tidak_sama_sekali],
                                            ['Bekerja dengan orang yang berbeda budaya maupun latar belakang', response['beda_budaya'][4].Tidak_sama_sekali],
                                            ['Kepemimpinan', response['kepemimpinan'][4].Tidak_sama_sekali],
                                            ['Kemampuan dalam memegang tanggungjawab', response['tanggungjawab'][4].Tidak_sama_sekali],
                                            ['Inisiatif', response['inisiatif'][4].Tidak_sama_sekali],
                                            ['Manajemen proyek/program', response['manajemen_proyek'][4].Tidak_sama_sekali],
                                            ['Kemampuan untuk memresentasikan ide/produk/laporan', response['presentasi'][4].Tidak_sama_sekali],
                                            ['Kemampuan dalam menulis laporan, memo dan dokumen', response['menulis_laporan'][4].Tidak_sama_sekali],
                                            ['Kemampuan untuk terus belajar sepanjang hayat', response['belajar_sepanjang_hayat'][4].Tidak_sama_sekali],
                                            ['Kemampuan berbahasa Inggris', response['berbahasa_inggris'][4].Tidak_sama_sekali]
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

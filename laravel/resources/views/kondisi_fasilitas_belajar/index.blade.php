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
                Penilaian Terhadap Kondisi Fasilitas Belajar
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
                    <div id="chart_kondisi_fasilitas_belajar"></div>
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
                                Bagaimana penilaian Anda terhadap kondisi fasilitas belajar di bawah ini?
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{url('export_kondisi_fasilitas_belajar')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon">
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
                            <th >Perpustakaan</th>
                            <th >TIK</th>
                            <th >Modul belajar</th>
                            <th >Ruang kuliah</th>
                            <th >Ruang belajar mandiri</th>
                            <th >Laboratorium</th>
                            <th >Variasi matakuliah</th>
                            <th >Akomodasi</th>
                            <th >Kantin</th>
                            <th >Pusat kegiatan mahasiswa</th>
                            <th >Fasililtas layanan kesehatan</th>
                            <th >Beasiswa</th>
                            <th >Parkir</th>
                            <th >Transportasi</th>
                            <th >Toilet</th>
                            <th >Fasilitas ibadah</th>
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
                url: '{{url("datatable-kondisi-fasilitas-belajar")}}',
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
            url: "{{url('graph-kondisi-fasilitas-belajar')}}" + '/' + tahun,
            type: 'GET',
            dataType: 'JSON',
            success:function(response){

            Highcharts.chart('chart_kondisi_fasilitas_belajar', {
                    chart: {
                    type: 'column'
                    },
                    backgroundColor: '#000000',
                    credits: {
                            text: '',
                        },
                    title: {
                        text: 'Penilaian Terhadap Kondisi Fasilitas Belajar - Tahun lulus: '+'<b style="color:#1978a9">' +tahun+'</b><br><br>'
                    },

                    xAxis: {
                        type: 'category'
                    },

                    yAxis: {
                        title: {
                            text: 'Penilaian Terhadap Kondisi Fasilitas Belajar'
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
                                            ['Perpustakaan', response['perpustakaan'][0].Sangatbesar],
                                            ['Teknologi Informasi dan Komunikasi', response['tik'][0].Sangatbesar],
                                            ['Modul belajar', response['modul'][0].Sangatbesar],
                                            ['Ruang belajar mandiri', response['ruang_belajar'][0].Sangatbesar],
                                            ['Ruang belajar/ruang kuliah', response['ruang_kuliah'][0].Sangatbesar],
                                            ['Laboratorium', response['lab'][0].Sangatbesar],
                                            ['Variasi matakuliah yang ditawarkan', response['variasi'][0].Sangatbesar],
                                            ['Akomodasi', response['akomodasi'][0].Sangatbesar],
                                            ['Kantin', response['kantin'][0].Sangatbesar],
                                            ['Pusat kegiatan mahasiswa dan fasilitasnya, ruang rekreasi', response['kegiatan_mahasiswa'][0].Sangatbesar],
                                            ['Fasililtas layanan kesehatan', response['layanan_kesehatan'][0].Sangatbesar],
                                            ['Beasiswa dan/atau bantuan biaya hidup', response['biaya_hidup'][0].Sangatbesar],
                                            ['Parkir', response['parkir'][0].Sangatbesar],
                                            ['Transportasi', response['transport'][0].Sangatbesar],
                                            ['Toilet/sanitari', response['toilet'][0].Sangatbesar],
                                            ['Fasilitas ibadah', response['ibadah'][0].Sangatbesar]
                                        ],
                                "name": 'Sangat Besar',
                                "color" : '#4169E1'
                            },
                            {
                                "data": [
                                            ['Perpustakaan', response['perpustakaan'][1].Besar],
                                            ['Teknologi Informasi dan Komunikasi',  response['tik'][1].Besar],
                                            ['Modul belajar',  response['modul'][1].Besar],
                                            ['Ruang belajar mandiri',  response['ruang_belajar'][1].Besar],
                                            ['Ruang belajar/ruang kuliah',  response['ruang_kuliah'][1].Besar],
                                            ['Laboratorium',  response['lab'][1].Besar],
                                            ['Variasi matakuliah yang ditawarkan',  response['variasi'][1].Besar],
                                            ['Akomodasi', response['akomodasi'][1].Besar],
                                            ['Kantin', response['kantin'][1].Besar],
                                            ['Pusat kegiatan mahasiswa dan fasilitasnya, ruang rekreasi', response['kegiatan_mahasiswa'][1].Besar],
                                            ['Fasililtas layanan kesehatan', response['layanan_kesehatan'][1].Besar],
                                            ['Beasiswa dan/atau bantuan biaya hidup', response['biaya_hidup'][1].Besar],
                                            ['Parkir', response['parkir'][1].Besar],
                                            ['Transportasi', response['transport'][1].Besar],
                                            ['Toilet/sanitari', response['toilet'][1].Besar],
                                            ['Fasilitas ibadah', response['ibadah'][1].Besar]

                                        ],
                                "name": 'Besar',
                                "color" : '#CD5C5C'
                            },
                            {
                                "data": [
                                            ['Perpustakaan', response['perpustakaan'][2].Cukup],
                                            ['Teknologi Informasi dan Komunikasi',  response['tik'][2].Cukup],
                                            ['Modul belajar',  response['modul'][2].Cukup],
                                            ['Ruang belajar mandiri',  response['ruang_belajar'][2].Cukup],
                                            ['Ruang belajar/ruang kuliah',  response['ruang_kuliah'][2].Cukup],
                                            ['Laboratorium',  response['lab'][2].Cukup],
                                            ['Variasi matakuliah yang ditawarkan',  response['variasi'][2].Cukup],
                                            ['Akomodasi', response['akomodasi'][2].Cukup],
                                            ['Kantin', response['kantin'][2].Cukup],
                                            ['Pusat kegiatan mahasiswa dan fasilitasnya, ruang rekreasi', response['kegiatan_mahasiswa'][2].Cukup],
                                            ['Fasililtas layanan kesehatan', response['layanan_kesehatan'][2].Cukup],
                                            ['Beasiswa dan/atau bantuan biaya hidup', response['biaya_hidup'][2].Cukup],
                                            ['Parkir', response['parkir'][2].Cukup],
                                            ['Transportasi', response['transport'][2].Cukup],
                                            ['Toilet/sanitari', response['toilet'][2].Cukup],
                                            ['Fasilitas ibadah', response['ibadah'][2].Cukup]
                                        ],
                                "name": 'Cukup',
                                "color" : "#D2B48C"
                            },
                            {
                                "data": [
                                            ['Perpustakaan', response['perpustakaan'][3].Tidak],
                                            ['Teknologi Informasi dan Komunikasi',  response['tik'][3].Tidak],
                                            ['Modul belajar',  response['modul'][1].Tidak],
                                            ['Ruang belajar mandiri',  response['ruang_belajar'][3].Tidak],
                                            ['Ruang belajar/ruang kuliah',  response['ruang_kuliah'][3].Tidak],
                                            ['Laboratorium',  response['lab'][3].Tidak],
                                            ['Variasi matakuliah yang ditawarkan',  response['variasi'][3].Tidak],
                                            ['Akomodasi', response['akomodasi'][3].Tidak],
                                            ['Kantin', response['kantin'][3].Tidak],
                                            ['Pusat kegiatan mahasiswa dan fasilitasnya, ruang rekreasi', response['kegiatan_mahasiswa'][3].Tidak],
                                            ['Fasililtas layanan kesehatan', response['layanan_kesehatan'][3].Tidak],
                                            ['Beasiswa dan/atau bantuan biaya hidup', response['biaya_hidup'][3].Tidak],
                                            ['Parkir', response['parkir'][3].Tidak],
                                            ['Transportasi', response['transport'][3].Tidak],
                                            ['Toilet/sanitari', response['toilet'][3].Tidak],
                                            ['Fasilitas ibadah', response['ibadah'][3].Tidak]
                                        ],
                                "name": 'Tidak',
                                "color": '#90EE90'
                            },
                            {
                                "data": [
                                            ['Perpustakaan', response['perpustakaan'][4].Tidak_sama_sekali],
                                            ['Teknologi Informasi dan Komunikasi',  response['tik'][4].Tidak_sama_sekali],
                                            ['Modul belajar',  response['modul'][4].Tidak_sama_sekali],
                                            ['Ruang belajar mandiri',  response['ruang_belajar'][4].Tidak_sama_sekali],
                                            ['Ruang belajar/ruang kuliah',  response['ruang_kuliah'][4].Tidak_sama_sekali],
                                            ['Laboratorium',  response['lab'][4].Tidak_sama_sekali],
                                            ['Variasi matakuliah yang ditawarkan',  response['variasi'][4].Tidak_sama_sekali],
                                            ['Akomodasi', response['akomodasi'][4].Tidak_sama_sekali],
                                            ['Kantin', response['kantin'][4].Tidak_sama_sekali],
                                            ['Pusat kegiatan mahasiswa dan fasilitasnya, ruang rekreasi', response['kegiatan_mahasiswa'][4].Tidak_sama_sekali],
                                            ['Fasililtas layanan kesehatan', response['layanan_kesehatan'][4].Tidak_sama_sekali],
                                            ['Beasiswa dan/atau bantuan biaya hidup', response['biaya_hidup'][4].Tidak_sama_sekali],
                                            ['Parkir', response['parkir'][4].Tidak_sama_sekali],
                                            ['Transportasi', response['transport'][4].Tidak_sama_sekali],
                                            ['Toilet/sanitari', response['toilet'][4].Tidak_sama_sekali],
                                            ['Fasilitas ibadah', response['ibadah'][4].Tidak_sama_sekali]
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

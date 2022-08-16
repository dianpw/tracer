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
                 Profil Karakter
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
                                Menurut Anda, bagaimanakah profil karakter kepribadian Anda dalam lingkungan kerja?
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-md-3 text-right">     
                        <a href="{{url('export_profil_karakter')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon">
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
                            <th style="15%">Melakukan Melakukan pekerjaan dengan penuh tanggung jawab dan keikhlasan dan keikhlasan</th>
                            <th style="25%">Mampu bekerjasama dalam tim</th>
                            <th style="15%">Bersungguh-sungguh dan memegang teguh nilai kebenaran dalam melakukan pekerjaan</th>
                            <th style="15%">Bekerja keras sesuai dengan kompetensi</th>
                            <th style="15%">Toleran dan mampu menerima masukkan dari siapapun masukkan dari siapapun</th>
                            <th style="15%">Meletakkan segala sesuatu secara professional</th>
                            <th style="15%">Kreatif dan inovatif dalam mengembangakan kualitas pekerjaan dalam mengembangakan kualitas pekerjaan</th>
                            <th style="15%">Mampu Mampu membuat keputusan terbaik dengan arif dan bijaksana dengan arif dan bijaksana</th>
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
                url: '{{url("datatable-profil-karakter")}}',
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
            console.log(tahun);
            chart(tahun);
        });

        var n = "{{ $tahun_terakhir[0]->tahun_lulus }}"
        chart(n);
        function chart(tahun){
        	 $.ajax({
            url: "{{url('graph-profil-karakter')}}"+ '/' + tahun,
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
                        text: 'Profil Karakter Kepribadian - Tahun lulus: '+'<b style="color:#1978a9">' +tahun+'</b><br><br>' 
                    },

                    xAxis: {
                        type: 'category'
                    },

                    yAxis: {
                        title: {
                            text: 'Profil Karakter'
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
                                            ['Melakukan Melakukan pekerjaan dengan penuh tanggung jawab dan keikhlasan dan keikhlasan', response['pekerjaandenganpenuhtanggungjawab'][0].sangat_rendah],
                                            ['Mampu bekerjasama dalam tim', response['Mampubekerjasamadalamtim'][0].sangat_rendah],
                                            ['Bersungguh-sungguh dan memegang teguh nilai kebenaran dalam melakukan pekerjaan', response['Bersungguh_sungguh'][0].sangat_rendah],
                                            ['Bekerja keras sesuai dengan kompetensi', response['Bekerjakerassesuaidengankompetensi'][0].sangat_rendah],
                                            ['Toleran dan mampu menerima masukkan dari siapapun masukkan dari siapapun', response['Tolerandanmampumenerima'][0].sangat_rendah],
                                            ['Meletakkan segala sesuatu secara professional', response['Meletakkansegalasesuatu'][0].sangat_rendah],
                                            ['Kreatif dan inovatif dalam mengembangakan kualitas pekerjaan dalam mengembangakan kualitas pekerjaan', response['Kreatifdaninovatif'][0].sangat_rendah],
                                            ['Mampu Mampu membuat keputusan terbaik dengan arif dan bijaksana dengan arif dan bijaksana', response['Mampumembuatkeputusanterbaik'][0].sangat_rendah]
                                        ],
                                "name": 'Sangat Besar',
                                "color" : '#4169E1'
                            },
                            {
                                "data": [
                                            ['Melakukan pekerjaan dengan penuh tanggung jawab dan keikhlasan', response['pekerjaandenganpenuhtanggungjawab'][1].rendah],
                                            ['Mampu bekerjasama dalam tim',  response['Mampubekerjasamadalamtim'][1].rendah],
                                            ['Bersungguh-sungguh dan memegang teguh nilai kebenaran dalam melakukan pekerjaan',  response['Bersungguh_sungguh'][1].rendah],
                                            ['Bekerja keras sesuai dengan kompetensi',  response['Bekerjakerassesuaidengankompetensi'][1].rendah],
                                            ['Toleran dan mampu menerima masukkan dari siapapun',  response['Tolerandanmampumenerima'][1].rendah],
                                            ['Meletakkan segala sesuatu secara professional',  response['Meletakkansegalasesuatu'][1].rendah],
                                            ['Kreatif dan inovatif dalam mengembangakan kualitas pekerjaan',  response['Kreatifdaninovatif'][1].rendah],
                                            ['Mampu membuat keputusan terbaik dengan arif dan bijaksana', response['Mampumembuatkeputusanterbaik'][1].rendah]

                                        ],
                                "name": 'Rendah',
                                "color" : '#CD5C5C'
                            },
                            {
                                "data": [
                                            [ 'Melakukan pekerjaan dengan penuh tanggung jawab dan keikhlasan', response['pekerjaandenganpenuhtanggungjawab'][2].cukup],
                                            ['Mampu bekerjasama dalam tim',  response['Mampubekerjasamadalamtim'][2].cukup],
                                            ['Bersungguh-sungguh dan memegang teguh nilai kebenaran dalam melakukan pekerjaan',  response['Bersungguh_sungguh'][2].cukup],
                                            ['Bekerja keras sesuai dengan kompetensi',  response['Bekerjakerassesuaidengankompetensi'][2].cukup],
                                            ['Toleran dan mampu menerima masukkan dari siapapun',  response['Tolerandanmampumenerima'][2].cukup],
                                            ['Meletakkan segala sesuatu secara professional',  response['Meletakkansegalasesuatu'][2].cukup],
                                            ['Kreatif dan inovatif dalam mengembangakan kualitas pekerjaan',  response['Kreatifdaninovatif'][2].cukup],
                                            ['Mampu membuat keputusan terbaik dengan arif dan bijaksana', response['Mampumembuatkeputusanterbaik'][2].cukup]
                                        ],
                                "name": 'Cukup',
                                "color" : "#D2B48C"
                            },
                            {
                                "data": [
                                            ['Melakukan pekerjaan dengan penuh tanggung jawab dan keikhlasan', response['pekerjaandenganpenuhtanggungjawab'][3].tinggi],
                                            ['Mampu bekerjasama dalam tim',  response['Mampubekerjasamadalamtim'][3].tinggi],
                                            ['Bersungguh-sungguh dan memegang teguh nilai kebenaran dalam melakukan pekerjaan',  response['Bersungguh_sungguh'][1].tinggi],
                                            ['Bekerja keras sesuai dengan kompetensi',  response['Bekerjakerassesuaidengankompetensi'][3].tinggi],
                                            ['Toleran dan mampu menerima masukkan dari siapapun',  response['Tolerandanmampumenerima'][3].tinggi],
                                            ['Meletakkan segala sesuatu secara professional',  response['Meletakkansegalasesuatu'][3].tinggi],
                                            ['Kreatif dan inovatif dalam mengembangakan kualitas pekerjaan',  response['Kreatifdaninovatif'][3].tinggi],
                                            ['Mampu membuat keputusan terbaik dengan arif dan bijaksana', response['Mampumembuatkeputusanterbaik'][3].tinggi]
                                        ],
                                "name": 'Tinggi',
                                "color": '#90EE90'
                            },
                            {
                                "data": [
                                            [ 'Melakukan pekerjaan dengan penuh tanggung jawab dan keikhlasan', response['pekerjaandenganpenuhtanggungjawab'][4].sangat_tinggi],
                                            ['Mampu bekerjasama dalam tim',  response['Mampubekerjasamadalamtim'][4].sangat_tinggi],
                                            ['Bersungguh-sungguh dan memegang teguh nilai kebenaran dalam melakukan pekerjaan',  response['Bersungguh_sungguh'][4].sangat_tinggi],
                                            ['Bekerja keras sesuai dengan kompetensi',  response['Bekerjakerassesuaidengankompetensi'][4].sangat_tinggi],
                                            ['Toleran dan mampu menerima masukkan dari siapapun',  response['Tolerandanmampumenerima'][4].sangat_tinggi],
                                            ['Meletakkan segala sesuatu secara professional',  response['Meletakkansegalasesuatu'][4].sangat_tinggi],
                                            ['Kreatif dan inovatif dalam mengembangakan kualitas pekerjaan',  response['Kreatifdaninovatif'][4].sangat_tinggi],
                                            ['Mampu membuat keputusan terbaik dengan arif dan bijaksana', response['Mampumembuatkeputusanterbaik'][4].sangat_tinggi]
                                        ],
                                "name": 'Sangat Tinggi',
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

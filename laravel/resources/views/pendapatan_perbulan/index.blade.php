@extends('template')
@section('konten')
<head>

</head>

<div class="col-xl-12">

    <!--begin:: Widgets/Best Sellers-->
    <div class="m-portlet m-portlet--full-height ">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                       Pendapatan Perbulan
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_widget5_tab1_content" role="tab" aria-selected="false">
                        View Data
                        </a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab2_content" role="tab" aria-selected="true">
                        Grafik
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="m-portlet__body">

            <!--begin::Content-->
            <div class="tab-content">
                <div class="tab-pane active show" id="m_widget5_tab1_content" aria-expanded="true">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="m-alert m-alert--icon m-alert--air alert alert-dismissible fade show" role="alert" style="background-color: #95a57e36">
                                <div class="m-alert__icon">
                                    <i class="la la-question"></i>
                                </div>
                                <div class="m-alert__text">
                                    <strong>Pertanyaan : </strong></br>
                                    D8.1. <b>[S1][S2][S3]</b> Kira-kira berapa pendapatan Anda dari pekerjaan utama setiap bulan?</br>
                                    D8.2. Kira-kira berapa pendapatan Anda dari lembur dan tips setiap bulan?</br>
                                    D8.3. Kira-kira berapa pendapatan Anda dari pekerjaan lainnya setiap bulan?</br>
                                    <b>[S2][S3]</b> Berapa nominal kenaikan pendapatan rata-rata Anda setelah mengambil S2/S3 UNISMA?
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 text-right">     
                            <a href="{{url('export_pendapatan_perbulan')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon">
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
                        <thead class="m-datatable__head" style="background-image: url('https://www.transparenttextures.com/patterns/sos.png');background-color: #349d44;color: #e5f6dd;">
                            <tr>
                                <th>No.</th>
                                <th>NPM</th>
                                <th>Nama</th>
                                <th>Prodi</th>
                                <th>Tahun lulus</th>
                                <th>Pekerjaan Utama</th>
                                <th>Lembur</th>
                                <th>Pekerjaan Lainnya</th>
                                <th>Kenaikan Pendapatan</th>
                                <th>Created</th>

                            </tr>
                        </thead>

                    </table>
                </div>

                <div class="tab-pane" id="m_widget5_tab2_content" aria-expanded="false">
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
                    <div id="chart_pendapatan_perbulan"></div>
                </div>

            </div>

            <!--end::Content-->
        </div>
    </div>

    <!--end:: Widgets/Best Sellers-->
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
                url: '{{url("datatable_pendapatan_perbulan")}}',
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
            url: "{{url('graph-pendapatan-perbulan')}}" + '/' + tahun,
            type: 'GET',
            dataType: 'JSON',
            success:function(response){

            Highcharts.chart('chart_pendapatan_perbulan', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Pendapatan Perbulan - Tahun lulus: '+'<b style="color:#1978a9">' +tahun+'</b><br><br>'
                },
                subtitle: {
                    text: 'Source: <a href="">http://cdc.unisma.ac.id/tracer_study/</a>'
                },
                xAxis: {
                    categories: ['1 Juta',
                                '2 Juta',
                                '3 Juta',
                                '4 Juta',
                                '5 Juta',
                                '6 Juta',
                                '7 Juta',
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
                        {y:response.satu_juta[0], color:'#0074D9'},
                        {y:response.dua_juta[0], color:'#39CCCC'},
                        {y:response.tiga_juta[0], color:'#B10DC9'},
                        {y:response.empat_juta[0], color:'#B10DC9'},
                        {y:response.lima_juta[0], color:'#B10DC9'},
                        {y:response.enam_juta[0], color:'#B10DC9'},
                        {y:response.tujuh_juta[0], color:'#B10DC9'},

                    ]
                  }]

                });
            }
        });
        }

        

    });

</script>
@endsection

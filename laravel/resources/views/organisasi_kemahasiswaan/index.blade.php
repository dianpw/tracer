@extends('template')
@section('konten')
<head>

</head>
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Organisasi Kemahasiswaan
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
                    <div id="organisasi_kemahasiswaan" style="height: 750px; width: 100%"></div>
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
                                Organisasi apa yang pernah saudara ikuti selama kuliah di Unisma dan sebagai apa? 
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{url('export_organisasi')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon">
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
                            <th style="25%">Organisasi</th>
                            <th style="15%">Created</th>

                        </tr>
                    </thead>

                </table>
            </div>

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
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
            url: "{{url('graph-organisasi-kemahasiswaan')}}" + '/' + tahun,
            type: 'GET',
            dataType: 'JSON',
            success:function(response){

            var isi_organisasi = [];
            var jumlah = [];
            for (var a=0; a< response.organisasi.length; a++){
                isi_organisasi.push(response.organisasi[a].organisasi);
            }
            console.log(response);
            Highcharts.chart('organisasi_kemahasiswaan', {
                chart: {
                    type: 'pie',

                },
                title: {
                    text: 'Organisasi kemahasiswaan yang diikuti - Tahun lulus: '+'<b style="color:#1978a9">' +tahun+'</b><br><br>'
                },
                subtitle: {
                    text: 'Source: <a href="">http://cdc.unisma.ac.id/tracer_study/</a><br><br>'
                },
                xAxis: {
                    categories: ["UKM jam'iyyatul Qurro'Wal Huffadz"],
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
        		  	align: 'center',
        			verticalAlign: 'bottom',
        			x: 0,
        			y: 0,
                  	borderWidth: 1,
                    backgroundColor:
                        Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                    shadow: true
    			},
                credits: {
                    enabled: false
                },

                series: [{
                    allowPointSelect: true,
                    keys: ['name', 'y', 'selected', 'sliced'],
                    data: response.organisasi,
                    showInLegend: true
                  }],
              responsive: {
        rules: [{
            condition: {
                maxWidth: 700
            },
            chartOptions: {
                legend: {
                    align: 'center',
                    verticalAlign: 'bottom',
                    layout: 'horizontal'
                },
                yAxis: {
                    labels: {
                        align: 'left',
                        x: 0,
                        y: -5
                    },
                    title: {
                        text: null
                    }
                },
                subtitle: {
                    text: null
                },
                credits: {
                    enabled: false
                }
            }
        }]
    }

                });
            }
        });
        }

        var table_evaluasi_pegawai = $('.tabel_show').DataTable({
            paging: true,
            searching: true,
            "aaSorting": [],
            "ordering": true,

            ajax: {
                url: '{{url("datatable-organisasi-kemahasiswaan")}}',
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

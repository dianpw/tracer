@extends('template')
@section('konten')
<head>
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<style>

.container {
  width: 100px;
  height:100px;
  display:flex;
  align-items: center;
  justify-content: center;
  position: relative;
  transform: rotate(45deg);
  
}
.center {
  width:8px;
  height:8px;
  background-color: red;
  border-radius:50%;
}

.inner, .outer {
  position: absolute;
  display:grid;
  gap:4px;
  grid-template-columns: 1fr 1fr;
  align-content: space-around;
  justify-content: space-between;
  
  animation: anim_inner 2000ms ease-in-out infinite;
}

.inner__item, .outer__item {
  width:8px;
  height:8px;
  border-radius:50%;
  background-color: #f8961e;
}

.outer {
  gap:16px;
  animation: anim_outer 2000ms ease-in-out 200ms infinite;
}

.outer__item {
  width:10px;
  height:10px;
  background-color: #43aa8b;
}

@keyframes anim_outer {
  from {transform:rotate(0deg)}
  30% {transform:rotate(0deg)}
  to {transform:rotate(360deg)}
}
@keyframes anim_inner {
  from {transform:rotate(0deg)}
  30% {transform:rotate(0deg)}
  to {transform:rotate(360deg)}
} 

@keyframes blink {50% { color: transparent }}
.loading__dot { animation: 2s blink infinite }
.loading__dot:nth-child(2) { animation-delay: 250ms }
.loading__dot:nth-child(3) { animation-delay: 500ms }

</style>
</head>
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                  Kompetensi A & B
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#m_tabs_1_3"><i class="flaticon-edit-1"></i>
                    Data Kompetensi A</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#m_tabs_1_2"><i class="flaticon-edit-1"></i>
                    Data Kompetensi B</a>
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
               
                    <!-- <div class="container">
                    <div class="center"></div>
                    

                            </div> -->
                    <center>
                        <div class="loading" id="load">
                            <b style="color:chocolate">Waiting Calculating Data </b>
                            <span class="loading__dot">.</span>
                            <span class="loading__dot">.</span>
                            <span class="loading__dot">.</span>
                        </div>
                    </center>

                    <div id="chart_cara_memperoleh_pekerjaan"></div>
                </div>
            </div>

            <div class="tab-pane active show" id="m_tabs_1_3" role="tabpanel">
               
                <div class="row">
                    <div class="col-md-6">
                        <b><h4>Data Kompetensi A</h4></b>

                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{url('export_kompetensi_a')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon">
                            <span>
                                <i class="la la-file-excel-o"></i>
                                <span>Export Excell</span>
                            </span>
                        </a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="m-alert m-alert--icon m-alert--air alert alert-dismissible fade show" role="alert" style="background-color: #95a57e36">
                            <div class="m-alert__icon">
                                <i class="la 
                                la-question
                                 "></i>
                            </div>
                            <div class="m-alert__text">
                                <strong>Pertanyaan : </strong></br>
                                Pada saat lulus, pada tigkat mana kompetensi di bawah ini yang Anda kuasai? (A)

                            </div>
                           
                        </div>
                    </div>
                  
                </div>
                <b>Filter Tahun Lulus: </b>
                @foreach ($show_tahun as $item)
                    <label class="m-checkbox m-checkbox--solid m-checkbox--success">
                        <input class="filter-checkbox-a" type="checkbox"  value="{{$item->tahun_lulus}}"> {{$item->tahun_lulus}}
                        <span></span>
                    </label>
                @endforeach

                &nbsp
                <br>

                <table cellpadding="0" class="table-striped tabel_show_kompetensi_a table table-bordered nowrap" cellspacing="0" width="100%">
                    <thead style="background-image: url('https://www.transparenttextures.com/patterns/sos.png');background-color: #349d44;color: #e5f6dd;">
                        <tr">
                            <th style="5%">No.</th>
                            <th style="15%">NPM</th>
                            <th style="25%">Nama</th>
                            <th style="25%">Prodi</th>
                            <th style="15%">Tahun lulus</th>
                            <th style="15%">ETIKA</th>
                            <th style="15%">KEAHLIAN</th>
                            <th style="15%">PENGGUNAAN TI</th>
                            <th style="15%">BAHASA INGGRIS</th>
                            <th style="15%">KOMUNIKASI</th>
                            <th style="15%">KERJASAMA</th>
                            <th style="15%">PENGEMBANGAN DIRI</th> 
                            <th style="15%">Created</th>

                        </tr>
                    </thead>

                </table>
            </div>

            <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
                <div class="row">
                    <div class="col-md-6">
                        <b><h4>Data Kompetensi B</h4></b>

                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{url('export_kompetensi_b')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon">
                            <span>
                                <i class="la la-file-excel-o"></i>
                                <span>Export Excell</span>
                            </span>
                        </a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="m-alert m-alert--icon m-alert--air alert alert-dismissible fade show" role="alert" style="background-color: #95a57e36">
                            <div class="m-alert__icon">
                                <i class="la 
                                la-question
                                 "></i>
                            </div>
                            <div class="m-alert__text">
                                <strong>Pertanyaan : </strong></br>
                                Pada saat lulus, bagaimanan kontribusi Unisma dalam kompetensi di bawah ini? (B)

                            </div>
                           
                        </div>
                    </div>
                  
                </div>
               <b>Filter Tahun Lulus: </b>
                @foreach ($show_tahun as $item)
                    <label class="m-checkbox m-checkbox--solid m-checkbox--success">
                        <input class="filter-checkbox-b" type="checkbox"  value="{{$item->tahun_lulus}}"> {{$item->tahun_lulus}}
                        <span></span>
                    </label>
                @endforeach

                &nbsp
                <br>
                <table cellpadding="0" class="table-striped tabel_show_kompetensi_b table table-bordered nowrap" cellspacing="0" width="100%">
                    <thead style="background-image: url('https://www.transparenttextures.com/patterns/sos.png');background-color: #349d44;color: #e5f6dd;">
                        <tr>
                            <th style="5%">No.</th>
                            <th style="15%">NPM</th>
                            <th style="25%">Nama</th>
                            <th style="25%">Prodi</th>
                            <th style="15%">Tahun lulus</th>
                            <th style="15%">ETIKA</th>
                            <th style="15%">KEAHLIAN</th>
                            <th style="15%">PENGGUNAAN TI</th>
                            <th style="15%">BAHASA INGGRIS</th>
                            <th style="15%">KOMUNIKASI</th>
                            <th style="15%">KERJASAMA</th>
                            <th style="15%">PENGEMBANGAN DIRI</th>                            
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
        var kompetensi_a = $('.tabel_show_kompetensi_a').DataTable({
            responsive:true,
            paging: true,
            info: true,
            searching: true,
            "aaSorting": [],
            "ordering": true,

            ajax: {
                url: '{{url("datatable-kompetensi-A")}}',
                dataSrc: 'result',
            },
            scrollX:        true,

            autoWidth:         true,

        });
    
    $('.filter-checkbox-a').on('change', function(e){
        var searchTerms = []
        $.each($('.filter-checkbox-a'), function(i,elem){
          if($(elem).prop('checked')){
            searchTerms.push($(this).val())
          }
        })
        kompetensi_a.column(4).search(searchTerms.join('|'), true, false, true).draw();
      });
    
    

        var kompetensi_b = $('.tabel_show_kompetensi_b').DataTable({
            responsive:true,
            paging: true,
            info: true,
            searching: true,
            "aaSorting": [],
            "ordering": true,

            ajax: {
                url: '{{url("datatable-kompetensi-B")}}',
                dataSrc: 'result',
            },
            scrollX:        true,

            autoWidth:         true,

        });
    
    $('.filter-checkbox-b').on('change', function(e){
        var searchTerms = []
        $.each($('.filter-checkbox-b'), function(i,elem){
          if($(elem).prop('checked')){
            searchTerms.push($(this).val())
          }
        })
        kompetensi_b.column(4).search(searchTerms.join('|'), true, false, true).draw();
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
            url: "{{url('graph-kompetensi-AB')}}"+ '/' + tahun,
            type: 'GET',
            dataType: 'JSON',
            beforeSend: function() {
        		$('#load').fadeIn();
    		},
            success:function(response){
                console.log(response);
            Highcharts.chart('chart_cara_memperoleh_pekerjaan', {

                title: {
                    text: 'Kompetensi - Tahun lulus: '+'<b style="color:#1978a9">' +tahun+'</b><br><br>'
                },
                subtitle: {
                    text: 'Source: <a href="">http://cdc.unisma.ac.id/tracer_study/</a>'
                },
                yAxis: {
                    title: {
                        text: 'Kompetensi'
                    }
                },

                xAxis: {
                    categories: [
                                'Etika',
                                'Keahlian Berdasarkan Bidang Ilmu',
                                'Penggunaan Teknologi Informasi',
                                'Bahasa Inggris',
                                'Komunikasi',
                                'Kerja Sama Tim',
                                'Pengembangan Diri'                                
                                ],
                    labels: {
                      rotation: 90
                    }
                  },
                tooltip: {
                    valueSuffix: ' Data'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },




                credits: {
                    enabled: false
                },
                series: [{
                    name : 'Kompetensi A',
                    color: '#3d8a49',
                    data: [response.push_kategori_a[0],
                           response.push_kategori_a[1],
                           response.push_kategori_a[2],
                           response.push_kategori_a[3],
                           response.push_kategori_a[4],
                           response.push_kategori_a[5],
                           response.push_kategori_a[6]
                    ]
                },
                {
                    name : 'Kompetensi B',
                    color: '#f7a35c',
                    data: [response.push_kategori_b[0],
                           response.push_kategori_b[1],
                           response.push_kategori_b[2],
                           response.push_kategori_b[3],
                           response.push_kategori_b[4],
                           response.push_kategori_b[5],
                           response.push_kategori_b[6]

                    ]
                },


            ],

                });
            },
            complete: function(){
        		$('#load').fadeOut()
    		},
        });
        }
    
        

    });

</script>
@endsection

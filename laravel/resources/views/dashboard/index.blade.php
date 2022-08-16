@extends('template')
@section('konten')

<div class="m-grid__item m-grid__item--fluid m-wrapper" style="margin:10px">
<div class="row">
	<div class="col-md-9">
    	<div class="input-group" style="width:100%;margin-bottom:10px" id="tahun_lulus">
                        		<div class="input-group-prepend" >
                            		<button style="background: darkcyan;border-color: cadetblue;" class="btn btn-focus" type="button">Tahun lulus</button>
                        		</div>
                        		<select id="change_graph"  style="width:85%"  class="custom-select form-control" name="param" >
                                <option disabled selected>Filter Tahun lulus..</option>
                                @foreach ($show_tahun as $item)
                                    <option value="{{ substr($item->tahun_lulus, 0, 4) }}">{{ substr($item->tahun_lulus, 0, 4) }}</option>
                                @endforeach
                        		</select> 
                    			</div>
	</div>
	<div class="col-md-3">
    
<div style="background:darkcyan;" class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air" role="alert">
												
<strong><i class="m-menu__link-icon flaticon-calendar "></i>&nbsp &nbspTahun Lulus : </strong><b id="filtered_tahun_lulus"></b>
												</div>
	</div>
</div>


<div class="m-portlet ">
							<div class="m-portlet__body  m-portlet__body--no-padding">
								<div class="row m-row--no-padding m-row--col-separator-xl">

								
                                
                                        <div class="col-md-12 col-lg-6 col-xl-4">
										
                                            <!--begin::New Orders-->
                                            <div class="m-widget24">
                                                <div class="m-widget24__item">
                                                    <h4 class="m-widget24__title">
                                                        Mahasiswa Alumni
                                                    </h4><br>
                                                    <span class="m-widget24__desc">
                                                        Total Mahasiswa Alumni
                                                    </span>
                                                    <span class="m-widget24__stats m--font-success">
                                                    <b id="total_mhs">{{$total_mhs}}</b>
                                                    </span>
                                                    <div class="m--space-10"></div>
                                                    <div class="progress m-progress--sm">
                                                        <div class="progress-bar m--bg-success" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span class="m-widget24__change">
                                                        Preview
                                                    </span>

                                                </div>
                                            </div>

                                            <!--end::New Orders-->
                                        </div>
                                        <div class="col-md-12 col-lg-6 col-xl-4">

                                            <!--begin::New Users-->
                                            <div class="m-widget24">
                                                <div class="m-widget24__item">
                                                    <h4 class="m-widget24__title">
                                                       Sudah mengisi tracer
                                                    </h4><br>
                                                    <span class="m-widget24__desc">
                                                        Total sudah mengisi tracer
                                                    </span>
                                                    <span class="m-widget24__stats m--font-warning">
                                                    <b id="total_sdh_mengisi">{{$total_sdh_mengisi}}</b>
                                                    </span>
                                                    <div class="m--space-10"></div>
                                                    <div class="progress m-progress--sm">
                                                        @php
                                                            $persen_sudah_mengisi = ($total_sdh_mengisi !=0)? ($total_sdh_mengisi / $total_mhs * 100):0;

                                                        @endphp
                                                        <div class="progress-bar m--bg-warning" role="progressbar" style="width: {{$persen_sudah_mengisi.'%'}}" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span class="m-widget24__change">
                                                        Persentase sudah mengisi : <b id="presentase_sudah_mengisi"></b>
                                                    </span>

                                                </div>
                                            </div>

                                            <!--end::New Users-->
                                        </div>
                                        <div class="col-md-12 col-lg-6 col-xl-4">

                                            <!--begin::New Users-->
                                            <div class="m-widget24">
                                                <div class="m-widget24__item">
                                                    <h4 class="m-widget24__title">
                                                        Belum mengisi tracer
                                                    </h4><br>
                                                    <span class="m-widget24__desc">
                                                        Total belum mengisi tracer
                                                    </span>
                                                    <span class="m-widget24__stats m--font-danger">
                                                    <b id="belum_mengisi">{{$belum_mengisi}}</b>
                                                    </span>
                                                    @php
                                                        $result_belum_mengisi = 100 - $persen_sudah_mengisi;
                                                    @endphp
                                                    <div class="m--space-10"></div>
                                                    <div class="progress m-progress--sm">
                                                        <div class="progress-bar m--bg-danger" role="progressbar" style="width: {{$result_belum_mengisi.'%'}};" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span class="m-widget24__change">
                                                        Persentase belum mengisi: <b id="presentase_belum_mengisi"></b>
                                                    </span>

                                                </div>
                                            </div>

                                            <!--end::New Users-->
                                        </div>

								</div>
							</div>
</div>

<div class="row">

    <div class="col-md-12 col-lg-12 col-xl-5">
        <div class="card">
            <div class="m-widget1">
                <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center" style="margin-top: -16px;">
                        <div class="col">
                            <h3 class="m-widget1__title"><i class="m-menu__link-icon flaticon-stopwatch "></i> Records Tracer</h3>

                        </div>


                    </div>
                    <table>
                        <tr>
                            <td>Daily</td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp
                                <span class="m-widget1__number m--font-yellow"><b id="input_hari_ini">{{$input_hari_ini}}</b></span>
                            </td>
                            <td><small style="color:#7ea4b3"> Records</small></td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>Weekly</td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp
                                <span class="m-widget1__number m--font-yellow"><b id="input_mingguan">{{$input_mingguan}}</b></span></td>
                                <td><small style="color:#7ea4b3"> Records</small></td>
                            </td>
                        </tr>
                        <tr>
                            <td>Montly</td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp
                                <span class="m-widget1__number m--font-yellow"><b id="input_bulanan">{{$input_bulanan}}</b></span></td>
                                <td><small style="color:#7ea4b3"> Records</small></td>
                            </td>
                        </tr>
                        <hr>

                     </table>
                </div>

            </div>
        </div>
        <br>
        <div class="card">
            <div style="padding: 10px;width:380px" id="container_pie"></div>
        </div>
        <!--begin:: Widgets/Stats2-1 -->


        <!--end:: Widgets/Stats2-1 -->
    </div>


    <div class="col-md-12 col-lg-12 col-xl-7">
        <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Activity Tracer
                        </h3>
                    </div>
                </div>

            </div>
            <div class="m-portlet__body">
                <div id="graph_dashboard"></div>
            </div>
        </div>
    </div>
</div>


</div>
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
           
            chart(tahun);
        });

        var n = "{{ $tahun_terakhir[0]->tahun_lulus }}"
        $('#filtered_tahun_lulus').html(n);
        chart(n);
    
    	function chart(tahun){
    		$.ajax({
            	url: "{{url('filter_dashboard')}}" + '/' + tahun, 
            	type: 'GET',
            	dataType: 'JSON',
            	success:function(response){
                 console.log(response);
                	var sudah_mengisi = '';
                	var belum_mengisi = '';
                
                	if(response[0].total_sudah_mengisi !=0){
                    	sudah_mengisi = Math.round((response[0].total_sudah_mengisi / response[0].total_mhs * 100) * 100) / 100; ;
                    	belum_mengisi = 100 - sudah_mengisi;
                    }else{
                    	sudah_mengisi = 0;
                    	belum_mengisi = 0;
                    }
                	// ($total_sdh_mengisi !=0)? ($total_sdh_mengisi / $total_mhs * 100):0;
                	$('#filtered_tahun_lulus').html(tahun);
                	$('#total_mhs').html(response[0].total_mhs);
                	$('#total_sdh_mengisi').html(response[0].total_sudah_mengisi);
                	$('#belum_mengisi').html(response[0].belum_mengisi);
                	$('#input_hari_ini').html(response[0].input_harian);
                	$('#input_mingguan').html(response[0].input_mingguan);
                	$('#input_bulanan').html(response[0].input_bulanan);
                	$('#presentase_sudah_mengisi').html(sudah_mengisi + ' %');
                	$('#presentase_belum_mengisi').html(belum_mengisi + ' %');
                }
            });
       //graph dashboard
        
        $.ajax({
            url: "{{url('graph-dashboard')}}"  + '/' + tahun,
            type: 'GET',
            dataType: 'JSON',
            success:function(response){

            Highcharts.chart('graph_dashboard', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Pengisian Tracer Study'
                },
                subtitle: {
                    text: 'Source: <a href="http://cdc.unisma.ac.id/tracer_study/">http://cdc.unisma.ac.id/tracer_study/</a>'
                },
                xAxis: {

                    categories: ['Sudah Mengisi',
                                'Belum Mengisi',

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

                series: [
                         {
                            name: 'Sudah Mengisi',
                            data: [response.sudah_mengisi[0],''],
                            color: '#ffb822 '
                        }, {
                            name: 'Belum Mengisi',
                            data: ['',response.belum_mengisi[0]],
                            color: '#f4516c'
                        }
                                      ]

                });
            }
        });
        
        //graph daily month year
         $.ajax({
            url: "{{url('graph-record')}}" + '/' + tahun,
            type: 'GET',
            dataType: 'JSON',
            success:function(response){
             
                Highcharts.chart('container_pie', {
                    chart: {

                    type: 'pie'
                    },

                    styledMode: true,


                    colors : ['#5867dd', '#f4516c', '#ffb822'],
                    title: {
                    text: 'Chart Records'
                    },
                    credits: {
                        text: 'chart pie',
                    },
                    series: [{
                        allowPointSelect: true,
                    data: [{
                        name: 'daily:  (' + response.input_hari_ini[0] + ')',
                        y: response.input_hari_ini[0]
                    }, {
                        name: 'weekly: (' + response.input_mingguan[0] + ')',
                        y: response.input_mingguan[0]
                    },
                    {
                        name: 'monthly: (' + response.input_bulanan[0] + ')',
                        y: response.input_bulanan[0]
                    },
                    ],
                    showInLegend: true
                    }]
                });
            }
        });
        	
    	}
       

        

    });
</script>

@endsection

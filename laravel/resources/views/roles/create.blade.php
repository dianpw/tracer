@extends('template2')
@section('konten')
<head>
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
</head>
<div class="app-main__inner">
    <div class="row">

</div>
<div class="row">
 <div class="col-md-12 col-lg-12">
     <div class="mb-3 card">
         <div class="card-header-tab card-header-tab-animation card-header">
             <div class="card-header-title">
                 <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                    Master Quisioner
             </div>

         </div>
         <div class="card-body">
            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <h7>Nama role akses:</h7>
                            </div>
                            <div class="col-md-10">
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-md-12 col-md-12">
                    <div class="m-portlet m-portlet--tabs">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-tools">
                                <ul class="nav nav-tabs m-tabs-line m-tabs-line--success m-tabs-line--2x" role="tablist">
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_tabs_6_1" role="tab" aria-selected="true">
                                            <i class="flaticon-notes"></i> Penilaian
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_2" role="tab" aria-selected="false">
                                            <i class="la la-briefcase"></i> Data
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_3" role="tab" aria-selected="false">
                                            <i class="la la-bell-o"></i>Master
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_4" role="tab" aria-selected="false">
                                            <i class="la la-bell-o"></i>Data Account
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="m_tabs_6_1" role="tabpanel">
                                    @foreach($role_evaluasi as $value)
                                       <br> <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->name }}</label>
                                    @endforeach
                                </div>
                                <div class="tab-pane" id="m_tabs_6_2" role="tabpanel">
                                    @foreach($role_data as $value)
                                        <br><label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->name }}</label>
                                    @endforeach
                                </div>
                                <div class="tab-pane" id="m_tabs_6_3" role="tabpanel">
                                    @foreach($role_master as $value)
                                        <br><label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->name }}</label>
                                    @endforeach
                                </div>
                                <div class="tab-pane" id="m_tabs_6_4" role="tabpanel">
                                    @foreach($role_users as $value)
                                        <br><label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->name }}</label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </div>
            {!! Form::close() !!}
         </div>
     </div>
 </div>

</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src ="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>

    $(document).ready(function(){

    });

</script>
@endsection

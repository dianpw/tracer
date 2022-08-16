@extends('master3')
@section('konten')

<div class="m-portlet m-portlet--mobile" style="margin: -15px;margin-top:-35px">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    <i class="m-menu__link-icon flaticon-list"></i>&nbsp  Role edit
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">

                <li class="m-portlet__nav-item"></li>
                <li class="m-portlet__nav-item">

                </li>
            </ul>
        </div>
    </div>
    <div class="m-portlet__body">
        <div class="row">

            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if (count($errors) > 0)

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

            </ul>

        </div>

    @endif


    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <strong>Nama Role Akses:</strong>
                    </div>
                    <div class="col-md-10">
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
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
                                       <br>  <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}

                                        {{ $value->name }}</label>
                                    @endforeach
                                </div>
                                <div class="tab-pane" id="m_tabs_6_2" role="tabpanel">
                                    @foreach($role_data as $value)
                                        <br>  <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}

                                            {{ $value->name }}</label>
                                    @endforeach
                                </div>
                                <div class="tab-pane" id="m_tabs_6_3" role="tabpanel">
                                    @foreach($role_master as $value)
                                        <br>  <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}

                                            {{ $value->name }}</label>
                                    @endforeach
                                </div>
                                <div class="tab-pane" id="m_tabs_6_4" role="tabpanel">
                                    @foreach($role_users as $value)
                                        <br>  <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}

                                            {{ $value->name }}</label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-left">

            <button type="submit" class="btn btn-primary">Simpan</button>

        </div>

    </div>

    {!! Form::close() !!}

    </div>
</div>


@endsection

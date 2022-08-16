@extends('master3')
@section('konten')

<div class="m-portlet m-portlet--mobile"  style="margin: -15px;margin-top:-35px">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    <i class="m-menu__link-icon flaticon-list"></i>&nbsp  User Management
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <div class="pull-right">

                    @can('role-create')

                    <div class="pull-right">

                        <a class="btn btn-danger" href="{{ url('users') }}"> Back</a>

                    </div>

                        @endcan

                    </div>
                <li class="m-portlet__nav-item"></li>
                <li class="m-portlet__nav-item">
                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                        <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                            <i class="la la-ellipsis-h m--font-brand"></i>
                        </a>

                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="m-portlet__body">

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

{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>Name:</strong>
          {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
      </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>Email:</strong>
          {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
      </div>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>Password:</strong>
          {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}

      </div>

  </div>

  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>Confirm Password:</strong>
          {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
      </div>

  </div>

  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>Role:</strong>
          {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
      </div>

  </div>

  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>

</div>

{!! Form::close() !!}

    </div>
</div>

@endsection

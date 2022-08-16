@extends('template')
@section('konten')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
<script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>
    <style>
/* Check out later: https://bbbootstrap.com/snippets/accordion-hover-effect-26103860 */

.mt-100 {
    margin-top: 50px;
}

body {

}
h2 {
  color: darkgreen;
}

#css-dropdown
{
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    width: 300px;
    height: 42px;
    margin: 100px auto 0 auto;
}


    </style>
</head>

<div class="m-content" style="padding: 15px;">
    <div class="row">
        <div class="col-lg-12">

            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="flaticon-statistics"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Filter Tahun Lulus
                            </h3>
                            <h2 class="m-portlet__head-label m-portlet__head-label--warning" style="width: 170px;">
                                <span>Filter Pencarian</span>
                            </h2>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="" class="m-portlet__nav-link m-portlet__nav-link--icon"><i class="la la-cloud-upload"></i></a>
                            </li>
                            {{--  <li class="m-portlet__nav-item">
                                <a href="" class="m-portlet__nav-link m-portlet__nav-link--icon"><i class="la la-cog"></i></a>
                            </li>
                            <li class="m-portlet__nav-item">
                                <a href="" class="m-portlet__nav-link m-portlet__nav-link--icon"><i class="la la-share-alt-square"></i></a>
                            </li>  --}}
                        </ul>
                    </div>
                </div>



                <div class="m-portlet__body">
                    @if(session()->has('message'))
                    <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-success alert-dismissible fade show" role="alert">
                        <div class="m-alert__icon">
                            <i class="flaticon-exclamation-1"></i>
                            <span></span>
                        </div>
                        <div class="m-alert__text">
                            <strong>  {{ session()->get('message') }}
                        </div>
                        <div class="m-alert__close">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>

                    @endif
                    <form action="{{url('update_tahun')}}" method="POST">
                        @csrf
                        @php
                            $ex = implode(',', $arr);
                            $a = explode(",", (int)$ex);
                            $selected = '';
                            $oke = $check->tahun;
                            $explode = explode(',', $oke);
                        @endphp

                        <div class="row d-flex justify-content-center">
                            <div class="col-md-12">
                                <select name="tahun[]" id="choices-multiple-remove-button" class="txtinput_prodi" placeholder="Filter pencarian" multiple>
                                    @foreach ($db_tahun_mahasiswa as $item)

                                    <option
                                    @if (in_array($item->tahun_lulus, $explode))
                                        @php
                                            echo 'selected';
                                        @endphp
                                    @else
                                        @php
                                            echo '';
                                        @endphp
                                    @endif
                                     value="{{$item->tahun_lulus}}">{{$item->tahun_lulus}}</option>
                                @endforeach
                                </select>
                          </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success btn-block"><i class="m-menu__link-icon flaticon-search"></i>&nbsp&nbspSimpan Filter Pencarian</button>
                    </form>

                </div>
            </div>

            <!--end::Portlet-->
        </div>

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script>
    $(document).ready(function(){

          var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount:10,
            searchResultLimit:10,
            renderChoiceLimit:10
            });
    })
</script>

@endsection

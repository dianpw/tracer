@extends('template')
@section('konten')

<div class="m-grid__item m-grid__item--fluid m-wrapper" style="margin: 10px">
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    <div class="row">
                        <div class="col-md-12"><h5><i class="m-menu__link-icon flaticon-book"></i> Data Alumni yang sudah bekerja</h5></div>

                    </div>
                </h3>
            </div>
        </div>

        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">

            </ul>
        </div>
    </div>


    <div class="m-portlet__body">
        <div class="row">
            <div class="col-md-9">
                <div class="m-alert m-alert--icon m-alert--air alert alert-dismissible fade show" role="alert" style="background-color: #95a57e36">
                    <div class="m-alert__icon">
                        <i class="la 
                        la-question
                         "></i>
                    </div>
                    <div class="m-alert__text">
                        <strong>Pertanyaan : </strong><br>
                        - Jelaskan status Anda saat ini? <br>
                        - [S2][S3] Bagaimana Anda menggambarkan situasi Anda saat ini? <br>
                        - Apa jenis perusahaan/instansi/institusi tempat Anda bekerja sekarang?  <br>
                        - Apa nama perusahaan/kantor tempat Anda bekerja?<br>
                        - Dimana lokasi tempat Anda bekerja?<br>
                        - Siapa nama atasan langsung anda?<br>
                        - Mohon menuliskan kontak HP atasan langsung Anda? 
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-right">
                <a href="{{url('export_data_alumni_sudah_bekerja')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon">
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
        <table cellpadding="5" class="table-striped tabel_show table table-bordered nowrap" cellspacing="0" width="100%">

            <thead class="m-datatable__head" style="background-image: url('https://www.transparenttextures.com/patterns/sos.png');background-color: #349d44;color: #e5f6dd;">
                <tr>
                    <th>No.</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Tahun lulus</th>
                    <th>Status</th>
                    <th>Nama perusahaan</th>
                    <th>Jenis perusahaan</th>
                    <th>Nama atasan</th>
                    <th>No Hp atasan</th>
                    <th>Alamat perusahaan</th>
                    <th>Created</th>

                </tr>
            </thead>

        </table>
    </div>

</div>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src ="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>

    $(document).ready(function(){
        var table_evaluasi_pegawai = $('.tabel_show').DataTable({
            responsive:true,
            paging: true,
            info: true,
            searching: true,
            "aaSorting": [],
            "ordering": true,
            scrollX:        true,
            scrollCollapse: true,
            autoWidth:         true,
            ajax: {
                url: '{{url("datatable_data_alumni_sudah_bekerja")}}',
                dataSrc: 'result',
            },

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


        $('#form_edit').submit(function (event) {
            $('#modal-edit').modal('hide');
            event.preventDefault();
            var url = '{{ url('update_users') }}';
            ajaxProcess(url, $(this).serialize())
        });

        function ajaxProcess(url, data) {
            $.ajax({
                type: 'post',
                url: url,
                data: data,
                dataType : 'json',
                beforeSend: function () {
                    $('.cssload-container').show();
                },
                success: function (response) {
                    console.log(response);
                    if (response) {
                        $('.cssload-container').hide();

                        $('.tabel_show').DataTable().ajax.reload();


                        Swal.fire({
                            title: 'Information',
                            html: '<strong>' + response.result + '</strong>',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function (error) {
                    if (error) {
                        console.log(error);
                        var result = error.responseJSON;
                        if (result != null) {
                            var message = result.message;
                            if (Array.isArray(message)) {
                                $.map(message, function (value, index) {
                                    message = value + '</br>';
                                });
                            }
                        } else {
                            message = 'look like something when wrong';
                        }
                    } else {
                        message = 'look like something when wrong';
                    }

                    $('#form_edit')[0].reset();
                    $('.cssload-container').hide();
                    Swal.fire({
                        title: 'Warning',
                        html: '<strong>' + message + '</strong>',
                        type: 'warning',
                        showConfirmButton: false,
                        timer: 3000
                    })

                }

            })
        };
    });

</script>
@endsection

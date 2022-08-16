@extends('template')
@section('konten')
<head>
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
</head>
<div class="app-main__inner" style="padding:15px">
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

            <button class="mb-2 mr-2 btn btn-success">Create Input Data
            </button>
            <br><br>
             <div class="tab-content">
                 <div class="tab-pane fade show active" id="tabs-eg-77">
                    <table style="width: 100%" class="ui celled table table-hover dataTable no-footer tabel_show" >
                        <thead style="background-color: ;color:black">
                            <tr>
                                <th>No.</th>
                                <th>Konten</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>

                    </table>

                 </div>
             </div>
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
            ajax: {
                url: '{{url("datatable-quisioner")}}',
                dataSrc: 'result',
            },

        });



    });

</script>
@endsection

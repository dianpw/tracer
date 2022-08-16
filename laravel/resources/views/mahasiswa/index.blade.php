<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alumni Unisma</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
 <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
 <link href="../vendors/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />
</head>
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>

			WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
<style>
input[type="date"]::before {
  content: attr(data-placeholder);
  width: 100%;
}
body  {
    background-image: url("public/images/opacity.png");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    font-family: Poppins;

  /*  opacity: 0.5;*/
  }
/* hide our custom/fake placeholder text when in focus to show the default
 * 'mm/dd/yyyy' value and when valid to show the users' date of birth value.
 */
input[type="date"]:focus::before,
input[type="date"]:valid::before { display: none }
.#loader {
    display: none;
}
  #loader.background {
  /*position: absolute;*/
  top: 60px;
  bottom: 62px;
  left: 0;
  right: 0;
 /* background: rgba(245,245,245,.9);*/
  z-index: 99999;
}
#loader .dots{
  height: 40px;
/*  position: absolute;*/
  top: 65%;
  left: 50%;
  margin: -10px 0 0 -10px;

}

#loader .dots span{
  -webkit-transition: all 6000ms ease;
  transition: all 6000ms ease;
  background: rgba(79, 204, 141, 0.5);
  height: 15px;
  width: 15px;
  margin: 0 0px 0 0;
  display: inline-block;
  border-radius: 50%;
  animation: wave 1.3s ease  infinite;
  -webkit-animation: wave 1.3s ease infinite;
}

#loader .dots span:nth-child(1){
    animation-delay: 0;
    -webkit-animation-delay: 0;
}
#loader .dots span:nth-child(2){
    animation-delay: 100ms;
    -webkit-animation-delay: 100ms;
}
#loader .dots span:nth-child(3){
    animation-delay: 200ms;
    -webkit-animation-delay: 200ms;
}

@-webkit-keyframes wave{
  0%, 40%, 100% {
    -webkit-transform: translate(0, 0);
    transform: translate(0, 0);
    background-color: rgba(162, 216, 35, 0.5);
  }
  10% {
    -webkit-transform: translate(0, -15px);
    transform: translate(0, -15px);
    background-color: rgb(141, 224, 85);
  }
}

@keyframes wave{
  0%, 40%, 100% {
    -webkit-transform: translate(0, 0);
    transform: translate(0, 0);
    background-color: rgba(152, 197, 48, 0.5);
  }
  10% {
    -webkit-transform: translate(0, -15px);
    transform: translate(0, -15px);
    background-color: rgb(130, 161, 101);
  }
}
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
/* base */
body,html{
    background-color: #fff;
    color: #1E1E2C;
    font-weight: 400;
    line-height: 1.2;
    font-family:'Inter', Arial, Helvetica, sans-serif;
}
h1{
    color: #1E1E2C;
    padding-top: 40px;
}
.margin-top-24{
    margin-top: 24px;
}
.margin-top-16{
    margin-top: 16px;
}
.margin-top-12{
    margin-top: 0.5px;
}
.margin-top-8{
    margin-top: 8px;
}

.padding-lr-33{
    padding-left:33px;
    padding-right:33px;
}
.padding-lr-27{
    padding-left:27px;
    padding-right:27px;
}
.padding-lr-21{
    padding-left:21px;
    padding-right:21px;
}
.padding-lr-15{
    padding-left:15px;
    padding-right:15px;
}
.padding-lr-9{
    padding-left:9px;
    padding-right:9px;
}
.padding-all-25{
    padding: 25px;
}

.margin-lr-auto{
    margin: 0 auto;
}

::placeholder {
    color: rgb(85, 80, 80);
    padding-left: 12px;

}
.border-1{
    border: 1px solid rgba(30,30,44,.10)
}
.base{
    background:#fff;
    border-radius: 10px;
    box-shadow: 0 0.125rem 0.1875rem 0 rgba(0,0,0,.11);
    width: 100%;
    /* height: 100%; */

}
[type="date"] {
  background:#fff url(https://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/calendar_2.png)  97% 50% no-repeat ;
}
[type="date"]::-webkit-inner-spin-button {
  display: none;
}
[type="date"]::-webkit-calendar-picker-indicator {
  opacity: 0;
}
input[type="text"],input[type="date"]{
    width: 100%;
    height: 48px;
    background-color: #F3F4F5;
    border-radius: 4px;
    color:inherit;
    font-family: 'Inter', Arial, Helvetica, sans-serif;
    font-size: 22px;
    font-weight: 500;
    margin-bottom: 16px;

}
label{
    display: block;
    font-size: 16px;
    font-weight: normal;
    line-height: 1.5;
    margin-bottom: 0;
    letter-spacing: .3px;
}
.inputGroup label{
    color: #777777;
    margin-bottom: 8px;
}
.selection {
  display: inline-block;
  position: relative;
  padding-left: 33px;
  margin-bottom: 15px;
  cursor: pointer;
  font-size: 19px;
  font-weight: 500;
  color:#1E1E2C!important;
}
.selection input {
  position: absolute;
  z-index: -1;
  opacity: 0;
}
.selection__bulat {
  position: absolute;
  top: 2px;
  left: 0;
  height: 24px;
  width: 24px;
  background: #e8e8e8;
  border: 1.4px solid rgba(30,30,44,.10)
}
.selection--radio .selection__bulat {
  border-radius: 50%;
}
.selection:hover input ~ .selection__bulat,
.selection input:focus ~ .selection__bulat {
  background: #cfcfcf;
}
.selection input:checked ~ .selection__bulat {
  background: #004286;
  color: #fff;
}
.selection:hover input:not([disabled]):checked ~ .selection__bulat,
.selection input:checked:focus ~ .selection__bulat {
  background:  #002952;
}
.selection input:disabled ~ .selection__bulat {
  background: #F3F4F5;
  opacity: 0.6;
  pointer-events: none;
}
.selection__bulat:after {
  content: '';
  position: absolute;
  display: none;
}
.selection input:checked ~ .selection__bulat:after {
  display: block;
}
.selection--radio .selection__bulat:after {
  left: 7px;
  top: 7px;
  height: 8px;
  width: 8px;
  border-radius: 50%;
  background: #fff;
}
.selection--radio input:disabled ~ .selection__bulat:after {
  background: #7b7b7b;
}

.selection--goldar{
    padding-right: 6px;
    padding-left: 0px;
}
.selection--goldar .selection__bulat {
    background-color: #ffffff;
    border-radius: 4px;
    line-height: 1.8;
    position: relative;
    text-align: center;
    width: 48px;
    height: 36px;
}

/* base hum */
.wrapper{
    width: 990px;
}
.head{

    height: 250px;
    background-image: url('https://www.transparenttextures.com/patterns/sos.png');
    background-color: #5db56a;
    color: #e5f6dd;"




}
.act{
    margin-top:-75px;
}
.btn{
    position: relative;
    padding: 0 30px;
    margin-left: -15px;
    height: 48px;
    width: 150px;
    /* min-width: 190px; */
    font-size: 16px;
    font-weight: 700;
    line-height: 2.3;
    vertical-align: middle;
    text-align: center;
    text-decoration: none;
    color: #fff;
    cursor: pointer;
    background-color: green;
    border-radius: 25px;
    transition: background-color .2s cubic-bezier(.8,0,.2,1);
}
.btn.secondary{
    background-color: #DDDDDD;
    color: #1E1E2C;
    height: 40px;
    padding:0px 18px;
}
/* L I S T */
.list{
    border: 1.4px solid rgba(30,30,44,.10);
    box-shadow: none;
}
.list .list-kode{
    color: #004286;
    font-size: 19px;
    font-weight: 600;
    padding-top: 25px;
}
.list .list-pendonor{
    font-size: 17px;
    font-weight: 500;
    text-transform: uppercase;
}
.list .list-goldar{
    color: #EB535C;
}
.list .list-pekerjaan{
    color: #EB535C;
    text-transform: capitalize;
}
.list .list-alamat{
    color: #777777;
    font-size: 17px;
    font-weight: 300;
}
/*  */

/* S O R T */
.sort .sort-act{
    cursor: pointer;
    font-size: 16px;
    font-weight: 500;
}
.sort a.sort-act:hover{
    color: #777777;
}
.sort a.sort-act:active{
    color: #CED9E8;
}
/*  */

/* S P I N N E R */
.spinner{
    position: relative;
    display: inline-block;
    width: 70px;
    height: 70px;
    border-radius: 50p
}
.spinner::before{
    position: absolute;
    content: "";
    width: 70px;
    height: 70px;
    border-radius: 70px;
    box-shadow: inset -5px 0 0 5px #EB535C;
    clip: rect(0, 70px, 35px, 0);
    animation: spin 1s infinite ease;

}
.img-logo{
    width: 500px;top:15px;margin-left:150px
}
/*  */
@media only screen and (max-width: 400px) {

  }
  @media screen and (min-width: 576px) and (max-width: 991px)  {
    .head{
        width:100%;
        height:210px;

    }
    .img-logo{
        width:70%;
        margin-left: -6px;
        margin-top:-20px;
    }
    label{
        font-size:14px;
        width: 530px;
    }
    .wrapper{
        width:100%;
    }
    .act{
        margin-top:-73px;
    }
    .padding-all-25{
        padding:12px;
    }
    input[type="text"], input[type="date"]{
        font-size:16px;
        height:40px;
        margin-bottom:12px;
        width: 530px;
    }
    .selection{
        font-size:16px;
    }
    .selection__bulat{
        height:20px;
        width:20px;
    }
    .selection--radio .selection__bulat:after{
        left: 6px;
        top: 6px;
        height: 6px;
        width: 6px;
    }
    .selection--goldar .selection__bulat{
        line-height: 2;
    }

    .btn{
        width:100%;
        margin-top: 24px;
        margin-left: 100px;
    }
    #btn-search{
        margin-top: 15px;
        margin-left: 100px;
    }
    .btn.secondary{
        margin-top:12px;
    }
    /* L I S T */
    .list .list-kode{
        font-size: 14px;


    }
    .list .list-pendonor{
        font-size: 17px;
    }
    .list .list-alamat{
        color: #777777;
        font-size: 14px;
        font-weight: 300;
    }
}
@media screen and (max-width: 576px) {
    .head{
        width:100%;
        height:150px;

    }
    .img-logo{
        width:70%;
        margin-left: -6px;
        margin-top:-20px;
    }
    #btn-search{
        margin-left: 0px;
        margin-top: 15px;
    }

    h1{
        display:none;
    }
    label{
        font-size:14px;
    }
    .wrapper{
        width:100%;
    }
    .act{
        margin-top:-34px;
    }
    .padding-all-25{
        padding:12px;
    }
    input[type="text"], input[type="date"]{
        font-size:16px;
        height:40px;
        margin-bottom:12px;
    }
    .selection{
        font-size:16px;
    }
    .selection__bulat{
        height:20px;
        width:20px;
    }
    .selection--radio .selection__bulat:after{
        left: 6px;
        top: 6px;
        height: 6px;
        width: 6px;
    }
    .selection--goldar .selection__bulat{
        line-height: 2;
    }

    .btn{
        width:100%;
    }
    .btn.secondary{
        margin-top:12px;
    }
    /* L I S T */
    .list .list-kode{
        font-size: 17px;
        margin-left: 0px;
        margin-top: -25px;
        margin-bottom:20px

    }
    .list .list-pendonor{
        font-size: 17px;
    }
    .list .list-alamat{
        color: #777777;
        font-size: 14px;
        font-weight: 300;
    }
    /*  */
}
.tanggallahir{
    color:#bf728a;
    font-size: 17px;
    font-weight: 350;
}
.jenis_kelamin{
    color:#bf728a;
    font-size: 15px;
    font-weight: 350;
}
@media screen and (min-width: 768px) and (max-width: 991px)  {
    .wrapper{
        margin:0 25%;

    }
}
@media screen and (min-width: 992px) and (max-width: 1025px) {
    .wrapper{
        margin:0 6%;
        width:1256px;
    }
}
/*
@media screen and(max-width: 992px) {

}

@media screen and(max-width: 1200px) {

} */
.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #67b973;
    color: black;
    text-align: left;

  }
  #notfound{
      display:none;
  }


</style>
<body>
    <div class="head" >
        <div class="row" style="margin:0px">
            <div class="col-md-8">
                <br><br>
                <img class="img-logo" src="public/LogoTraceStudy.png">
            </div>
            {{--  <div class="col-md-8" style="margin-left:-20px">
                <h2 style="color: rgb(157, 186, 168);margin-top:60px;margin-bottom:0px">T<small style="color:rgb(194, 221, 208)">Tracer</small> <small>Study</small> </h2>
                <h3 style="color: #d9ebe1"><small>Universitas Islam Malang</small></h3>
            </div>  --}}
        </div> 


    </div>
    <div class="wrapper padding-lr-9 margin-lr-auto">

    <form>
        @csrf
        <div class="act base padding-all-25 margin-lr-auto">
            <div class="row">
            @if($video  != null)
                <div class="col-12">
                <?php 
                //$vd = "OuUL_20Kvwk";
                $lk = "https://www.youtube.com/embed/". $video[0]->link. "?autoplay=1";
                echo "<center><iframe width='100%' height='350' src='$lk' allow='autoplay' frameborder='0' allowfullscreen></iframe></center>";
                ?>
                </div>
             @endif
                <div class="col-lg-10 col-sm-8 col-12 inputGroup mt-4">
                    <label for="keynama" style="font-family: Poppins;font-weight: 300;"> * Cari data anda berdasarkan Nama/NPM terlebih dahulu !</label>
                    <hr>
                    <input name="cari" required style="font-size:15px;font-family: Poppins;font-weight: 420;border-radius: 25px;padding:14px" type="text" class="border-1 padding-lr-9" placeholder="Ex. Ronny Setiawan">
                </div>
                <br>
                <div class="col-lg-2 col-sm-8 col-12 inputGroup mt-4">
                    <button id="btn-search" style="margin-top: 55px;
                    background-color: #5db56a;
                    color: #e5f6dd;font-family: Poppins;font-weight: 500;" class="btn">Search</button>
                </div>

            </div>
            <div class="row">

                <div class="col-lg-3 col-sm-3 col-12 text-right">

                </div>
            </div>
        </div>
    </form>
        <!-- <div class="sort padding-all-25">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-12">
                    <a class="sort-act">Kode pendonor</a>
                </div>
                <div class="col-lg-3 col-sm-3 col-12">
                    <a class="sort-act">Nama pendonor</a>
                </div>
            </div>
        </div> -->
        <br><br>
        <center>
            <div id="loader" class="background">
                <div class="dots container">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </center><br>
        <div class="tot_record" align="right"><b></b></div>
        <div style="font-family: Poppins;" id="results" class="content">

        </div>

        <div id="notfound" style="color:grey">
          <div align="center"><b style="font-family: Poppins;font-weight: 600;">NPM/Nama Alumni Tidak ditemukan...</b></div>
        </div>



        <br>


    </div>

<br><br><br><br>
    <div class="footer"> 
        <p style="padding-top: 10px;padding-left:25px; font-size:13px;color: whitesmoke;font-family: Poppins;font-weight: 500;">2020 © Tracer Study - Universitas Islam Malang</p>
      </div>
</body>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){

      var $loading = $('#loader').hide();
                   //Attach the event handler to any element
            $(document)
                .ajaxStart(function () {

                    $loading.show();
                    $('#notfound').hide();
                    $('.tot_record').hide();

                })
            .ajaxStop(function () {

                $loading.hide();
            });
    function loading(){
        $(document)
            .ajaxStart(function () {

                $loading.show();
                $('#notfound').hide();
                $('.tot_record').hide();

            })
        .ajaxStop(function () {

            $loading.hide();
        });
    }
      $("#view").hide();
      $('#notfound').hide();
      loading();
      $("#btn-search").click(function(e){

          e.preventDefault();
          var data = $('form').serialize();

          $.ajax({
                 url:  "{{url('search_mahasiswa')}}",
                 type: "POST",
                 data: data,
                 dataType: "json",
                 success: function(response){

                    var cek = response;
                    var data_mahasiswa =  '';

                    var record = response.length;
                    //console.log(record);
                    if(cek != 0){
                        $('#results').show();
                        for (const [key, value] of Object.entries(cek)) {
                            var url = "{{url('quisioner')}}" + '/' + value.npm;
                            var link_quisioner =  'onclick=location.href="'+url+'"';
                            var txt = value.tahun_lulus;                            
                            var prodi = value.jenjang+' - '+value.prodi;

                            data_mahasiswa +='<div class="base list margin-top-12 padding-all-25"><div class="row"> <div class="col-lg-3 col-sm-3 col-12"> <div class="list-kode"><center>'+value.npm+'</center></div> </div>  <div class="col-lg-6 col-sm-6 col-12">  <div class="list-pendonor">'+value.nama+'<span class="list-goldar"><b> ('+txt.substring(0, 4)+')</b></span></div><div class="list-pekerjaan margin-top-8">'+prodi+'</div><div class="list-alamat margin-top-16">'+value.status_baru+'</div> </div>'+ '<div align="right">'+
                                '<button  id="btn-search" style="margin-top: 20px;margin-left:35px;padding:5px;border-radius:25px;background-color: #5db56a;color: whitesmoke;font-weight:420" class="btn" '+link_quisioner+' target="_blank" >Link Quisioner</button>'+'</div>'+'</div>'+
                            '</div>';
                        }
                        $('#results').html(data_mahasiswa);
                        $('.tot_record').show();
                        $('.tot_record').html('<b style="color:grey">Total '+ record +' Found</b> '  );
                        console.log(data_mahasiswa);
                    }else{
                        //console.log('empty');
                        $('#notfound').show();
                        $('.tot_record').hide();
                        $('#results').hide();
                    }
                 }
        });
    });
});
</script>

</html>

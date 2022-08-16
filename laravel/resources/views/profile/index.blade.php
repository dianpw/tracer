@extends('template')
@section('konten')
<div class="row">

        <div class="col-xl-12 col-lg-12">

                <div class="card" style="margin:10px">
                <div class="tab-content">
                    <div class="tab-pane active" id="m_user_profile_tab_1">
                        <form id="form_user" class="m-form m-form--fit m-form--label-align-right">
                            {{ csrf_field() }}
                            <div class="m-portlet__body" style="margin:20px">

                                <div class="form-group m-form__group row">
                                    <div class="col-10 ml-auto">
                                        <h3 class="m-form__section">1. Personal Details</h3>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Full Name</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="text" value="{{$data[0]['nama']}}">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Email</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="text" value="{{$data[0]['email']}}">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Prodi</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="text" value="{{$data[0]['prodi']}}">
                                    </div>
                                </div>

                                <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                <div class="form-group m-form__group row">
                                    <div class="col-10 ml-auto">
                                        <h3 class="m-form__section">2. Password</h3>
                                    </div>
                                </div>


                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Current Password</label>
                                    <div class="col-7">
                                        <input type="hidden" name="id" value="{{auth()->user()->id}}">
                                        <input type="password" name="current_pass" class="form-control" id="inputName" placeholder="Current password" autofocus>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">New Password</label>
                                    <div class="col-7">
                                        <input type="password" name="new_pass" class="form-control"placeholder="New password">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Confirm Password</label>
                                    <div class="col-7">
                                        <input type="password" name="confirm_pass" class="form-control" placeholder="Confirm password">
                                    </div>
                                </div>

                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <div class="row">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-7">
                                            <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Save changes</button>&nbsp;&nbsp;
                                            <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>

                </div>
            </div>

    </div>

</div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script>
    $(document).ready(function(){
        $('#form_user').submit(function (event) {
            event.preventDefault();
            var url = '{{ url('editPassword') }}';
            ajaxProcess(url, new FormData(this))
        });


        function ajaxProcess(url, data) {
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                cache: false,
                processData:false,
                contentType: false,
                beforeSend: function () {
                    $('.cssload-container').show();
                },
                success: function (response) {
                    if (response.status == 'success') {
                        $('.cssload-container').hide();
                        $('#form_user')[0].reset();
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


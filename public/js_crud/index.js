//update data
function ajaxProcessUpdate(url, data) {
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        beforeSend: function () {
            $('.cssload-container').show();
        },
        success: function (response) {
            if (response.status == 'success') {
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

function delete_master(url, data) {
    swal.fire({
        title: "Informasi !",
        text: "Apakah anda ingin menghapus data ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus data!'
    }).then((result) => {
        if(result.value)
        {
            $.ajax({
            type: "POST",
            url: url,
            /* send the csrf-token and the input to the controller */
            data: data,
            dataType: "json",
            /* remind that 'data' is the response of the AjaxController */
            beforeSend: function () {
                $('.cssload-container').show();
            },
            success: function (data) {
                $('.cssload-container').hide();
                $('.tabel_show').DataTable().ajax.reload();
                $('.tabel_sub_kategori_show').DataTable().ajax.reload();
                $('.tabel_komponen_kompetensi').DataTable().ajax.reload();

                swal.fire({
                    title: "Sucess!",
                    text: data.result,
                    type: data.status,
                    button: false,
                    timer: 1000,
                })
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

        });
        }
    });
}

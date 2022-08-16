//== Class definition

var BlockUIDemo = function () {
    
    //== Private functions

    //== Basic demo
    var demo1 = function () {
        // default
        $('#m_blockui_1_1').click(function() {
            mApp.block('#m_blockui_1_content', {});

            setTimeout(function() {
                mApp.unblock('#m_blockui_1_content');
            }, 2000);
        });

        $('#m_blockui_1_2').click(function() {
            mApp.block('#m_blockui_1_content', {
                overlayColor: '#000000',
                state: 'primary'
            });  

            setTimeout(function() {
                mApp.unblock('#m_blockui_1_content');
            }, 2000);
        });

        $('#m_blockui_1_3').click(function() {
            mApp.block('#m_blockui_1_content', {
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                size: 'lg'
            });

            setTimeout(function() {
                mApp.unblock('#m_blockui_1_content');
            }, 2000);
        });

        $('#m_blockui_1_4').click(function() {
            mApp.block('#m_blockui_1_content', {
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: 'Please wait...'
            });

            setTimeout(function() {
                mApp.unblock('#m_blockui_1_content');
            }, 2000);
        });

        $('#m_blockui_1_5').click(function() {
            mApp.block('#m_blockui_1_content', {
                overlayColor: '#000000',
                type: 'loader',
                state: 'primary',
                message: 'Processing...'
            });

            setTimeout(function() {
                mApp.unblock('#m_blockui_1_content');
            }, 2000);
        });
    }

    // portlet blocking
    var demo2 = function () {
        // default
        $('#m_blockui_2_1').click(function() {
            mApp.block('#m_blockui_2_portlet', {});

            setTimeout(function() {
                mApp.unblock('#m_blockui_2_portlet');
            }, 2000);
        });

        $('#m_blockui_2_2').click(function() {
            mApp.block('#m_blockui_2_portlet', {
                overlayColor: '#000000',
                state: 'primary'
            });

            setTimeout(function() {
                mApp.unblock('#m_blockui_2_portlet');
            }, 2000);
        });

        $('#m_blockui_2_3').click(function() {
            mApp.block('#m_blockui_2_portlet', {
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                size: 'lg'
            });

            setTimeout(function() {
                mApp.unblock('#m_blockui_2_portlet');
            }, 2000);
        });

        $('#m_blockui_2_4').click(function() {
            mApp.block('#m_blockui_2_portlet', {
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: 'Please wait...'
            });

            setTimeout(function() {
                mApp.unblock('#m_blockui_2_portlet');
            }, 2000);
        });

        $('#m_blockui_2_5').click(function() {
            mApp.block('#m_blockui_2_portlet', {
                overlayColor: '#000000',
                type: 'loader',
                state: 'primary',
                message: 'Processing...'
            });

            setTimeout(function() {
                mApp.unblock('#m_blockui_2_portlet');
            }, 2000);
        });
    }

    // page blocking
    var demo3 = function () {
        // default
        $('#m_blockui_3_1').click(function() {
            mApp.blockPage();

            setTimeout(function() {
                mApp.unblockPage();
            }, 2000);
        });

        $('#m_blockui_3_2').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                state: 'primary'
            });

            setTimeout(function() {
                mApp.unblockPage();
            }, 2000);
        });
var submitprocessingmsg = "<img width='28px' src='public/images/logounisma.png' />&nbsp&nbsp&nbsp<strong style='color:#3d8a49'>Tracer Study...</strong>";
        $('#m_blockui_3_3').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                size: 'lg'
            });

            setTimeout(function() {
                mApp.unblockPage();
            }, 2000);
        });

        $('#m_blockui_dashboard').click(function() {
            mApp.blockPage({
                overlayColor: '#000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 5000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 5000);
        });
		$('#m_blockui_evaluasi_dosen').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_evaluasi_karyawan').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_evaluasi_karyawan_lapangan').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                 message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_data_pegawai').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_data_kegiatan').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_master_kategori_dosen').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_master_kategori_karyawan').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_master_kategori_security_driver').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		
		$('#m_blockui_master_input_bulan').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_master_users').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_arsip').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_data_user').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_role_user').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_profil').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                 message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_print').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_test1').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_test2').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_test3').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_test4').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_test5').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_test6').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_test7').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_test8').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_test9').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_test10').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: submitprocessingmsg
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_nilai_dosen').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: 'Please wait...'
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_nilai_karyawan').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: 'Please wait...'
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_nilai_karyawan_lapangan').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: 'Please wait...'
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });
		$('#m_blockui_fullcalendar_edit').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: 'Please wait...'
            });
			setTimeout(function() {
                mApp.blockPage();
            }, 3000);
            setTimeout(function() {
                mApp.unblockPage();
            }, 3000);
        });

        $('#m_blockui_3_5').click(function() {
            mApp.blockPage({
                overlayColor: '#000000',
                type: 'loader',
                state: 'primary',
                message: 'Processing...'
            });

            setTimeout(function() {
                mApp.unblockPage();
            }, 2000);
        });
    }

    // modal blocking
    var demo4 = function () {
        // default
        $('#m_blockui_4_1').click(function() {
            mApp.block('#m_blockui_4_1_modal .modal-content', {});

            setTimeout(function() {
                mApp.unblock('#m_blockui_4_1_modal .modal-content');
            }, 2000);
        });

        $('#m_blockui_4_2').click(function() {
            mApp.block('#m_blockui_4_2_modal .modal-content', {
                overlayColor: '#000000',
                state: 'primary'
            });

            setTimeout(function() {
                mApp.unblock('#m_blockui_4_2_modal .modal-content');
            }, 2000);
        });

        $('#m_blockui_4_3').click(function() {
            mApp.block('#m_blockui_4_3_modal .modal-content', {
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                size: 'lg'
            });

            setTimeout(function() {
                mApp.unblock('#m_blockui_4_3_modal .modal-content');
            }, 2000);
        });

        $('#m_blockui_4_4').click(function() {
            mApp.block('#m_blockui_4_4_modal .modal-content', {
                overlayColor: '#000000',
                type: 'loader',
                state: 'success',
                message: 'Please wait...'
            });

            setTimeout(function() {
                mApp.unblock('#m_blockui_4_4_modal .modal-content');
            }, 2000);
        });

        $('#m_blockui_4_5').click(function() {
            mApp.block('#m_blockui_4_5_modal .modal-content', {
                overlayColor: '#000000',
                type: 'loader',
                state: 'primary',
                message: 'Processing...'
            });

            setTimeout(function() {
                mApp.unblock('#m_blockui_4_5_modal .modal-content');
            }, 2000);
        });
    }

    return {
        // public functions
        init: function() {
            demo1();
            demo2(); 
            demo3(); 
            demo4(); 
        }
    };
}();

jQuery(document).ready(function() {    
    BlockUIDemo.init();
});
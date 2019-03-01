$(document).ready(function() {


    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function() {
        $(this).on('blur', function() {
            if ($(this).val().trim() != "") {
                $(this).addClass('has-val');
            } else {
                $(this).removeClass('has-val');
            }
        })
    })


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit', function() {
        var check = true;

        if ($('input[name="csv_flag"]')[0].checked) {
            var filecheck = $('input[name="csv_list"]').val();
            if (!filecheck || filecheck == null || filecheck == undefined) {
                showValidate($('input[name="csv_list"]'));
                check = false;
            }
        } else {

            for (var i = 0; i < input.length; i++) {
                if (validate(input[i]) == false) {
                    showValidate(input[i]);
                    check = false;
                }
            }

        }

        return check;
    });


    $('.validate-form .input100').each(function() {
        $(this).focus(function() {
            hideValidate(this);
        });
    });

    function validate(input) {
        if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        } else if ($(input).attr('type') == 'file') {
            // if ($('input[name="csv_flag"]')[0].checked && $(input).val() == null) {
            //     return false;
            // }
        } else {
            if ($(input).val().trim() == '') {
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }

    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function() {
        if (showPass == 0) {
            $(this).next('input').attr('type', 'text');
            $(this).addClass('active');
            showPass = 1;
        } else {
            $(this).next('input').attr('type', 'password');
            $(this).removeClass('active');
            showPass = 0;
        }

    });


    $('.attach-btn').click(() => $('input[name="csv_list"]').click());

    $('input[name="csv_list"]').change(e => {
        var input = e.target.value;
        var file = input.match(/[ \w-]+(?:\.\w+)*$/)[0];
        if (file) {
            $('.attach-title').html(file);
            $('input[name="csv_flag"]')[0].checked = true;

        } else {
            $('.attach-title').html('');
            $('input[name="csv_flag"]')[0].checked = false;
        }
    });

    $('input[name="csv_flag"]').change(e => {
        if ($('input[name="csv_flag"]')[0].checked) {
            $('input[name="csv_list"]').click();
            return false;
        } else {
            $('input[name="csv_list"]').val('');
            $('.attach-title').html('');
            return false;
        }
    });

    // DATE PICKER

    if ($('#data-form')[0]) {
        $('#data-form input[name="date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
        $('#data-form input[name="invoice_date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
        $('#data-form input[name="expiry"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
    }


});
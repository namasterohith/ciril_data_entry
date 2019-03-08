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
    var input = $('.validate-form .validate-input .input100');

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

    //  Tabs


    $('.nav-tabs li a').click((e) => {
        var this_tab = $(e.target).parent();
        var this_container = $(this_tab).data('tab');
        $(this_tab).siblings().removeClass("active");
        $(this_tab).addClass("active");
        $(`.${this_container}`).siblings().removeClass('slideOutLeft');
        $(`.${this_container}`).siblings().removeClass('slideInRight');
        $(`.${this_container}`).removeClass('slideOutLeft');
        $(`.${this_container}`).removeClass('slideInRight');
        $(`.${this_container}`).siblings().removeClass('slideInLeft');
        $(`.${this_container}`).siblings().removeClass('slideOutRight');
        $(`.${this_container}`).removeClass('slideInLeft');
        $(`.${this_container}`).removeClass('slideOutRight');
        if ($(`.${this_container}`).next()[0]) {
            $(`.${this_container}`).next().addClass('slideOutRight').fadeOut();
            $(`.${this_container}`).delay(300).addClass('slideInLeft').fadeIn(1500);
        } else {
            $(`.${this_container}`).prev().addClass('slideOutLeft').fadeOut();
            $(`.${this_container}`).delay(300).addClass('slideInRight').fadeIn(1500);
        }
    });

    $('.nav-tabs li:first-of-type a').click();

    // Data table


    function laodTable(table_data) {

        if (table_data) {
            $('#view-table').dataTable().fnDestroy();
        }
        let t = $('#view-table').DataTable({
            fixedHeader: true,
            searching: false,
            scrollX: true,
            fixedColumns: {
                leftColumns: 5
            },
            dom: 'Bfrtip',
            buttons: [{
                extend: 'csvHtml5',
                filename: 'DataExport',
                text: 'Export as CSV'
            }],
            "columnDefs": [
                { "targets": [0], "orderable": false }
            ],
            "aaData": (table_data || []),
            "aoColumns": [
                { "aTargets": ["SL. NO."], "sType": "index", "bSortable": false, "mData": "serial_no", "orderable": false },
                { "aTargets": ["BARCODE"], "sType": "text", "bSortable": true, "mData": "Barcode" },
                { "aTargets": ["SUPPLIER CODE"], "sType": "text", "bSortable": true, "mData": "Scode" },
                { "aTargets": ["BATCH"], "sType": "text", "bSortable": true, "mData": "Batch" },
                { "Targets": ["EXPIRY"], "sType": "date", "bSortable": true, "mData": "Expiry", "mRender": function(data, type, full) { return data.date.substring(0, 10); } },
                { "aTargets": ["UNIT PRICE"], "sType": "numeric", "bSortable": true, "mData": "unit price" },
                { "aTargets": ["QUANTITY"], "sType": "numeric", "bSortable": true, "mData": "quantity" },
                { "aTargets": ["PACK SIZE"], "sType": "numeric", "bSortable": true, "mData": "Pack size" },
                { "aTargets": ["INVOICE AMOUNT"], "sType": "numeric", "bSortable": true, "mData": "invoice amount" },
                { "aTargets": ["INVOICE DATE"], "sType": "date", "bSortable": true, "mData": "invoice date", "mRender": function(data, type, full) { return data.date.substring(0, 10); } },
                { "aTargets": ["INVOICE NUMBER"], "sType": "numeric", "bSortable": true, "mData": "invoice number" },
                { "aTargets": ["TRANSCATION NUMBER"], "sType": "numeric", "bSortable": true, "mData": "Trans_no" },
                { "aTargets": ["FILE NUMBER"], "sType": "numeric", "bSortable": true, "mData": "File number" },
                { "aTargets": ["SUPPLIER"], "sType": "text", "bSortable": true, "mData": "Supplier" },
                { "aTargets": ["MANUFACTURER"], "sType": "text", "bSortable": true, "mData": "manufacturer" },
                { "aTargets": ["DATE"], "sType": "date", "bSortable": true, "mData": "Date", "mRender": function(data, type, full) { return data.date.substring(0, 10); } },
                { "aTargets": ["CREATED BY"], "sType": "text", "bSortable": true, "mData": "creator_no" }
            ],
        });

        t.order([1, 'asc']).draw();
        t.on('order.dt search.dt', function() {
            t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    }

    laodTable();


    $('input[name="view_date_range"].input100').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD'
        }
    });

    $('.container-table100').css('visibility', 'hidden');
    $('.search-btn').click((e) => {
        $('.container-table100').css('visibility', 'hidden');
        var get_data = {
            from_date: $('input[name="view_date_range"].input100').val().split(' - ')[0],
            to_date: $('input[name="view_date_range"].input100').val().split(' - ')[1],
            barcode: $('input[name="view_barcode"].input100').val(),
            created_by: $('input[name="view_creator"].input100').val()
        }
        getData(get_data);
    });

    function getData(get_data) {

        const FETCH_TIMEOUT = 50000;
        let didTimeOut = false;
        let url = `fetch.php?from_date=${get_data.from_date || ''}&to_date=${get_data.to_date || ''}&barcode=${get_data.barcode || ''}&created_by=${get_data.created_by || ''}`;

        new Promise(function(resolve, reject) {
                const timeout = setTimeout(function() {
                    didTimeOut = true;
                    reject(new Error('Request timed out'));
                }, FETCH_TIMEOUT);

                fetch(url)
                    .then(function(response) {
                        // Clear the timeout as cleanup
                        clearTimeout(timeout);
                        if (!didTimeOut) {
                            resolve(response);
                            response.json()
                                .then(function(response_data) {
                                    if (response_data.status == "200") {
                                        $("#fetch-null-msg").hide();
                                        $("#fetch-error-msg").hide();
                                        if (response_data.data) {
                                            let data_array = response_data.data;
                                            data_array.map((el, index) => {
                                                el.serial_no = index + 1;
                                                delete el.Recnum;
                                            });
                                            laodTable(data_array);
                                            $('.container-table100').css('visibility', 'visible').addClass('slideInUp');
                                        } else
                                            $("#fetch-null-msg").fadeIn();
                                    } else {
                                        $("#fetch-error-msg").fadeIn();
                                    }
                                });
                        }


                    })
                    .catch(function(err) {
                        console.log('fetch failed! ', err);

                        // Rejection already happened with setTimeout
                        if (didTimeOut) return;
                        // Reject with error
                        reject(err);
                    });
            })
            .then(function() {})
            .catch(function(err) {
                // Error: response error, request timeout or runtime error
                console.log('promise error! ', err);
            });

    }


});
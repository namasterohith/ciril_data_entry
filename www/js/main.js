$(document).ready(function() {

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
        $('input.input100').val('');
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


    $('.reset-btn').click((e) => {
        $('input.input100.search').val('');
        $("#input-error-msg").hide();
    });
    $('.reset-btn').click();

    $('.container-table100').css('visibility', 'hidden');
    $('.search-btn').click((e) => {
        hideMsgs();
        $('.container-table100').css('visibility', 'hidden');
        let view_date_range = $('input[name="view_date_range"].input100').val();
        let view_barcode = $('input[name="view_barcode"].input100').val();
        let view_creator = $('input[name="view_creator"].input100').val();
        if (view_date_range || view_barcode || view_creator) {
            $("#fetch-info-msg").fadeIn();
            var get_data = {
                from_date: view_date_range.split(' - ')[0],
                to_date: view_date_range.split(' - ')[1],
                barcode: view_barcode,
                created_by: view_creator
            }
            getData(get_data);
        } else {
            $("#input-error-msg").fadeIn();
        }
    });

    function hideMsgs() {
        $("#fetch-success-msg").hide();
        $("#input-error-msg").hide();
        $("#fetch-null-msg").hide();
        $("#fetch-error-msg").hide();
    }

    function getData(get_data) {

        const FETCH_TIMEOUT = 60000;
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
                                    $("#fetch-info-msg").hide();
                                    if (response_data.status == "200") {
                                        if (response_data.data) {
                                            let data_array = response_data.data;
                                            data_array.map((el, index) => {
                                                el.serial_no = index + 1;
                                                delete el.Recnum;
                                            });
                                            laodTable(data_array);
                                            $('.container-table100').css('visibility', 'visible').addClass('slideInUp');
                                            $("#fetch-success-msg .count").text(`Showing latest ${data_array.length} result${(data_array.length>1 ? 's' : '' )}.`);
                                            $("#fetch-success-msg").fadeIn().fadeOut(5000);
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
                        $("#fetch-info-msg").hide();
                        $("#fetch-error-msg").fadeIn();
                    });
            })
            .then(function() {})
            .catch(function(err) {
                // Error: response error, request timeout or runtime error
                console.log('promise error! ', err);
                $("#fetch-info-msg").hide();
                $("#fetch-error-msg").fadeIn();
            });

    }


});
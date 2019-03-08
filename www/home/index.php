<?php
   include('../config/session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home - Data Entry</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/noui/nouislider.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/DataTables/datatables.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!--===============================================================================================-->
</head>

<body id="home">

    <div class="logout-container">
        <span class="logout-title">Welcome, <?php echo $login_session; ?></span>
        <a href="logout.php">
            <button class="btn btn-dark logout-btn" type="button">
                Logout
            </button>
        </a>
    </div>



    <div class="container-home100"> 

        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active" data-tab="home100-form"><a href="#">Add New</a></li>
                <li data-tab="limiter-table100"><a href="#">View Data</a></li>
            </ul>
        </div>
        <div class="wrap-home100">

            <!-- FORM -->

            <form class="home100-form validate-form animated" id="data-form" enctype="multipart/form-data" action="" method="POST">
                <span class="home100-form-title">
					Enter Details
                </span>

                <div id="data-error-msg"  class="alert alert-danger text-center dis-none">
                    <strong>Error!</strong> Couldn't add all the data to the DB.
                </div>

                <div id="data-success-msg"  class="alert alert-success text-center dis-none">
                    <strong>Success!</strong> Added the data to the DB.
                </div>

                <div class="row">
                    <div class="col-md-6">

                        <div class="wrap-input100 validate-input bg1" data-validate="Please Type The Barcode">
                            <span class="label-input100">BARCODE</span>
                            <input class="input100" type="text" name="barcode" placeholder="Enter The Barcode">
                        </div>

                        <div class="wrap-input100 validate-input bg1" data-validate="Please Type The Batch">
                            <span class="label-input100">BATCH</span>
                            <input class="input100" type="text" name="batch" placeholder="Enter The Batch">
                        </div>

                        <div class="wrap-input100 validate-input bg1" data-validate="Please Type The Quantity">
                            <span class="label-input100">QUANTITY</span>
                            <input class="input100" type="number" name="quantity" placeholder="Enter The Quantity">
                        </div>

                        <div class="wrap-input100 validate-input bg1" data-validate="Please Type The Pack Size">
                            <span class="label-input100">PACK SIZE</span>
                            <input class="input100" type="number" name="pack_size" placeholder="Enter The Pack Size">
                        </div>

                        <div class="wrap-input100 validate-input bg1" data-validate="Please Type The Expiry">
                            <span class="label-input100">EXPIRY</span>
                            <input class="input100" type="text" name="expiry" autocomplete="none" placeholder="Enter The Expiry">
                        </div>

                        <div class="wrap-input100 validate-input bg1" data-validate="Please Type The Supplier">
                            <span class="label-input100">SUPPLIER</span>
                            <input class="input100" type="text" name="supplier" placeholder="Enter The Supplier">
                        </div>

                        <div class="wrap-input100 validate-input bg1" data-validate="Please Type The Supplier Code">
                            <span class="label-input100">SUPPLIER CODE</span>
                            <input class="input100" type="text" name="supplier_code" placeholder="Enter The Supplier Code">
                        </div>

                        <div class="wrap-input100 validate-input bg1" data-validate="Please Type The Manufacturer">
                            <span class="label-input100">MANUFACTURER</span>
                            <input class="input100" type="text" name="manufacturer" placeholder="Enter The Manufacturer">
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="wrap-input100 validate-input bg1" data-validate="Please Type The Unit Price">
                            <span class="label-input100">UNIT PRICE</span>
                            <input class="input100" type="number" name="unit_price" placeholder="Enter Unit Price">
                        </div>

                        <div class="wrap-input100 validate-input bg1" data-validate="Please Type The Date">
                            <span class="label-input100">DATE</span>
                            <input class="input100" type="text" name="date" autocomplete="none" placeholder="Enter The Date">
                        </div>

                        <div class="wrap-input100 validate-input bg1" data-validate="Please Type The Invoice Date">
                            <span class="label-input100">INVOICE DATE</span>
                            <input class="input100" type="text" name="invoice_date" placeholder="Enter The Invoice Date">
                        </div>

                        <div class="wrap-input100 validate-input bg1" data-validate="Please Type The Invoice Number">
                            <span class="label-input100">INVOICE NUMBER</span>
                            <input class="input100" type="number" name="invoice_number" placeholder="Enter The Invoice Number">
                        </div>

                        <div class="wrap-input100 validate-input bg1" data-validate="Please Type The Invoice Amount">
                            <span class="label-input100">INVOICE AMOUNT</span>
                            <input class="input100" type="number" name="invoice_amount" placeholder="Enter The Invoice Amount">
                        </div>

                        <div class="wrap-input100 validate-input bg1" data-validate="Please Type The Transaction Number">
                            <span class="label-input100">TRANSACTION NUMBER</span>
                            <input class="input100" type="number" name="transaction_number" placeholder="Enter The Transaction Number">
                        </div>

                        <div class="wrap-input100 validate-input bg1" data-validate="Please Type The File Number">
                            <span class="label-input100">FILE NUMBER</span>
                            <input class="input100" type="number" name="file_number" placeholder="Enter The File Number">
                        </div>

                        <div class="wrap-input100 validate-input bg1" data-validate="Attach CSV">
                            <input type="checkbox" name="csv_flag" value="Yes" placeholder="Attach CSV">
                            <span class="label-input100">OR UPLOAD A CSV FILE</span>
                            <div class="attach-container">
                                <span class="attach-title"></span>
                                <button class="btn btn-info attach-btn" type="button">
                                    ATTACH
                                </button>
                                <input class="input100 dis-none" type="file" accept=".csv" name="csv_list" placeholder="Attach CSV">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="container-home100-form-btn text-left justify-content-start">
                    <button class="home100-form-btn text-left" type="submit">
                        Submit
                    </button>
                </div>

            </form>
         
            <!-- TABLE -->
            
            <div class="limiter-table100 animated">
                <span class="home100-form-title">
					Find Details
                </span>

                <div id="fetch-error-msg"  class="alert alert-danger text-center dis-none">
                    <strong>Error!</strong> Couldn't load data.
                </div>
                <div id="fetch-null-msg"  class="alert alert-danger text-center dis-none">
                    <strong>Oops!</strong> No data found.
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="wrap-input100 bg1" >
                            <span class="label-input100">DATE RANGE</span>
                            <input class="input100" type="text" name="view_date_range" autocomplete="none" placeholder="Please Select The Date Range">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="wrap-input100 bg1" >
                            <span class="label-input100">BARCODE</span>
                            <input class="input100" type="text" name="view_barcode" placeholder="Enter The Barcode">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="wrap-input100 bg1" >
                            <span class="label-input100">CREATED BY</span>
                            <input class="input100" type="text" name="view_creator" placeholder="Enter The Name">
                        </div>
                    </div>
                </div>

                <div class="text-right float-right justify-content-start m-b-20">
                    <button class="home100-form-btn text-right float-right search-btn" type="button">
                        Search
                    </button>
                </div>

                <div class="container-table100 dis-none animated">
                    <div class="wrap-table100">
                        <div class="table100">
                            <table class="table" id="view-table">
                                <thead>
                                    <tr class="table100-head">
                                        <th class="column1">SL. NO.</th>
                                        <th class="column2">BARCODE</th>
                                        <th class="column3">SUPPLIER CODE</th>
                                        <th class="column4">BATCH</th>
                                        <th class="column5">EXPIRY</th>
                                        <th class="column6">UNIT PRICE</th>
                                        <th class="column7">QUANTITY</th>
                                        <th class="column8">PACK SIZE</th>
                                        <th class="column9">INVOICE AMOUNT</th>
                                        <th class="column10">INVOICE DATE</th>
                                        <th class="column11">INVOICE NUMBER</th>
                                        <th class="column12">TRANSCATION NUMBER</th>
                                        <th class="column13">FILE NUMBER</th>
                                        <th class="column14">SUPPLIER</th>
                                        <th class="column15">MANUFACTURER</th>
                                        <th class="column16">DATE</th>
                                        <th class="column17">CREATED BY</th>
                                    </tr>
                                </thead>
                                <tbody>  
                                                                       
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--===============================================================================================-->
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/daterangepicker/moment.min.js"></script>
    <script src="../vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/noui/nouislider.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/DataTables/datatables.min.js"></script>
    <!--===============================================================================================-->
    <script src="../js/validate.js"></script>
    <script src="../js/main.js"></script>
    <script>

        <?php

            function insertData($db, $data){
                
                $tsql= "INSERT INTO dbo.cirsup (Barcode, Scode, Batch, Expiry, [unit price], quantity, [Pack size], [invoice amount], [invoice date], [invoice number], Trans_no, [File number], Supplier, manufacturer, Date, creator_no) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
                $params = array($data['barcode'], $data['supplier_code'], $data['batch'], $data['expiry'], $data['unit_price'], $data['quantity'], $data['pack_size'], $data['invoice_amount'], $data['invoice_date'], $data['invoice_number'], $data['transaction_number'], $data['file_number'], $data['supplier'], $data['manufacturer'], $data['date'], $_SESSION['login_user']);
                $getResults = sqlsrv_query($db, $tsql, $params);
                $rowsAffected = sqlsrv_rows_affected($getResults);
                if ($getResults == FALSE or $rowsAffected == FALSE){
                    $returnArray = array('table_1' => 0);       
                    $returnArrayErr = sqlsrv_errors();     
                }

                $returnArray = array('table_1' => $rowsAffected);
                sqlsrv_free_stmt($getResults);
                sqlsrv_free_stmt($rowsAffected);

                return $returnArray;
            }

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $post = true;

                $haveFile = $_POST['csv_flag'];
                $fileTracker = [];

                if($haveFile){

                    $table_cols = ["serial_no","barcode","supplier_code","batch","expiry","unit_price","quantity","pack_size","invoice_amount","invoice_date","invoice_number","transaction_number","file_number","supplier","manufacturer","date","supplier"];
                    $csvFile = file($_FILES['csv_list']['tmp_name']);
                    $proxy_post = [];
                    foreach ($csvFile as $key=>$line) {
                        if ($key == 0) continue;
                        $data_array = str_getcsv($line);
                        foreach ($data_array as $col=>$item) {
                            $proxy_post[$key][$table_cols[$col]] = $item;
                        }
                    }
                    foreach ($proxy_post as $item_no=>$row) {
                        $rowsCountTrack = insertData($db, $row);
                        $tableOneTrack = $rowsCountTrack['table_1'];
                        if($tableOneTrack != 1){
                            array_push($fileTracker,$item_no);
                        } 
                    }
                    if(count($fileTracker) > 0){                        
                        $tableOne = 0;
                    }else{                     
                        $tableOne = 1;
                    }


                } else {  

                    $post_data = [];
    
                    foreach ($_POST as $key => $value) {
                        if($key != 'csv_flag' && $key != 'csv_list'){
                            $post_data[$key] = $value;
                        }
                    }        

                    $rowsCount = insertData($db, $post_data);
                    $tableOne = $rowsCount['table_1'];
                }
            } 
        ?>
        var post = '<?php echo $post; ?>';
        if(Boolean(post)){
            var tableOneCount = '<?php echo $tableOne; ?>';
            var haveFile = '<?php echo $haveFile; ?>';
            $("#data-error-msg").hide();
            $("#data-success-msg").hide();
            var errorMessage = $("#data-error-msg").text() + '<br/> Error at rows: ';
            if(haveFile){
                var fileTracker = <?php echo json_encode($fileTracker); ?>;
                fileTracker.map(item => errorMessage = errorMessage + ` ${item}.` );
                $("#data-error-msg").html(errorMessage);
            }
            if(Number(tableOneCount)){
                $("#data-success-msg").fadeIn( e => {
                    $("#data-form input").val(""); 
                });
            } else { 
                $("#data-error-msg").fadeIn();
            }
        }
    </script>

</body>

</html>
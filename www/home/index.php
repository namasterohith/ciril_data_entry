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
        <div class="wrap-home100">
            <form class="home100-form validate-form" id="data-form" enctype="multipart/form-data" action="" method="POST">
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
                    <div class="col-md-6">

                        <div class="wrap-input100 validate-input bg1" data-validate="Please Type The Cost">
                            <span class="label-input100">COST</span>
                            <input class="input100" type="number" name="cost" placeholder="Enter The Cost">
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

                    </div>
                </div>

                <div class="container-home100-form-btn text-left justify-content-start">
                    <button class="home100-form-btn text-left" type="submit">
                        Submit
                    </button>
                </div>

            </form>
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
    <script src="../js/main.js"></script>
    <script>

        <?php

            function insertData($db, $data){
                
                $tsql= "INSERT INTO dbo.cirsup (Barcode, quantity, Batch, Expiry, Cost, Supplier, Scode, creator_no) VALUES (?,?,?,?,?,?,?,?);";
                $params = array($data['barcode'], $data['quantity'], $data['batch'], $data['expiry'], $data['cost'], $data['supplier'], $data['supplier_code'], $_SESSION['login_user']);
                $getResults = sqlsrv_query($db, $tsql, $params);
                $rowsAffected = sqlsrv_rows_affected($getResults);
                if ($getResults == FALSE or $rowsAffected == FALSE){
                    $returnArray = array('table_1' => 0);       
                    $returnArrayErr = sqlsrv_errors();     
                }

                $returnArray = array('table_1' => $rowsAffected);
                sqlsrv_free_stmt($getResults);
                sqlsrv_free_stmt($rowsAffected);

                if($rowsAffected){
                    
                    $tsql2= "INSERT INTO dbo.cirsup2 (Date, [invoice date], [invoice amount], Trans_no, [invoice number], creator_no) VALUES (?,?,?,?,?,?);";
                    $params2 = array($data['date'], $data['invoice_date'], $data['invoice_amount'], $data['transaction_number'], $data['invoice_number'], $_SESSION['login_user']);
                    $getResults2 = sqlsrv_query($db, $tsql2, $params2);
                    $rowsAffected2 = sqlsrv_rows_affected($getResults2);
                    if ($getResults2 == FALSE or $rowsAffected2 == FALSE){
                        $returnArray['table_2'] = 0;
                    }

                    $returnArray['table_2'] = $rowsAffected2;
                    sqlsrv_free_stmt($getResults2);
                    sqlsrv_free_stmt($rowsAffected2);
                
                }
                else {
                    $returnArray['table_1']  = 0;
                    $returnArray['table_2']  = 0;
                }

                return $returnArray;
            }

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $post = true;

                $haveFile = $_POST['csv_flag'];
                $fileTracker = [];

                if($haveFile){

                    $table_cols = ["barcode","quantity","batch","expiry","cost","date","invoice_date","invoice_number","invoice_amount","transaction_number","supplier","supplier_code"];
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
                        $tableTwoTrack = $rowsCountTrack['table_2'];
                        if($tableOneTrack != 1 && $tableTwoTrack != 1){
                            array_push($fileTracker,$item_no);
                        } 
                    }
                    if(count($fileTracker) > 0){                        
                        $tableOne = 0;
                        $tableTwo = 0;
                    }else{                     
                        $tableOne = 1;
                        $tableTwo = 1;
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
                    $tableTwo = $rowsCount['table_2'];
                }
            } 
        ?>
        var post = '<?php echo $post; ?>';
        if(Boolean(post)){
            var tableOneCount = '<?php echo $tableOne; ?>';
            var tableTwoCount = '<?php echo $tableTwo; ?>';
            var haveFile = '<?php echo $haveFile; ?>';
            $("#data-error-msg").hide();
            $("#data-success-msg").hide();
            var errorMessage = $("#data-error-msg").text() + '<br/> Error at rows: ';
            if(haveFile){
                var fileTracker = <?php echo json_encode($fileTracker); ?>;
                fileTracker.map(item => errorMessage = errorMessage + ` ${item}.` );
                $("#data-error-msg").html(errorMessage);
            }
            if(Number(tableOneCount) && Number(tableTwoCount)){
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
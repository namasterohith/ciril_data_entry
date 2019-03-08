<?php
   include('../config/session.php');

    //Read Query            
    $tsql= "SELECT TOP (10000) * FROM dbo.cirsup WHERE [Date] >= ? and [Date] <= ?";
    $params = array($_GET['from_date'], $_GET['to_date']);  
    // To add partial match from start of the string add this to the param ===> .='%'
    if ( $_GET['barcode'] !== '') { $tsql.=  " AND Barcode LIKE ?"; array_push($params,$_GET['barcode']); }            
    if ( $_GET['created_by'] !== '') { $tsql.=  " AND creator_no LIKE ?"; array_push($params,$_GET['created_by']); }   
    $tsql.= ";";         
    $getResults= sqlsrv_query($db, $tsql, $params);
    if ($getResults == FALSE)
        die($errorArray = sqlsrv_errors());
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
        $data[] = $row;
    }
    
    $results = ["status" => 200,
                "data" => $data ];

    sqlsrv_free_stmt($getResults);
   
    echo json_encode($results);
    
?>
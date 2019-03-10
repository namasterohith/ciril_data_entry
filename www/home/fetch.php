<?php
   include('../config/session.php');

    //Read Query            
    $tsql= "SELECT TOP (1000) * FROM dbo.cirsup";
    $params = array();
    $has_where = false;

    if ( $_GET['from_date'] !== '' && $_GET['to_date'] !== '' ) { $tsql.=  " WHERE [Date] >= ? and [Date] <= ?"; array_push($params,$_GET['from_date'], $_GET['to_date']); $has_where = true; }  
    // To add partial match from start of the string add this to the param ===> .='%'
    if ( $_GET['barcode'] !== '' ) { $tsql.=  " " .($has_where ? 'AND' : 'WHERE') ." Barcode LIKE ?"; array_push($params,$_GET['barcode']); $has_where = true; }            
    if ( $_GET['created_by'] !== '' ) { $tsql.=  " " .($has_where ? 'AND' : 'WHERE') ." creator_no LIKE ?"; array_push($params,$_GET['created_by']); }   
    $tsql.= " ORDER BY [Date] DESC;";         
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
<?php
    $serverName = "MACHINE-DE-ROBO\DESQLSERVER";
    $connectionOptions = array(
        "Database" => "ISTKDB",
        "Uid" => "sa",
        "PWD" => "root"
    );
    //Establishes the connection
    $db = sqlsrv_connect($serverName, $connectionOptions);

?>
<?php
    
    header('Content-Type: application/json');
    
	include("conn.php");
    include("functions.php");


    $data = books_list();

    if ($data && count($data)) {

        foreach ($data as $row) {



             }
    }


    echo json_encode($data, JSON_PRETTY_PRINT);

    ?>
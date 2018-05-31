<html>
<head>
    <title>Libreria PHP</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <!--<link rel="stylesheet" href="css/bootstrap.css" type="text/css">-->

    <?php

    include("conn.php");
    include("functions.php");

    ?>

</head>

<body>


<?php


// Array

$nolo = array(


    array("id_libro" => "2",
        "datanolo" => "2018-05-06",
        "id_utente" => "1",
        "periodo" => "10",
        "offset" => "0"),

    array("id_libro" => "4",
        "datanolo" => "2018-05-08",
        "id_utente" => "1",
        "periodo" => "5",
        "offset" => "3"),

    array("id_libro" => "9",
        "datanolo" => "2018-05-08",
        "id_utente" => "1",
        "periodo" => "4",
        "offset" => "3"),


);


// Ciclo Insert


foreach ($nolo as $key => $current_array) {


    try {


        $sql = "INSERT INTO nolo "
            . "("
            . "id_libro, "
            . "datanolo, "
            . "id_utente, "
            . "periodo, "
            . "offset "


            . ") VALUES ("
            . " :id_libro,"
            . " :datanolo,"
            . " :id_utente,"
            . " :periodo,"
            . " :offset"


            . ")";


        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id_libro", $current_array['id_libro'], PDO::PARAM_INT);
        $stmt->bindValue(":datanolo", $current_array['datanolo'], PDO::PARAM_STR);
        $stmt->bindValue(":id_utente", $current_array['id_utente'], PDO::PARAM_INT);
        $stmt->bindValue(":periodo", $current_array['periodo'], PDO::PARAM_INT);
        $stmt->bindValue(":offset", $current_array['offset'], PDO::PARAM_INT);

        $stmt->execute();


        // ultimo id inserito
        $ultimo_id = $pdo->lastInsertId();


    } catch (PDOException $e) {
        // notifica in caso di errore nel tentativo di connessione
        echo $e->getMessage();
        return false;
    }


}


?>


</body>


</head>
</html>
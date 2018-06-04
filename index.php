<html>
<head>
    <title>Libreria PHP</title>
    <meta charset="utf-8">

    <?php

    include("conn.php");
    include("functions.php");

    ?>

</head>

<body>


<table border="1" width="600">


    <CAPTION>Elenco Libreria biblioteca</CAPTION>


    <thead>
    <tr>

        <th>
           Nome libro
        </th>

        <th>
            Categoria 
        </th>


    </tr>
    </thead>
    <tbody>

    <?php

    $data = books_list();

    if ($data && count($data)) {

        foreach ($data as $row) {

            ?>

            <tr>
                <th scope="row">
                    <div align="center">
                        <?php echo $row['title'] ?>
                    </div>
                </th>
                <td>
                    <?php echo $row['name'] ?>
                </td>


            </tr>


        <?php }
    }
    ?>


    </tbody>
</table>


</body>


</head>
</html>
<html>
<head>
    <title>Libreria PHP</title>
    <meta charset="utf-8">
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/form-validation.css" rel="stylesheet">
    
    <?php

    include("conn.php");
    include("functions.php");

    ?>

</head>

<body>


<div class="container">
<div align="center">


    <?php
    if (!empty($_POST['insert'])) {
    insert();

    }

    if ((isset($_GET['insert'])) AND (($_GET['insert'] == 1))) {


    echo "<span class='btn btn-lg btn-block btn-outline-primary'>Insert OK!</span><br/>";

    echo "<a href='library_json.php'>Vedi Json</a>";

    }
    
    ?>



    <form method="POST" action="#">

        <h1>Form Insert</h1>

        <div class="row">
                <div class="col-md-12 mb-12">
        <label><strong>Title</strong></label>
        <p><input type="text" name="title" class="form-control" required=""></p>

                </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-12">
        <label><strong>Category</strong></label>
        <p>
            

                                <select name="name" class="form-control" required="">

                            
                                        <?php

                                        $data = category_list();

                                        if ($data && count($data)) {

                                            foreach ($data as $category) {

                                                ?>

                                           <option value="<?php echo $category['id_category'] ?>"><?php echo $category['name'] ?> </option>

                                           
                                            <?php 

                                      }
                                      }
                                        ?>

                                </select>
        </p>
        <div>
            </div>
        

        <input type="hidden" name="insert" value="1">
        <p><button type="submit" class="btn btn-primary btn-lg btn-block">Send</button></p> 

    </form>

</div>
</div>


</body>


</head>
</html>
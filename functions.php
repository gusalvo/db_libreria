<?php
// +++++++++++++++++++++++++++++++++++++++++++ #ELENCO LIBRI


function books_list()
{
    global $pdo;
    try {

        // se valorizzata GET category
        if (isset($_GET['category'])) {


         $sql = "SELECT books.title, books.category, books.created_at, DATE_FORMAT(books.created_at, '%d/%m/%Y %H:%i:%s') As date_now, category.name "

        . "FROM books, category "

        . "WHERE books.category = category.id_category AND books.category = ". (int)$_GET['category'] ."";

        }


        else

        {

         $sql = "SELECT books.title, books.category, books.created_at, DATE_FORMAT(books.created_at, '%d/%m/%Y %H:%i:%s') As date_now, category.name "

        . "FROM books, category "

        . "WHERE books.category = category.id_category";

        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);


    } catch (PDOException $e) {

        echo var_dump($e->getMessage());
        return false;
    }

    return $row;

}

// +++++++++++++++++++++++++++++++++++++++++++ #ELENCO CATEGORIE
function category_list()
{
    global $pdo;
    try {

        $sql = "SELECT id_category, name FROM category ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        echo var_dump($e->getMessage());
        return false;
    }

    return $row;

}


// +++++   ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ #INSERISCI
function insert() {

global $pdo;

    
    try {


        $sql = "INSERT INTO books "
            . "("
            . "title, "
            . "category, "
            . "created_at "
            
            . ") VALUES ("
            . " :title,"
            . " :category, "
            . " :created_at "
        

            . ")";


        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":title", trim($_POST['title']), PDO::PARAM_STR);
        $stmt->bindValue(":category", (int)$_POST['name'], PDO::PARAM_INT);
        $stmt->bindValue(":created_at", date("Y-m-d H:i:s"), PDO::PARAM_STR);
    
        $stmt->execute();

       // $stmt->debugDumpParams();
       // exit;


    } catch (PDOException $e) {
       
        echo $e->getMessage();
        return false;
    }



    header("location: library_form.php?insert=1");
    exit();

}




?>
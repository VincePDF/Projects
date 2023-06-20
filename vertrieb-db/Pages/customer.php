<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kundenansicht</title>

    <div class="head">
        <?php
            include("../index.php")
        ?>
    </div>

    <link rel="stylesheet" href="../index.css">

</head>
<body class="content">
    <div class="main-content">

    <div class="container-sm">

    <?php
    ini_set('display_errors',1);
    //var_dump("variable")

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "customeroverview";

    //Create connection
    $connection = new mysqli($servername, $username, $password, $database, 3306);

    $id = "";
    $firma = "";
    $url = "";
    $ansprechpartner = "";
    $addresse = "";
    $areacode = "";
    $city = "";
    $country = "";
    $phone1 = "";
    $phone2 = "";
    $email1 = "";
    $email2 = "";

    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ){
        //GET method: Show the data of the customer

        if ( !isset($_GET["id"]) ) {
            header("location: customerdatabase.php");
            exit;
        }

        $id = $_GET["id"];

        // read the row of the selected client from database table
        $sql = "SELECT * FROM customers WHERE id = $id";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            header("location: customerdatabase.php");
            exit;
        }

        $id = $row["id"];
        $firma = $row["firma"];
        $url = $row["url"];
        $ansprechpartner = $row["ansprechpartner"];
        $addresse = $row["addresse"];
        $areacode = $row["areacode"];
        $city = $row["city"];
        $country = $row["country"];
        $phone1 = $row["phone1"];
        $phone2 = $row["phone2"];
        $email1 = $row["email1"];
        $email2 = $row["email2"];
    }
    ?>

    
        <?php
            echo "<table class='table table-hover table-bordered'>
            <tbody>
                <th scope='row'>Firma</th>
                <td>$row[firma]</td>
            </tbody>
            <tbody>
                <th scope='row'>Website</th>
                <td><a href=https://$row[url] target=_blank>$row[url]</td>
            </tbody>
            <tbody>
                <th scope='row'>Ansprechpartner</th>
                <td>$row[ansprechpartner]</td>
            </tbody>
            <tbody>
                <th scope='row'>Addresse</th>
                <td>$row[addresse], $row[areacode], $row[city], $row[country]</td>
            </tbody>
            <tbody>
                <th scope='row'>Telefon 1</th>
                <td>$row[phone1]</td>
            </tbody>
            <tbody>
                <th scope='row'>Telefon 2</th>
                <td>$row[phone2]</td>
            </tbody>
            <tbody>
                <th scope='row'>E-Mail 1</th>
                <td>$row[email1]</td>
            </tbody>
            <tbody>
                <th scope='row'>E-Mail 2</th>
                <td>$row[email2]</td>
            </tbody>"
        ?>
    </div>

    <footer class="bottom">
        <?php
            include("../footer.php")
        ?>
    </footer>
</body>
</html>